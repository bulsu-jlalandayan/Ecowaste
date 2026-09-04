(function () {
  "use strict";

  // Shared Supabase access helpers for the admin panel views.
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

    add: function (table, body) {
      return this.req("POST", "/rest/v1/" + table, body);
    },

    update: function (table, filter, body) {
      return this.req("PATCH", "/rest/v1/" + table + "?" + filter, body);
    },

    remove: function (table, filter) {
      return this.req("DELETE", "/rest/v1/" + table + "?" + filter, null);
    },

    signup: async function (email, password, meta) {
      var res = await fetch(SUPABASE_URL + "/auth/v1/signup", {
        method: "POST",
        headers: { "Content-Type": "application/json", "apikey": SUPABASE_ANON_KEY },
        body: JSON.stringify({ email: email, password: password, data: meta || {} })
      });
      var data = await res.json();
      if (!res.ok) throw new Error(data.error_description || data.msg || "Signup failed.");
      return data;
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

    list: function (table, select, order, filter) {
      var q = "/rest/v1/" + table + "?select=" + encodeURIComponent(select);
      if (order) q += "&order=" + encodeURIComponent(order);
      if (filter) q += "&" + filter;
      return this.request(q);
    },

    count: async function (table, filter) {
      var q = "/rest/v1/" + table + "?select=id";
      if (filter) q += "&" + filter;
      var res = await fetch(SUPABASE_URL + q, {
        headers: Object.assign({}, this.headers(), { "Prefer": "count=exact" })
      });
      if (!res.ok) {
        throw new Error("Supabase request failed (" + res.status + "): " + res.statusText);
      }
      await res.arrayBuffer();
      var cr = res.headers.get("content-range") || "";
      var m = /^\d+-(\d+)\/(\d+)$/.exec(cr.trim());
      if (m) return Number(m[2]);
      return 0;
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

    fmtNum: function (n) {
      if (n === null || n === undefined || isNaN(Number(n))) return "0";
      var num = Number(n);
      return num.toLocaleString(undefined, { maximumFractionDigits: 1 });
    },

    // ---- Export helpers -------------------------------------------------
    csvCell: function (v) {
      var s = v === null || v === undefined ? "" : String(v);
      if (/["\n\r,]/.test(s)) s = '"' + s.replace(/"/g, '""') + '"';
      return s;
    },

    exportCSV: function (filename, headers, rows) {
      var lines = [headers.map(this.csvCell).join(",")];
      rows.forEach(function (r) {
        lines.push(headers.map(function (h) {
          return this.csvCell(r[h]);
        }, this).join(","));
      }, this);
      this.exportBlob(filename, lines.join("\r\n"), "text/csv;charset=utf-8;");
    },

    exportJSON: function (filename, data) {
      this.exportBlob(filename, JSON.stringify(data, null, 2), "application/json;charset=utf-8;");
    },

    exportBlob: function (filename, contents, mime) {
      var blob = new Blob([contents], { type: mime || "text/plain;charset=utf-8;" });
      var url = URL.createObjectURL(blob);
      var a = document.createElement("a");
      a.href = url;
      a.download = filename;
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      setTimeout(function () { URL.revokeObjectURL(url); }, 500);
    },

    // ---- Settings store (app_settings table) ----------------------------
    settings: {
      all: async function () {
        return this._data.list("app_settings", "key,value");
      },
      set: async function (key, value) {
        return this._data.reqHeaders("POST", "/rest/v1/app_settings?on_conflict=key", {
          key: key,
          value: value,
          updated_at: new Date().toISOString(),
          updated_by: this._data.currentUserId()
        }, { "Prefer": "resolution=merge-duplicates" });
      }
    },

    // ---- Account updates (Profile page) ---------------------------------
    updateAccount: function (body) {
      return this.req("PATCH", "/auth/v1/user", body);
    }
  };
  window.EcoWasteData.settings._data = window.EcoWasteData;
})();