(function () {
  "use strict";

  // Gate the Resident Portal to signed-in residents.
  function hasResidentSession() {
    var token = localStorage.getItem("sb-access-token");
    var role = localStorage.getItem("user-role");
    return !!token && role === "resident";
  }

  document.addEventListener("DOMContentLoaded", function () {
    if (!hasResidentSession()) {
      window.location.replace("../Authentication/Login.html");
    }
  });
})();
