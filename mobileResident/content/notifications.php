<!-- Mobile Notifications view -->
<div class="p-4 flex flex-col gap-4">
<div class="flex items-center justify-between gap-3">
<div>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface">Notifications</h2>
<p id="notif-unread-count" class="font-body-sm text-body-sm text-on-surface-variant mt-1">No unread notifications</p>
</div>
<button id="mark-all-btn" class="inline-flex items-center gap-1.5 font-label-md text-label-md text-primary hover:bg-primary-fixed/60 rounded-lg px-2.5 py-2 transition-colors" type="button">
<span class="material-symbols-outlined text-[18px]">done_all</span> Mark all read
</button>
</div>

<div id="notif-list" class="flex flex-col gap-2"></div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  var UI = window.EcoWasteUI;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var uid = D.currentUserId();
  var ICONS = {
    collection: { icon: "local_shipping", cls: "bg-primary-fixed text-primary" },
    assignment: { icon: "assignment_turned_in", cls: "bg-tertiary-container/20 text-tertiary-container" },
    report: { icon: "report_problem", cls: "bg-error-container text-on-error-container" },
    info: { icon: "info", cls: "bg-secondary-container text-on-secondary-container" },
    default: { icon: "notifications", cls: "bg-surface-container-high text-on-surface-variant" }
  };

  function item(n) {
    var unread = !n.read_at;
    var div = document.createElement("div");
    div.className = "flex items-start gap-3 p-4 bg-surface-container-lowest border border-border-subtle rounded-xl transition-colors " + (unread ? "border-l-4 border-l-primary" : "opacity-75");
    var meta = ICONS[n.type] || ICONS.default;
    div.innerHTML =
      '<span class="material-symbols-outlined w-10 h-10 rounded-full flex items-center justify-center shrink-0 ' + meta.cls + '">' + meta.icon + "</span>" +
      '<div class="flex-1 min-w-0">' +
      '<p class="font-body-md text-body-md text-on-surface">' + (n.title ? '<span class="font-semibold">' + D.esc(n.title) + ".</span> " : "") + D.esc(n.message) + "</p>" +
      '<p class="font-label-sm text-label-sm text-on-surface-variant mt-1">' + D.fmtDate(n.created_at) + "</p>" +
      "</div>";
    if (unread) {
      var dot = document.createElement("span");
      dot.className = "w-2.5 h-2.5 rounded-full bg-primary shrink-0 mt-2 notif-unread-dot";
      div.appendChild(dot);
    }
    if (unread) {
      div.addEventListener("click", function () {
        D.update("notifications", "id=eq." + n.id, { read_at: new Date().toISOString() })
          .then(function () {
            div.classList.remove("border-l-primary");
            div.classList.add("opacity-75");
            var dotEl = div.querySelector(".notif-unread-dot");
            if (dotEl) div.removeChild(dotEl);
            renderCount();
            if (window.EcoWasteRefreshBadge) window.EcoWasteRefreshBadge();
          })
          .catch(function () {});
      });
    }
    return div;
  }

  function renderCount() {
    var unread = document.querySelectorAll("#notif-list .border-l-primary").length;
    var countEl = document.getElementById("notif-unread-count");
    if (countEl) countEl.textContent = unread === 0 ? "No unread notifications" : (unread === 1 ? "1 unread notification" : unread + " unread notifications");
    var markAll = document.getElementById("mark-all-btn");
    markAll.classList.toggle("opacity-50", !unread);
    markAll.disabled = !unread;
  }

  function render(rows) {
    var list = document.getElementById("notif-list");
    list.innerHTML = "";
    if (!rows.length) {
      list.innerHTML = '<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-6 text-center">' +
        '<span class="material-symbols-outlined text-[40px] text-on-surface-variant">notifications_none</span>' +
        '<p class="font-body-md text-body-md text-on-surface-variant mt-2">You have no notifications yet.</p></div>';
      return;
    }
    rows.forEach(function (n) {
      var el = item(n);
      el.dataset.read = n.read_at ? "1" : "0";
      list.appendChild(el);
    });
    renderCount();
  }

  async function load() {
    var rows = await D.list("notifications", "id,title,message,type,recipient_id,request_id,read_at,created_at", "created_at.desc", "recipient_id=eq." + uid);
    render(rows || []);
  }

  document.getElementById("mark-all-btn").addEventListener("click", function () {
    D.update("notifications", "recipient_id=eq." + uid + "&read_at=is.null", {
      read_at: new Date().toISOString()
    }).then(function () {
      UI.toast("All notifications marked as read.");
      load();
      if (window.EcoWasteRefreshBadge) window.EcoWasteRefreshBadge();
    }).catch(function (err) {
      UI.toast(err.message || "Could not update notifications.", "error");
    });
  });

  load().catch(function (err) {
    console.error("EcoWaste notifications failed to load:", err);
  });
})();
</script>
