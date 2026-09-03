<!-- Assigned Collections view - loaded via collector_content.php -->
<!-- Page Header -->
<div class="mb-stack-lg">
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-2">Assigned Collections</h2>
<p class="font-body-md text-body-md text-on-surface-variant">View and manage waste collection requests assigned to you.</p>
</div>
<!-- Toolbar (Filters & Search) -->
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle p-4 mb-stack-lg grid grid-cols-1 sm:grid-cols-2 gap-4 items-end shadow-sm">
<div class="relative sm:col-span-2">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input id="assign-search" class="w-full pl-10 pr-4 py-2 h-11 bg-surface border border-border-subtle rounded-lg focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors font-body-sm text-body-sm" placeholder="Search Request ID or Address..." type="text"/>
</div>
<div class="sm:col-span-2 grid grid-cols-1 sm:grid-cols-3 gap-3">
<select id="assign-status" class="w-full py-2.5 pl-3 pr-8 bg-surface border border-border-subtle rounded-lg focus:border-primary outline-none font-body-sm text-body-sm cursor-pointer">
<option value="">Status: All</option>
<option value="Scheduled">Pending</option>
<option value="In Transit">In Progress</option>
</select>
<select id="assign-waste" class="w-full py-2.5 pl-3 pr-8 bg-surface border border-border-subtle rounded-lg focus:border-primary outline-none font-body-sm text-body-sm cursor-pointer">
<option value="">Waste Type: All</option>
<option value="General">General</option>
<option value="Recyclable">Recyclable</option>
<option value="Hazardous">Hazardous</option>
<option value="Organic">Organic</option>
</select>
</div>
</div>
<!-- Data Table Card -->
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle shadow-sm overflow-hidden">
<div class="overflow-x-auto table-scroll">
<table class="w-full min-w-[720px] text-left border-collapse">
<thead class="sticky top-0 z-10">
<tr class="bg-surface-container-low border-b border-border-subtle">
<th class="sticky left-0 bg-surface-container-low py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant">Request ID</th>
<th class="py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant">Waste Type</th>
<th class="py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant">Quantity</th>
<th class="py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant">Address</th>
<th class="py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant">Schedule</th>
<th class="py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant">Status</th>
<th class="py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant text-right">Action</th>
</tr>
</thead>
<tbody id="assign-table-body" class="divide-y divide-border-subtle">
</tbody>
</table>
</div>
<div id="assign-pagination" class="bg-surface p-4 border-t border-border-subtle flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 text-sm text-on-surface-variant">
<span id="assign-count">Showing 0 entries</span>
<div id="assign-pagination-btns" class="flex gap-2"></div>
</div>
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
  var wasteFilter = "";
  var page = 1;
  var PAGE_SIZE = 10;

  var CHIP = {
    Scheduled: "bg-amber-100 text-status-pending",
    "In Transit": "bg-blue-100 text-status-progress"
  };
  var CHIP_LABEL = {
    Scheduled: "Pending",
    "In Transit": "In Progress"
  };

  function buildRow(r) {
    var chip = CHIP[r.status] || "bg-surface-container-high text-on-surface-variant";
    var label = CHIP_LABEL[r.status] || r.status;
    var wt = UI.wasteType(r.waste_type);
    var tr = document.createElement("tr");
    tr.className = "hover:bg-surface transition-colors";
    tr.innerHTML =
      '<td class="sticky left-0 bg-surface-container-lowest py-4 px-3 sm:px-4"><span class="font-label-md text-label-md text-primary">' + D.esc(r.request_number) + '</span></td>' +
      '<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm"><div class="flex items-center gap-2"><span class="material-symbols-outlined text-outline text-sm">' + wt.icon + '</span> ' + D.esc(r.waste_type || "General") + '</div></td>' +
      '<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm text-on-surface-variant">' + D.esc(r.zone || "—") + '</td>' +
      '<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm">' + D.esc(r.location || "—") + '</td>' +
      '<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm">' + D.fmtDate(r.requested_at) + '</td>' +
      '<td class="py-4 px-3 sm:px-4"><span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold ' + chip + '">' + label + '</span></td>' +
      '<td class="py-4 px-3 sm:px-4 text-right"><button data-view="collection_details" data-request-id="' + r.id + '" class="font-label-md text-label-md text-primary hover:text-secondary bg-primary-fixed bg-opacity-20 hover:bg-opacity-40 px-3 py-1.5 rounded-lg transition-colors whitespace-nowrap">View Details</button></td>';
    return tr;
  }

  function filtered() {
    return UI.filterList(allRequests, searchTerm, ["request_number", "location", "waste_type"], {
      status: statusFilter || null,
      waste_type: wasteFilter || null
    });
  }

  function render() {
    var rows = filtered();
    var tbody = document.getElementById("assign-table-body");
    tbody.innerHTML = "";
    var pg = UI.paginate(rows, page, PAGE_SIZE);
    if (!pg.rows.length) {
      var tr = document.createElement("tr");
      tr.innerHTML = '<td colspan="7" class="py-12 text-center font-body-sm text-body-sm text-on-surface-variant">No collections match your filters.</td>';
      tbody.appendChild(tr);
    } else {
      pg.rows.forEach(function (r) { tbody.appendChild(buildRow(r)); });
    }
    var count = document.getElementById("assign-count");
    if (count) count.textContent = "Showing " + (rows.length ? pg.start + " to " + pg.end + " of " : "0 of ") + rows.length + " entries";
    var navBtns = document.getElementById("assign-pagination-btns");
    if (navBtns) UI.paginateButtons(navBtns, { page: pg.page, pages: pg.pages, onPage: function (p) { page = p; render(); } });
    if (window.EcoWasteRouter) {
      document.querySelectorAll("#app [data-view]").forEach(function (el) {
        if (el.dataset.bound) return;
        el.addEventListener("click", function (e) {
          var view = el.getAttribute("data-view");
          if (view) {
            e.preventDefault();
            if (el.hasAttribute("data-request-id")) {
              window.EcoWasteAppState.selectedRequestId = el.getAttribute("data-request-id");
            }
            window.EcoWasteRouter.go(view);
          }
        });
        el.dataset.bound = "1";
      });
    }
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
  document.getElementById("assign-waste").addEventListener("change", function (e) {
    wasteFilter = e.target.value;
    page = 1;
    render();
  });

  load().catch(function (err) {
    console.error("EcoWaste assigned collections failed to load:", err);
  });
})();
</script>
