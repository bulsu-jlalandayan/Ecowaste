-- ============================================================
-- EcoWaste — Resident Portal Supabase Query
-- Run in the Supabase SQL editor (repeatedly safe).
-- Unlocks the resident workflows (Dashboard, Report Waste, Request
-- Collection, My Requests, Schedule, Activity History, Notifications,
-- Profile) and enables Supabase Storage uploads for report photos.
-- ============================================================

-- ------------------------------------------------------------
-- 1) collection_requests: link each request to the resident who
--    created it and store the extra fields collected by the
--    resident "Request Collection" wizard.
-- ------------------------------------------------------------
ALTER TABLE collection_requests ADD COLUMN IF NOT EXISTS user_id UUID REFERENCES profiles(id) ON DELETE CASCADE;
ALTER TABLE collection_requests ADD COLUMN IF NOT EXISTS description TEXT;
ALTER TABLE collection_requests ADD COLUMN IF NOT EXISTS photo_url TEXT;
ALTER TABLE collection_requests ADD COLUMN IF NOT EXISTS address_detail TEXT;
ALTER TABLE collection_requests ADD COLUMN IF NOT EXISTS scheduled_date DATE;
ALTER TABLE collection_requests ADD COLUMN IF NOT EXISTS time_start TIME;
ALTER TABLE collection_requests ADD COLUMN IF NOT EXISTS time_end TIME;

-- Widen the waste_type check to cover the resident wizard choices
-- (General Household, Recyclables, Organic/Green, Bulky, Hazardous).
ALTER TABLE collection_requests DROP CONSTRAINT IF EXISTS collection_requests_waste_type_check;
DO $$
BEGIN       
  IF EXISTS (
    SELECT 1 FROM information_schema.columns
    WHERE table_name = 'collection_requests' AND column_name = 'waste_type'
  ) THEN
    ALTER TABLE collection_requests
      ADD CONSTRAINT collection_requests_waste_type_check
      CHECK (waste_type IN ('General', 'Recyclable', 'Hazardous', 'Organic', 'Household', 'Bulky', 'E-Waste'));
  END IF;
END $$;

-- Allow a resident to insert their own requests and read their own requests.
-- (Admins/collectors keep their existing select-all policy.)
DROP POLICY IF EXISTS "resident insert own request" ON collection_requests;
CREATE POLICY "resident insert own request" ON collection_requests
  FOR INSERT TO authenticated
  WITH CHECK (user_id = auth.uid());

-- ------------------------------------------------------------
-- 2) waste_reports table (the "Report Waste" form)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS waste_reports (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  report_number TEXT NOT NULL UNIQUE,
  user_id UUID REFERENCES profiles(id) ON DELETE CASCADE,
  waste_category TEXT NOT NULL,
  report_type TEXT NOT NULL,
  description TEXT,
  address TEXT,
  photo_url TEXT,
  observed_at TIMESTAMPTZ,
  status TEXT NOT NULL DEFAULT 'Submitted' CHECK (status IN ('Submitted', 'Under Review', 'Resolved', 'Dismissed')),
  created_at TIMESTAMPTZ DEFAULT now()
);

ALTER TABLE waste_reports ENABLE ROW LEVEL SECURITY;

DROP POLICY IF EXISTS "resident insert own report" ON waste_reports;
CREATE POLICY "resident insert own report" ON waste_reports
  FOR INSERT TO authenticated
  WITH CHECK (user_id = auth.uid());

DROP POLICY IF EXISTS "resident select own report" ON waste_reports;
CREATE POLICY "resident select own report" ON waste_reports
  FOR SELECT TO authenticated
  USING (user_id = auth.uid());

DROP POLICY IF EXISTS "resident update own report" ON waste_reports;
CREATE POLICY "resident update own report" ON waste_reports
  FOR UPDATE TO authenticated
  USING (user_id = auth.uid());

-- Auto-generate report numbers for resident submissions.
CREATE SEQUENCE IF NOT EXISTS report_number_seq START 8000;

-- Populate report_number from the sequence when a row is inserted without one.
CREATE OR REPLACE FUNCTION public.assign_waste_report_number()
RETURNS TRIGGER LANGUAGE plpgsql SET search_path = public AS $$
BEGIN
  IF NEW.report_number IS NULL OR NEW.report_number = '' THEN
    NEW.report_number := 'REP-' || nextval('report_number_seq');
  END IF;
  RETURN NEW;
END $$;

DROP TRIGGER IF EXISTS trg_waste_report_number ON waste_reports;
CREATE TRIGGER trg_waste_report_number
  BEFORE INSERT ON waste_reports
  FOR EACH ROW EXECUTE FUNCTION public.assign_waste_report_number();

-- ------------------------------------------------------------
-- 3) collection_schedules table (the resident "Schedule" view).
--    Seeded with sample recurring collection days per zone.
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS collection_schedules (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  zone TEXT NOT NULL,
  waste_type TEXT NOT NULL,
  collection_date DATE NOT NULL,
  time_start TIME,
  time_end TIME,
  status TEXT NOT NULL DEFAULT 'Scheduled' CHECK (status IN ('Scheduled', 'Confirmed', 'Completed', 'Cancelled')),
  notes TEXT,
  created_at TIMESTAMPTZ DEFAULT now()
);

ALTER TABLE collection_schedules ENABLE ROW LEVEL SECURITY;

DROP POLICY IF EXISTS "collection_schedules select" ON collection_schedules;
CREATE POLICY "collection_schedules select" ON collection_schedules
  FOR SELECT TO authenticated USING (true);

-- Seed sample schedules (idempotent). Based on the current month.
INSERT INTO collection_schedules (zone, waste_type, collection_date, time_start, time_end, status, notes)
SELECT zone, waste_type, collection_date, time_start::time, time_end::time, status, notes
FROM (VALUES
  ('Zone A - Residential', 'General Waste',  CURRENT_DATE + (7 - EXTRACT(DOW FROM CURRENT_DATE)::int) % 7, TIME '08:00', TIME '12:00', 'Confirmed', 'Weekly Household collection'),
  ('Zone A - Residential', 'Recyclables',    CURRENT_DATE + (9 - EXTRACT(DOW FROM CURRENT_DATE)::int) % 7, TIME '08:00', TIME '12:00', 'Scheduled', 'Weekly recycling pickup'),
  ('Zone A - Residential', 'Organic',        CURRENT_DATE + (11 - EXTRACT(DOW FROM CURRENT_DATE)::int) % 7, TIME '12:00', TIME '16:00', 'Scheduled', 'Weekly compost/green collection'),
  ('Zone B - Commercial',  'General Waste',  CURRENT_DATE + (6 - EXTRACT(DOW FROM CURRENT_DATE)::int) % 7, TIME '07:00', TIME '11:00', 'Confirmed', 'Commercial household collection'),
  ('Zone B - Commercial',  'Recyclables',    CURRENT_DATE + (8 - EXTRACT(DOW FROM CURRENT_DATE)::int) % 7, TIME '07:00', TIME '11:00', 'Scheduled', 'Commercial recycling pickup')
) AS s(zone, waste_type, collection_date, time_start, time_end, status, notes)
WHERE NOT EXISTS (SELECT 1 FROM collection_schedules);

-- ------------------------------------------------------------
-- 4) resident_activity_history table (resident timeline).
--    Kept SEPARATE from the collector + admin activity tables.
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS resident_activity_history (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  resident_id UUID REFERENCES profiles(id) ON DELETE CASCADE,
  action TEXT NOT NULL,
  description TEXT,
  reference_id TEXT,
  request_id UUID REFERENCES collection_requests(id) ON DELETE SET NULL,
  report_id UUID REFERENCES waste_reports(id) ON DELETE SET NULL,
  created_at TIMESTAMPTZ DEFAULT now()
);

ALTER TABLE resident_activity_history ENABLE ROW LEVEL SECURITY;

DROP POLICY IF EXISTS "resident_activity select own" ON resident_activity_history;
CREATE POLICY "resident_activity select own" ON resident_activity_history
  FOR SELECT TO authenticated
  USING (resident_id = auth.uid());

DROP POLICY IF EXISTS "resident_activity insert own" ON resident_activity_history;
CREATE POLICY "resident_activity insert own" ON resident_activity_history
  FOR INSERT TO authenticated
  WITH CHECK (resident_id = auth.uid());

-- Log a timeline entry when a resident creates a collection request.
DROP TRIGGER IF EXISTS trg_res_activity_on_request ON collection_requests;
CREATE OR REPLACE FUNCTION public.log_resident_request()
RETURNS TRIGGER LANGUAGE plpgsql SECURITY DEFINER SET search_path = public AS $$
BEGIN
  IF NEW.user_id IS NOT NULL THEN
    INSERT INTO resident_activity_history (resident_id, action, description, reference_id, request_id)
    VALUES (NEW.user_id, 'request_submitted',
            'Collection request ' || NEW.request_number || ' submitted (' || NEW.waste_type || ')',
            NEW.request_number, NEW.id);
  END IF;
  RETURN NEW;
END $$;
CREATE TRIGGER trg_res_activity_on_request
  AFTER INSERT ON collection_requests
  FOR EACH ROW EXECUTE FUNCTION public.log_resident_request();

-- Log a timeline entry when a resident submits a waste report.
DROP TRIGGER IF EXISTS trg_res_activity_on_report ON waste_reports;
CREATE OR REPLACE FUNCTION public.log_resident_report()
RETURNS TRIGGER LANGUAGE plpgsql SECURITY DEFINER SET search_path = public AS $$
BEGIN
  IF NEW.user_id IS NOT NULL THEN
    INSERT INTO resident_activity_history (resident_id, action, description, reference_id, report_id)
    VALUES (NEW.user_id, 'report_submitted',
            'Waste report ' || NEW.report_number || ' submitted (' || NEW.report_type || ')',
            NEW.report_number, NEW.id);
  END IF;
  RETURN NEW;
END $$;
CREATE TRIGGER trg_res_activity_on_report
  AFTER INSERT ON waste_reports
  FOR EACH ROW EXECUTE FUNCTION public.log_resident_report();

-- ------------------------------------------------------------
-- 5) resident_preferences table (Profile page settings).
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS resident_preferences (
  user_id UUID PRIMARY KEY REFERENCES profiles(id) ON DELETE CASCADE,
  notification_reminders BOOLEAN DEFAULT true,
  collection_reminders BOOLEAN DEFAULT true,
  language TEXT DEFAULT 'English',
  updated_at TIMESTAMPTZ DEFAULT now()
);

ALTER TABLE resident_preferences ENABLE ROW LEVEL SECURITY;

DROP POLICY IF EXISTS "resident_preferences select own" ON resident_preferences;
CREATE POLICY "resident_preferences select own" ON resident_preferences
  FOR SELECT TO authenticated
  USING (user_id = auth.uid());

DROP POLICY IF EXISTS "resident_preferences insert own" ON resident_preferences;
CREATE POLICY "resident_preferences insert own" ON resident_preferences
  FOR INSERT TO authenticated
  WITH CHECK (user_id = auth.uid());

DROP POLICY IF EXISTS "resident_preferences update own" ON resident_preferences;
CREATE POLICY "resident_preferences update own" ON resident_preferences
  FOR UPDATE TO authenticated
  USING (user_id = auth.uid());

-- ------------------------------------------------------------
-- 6) Let residents update their own profile fields
--    (full_name, phone, address) via the Profile page.
-- ------------------------------------------------------------
ALTER TABLE profiles ADD COLUMN IF NOT EXISTS phone TEXT;
ALTER TABLE profiles ADD COLUMN IF NOT EXISTS address TEXT;

DROP POLICY IF EXISTS "resident update own profile" ON profiles;
CREATE POLICY "resident update own profile" ON profiles
  FOR UPDATE TO authenticated
  USING (id = auth.uid())
  WITH CHECK (id = auth.uid());

-- ------------------------------------------------------------
-- 7) Notifications for residents (reuse the existing notifications
--    table + RLS; residents are already covered by recipient_id = uid).
--    Notify the resident when one of their requests is completed.
-- ------------------------------------------------------------
DROP TRIGGER IF EXISTS trg_res_notify_on_complete ON collection_requests;
CREATE OR REPLACE FUNCTION public.notify_resident_on_complete()
RETURNS TRIGGER LANGUAGE plpgsql SECURITY DEFINER SET search_path = public AS $$
BEGIN
  IF NEW.user_id IS NOT NULL
     AND NEW.status = 'Completed'
     AND OLD.status IS DISTINCT FROM NEW.status THEN
    INSERT INTO notifications (title, message, type, recipient_id, request_id)
    VALUES ('Collection completed',
            'Your request ' || NEW.request_number || ' has been completed. Thank you for helping keep our community clean!',
            'collection',
            NEW.user_id,
            NEW.id);
    INSERT INTO resident_activity_history (resident_id, action, description, reference_id, request_id)
    VALUES (NEW.user_id, 'collection_completed',
            'Collection completed for request ' || NEW.request_number,
            NEW.request_number, NEW.id);
  END IF;
  RETURN NEW;
END $$;
CREATE TRIGGER trg_res_notify_on_complete
  AFTER UPDATE OF status ON collection_requests
  FOR EACH ROW EXECUTE FUNCTION public.notify_resident_on_complete();

-- ------------------------------------------------------------
-- 8) Supabase Storage for Report Waste photos.
--    Creates a public bucket and allows authenticated users to
--    upload/read their own evidence files.
-- ------------------------------------------------------------
INSERT INTO storage.buckets (id, name, public)
VALUES ('waste-reports', 'waste-reports', true)
ON CONFLICT (id) DO NOTHING;

DROP POLICY IF EXISTS "residents upload own reports" ON storage.objects;
CREATE POLICY "residents upload own reports" ON storage.objects
  FOR INSERT TO authenticated
  WITH CHECK (bucket_id = 'waste-reports' AND (storage.foldername(name))[1] = auth.uid()::text);

DROP POLICY IF EXISTS "residents read own reports" ON storage.objects;
CREATE POLICY "residents read own reports" ON storage.objects
  FOR SELECT TO authenticated
  USING (bucket_id = 'waste-reports');

DROP POLICY IF EXISTS "public read reports" ON storage.objects;
CREATE POLICY "public read reports" ON storage.objects
  FOR SELECT TO anon
  USING (bucket_id = 'waste-reports');
