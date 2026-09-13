-- ============================================================
-- EcoWaste — Waste Report Admin Workflow Migration
-- Run in the Supabase SQL editor (repeatedly safe).
-- Adds: 5-stage workflow (Received→Review→Verify→Assign→Resolve),
-- admin RLS, collector RLS, notification triggers.
-- ============================================================

-- ------------------------------------------------------------
-- 1) Widen waste_reports status to support the full workflow
-- ------------------------------------------------------------
ALTER TABLE waste_reports DROP CONSTRAINT IF EXISTS waste_reports_status_check;
ALTER TABLE waste_reports
  ADD CONSTRAINT waste_reports_status_check
  CHECK (status IN ('Submitted','Under Review','Verified','Assigned','Resolved','Dismissed'));

-- ------------------------------------------------------------
-- 2) Add workflow columns to waste_reports
-- ------------------------------------------------------------
ALTER TABLE waste_reports ADD COLUMN IF NOT EXISTS assigned_to_name TEXT;
ALTER TABLE waste_reports ADD COLUMN IF NOT EXISTS assigned_to_id UUID REFERENCES profiles(id) ON DELETE SET NULL;
ALTER TABLE waste_reports ADD COLUMN IF NOT EXISTS resolution_note TEXT;
ALTER TABLE waste_reports ADD COLUMN IF NOT EXISTS reviewed_at TIMESTAMPTZ;
ALTER TABLE waste_reports ADD COLUMN IF NOT EXISTS verified_at TIMESTAMPTZ;
ALTER TABLE waste_reports ADD COLUMN IF NOT EXISTS assigned_at TIMESTAMPTZ;
ALTER TABLE waste_reports ADD COLUMN IF NOT EXISTS resolved_at TIMESTAMPTZ;

-- ------------------------------------------------------------
-- 3) Add report_id to notifications (for link-back)
-- ------------------------------------------------------------
ALTER TABLE notifications ADD COLUMN IF NOT EXISTS report_id UUID REFERENCES waste_reports(id) ON DELETE SET NULL;

-- ------------------------------------------------------------
-- 4) RLS on waste_reports — admin policies
--    (existing resident owner policies remain untouched)
-- ------------------------------------------------------------
DROP POLICY IF EXISTS "admin select waste reports" ON waste_reports;
CREATE POLICY "admin select waste reports"
  ON waste_reports FOR SELECT TO authenticated
  USING (public.is_admin());

DROP POLICY IF EXISTS "admin update waste reports" ON waste_reports;
CREATE POLICY "admin update waste reports"
  ON waste_reports FOR UPDATE TO authenticated
  USING (public.is_admin());

DROP POLICY IF EXISTS "admin delete waste reports" ON waste_reports;
CREATE POLICY "admin delete waste reports"
  ON waste_reports FOR DELETE TO authenticated
  USING (public.is_admin());

-- ------------------------------------------------------------
-- 5) RLS on waste_reports — collector/assignee policies
-- ------------------------------------------------------------
DROP POLICY IF EXISTS "assignee select waste reports" ON waste_reports;
CREATE POLICY "assignee select waste reports"
  ON waste_reports FOR SELECT TO authenticated
  USING (assigned_to_id = auth.uid());

DROP POLICY IF EXISTS "assignee update waste reports" ON waste_reports;
CREATE POLICY "assignee update waste reports"
  ON waste_reports FOR UPDATE TO authenticated
  USING (assigned_to_id = auth.uid());

-- ------------------------------------------------------------
-- 6) Trigger: notify collector when a waste report is assigned
-- ------------------------------------------------------------
DROP TRIGGER IF EXISTS trg_notify_collector_on_report_assign ON waste_reports;
CREATE OR REPLACE FUNCTION public.notify_collector_on_report_assign()
RETURNS TRIGGER LANGUAGE plpgsql SECURITY DEFINER SET search_path = public AS $$
BEGIN
  IF NEW.assigned_to_id IS NOT NULL
     AND OLD.assigned_to_id IS DISTINCT FROM NEW.assigned_to_id THEN
    INSERT INTO notifications (title, message, type, recipient_id, report_id)
    VALUES (
      'Waste report assigned',
      'Report ' || NEW.report_number || ' has been assigned to you for resolution.',
      'assignment',
      NEW.assigned_to_id,
      NEW.id
    );
  END IF;
  RETURN NEW;
END $$;
CREATE TRIGGER trg_notify_collector_on_report_assign
  AFTER UPDATE OF assigned_to_id ON waste_reports
  FOR EACH ROW EXECUTE FUNCTION public.notify_collector_on_report_assign();

-- ------------------------------------------------------------
-- 7) Trigger: notify resident + log activity when report is
--    resolved or dismissed (mirrors collection_completed).
-- ------------------------------------------------------------
DROP TRIGGER IF EXISTS trg_notify_resident_on_report_resolved ON waste_reports;
CREATE OR REPLACE FUNCTION public.notify_resident_on_report_resolved()
RETURNS TRIGGER LANGUAGE plpgsql SECURITY DEFINER SET search_path = public AS $$
BEGIN
  IF NEW.user_id IS NOT NULL
     AND NEW.status IN ('Resolved','Dismissed')
     AND OLD.status IS DISTINCT FROM NEW.status THEN
    -- Notification to resident
    INSERT INTO notifications (title, message, type, recipient_id, report_id)
    VALUES (
      CASE WHEN NEW.status = 'Resolved'
           THEN 'Waste report resolved'
           ELSE 'Waste report dismissed' END,
      'Report ' || NEW.report_number || ' has been ' || LOWER(NEW.status) || '.',
      'report',
      NEW.user_id,
      NEW.id
    );
    -- Activity history entry
    INSERT INTO resident_activity_history (resident_id, action, description, reference_id, report_id)
    VALUES (
      NEW.user_id,
      CASE WHEN NEW.status = 'Resolved' THEN 'report_resolved' ELSE 'report_dismissed' END,
      'Report ' || NEW.report_number || ' ' || LOWER(NEW.status),
      NEW.report_number,
      NEW.id
    );
  END IF;
  RETURN NEW;
END $$;
CREATE TRIGGER trg_notify_resident_on_report_resolved
  AFTER UPDATE OF status ON waste_reports
  FOR EACH ROW EXECUTE FUNCTION public.notify_resident_on_report_resolved();
