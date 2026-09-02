(function () {
  "use strict";

  // Gate the Resident portals (desktop + mobile) to signed-in residents.
  function hasResidentSession() {
    var token = localStorage.getItem("sb-access-token");
    var role = localStorage.getItem("user-role");
    return !!token && role === "resident";
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

  document.addEventListener("DOMContentLoaded", function () {
    if (!hasResidentSession()) {
      window.location.replace("../Authentication/Login.html");
      return;
    }

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
  });
})();
