<!-- Mobile Activity History view -->
<div class="p-4 flex flex-col gap-4">
<div>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface">Activity History</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Review your requests, reports, and contributions.</p>
</div>

<!-- Search -->
<div class="relative">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-on-surface-variant">
<span class="material-symbols-outlined text-[20px]">search</span>
</div>
<input class="pl-10 pr-4 py-3 border border-outline-variant rounded-xl focus:ring-1 focus:ring-primary focus:border-primary text-body-sm text-body-sm shadow-sm bg-surface-container-lowest text-on-surface placeholder:text-outline w-full" id="act-search" placeholder="Search by ID or keyword..." type="text"/>
</div>

<!-- Filters -->
<div class="flex gap-2 overflow-x-auto pb-1" id="act-filters">
<button class="whitespace-nowrap px-4 py-2 rounded-full bg-primary text-on-primary font-label-md text-label-md shadow-sm transition-colors" data-actfilter="All">All</button>
<button class="whitespace-nowrap px-4 py-2 rounded-full border border-outline-variant text-on-surface-variant font-label-md text-label-md hover:bg-surface-container-low transition-colors" data-actfilter="request_submitted">Requests</button>
<button class="whitespace-nowrap px-4 py-2 rounded-full border border-outline-variant text-on-surface-variant font-label-md text-label-md hover:bg-surface-container-low transition-colors" data-actfilter="report_submitted">Reports</button>
<button class="whitespace-nowrap px-4 py-2 rounded-full border border-outline-variant text-on-surface-variant font-label-md text-label-md hover:bg-surface-container-low transition-colors" data-actfilter="collection_completed">Collections</button>
</div>

<!-- List -->
<div id="act-list" class="flex flex-col gap-2"></div>

<!-- Pagination -->
<div class="flex items-center justify-between mt-1">
<span class="font-body-sm text-body-sm text-on-surface-variant" id="act-count">Loading…</span>
<div class="flex items-center gap-2">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant disabled:opacity-50" id="act-prev" type="button"><span class="material-symbols-outlined">chevron_left</span></button>
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant" id="act-next" type="button"><span class="material-symbols-outlined">chevron_right</span></button>
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
  var perPage = 6;
  var activeFilter = "All";

  var ACTION_META = {
    request_submitted: { icon: "add_task", title: "Collection Request Submitted", status: "Pending", cls: "bg-secondary-container text-on-secondary-container" },
    report_submitted: { icon: "report_problem", title: "Waste Report Submitted", status: "Submitted", cls: "bg-amber-100 text-amber-800" },
    collection_completed: { icon: "local_shipping", title: "Collection Completed", status: "Completed", cls: "bg-tertiary-container/15 text-tertiary-container" }
  };

  var listEl = document.getElementById("act-list");

  function applyFilterState() {
    filtered = all.filter(function (r) {
      if (activeFilter !== "All" && r.action !== activeFilter) return false;
      var qEl = document.getElementById("act-search");
      var q = (qEl ? qEl.value : "") || "";
      q = q.trim().toLowerCase();
      if (!q) return true;
      return (r.reference_id || "").toLowerCase().includes(q) || (r.description || "").toLowerCase().includes(q);
    });
    page = 0;
  }

  function card(r) {
    var m = ACTION_META[r.action] || { icon: "event", title: r.action, status: "—", cls: "bg-surface-container-high text-on-surface-variant" };
    var d = r.created_at ? new Date(r.created_at) : null;
    var div = document.createElement("div");
    div.className = "flex items-start gap-3 p-4 bg-surface-container-lowest border border-border-subtle rounded-xl transition-colors";
    div.innerHTML =
      '<span class="material-symbols-outlined w-10 h-10 rounded-full flex items-center justify-center shrink-0 ' + m.cls + '">' + m.icon + "</span>" +
      '<div class="flex-1 min-w-0">' +
      '<div class="flex items-center justify-between gap-2">' +
      '<p class="font-body-md text-body-md text-on-surface font-semibold">' + D.esc(m.title) + "</p>" +
      '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold shrink-0 ' + m.cls + '">' + m.status + "</span></div>" +
      '<p class="font-data-mono text-data-mono text-primary font-medium mt-1">' + D.esc(r.reference_id || "—") + "</p>" +
      '<p class="font-label-sm text-label-sm text-on-surface-variant mt-0.5">' +
        (d ? d.toLocaleDateString() : "—") + (d ? " · " + d.toLocaleTimeString([], { hour: "numeric", minute: "2-digit" }) : "") +
      "</p>" +
      (r.description ? '<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">' + D.esc(r.description) + "</p>" : "") +
      "</div>";
    return div;
  }

  function empty(msg) {
    listEl.innerHTML = '<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-6 text-center">' +
      '<span class="material-symbols-outlined text-[36px] text-on-surface-variant">history</span>' +
      '<p class="font-body-md text-body-md text-on-surface-variant mt-2">' + D.esc(msg) + "</p></div>";
  }

  function render() {
    applyFilterState();
    var start = page * perPage;
    var rows = filtered.slice(start, start + perPage);
    listEl.innerHTML = "";
    if (!rows.length) empty(all.length ? "No activity matches your search." : "No activity yet.");
    else rows.forEach(function (r) { listEl.appendChild(card(r)); });
    var c = document.getElementById("act-count");
    if (c) c.textContent = filtered.length ? "Showing " + (start + 1) + "-" + (start + rows.length) + " of " + filtered.length : "";
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
        b.className = "whitespace-nowrap px-4 py-2 rounded-full font-label-md text-label-md transition-all " +
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
