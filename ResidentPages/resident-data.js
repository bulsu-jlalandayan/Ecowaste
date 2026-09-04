(function () {
  "use strict";

  // Shared Supabase access helpers for the resident portal.
  window.EcoWasteData = {
    headers: function () {
      var token = localStorage.getItem("sb-access-token");
      var h = {
        "apikey": SUPABASE_ANON_KEY,
        "Content-Type": "application/json"
      };
      if (token) h["Authorization"] = "Bearer " + token;
      return h;
    },

    request: async function (path) {
      var res = await fetch(SUPABASE_URL + path, { headers: this.headers() });
      if (!res.ok) {
        throw new Error("Supabase request failed (" + res.status + "): " + res.statusText);
      }
      return res.json();
    },

    req: async function (method, path, body) {
      return this.reqHeaders(method, path, body, null);
    },

    reqHeaders: async function (method, path, body, extraHeaders) {
      var headers = this.headers();
      if (extraHeaders) {
        Object.keys(extraHeaders).forEach(function (k) {
          headers[k] = extraHeaders[k];
        });
      }
      var opts = { method: method, headers: headers };
      if (body !== undefined) {
        opts.body = JSON.stringify(body);
      }
      var res = await fetch(SUPABASE_URL + path, opts);
      if (!res.ok) {
        var msg = "Request failed (" + res.status + ")";
        try {
          var errData = await res.json();
          if (errData && (errData.message || errData.error_description || errData.msg)) {
            msg = errData.message || errData.error_description || errData.msg;
          }
        } catch (e) { /* keep generic message */ }
        throw new Error(msg);
      }
      var text = await res.text();
      return text ? JSON.parse(text) : null;
    },

    reqUpsert: function (method, path, body) {
      return this.reqHeaders(method, path, body, { "Prefer": "resolution=merge-duplicates" });
    },

    add: function (table, body) {
      return this.req("POST", "/rest/v1/" + table, body);
    },

    update: function (table, filter, body) {
      return this.req("PATCH", "/rest/v1/" + table + "?" + filter, body);
    },

    remove: function (table, filter) {
      return this.req("DELETE", "/rest/v1/" + table + "?" + filter, null);
    },

    list: function (table, select, order, filter) {
      var q = "/rest/v1/" + table + "?select=" + encodeURIComponent(select);
      if (order) q += "&order=" + encodeURIComponent(order);
      if (filter) q += "&" + filter;
      return this.request(q);
    },

    count: async function (table, filter) {
      var q = "/rest/v1/" + table + "?select=id";
      if (filter) q += "&" + filter;
      var rows = await this.request(q);
      return rows.length;
    },

    currentUserId: function () {
      var token = localStorage.getItem("sb-access-token");
      if (!token) return null;
      try {
        var payload = JSON.parse(
          atob(token.split(".")[1].replace(/-/g, "+").replace(/_/g, "/"))
        );
        return payload.sub || null;
      } catch (e) {
        return null;
      }
    },

    esc: function (s) {
      if (s === null || s === undefined) return "";
      return String(s).replace(/[&<>"']/g, function (c) {
        return { "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#39;" }[c];
      });
    },

    initials: function (name) {
      return String(name || "?")
        .split(/\s+/)
        .map(function (w) { return w.charAt(0); })
        .join("")
        .slice(0, 2)
        .toUpperCase();
    },

    fmtDate: function (iso) {
      if (!iso) return "—";
      var d = new Date(iso);
      if (isNaN(d.getTime())) return "—";
      return d.toLocaleString(undefined, {
        month: "short", day: "numeric", year: "numeric",
        hour: "numeric", minute: "2-digit"
      });
    },

    fmtDay: function (d) {
      if (!d) return "—";
      var date = d instanceof Date ? d : new Date(d);
      if (isNaN(date.getTime())) return "—";
      return date.toLocaleDateString(undefined, {
        weekday: "long", month: "short", day: "numeric", year: "numeric"
      });
    },

    fmtTime: function (t) {
      if (!t) return "";
      var parts = String(t).split(":");
      if (parts.length < 2) return t;
      var h = parseInt(parts[0], 10);
      var m = parts[1];
      var ampm = h >= 12 ? "PM" : "AM";
      h = h % 12; if (h === 0) h = 12;
      return h + ":" + m + " " + ampm;
    },

    fmtNum: function (n) {
      if (n === null || n === undefined || isNaN(Number(n))) return "0";
      return Number(n).toLocaleString(undefined, { maximumFractionDigits: 1 });
    },

    updateAccount: function (body) {
      return this.req("PATCH", "/auth/v1/user", body);
    },

    // ---- Storage (Supabase Storage for report/evidence photos) ----
    upload: async function (file, folder) {
      folder = folder || "waste-reports";
      var uid = this.currentUserId();
      var path = uid + "/" + Date.now() + "_" + file.name.replace(/[^\w.\-]/g, "_");
      var res = await fetch(SUPABASE_URL + "/storage/v1/object/" + folder + "/" + path, {
        method: "POST",
        headers: { "apikey": SUPABASE_ANON_KEY, "Authorization": "Bearer " + (localStorage.getItem("sb-access-token") || ""), "Content-Type": file.type || "application/octet-stream" },
        body: file
      });
      var out = await res.json();
      if (!res.ok) {
        throw new Error(out.message || out.error || "Upload failed.");
      }
      return SUPABASE_URL + "/storage/v1/object/public/" + folder + "/" + (out.Key || path);
    },

    // ---- app_settings store (shared with collector + admin panels) ----
    settings: {
      all: async function () {
        return this._data.list("app_settings", "key,value");
      },
      set: async function (key, value) {
        return this._data.reqUpsert("POST", "/rest/v1/app_settings?on_conflict=key", {
          key: key,
          value: value,
          updated_at: new Date().toISOString(),
          updated_by: this._data.currentUserId()
        });
      }
    },

    // ---- ID generation ----
    nextNumber: async function (prefix, table) {
      var rows = await this.list(table, "id", null, "order=" + prefix) // no-op to keep API shape
        .catch(function () { return []; });
      var count = Array.isArray(rows) && rows.length ? rows.length : 0;
      // Fall back to the sequence offsets defined in SQL if listing fails.
      return prefix + "-" + (1000 + Math.floor(Math.random() * 9000));
    }
  };
  window.EcoWasteData.settings._data = window.EcoWasteData;
})();
