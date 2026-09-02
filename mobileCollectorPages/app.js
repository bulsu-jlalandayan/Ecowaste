(function () {
  "use strict";

  var app = document.getElementById("app");
  var loading = false;
  var currentView = null;

  var TITLES = {
    dashboard: "Dashboard",
    assigned_collections: "Assigned Collections",
    collection_details: "Collection Details",
    completed_collections: "Completed Collections",
    waste_records: "Waste Records",
    notifications: "Notifications",
    activity_history: "Activity History",
    profile: "Profile",
    settings: "Settings"
  };

  // Bottom-tab active groups (collection_details lights up "Collections").
  var TAB_GROUP = {
    dashboard: "dashboard",
    assigned_collections: "assigned_collections",
    collection_details: "assigned_collections",
    completed_collections: "completed_collections",
    waste_records: "waste_records",
    notifications: "notifications",
    activity_history: "activity_history",
    profile: "profile",
    settings: "settings"
  };

  var appState = { selectedRequestId: null };

  function go(view) {
    view = view || "dashboard";
    if (loading || view === currentView) return;
    loading = true;

    if (app) app.classList.add("opacity-50", "pointer-events-none");

    fetch("content.php?view=" + encodeURIComponent(view))
      .then(function (res) { return res.text(); })
      .then(function (html) {
        currentView = view;
        if (app) {
          app.innerHTML = html;
          app.scrollTop = 0;
          reExecScripts(app);
        }
        var titleEl = document.getElementById("app-title");
        if (titleEl) titleEl.textContent = TITLES[view] || "Dashboard";
        setActiveTab(view);
        bindViewTriggers();
        refreshNotifBadge();
        window.scrollTo({ top: 0, behavior: "smooth" });
      })
      .catch(function (err) {
        console.error("EcoWaste collector content failed to load:", err);
        if (app) {
          app.innerHTML =
            '<div class="p-container-margin font-body-md text-body-md text-on-surface-variant">' +
            "Unable to load this section. Please try again.</div>";
        }
      })
      .finally(function () {
        loading = false;
        if (app) app.classList.remove("opacity-50", "pointer-events-none");
      });
  }

  function reExecScripts(container) {
    container.querySelectorAll("script").forEach(function (old) {
      var s = document.createElement("script");
      if (old.src) s.src = old.src;
      else s.textContent = old.textContent;
      old.parentNode.replaceChild(s, old);
    });
  }

  function setActiveTab(view) {
    var group = TAB_GROUP[view] || view;
    document.querySelectorAll("[data-tab]").forEach(function (btn) {
      var isActive = btn.getAttribute("data-view") === group;
      var pill = btn.querySelector(".tab-pill");
      var icon = pill
        ? pill.querySelector(".material-symbols-outlined")
        : btn.querySelector(".material-symbols-outlined");
      if (pill) {
        pill.classList.toggle("bg-gradient-to-r", isActive);
        pill.classList.toggle("from-primary", isActive);
        pill.classList.toggle("to-primary-container", isActive);
        pill.classList.toggle("text-on-primary", isActive);
        pill.classList.toggle("shadow-md", isActive);
        pill.classList.toggle("text-on-surface-variant", !isActive);
      }
      if (icon) {
        if (isActive) icon.classList.add("filled");
        else icon.classList.remove("filled");
      }
      var label = btn.querySelector("span:not(.material-symbols-outlined):not(.tab-pill)");
      if (label) {
        label.classList.toggle("font-bold", isActive);
        label.classList.toggle("text-primary", isActive);
        label.classList.toggle("text-on-surface-variant", !isActive);
      }
    });
  }

  // Bind data-view links inside the current view + bottom tabs + more links.
  function bindViewTriggers() {
    var all = document.querySelectorAll(
      "#app [data-view], #app button[data-view], #app a[data-view]" +
      ", [data-tab][data-view], #more-links [data-view]"
    );
    all.forEach(function (el) {
      if (el.dataset.bound) return;
      el.addEventListener("click", function (e) {
        var view = el.getAttribute("data-view");
        if (!view) return;
        e.preventDefault();
        if (el.hasAttribute("data-request-id")) {
          appState.selectedRequestId = el.getAttribute("data-request-id");
        }
        closeSheet();
        go(view);
      });
      el.dataset.bound = "1";
    });
  }

  // ---- More sheet -----------------------------------------------------
  function openSheet() {
    document.getElementById("sheet-overlay").classList.remove("hidden");
    document.getElementById("more-sheet").classList.remove("translate-y-full");
  }
  function closeSheet() {
    document.getElementById("sheet-overlay").classList.add("hidden");
    document.getElementById("more-sheet").classList.add("translate-y-full");
  }

  // ---- Notifications badge --------------------------------------------
  function refreshNotifBadge() {
    var badge = document.getElementById("notif-badge");
    var D = window.EcoWasteData;
    if (!badge || !D) return;
    var uid = D.currentUserId();
    if (!uid) return;
    D.list("notifications", "id", null, "recipient_id=eq." + uid + "&read_at=is.null")
      .then(function (rows) {
        var n = rows ? rows.length : 0;
        badge.textContent = n > 9 ? "9+" : String(n);
        badge.classList.toggle("hidden", n === 0);
      })
      .catch(function () { /* ignore */ });
  }

  // ---- Session / identity ---------------------------------------------
  function clearSession() {
    localStorage.removeItem("sb-access-token");
    localStorage.removeItem("sb-refresh-token");
    localStorage.removeItem("user-role");
    localStorage.removeItem("eco_search_term");
  }

  function setIdentity() {
    var D = window.EcoWasteData;
    if (!D) return;
    var uid = D.currentUserId();
    if (!uid) return;
    D.list("profiles", "full_name", null, "id=eq." + uid)
      .then(function (rows) {
        if (!rows || !rows.length) return;
        var name = rows[0].full_name || "Collector";
        var nameEl = document.getElementById("more-user-name");
        if (nameEl) nameEl.textContent = name;
        var avatar = document.getElementById("more-avatar");
        if (avatar) avatar.textContent = D.initials(name);
      })
      .catch(function () { /* non-fatal */ });
  }

  // ---- Boot ------------------------------------------------------------
  document.addEventListener("DOMContentLoaded", function () {
    bindViewTriggers();

    // Dynamically rendered views (async lists, action buttons, links) need
    // their data-view elements wired up as they appear.
    if (app && "MutationObserver" in window) {
      var mo = new MutationObserver(function () {
        bindViewTriggers();
      });
      mo.observe(app, { childList: true, subtree: true });
    }

    document.getElementById("notif-btn").addEventListener("click", function () {
      go("notifications");
    });
    document.getElementById("profile-btn").addEventListener("click", function () {
      go("profile");
    });
    document.getElementById("more-btn").addEventListener("click", openSheet);
    document.getElementById("sheet-close-btn").addEventListener("click", closeSheet);
    document.getElementById("sheet-overlay").addEventListener("click", closeSheet);
    document.querySelectorAll("[data-signout]").forEach(function (el) {
      el.addEventListener("click", function () {
        window.EcoWasteUI.confirm({
          title: "Sign out?",
          message: "Are you sure you want to sign out of your account?",
          confirmLabel: "Sign out",
          danger: true
        }).then(function (ok) {
          if (!ok) return;
          clearSession();
          window.location.href = "../Authentication/Login.html";
        });
      });
    });

    setIdentity();
    go("dashboard");
  });

  window.EcoWasteRouter = { go: go };
  window.EcoWasteAppState = appState;
})();