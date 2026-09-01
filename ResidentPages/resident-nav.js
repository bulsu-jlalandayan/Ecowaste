(function () {
  document.addEventListener("DOMContentLoaded", function () {
    fetch("nav.php?role=resident")
      .then(function (res) {
        if (!res.ok) throw new Error("Nav request failed: " + res.status);
        return res.json();
      })
      .then(function (data) {
        var currentPage = window.location.pathname.split("/").pop() || "";
        renderSidebar(data.side, currentPage);
        renderBottom(data.bottom, currentPage);
        bindNav();
      })
      .catch(function (err) {
        console.error("EcoWaste nav failed to load:", err);
        showNavFallback();
      });
  });

  function isActive(href, currentPage) {
    if (!href || href === "#") return false;
    var target = href.split("/").pop();
    return target === currentPage;
  }

  function renderSidebar(links, currentPage) {
    var container = document.getElementById("resident-sidebar");
    if (!container || !links) return;

    var ul = document.createElement("ul");
    ul.className = "flex flex-col gap-xs";

    links.forEach(function (item) {
      var li = document.createElement("li");
      var a = document.createElement("a");
      a.setAttribute("href", item.href);
      if (item.view) a.setAttribute("data-view", item.view);

      var active = isActive(item.href, currentPage);
      a.className = active
        ? "flex items-center gap-md px-md py-sm rounded-lg text-primary font-bold bg-primary-container/10 hover:bg-surface-container-high transition-all"
        : "flex items-center gap-md px-md py-sm rounded-lg text-on-surface-variant hover:bg-surface-container-high transition-all";

      var span = document.createElement("span");
      span.className = "material-symbols-outlined";
      span.textContent = item.icon;
      if (active) {
        span.setAttribute("style", "font-variation-settings: 'FILL' 1;");
      }
      a.appendChild(span);

      var label = document.createElement("span");
      label.className = "font-label-caps text-label-caps";
      label.textContent = item.label;
      a.appendChild(label);

      li.appendChild(a);
      ul.appendChild(li);
    });

    container.appendChild(ul);
  }

  function renderBottom(links, currentPage) {
    var container = document.getElementById("resident-bottomnav");
    if (!container || !links) return;

    links.forEach(function (item) {
      var a = document.createElement("a");
      a.setAttribute("href", item.href);
      if (item.view) a.setAttribute("data-view", item.view);

      var active = isActive(item.href, currentPage);
      a.className = "flex flex-col items-center justify-center px-4 py-1 transition-colors";
      if (active) {
        a.className += " bg-primary-container text-on-primary-container rounded-full scale-90 transition-all duration-200";
      } else {
        a.className += " text-on-surface-variant hover:bg-surface-container transition-colors";
      }

      var span = document.createElement("span");
      span.className = "material-symbols-outlined";
      span.textContent = item.icon;
      if (active) {
        span.setAttribute("style", "font-variation-settings: 'FILL' 1;");
      }
      a.appendChild(span);

      var label = document.createElement("span");
      label.className = "font-label-caps text-label-caps";
      label.textContent = item.label;
      a.appendChild(label);

      container.appendChild(a);
    });
  }

  function bindNav() {
    document.querySelectorAll("#resident-sidebar a, #resident-bottomnav a, [data-view]").forEach(function (el) {
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
    var container = document.getElementById("resident-sidebar");
    if (container) {
      var li = document.createElement("li");
      li.className = "px-md py-sm font-label-caps text-label-caps text-on-surface-variant opacity-70";
      li.textContent = "Navigation unavailable";
      container.appendChild(li);
    }
  }
})();
