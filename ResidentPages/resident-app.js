(function () {
  "use strict";

  var app = document.getElementById("app");
  var loading = false;
  var currentView = null;
  var appState = { selectedRequestId: null };

  var TITLES = {
    dashboard: "Dashboard",
    reportwaste: "Report Waste",
    requestcollection: "Request Collection",
    requestlist: "My Requests",
    requestdetails: "Request Details",
    schedule: "Schedule",
    recycleguide: "Recycling Guide",
    activityhistory: "Activity History",
    notification: "Notifications",
    profile: "Profile"
  };

  function go(view) {
    view = view || "dashboard";
    if (loading || view === currentView) return;
    loading = true;

    if (app) {
      app.classList.add("opacity-50", "pointer-events-none");
    }

    fetch("content.php?view=" + encodeURIComponent(view))
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
        console.error("EcoWaste content failed to load:", err);
        if (app) {
          app.innerHTML =
            '<div class="p-margin font-body-md text-body-md text-on-surface">' +
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
    var links = document.querySelectorAll("#resident-sidebar a, #resident-bottomnav a");
    links.forEach(function (a) {
      var isActive = a.getAttribute("data-view") === view;
      a.classList.remove("bg-primary-container/10", "text-primary", "font-bold");
      a.classList.add("text-on-surface-variant");
      var icon = a.querySelector(".material-symbols-outlined");
      if (icon) icon.removeAttribute("style");
      if (isActive) {
        a.classList.add("bg-primary-container/10", "text-primary", "font-bold");
        if (icon) icon.setAttribute("style", "font-variation-settings: 'FILL' 1;");
      }
      /* bottom nav active treatment */
      var inBottom = a.closest("#resident-bottomnav");
      if (inBottom) {
        a.classList.remove("bg-primary-container", "text-on-primary-container", "rounded-full", "scale-90",
          "text-on-surface-variant", "hover:bg-surface-container");
        a.classList.add("text-on-surface-variant", "hover:bg-surface-container");
        if (isActive) {
          a.classList.remove("text-on-surface-variant", "hover:bg-surface-container");
          a.classList.add("bg-primary-container", "text-on-primary-container", "rounded-full", "scale-90");
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
          if (el.hasAttribute("data-request-id")) {
            appState.selectedRequestId = el.getAttribute("data-request-id");
          }
          go(view);
        }
      });
      el.dataset.bound = "1";
    });
  }

  document.addEventListener("DOMContentLoaded", function () {
    go("dashboard");
    bindUserMenu();
    setUserName();
    window.EcoWasteData.loadProfileAvatar().catch(function (err) {
      console.error("EcoWaste profile avatar failed to load:", err);
    });

    // Re-bind data-view triggers whenever #app content changes asynchronously
    // (e.g. request list rows are injected after their async fetch completes).
    if (app && "MutationObserver" in window) {
      var mo = new MutationObserver(function () {
        bindViewDataTriggers();
      });

      mo.observe(app, { childList: true, subtree: true });
    }
  });

  window.addEventListener("ecowaste:profile-updated", function (e) {
    var avatarUrl = e.detail && e.detail.avatarUrl ? e.detail.avatarUrl : null;
    window.EcoWasteData.setProfileAvatar(avatarUrl);
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

    document.addEventListener("click", function (e) {
      var target = e.target.closest("#user-profile-signout");
      if (target) openSignOutModal();
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
      clearSession();
      window.location.href = "../Authentication/Login.html";
    });
  }

  function clearSession() {
    localStorage.removeItem("sb-access-token");
    localStorage.removeItem("sb-refresh-token");
    localStorage.removeItem("user-role");
  }

  function setUserName() {
    var D = window.EcoWasteData;
    if (!D) return;
    var uid = D.currentUserId();
    if (!uid) return;
    D.list("profiles", "full_name", null, "id=eq." + uid)
      .then(function (rows) {
        if (!rows || !rows.length) return;
        var name = rows[0].full_name;
        if (name) window.EcoWasteUserName = name.split(/\s+/)[0];
      })
      .catch(function () { /* non-fatal */ });
  }

  window.EcoWasteRouter = { go: go };
  window.EcoWasteAppState = appState;
})();
