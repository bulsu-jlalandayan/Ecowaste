<!-- Mobile Collection Details view -->
<div class="p-4 flex flex-col gap-4">
<!-- Back -->
<button class="self-start inline-flex items-center gap-1.5 font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" data-view="assigned_collections" type="button">
<span class="material-symbols-outlined text-[20px]">arrow_back</span> Collections
</button>

<!-- Request header -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
<div id="detail-banner" class="h-1.5 bg-gradient-to-r from-primary to-emerald-500"></div>
<div class="p-4">
<div class="flex items-center gap-2 flex-wrap" id="req-header-top">
<span id="detail-request-number" class="font-label-md text-label-md text-primary">—</span>
<span id="detail-status-chip" class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold bg-surface-container-high text-on-surface-variant">—</span>
</div>
<p id="detail-waste-type" class="font-headline-sm text-headline-sm text-on-surface mt-2 flex items-center gap-2">—</p>
<p id="detail-date" class="font-label-sm text-label-sm text-on-surface-variant mt-1.5 flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">calendar_today</span> <span id="detail-date-value">—</span></p>
<p id="detail-time" class="font-label-sm text-label-sm text-on-surface-variant mt-1 flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">schedule</span> <span id="detail-time-value">—</span></p>
</div>
</div>

<!-- Progress stepper -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4">
<h3 class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider mb-3">Progress</h3>
<div id="stepper" class="flex items-center"></div>
</div>

<!-- Location card -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4">
<div class="flex items-start justify-between gap-3">
<div class="flex-1 min-w-0">
<h3 class="font-label-md text-label-md text-primary uppercase tracking-wider flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px]">location_on</span> Collection Location
</h3>
<p id="detail-location" class="font-body-md text-body-md text-on-surface mt-2">—</p>
<p id="detail-zone" class="font-body-sm text-body-sm text-on-surface-variant mt-1">—</p>
</div>
<button id="copy-address-btn" class="shrink-0 inline-flex items-center gap-1 text-primary font-label-md text-label-md hover:bg-primary-fixed/60 rounded-lg px-2 py-1.5 transition-colors" type="button">
<span class="material-symbols-outlined text-[18px]">content_copy</span> Copy
</button>
</div>
</div>

<!-- Actions -->
<div id="detail-actions" class="flex flex-col gap-3"></div>

<!-- Completed summary -->
<div id="detail-completed" class="hidden bg-emerald-50 border border-emerald-200 rounded-xl p-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-status-completed">verified</span>
<p class="font-body-md text-body-md text-emerald-900">This collection has been completed.</p>
</div>
<p id="detail-completed-when" class="font-label-sm text-label-sm text-emerald-700 mt-2"></p>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  var UI = window.EcoWasteUI;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var state = window.EcoWasteAppState || {};
  var requestId = state.selectedRequestId;

  var CHIP = {
    Scheduled: ["bg-amber-100 text-amber-800", "Pending"],
    "In Transit": ["bg-blue-100 text-blue-800", "In Progress"],
    Completed: ["bg-emerald-100 text-emerald-800", "Completed"]
  };

  function renderStepper(status) {
    var steps = [
      { key: "Scheduled", label: "Assigned", icon: "assignment_turned_in" },
      { key: "In Transit", label: "In Progress", icon: "local_shipping" },
      { key: "Completed", label: "Completed", icon: "check_circle" }
    ];
    var idx = status === "Completed" ? 2 : status === "In Transit" ? 1 : 0;
    var host = document.getElementById("stepper");
    host.innerHTML = "";
    steps.forEach(function (s, i) {
      var active = i <= idx;
      var done = i < idx;
      var circle = document.createElement("div");
      circle.className = "w-8 h-8 rounded-full flex items-center justify-center shrink-0 transition-colors " +
        (active ? (done ? "bg-primary text-on-primary" : "bg-primary text-on-primary ring-4 ring-primary-fixed") : "bg-surface-container-high text-on-surface-variant");
      circle.innerHTML = '<span class="material-symbols-outlined text-[16px]">' + (done ? "check" : s.icon) + "</span>";
      var label = document.createElement("p");
      label.className = "text-[11px] font-medium mt-1.5 text-center transition-colors " + (active ? "text-primary" : "text-on-surface-variant");
      label.textContent = s.label;
      var wrap = document.createElement("div");
      wrap.className = "flex flex-col items-center flex-1";
      wrap.appendChild(circle);
      wrap.appendChild(label);
      host.appendChild(wrap);
      if (i < steps.length - 1) {
        var line = document.createElement("div");
        line.className = "h-0.5 flex-1 -mt-4 mb-3 mx-1 rounded-full " + (i < idx ? "bg-primary" : "bg-surface-container-high");
        host.appendChild(line);
      }
    });
  }

  function renderActions(r) {
    var host = document.getElementById("detail-actions");
    host.innerHTML = "";
    if (r.status === "Scheduled") {
      if (isReady(r)) {
        host.innerHTML +=
          '<button id="start-collection-btn" class="w-full inline-flex items-center justify-center gap-2 py-3.5 rounded-xl bg-gradient-to-r from-primary to-primary-container text-on-primary font-label-md text-label-md shadow-md shadow-primary/25 hover:opacity-90 active:scale-[0.99] transition-all" type="button">' +
          '<span class="material-symbols-outlined text-[20px]">play_circle</span> Start Collection</button>';
        document.getElementById("start-collection-btn").addEventListener("click", function () {
          UI.confirm({
            title: "Start collection?",
            message: "Mark this collection as In Progress?",
            confirmLabel: "Start"
          }).then(function (ok) {
            if (!ok) throw new Error("cancelled");
            return D.update("collection_requests", "id=eq." + r.id, { status: "In Transit" });
          }).then(function () {
            UI.toast.success("Collection started.");
            load();
          }).catch(function (err) {
            if (err.message !== "cancelled") UI.toast.error("Could not start: " + (err.message || "unknown error"));
          });
        });
      } else {
        host.innerHTML +=
          '<button disabled class="w-full inline-flex items-center justify-center gap-2 py-3.5 rounded-xl bg-gradient-to-r from-primary to-primary-container text-on-primary font-label-md text-label-md opacity-40 cursor-not-allowed" type="button">' +
          '<span class="material-symbols-outlined text-[20px]">play_circle</span> Start Collection</button>' +
          '<p class="font-label-sm text-label-sm text-on-surface-variant flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">schedule</span> Available ' + D.esc(scheduleHint(r)) + '</p>';
      }
    } else if (r.status === "In Transit") {
      host.innerHTML +=
        '<button id="record-waste-btn" class="w-full inline-flex items-center justify-center gap-2 py-3.5 rounded-xl bg-gradient-to-r from-primary to-primary-container text-on-primary font-label-md text-label-md shadow-md shadow-primary/25 hover:opacity-90 active:scale-[0.99] transition-all" data-view="waste_records" data-request-id="' + r.id + '" type="button">' +
        '<span class="material-symbols-outlined text-[20px]">delete_sweep</span> Record Waste</button>';
      if (isReady(r)) {
        host.innerHTML +=
          '<button id="complete-btn" class="w-full inline-flex items-center justify-center gap-2 py-3.5 rounded-xl bg-status-completed text-white font-label-md text-label-md shadow-md shadow-emerald-500/25 hover:bg-emerald-600 active:scale-[0.99] transition-all" type="button">' +
          '<span class="material-symbols-outlined text-[20px]">check_circle</span> Mark as Completed</button>';
        document.getElementById("complete-btn").addEventListener("click", function () {
          UI.confirm({
            title: "Complete collection?",
            message: "Mark this collection as Completed?",
            confirmLabel: "Complete"
          }).then(function (ok) {
            if (!ok) throw new Error("cancelled");
            return D.update("collection_requests", "id=eq." + r.id, {
              status: "Completed",
              completed_at: new Date().toISOString()
            });
          }).then(function () {
            UI.toast.success("Collection completed.");
            load();
          }).catch(function (err) {
            if (err.message !== "cancelled") UI.toast.error("Could not complete: " + (err.message || "unknown error"));
          });
        });
      } else {
        host.innerHTML +=
          '<button disabled class="w-full inline-flex items-center justify-center gap-2 py-3.5 rounded-xl bg-status-completed text-white font-label-md text-label-md opacity-40 cursor-not-allowed" type="button">' +
          '<span class="material-symbols-outlined text-[20px]">check_circle</span> Mark as Completed</button>' +
          '<p class="font-label-sm text-label-sm text-on-surface-variant flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">schedule</span> Available ' + D.esc(scheduleHint(r)) + '</p>';
      }
    }
  }

  function scheduledStart(r) {
    if (!r.scheduled_date) return null;
    var date = String(r.scheduled_date).slice(0, 10).split("-");
    var time = r.time_start ? String(r.time_start).split(":") : [0, 0];
    var d = new Date(
      parseInt(date[0], 10), (parseInt(date[1], 10) || 1) - 1, parseInt(date[2], 10) || 1,
      parseInt(time[0], 10) || 0, parseInt(time[1], 10) || 0
    );
    return isNaN(d.getTime()) ? null : d;
  }

  function isReady(r) {
    var start = scheduledStart(r);
    return !start || new Date() >= start;
  }

  function scheduleHint(r) {
    return (r.scheduled_date ? D.fmtDay(r.scheduled_date) : "the scheduled date") +
      (r.time_start ? " at " + D.fmtTime(r.time_start) : "");
  }

  function renderCompleted(r) {
    document.getElementById("detail-completed").classList.toggle("hidden", r.status !== "Completed");
    if (r.status === "Completed") {
      document.getElementById("detail-completed-when").textContent = "Completed " + (r.completed_at ? D.fmtDate(r.completed_at) : D.fmtDate(r.requested_at));
    }
  }

  async function load() {
    if (!requestId) {
      var host = document.getElementById("detail-actions");
      host.innerHTML = '<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-6 text-center">' +
        '<p class="font-body-md text-body-md text-on-surface-variant">No collection selected.</p>' +
        '<a href="#" class="mt-2 inline-flex items-center gap-1 font-label-md text-label-md text-primary" data-view="assigned_collections">Choose a collection</a></div>';
      return;
    }
    var rows = await D.list("collection_requests", "id,request_number,location,zone,waste_type,status,requested_at,completed_at,scheduled_date,time_start,time_end", null, "id=eq." + requestId);
    if (!rows || !rows.length) {
      document.getElementById("detail-request-number").textContent = "Not found";
      return;
    }
    var r = rows[0];
    document.getElementById("detail-request-number").textContent = r.request_number;
    var wt = UI.wasteType(r.waste_type);
    var wasteTypeEl = document.getElementById("detail-waste-type");
    wasteTypeEl.innerHTML =
      '<span class="material-symbols-outlined text-[20px] ' + wt.chip + ' rounded-lg p-1">' + wt.icon + "</span>" +
      '<span class="font-headline-sm text-headline-sm text-on-surface">' + D.esc(r.waste_type || "General") + "</span>";
    document.getElementById("detail-date-value").textContent = r.scheduled_date ? D.fmtDay(r.scheduled_date) : "Not scheduled";
    document.getElementById("detail-time-value").textContent = r.time_start
      ? D.fmtTime(r.time_start) + " - " + (r.time_end ? D.fmtTime(r.time_end) : "--")
      : "No time window";
    document.getElementById("detail-location").textContent = r.location || "—";
    document.getElementById("detail-zone").textContent = r.zone || "";
    var chip = CHIP[r.status] || ["bg-surface-container-high text-on-surface-variant", r.status];
    var chipEl = document.getElementById("detail-status-chip");
    chipEl.className = "inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold " + chip[0];
    chipEl.textContent = chip[1];
    renderStepper(r.status);
    renderActions(r);
    renderCompleted(r);
  }

  document.getElementById("copy-address-btn").addEventListener("click", function () {
    var addr = document.getElementById("detail-location").textContent;
    navigator.clipboard.writeText(addr).then(function () {
      UI.toast.success("Address copied.");
    }).catch(function () {
      UI.toast.error("Could not copy, please copy manually.");
    });
  });

  load().catch(function (err) {
    console.error("EcoWaste collection details failed to load:", err);
  });
})();
</script>