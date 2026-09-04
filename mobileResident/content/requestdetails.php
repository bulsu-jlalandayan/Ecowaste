<!-- Mobile Request Details view -->
<div class="p-4 flex flex-col gap-4 pb-4">
<div class="flex items-center gap-2">
<a class="flex items-center justify-center w-9 h-9 rounded-full border border-outline-variant text-on-surface-variant hover:bg-surface-container-low transition-colors" href="#" data-view="requestlist">
<span class="material-symbols-outlined">arrow_back</span>
</a>
<div>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface" id="detail-title">Request Details</h2>
</div>
</div>

<!-- Status header -->
<div id="detail-status-hero" class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined">local_shipping</span>
</div>
<div class="flex-1 min-w-0">
<p class="font-data-mono text-data-mono text-primary font-medium" id="detail-req-number">—</p>
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold mt-1" id="detail-status-chip">—</span>
</div>
</div>

<!-- Request Information -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
<div class="px-4 py-3 border-b border-border-subtle flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">info</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Request Information</h3>
</div>
<div class="divide-y divide-border-subtle">
<div class="px-4 py-3 flex items-center justify-between gap-3">
<div class="flex items-center gap-2.5"><span class="material-symbols-outlined text-on-surface-variant text-[18px]">delete</span><span class="font-body-md text-body-md text-on-surface-variant">Waste Type</span></div>
<span class="font-body-md text-body-md text-on-surface text-right" id="detail-waste-type">—</span>
</div>
<div class="px-4 py-3 flex items-center justify-between gap-3">
<div class="flex items-center gap-2.5"><span class="material-symbols-outlined text-on-surface-variant text-[18px]">calendar_today</span><span class="font-body-md text-body-md text-on-surface-variant">Requested</span></div>
<span class="font-body-md text-body-md text-on-surface text-right" id="detail-requested">—</span>
</div>
<div class="px-4 py-3 flex items-center justify-between gap-3">
<div class="flex items-center gap-2.5"><span class="material-symbols-outlined text-on-surface-variant text-[18px]">event</span><span class="font-body-md text-body-md text-on-surface-variant">Scheduled Date</span></div>
<span class="font-body-md text-body-md text-on-surface text-right" id="detail-scheduled-date">—</span>
</div>
<div class="px-4 py-3 flex items-center justify-between gap-3">
<div class="flex items-center gap-2.5"><span class="material-symbols-outlined text-on-surface-variant text-[18px]">schedule</span><span class="font-body-md text-body-md text-on-surface-variant">Scheduled Time</span></div>
<span class="font-body-md text-body-md text-on-surface text-right" id="detail-scheduled-time">—</span>
</div>
<div class="px-4 py-3 flex items-center justify-between gap-3">
<div class="flex items-center gap-2.5"><span class="material-symbols-outlined text-on-surface-variant text-[18px]">location_on</span><span class="font-body-md text-body-md text-on-surface-variant">Zone</span></div>
<span class="font-body-md text-body-md text-on-surface text-right" id="detail-zone">—</span>
</div>
</div>
</div>

<!-- Location -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
<div class="px-4 py-3 border-b border-border-subtle flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">place</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Collection Location</h3>
</div>
<button id="copy-address-btn" class="text-primary font-label-sm text-label-sm flex items-center gap-1 transition-colors" type="button">
<span class="material-symbols-outlined text-[16px]">content_copy</span> Copy
</button>
</div>
<div class="px-4 py-3">
<p class="font-body-md text-body-md text-on-surface" id="detail-address">—</p>
</div>
</div>

<!-- Description -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
<div class="px-4 py-3 border-b border-border-subtle flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">description</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Description</h3>
</div>
<div class="px-4 py-3">
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
    "In Transit": { cls: "bg-tertiary-container/15 text-tertiary-container", label: "In Transit" },
    Completed: { cls: "bg-primary-container/15 text-primary", label: "Completed" }
  };

  function setTxt(id, v) {
    var el = document.getElementById(id);
    if (el) el.textContent = (v === null || v === undefined || v === "") ? "—" : v;
  }

  async function load() {
    var title = document.getElementById("detail-title");
    if (!requestId) {
      if (title) title.textContent = "No Request Selected";
      setTxt("detail-req-number", "—");
      setTxt("detail-address", "No collection request selected. Go back to My Requests to choose one.");
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
      chip.className = "inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold " + m.cls;
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
