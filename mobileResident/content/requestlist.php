<!-- Mobile My Requests view -->
<div class="p-4 flex flex-col gap-4">
<div class="flex items-center justify-between gap-3">
<div>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface">My Requests</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Track your waste collection requests.</p>
</div>
<button class="inline-flex items-center gap-1.5 bg-primary text-on-primary rounded-full px-4 py-2.5 font-body-md text-body-md font-semibold shadow-sm hover:bg-primary-container transition-colors shrink-0" data-view="requestcollection" type="button">
<span class="material-symbols-outlined text-[18px] filled">add</span> New
</button>
</div>

<!-- Search -->
<div class="relative">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-on-surface-variant">
<span class="material-symbols-outlined text-[20px]">search</span>
</div>
<input class="pl-10 pr-4 py-3 border border-outline-variant rounded-xl focus:ring-1 focus:ring-primary focus:border-primary text-body-sm text-body-sm shadow-sm bg-surface-container-lowest text-on-surface placeholder:text-outline w-full" id="req-search" placeholder="Search Request ID..." type="text"/>
</div>

<!-- Filter chips -->
<div class="flex gap-2 overflow-x-auto pb-1" id="req-filters">
<button class="whitespace-nowrap px-3 py-2 rounded-full border border-primary bg-primary-container/10 text-primary font-body-md text-body-md font-medium transition-colors" data-filter="All">All</button>
<button class="whitespace-nowrap px-3 py-2 rounded-full border border-outline-variant text-on-surface-variant hover:bg-surface-container font-body-md text-body-md transition-colors" data-filter="Unassigned">Pending</button>
<button class="whitespace-nowrap px-3 py-2 rounded-full border border-outline-variant text-on-surface-variant hover:bg-surface-container font-body-md text-body-md transition-colors" data-filter="Scheduled">Scheduled</button>
<button class="whitespace-nowrap px-3 py-2 rounded-full border border-outline-variant text-on-surface-variant hover:bg-surface-container font-body-md text-body-md transition-colors" data-filter="In Transit">In Transit</button>
<button class="whitespace-nowrap px-3 py-2 rounded-full border border-outline-variant text-on-surface-variant hover:bg-surface-container font-body-md text-body-md transition-colors" data-filter="Completed">Completed</button>
</div>

<!-- List -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
<div id="req-list" class="flex flex-col"></div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant text-center mt-1" id="req-count"></p>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var uid = D.currentUserId();
  var all = [];
  var activeFilter = "All";

  var STATUS_META = {
    Unassigned: { cls: "bg-error-container text-on-error-container", label: "Pending" },
    Scheduled: { cls: "bg-secondary-container text-on-secondary-container", label: "Scheduled" },
    "In Transit": { cls: "bg-tertiary-container/15 text-tertiary-container", label: "In Transit" },
    Completed: { cls: "bg-primary-container/15 text-primary", label: "Completed" }
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

  var listEl = document.getElementById("req-list");

  function card(r) {
    var sm = STATUS_META[r.status] || { cls: "bg-surface-container-high text-on-surface-variant", label: r.status };
    var wts = (r.waste_types && r.waste_types.length) ? r.waste_types : [r.waste_type || "General"];
    var wm = WASTE_META[wts[0]] || { icon: "delete", cls: "text-primary" };
    var div = document.createElement("div");
    div.className = "flex items-start gap-3 p-4 hover:bg-surface-container-low transition-colors border-b border-border-subtle last:border-b-0 cursor-pointer group";
    div.setAttribute("role", "button");
    div.setAttribute("tabindex", "0");
    div.setAttribute("data-view", "requestdetails");
    div.setAttribute("data-request-id", r.id);
    div.innerHTML =
      '<span class="material-symbols-outlined w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center shrink-0 ' + wm.cls + '">' + wm.icon + "</span>" +
      '<div class="flex-1 min-w-0">' +
      '<div class="flex items-center justify-between gap-2">' +
      '<p class="font-body-md text-body-md text-on-surface font-semibold truncate">' + D.esc(r.request_number) + "</p>" +
      '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold shrink-0 ' + sm.cls + '">' + sm.label + "</span></div>" +
      '<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">' + D.esc(wts.join(", ")) + "</p>" +
      '<p class="font-label-sm text-label-sm text-on-surface-variant mt-0.5">' + D.esc(D.fmtDate(r.requested_at)) + "</p>" +
      "</div>" +
      '<span class="material-symbols-outlined text-on-surface-variant text-[20px] shrink-0 mt-1 group-hover:text-primary">chevron_right</span>';
    return div;
  }

  function empty(msg) {
    listEl.innerHTML = '<div class="p-6 text-center">' +
      '<span class="material-symbols-outlined text-[36px] text-on-surface-variant">inbox</span>' +
      '<p class="font-body-md text-body-md text-on-surface-variant mt-2">' + D.esc(msg) + "</p></div>";
  }

  function render() {
    var qEl = document.getElementById("req-search");
    var q = (qEl ? qEl.value : "") || "";
    q = q.trim().toLowerCase();
    var rows = all.filter(function (r) {
      if (activeFilter !== "All" && r.status !== activeFilter) return false;
      if (q && !String(r.request_number || "").toLowerCase().includes(q)) return false;
      return true;
    });
    listEl.innerHTML = "";
    if (!rows.length) empty(all.length ? "No requests match your search." : "You have no collection requests yet.");
    else rows.forEach(function (r) { listEl.appendChild(card(r)); });
    var c = document.getElementById("req-count");
    if (c) c.textContent = all.length ? "Showing " + rows.length + " of " + all.length + " request" + (all.length === 1 ? "" : "s") : "";
  }

  function applyFilter(btn) {
    activeFilter = btn.getAttribute("data-filter");
    document.querySelectorAll("#req-filters button").forEach(function (b) {
      var on = b.getAttribute("data-filter") === activeFilter;
      b.className = "whitespace-nowrap px-3 py-2 rounded-full border font-body-md text-body-md transition-colors " +
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

  listEl.addEventListener("click", function (e) {
    var card = e.target.closest("[data-view='requestdetails']");
    if (!card) return;
    e.preventDefault();
    e.stopPropagation();
    if (window.EcoWasteAppState) window.EcoWasteAppState.selectedRequestId = card.getAttribute("data-request-id");
    if (window.EcoWasteRouter) window.EcoWasteRouter.go("requestdetails");
  });
  listEl.addEventListener("keydown", function (e) {
    if (e.key !== "Enter") return;
    var card = e.target.closest("[data-view='requestdetails']");
    if (!card) return;
    if (window.EcoWasteAppState) window.EcoWasteAppState.selectedRequestId = card.getAttribute("data-request-id");
    if (window.EcoWasteRouter) window.EcoWasteRouter.go("requestdetails");
  });

  load().catch(function (err) {
    console.error("EcoWaste request list failed to load:", err);
  });
})();
</script>
