        -- ============================================================
        -- EcoWaste - Collector Records Migration
        -- Run in the Supabase SQL editor (repeatedly safe).
        --
        -- 1) Adds `collection_status` to recycling_records so collectors
        --    can tag a saved record as 'In Process' or 'Completed'.
        -- 2) Lets the assigned collector update their own waste records
        --    (needed to keep records viewable and editable after saving).
        -- ============================================================

        ALTER TABLE recycling_records
          ADD COLUMN IF NOT EXISTS collection_status TEXT
          CHECK (collection_status IN ('In Process', 'Completed'));

        -- ============================================================
        -- 1) Let the assigned collector update their own records.
        --    Admins keep their existing "recycling_records update" policy.
        -- ============================================================
        DROP POLICY IF EXISTS "collector_update_own_records" ON recycling_records;
        CREATE POLICY "collector_update_own_records" ON recycling_records
          FOR UPDATE TO authenticated
          USING (auth.uid() = collector_id);