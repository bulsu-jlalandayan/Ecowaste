<!-- Mobile Dashboard view -->
<div class="p-4 flex flex-col gap-4">
<!-- Greeting hero -->
<div class="relative overflow-hidden bg-gradient-to-br from-primary via-primary-container to-emerald-700 rounded-2xl p-5 text-on-primary shadow-lg shadow-primary/25">
<span class="pointer-events-none absolute -top-8 -right-6 w-28 h-28 rounded-full bg-white/10"></span>
<span class="pointer-events-none absolute bottom-3 right-3 w-12 h-12 rounded-full bg-white/10"></span>
<p class="font-label-md text-label-md text-on-primary/80 uppercase tracking-wider">Resident Dashboard</p>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-white mt-1">Good <span id="greet-time">morning</span>, <span id="greet-name">there</span></h2>
<p class="font-body-md text-body-md text-emerald-50 mt-1">Manage your collection requests and reports.</p>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-2 gap-3">
<button class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 flex flex-col items-start gap-2 hover:shadow-md transition-shadow text-left" data-view="requestcollection" type="button">
<span class="material-symbols-outlined w-10 h-10 rounded-full bg-primary text-on-primary flex items-center justify-center">add_task</span>
<span class="font-body-md text-body-md text-on-surface font-semibold">Request Collection</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Schedule a pickup</span>
</button>
<button class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 flex flex-col items-start gap-2 hover:shadow-md transition-shadow text-left" data-view="reportwaste" type="button">
<span class="material-symbols-outlined w-10 h-10 rounded-full bg-error-container text-on-error-container flex items-center justify-center">report_problem</span>
<span class="font-body-md text-body-md text-on-surface font-semibold">Report Waste</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Report an issue</span>
</button>
</div>

<!-- Active Request -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
<div class="px-4 py-3 border-b border-border-subtle flex items-center justify-between bg-gradient-to-r from-primary-fixed/70 to-transparent">
<h3 class="font-headline-sm text-headline-sm text-on-surface flex items-center gap-2">
<span class="material-symbols-outlined w-7 h-7 rounded-lg bg-primary text-on-primary flex items-center justify-center text-[16px]">local_shipping</span>
Active Request
</h3>
<span class="font-label-md text-label-md text-primary" data-view="requestlist">View All</span>
</div>
<div class="p-4">
<div class="flex items-center justify-between mb-1">
<span class="font-label-sm text-label-sm text-on-surface-variant">Request</span>
<span class="font-label-md text-label-md text-primary" id="active-req-number">—</span>
</div>
<div class="flex items-center justify-between mb-1">
<span class="font-label-sm text-label-sm text-on-surface-variant">Type</span>
<span class="font-body-sm text-body-sm text-on-surface font-semibold" id="active-req-type">—</span>
</div>
<div class="flex items-center justify-between mb-3">
<span class="font-label-sm text-label-sm text-on-surface-variant">Status</span>
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container text-[11px] font-semibold" id="active-req-status">—</span>
</div>
<div class="w-full h-2 bg-surface-container-high rounded-full overflow-hidden">
<div class="h-full bg-primary rounded-full" id="active-req-progress" style="width:0%"></div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2 text-right" id="active-req-time">—</p>
</div>
</div>

<!-- Upcoming Schedule -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
<div class="px-4 py-3 border-b border-border-subtle bg-gradient-to-r from-emerald-50 to-transparent">
<h3 class="font-headline-sm text-headline-sm text-on-surface flex items-center gap-2">
<span class="material-symbols-outlined w-7 h-7 rounded-lg bg-status-completed text-white flex items-center justify-center text-[16px]">event_available</span>
Upcoming Schedule
</h3>
</div>
<div id="upcoming-schedule" class="flex flex-col"></div>
</div>

<!-- Educational Tip -->
<div class="relative overflow-hidden bg-primary text-on-primary rounded-2xl p-5">
<span class="pointer-events-none absolute -bottom-6 -right-6 w-28 h-28 rounded-full bg-white/10"></span>
<div class="relative z-10 flex items-start gap-3">
<span class="material-symbols-outlined text-primary-fixed text-[32px] filled">lightbulb</span>
<div>
<h3 class="font-headline-sm text-headline-sm mb-1">Did you know?</h3>
<p class="font-body-sm text-body-sm text-primary-fixed-dim">
Rinsing your recyclables before tossing them in the bin significantly reduces contamination rates at processing facilities. Even a quick splash of water helps ensure your items are actually recycled!
</p>
</div>
</div>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var uid = D.currentUserId();
  var name = (window.EcoWasteUserName || "").trim();

  var hour = new Date().getHours();
  var greet = hour < 12 ? "morning" : (hour < 18 ? "afternoon" : "evening");
  var gTime = document.getElementById("greet-time");
  if (gTime) gTime.textContent = greet;
  var gName = document.getElementById("greet-name");
  if (gName && name) gName.textContent = name;

  function setText(id, v) {
    var el = document.getElementById(id);
    if (el) el.textContent = v;
  }

  var STATUS_PRIORITY = { "In Transit": 0, Scheduled: 1, Unassigned: 2 };
  var STATUS_PRETTY = { "In Transit": "Collector En Route", Scheduled: "Scheduled", Unassigned: "Pending" };
  var STATUS_PROGRESS = { "In Transit": 80, Scheduled: 50, Unassigned: 20 };

  function schedCard(s) {
    var isRecycling = /recycl|plastic|metal|glass|paper/i.test(s.waste_type || "");
    var icon = isRecycling ? "recycling" : "delete";
    var div = document.createElement("div");
    div.className = "flex items-start gap-3 p-4 hover:bg-surface-container-low transition-colors border-b border-border-subtle last:border-b-0";
    div.innerHTML =
      '<span class="material-symbols-outlined w-10 h-10 rounded-full flex items-center justify-center shrink-0 ' +
      (isRecycling ? "bg-tertiary-container/20 text-tertiary-container" : "bg-surface-container-high text-on-surface-variant") + '">' + icon + "</span>" +
      '<div class="flex-1 min-w-0">' +
      '<p class="font-body-md text-body-md text-on-surface font-semibold">' + D.esc(s.waste_type || "Collection") + "</p>" +
      '<p class="font-label-sm text-label-sm text-on-surface-variant mt-0.5">' + D.esc(D.fmtDay(s.collection_date)) + "</p>" +
      '<p class="font-label-sm text-label-sm text-on-surface-variant">' +
        D.esc(D.fmtTime(s.time_start)) + " - " + D.esc(D.fmtTime(s.time_end)) + "</p>" +
      "</div>";
    return div;
  }

  async function load() {
    var requests = await D.list(
      "collection_requests",
      "id,request_number,waste_type,status,requested_at,scheduled_date",
      "requested_at.desc",
      "user_id=eq." + uid
    ).catch(function () { return []; });

    var pending = requests.filter(function (r) {
      return r.status === "Scheduled" || r.status === "In Transit" || r.status === "Unassigned";
    });
    if (pending.length) {
      pending.sort(function (a, b) {
        return (a.status in STATUS_PRIORITY ? STATUS_PRIORITY[a.status] : 9) -
               (b.status in STATUS_PRIORITY ? STATUS_PRIORITY[b.status] : 9);
      });
      var req = pending[0];
      setText("active-req-number", req.request_number);
      setText("active-req-type", req.waste_type || "General");
      setText("active-req-status", STATUS_PRETTY[req.status] || req.status);
      if (req.status === "In Transit") setText("active-req-time", "Collector on the way");
      else if (req.status === "Scheduled") setText("active-req-time", req.scheduled_date ? "Scheduled for " + D.fmtDay(req.scheduled_date) : "Scheduled");
      else setText("active-req-time", "Awaiting assignment");
      var prog = document.getElementById("active-req-progress");
      if (prog) prog.style.width = (STATUS_PROGRESS[req.status] || 40) + "%";
    } else {
      setText("active-req-number", "—");
      setText("active-req-type", "No active request");
      setText("active-req-status", "—");
      setText("active-req-time", "Start a new request anytime.");
    }

    var today = new Date().toISOString().slice(0, 10);
    var schedules = await D.list(
      "collection_schedules",
      "zone,waste_type,collection_date,time_start,time_end,status",
      "collection_date.asc",
      "collection_date=gte." + today
    ).catch(function () { return []; });

    var listEl = document.getElementById("upcoming-schedule");
    if (!listEl) return;
    listEl.innerHTML = "";
    if (!schedules.length) {
      listEl.innerHTML = '<div class="p-6 text-center">' +
        '<span class="material-symbols-outlined text-[36px] text-on-surface-variant">event_busy</span>' +
        '<p class="font-body-md text-body-md text-on-surface-variant mt-2">No upcoming collections.</p></div>';
      return;
    }
    schedules.slice(0, 3).forEach(function (s) { listEl.appendChild(schedCard(s)); });
  }

  load().catch(function (err) {
    console.error("EcoWaste dashboard failed to load:", err);
  });
})();
</script>
