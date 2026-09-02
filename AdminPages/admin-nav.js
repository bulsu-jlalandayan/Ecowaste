(function () {
  document.addEventListener("DOMContentLoaded", function () {
    fetch("admin_nav.php")
      .then(function (res) {
        if (!res.ok) throw new Error("Nav request failed: " + res.status);
        return res.json();
      })
      .then(function (data) {
        renderSidebar(data.side);
        bindNav();
      })
      .catch(function (err) {
        console.error("EcoWaste admin nav failed to load:", err);
        showNavFallback();
      });
  });

  function renderSidebar(links) {
    var container = document.getElementById("admin-sidebar");
    if (!container || !links) return;

    links.forEach(function (item) {
      var a = document.createElement("a");
      a.setAttribute("href", item.href);
      if (item.view) a.setAttribute("data-view", item.view);

      a.className = "flex items-center gap-md px-md py-sm rounded-lg text-on-surface-variant hover:bg-surface-container-highest transition-colors";

      var span = document.createElement("span");
      span.className = "material-symbols-outlined";
      span.textContent = item.icon;
      a.appendChild(span);

      var label = document.createTextNode(" " + item.label);
      a.appendChild(label);

      container.appendChild(a);
    });
  }

  function bindNav() {
    document.querySelectorAll("#admin-sidebar a[data-view]").forEach(function (el) {
      el.addEventListener("click", function (e) {
        var view = el.getAttribute("data-view");
        if (!view) return;
        e.preventDefault();
        if (window.EcoWasteRouter && window.EcoWasteRouter.go) {
          window.EcoWasteRouter.go(view);
        }
      });
    });
  }

  function showNavFallback() {
    var container = document.getElementById("admin-sidebar");
    if (container) {
      var p = document.createElement("p");
      p.className = "px-md py-sm font-label-caps text-label-caps text-on-surface-variant opacity-70";
      p.textContent = "Navigation unavailable";
      container.appendChild(p);
    }
  }
})();
