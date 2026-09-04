<!-- Collection Details view - loaded via collector_content.php -->
<div class="max-w-6xl mx-auto space-y-stack-lg">
<!-- Page Header -->
<div class="flex items-center gap-4">
<a class="flex items-center justify-center w-10 h-10 rounded-full border border-border-subtle text-on-surface-variant hover:bg-surface-container-low transition-colors" href="#" data-view="assigned_collections">
<span class="material-symbols-outlined">arrow_back</span>
</a>
<h1 id="detail-title" class="font-headline-lg text-headline-lg text-on-surface">Collection Request</h1>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter">
<!-- Left Column -->
<div class="lg:col-span-2 space-y-stack-md">
<!-- Request Information Card -->
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle p-6 shadow-sm">
<h2 class="font-headline-sm text-headline-sm text-on-surface mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">info</span>
                        Request Information
                    </h2>
<div class="grid grid-cols-2 gap-y-6 gap-x-4">
<div>
<div class="font-label-sm text-label-sm text-on-surface-variant uppercase mb-1">Request ID</div>
<div id="detail-req-number" class="font-body-md text-body-md text-on-surface font-medium">—</div>
</div>
<div>
<div class="font-label-sm text-label-sm text-on-surface-variant uppercase mb-1">Waste Type</div>
<div id="detail-waste-type" class="font-body-md text-body-md text-on-surface font-medium">—</div>
</div>
<div>
<div class="font-label-sm text-label-sm text-on-surface-variant uppercase mb-1">Estimated Quantity</div>
<div id="detail-zone" class="font-body-md text-body-md text-on-surface font-medium">—</div>
</div>
<div>
<div class="font-label-sm text-label-sm text-on-surface-variant uppercase mb-1">Status</div>
<div id="detail-status-chip" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-secondary-fixed text-on-secondary-fixed-variant">—</div>
</div>
<div>
<div class="font-label-sm text-label-sm text-on-surface-variant uppercase mb-1">Scheduled Date</div>
<div id="detail-scheduled-date" class="font-body-md text-body-md text-on-surface flex items-center gap-1">
<span class="material-symbols-outlined text-on-surface-variant text-sm">calendar_today</span>
                                —
                            </div>
</div>
<div>
<div class="font-label-sm text-label-sm text-on-surface-variant uppercase mb-1">Scheduled Time</div>
<div id="detail-scheduled-time" class="font-body-md text-body-md text-on-surface flex items-center gap-1">
<span class="material-symbols-outlined text-on-surface-variant text-sm">schedule</span>
                                —
                            </div>
</div>
</div>
</div>
<!-- Waste Description -->
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle p-6 shadow-sm">
<h2 class="font-headline-sm text-headline-sm text-on-surface mb-4 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">description</span>
                        Waste Description
                    </h2>
<div id="detail-description" class="bg-surface-container-low rounded-lg p-4 text-on-surface font-body-md text-body-md">
                        No description provided.
                    </div>
</div>
</div>
<!-- Right Column -->
<div class="space-y-stack-md">
<!-- Collection Location Card -->
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle p-6 shadow-sm">
<h2 class="font-headline-sm text-headline-sm text-on-surface mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">location_on</span>
                        Collection Location
                    </h2>
<div class="space-y-4">
<div class="flex items-start gap-3">
<div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-on-surface-variant flex-shrink-0">
<span class="material-symbols-outlined">person</span>
</div>
<div>
<div class="font-label-sm text-label-sm text-on-surface-variant uppercase">Resident</div>
<div id="detail-location-name" class="font-body-md text-body-md text-on-surface font-medium">—</div>
</div>
</div>
<div class="border-t border-border-subtle pt-4 mt-4">
<div class="flex justify-between items-start mb-2">
<div class="font-label-sm text-label-sm text-on-surface-variant uppercase">Address</div>
<button id="copy-address-btn" class="text-primary hover:text-primary-container font-label-sm text-label-sm flex items-center gap-1 transition-colors">
<span class="material-symbols-outlined" style="font-size: 16px;">content_copy</span>
                                    Copy
                                </button>
</div>
<div id="detail-address" class="font-body-md text-body-md text-on-surface font-medium mb-1">
                                —
                            </div>
<div id="detail-neighborhood" class="font-body-sm text-body-sm text-on-surface-variant">
                            </div>
</div>
</div>
</div>
</div>
</div>
<!-- Bottom Section: Status & Actions -->
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle p-6 shadow-sm mt-stack-lg">
<div class="flex flex-col md:flex-row items-center justify-between gap-6">
<!-- Progress Bar -->
<div class="flex-grow w-full md:w-auto">
<div class="font-label-sm text-label-sm text-on-surface-variant uppercase mb-4">
<span class="sm:hidden">Collection Progress — Step <span id="detail-step-num">1</span> of <span id="detail-step-total">4</span></span>
<span class="hidden sm:inline">Collection Progress</span>
</div>
<div id="detail-stepper" class="relative flex items-center justify-between w-full max-w-2xl">
</div>
</div>
<!-- Action Buttons -->
<div id="detail-actions" class="w-full md:w-auto flex-shrink-0">
</div>
</div>
</div>
<!-- Completed Summary -->
<div id="detail-completed" class="hidden bg-emerald-50 border border-emerald-200 rounded-xl p-6 shadow-sm mt-stack-lg">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-status-completed text-[28px]">verified</span>
<div>
<p class="font-body-md text-body-md text-emerald-900 font-medium">This collection has been completed.</p>
<p id="detail-completed-when" class="font-label-sm text-label-sm text-emerald-700 mt-1"></p>
</div>
</div>
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
    Scheduled: ["bg-amber-100 text-status-pending", "Pending"],
    "In Transit": ["bg-blue-100 text-status-progress", "In Progress"],
    Completed: ["bg-emerald-100 text-status-completed", "Completed"]
  };

  function renderStepper(status) {
    var steps = [
      { label: "Assigned", icon: "assignment_turned_in" },
      { label: "In Progress", icon: "local_shipping" },
      { label: "Collected", icon: "inventory_2" },
      { label: "Completed", icon: "task_alt" }
    ];
    var idx = status === "Completed" ? 3 : status === "In Transit" ? 1 : 0;
    var host = document.getElementById("detail-stepper");
    host.innerHTML = "";
    var filledPct = idx === 0 ? "0%" : idx === 1 ? "33%" : idx === 2 ? "66%" : "100%";
    host.innerHTML = '<div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-full h-1 bg-surface-container rounded-full z-0"></div>' +
      '<div class="absolute left-0 top-1/2 transform -translate-y-1/2 h-1 bg-primary rounded-full z-0 transition-all duration-500" style="width:' + filledPct + '"></div>';
    steps.forEach(function (s, i) {
      var active = i <= idx;
      var done = i < idx;
      var div = document.createElement("div");
      div.className = "relative z-10 flex flex-col items-center gap-1.5 sm:gap-2";
      div.innerHTML =
        '<div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full flex items-center justify-center ring-4 ring-surface-container-lowest shadow-sm ' +
        (active ? (done ? "bg-primary text-on-primary" : "bg-primary-fixed text-on-primary-fixed-variant border-2 border-primary") : "bg-surface-container text-on-surface-variant border border-border-subtle") + '">' +
        '<span class="material-symbols-outlined text-sm sm:text-base" style="' + (done ? "font-variation-settings: 'FILL' 1;" : "") + '">' + (done ? "check" : s.icon) + '</span></div>' +
        '<span class="hidden sm:block font-label-sm text-label-sm ' + (active ? "text-primary font-semibold" : "text-on-surface-variant") + '">' + s.label + '</span>';
      host.appendChild(div);
    });
  }

  function renderActions(r) {
    var host = document.getElementById("detail-actions");
    host.innerHTML = "";
    if (r.status === "Scheduled") {
      host.innerHTML = '<button id="start-btn" class="w-full md:w-auto bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md py-4 px-8 rounded-lg shadow-sm transition-colors flex items-center justify-center gap-2">' +
        '<span class="material-symbols-outlined">play_arrow</span> Start Collection</button>';
      document.getElementById("start-btn").addEventListener("click", function () {
        UI.confirm({ title: "Start collection?", message: "Mark this collection as In Progress?", confirmLabel: "Start" })
          .then(function (ok) {
            if (!ok) return;
            return D.update("collection_requests", "id=eq." + r.id, { status: "In Transit" });
          })
          .then(function () { if (typeof UI.toast !== "undefined") UI.toast("Collection started."); load(); })
          .catch(function (err) { if (err && typeof UI.toast !== "undefined") UI.toast("Could not start: " + (err.message || "unknown"), "error"); });
      });
    } else if (r.status === "In Transit") {
      host.innerHTML =
        '<button id="record-btn" class="w-full md:w-auto bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md py-4 px-8 rounded-lg shadow-sm transition-colors flex items-center justify-center gap-2 mb-3 md:mb-0 md:mr-3" data-view="waste_records" data-request-id="' + r.id + '">' +
        '<span class="material-symbols-outlined">delete_sweep</span> Record Waste</button>' +
        '<button id="complete-btn" class="w-full md:w-auto bg-status-completed hover:bg-emerald-600 text-white font-label-md text-label-md py-4 px-8 rounded-lg shadow-sm transition-colors flex items-center justify-center gap-2">' +
        '<span class="material-symbols-outlined">check_circle</span> Mark as Completed</button>';
      document.getElementById("complete-btn").addEventListener("click", function () {
        UI.confirm({ title: "Complete collection?", message: "Mark this collection as Completed?", confirmLabel: "Complete" })
          .then(function (ok) {
            if (!ok) return;
            return D.update("collection_requests", "id=eq." + r.id, { status: "Completed", completed_at: new Date().toISOString() });
          })
          .then(function () { if (typeof UI.toast !== "undefined") UI.toast("Collection completed."); load(); })
          .catch(function (err) { if (err && typeof UI.toast !== "undefined") UI.toast("Could not complete: " + (err.message || "unknown"), "error"); });
      });
    }
  }

  function renderCompleted(r) {
    var el = document.getElementById("detail-completed");
    el.classList.toggle("hidden", r.status !== "Completed");
    if (r.status === "Completed") {
      document.getElementById("detail-completed-when").textContent = "Completed " + (r.completed_at ? D.fmtDate(r.completed_at) : D.fmtDate(r.requested_at));
    }
  }

  async function load() {
    if (!requestId) {
      var host = document.getElementById("detail-actions");
      host.innerHTML = '<div class="text-center font-body-md text-body-md text-on-surface-variant">No collection selected. <a href="#" class="text-primary" data-view="assigned_collections">Choose one</a></div>';
      return;
    }
    var rows = await D.list("collection_requests", "id,request_number,location,zone,waste_type,status,requested_at,completed_at,description,scheduled_date,time_start,time_end", null, "id=eq." + requestId);
    if (!rows || !rows.length) {
      document.getElementById("detail-req-number").textContent = "Not found";
      return;
    }
    var r = rows[0];
    document.getElementById("detail-title").textContent = "Collection Request #" + r.request_number;
    document.getElementById("detail-req-number").textContent = r.request_number;
    document.getElementById("detail-waste-type").textContent = r.waste_type || "General";
    document.getElementById("detail-zone").textContent = r.zone || "—";
    document.getElementById("detail-location-name").textContent = r.location || "—";
    document.getElementById("detail-address").textContent = r.location || "—";
    document.getElementById("detail-neighborhood").textContent = r.zone ? "Zone: " + r.zone : "";
    document.getElementById("detail-description").textContent = r.description || "No description provided.";

    document.getElementById("detail-scheduled-date").innerHTML = '<span class="material-symbols-outlined text-on-surface-variant text-sm">calendar_today</span> ' + (r.scheduled_date ? D.fmtDay(r.scheduled_date) : "Not scheduled");
    document.getElementById("detail-scheduled-time").innerHTML = '<span class="material-symbols-outlined text-on-surface-variant text-sm">schedule</span> ' + ((r.time_start || "--") + " - " + (r.time_end || "--"));

    var chip = CHIP[r.status] || ["bg-surface-container-high text-on-surface-variant", r.status];
    var chipEl = document.getElementById("detail-status-chip");
    chipEl.className = "inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium " + chip[0];
    chipEl.textContent = chip[1];

    renderStepper(r.status);
    renderActions(r);
    renderCompleted(r);
  }

  document.getElementById("copy-address-btn").addEventListener("click", function () {
    var addr = document.getElementById("detail-address").textContent;
    navigator.clipboard.writeText(addr).then(function () {
      UI.toast("Address copied.", "success");
    }).catch(function () {
      UI.toast("Could not copy address.", "error");
    });
  });

  load().catch(function (err) {
    console.error("EcoWaste collection details failed to load:", err);
  });
})();
</script>
