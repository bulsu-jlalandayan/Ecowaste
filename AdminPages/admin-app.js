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

    fetch("admin_app.php?view=" + encodeURIComponent(view), { cache: "no-store" })
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

  var D = window.EcoWasteData;

  function setSearchTerm(term) {
    if (term) sessionStorage.setItem("eco_search_term", term);
  }

  function clearSearchTerm() {
    sessionStorage.removeItem("eco_search_term");
  }

  function bindGlobalSearch() {
    var input = document.getElementById("global-search");
    var dd = document.getElementById("global-search-dd");
    if (!input || !dd) return;
    var timer = null;

    input.addEventListener("input", function () {
      clearTimeout(timer);
      var q = input.value.trim();
      if (q.length < 2) {
        dd.classList.add("hidden");
        return;
      }
      timer = setTimeout(function () { runGlobalSearch(q); }, 300);
    });

    input.addEventListener("keydown", function (e) {
      if (e.key === "Escape") dd.classList.add("hidden");
    });

    document.addEventListener("click", function (e) {
      if (!dd.classList.contains("hidden") && !dd.contains(e.target) && e.target !== input) {
        dd.classList.add("hidden");
      }
    });
  }

  function runGlobalSearch(q) {
    var dd = document.getElementById("global-search-dd");
    if (!dd) return;
    var like = "*" + q.replace(/[%*]/g, "") + "*";
    Promise.all([
      D.list("profiles", "id,full_name,email,role", null, "or=(full_name.ilike." + encodeURIComponent(like) + ",email.ilike." + encodeURIComponent(like) + ")&limit=5"),
      D.list("collection_requests", "id,request_number,location,status", null, "or=(request_number.ilike." + encodeURIComponent(like) + ",location.ilike." + encodeURIComponent(like) + ")&limit=5")
    ]).then(function (results) {
      var users = results[0];
      var requests = results[1];
      if (!users.length && !requests.length) {
        dd.innerHTML = '<div class="px-4 py-3 font-body-sm text-body-sm text-on-surface-variant">No matches for "' + escapeHtml(q) + '"</div>';
        dd.classList.remove("hidden");
        return;
      }

      var html = "";
      if (users.length) {
        html += '<div class="px-4 py-2 font-label-md text-label-md text-primary uppercase tracking-wide bg-primary-container/20">Users</div>';
        users.forEach(function (u) {
          html += '<a href="#" data-search-user data-id="' + u.id + '" data-view="users" class="flex items-center gap-3 px-4 py-3 hover:bg-surface-container-low transition-colors">' +
            '<span class="material-symbols-outlined text-on-surface-variant text-[20px]">person</span>' +
            '<div class="min-w-0"><div class="font-body-md text-body-md text-on-surface truncate">' + escapeHtml(u.full_name || "—") + "</div>" +
            '<div class="font-body-sm text-body-sm text-on-surface-variant truncate">' + escapeHtml(u.email || "") + "</div></div></a>";
        });
      }
      if (requests.length) {
        html += '<div class="px-4 py-2 font-label-md text-label-md text-primary uppercase tracking-wide bg-primary-container/20">Requests</div>';
        requests.forEach(function (r) {
          html += '<a href="#" data-search-user data-id="' + r.id + '" data-view="collection_request" data-term="' + escapeHtml(r.request_number) + '" class="flex items-center gap-3 px-4 py-3 hover:bg-surface-container-low transition-colors">' +
            '<span class="material-symbols-outlined text-on-surface-variant text-[20px]">local_shipping</span>' +
            '<div class="min-w-0"><div class="font-body-md text-body-md text-on-surface truncate">' + escapeHtml(r.request_number) + "</div>" +
            '<div class="font-body-sm text-body-sm text-on-surface-variant truncate">' + escapeHtml(r.location || "") + '</div></div>' +
            '<span class="ml-auto font-label-md text-label-md text-on-surface-variant">' + escapeHtml(r.status) + "</span></a>";
        });
      }
      dd.innerHTML = html;
      dd.classList.remove("hidden");

      dd.querySelectorAll("[data-search-user]").forEach(function (el) {
        el.addEventListener("click", function (e) {
          e.preventDefault();
          var view = el.getAttribute("data-view");
          var term = el.getAttribute("data-term") || "";
          if (term) setSearchTerm(term);
          else clearSearchTerm();
          dd.classList.add("hidden");
          go(view);
        });
      });
    }).catch(function () {
      dd.innerHTML = '<div class="px-4 py-3 font-body-sm text-body-sm text-on-surface-variant">Search unavailable right now.</div>';
      dd.classList.remove("hidden");
    });
  }

  var NOTIF_ROUTES = {
    "collection_requests": "collection_request",
    "recycling_records": "recycling_record",
    "collectors": "collectors",
    "profiles": "users"
  };

  function bindNotifications() {
    var btn = document.getElementById("notif-btn");
    var dd = document.getElementById("notif-dd");
    if (!btn || !dd) return;

    btn.addEventListener("click", function (e) {
      e.stopPropagation();
      var open = !dd.classList.contains("hidden");
      dd.classList.toggle("hidden", open);
      btn.setAttribute("aria-expanded", open ? "false" : "true");
      if (!open) refreshNotifications();
    });

    document.addEventListener("click", function (e) {
      if (!dd.classList.contains("hidden") && !dd.contains(e.target) && e.target !== btn) {
        dd.classList.add("hidden");
        btn.setAttribute("aria-expanded", "false");
      }
    });

    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape") {
        dd.classList.add("hidden");
        btn.setAttribute("aria-expanded", "false");
      }
    });
  }

  function refreshNotifications() {
    var btn = document.getElementById("notif-btn");
    var dd = document.getElementById("notif-dd");
    if (!dd) return;
    Promise.all([
      D.list("collection_requests", "id,request_number,location", null, "status=eq.Unassigned&limit=50"),
      D.list("recycling_records", "id,log_number,status", null, "or=(status.eq.Pending Audit,status.eq.Discrepancy)&limit=50"),
      D.list("collectors", "id,full_name,status", null, "status=eq.Vehicle Issue&limit=50")
    ]).then(function (results) {
      var items = [];
      results[0].forEach(function (r) {
        items.push({ icon: "local_shipping", view: "collection_request", title: r.request_number, sub: r.location + " — Unassigned", tone: "accent" });
      });
      results[1].forEach(function (r) {
        items.push({ icon: "fact_check", view: "recycling_record", title: r.log_number, sub: "Status: " + r.status, tone: r.status === "Discrepancy" ? "danger" : "warn" });
      });
      results[2].forEach(function (c) {
        items.push({ icon: "build", view: "collectors", title: c.full_name, sub: "Vehicle Issue", tone: "warn" });
      });

      var badge = document.getElementById("notif-badge");
      if (badge) {
        badge.textContent = String(items.length);
        badge.classList.toggle("hidden", items.length === 0);
      }

      if (!items.length) {
        dd.innerHTML = '<div class="px-4 py-6 text-center font-body-md text-body-md text-on-surface-variant">' + "You're all caught up." + "</div>";
        return;
      }

      var html = '<div class="px-4 py-2 font-label-md text-label-md text-primary uppercase tracking-wide bg-primary-container/20">' + items.length + " action " + (items.length === 1 ? "item" : "items") + "</div>";
      items.forEach(function (it, i) {
        var iconClass = it.tone === "danger" ? "text-error" : it.tone === "warn" ? "text-tertiary" : "text-on-surface-variant";
        html += '<button type="button" data-notif-item="' + i + '" class="w-full flex items-start gap-3 px-4 py-3 hover:bg-surface-container-low transition-colors text-left">' +
          '<span class="material-symbols-outlined ' + iconClass + ' text-[20px]">' + it.icon + "</span>" +
          '<div class="min-w-0"><div class="font-body-md text-body-md text-on-surface truncate">' + escapeHtml(it.title) + "</div>" +
          '<div class="font-body-sm text-body-sm text-on-surface-variant truncate">' + escapeHtml(it.sub) + "</div></div></button>";
      });
      dd.innerHTML = html;
      dd.querySelectorAll("[data-notif-item]").forEach(function (el) {
        el.addEventListener("click", function () {
          var item = items[Number(el.getAttribute("data-notif-item"))];
          dd.classList.add("hidden");
          btn.setAttribute("aria-expanded", "false");
          go(item.view);
        });
      });
    }).catch(function () {
      dd.innerHTML = '<div class="px-4 py-3 font-body-sm text-body-sm text-on-surface-variant">Could not load notifications.</div>';
    });
  }

  function bindHelpModal() {
    var btn = document.getElementById("help-btn");
    if (!btn) return;
    btn.addEventListener("click", function () {
      var existing = document.getElementById("help-modal");
      if (existing) existing.remove();
      var modal = document.createElement("div");
      modal.id = "help-modal";
      modal.className = "fixed inset-0 z-50 flex items-center justify-center p-4";
      modal.innerHTML =
        '<div class="absolute inset-0 bg-black/40" data-help-close></div>' +
        '<div class="relative bg-surface-container-lowest border border-outline-variant rounded-xl shadow-xl w-full max-w-lg max-h-[80vh] overflow-y-auto">' +
        '<div class="sticky top-0 bg-surface-container-lowest px-lg pt-lg pb-sm flex items-center justify-between border-b border-outline-variant">' +
        '<h3 class="font-headline-md text-headline-md text-on-surface">Help & Guide</h3>' +
        '<button type="button" data-help-close class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-surface-container-highest text-on-surface-variant"><span class="material-symbols-outlined">close</span></button>' +
        "</div>" +
        '<div class="px-lg py-md space-y-md">' +
        helpItem("Quick actions", "The side dashboard quick actions jump to the relevant section. Assign Collector → Collection Requests, New Report → System Reports, Add User → User Management.") +
        helpItem("Exports", "Every listing page has an Export button that downloads the current filtered view as a CSV file. The Dashboard Export Report and Trends Export Data bundle their metrics into a single CSV.") +
        helpItem("Global search", "Use the search field in the top bar to find users or collection requests anywhere in the portal. Clicking a result lands you in that section with the term pre-filled.") +
        helpItem("Notifications", "The bell in the top bar lists action items: unassigned requests, records awaiting audit or flagged as discrepancies, and collectors with vehicle issues.") +
        helpItem("Reports", "System Reports generate live summaries based on your chosen filters and download the result immediately while logging the report to the list.") +
        helpItem("Settings", "Changes on the Settings page are saved to the database using the Save button on each card, so they apply for all admins.") +
        "</div>" +
        "</div>";
      document.body.appendChild(modal);
      modal.querySelectorAll("[data-help-close]").forEach(function (el) {
        el.addEventListener("click", function () { modal.remove(); });
      });
    });
  }

  function helpItem(title, body) {
    return '<div><div class="font-title-md text-title-md text-on-surface mb-1">' + title + "</div>" +
      '<div class="font-body-md text-body-md text-on-surface-variant">' + body + "</div></div>";
  }

  function escapeHtml(s) {
    return String(s == null ? "" : s).replace(/[&<>"']/g, function (c) {
      return { "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#39;" }[c];
    });
  }

  document.addEventListener("DOMContentLoaded", function () {
    go("dashboard");
    bindUserMenu();
    bindGlobalSearch();
    bindNotifications();
    bindHelpModal();
    refreshNotifications();
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
      localStorage.removeItem("sb-access-token");
      localStorage.removeItem("user-role");
      modal.remove();
      window.location.href = "../Authentication/Login.html";
    });
  }

  window.EcoWasteRouter = { go: go };
})();
