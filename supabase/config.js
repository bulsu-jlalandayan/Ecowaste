/*
 * EcoWaste - Supabase connection (single source of truth at runtime).
 *
 * This file is loaded by every portal page via <script src="../supabase/config.js">
 * and exposes two globals used across all data-layer modules:
 *   - SUPABASE_URL
 *   - SUPABASE_ANON_KEY
 *
 * Keep the values in sync with the `.env` reference file in the project root.
 *
 * NOTE on security: the anon key is intentionally PUBLIC (it lives in browser
 * code). Access control is enforced server-side by Supabase Row Level Security
 * (RLS) policies, never by hiding this key. Never put a service_role/secret
 * key here.
 */
const SUPABASE_URL = "https://mcamwtvuapjyxlzmwjmp.supabase.co";
const SUPABASE_ANON_KEY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im1jYW13dHZ1YXBqeXhsem13am1wIiwicm9sZSI6ImFub24iLCJpYXQiOjE3ODgxNzgwODEsImV4cCI6MjEwMzc1NDA4MX0.4VHkPUpV73Y564_j9wOZv0sHZsJzIwgkqwy3UI5E19Q";
