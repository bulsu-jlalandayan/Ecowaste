<!-- Request Details content fragment (loaded by resident.html via content.php) -->
<div class="p-margin max-w-7xl mx-auto flex flex-col gap-lg pb-24">
<!-- Page Header -->
<div class="flex items-center gap-md">
<a class="flex items-center justify-center w-10 h-10 rounded-full border border-outline-variant text-on-surface-variant hover:bg-surface-container-low transition-colors" href="#" data-view="requestlist">
<span class="material-symbols-outlined">arrow_back</span>
</a>
<div>
<h1 class="font-headline-lg text-headline-lg text-on-surface" id="detail-title">Request Details</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-xs">Full details of your collection request.</p>
</div>
</div>
<!-- Request Information Card -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md shadow-sm">
<h2 class="font-headline-md text-headline-md text-on-surface mb-md flex items-center gap-2">
<span class="material-symbols-outlined text-primary">info</span>
<span>Request Information</span>
</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-md">
<div class="flex flex-col gap-xs">
<span class="font-label-caps text-label-caps text-on-surface-variant">Request ID</span>
<span class="font-data-mono text-data-mono text-on-surface font-medium" id="detail-req-number">—</span>
</div>
<div class="flex flex-col gap-xs">
<span class="font-label-caps text-label-caps text-on-surface-variant">Waste Type</span>
<span class="font-body-md text-body-md text-on-surface font-medium" id="detail-waste-type">—</span>
</div>
<div class="flex flex-col gap-xs">
<span class="font-label-caps text-label-caps text-on-surface-variant">Status</span>
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full font-label-caps text-label-caps self-start" id="detail-status-chip">—</span>
</div>
<div class="flex flex-col gap-xs">
<span class="font-label-caps text-label-caps text-on-surface-variant">Requested</span>
<span class="font-body-md text-body-md text-on-surface font-medium" id="detail-requested">—</span>
</div>
<div class="flex flex-col gap-xs">
<span class="font-label-caps text-label-caps text-on-surface-variant">Scheduled Date</span>
<span class="font-body-md text-body-md text-on-surface font-medium" id="detail-scheduled-date">—</span>
</div>
<div class="flex flex-col gap-xs">
<span class="font-label-caps text-label-caps text-on-surface-variant">Scheduled Time</span>
<span class="font-body-md text-body-md text-on-surface font-medium" id="detail-scheduled-time">—</span>
</div>
<div class="flex flex-col gap-xs">
<span class="font-label-caps text-label-caps text-on-surface-variant">Zone</span>
<span class="font-body-md text-body-md text-on-surface font-medium" id="detail-zone">—</span>
</div>
</div>
</div>
<!-- Collection Location Card -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md shadow-sm">
<div class="flex items-center justify-between mb-md">
<h2 class="font-headline-md text-headline-md text-on-surface flex items-center gap-2">
<span class="material-symbols-outlined text-primary">location_on</span>
<span>Collection Location</span>
</h2>
<button id="copy-address-btn" class="text-primary hover:text-primary-container font-label-caps text-label-caps flex items-center gap-1 transition-colors" type="button">
<span class="material-symbols-outlined text-[16px]">content_copy</span>
Copy
</button>
</div>
<div class="p-md bg-surface-container-low rounded-lg border border-outline-variant">
<p class="font-body-md text-body-md text-on-surface font-medium" id="detail-address">—</p>
</div>
</div>
<!-- Description Card -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md shadow-sm">
<h2 class="font-headline-md text-headline-md text-on-surface mb-md flex items-center gap-2">
<span class="material-symbols-outlined text-primary">description</span>
<span>Description</span>
</h2>
<div class="p-md bg-surface-container-low rounded-lg border border-outline-variant">
<p class="font-body-md text-body-md text-on-surface" id="detail-description">No description provided.</p>
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

  var STATUS_META = {
    Unassigned: { cls: "bg-error-container text-on-error-container", label: "Pending" },
    Scheduled: { cls: "bg-secondary-container text-on-secondary-container", label: "Scheduled" },
    "In Transit": { cls: "bg-tertiary-container/10 text-tertiary-container", label: "In Transit" },
    Completed: { cls: "bg-primary-container/10 text-primary", label: "Completed" }
  };

  function setTxt(id, v) {
    var el = document.getElementById(id);
    if (el) el.textContent = (v === null || v === undefined || v === "") ? "—" : v;
  }

  async function load() {
    var title = document.getElementById("detail-title");
    if (!requestId) {
      if (title) title.textContent = "No Request Selected";
      var addr = document.getElementById("detail-address");
      if (addr) addr.textContent = "No collection request selected. Go back to My Requests to choose one.";
      return;
    }
    var rows = await D.list(
      "collection_requests",
      "id,request_number,location,zone,waste_type,status,requested_at,scheduled_date,time_start,time_end,description",
      null,
      "id=eq." + requestId
    ).catch(function () { return []; });
    if (!rows || !rows.length) {
      if (title) title.textContent = "Request Not Found";
      setTxt("detail-req-number", "Not found");
      return;
    }
    var r = rows[0];
    var items = await D.request(
      "/rest/v1/collection_request_items?select=waste_type&request_id=eq." + requestId
    ).catch(function () { return []; });
    var wasteTypes = items.map(function (i) { return i.waste_type; });
    if (!wasteTypes.length && r.waste_type) wasteTypes = [r.waste_type];
    if (title) title.textContent = "Request #" + r.request_number;
    setTxt("detail-req-number", r.request_number);
    setTxt("detail-waste-type", wasteTypes.join(", "));
    setTxt("detail-requested", r.requested_at ? D.fmtDate(r.requested_at) : "—");
    setTxt("detail-scheduled-date", r.scheduled_date ? D.fmtDay(r.scheduled_date) : "Not scheduled");
    setTxt("detail-scheduled-time", (r.time_start || "--") + " - " + (r.time_end || "--"));
    setTxt("detail-zone", r.zone || "—");
    setTxt("detail-address", r.location || "—");
    setTxt("detail-description", r.description || "No description provided.");

    var m = STATUS_META[r.status] || { cls: "bg-surface-container-high text-on-surface-variant", label: r.status };
    var chip = document.getElementById("detail-status-chip");
    if (chip) {
      chip.className = "inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full font-label-caps text-label-caps self-start " + m.cls;
      chip.textContent = m.label;
    }
  }

  var copyBtn = document.getElementById("copy-address-btn");
  if (copyBtn) copyBtn.addEventListener("click", function () {
    var addr = document.getElementById("detail-address");
    if (!addr || !addr.textContent || addr.textContent === "—") return;
    navigator.clipboard.writeText(addr.textContent).then(function () {
      UI.toast("Address copied.");
    }).catch(function () {
      UI.toast("Could not copy address.", "error");
    });
  });

  load().catch(function (err) {
    console.error("EcoWaste request details failed to load:", err);
  });
})();
</script>
