-- ============================================================
-- Ecowaste Resident Features Migration
-- 1. Add avatar_url to profiles (for profile picture upload)
-- 2. Create avatars storage bucket + policies
-- 3. Create collection_request_items junction table (multi-select
--    waste types, hybrid approach)
-- ============================================================

-- ------------------------------------------------------------
-- 1. Profile picture: avatar_url column
-- ------------------------------------------------------------
ALTER TABLE profiles ADD COLUMN IF NOT EXISTS avatar_url TEXT;

-- ------------------------------------------------------------
-- 2. Avatars storage bucket + policies
-- ------------------------------------------------------------
INSERT INTO storage.buckets (id, name, public)
VALUES ('avatars', 'avatars', true)
ON CONFLICT (id) DO NOTHING;

DROP POLICY IF EXISTS "Avatar upload own" ON storage.objects;
CREATE POLICY "Avatar upload own" ON storage.objects
  FOR INSERT TO authenticated
  WITH CHECK (bucket_id = 'avatars' AND (storage.foldername(name))[1] = auth.uid()::text);

DROP POLICY IF EXISTS "Avatar public read" ON storage.objects;
CREATE POLICY "Avatar public read" ON storage.objects
  FOR SELECT USING (bucket_id = 'avatars');

DROP POLICY IF EXISTS "Avatar update own" ON storage.objects;
CREATE POLICY "Avatar update own" ON storage.objects
  FOR UPDATE TO authenticated
  USING (bucket_id = 'avatars' AND (storage.foldername(name))[1] = auth.uid()::text);

DROP POLICY IF EXISTS "Avatar delete own" ON storage.objects;
CREATE POLICY "Avatar delete own" ON storage.objects
  FOR DELETE TO authenticated
  USING (bucket_id = 'avatars' AND (storage.foldername(name))[1] = auth.uid()::text);

-- ------------------------------------------------------------
-- 3. collection_request_items junction table
--    (hybrid: waste_type on collection_requests is kept as the
--    primary/legacy type; all selected types go here)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS collection_request_items (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  request_id UUID NOT NULL REFERENCES collection_requests(id) ON DELETE CASCADE,
  waste_type TEXT NOT NULL CHECK (waste_type IN ('General', 'Recyclable', 'Hazardous', 'Organic', 'Household', 'Bulky', 'E-Waste')),
  created_at TIMESTAMPTZ DEFAULT now(),
  UNIQUE (request_id, waste_type)
);

ALTER TABLE collection_request_items ENABLE ROW LEVEL SECURITY;

DROP POLICY IF EXISTS "cri select" ON collection_request_items;
CREATE POLICY "cri select" ON collection_request_items
  FOR SELECT TO authenticated USING (true);

DROP POLICY IF EXISTS "cri insert" ON collection_request_items;
CREATE POLICY "cri insert" ON collection_request_items
  FOR INSERT TO authenticated WITH CHECK (true);

DROP POLICY IF EXISTS "cri delete" ON collection_request_items;
CREATE POLICY "cri delete" ON collection_request_items
  FOR DELETE TO authenticated USING (public.is_admin());
  