(function () {
  document.addEventListener("DOMContentLoaded", function () {
    fetch("collector_nav.php")
      .then(function (res) {
        if (!res.ok) throw new Error("Nav request failed: " + res.status);
        return res.json();
      })
      .then(function (data) {
        renderLinks(data.side);
        bindNav();
      })
      .catch(function (err) {
        console.error("EcoWaste collector nav failed to load:", err);
        showNavFallback();
      });
    bindDrawer();
  });

  function renderLinks(links) {
    var sidebar = document.getElementById("collector-sidebar-links");
    var drawer = document.getElementById("collector-drawer-links");
    if (!sidebar || !drawer || !links) return;

    links.forEach(function (item) {
      var a = document.createElement("a");
      a.setAttribute("href", item.href);
      if (item.view) a.setAttribute("data-view", item.view);

      a.className = "flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:text-on-surface hover:bg-surface-container-low transition-colors duration-200 rounded-lg";

      var span = document.createElement("span");
      span.className = "material-symbols-outlined";
      span.textContent = item.icon;
      a.appendChild(span);

      var label = document.createElement("span");
      label.className = "font-label-md text-label-md";
      label.textContent = item.label;
      a.appendChild(label);

      sidebar.appendChild(a.cloneNode(true));
      drawer.appendChild(a);
    });
  }

  function bindNav() {
    document.querySelectorAll("#collector-sidebar-links a[data-view], #collector-drawer-links a[data-view]").forEach(function (el) {
      el.addEventListener("click", function (e) {
        var view = el.getAttribute("data-view");
        if (!view) return;
        e.preventDefault();
        if (window.EcoWasteRouter && window.EcoWasteRouter.go) {
          window.EcoWasteRouter.go(view);
        }
        closeDrawer();
      });
    });
  }

  function bindDrawer() {
    var btn = document.getElementById("hamburger-btn");
    var closeBtn = document.getElementById("drawer-close-btn");
    var drawer = document.getElementById("drawer");
    var overlay = document.getElementById("drawer-overlay");
    if (!btn || !drawer || !overlay) return;

    function openDrawer() {
      drawer.classList.remove("-translate-x-full");
      overlay.classList.remove("hidden");
    }

    window.closeDrawer = function () {
      drawer.classList.add("-translate-x-full");
      overlay.classList.add("hidden");
    };

    btn.addEventListener("click", openDrawer);
    closeBtn.addEventListener("click", function () {
      window.closeDrawer();
    });
    overlay.addEventListener("click", function () {
      window.closeDrawer();
    });
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape") window.closeDrawer();
    });
  }

  function showNavFallback() {
    var sidebar = document.getElementById("collector-sidebar-links");
    if (sidebar) {
      var p = document.createElement("p");
      p.className = "px-4 py-3 font-label-sm text-label-sm text-on-surface-variant opacity-70";
      p.textContent = "Navigation unavailable";
      sidebar.appendChild(p);
    }
  }
})();
