
<!-- Activity History content fragment (loaded by resident.html via content.php) -->
<div class="p-margin max-w-7xl mx-auto flex flex-col gap-lg pb-24">
<!-- Header Section -->
<header>
<h1 class="font-headline-lg text-headline-lg text-primary mb-xs">Activity History</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
                Review your past service requests, reports, and community interactions. Track the progress and history of your environmental contributions.
            </p>
</header>
<!-- Controls: Search & Filter -->
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-md">
<!-- Search -->
<div class="relative w-full sm:w-96">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-surface-container-lowest border border-outline-variant rounded-full text-body-md font-body-md focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition-all placeholder:text-outline text-on-surface" id="act-search" placeholder="Search by ID or keyword..." type="text"/>
</div>
<!-- Filters -->
<div class="flex gap-sm overflow-x-auto pb-2 w-full sm:w-auto hide-scrollbar" id="act-filters">
<button class="whitespace-nowrap px-md py-sm rounded-full bg-primary text-on-primary font-label-caps text-label-caps shadow-sm transition-all" data-actfilter="All">All</button>
<button class="whitespace-nowrap px-md py-sm rounded-full border border-outline-variant text-on-surface-variant font-label-caps text-label-caps hover:bg-surface-container-low transition-colors" data-actfilter="request_submitted">Requests</button>
<button class="whitespace-nowrap px-md py-sm rounded-full border border-outline-variant text-on-surface-variant font-label-caps text-label-caps hover:bg-surface-container-low transition-colors" data-actfilter="report_submitted">Reports</button>
<button class="whitespace-nowrap px-md py-sm rounded-full border border-outline-variant text-on-surface-variant font-label-caps text-label-caps hover:bg-surface-container-low transition-colors" data-actfilter="collection_completed">Collections</button>
</div>
</div>
<!-- Data List / Table -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden shadow-[0_4px_16px_rgba(15,23,42,0.05)] transition-shadow">
<div class="table-scroll overflow-x-auto w-full">
<table class="w-full text-left border-collapse min-w-[800px]">
<thead>
<tr class="bg-surface-container-low border-b border-outline-variant text-label-caps font-label-caps text-on-surface-variant">
<th class="py-3 px-4 font-medium">Date / Time</th>
<th class="py-3 px-4 font-medium">Reference ID</th>
<th class="py-3 px-4 font-medium">Activity Type</th>
<th class="py-3 px-4 font-medium">Status</th>
<th class="py-3 px-4 font-medium text-right">Action</th>
</tr>
</thead>
<tbody class="text-body-sm font-body-sm text-on-surface divide-y divide-outline-variant" id="act-body">
<tr><td class="py-8 px-4 text-center text-on-surface-variant" colspan="5">Loading activity…</td></tr>
</tbody>
</table>
</div>
<!-- Pagination / Footer -->
<div class="bg-surface-container-low border-t border-outline-variant p-4 flex items-center justify-between">
<span class="text-body-sm font-body-sm text-on-surface-variant" id="act-count">Loading…</span>
<div class="flex items-center gap-2">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant disabled:opacity-50" id="act-prev" type="button">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant" id="act-next" type="button">
<span class="material-symbols-outlined">chevron_right</span>
</button>
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
  var all = [];
  var filtered = [];
  var page = 0;
  var perPage = 5;
  var activeFilter = "All";

  var ACTION_META = {
    request_submitted: { icon: "add_task", title: "Collection Request Submitted", status: "Pending", cls: "bg-secondary-container text-on-secondary-container", dot: "bg-on-secondary-container" },
    report_submitted: { icon: "report_problem", title: "Waste Report Submitted", status: "Submitted", cls: "bg-amber-100 text-amber-800", dot: "bg-amber-600" },
    collection_completed: { icon: "local_shipping", title: "Collection Completed", status: "Completed", cls: "bg-tertiary-container/10 text-tertiary-container", dot: "bg-tertiary-container" }
  };

  var body = document.getElementById("act-body");

  function applyFilterState() {
    filtered = all.filter(function (r) {
      if (activeFilter !== "All" && r.action !== activeFilter) return false;
      var q = (document.getElementById("act-search") || {}).value || "";
      q = q.trim().toLowerCase();
      if (!q) return true;
      return (r.reference_id || "").toLowerCase().includes(q) || (r.description || "").toLowerCase().includes(q);
    });
    page = 0;
  }

  function render() {
    applyFilterState();
    var start = page * perPage;
    var rows = filtered.slice(start, start + perPage);
    body.innerHTML = "";
    if (!rows.length) {
      body.innerHTML = '<tr><td class="py-8 px-4 text-center text-on-surface-variant" colspan="5">No activity found.</td></tr>';
    } else {
      rows.forEach(function (r) {
        var m = ACTION_META[r.action] || { icon: "event", title: r.action, status: "—", cls: "bg-surface-container-high text-on-surface-variant", dot: "bg-on-surface-variant" };
        var tbody = document.createElement("tr");
        tbody.className = "hover:bg-surface-container-low transition-colors group";
        var d = r.created_at ? new Date(r.created_at) : null;
        tbody.innerHTML =
          '<td class="py-4 px-4 whitespace-nowrap"><div class="font-data-mono text-data-mono">' + (d ? d.toLocaleDateString() : "—") + "</div>" +
          '<div class="text-on-surface-variant text-xs mt-1">' + (d ? d.toLocaleTimeString([], { hour: "numeric", minute: "2-digit" }) : "") + "</div></td>" +
          '<td class="py-4 px-4 font-data-mono text-data-mono text-primary font-medium">' + D.esc(r.reference_id || "—") + "</td>" +
          '<td class="py-4 px-4"><div class="flex items-center gap-2">' +
          '<span class="material-symbols-outlined text-secondary text-sm">' + m.icon + "</span> " + m.title + "</div></td>" +
          '<td class="py-4 px-4"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium ' + m.cls + '">' +
          '<span class="w-1.5 h-1.5 rounded-full ' + m.dot + '"></span> ' + m.status + "</span></td>" +
          '<td class="py-4 px-4 text-right"><button class="text-primary hover:text-primary-container font-medium transition-colors text-sm hover:underline">View Details</button></td>';
        body.appendChild(tbody);
      });
    }
    var c = document.getElementById("act-count");
    if (c) c.textContent = "Showing " + (filtered.length ? start + 1 : 0) + "-" + (start + rows.length) + " of " + filtered.length + " records";
    document.getElementById("act-prev").disabled = page === 0;
    document.getElementById("act-next").disabled = start + perPage >= filtered.length;
  }

  async function load() {
    all = await D.list(
      "resident_activity_history",
      "id,resident_id,action,description,reference_id,request_id,report_id,created_at",
      "created_at.desc",
      "resident_id=eq." + uid
    ).catch(function () { return []; });
    render();
  }

  document.getElementById("act-search").addEventListener("input", render);
  document.querySelectorAll("#act-filters button").forEach(function (btn) {
    btn.addEventListener("click", function () {
      activeFilter = btn.getAttribute("data-actfilter");
      document.querySelectorAll("#act-filters button").forEach(function (b) {
        var on = b === btn;
        b.className = "whitespace-nowrap px-md py-sm rounded-full font-label-caps text-label-caps transition-all " +
          (on ? "bg-primary text-on-primary shadow-sm" : "border border-outline-variant text-on-surface-variant hover:bg-surface-container-low");
      });
      render();
    });
  });
  document.getElementById("act-prev").addEventListener("click", function () {
    if (page > 0) { page--; render(); }
  });
  document.getElementById("act-next").addEventListener("click", function () {
    if ((page + 1) * perPage < filtered.length) { page++; render(); }
  });

  load().catch(function (err) {
    console.error("EcoWaste activity history failed to load:", err);
  });
})();
</script>

