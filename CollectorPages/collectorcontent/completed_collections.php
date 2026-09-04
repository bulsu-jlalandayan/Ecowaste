<!-- Completed Collections view - loaded via collector_content.php -->
<div class="mb-stack-lg">
<h2 class="font-headline-lg text-headline-lg md:font-headline-lg md:text-headline-lg text-on-background mb-1">Completed Collections</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant">View your completed collection history.</p>
</div>
<!-- Filters -->
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle p-4 mb-stack-md grid grid-cols-1 sm:grid-cols-2 lg:flex lg:flex-wrap gap-4 items-end">
<div class="sm:col-span-2 lg:flex-1 lg:min-w-[220px]">
<label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Search Requests</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input id="complete-search" class="w-full pl-10 pr-4 py-2 h-12 border border-border-subtle rounded-lg focus:border-primary focus:ring-1 focus:ring-primary outline-none font-body-sm text-body-sm bg-surface-container-lowest" placeholder="Search by ID or Location" type="text"/>
</div>
</div>
<div class="sm:col-span-1 lg:w-auto">
<label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Date Range</label>
<input id="complete-date" class="w-full px-4 py-2 h-12 border border-border-subtle rounded-lg focus:border-primary focus:ring-1 focus:ring-primary outline-none font-body-sm text-body-sm bg-surface-container-lowest text-on-surface" type="date"/>
</div>
<div class="sm:col-span-1 lg:w-auto">
<label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Waste Type</label>
<select id="complete-waste" class="w-full px-4 py-2 h-12 border border-border-subtle rounded-lg focus:border-primary focus:ring-1 focus:ring-primary outline-none font-body-sm text-body-sm bg-surface-container-lowest text-on-surface appearance-none">
<option value="">All Types</option>
<option value="Recyclable">Recyclables</option>
<option value="General">General Waste</option>
<option value="Organic">Organic</option>
<option value="Hazardous">Hazardous</option>
</select>
</div>
<button id="complete-filter-btn" class="sm:col-span-2 lg:col-span-1 h-12 px-6 bg-primary-container text-on-primary rounded-lg font-label-md text-label-md hover:bg-primary transition-colors flex items-center justify-center gap-2">
<span class="material-symbols-outlined">filter_list</span>
                Apply Filters
            </button>
</div>
<!-- Data Table -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
<div class="overflow-x-auto table-scroll">
<table class="w-full min-w-[820px] text-left border-collapse">
<thead class="sticky top-0 z-10">
<tr class="bg-surface-container-low border-b border-border-subtle">
<th class="sticky left-0 bg-surface-container-low py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Request ID</th>
<th class="py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Waste Type</th>
<th class="py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Location</th>
<th class="py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Collection Date</th>
<th class="py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Completed Date</th>
<th class="py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap text-right">Action</th>
</tr>
</thead>
<tbody id="complete-table-body" class="font-body-sm text-body-sm text-on-surface divide-y divide-border-subtle">
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="px-4 py-3 border-t border-border-subtle bg-surface-container-lowest flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
<span id="complete-count" class="font-body-sm text-body-sm text-on-surface-variant whitespace-nowrap">Showing 0 entries</span>
<div id="complete-pagination-btns" class="flex items-center gap-2"></div>
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
  var wasteFilter = "";
  var dateFilter = "";
  var page = 1;
  var PAGE_SIZE = 10;

  var WASTE_CHIP = {
    Recyclable: { cls: "bg-secondary-fixed text-on-secondary-fixed-variant", dot: "bg-primary-container" },
    General: { cls: "bg-surface-container-high text-on-surface", dot: "bg-outline" },
    Organic: { cls: "bg-amber-50 text-amber-700", dot: "bg-amber-400" },
    Hazardous: { cls: "bg-tertiary-fixed text-on-tertiary-fixed-variant", dot: "bg-tertiary-container" }
  };

  function dateOf(iso) {
    if (!iso) return "";
    var d = new Date(iso);
    return d.getFullYear() + "-" + String(d.getMonth() + 1).padStart(2, "0") + "-" + String(d.getDate()).padStart(2, "0");
  }

  function buildRow(r) {
    var wc = WASTE_CHIP[r.waste_type] || WASTE_CHIP.General;
    var tr = document.createElement("tr");
    tr.className = "hover:bg-surface-bright transition-colors group";
    tr.innerHTML =
      '<td class="sticky left-0 bg-surface-container-lowest py-4 px-3 sm:px-4 font-medium">' + D.esc(r.request_number) + '</td>' +
      '<td class="py-4 px-3 sm:px-4"><span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full ' + wc.cls + ' font-label-sm text-label-sm whitespace-nowrap"><span class="w-2 h-2 rounded-full ' + wc.dot + '"></span> ' + D.esc(r.waste_type || "General") + '</span></td>' +
      '<td class="py-4 px-3 sm:px-4 whitespace-nowrap">' + D.esc(r.location || "—") + '</td>' +
      '<td class="py-4 px-3 sm:px-4 whitespace-nowrap">' + (r.scheduled_date ? D.fmtDay(r.scheduled_date) : D.fmtDate(r.requested_at)) + '</td>' +
      '<td class="py-4 px-3 sm:px-4 text-on-surface-variant whitespace-nowrap">' + D.fmtDate(r.completed_at) + '</td>' +
      '<td class="py-4 px-3 sm:px-4 text-right"><button data-view="collection_details" data-request-id="' + r.id + '" class="text-primary font-label-md text-label-md hover:underline whitespace-nowrap">View Details</button></td>';
    return tr;
  }

  function filtered() {
    return allRequests.filter(function (r) {
      var ok = true;
      if (wasteFilter && (r.waste_type || "").toLowerCase() !== wasteFilter.toLowerCase()) ok = false;
      if (dateFilter && dateOf(r.completed_at || r.requested_at) !== dateFilter) ok = false;
      if (ok && searchTerm) {
        var hay = ((r.request_number || "") + " " + (r.location || "")).toLowerCase();
        ok = hay.indexOf(searchTerm.toLowerCase()) !== -1;
      }
      return ok;
    });
  }

  function render() {
    var rows = filtered();
    var tbody = document.getElementById("complete-table-body");
    tbody.innerHTML = "";
    var pg = UI.paginate(rows, page, PAGE_SIZE);
    if (!pg.rows.length) {
      var tr = document.createElement("tr");
      tr.innerHTML = '<td colspan="6" class="py-12 text-center font-body-sm text-body-sm text-on-surface-variant">No completed collections found.</td>';
      tbody.appendChild(tr);
    } else {
      pg.rows.forEach(function (r) { tbody.appendChild(buildRow(r)); });
    }
    var count = document.getElementById("complete-count");
    if (count) count.textContent = "Showing " + (rows.length ? pg.start + " to " + pg.end + " of " : "0 of ") + rows.length + " entries";
    var navBtns = document.getElementById("complete-pagination-btns");
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
    allRequests = await D.list("collection_requests", "id,request_number,location,waste_type,status,requested_at,completed_at,scheduled_date,time_start,time_end", "requested_at.desc", "collector_id=eq." + uid + "&status=eq.Completed");
    render();
  }

  document.getElementById("complete-search").addEventListener("input", function (e) { searchTerm = e.target.value; page = 1; render(); });
  document.getElementById("complete-waste").addEventListener("change", function (e) { wasteFilter = e.target.value; page = 1; render(); });
  document.getElementById("complete-date").addEventListener("change", function (e) { dateFilter = e.target.value; page = 1; render(); });
  document.getElementById("complete-filter-btn").addEventListener("click", function () { render(); });

  load().catch(function (err) { console.error("EcoWaste completed collections failed to load:", err); });
})();
</script>
