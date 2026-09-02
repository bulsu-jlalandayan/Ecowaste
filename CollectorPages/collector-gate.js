(function () {
  "use strict";

  // Gate the Collector portals (desktop + mobile) to signed-in collectors.
  function hasCollectorSession() {
    var token = localStorage.getItem("sb-access-token");
    var role = localStorage.getItem("user-role");
    return !!token && role === "collector";
  }

  document.addEventListener("DOMContentLoaded", function () {
    if (!hasCollectorSession()) {
      window.location.replace("../Authentication/Login.html");
    }
  });
})();