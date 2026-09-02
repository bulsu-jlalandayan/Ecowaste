<!-- Mobile Completed Collections view -->
<div class="p-4 flex flex-col gap-4">
<div>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface flex items-center gap-2">
<span class="material-symbols-outlined w-9 h-9 rounded-xl bg-status-completed text-white flex items-center justify-center text-[20px]">task_alt</span>
Completed Collections
</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">Records of collections you have finished.</p>
</div>

<!-- Filters -->
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-primary">search</span>
<input id="complete-search" class="w-full pl-10 pr-4 py-3 border border-primary/20 rounded-xl bg-surface-container-lowest font-body-md text-body-md outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Search Request ID or Address..." type="text"/>
</div>
<div class="grid grid-cols-2 gap-3">
<select id="complete-waste" class="w-full py-3 pl-3 pr-8 bg-primary-fixed rounded-xl font-body-md text-body-md appearance-none cursor-pointer text-primary">
<option value="">Waste Type: All</option>
<option value="General">General</option>
<option value="Recyclable">Recyclable</option>
<option value="Hazardous">Hazardous</option>
<option value="Organic">Organic</option>
</select>
<input id="complete-date" class="w-full px-3 py-3 border border-primary/20 rounded-xl bg-surface-container-lowest font-body-md text-body-md outline-none focus:border-primary focus:ring-1 focus:ring-primary" type="date"/>
</div>

<!-- List -->
<div id="complete-list" class="flex flex-col gap-3"></div>

<!-- Pagination -->
<div id="complete-pagination" class="flex items-center justify-center gap-1 pt-1"></div>
<p id="complete-count" class="text-center font-label-sm text-label-sm text-on-surface-variant">Showing 0 entries</p>
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
  var PAGE_SIZE = 6;

  function dateOf(iso) {
    if (!iso) return "";
    var d = new Date(iso);
    var m = String(d.getMonth() + 1).padStart(2, "0");
    var day = String(d.getDate()).padStart(2, "0");
    return d.getFullYear() + "-" + m + "-" + day;
  }

  function card(r) {
    var wt = UI.wasteType(r.waste_type);
    var a = document.createElement("a");
    a.href = "#";
    a.className = "bg-surface-container-lowest border border-border-subtle rounded-xl p-4 flex items-start gap-3 transition-colors hover:bg-surface-container-low";
    a.setAttribute("data-view", "collection_details");
    a.setAttribute("data-request-id", r.id);
    a.innerHTML =
      '<div class="flex-1 min-w-0">' +
        '<div class="flex items-center gap-2 flex-wrap">' +
          '<span class="font-label-md text-label-md text-primary">' + D.esc(r.request_number) + "</span>" +
          '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-100 text-emerald-800">Completed</span>' +
        "</div>" +
        '<div class="mt-2 flex items-center gap-2 flex-wrap">' +
          '<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold ' + wt.chip + '">' +
            '<span class="material-symbols-outlined text-[13px]">' + wt.icon + "</span>" + D.esc(r.waste_type || "General") +
          "</span>" +
          '<span class="font-label-sm text-label-sm text-on-surface-variant">Completed ' + (r.completed_at ? D.fmtDate(r.completed_at) : D.fmtDate(r.requested_at)) + "</span>" +
        "</div>" +
        '<p class="font-body-sm text-body-sm text-on-surface mt-1.5 truncate">' + D.esc(r.location || "") + "</p>" +
      "</div>" +
      '<span class="material-symbols-outlined text-on-surface-variant mt-1">chevron_right</span>';
    return a;
  }

  function filtered() {
    return allRequests.filter(function (r) {
      var ok = true;
      var w = (r.waste_type || "").toLowerCase();
      if (wasteFilter && w !== wasteFilter.toLowerCase()) ok = false;
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
    var list = document.getElementById("complete-list");
    list.innerHTML = "";
    var pg = UI.paginate(rows, page, PAGE_SIZE);
    if (!pg.rows.length) {
      list.innerHTML = '<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-6 text-center">' +
        '<span class="material-symbols-outlined text-[40px] text-emerald-300">task_alt</span>' +
        '<p class="font-body-md text-body-md text-on-surface-variant mt-2">No completed collections yet.</p></div>';
    } else {
      pg.rows.forEach(function (r) { list.appendChild(card(r)); });
    }
    var count = document.getElementById("complete-count");
    if (count) count.textContent = "Showing " + (rows.length ? pg.start + " to " + pg.end + " of " : "0 of ") + rows.length + " entries";
    var nav = document.getElementById("complete-pagination");
    if (nav) UI.paginateButtons(nav, { page: pg.page, pages: pg.pages, onPage: function (p) { page = p; render(); } });
  }

  async function load() {
    allRequests = await D.list("collection_requests", "id,request_number,location,waste_type,status,requested_at,completed_at", "requested_at.desc", "collector_id=eq." + uid + "&status=eq.Completed");
    render();
  }

  document.getElementById("complete-search").addEventListener("input", function (e) {
    searchTerm = e.target.value;
    page = 1;
    render();
  });
  document.getElementById("complete-waste").addEventListener("change", function (e) {
    wasteFilter = e.target.value;
    page = 1;
    render();
  });
  document.getElementById("complete-date").addEventListener("change", function (e) {
    dateFilter = e.target.value;
    page = 1;
    render();
  });

  load().catch(function (err) {
    console.error("EcoWaste completed collections failed to load:", err);
  });
})();
</script>