(function () {
  "use strict";

  // Gate the Collector portals (desktop + mobile) to signed-in collectors.
  function hasCollectorSession() {
    var token = localStorage.getItem("sb-access-token");
    var role = localStorage.getItem("user-role");
    return !!token && role === "collector";
  }

  function clearSession() {
    localStorage.removeItem("sb-access-token");
    localStorage.removeItem("sb-refresh-token");
    localStorage.removeItem("user-role");
  }

  function currentUserId() {
    var token = localStorage.getItem("sb-access-token");
    if (!token) return null;
    try {
      return JSON.parse(atob(token.split(".")[1].replace(/-/g, "+").replace(/_/g, "/"))).sub || null;
    } catch (e) {
      return null;
    }
  }

  function redirectToLogin() {
    clearSession();
    window.location.replace("../Authentication/Login.html");
  }

  document.addEventListener("DOMContentLoaded", function () {
    if (!hasCollectorSession()) {
      redirectToLogin();
      return;
    }

    var uid = currentUserId();
    if (!uid) return;

    fetch(SUPABASE_URL + "/rest/v1/profiles?select=status&id=eq." + uid, {
      headers: {
        "apikey": SUPABASE_ANON_KEY,
        "Authorization": "Bearer " + localStorage.getItem("sb-access-token"),
      },
    })
      .then(function (res) { return res.json(); })
      .then(function (rows) {
        if (!Array.isArray(rows) || rows.length === 0 || rows[0].status === "Inactive") {
          redirectToLogin();
        }
      })
      .catch(function () { /* network errors should not lock out collectors */ });
  });
})();