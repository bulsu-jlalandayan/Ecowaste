<!-- Notifications content fragment (loaded by resident.html via content.php) -->
<div class="p-margin max-w-7xl mx-auto flex flex-col gap-lg">
<!-- Header -->
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
<div>
<h1 class="font-headline-lg text-headline-lg text-primary">Notifications</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">Stay updated on your waste management schedule and requests.</p>
</div>
<button class="bg-transparent border border-outline text-secondary px-4 py-2 rounded-full font-body-sm font-medium hover:bg-surface-container hover:text-primary transition-colors flex items-center gap-2" id="mark-all-read" type="button">
<span class="material-symbols-outlined text-[18px]" data-icon="done_all">done_all</span>
                    Mark all as read
                </button>
</div>

<!-- Notifications Feed -->
<div class="space-y-xl" id="notif-feed"></div>
<div class="mt-xl text-center pb-xl">
<p class="font-body-sm text-body-sm text-secondary" id="notif-empty">Loading notifications…</p>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  var UI = window.EcoWasteUI;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var uid = D.currentUserId();
  var feed = document.getElementById("notif-feed");
  var emptyEl = document.getElementById("notif-empty");

  var TYPE_META = {
    collection: { icon: "local_shipping", cls: "bg-primary-fixed/20", icCls: "text-primary-fixed-variant" },
    assignment: { icon: "assignment_turned_in", cls: "bg-tertiary-fixed/20", icCls: "text-tertiary-container" },
    report: { icon: "report_problem", cls: "bg-error-container/40", icCls: "text-on-error-container" },
    info: { icon: "info", cls: "bg-secondary-container/40", icCls: "text-on-secondary-container" },
    default: { icon: "notifications", cls: "bg-surface-container/40", icCls: "text-on-surface-variant" }
  };

  function groupLabel(d) {
    var now = new Date();
    var startToday = new Date(now.getFullYear(), now.getMonth(), now.getDate());
    var startYesterday = new Date(startToday); startYesterday.setDate(startYesterday.getDate() - 1);
    if (d >= startToday) return "TODAY";
    if (d >= startYesterday) return "YESTERDAY";
    return "EARLIER";
  }

  function timeLabel(d, group) {
    if (group === "TODAY") return d.toLocaleTimeString([], { hour: "numeric", minute: "2-digit" });
    if (group === "YESTERDAY") return "Yesterday, " + d.toLocaleTimeString([], { hour: "numeric", minute: "2-digit" });
    return d.toLocaleDateString([], { month: "short", day: "numeric" });
  }

  function card(n, group) {
    var m = TYPE_META[n.type] || TYPE_META.default;
    var unread = !n.read_at;
    var wrapper = document.createElement("div");
    wrapper.className = (unread ? "bg-surface-container-lowest" : "bg-surface opacity-75") + " border border-outline-variant rounded-xl p-md flex gap-md relative overflow-hidden group hover:shadow-[0_4px_16px_rgba(15,23,42,0.05)] transition-shadow";
    wrapper.innerHTML =
      (unread ? '<div class="absolute left-0 top-0 bottom-0 w-1 bg-primary"></div>' : "") +
      '<div class="w-10 h-10 rounded-full ' + m.cls + ' flex items-center justify-center shrink-0">' +
      '<span class="material-symbols-outlined ' + m.icCls + '">' + m.icon + "</span></div>" +
      '<div class="flex-1 min-w-0">' +
      '<div class="flex justify-between items-start mb-1 gap-2">' +
      '<h4 class="font-body-lg text-body-lg text-on-surface ' + (unread ? "font-semibold" : "font-medium") + '">' + D.esc(n.title || "Notification") + "</h4>" +
      '<span class="font-data-mono text-data-mono text-secondary shrink-0 text-xs">' + D.esc(timeLabel(new Date(n.created_at), group)) + "</span></div>" +
      '<p class="font-body-md text-body-md text-on-surface-variant">' + D.esc(n.message || "") + "</p></div>" +
      (unread ? '<div class="hidden md:flex items-center shrink-0 w-4 justify-end" data-unread-dot><span class="w-2 h-2 rounded-full bg-primary inline-block" title="Unread"></span></div>' : "");
    if (unread) {
      wrapper.addEventListener("click", function () {
        D.update("notifications", "id=eq." + n.id, { read_at: new Date().toISOString() }).catch(function () {});
        wrapper.classList.remove("bg-surface-container-lowest");
        wrapper.classList.add("bg-surface", "opacity-75");
        var bar = wrapper.querySelector(".absolute");
        if (bar) bar.remove();
        var dot = wrapper.querySelector("[data-unread-dot]");
        if (dot) dot.innerHTML = "";
      });
    }
    return wrapper;
  }

  function render(list) {
    feed.innerHTML = "";
    var groups = {};
    list.forEach(function (n) {
      var d = n.created_at ? new Date(n.created_at) : new Date();
      groups[groupLabel(d)] = (groups[groupLabel(d)] || []).concat(n);
    });
    ["TODAY", "YESTERDAY", "EARLIER"].forEach(function (g) {
      if (!groups[g]) return;
      var section = document.createElement("div");
      section.innerHTML = '<h3 class="font-label-caps text-label-caps text-secondary mb-sm">' + g + "</h3>" +
        '<div class="space-y-sm" id="grp-' + g.toLowerCase() + '"></div>';
      feed.appendChild(section);
      var listEl = section.querySelector("#grp-" + g.toLowerCase());
      groups[g].forEach(function (n) { listEl.appendChild(card(n, g)); });
    });
    var total = list.length;
    emptyEl.textContent = total ? "" : "No notifications yet";
  }

  async function load() {
    var list = await D.list(
      "notifications",
      "id,title,message,type,recipient_id,request_id,read_at,created_at",
      "created_at.desc",
      "recipient_id=eq." + uid
    ).catch(function () { return []; });
    render(list);
  }

  var markBtn = document.getElementById("mark-all-read");
  if (markBtn) markBtn.addEventListener("click", function () {
    D.update("notifications", "recipient_id=eq." + uid + "&read_at=is.null", { read_at: new Date().toISOString() })
      .then(function () { load(); UI.toast("All notifications marked as read."); })
      .catch(function (err) { UI.toast(err.message || "Failed to mark all as read.", "error"); });
  });

  load().catch(function (err) {
    console.error("EcoWaste notifications failed to load:", err);
  });
})();
</script>
