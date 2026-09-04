(function () {
  "use strict";

  // Gate the Resident portals (desktop + mobile) to signed-in residents.
  function hasResidentSession() {
    var token = localStorage.getItem("sb-access-token");
    var role = localStorage.getItem("user-role");
    return !!token && role === "resident";
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

  // True when running inside the mobile resident portal.
  var IS_MOBILE_PORTAL = /\/mobileResident\//.test(window.location.pathname);

  function isMobileViewport() {
    try {
      return window.matchMedia("(max-width: 768px)").matches;
    } catch (e) {
      return false;
    }
  }

  function enforceResidentRouting() {
    // Never redirect the mobile portal to itself; escape is handled by the
    // "Switch to desktop site" link, which sets resident_app_choice=desktop.
    if (IS_MOBILE_PORTAL) return;

    var choice = localStorage.getItem("resident_app_choice");

    // Explicit per-device preference wins over the viewport heuristic.
    if (choice === "desktop") return;
    if (choice === "mobile") {
      window.location.replace("../mobileResident/");
      return;
    }

    // No explicit choice yet -> follow the viewport, then remember it.
    if (isMobileViewport()) {
      localStorage.setItem("resident_app_choice", "mobile");
      window.location.replace("../mobileResident/");
    }
  }

  function redirectToLogin() {
    clearSession();
    window.location.replace("../Authentication/Login.html");
  }

  document.addEventListener("DOMContentLoaded", function () {
    if (!hasResidentSession()) {
      redirectToLogin();
      return;
    }

    var uid = currentUserId();
    if (!uid) {
      enforceResidentRouting();
      return;
    }

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
          return;
        }
        enforceResidentRouting();
      })
      .catch(function () { enforceResidentRouting(); });
  });
})();
