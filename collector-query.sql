-- ============================================================
-- EcoWaste — Collector Portal Supabase Query
-- Run in the Supabase SQL editor (repeatedly safe).
-- Unlocks the collector workflows for BOTH the desktop and mobile collector portals.
-- ============================================================

-- ============================================================
-- 1) Let the assigned collector update their own requests
--    (Scheduled -> In Transit -> Completed). Admins keep their
--    existing "collection_requests update" policy.
-- ============================================================
DROP POLICY IF EXISTS "collector_update_own_requests" ON collection_requests;
CREATE POLICY "collector_update_own_requests" ON collection_requests
  FOR UPDATE TO authenticated
  USING (auth.uid() = collector_id);

-- ============================================================
-- 2) Recycling records: link to the request + collector and
--    store the fields the Waste Records form collects.
-- ============================================================
ALTER TABLE recycling_records ADD COLUMN IF NOT EXISTS collector_id UUID REFERENCES profiles(id) ON DELETE SET NULL;
ALTER TABLE recycling_records ADD COLUMN IF NOT EXISTS request_id   UUID REFERENCES collection_requests(id) ON DELETE SET NULL;
ALTER TABLE recycling_records ADD COLUMN IF NOT EXISTS unit         TEXT;
ALTER TABLE recycling_records ADD COLUMN IF NOT EXISTS quantity_type TEXT;
ALTER TABLE recycling_records ADD COLUMN IF NOT EXISTS condition_t  TEXT;
ALTER TABLE recycling_records ADD COLUMN IF NOT EXISTS notes        TEXT;
ALTER TABLE recycling_records ADD COLUMN IF NOT EXISTS proof_url    TEXT;

-- ============================================================
-- 3) Notifications table (collector notifications)
-- ============================================================
CREATE TABLE IF NOT EXISTS notifications (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  title TEXT NOT NULL,
  message TEXT,
  type TEXT NOT NULL DEFAULT 'info',
  recipient_id UUID REFERENCES profiles(id) ON DELETE CASCADE,
  request_id UUID REFERENCES collection_requests(id) ON DELETE SET NULL,
  read_at TIMESTAMPTZ,
  created_at TIMESTAMPTZ DEFAULT now()
);

ALTER TABLE notifications ENABLE ROW LEVEL SECURITY;

DROP POLICY IF EXISTS "notifications select own" ON notifications;
CREATE POLICY "notifications select own" ON notifications
  FOR SELECT TO authenticated
  USING (recipient_id = auth.uid());

DROP POLICY IF EXISTS "notifications update own" ON notifications;
CREATE POLICY "notifications update own" ON notifications
  FOR UPDATE TO authenticated
  USING (recipient_id = auth.uid());

-- Auto-notify a collector when a request is assigned to them.
DROP TRIGGER IF EXISTS trg_notify_on_assign ON collection_requests;
CREATE OR REPLACE FUNCTION public.notify_on_assign()
RETURNS TRIGGER LANGUAGE plpgsql SECURITY DEFINER SET search_path = public AS $$
BEGIN
  IF NEW.collector_id IS NOT NULL
     AND (OLD.collector_id IS DISTINCT FROM NEW.collector_id OR OLD.status = 'Unassigned') THEN
    INSERT INTO notifications (title, message, type, recipient_id, request_id)
    VALUES (
      'New collection request assigned',
      'Request ' || NEW.request_number || ' has been assigned to you. Please review the details.',
      'assignment',
      NEW.collector_id,
      NEW.id
    );
  END IF;
  RETURN NEW;
END $$;
CREATE TRIGGER trg_notify_on_assign
  AFTER UPDATE OF collector_id, status ON collection_requests
  FOR EACH ROW EXECUTE FUNCTION public.notify_on_assign();

-- ============================================================
-- 4) Activity history table (collector timeline)
-- ============================================================
CREATE TABLE IF NOT EXISTS activity_history (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  collector_id UUID REFERENCES profiles(id) ON DELETE CASCADE,
  action TEXT NOT NULL,
  description TEXT,
  request_id UUID REFERENCES collection_requests(id) ON DELETE SET NULL,
  created_at TIMESTAMPTZ DEFAULT now()
);

ALTER TABLE activity_history ENABLE ROW LEVEL SECURITY;

DROP POLICY IF EXISTS "activity_history select own" ON activity_history;
CREATE POLICY "activity_history select own" ON activity_history
  FOR SELECT TO authenticated
  USING (collector_id = auth.uid());

-- Log a timeline entry when the collector starts a collection.
DROP TRIGGER IF EXISTS trg_activity_on_start ON collection_requests;
CREATE OR REPLACE FUNCTION public.log_collection_started()
RETURNS TRIGGER LANGUAGE plpgsql SECURITY DEFINER SET search_path = public AS $$
BEGIN
  IF NEW.collector_id IS NOT NULL
     AND NEW.status = 'In Transit'
     AND OLD.status IS DISTINCT FROM NEW.status THEN
    INSERT INTO activity_history (collector_id, action, description, request_id)
    VALUES (NEW.collector_id, 'collection_started',
            'Collection started for request ' || NEW.request_number, NEW.id);
  END IF;
  RETURN NEW;
END $$;
CREATE TRIGGER trg_activity_on_start
  AFTER UPDATE OF status ON collection_requests
  FOR EACH ROW EXECUTE FUNCTION public.log_collection_started();

-- Log a timeline entry when the collector completes a collection.
DROP TRIGGER IF EXISTS trg_activity_on_complete ON collection_requests;
CREATE OR REPLACE FUNCTION public.log_collection_completed()
RETURNS TRIGGER LANGUAGE plpgsql SECURITY DEFINER SET search_path = public AS $$
BEGIN
  IF NEW.collector_id IS NOT NULL
     AND NEW.status = 'Completed'
     AND OLD.status IS DISTINCT FROM NEW.status THEN
    INSERT INTO activity_history (collector_id, action, description, request_id)
    VALUES (NEW.collector_id, 'collection_completed',
            'Collection completed for request ' || NEW.request_number, NEW.id);
  END IF;
  RETURN NEW;
END $$;
CREATE TRIGGER trg_activity_on_complete
  AFTER UPDATE OF status ON collection_requests
  FOR EACH ROW EXECUTE FUNCTION public.log_collection_completed();

-- Log a timeline entry when the collector saves a waste record.
DROP TRIGGER IF EXISTS trg_activity_on_record ON recycling_records;
CREATE OR REPLACE FUNCTION public.log_waste_recorded()
RETURNS TRIGGER LANGUAGE plpgsql SECURITY DEFINER SET search_path = public AS $$
BEGIN
  IF NEW.collector_id IS NOT NULL THEN
    INSERT INTO activity_history (collector_id, action, description, request_id)
    VALUES (NEW.collector_id, 'waste_recorded',
            'Waste quantity recorded (' || NEW.weight_kg || ' ' || COALESCE(NEW.unit, 'kg') || ' of '
              || COALESCE(NEW.material_type, 'waste') || ')', NEW.request_id);
  END IF;
  RETURN NEW;
END $$;
CREATE TRIGGER trg_activity_on_record
  AFTER INSERT ON recycling_records
  FOR EACH ROW EXECUTE FUNCTION public.log_waste_recorded();

-- ============================================================
-- 5) App settings (Mobile Settings view)
--    app_settings INSERT/UPDATE are admin-only; scoping by key
--    lets collectors persist their own "collector_settings" row
--    while keeping the shared settings table safe.
-- ============================================================
DROP POLICY IF EXISTS "app_settings collector insert own key" ON app_settings;
CREATE POLICY "app_settings collector insert own key" ON app_settings
  FOR INSERT TO authenticated
  WITH CHECK (key = 'collector_settings');

DROP POLICY IF EXISTS "app_settings collector update own key" ON app_settings;
CREATE POLICY "app_settings collector update own key" ON app_settings
  FOR UPDATE TO authenticated
  USING (key = 'collector_settings');