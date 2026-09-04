<!-- Dashboard view - loaded via collector_content.php -->
<!-- Page Header -->
<div class="mb-stack-lg">
<h2 class="font-headline-lg text-headline-lg text-on-surface">Good day, <span id="dash-name">Collector</span></h2>
<p class="font-body-lg text-body-lg text-on-surface-variant mt-2">Here's an overview of your collection tasks.</p>
</div>
<!-- Summary Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-3 sm:gap-gutter mb-stack-lg">
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle p-6 flex flex-col gap-2 hover:shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05),_0px_2px_4px_-2px_rgba(0,0,0,0.05)] transition-shadow">
<div class="flex items-center gap-3 text-on-surface-variant">
<span class="material-symbols-outlined text-primary">event_available</span>
<span class="font-label-md text-label-md uppercase tracking-wider">Assigned Today</span>
</div>
<span class="font-headline-lg text-headline-lg text-on-surface" id="kpi-assigned">0</span>
</div>
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle p-6 flex flex-col gap-2 hover:shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05),_0px_2px_4px_-2px_rgba(0,0,0,0.05)] transition-shadow">
<div class="flex items-center gap-3 text-on-surface-variant">
<span class="material-symbols-outlined text-status-pending">schedule</span>
<span class="font-label-md text-label-md uppercase tracking-wider">Pending Collections</span>
</div>
<span class="font-headline-lg text-headline-lg text-on-surface" id="kpi-pending">0</span>
</div>
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle p-6 flex flex-col gap-2 hover:shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05),_0px_2px_4px_-2px_rgba(0,0,0,0.05)] transition-shadow">
<div class="flex items-center gap-3 text-on-surface-variant">
<span class="material-symbols-outlined text-status-progress">local_shipping</span>
<span class="font-label-md text-label-md uppercase tracking-wider">In Progress</span>
</div>
<span class="font-headline-lg text-headline-lg text-on-surface" id="kpi-progress">0</span>
</div>
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle p-6 flex flex-col gap-2 hover:shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05),_0px_2px_4px_-2px_rgba(0,0,0,0.05)] transition-shadow">
<div class="flex items-center gap-3 text-on-surface-variant">
<span class="material-symbols-outlined text-status-completed">check_circle</span>
<span class="font-label-md text-label-md uppercase tracking-wider">Completed Today</span>
</div>
<span class="font-headline-lg text-headline-lg text-on-surface" id="kpi-completed">0</span>
</div>
</div>
<!-- Main Content Area: Grids -->
<div class="grid grid-cols-1 xl:grid-cols-3 gap-container-margin">
<!-- Today's Collections Table -->
<div class="xl:col-span-2 bg-surface-container-lowest rounded-xl border border-border-subtle overflow-hidden">
<div class="p-6 border-b border-border-subtle flex justify-between items-center">
<h3 class="font-headline-sm text-headline-sm text-on-surface">Today's Collections</h3>
<button class="font-label-md text-label-md text-primary hover:text-primary-container transition-colors" data-view="assigned_collections">View All</button>
</div>
<div class="overflow-x-auto table-scroll">
<table class="w-full min-w-[680px] text-left border-collapse">
<thead class="sticky top-0 z-10">
<tr class="bg-surface-container-low border-b border-border-subtle">
<th class="p-3 sm:p-4 font-label-sm text-label-sm text-on-surface-variant">Request ID</th>
<th class="p-3 sm:p-4 font-label-sm text-label-sm text-on-surface-variant">Resident</th>
<th class="p-3 sm:p-4 font-label-sm text-label-sm text-on-surface-variant">Waste Details</th>
<th class="p-3 sm:p-4 font-label-sm text-label-sm text-on-surface-variant">Location &amp; Time</th>
<th class="p-3 sm:p-4 font-label-sm text-label-sm text-on-surface-variant">Status</th>
<th class="p-3 sm:p-4 font-label-sm text-label-sm text-on-surface-variant text-right">Action</th>
</tr>
</thead>
<tbody id="today-table-body" class="font-body-sm text-body-sm text-on-surface">
</tbody>
</table>
</div>
</div>
<!-- Upcoming Collections -->
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle p-6 flex flex-col">
<div class="border-b border-border-subtle pb-4 mb-4">
<h3 class="font-headline-sm text-headline-sm text-on-surface">Upcoming Collections</h3>
</div>
<div id="upcoming-list" class="flex flex-col gap-4 flex-1">
</div>
<div class="mt-4 pt-4 border-t border-border-subtle">
<button class="w-full py-2 bg-secondary-fixed text-on-secondary-fixed-variant rounded-lg font-label-md text-label-md hover:opacity-90 transition-opacity" data-view="assigned_collections">
                        View Schedule
                    </button>
</div>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  var UI = window.EcoWasteUI;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var uid = D.currentUserId();
  var CHIP_CLASSES = {
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

  function buildTodayRow(r) {
    var chip = CHIP_CLASSES[r.status] || "bg-surface-container-high text-on-surface-variant";
    var label = CHIP_LABEL[r.status] || r.status;
    var wt = UI.wasteType(r.waste_type);
    var tr = document.createElement("tr");
    tr.className = "border-b border-border-subtle hover:bg-surface-container-low transition-colors";
    tr.innerHTML =
      '<td class="p-3 sm:p-4 font-label-md text-label-md text-on-surface whitespace-nowrap">' + D.esc(r.request_number) + '</td>' +
      '<td class="p-3 sm:p-4 whitespace-nowrap">' + D.esc(r.location || "—") + '</td>' +
      '<td class="p-3 sm:p-4"><div class="flex flex-col"><span>' + D.esc(r.waste_type || "General") + '</span>' +
      '<span class="text-on-surface-variant text-xs">' + D.esc(r.zone || "") + '</span></div></td>' +
      '<td class="p-3 sm:p-4"><div class="flex flex-col"><span>' + D.esc(r.location || "—") + '</span>' +
      '<span class="text-on-surface-variant text-xs">' + (r.scheduled_date ? D.fmtDay(r.scheduled_date) : D.fmtDate(r.requested_at)) + (r.time_start ? ' ' + D.fmtTime(r.time_start) + ' - ' + D.fmtTime(r.time_end) : '') + '</span></div></td>' +
      '<td class="p-3 sm:p-4"><span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ' + chip + ' whitespace-nowrap">' + label + '</span></td>' +
      '<td class="p-3 sm:p-4 text-right"><button class="font-label-md text-label-md text-primary hover:text-primary-container transition-colors whitespace-nowrap" data-view="collection_details" data-request-id="' + r.id + '">View Details</button></td>';
    return tr;
  }

  function buildUpcomingCard(r) {
    var wt = UI.wasteType(r.waste_type);
    var div = document.createElement("a");
    div.href = "#";
    div.className = "flex gap-4 p-4 rounded-lg border border-border-subtle hover:bg-surface-container-low transition-colors";
    div.setAttribute("data-view", "collection_details");
    div.setAttribute("data-request-id", r.id);
    div.innerHTML =
      '<div class="w-12 h-12 rounded bg-surface-container flex items-center justify-center shrink-0">' +
      '<span class="material-symbols-outlined text-on-surface-variant">event</span></div>' +
      '<div class="flex-1"><div class="flex justify-between items-start">' +
      '<h4 class="font-label-md text-label-md text-on-surface">' + D.esc(r.request_number) + ' - ' + D.esc(r.waste_type || "General") + '</h4>' +
      '<span class="font-label-sm text-label-sm text-primary">' + (r.scheduled_date ? D.fmtDay(r.scheduled_date) : D.fmtDate(r.requested_at)) + '</span></div>' +
      '<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">' + D.esc(r.location || "—") + '</p></div>';
    return div;
  }

  async function load() {
    var results = await Promise.all([
      D.list("collection_requests", "id,request_number,location,zone,waste_type,status,requested_at,completed_at,scheduled_date,time_start,time_end", "requested_at.asc", "collector_id=eq." + uid),
      D.list("profiles", "full_name", null, "id=eq." + uid)
    ]);
    var requests = results[0] || [];
    var profile = results[1] && results[1].length ? results[1][0] : null;

    if (profile && profile.full_name) {
      setText("dash-name", profile.full_name.split(" ")[0]);
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

    var todayRows = requests.filter(function (r) {
      return r.status === "Scheduled" || r.status === "In Transit";
    }).slice(0, 8);
    var tbody = document.getElementById("today-table-body");
    if (todayRows.length) {
      todayRows.forEach(function (r) { tbody.appendChild(buildTodayRow(r)); });
    } else {
      var tr = document.createElement("tr");
      tr.innerHTML = '<td colspan="6" class="p-6 text-center font-body-sm text-body-sm text-on-surface-variant">No collections assigned to you yet.</td>';
      tbody.appendChild(tr);
    }

    var upcoming = requests.filter(function (r) {
      return r.status === "Scheduled" && r.requested_at && new Date(r.requested_at) > now;
    }).slice(0, 3);
    var upcomingList = document.getElementById("upcoming-list");
    if (upcoming.length) {
      upcoming.forEach(function (r) { upcomingList.appendChild(buildUpcomingCard(r)); });
    } else {
      upcomingList.innerHTML = '<p class="font-body-sm text-body-sm text-on-surface-variant p-4">No upcoming collections scheduled.</p>';
    }
  }

  load().catch(function (err) {
    console.error("EcoWaste dashboard failed to load:", err);
  });
})();
</script>
