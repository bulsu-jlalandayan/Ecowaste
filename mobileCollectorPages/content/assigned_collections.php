<!-- Mobile Assigned Collections view -->
<div class="p-4 flex flex-col gap-4">
<div>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface flex items-center gap-2">
<span class="material-symbols-outlined w-9 h-9 rounded-xl bg-primary text-on-primary flex items-center justify-center text-[20px]">event_note</span>
Assigned Collections
</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">View and manage collections assigned to you.</p>
</div>

<!-- Search + filter -->
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-primary">search</span>
<input id="assign-search" class="w-full pl-10 pr-4 py-3 border border-primary/20 rounded-xl bg-surface-container-lowest font-body-md text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none" placeholder="Search Request ID or Address..." type="text"/>
</div>
<div class="flex gap-3">
<select id="assign-status" class="flex-1 py-3 pl-3 pr-8 bg-primary-fixed rounded-xl font-body-md text-body-md appearance-none cursor-pointer text-primary">
<option value="">Status: All</option>
<option value="Scheduled">Pending</option>
<option value="In Transit">In Progress</option>
</select>
</div>

<!-- List -->
<div id="assign-list" class="flex flex-col gap-3"></div>

<!-- Pagination -->
<div id="assign-pagination" class="flex items-center justify-center gap-1 pt-1"></div>
<p id="assign-count" class="text-center font-label-sm text-label-sm text-on-surface-variant">Showing 0 entries</p>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  var UI = window.EcoWasteUI;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var uid = D.currentUserId();
  var allRequests = [];
  var searchTerm = "";
  var statusFilter = "";
  var page = 1;
  var PAGE_SIZE = 6;

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

  function card(r) {
    var chip = CHIP[r.status] || "bg-surface-container-high text-on-surface-variant";
    var label = CHIP_LABEL[r.status] || r.status;
    var wt = UI.wasteType(r.waste_type);
    var a = document.createElement("a");
    a.href = "#";
    a.className = "bg-surface-container-lowest border border-border-subtle rounded-xl p-4 flex items-start gap-3 transition-colors hover:bg-surface-container-low border-l-4 border-l-" + (r.status === "Scheduled" ? "status-pending" : "status-progress") + "";
    a.setAttribute("data-view", "collection_details");
    a.setAttribute("data-request-id", r.id);
    a.innerHTML =
      '<div class="flex-1 min-w-0">' +
        '<div class="flex items-center gap-2 flex-wrap">' +
          '<span class="font-label-md text-label-md text-primary">' + D.esc(r.request_number) + "</span>" +
          '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold ' + chip + '">' + label + "</span>" +
        "</div>" +
        '<div class="mt-2 inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold ' + wt.chip + '">' +
          '<span class="material-symbols-outlined text-[13px]">' + wt.icon + "</span>" + D.esc(r.waste_type || "General") +
        "</div>" +
        '<p class="font-body-sm text-body-sm text-on-surface-variant mt-2">' + D.esc(r.location || "") + (r.zone ? "<br/>" + D.esc(r.zone) : "") + "</p>" +
        '<p class="font-label-sm text-label-sm text-on-surface-variant mt-1.5">' + D.fmtDate(r.requested_at) + "</p>" +
      "</div>" +
      '<span class="material-symbols-outlined text-on-surface-variant mt-1">chevron_right</span>';
    return a;
  }

  function filtered() {
    return UI.filterList(allRequests, searchTerm, ["request_number", "location", "waste_type"], {
      status: statusFilter || null
    });
  }

  function render() {
    var rows = filtered();
    var list = document.getElementById("assign-list");
    list.innerHTML = "";
    var pg = UI.paginate(rows, page, PAGE_SIZE);
    if (!pg.rows.length) {
      list.innerHTML = '<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-6 text-center"><p class="font-body-md text-body-md text-on-surface-variant">No collections match your filters.</p></div>';
    } else {
      pg.rows.forEach(function (r) { list.appendChild(card(r)); });
    }
    var count = document.getElementById("assign-count");
    if (count) count.textContent = "Showing " + (rows.length ? pg.start + " to " + pg.end + " of " : "0 of ") + rows.length + " entries";
    var nav = document.getElementById("assign-pagination");
    if (nav) UI.paginateButtons(nav, { page: pg.page, pages: pg.pages, onPage: function (p) { page = p; render(); } });
  }

  async function load() {
    allRequests = await D.list("collection_requests", "id,request_number,location,zone,waste_type,status,requested_at,completed_at", "requested_at.asc", "collector_id=eq." + uid + "&status=neq.Completed");
    render();
  }

  document.getElementById("assign-search").addEventListener("input", function (e) {
    searchTerm = e.target.value;
    page = 1;
    render();
  });
  document.getElementById("assign-status").addEventListener("change", function (e) {
    statusFilter = e.target.value;
    page = 1;
    render();
  });

  load().catch(function (err) {
    console.error("EcoWaste assigned collections failed to load:", err);
  });
})();
</script>