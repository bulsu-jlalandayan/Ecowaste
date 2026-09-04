<!-- My Requests content fragment (loaded by resident.html via content.php) -->
<div class="p-margin max-w-7xl mx-auto flex flex-col gap-lg">
<!-- Header Section -->
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-md">
<div>
<h2 class="font-headline-lg text-headline-lg text-on-surface">My Requests</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-xs">Track and manage your waste collection requests.</p>
</div>
<div class="flex items-center gap-md w-full sm:w-auto">
<!-- Search Bar -->
<div class="relative flex-1 sm:flex-none">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-on-surface-variant">
<span class="material-symbols-outlined text-[20px]">search</span>
</div>
<input class="pl-10 pr-4 py-2 border border-outline-variant rounded-lg focus:ring-1 focus:ring-primary focus:border-primary text-body-sm text-body-sm shadow-sm bg-surface-container-lowest text-on-surface placeholder:text-outline w-full sm:w-64" id="req-search" placeholder="Search Request ID..." type="text"/>
</div>
<!-- New Request Button -->
<button class="inline-flex items-center gap-2 px-4 py-2 bg-primary text-on-primary rounded-lg font-body-md text-body-md font-semibold hover:bg-primary-container focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary shadow-sm transition-colors" type="button" data-view="requestcollection">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">add</span>
            New Request
          </button>
</div>
</div>
<!-- Filter Tabs -->
<div class="flex gap-2 flex-wrap" id="req-filters">
<button class="px-4 py-1.5 rounded-full border border-primary bg-primary-container/10 text-primary font-body-md text-body-md font-medium flex items-center justify-center min-w-[4rem] transition-colors" data-filter="All">
          All
        </button>
<button class="px-4 py-1.5 rounded-full border border-outline-variant text-on-surface-variant hover:bg-surface-container font-body-md text-body-md transition-colors" data-filter="Unassigned">
          Pending
        </button>
<button class="px-4 py-1.5 rounded-full border border-outline-variant text-on-surface-variant hover:bg-surface-container font-body-md text-body-md transition-colors" data-filter="Scheduled">
          Scheduled
        </button>
<button class="px-4 py-1.5 rounded-full border border-outline-variant text-on-surface-variant hover:bg-surface-container font-body-md text-body-md transition-colors" data-filter="In Transit">
          In Transit
        </button>
<button class="px-4 py-1.5 rounded-full border border-outline-variant text-on-surface-variant hover:bg-surface-container font-body-md text-body-md transition-colors" data-filter="Completed">
          Completed
        </button>
</div>
<!-- Requests Table -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden shadow-sm">
<table class="min-w-full divide-y divide-outline-variant text-left">
<thead class="bg-surface-container-low">
<tr>
<th class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider w-1/5" scope="col">Request ID</th>
<th class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider w-1/4" scope="col">Waste Type</th>
<th class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider w-1/5" scope="col">Date Requested</th>
<th class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider w-1/5" scope="col">Status</th>
<th class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider text-right w-32" scope="col">Action</th>
</tr>
</thead>
<tbody class="bg-surface-container-lowest divide-y divide-outline-variant" id="req-table-body">
<tr><td class="px-6 py-8 text-center font-body-md text-body-md text-on-surface-variant" colspan="5">Loading your requests…</td></tr>
</tbody>
</table>
<div class="bg-surface-container-low border-t border-outline-variant px-6 py-4 text-right font-body-sm text-body-sm text-on-surface-variant" id="req-count"></div>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  var UI = window.EcoWasteUI;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var uid = D.currentUserId();
  var all = [];
  var activeFilter = "All";

  var STATUS_META = {
    Unassigned: { cls: "bg-error-container text-on-error-container", dot: "bg-error", label: "Pending" },
    Scheduled: { cls: "bg-secondary-container text-on-secondary-container", dot: "bg-secondary", label: "Scheduled" },
    "In Transit": { cls: "bg-tertiary-container/10 text-tertiary-container", dot: "bg-tertiary-container", label: "In Transit" },
    Completed: { cls: "bg-primary-container/10 text-primary", dot: "bg-primary", label: "Completed" }
  };
  var WASTE_META = {
    Household: { icon: "delete", cls: "text-primary" },
    Recyclable: { icon: "recycling", cls: "text-primary" },
    Organic: { icon: "eco", cls: "text-primary" },
    Bulky: { icon: "inventory_2", cls: "text-primary" },
    "E-Waste": { icon: "warning", cls: "text-error" },
    Hazardous: { icon: "warning", cls: "text-error" },
    General: { icon: "delete", cls: "text-primary" }
  };

  var tbody = document.getElementById("req-table-body");

  function statusBadge(status) {
    var m = STATUS_META[status] || { cls: "bg-surface-container-high text-on-surface-variant", dot: "bg-on-surface-variant", label: status };
    return '<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full font-label-caps text-label-caps ' + m.cls + '">' +
      '<span class="w-1.5 h-1.5 rounded-full ' + m.dot + '"></span> ' + m.label + "</span>";
  }

  function render() {
    var q = (document.getElementById("req-search") || {}).value || "";
    q = q.trim().toLowerCase();
    var rows = all.filter(function (r) {
      if (activeFilter !== "All" && r.status !== activeFilter) return false;
      if (q && !String(r.request_number || "").toLowerCase().includes(q)) return false;
      return true;
    });
    tbody.innerHTML = "";
    if (!rows.length) {
      tbody.innerHTML = '<tr><td class="px-6 py-8 text-center font-body-md text-body-md text-on-surface-variant" colspan="5">No requests found.</td></tr>';
    } else {
      rows.forEach(function (r) {
        var wts = (r.waste_types && r.waste_types.length) ? r.waste_types : [r.waste_type || "General"];
        var primary = wts[0];
        var wm = WASTE_META[primary] || { icon: "delete", cls: "text-primary" };
        var tr = document.createElement("tr");
        tr.className = "hover:bg-surface-container-low transition-colors";
        tr.innerHTML =
          '<td class="px-6 py-4 whitespace-nowrap font-body-md text-body-md font-semibold text-on-surface">' + D.esc(r.request_number) + "</td>" +
          '<td class="px-6 py-4 whitespace-nowrap"><div class="flex items-center gap-2">' +
          '<span class="material-symbols-outlined text-[20px] ' + wm.cls + '" style="font-variation-settings: \'FILL\' 1;">' + wm.icon + "</span>" +
          '<span class="font-body-md text-body-md text-on-surface">' + D.esc(wts.join(", ")) + "</span></div></td>" +
          '<td class="px-6 py-4 whitespace-nowrap font-body-md text-body-md text-on-surface-variant">' + D.esc(D.fmtDate(r.requested_at)) + "</td>" +
          '<td class="px-6 py-4 whitespace-nowrap">' + statusBadge(r.status) + "</td>" +
          '<td class="px-6 py-4 whitespace-nowrap text-right font-body-md text-body-md">' +
          '<a class="text-primary hover:text-primary-container transition-colors font-semibold" href="#" data-view="requestdetails" data-request-id="' + D.esc(r.id) + '">View Details</a></td>';
        tbody.appendChild(tr);
      });
    }
    var c = document.getElementById("req-count");
    if (c) c.textContent = "Showing " + rows.length + " of " + all.length + " request" + (all.length === 1 ? "" : "s");
  }

  function applyFilter(btn) {
    activeFilter = btn.getAttribute("data-filter");
    document.querySelectorAll("#req-filters button").forEach(function (b) {
      var on = b.getAttribute("data-filter") === activeFilter;
      b.className = "px-4 py-1.5 rounded-full border font-body-md text-body-md transition-colors " +
        (on ? "border-primary bg-primary-container/10 text-primary font-medium" : "border-outline-variant text-on-surface-variant hover:bg-surface-container");
    });
    render();
  }

  async function load() {
    all = await D.list(
      "collection_requests",
      "id,request_number,waste_type,status,requested_at,scheduled_date",
      "requested_at.desc",
      "user_id=eq." + uid
    ).catch(function () { return []; });
    var ids = all.map(function (r) { return r.id; });
    if (ids.length) {
      var items = await D.request(
        "/rest/v1/collection_request_items?select=request_id,waste_type&request_id=in.(" + ids.join(",") + ")"
      ).catch(function () { return []; });
      all.forEach(function (r) {
        r.waste_types = items
          .filter(function (i) { return i.request_id === r.id; })
          .map(function (i) { return i.waste_type; });
        if (!r.waste_types.length && r.waste_type) r.waste_types = [r.waste_type];
      });
    }
    render();
  }

  var search = document.getElementById("req-search");
  if (search) search.addEventListener("input", render);
  document.querySelectorAll("#req-filters button").forEach(function (b) {
    b.addEventListener("click", function () { applyFilter(b); });
  });

  load().catch(function (err) {
    console.error("EcoWaste request list failed to load:", err);
  });
})();
</script>
