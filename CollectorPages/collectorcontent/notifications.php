<!-- Notifications view - loaded via collector_content.php -->
<div class="max-w-4xl mx-auto">
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between mb-stack-lg gap-4">
<div>
<h1 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-background mb-2">Notifications</h1>
<p id="notif-unread-count" class="font-body-md text-body-md text-on-surface-variant">No unread notifications</p>
</div>
<button id="mark-all-btn" class="bg-primary-container text-on-primary font-label-md text-label-md px-4 py-2 rounded-lg hover:bg-primary transition-colors flex items-center justify-center gap-2 h-10 w-full md:w-auto self-start md:self-end">
<span class="material-symbols-outlined text-[18px]">done_all</span>
                    Mark all as read
                </button>
</div>
<!-- Notifications List -->
<div id="notif-list" class="flex flex-col gap-stack-sm">
</div>
<div id="notif-load-more" class="mt-stack-lg flex justify-center hidden">
<button class="bg-transparent text-secondary font-label-md text-label-md px-4 py-2 rounded border border-border-subtle hover:bg-surface-container-low transition-colors">
                    Load More
                </button>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  var UI = window.EcoWasteUI;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var uid = D.currentUserId();
  var allRows = [];

  var ICONS = {
    assignment: { icon: "assignment", bg: "bg-primary-fixed text-on-primary-fixed" },
    collection_started: { icon: "local_shipping", bg: "bg-secondary-fixed text-on-secondary-fixed" },
    collection_completed: { icon: "task_alt", bg: "bg-surface-container-high text-on-surface-variant" },
    waste_recorded: { icon: "delete_sweep", bg: "bg-surface-container-high text-on-surface-variant" },
    system: { icon: "info", bg: "bg-surface-container-high text-on-surface-variant" },
    default: { icon: "notifications", bg: "bg-surface-container-high text-on-surface-variant" }
  };

  function buildItem(n) {
    var unread = !n.read_at;
    var meta = ICONS[n.type] || ICONS.default;
    var div = document.createElement("div");
    div.className = "bg-surface-container-lowest border border-border-subtle rounded-xl p-4 md:p-6 hover:shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05),_0px_2px_4px_-2px_rgba(0,0,0,0.05)] transition-shadow relative overflow-hidden flex gap-4 items-start" + (unread ? "" : " opacity-75");
    var html = "";
    if (unread) html += '<div class="absolute left-0 top-0 bottom-0 w-1 bg-primary"></div>';
    html += '<div class="' + meta.bg + ' rounded-full p-3 flex-shrink-0"><span class="material-symbols-outlined">' + meta.icon + '</span></div>';
    html += '<div class="flex-1 min-w-0"><div class="flex flex-col md:flex-row md:items-center justify-between gap-1 md:gap-4 mb-1">';
    html += '<h3 class="font-headline-sm text-headline-sm text-on-background truncate' + (unread ? " font-bold" : "") + '">' + D.esc(n.title || "Notification") + '</h3>';
    html += '<span class="font-label-sm text-label-sm ' + (unread ? "text-primary" : "text-on-surface-variant") + ' flex-shrink-0">' + D.fmtDate(n.created_at) + '</span></div>';
    html += '<p class="font-body-md text-body-md text-on-surface-variant">' + D.esc(n.message || "") + '</p>';
    if (n.request_id) {
      html += '<div class="mt-4 flex gap-3"><button class="bg-primary-container text-on-primary font-label-sm text-label-sm px-3 py-1.5 rounded flex items-center gap-1 hover:bg-primary transition-colors" data-view="collection_details" data-request-id="' + n.request_id + '">View Details</button></div>';
    }
    html += '</div>';
    div.innerHTML = html;
    return div;
  }

  function render(rows) {
    var list = document.getElementById("notif-list");
    list.innerHTML = "";
    var unread = rows.filter(function (n) { return !n.read_at; });
    var countEl = document.getElementById("notif-unread-count");
    if (unread.length === 1) countEl.textContent = "1 unread notification";
    else countEl.textContent = unread.length ? unread.length + " unread notifications" : "No unread notifications";
    var markAll = document.getElementById("mark-all-btn");
    markAll.classList.toggle("opacity-50", !unread.length);
    markAll.disabled = !unread.length;

    if (!rows.length) {
      list.innerHTML = '<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-8 text-center"><span class="material-symbols-outlined text-[48px] text-on-surface-variant opacity-50">notifications_none</span><p class="font-body-md text-body-md text-on-surface-variant mt-3">You have no notifications yet.</p></div>';
      return;
    }
    rows.forEach(function (n) { list.appendChild(buildItem(n)); });
    if (window.EcoWasteRouter) {
      document.querySelectorAll("#app [data-view]").forEach(function (el) {
        if (el.dataset.bound) return;
        el.addEventListener("click", function (e) {
          var view = el.getAttribute("data-view");
          if (view) {
            e.preventDefault();
            if (el.hasAttribute("data-request-id")) {
              window.EcoWasteAppState.selectedRequestId = el.getAttribute("data-request-id");
            }
            window.EcoWasteRouter.go(view);
          }
        });
        el.dataset.bound = "1";
      });
    }
  }

  async function load() {
    allRows = await D.list("notifications", "*,request_id", "created_at.desc", "recipient_id=eq." + uid);
    render(allRows || []);
  }

  document.getElementById("mark-all-btn").addEventListener("click", function () {
    D.req("PATCH", "/rest/v1/notifications?recipient_id=eq." + uid + "&read_at=is.null", {
      read_at: new Date().toISOString()
    }).then(function () {
      UI.toast("All notifications marked as read.", "success");
      load();
    }).catch(function (err) {
      UI.toast("Could not update notifications: " + (err.message || "unknown error"), "error");
    });
  });

  load().catch(function (err) { console.error("EcoWaste notifications failed to load:", err); });
})();
</script>
