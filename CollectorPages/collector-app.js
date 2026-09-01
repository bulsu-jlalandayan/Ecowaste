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

  var NAV_GROUP = {
    assigned_collections: "assigned_collections",
    collection_details: "assigned_collections"
  };

  function go(view) {
    view = view || "dashboard";
    if (loading || view === currentView) return;
    loading = true;

    if (app) {
      app.classList.add("opacity-50", "pointer-events-none");
    }

    fetch("collector_content.php?view=" + encodeURIComponent(view))
      .then(function (res) {
        return res.text();
      })
      .then(function (html) {
        currentView = view;
        if (app) {
          app.innerHTML = html;
          app.scrollTop = 0;
          reExecScripts(app);
        }
        var titleEl = document.getElementById("app-title");
        if (titleEl) titleEl.textContent = TITLES[view] || "Dashboard";
        setActiveNav(view);
        bindViewDataTriggers();
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
        if (app) {
          app.classList.remove("opacity-50", "pointer-events-none");
        }
      });
  }

  function reExecScripts(container) {
    var scripts = container.querySelectorAll("script");
    scripts.forEach(function (old) {
      var s = document.createElement("script");
      if (old.src) {
        s.src = old.src;
      } else {
        s.textContent = old.textContent;
      }
      old.parentNode.replaceChild(s, old);
    });
  }

  function setActiveNav(view) {
    var activeGroup = NAV_GROUP[view] || view;
    var links = document.querySelectorAll("#collector-sidebar-links a[data-view], #collector-drawer-links a[data-view]");
    links.forEach(function (a) {
      var isActive = a.getAttribute("data-view") === activeGroup;
      a.classList.remove(
        "bg-secondary-fixed", "text-on-secondary-fixed-variant", "font-bold",
        "scale-[0.98]", "transition-transform", "text-on-surface-variant"
      );
      a.classList.add("text-on-surface-variant");
      var icon = a.querySelector(".material-symbols-outlined");
      if (icon) icon.style.removeProperty("font-variation-settings");
      if (isActive) {
        a.classList.remove("text-on-surface-variant");
        a.classList.add("bg-secondary-fixed", "text-on-secondary-fixed-variant", "font-bold", "scale-[0.98]", "transition-transform");
        if (icon) icon.style.setProperty("font-variation-settings", "'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24");
      }
    });
  }

  function bindViewDataTriggers() {
    document.querySelectorAll("#app [data-view], #app button[data-view], #app a[data-view]").forEach(function (el) {
      if (el.dataset.bound) return;
      el.addEventListener("click", function (e) {
        var view = el.getAttribute("data-view");
        if (view) {
          e.preventDefault();
          go(view);
        }
      });
      el.dataset.bound = "1";
    });
  }

  document.addEventListener("DOMContentLoaded", function () {
    go("dashboard");
    bindUserMenu();
  });

  function bindUserMenu() {
    document.querySelectorAll("[data-menu-action='signout']").forEach(function (el) {
      el.addEventListener("click", function (e) {
        e.preventDefault();
        openSignOutModal();
      });
    });
    document.addEventListener("click", function (e) {
      var t = e.target.closest("[data-signout]");
      if (t) openSignOutModal();
    });
  }

  function openSignOutModal() {
    var existing = document.getElementById("signout-modal");
    if (existing) existing.remove();

    var modal = document.createElement("div");
    modal.id = "signout-modal";
    modal.className = "fixed inset-0 z-50 flex items-center justify-center p-4";
    modal.innerHTML =
      '<div class="absolute inset-0 bg-black/40" data-signout-close></div>' +
      '<div class="relative bg-surface-container-lowest border border-border-subtle rounded-xl shadow-xl w-full max-w-sm p-stack-lg">' +
      '<div class="w-12 h-12 rounded-full bg-error-container/30 flex items-center justify-center mb-4">' +
      '<span class="material-symbols-outlined text-error text-[28px]">logout</span>' +
      "</div>" +
      '<h3 class="font-headline-md text-headline-md text-on-surface mb-2">Sign out?</h3>' +
      '<p class="font-body-md text-body-md text-on-surface-variant">Are you sure you want to sign out of your account?</p>' +
      '<div class="mt-stack-lg flex flex-col-reverse sm:flex-row justify-end gap-stack-md">' +
      '<button type="button" data-signout-close class="px-4 py-2 rounded-lg border border-outline text-on-surface font-body-md text-body-md hover:bg-surface-container-low transition-colors">Cancel</button>' +
      '<button type="button" data-signout-confirm class="px-4 py-2 rounded-lg bg-error text-on-error font-body-md text-body-md font-semibold hover:bg-error-container hover:text-on-error-container transition-colors flex items-center justify-center gap-2">Sign out</button>' +
      "</div>" +
      "</div>";

    document.body.appendChild(modal);

    modal.querySelectorAll("[data-signout-close]").forEach(function (el) {
      el.addEventListener("click", function () {
        modal.remove();
      });
    });

    modal.querySelector("[data-signout-confirm]").addEventListener("click", function () {
      modal.remove();
      window.location.href = "../Authentication/Login.html";
    });
  }

  window.EcoWasteRouter = { go: go };
})();
