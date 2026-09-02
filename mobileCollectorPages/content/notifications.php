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

<div id="notif-list" class="flex flex-col"></div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  var UI = window.EcoWasteUI;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var uid = D.currentUserId();
  var ICONS = {
    assignment: { icon: "assignment", cls: "bg-primary-fixed text-primary" },
    collection_started: { icon: "local_shipping", cls: "bg-blue-50 text-blue-700" },
    collection_completed: { icon: "check_circle", cls: "bg-emerald-50 text-emerald-700" },
    waste_recorded: { icon: "delete_sweep", cls: "bg-amber-50 text-amber-700" },
    default: { icon: "notifications", cls: "bg-surface-container-high text-on-surface-variant" }
  };

  function item(n) {
    var unread = !n.read_at;
    var div = document.createElement("div");
    div.className = "flex items-start gap-3 p-4 bg-surface-container-lowest border border-border-subtle rounded-xl transition-colors " + (unread ? "border-l-4 border-l-primary" : "opacity-75");
    var meta = ICONS[n.type] || ICONS.default;
    div.innerHTML =
      '<span class="material-symbols-outlined w-10 h-10 rounded-full flex items-center justify-center ' + meta.cls + '">' + meta.icon + "</span>" +
      '<div class="flex-1 min-w-0">' +
        '<p class="font-body-md text-body-md text-on-surface">' + (n.title ? '<span class="font-semibold">' + D.esc(n.title) + ".</span> " : "") + D.esc(n.message) + "</p>" +
        '<p class="font-label-sm text-label-sm text-on-surface-variant mt-1">' + D.fmtDate(n.created_at) + "</p>" +
      "</div>";
    if (unread) {
      var dot = document.createElement("span");
      dot.className = "w-2.5 h-2.5 rounded-full bg-primary shrink-0 mt-2";
      div.appendChild(dot);
    }
    if (n.request_id) {
      var link = document.createElement("a");
      link.href = "#";
      link.className = "shrink-0 inline-flex items-center gap-1 font-label-md text-label-md text-primary mt-1";
      link.setAttribute("data-view", "collection_details");
      link.setAttribute("data-request-id", n.request_id);
      link.textContent = "View";
      link.innerHTML = 'View <span class="material-symbols-outlined text-[16px]">arrow_forward</span>';
      div.appendChild(link);
    }
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
      list.innerHTML = '<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-6 text-center">' +
        '<span class="material-symbols-outlined text-[40px] text-on-surface-variant">notifications_none</span>' +
        '<p class="font-body-md text-body-md text-on-surface-variant mt-2">You have no notifications yet.</p></div>';
      return;
    }
    rows.forEach(function (n) { list.appendChild(item(n)); });
  }

  async function load() {
    var rows = await D.list("notifications", "*,request_id", "created_at.desc", "recipient_id=eq." + uid);
    render(rows || []);
  }

  document.getElementById("mark-all-btn").addEventListener("click", function () {
    D.req("PATCH", "/rest/v1/notifications?recipient_id=eq." + uid + "&read_at=is.null", {
      read_at: new Date().toISOString()
    }).then(function () {
      UI.toast.success("All notifications marked as read.");
      load();
    }).catch(function (err) {
      UI.toast.error("Could not update notifications: " + (err.message || "unknown error"));
    });
  });

  load().catch(function (err) {
    console.error("EcoWaste notifications failed to load:", err);
  });
})();
</script>