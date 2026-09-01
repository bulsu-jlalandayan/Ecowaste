(function () {
  "use strict";

  var app = document.getElementById("app");
  var loading = false;
  var currentView = null;

  var TITLES = {
    dashboard: "Dashboard",
    users: "User Management",
    waste_categories: "Waste Categories",
    collection_request: "Collection Requests",
    collectors: "Collectors",
    recycling_record: "Recycling Records",
    reports: "System Reports",
    trend_analytics: "Trends & Analytics",
    settings: "System Settings"
  };

  function go(view) {
    view = view || "dashboard";
    if (loading || view === currentView) return;
    loading = true;

    if (app) {
      app.classList.add("opacity-50", "pointer-events-none");
    }

    fetch("admin_app.php?view=" + encodeURIComponent(view))
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
        console.error("EcoWaste admin content failed to load:", err);
        if (app) {
          app.innerHTML =
            '<div class="p-lg font-body-md text-body-md text-on-surface-variant">' +
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
    var links = document.querySelectorAll("#admin-sidebar a");
    links.forEach(function (a) {
      var isActive = a.getAttribute("data-view") === view;
      a.classList.remove(
        "text-primary", "bg-secondary-fixed", "font-semibold", "opacity-90",
        "transition-all", "duration-150"
      );
      a.classList.add("text-on-surface-variant");
      var icon = a.querySelector(".material-symbols-outlined");
      if (icon) {
        icon.style.removeProperty("font-variation-settings");
      }
      if (isActive) {
        a.classList.remove("text-on-surface-variant");
        a.classList.add("text-primary", "bg-secondary-fixed", "font-semibold", "opacity-90", "transition-all", "duration-150");
        if (icon) {
          icon.style.setProperty("font-variation-settings", "'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24");
        }
      }
    });
  }

  function bindViewDataTriggers() {
    document.querySelectorAll("#app [data-view], #app button[data-view]").forEach(function (el) {
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
    var btn = document.getElementById("user-menu-btn");
    var menu = document.getElementById("user-menu");
    if (!btn || !menu) return;

    btn.addEventListener("click", function (e) {
      e.stopPropagation();
      var open = menu.classList.contains("hidden");
      menu.classList.toggle("hidden", !open);
      btn.setAttribute("aria-expanded", open ? "true" : "false");
    });

    document.addEventListener("click", function (e) {
      if (!menu.classList.contains("hidden") && !menu.contains(e.target) && e.target !== btn) {
        menu.classList.add("hidden");
        btn.setAttribute("aria-expanded", "false");
      }
    });

    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape") {
        menu.classList.add("hidden");
        btn.setAttribute("aria-expanded", "false");
      }
    });

    menu.querySelectorAll("[data-menu-action]").forEach(function (el) {
      el.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        menu.classList.add("hidden");
        btn.setAttribute("aria-expanded", "false");
        var action = el.getAttribute("data-menu-action");
        if (action === "profile") {
          go("profile");
        } else if (action === "signout") {
          openSignOutModal();
        }
      });
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
      '<div class="relative bg-surface-container-lowest border border-outline-variant rounded-xl shadow-xl w-full max-w-sm p-lg">' +
      '<div class="w-12 h-12 rounded-full bg-error-container/30 flex items-center justify-center mb-4">' +
      '<span class="material-symbols-outlined text-error text-[28px]">logout</span>' +
      "</div>" +
      '<h3 class="font-headline-md text-headline-md text-on-surface mb-2">Sign out?</h3>' +
      '<p class="font-body-md text-body-md text-on-surface-variant">Are you sure you want to sign out of your account?</p>' +
      '<div class="mt-lg flex flex-col-reverse sm:flex-row justify-end gap-sm">' +
      '<button type="button" data-signout-close class="px-4 py-2 rounded-lg border border-outline text-on-surface font-body-md text-body-md hover:bg-surface-container transition-colors">Cancel</button>' +
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
