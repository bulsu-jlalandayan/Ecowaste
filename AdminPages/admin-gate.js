(function () {
  "use strict";

  function hasAdminSession() {
    var token = localStorage.getItem("sb-access-token");
    var role = localStorage.getItem("user-role");
    return !!token && role === "admin";
  }

  document.addEventListener("DOMContentLoaded", function () {
    if (!hasAdminSession()) {
      window.location.replace("../Authentication/Login.html");
    }
  });
})();