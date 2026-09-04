<!-- Mobile Dashboard view -->
<div class="p-4 flex flex-col gap-4">
<!-- Greeting hero -->
<div class="relative overflow-hidden bg-gradient-to-br from-primary via-primary-container to-emerald-700 rounded-2xl p-5 text-on-primary shadow-lg shadow-primary/25">
<span class="pointer-events-none absolute -top-8 -right-6 w-28 h-28 rounded-full bg-white/10"></span>
<span class="pointer-events-none absolute bottom-3 right-3 w-12 h-12 rounded-full bg-white/10"></span>
<p class="font-label-md text-label-md text-on-primary/80 uppercase tracking-wider">Collector Dashboard</p>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-white mt-1">Good day, <span id="greet-name">Collector</span></h2>
<p class="font-body-md text-body-md text-emerald-50 mt-1">Here's an overview of your collection tasks.</p>
</div>

<!-- KPI Cards -->
<div class="grid grid-cols-2 gap-3">
<div class="bg-primary-fixed rounded-xl p-4 flex flex-col gap-1.5">
<span class="material-symbols-outlined w-10 h-10 rounded-full bg-primary text-on-primary flex items-center justify-center">event_available</span>
<span class="font-label-sm text-label-sm text-primary uppercase tracking-wider mt-1">Assigned Today</span>
<span class="font-headline-lg text-headline-lg text-on-surface"><span id="kpi-assigned">0</span></span>
</div>
<div class="bg-amber-50 rounded-xl p-4 flex flex-col gap-1.5">
<span class="material-symbols-outlined w-10 h-10 rounded-full bg-amber-200 text-amber-800 flex items-center justify-center">schedule</span>
<span class="font-label-sm text-label-sm text-amber-700 uppercase tracking-wider mt-1">Pending</span>
<span class="font-headline-lg text-headline-lg text-on-surface"><span id="kpi-pending">0</span></span>
</div>
<div class="bg-blue-50 rounded-xl p-4 flex flex-col gap-1.5">
<span class="material-symbols-outlined w-10 h-10 rounded-full bg-blue-200 text-blue-800 flex items-center justify-center">local_shipping</span>
<span class="font-label-sm text-label-sm text-blue-700 uppercase tracking-wider mt-1">In Progress</span>
<span class="font-headline-lg text-headline-lg text-on-surface"><span id="kpi-progress">0</span></span>
</div>
<div class="bg-emerald-50 rounded-xl p-4 flex flex-col gap-1.5">
<span class="material-symbols-outlined w-10 h-10 rounded-full bg-emerald-200 text-emerald-800 flex items-center justify-center">check_circle</span>
<span class="font-label-sm text-label-sm text-emerald-700 uppercase tracking-wider mt-1">Completed Today</span>
<span class="font-headline-lg text-headline-lg text-on-surface"><span id="kpi-completed">0</span></span>
</div>
</div>

<!-- Today's Collections -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
<div class="px-4 py-3 border-b border-border-subtle flex items-center justify-between bg-gradient-to-r from-primary-fixed/70 to-transparent">
<h3 class="font-headline-sm text-headline-sm text-on-surface flex items-center gap-2">
<span class="material-symbols-outlined w-7 h-7 rounded-lg bg-primary text-on-primary flex items-center justify-center text-[16px]">event_available</span>
Today's Collections
</h3>
<button class="font-label-md text-label-md text-primary" data-view="assigned_collections" type="button">View All</button>
</div>
<div id="today-list" class="flex flex-col"></div>
</div>

<!-- Upcoming Collections -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
<div class="px-4 py-3 border-b border-border-subtle bg-gradient-to-r from-emerald-50 to-transparent">
<h3 class="font-headline-sm text-headline-sm text-on-surface flex items-center gap-2">
<span class="material-symbols-outlined w-7 h-7 rounded-lg bg-status-completed text-white flex items-center justify-center text-[16px]">event_upcoming</span>
Upcoming Collections
</h3>
</div>
<div id="upcoming-list" class="flex flex-col"></div>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  var UI = window.EcoWasteUI;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var uid = D.currentUserId();
  var CHIP = {
    Scheduled: "bg-amber-100 text-amber-800",
    "In Transit": "bg-blue-100 text-blue-800",
    Completed: "bg-emerald-100 text-emerald-800",
    Unassigned: "bg-surface-container-high text-on-surface-variant"
  };
  var CHIP_LABEL = {
    Scheduled: "Pending",
    "In Transit": "In Progress",
    Completed: "Completed",
    Unassigned: "Unassigned"
  };

  function setText(id, v) {
    var el = document.getElementById(id);
    if (el) el.textContent = v;
  }

  function card(r) {
    var chip = CHIP[r.status] || "bg-surface-container-high text-on-surface-variant";
    var label = CHIP_LABEL[r.status] || r.status;
    var wt = UI.wasteType(r.waste_type);
    var div = document.createElement("a");
    div.href = "#";
    div.className = "flex items-start gap-3 p-4 hover:bg-surface-container-low transition-colors border-b border-border-subtle last:border-b-0";
    div.setAttribute("data-view", "collection_details");
    div.setAttribute("data-request-id", r.id);
    div.innerHTML =
      '<div class="flex-1 min-w-0">' +
        '<div class="flex items-center gap-2 flex-wrap">' +
          '<span class="font-label-md text-label-md text-primary">' + D.esc(r.request_number) + "</span>" +
          '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold ' + chip + '">' + label + "</span>" +
        "</div>" +
        '<p class="font-body-sm text-body-sm text-on-surface truncate mt-1.5">' + D.esc(r.location || "") + (r.zone ? " · " + D.esc(r.zone) : "") + "</p>" +
        '<div class="mt-1.5 flex items-center gap-2 flex-wrap">' +
          '<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold ' + wt.chip + '">' +
            '<span class="material-symbols-outlined text-[13px]">' + wt.icon + "</span>" + D.esc(r.waste_type || "General") +
          "</span>" +
          '<span class="font-label-sm text-label-sm text-on-surface-variant">' + (r.scheduled_date ? D.fmtDay(r.scheduled_date) : D.fmtDate(r.requested_at)) + (r.time_start ? " " + D.fmtTime(r.time_start) + " - " + D.fmtTime(r.time_end) : "") + "</span>" +
        "</div>" +
      "</div>" +
      '<span class="material-symbols-outlined text-on-surface-variant mt-1">chevron_right</span>';
    return div;
  }

  function emptyList(el, msg) {
    el.innerHTML = '<p class="p-4 font-body-sm text-body-sm text-on-surface-variant">' + D.esc(msg) + "</p>";
  }

  async function load() {
    var promises = [
      D.list("collection_requests", "id,request_number,location,zone,waste_type,status,requested_at,completed_at,scheduled_date,time_start,time_end", "requested_at.asc", "collector_id=eq." + uid),
      D.list("profiles", "full_name", null, "id=eq." + uid)
    ];
    var results = await Promise.all(promises);
    var requests = results[0] || [];
    var profile = results[1] && results[1].length ? results[1][0] : null;

    if (profile && profile.full_name) {
      setText("greet-name", profile.full_name.split(" ")[0]);
    }

    var now = new Date();
    var todayKey = now.toDateString();

    var assignedToday = 0, pending = 0, inProgress = 0, completedToday = 0;
    requests.forEach(function (r) {
      var isToday = r.requested_at && new Date(r.requested_at).toDateString() === todayKey;
      if (r.status === "Scheduled") pending++;
      if (r.status === "In Transit") inProgress++;
      if (isToday) {
        if (r.status === "Scheduled" || r.status === "In Transit") assignedToday++;
        if (r.status === "Completed") completedToday++;
      }
    });
    setText("kpi-assigned", D.fmtNum(assignedToday));
    setText("kpi-pending", D.fmtNum(pending));
    setText("kpi-progress", D.fmtNum(inProgress));
    setText("kpi-completed", D.fmtNum(completedToday));

    var worklist = requests.filter(function (r) {
      return r.status === "Scheduled" || r.status === "In Transit";
    }).slice(0, 5);
    var todayList = document.getElementById("today-list");
    if (worklist.length) worklist.forEach(function (r) { todayList.appendChild(card(r)); });
    else emptyList(todayList, "No collections assigned to you yet.");

    var upcoming = requests.filter(function (r) {
      return r.status === "Scheduled" && r.requested_at && new Date(r.requested_at) > now;
    }).slice(0, 3);
    var upcomingList = document.getElementById("upcoming-list");
    if (upcoming.length) upcoming.forEach(function (r) { upcomingList.appendChild(card(r)); });
    else emptyList(upcomingList, "No upcoming collections scheduled.");
  }

  load().catch(function (err) {
    console.error("EcoWaste dashboard failed to load:", err);
  });
})();
</script>