-- ============================================================
-- EcoWaste Supabase schema
-- Run this whole file in the Supabase SQL editor (repeatable).
-- ============================================================

-- ------------------------------------------------------------
-- Profiles (extends the auth.users-backed profiles table)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS profiles (
  id UUID PRIMARY KEY REFERENCES auth.users(id) ON DELETE CASCADE,
  full_name TEXT NOT NULL,
  email TEXT,
  role TEXT NOT NULL,
  status TEXT NOT NULL DEFAULT 'Active' CHECK (status IN ('Active', 'Inactive')),
  last_active_at TIMESTAMPTZ,
  created_at TIMESTAMPTZ DEFAULT now()
);

-- Apply missing columns to an already-existing profiles table
ALTER TABLE profiles ADD COLUMN IF NOT EXISTS email TEXT;
ALTER TABLE profiles ADD COLUMN IF NOT EXISTS status TEXT NOT NULL DEFAULT 'Active' CHECK (status IN ('Active', 'Inactive'));
ALTER TABLE profiles ADD COLUMN IF NOT EXISTS last_active_at TIMESTAMPTZ;

-- Role values: resident | collector | admin
ALTER TABLE profiles DROP CONSTRAINT IF EXISTS profiles_role_check;
ALTER TABLE profiles ADD CONSTRAINT profiles_role_check CHECK (role IN ('resident', 'collector', 'admin'));

-- Enable Row Level Security
ALTER TABLE profiles ENABLE ROW LEVEL SECURITY;

-- Allow authenticated users to insert their own profile
DROP POLICY IF EXISTS "Users can insert own profile" ON profiles;
CREATE POLICY "Users can insert own profile"
  ON profiles FOR INSERT
  TO authenticated
  WITH CHECK (auth.uid() = id);

-- Allow authenticated users to read their own profile
DROP POLICY IF EXISTS "Users can read own profile" ON profiles;
CREATE POLICY "Users can read own profile"
  ON profiles FOR SELECT
  TO authenticated
  USING (auth.uid() = id);

-- Helper used by RLS policies. SECURITY DEFINER reads profiles with RLS
-- bypassed, avoiding infinite recursion ("500: Infinite recursion detected
-- in policy for relation profiles").
CREATE OR REPLACE FUNCTION public.is_admin()
RETURNS boolean
LANGUAGE sql
SECURITY DEFINER
SET search_path = public
STABLE
AS $$
  SELECT EXISTS (
    SELECT 1 FROM profiles
    WHERE id = auth.uid() AND role = 'admin'
  );
$$;

GRANT EXECUTE ON FUNCTION public.is_admin() TO anon, authenticated;

-- Allow admins to read all profiles (used by the admin panel)
DROP POLICY IF EXISTS "Admins can read all profiles" ON profiles;
CREATE POLICY "Admins can read all profiles"
  ON profiles FOR SELECT
  TO authenticated
  USING (public.is_admin());

-- Allow admins to update profiles (edit role/status, deactivate users)
DROP POLICY IF EXISTS "Admins can update all profiles" ON profiles;
CREATE POLICY "Admins can update all profiles"
  ON profiles FOR UPDATE
  TO authenticated
  USING (public.is_admin());

-- Auto-create a profile whenever an auth user is created. Reads role and
-- full_name from the signup metadata and is idempotent, so it works whether
-- or not email confirmation is enabled.
CREATE OR REPLACE FUNCTION public.handle_new_user()
RETURNS TRIGGER
LANGUAGE plpgsql
SECURITY DEFINER
SET search_path = public
AS $$
BEGIN
  INSERT INTO public.profiles (id, full_name, email, role)
  VALUES (
    NEW.id,
    COALESCE(NEW.raw_user_meta_data->>'full_name', ''),
    NEW.email,
    COALESCE(NEW.raw_user_meta_data->>'role', 'resident')
  )
  ON CONFLICT (id) DO UPDATE
    SET full_name = EXCLUDED.full_name, email = EXCLUDED.email;
  RETURN NEW;
END;
$$;

DROP TRIGGER IF EXISTS on_auth_user_created ON auth.users;
CREATE TRIGGER on_auth_user_created
  AFTER INSERT ON auth.users
  FOR EACH ROW EXECUTE FUNCTION public.handle_new_user();

-- ------------------------------------------------------------
-- Waste Categories
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS waste_categories (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  name TEXT NOT NULL UNIQUE,
  type TEXT NOT NULL CHECK (type IN ('Landfill', 'Compostable', 'Recyclable', 'Hazardous')),
  disposal_method TEXT,
  status TEXT NOT NULL DEFAULT 'Active' CHECK (status IN ('Active', 'Inactive')),
  created_at TIMESTAMPTZ DEFAULT now()
);

ALTER TABLE waste_categories ENABLE ROW LEVEL SECURITY;

DROP POLICY IF EXISTS "waste_categories select" ON waste_categories;
CREATE POLICY "waste_categories select" ON waste_categories
  FOR SELECT TO authenticated USING (true);

DROP POLICY IF EXISTS "waste_categories insert" ON waste_categories;
CREATE POLICY "waste_categories insert" ON waste_categories
  FOR INSERT TO authenticated WITH CHECK (true);

DROP POLICY IF EXISTS "waste_categories update" ON waste_categories;
CREATE POLICY "waste_categories update" ON waste_categories
  FOR UPDATE TO authenticated USING (public.is_admin());

DROP POLICY IF EXISTS "waste_categories delete" ON waste_categories;
CREATE POLICY "waste_categories delete" ON waste_categories
  FOR DELETE TO authenticated USING (public.is_admin());

INSERT INTO waste_categories (name, type, disposal_method) VALUES
  ('General Waste', 'Landfill', 'Standard collection'),
  ('Organic', 'Compostable', 'Composting facility'),
  ('Plastic', 'Recyclable', 'Sorting & recycling'),
  ('Paper', 'Recyclable', 'Pulping & recycling'),
  ('Metal', 'Recyclable', 'Smelting & reforming'),
  ('Glass', 'Recyclable', 'Crushing & melting'),
  ('E-Waste', 'Hazardous', 'Specialized facility'),
  ('Batteries', 'Hazardous', 'Chemical recovery')
ON CONFLICT (name) DO NOTHING;

-- ------------------------------------------------------------
-- Collectors
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS collectors (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  user_id UUID UNIQUE REFERENCES profiles(id) ON DELETE SET NULL,
  full_name TEXT NOT NULL,
  collector_number TEXT NOT NULL UNIQUE,
  district TEXT,
  vehicle_name TEXT,
  vehicle_type TEXT,
  rating NUMERIC(3, 1) CHECK (rating >= 0 AND rating <= 5),
  status TEXT NOT NULL DEFAULT 'Off Duty' CHECK (status IN ('On Route', 'Off Duty', 'Vehicle Issue')),
  created_at TIMESTAMPTZ DEFAULT now()
);

ALTER TABLE collectors ENABLE ROW LEVEL SECURITY;

DROP POLICY IF EXISTS "collectors select" ON collectors;
CREATE POLICY "collectors select" ON collectors
  FOR SELECT TO authenticated USING (true);

DROP POLICY IF EXISTS "collectors insert" ON collectors;
CREATE POLICY "collectors insert" ON collectors
  FOR INSERT TO authenticated WITH CHECK (true);

DROP POLICY IF EXISTS "collectors update" ON collectors;
CREATE POLICY "collectors update" ON collectors
  FOR UPDATE TO authenticated USING (public.is_admin());

DROP POLICY IF EXISTS "collectors delete" ON collectors;
CREATE POLICY "collectors delete" ON collectors
  FOR DELETE TO authenticated USING (public.is_admin());

-- Auto-generate collector numbers for real collector accounts
CREATE SEQUENCE IF NOT EXISTS collector_number_seq START 1001;

-- Keep the collectors table in sync with profiles: every profile with
-- role = 'collector' gets a collectors row (and vice versa).
CREATE OR REPLACE FUNCTION public.sync_collector_from_profile()
RETURNS TRIGGER LANGUAGE plpgsql SECURITY DEFINER SET search_path = public AS $$
BEGIN
  IF TG_OP = 'DELETE' THEN
    DELETE FROM collectors WHERE user_id = OLD.id;
    RETURN OLD;
  END IF;
  IF NEW.role = 'collector' THEN
    INSERT INTO collectors (user_id, full_name, collector_number)
    VALUES (NEW.id, NEW.full_name, 'COL-' || nextval('collector_number_seq'))
    ON CONFLICT (user_id) DO UPDATE SET full_name = EXCLUDED.full_name;
  ELSIF OLD.role = 'collector' THEN
    DELETE FROM collectors WHERE user_id = OLD.id;
  END IF;
  RETURN NEW;
END $$;

DROP TRIGGER IF EXISTS trg_profiles_collector_sync ON profiles;
CREATE TRIGGER trg_profiles_collector_sync
  AFTER INSERT OR UPDATE OF role OR DELETE ON profiles
  FOR EACH ROW EXECUTE FUNCTION public.sync_collector_from_profile();

-- Remove legacy demo seed rows (unlinked to any user)
DELETE FROM collectors WHERE user_id IS NULL AND collector_number IN ('COL-8492', 'COL-3721', 'COL-9920');

-- Backfill collectors for any existing collector profiles
INSERT INTO collectors (user_id, full_name, collector_number)
SELECT id, full_name, 'COL-' || nextval('collector_number_seq')
FROM profiles
WHERE role = 'collector' AND id NOT IN (SELECT user_id FROM collectors)
ON CONFLICT (user_id) DO NOTHING;

-- ------------------------------------------------------------
-- Collection Requests
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS collection_requests (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  request_number TEXT NOT NULL UNIQUE,
  location TEXT NOT NULL,
  zone TEXT,
  waste_type TEXT NOT NULL CHECK (waste_type IN ('General', 'Recyclable', 'Hazardous', 'Organic')),
  status TEXT NOT NULL DEFAULT 'Unassigned' CHECK (status IN ('Unassigned', 'Scheduled', 'In Transit', 'Completed')),
  requested_at TIMESTAMPTZ DEFAULT now(),
  collector_name TEXT,
  collector_id UUID REFERENCES profiles(id) ON DELETE SET NULL,
  created_at TIMESTAMPTZ DEFAULT now()
);

ALTER TABLE collection_requests ENABLE ROW LEVEL SECURITY;

DROP POLICY IF EXISTS "collection_requests select" ON collection_requests;
CREATE POLICY "collection_requests select" ON collection_requests
  FOR SELECT TO authenticated USING (true);

DROP POLICY IF EXISTS "collection_requests insert" ON collection_requests;
CREATE POLICY "collection_requests insert" ON collection_requests
  FOR INSERT TO authenticated WITH CHECK (true);

DROP POLICY IF EXISTS "collection_requests update" ON collection_requests;
CREATE POLICY "collection_requests update" ON collection_requests
  FOR UPDATE TO authenticated USING (public.is_admin());

DROP POLICY IF EXISTS "collection_requests delete" ON collection_requests;
CREATE POLICY "collection_requests delete" ON collection_requests
  FOR DELETE TO authenticated USING (public.is_admin());

INSERT INTO collection_requests (request_number, location, zone, waste_type, status, requested_at, collector_name) VALUES
  ('REQ-8992', '1420 Alpha Way', 'Zone B - Commercial', 'Hazardous', 'Unassigned', now() - interval '2 hours', NULL),
  ('REQ-8991', '773 Beta Crescent', 'Zone A - Residential', 'Recyclable', 'Scheduled', now() - interval '3 hours', 'J. Miller'),
  ('REQ-8985', '902 Gamma Blvd', 'Zone C - Industrial', 'General', 'In Transit', now() - interval '1 day', 'S. Connor')
ON CONFLICT (request_number) DO NOTHING;

-- ------------------------------------------------------------
-- Recycling Records
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS recycling_records (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  log_number TEXT NOT NULL UNIQUE,
  recorded_at TIMESTAMPTZ,
  material_type TEXT NOT NULL,
  weight_kg NUMERIC(10, 2) NOT NULL,
  facility TEXT,
  status TEXT NOT NULL DEFAULT 'Verified' CHECK (status IN ('Verified', 'Pending Audit', 'Discrepancy')),
  created_at TIMESTAMPTZ DEFAULT now()
);

ALTER TABLE recycling_records ENABLE ROW LEVEL SECURITY;

DROP POLICY IF EXISTS "recycling_records select" ON recycling_records;
CREATE POLICY "recycling_records select" ON recycling_records
  FOR SELECT TO authenticated USING (true);

DROP POLICY IF EXISTS "recycling_records insert" ON recycling_records;
CREATE POLICY "recycling_records insert" ON recycling_records
  FOR INSERT TO authenticated WITH CHECK (true);

DROP POLICY IF EXISTS "recycling_records update" ON recycling_records;
CREATE POLICY "recycling_records update" ON recycling_records
  FOR UPDATE TO authenticated USING (public.is_admin());

DROP POLICY IF EXISTS "recycling_records delete" ON recycling_records;
CREATE POLICY "recycling_records delete" ON recycling_records
  FOR DELETE TO authenticated USING (public.is_admin());

INSERT INTO recycling_records (log_number, recorded_at, material_type, weight_kg, facility, status) VALUES
  ('LOG-8924', '2023-10-24 14:30:00+00', 'PET Plastic', 1250.50, 'North Processing Hub', 'Verified'),
  ('LOG-8923', '2023-10-24 11:15:00+00', 'Mixed Paper', 840.00, 'South Sorting Center', 'Verified'),
  ('LOG-8922', '2023-10-24 09:45:00+00', 'Scrap Metal', 2100.00, 'East Industrial Depot', 'Pending Audit'),
  ('LOG-8921', '2023-10-23 16:20:00+00', 'Clear Glass', 560.20, 'North Processing Hub', 'Verified'),
  ('LOG-8920', '2023-10-23 14:05:00+00', 'HDPE Plastic', 920.00, 'West Collection Point', 'Discrepancy')
ON CONFLICT (log_number) DO NOTHING;

-- ------------------------------------------------------------
-- Reports
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS reports (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  report_name TEXT NOT NULL UNIQUE,
  type TEXT NOT NULL CHECK (type IN ('Collection', 'Participation', 'Environmental')),
  generated_at TIMESTAMPTZ DEFAULT now(),
  generated_by TEXT,
  created_at TIMESTAMPTZ DEFAULT now()
);

ALTER TABLE reports ENABLE ROW LEVEL SECURITY;

DROP POLICY IF EXISTS "reports select" ON reports;
CREATE POLICY "reports select" ON reports
  FOR SELECT TO authenticated USING (true);

DROP POLICY IF EXISTS "reports insert" ON reports;
CREATE POLICY "reports insert" ON reports
  FOR INSERT TO authenticated WITH CHECK (true);

DROP POLICY IF EXISTS "reports delete" ON reports;
CREATE POLICY "reports delete" ON reports
  FOR DELETE TO authenticated USING (public.is_admin());

INSERT INTO reports (report_name, type, generated_at, generated_by) VALUES
  ('Q3 Route Efficiency Audit', 'Collection', '2023-10-24 14:30:00+00', 'System Auto'),
  ('September Resident Engagement', 'Participation', '2023-10-22 09:15:00+00', 'Jane Smith'),
  ('Annual Diversion Rate 2022', 'Environmental', '2023-10-15 11:00:00+00', 'Alex Johnson')
ON CONFLICT (report_name) DO NOTHING;

-- ------------------------------------------------------------
-- Trends / Analytics
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS monthly_volume (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  year SMALLINT NOT NULL,
  month SMALLINT NOT NULL CHECK (month BETWEEN 1 AND 12),
  total_waste_tons NUMERIC(8, 1) DEFAULT 0,
  recycled_tons NUMERIC(8, 1) DEFAULT 0,
  UNIQUE (year, month)
);

ALTER TABLE monthly_volume ENABLE ROW LEVEL SECURITY;

DROP POLICY IF EXISTS "monthly_volume select" ON monthly_volume;
CREATE POLICY "monthly_volume select" ON monthly_volume
  FOR SELECT TO authenticated USING (true);

DROP POLICY IF EXISTS "monthly_volume insert" ON monthly_volume;
CREATE POLICY "monthly_volume insert" ON monthly_volume
  FOR INSERT TO authenticated WITH CHECK (true);

INSERT INTO monthly_volume (year, month, total_waste_tons, recycled_tons) VALUES
  (2024, 1, 120.0, 45.0),
  (2024, 2, 135.0, 50.0),
  (2024, 3, 125.0, 48.0),
  (2024, 4, 145.0, 55.0),
  (2024, 5, 140.0, 60.0),
  (2024, 6, 150.0, 65.0),
  (2024, 7, 160.0, 70.0),
  (2024, 8, 155.0, 68.0),
  (2024, 9, 145.0, 65.0),
  (2024, 10, 150.0, 72.0),
  (2024, 11, 140.0, 65.0),
  (2024, 12, 135.0, 60.0)
ON CONFLICT (year, month) DO NOTHING;

CREATE TABLE IF NOT EXISTS regional_stats (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  region TEXT NOT NULL UNIQUE,
  waste_tons NUMERIC(8, 1) DEFAULT 0
);

ALTER TABLE regional_stats ENABLE ROW LEVEL SECURITY;

DROP POLICY IF EXISTS "regional_stats select" ON regional_stats;
CREATE POLICY "regional_stats select" ON regional_stats
  FOR SELECT TO authenticated USING (true);

DROP POLICY IF EXISTS "regional_stats insert" ON regional_stats;
CREATE POLICY "regional_stats insert" ON regional_stats
  FOR INSERT TO authenticated WITH CHECK (true);

INSERT INTO regional_stats (region, waste_tons) VALUES
  ('North Dist.', 320.0),
  ('South Dist.', 250.0),
  ('East Area', 180.0),
  ('West End', 210.0),
  ('Central', 450.0),
  ('Port Zone', 120.0)
ON CONFLICT (region) DO NOTHING;

CREATE TABLE IF NOT EXISTS yoy_metrics (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  category TEXT NOT NULL UNIQUE,
  tons_2023 NUMERIC(8, 1),
  tons_2024 NUMERIC(8, 1)
);

ALTER TABLE yoy_metrics ENABLE ROW LEVEL SECURITY;

DROP POLICY IF EXISTS "yoy_metrics select" ON yoy_metrics;
CREATE POLICY "yoy_metrics select" ON yoy_metrics
  FOR SELECT TO authenticated USING (true);

DROP POLICY IF EXISTS "yoy_metrics insert" ON yoy_metrics;
CREATE POLICY "yoy_metrics insert" ON yoy_metrics
  FOR INSERT TO authenticated WITH CHECK (true);

INSERT INTO yoy_metrics (category, tons_2023, tons_2024) VALUES
  ('General Waste', 850.5, 795.2),
  ('Recyclables', 410.2, 450.6),
  ('Organic', 320.0, 305.5),
  ('Hazardous', 45.8, 52.1)
ON CONFLICT (category) DO NOTHING;

-- ------------------------------------------------------------
-- App Settings
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS app_settings (
  key TEXT PRIMARY KEY,
  value JSONB,
  updated_at TIMESTAMPTZ DEFAULT now(),
  updated_by UUID REFERENCES profiles(id) ON DELETE SET NULL
);

ALTER TABLE app_settings ENABLE ROW LEVEL SECURITY;

DROP POLICY IF EXISTS "app_settings select" ON app_settings;
CREATE POLICY "app_settings select" ON app_settings
  FOR SELECT TO authenticated USING (true);

DROP POLICY IF EXISTS "app_settings insert" ON app_settings;
CREATE POLICY "app_settings insert" ON app_settings
  FOR INSERT TO authenticated WITH CHECK (public.is_admin());

DROP POLICY IF EXISTS "app_settings update" ON app_settings;
CREATE POLICY "app_settings update" ON app_settings
  FOR UPDATE TO authenticated USING (public.is_admin());

-- Seed default settings (values are read from these on the Settings page)
INSERT INTO app_settings (key, value) VALUES
  ('general', '{"org_name":"EcoWaste Municipal Div.","timezone":"UTC - Coordinated Universal Time","currency":"USD ($)","support_email":"admin@ecowaste.gov"}'),
  ('security', '{"require_mfa":true,"strict_password":true,"session_timeout":30}'),
  ('notifications', '{"high_volume":true,"collector_offline":true,"daily_summary":false,"weekly_impact":true}')
ON CONFLICT (key) DO NOTHING;