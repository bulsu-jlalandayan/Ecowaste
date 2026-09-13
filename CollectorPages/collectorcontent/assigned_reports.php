<!-- Assigned Waste Reports view - loaded via collector_content.php -->
<!-- Page Header -->
<div class="mb-stack-lg">
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-2">Assigned Waste Reports</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Review resident-submitted waste issue reports assigned to you and update their resolution.</p>
</div>
<!-- Toolbar (Filters & Search) -->
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle p-4 mb-stack-lg grid grid-cols-1 sm:grid-cols-2 gap-4 items-end shadow-sm">
<div class="relative sm:col-span-2">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input id="report-search" class="w-full pl-10 pr-4 py-2 h-11 bg-surface border border-border-subtle rounded-lg focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors font-body-sm text-body-sm" placeholder="Search Report ID or Address..." type="text"/>
</div>
<div class="sm:col-span-2 grid grid-cols-1 sm:grid-cols-3 gap-3">
<select id="report-type" class="w-full py-2.5 pl-3 pr-8 bg-surface border border-border-subtle rounded-lg focus:border-primary outline-none font-body-sm text-body-sm cursor-pointer">
<option value="">Report Type: All</option>
<option value="illegal_dumping">Illegal Dumping</option>
<option value="missed_collection">Missed Collection</option>
<option value="damaged_bin">Damaged Bin</option>
<option value="overflowing">Overflowing Bin</option>
<option value="other">Other</option>
</select>
</div>
</div>
<!-- Data Table Card -->
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle shadow-sm overflow-hidden">
<div class="overflow-x-auto table-scroll">
<table class="w-full min-w-[720px] text-left border-collapse">
<thead class="sticky top-0 z-10">
<tr class="bg-surface-container-low border-b border-border-subtle">
<th class="py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant">Report ID</th>
<th class="py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant">Issue</th>
<th class="py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant">Category</th>
<th class="py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant">Address</th>
<th class="py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant">Observed</th>
<th class="py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant">Status</th>
<th class="py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant text-right">Action</th>
</tr>
</thead>
<tbody id="report-table-body" class="divide-y divide-border-subtle">
</tbody>
</table>
</div>
<div id="report-pagination" class="bg-surface p-4 border-t border-border-subtle flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 text-sm text-on-surface-variant">
<span id="report-count">Showing 0 entries</span>
<div id="report-pagination-btns" class="flex gap-2"></div>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  var UI = window.EcoWasteUI;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var uid = D.currentUserId();
  var allReports = [];
  var searchTerm = "";
  var typeFilter = "";
  var page = 1;
  var PAGE_SIZE = 10;

  var TYPE_META = {
    "illegal_dumping": { label: "Illegal Dumping", icon: "gavel" },
    "missed_collection": { label: "Missed Collection", icon: "local_shipping" },
    "damaged_bin": { label: "Damaged Bin", icon: "inventory_2" },
    "overflowing": { label: "Overflowing Bin", icon: "priority_high" },
    "other": { label: "Other", icon: "more_horiz" }
  };
  var CATEGORY_LABEL = {
    "general": "General Waste",
    "recycling": "Recycling",
    "organic": "Organic/Compost",
    "hazardous": "Hazardous",
    "bulky": "Bulky Items"
  };

  function detailsHtml(r) {
    var tmeta = TYPE_META[r.report_type] || TYPE_META["other"];
    var cat = CATEGORY_LABEL[r.waste_category] || r.waste_category || "";
    return '<div class="flex flex-col gap-4">' +
      '<div class="grid grid-cols-2 gap-4">' +
      '<div><div class="font-label-caps text-label-caps text-on-surface-variant">Report #</div><div class="font-label-md text-label-md text-primary font-semibold">' + D.esc(r.report_number) + '</div></div>' +
      '<div><div class="font-label-caps text-label-caps text-on-surface-variant">Status</div><div class="font-body-md text-body-md text-on-surface font-semibold">' + D.esc(r.status) + '</div></div>' +
      '<div><div class="font-label-caps text-label-caps text-on-surface-variant">Issue Type</div><div class="font-body-md text-body-md text-on-surface">' + D.esc(tmeta.label) + '</div></div>' +
      '<div><div class="font-label-caps text-label-caps text-on-surface-variant">Category</div><div class="font-body-md text-body-md text-on-surface">' + D.esc(cat) + '</div></div>' +
      '</div>' +
      (r.description ? '<div><div class="font-label-caps text-label-caps text-on-surface-variant">Description</div><p class="font-body-md text-body-md text-on-surface-variant mt-1">' + D.esc(r.description) + '</p></div>' : '') +
      '<div><div class="font-label-caps text-label-caps text-on-surface-variant">Location</div><p class="font-body-md text-body-md text-on-surface mt-1">' + D.esc(r.address || "—") + '</p></div>' +
      '<div><div class="font-label-caps text-label-caps text-on-surface-variant">Observed</div><p class="font-body-md text-body-md text-on-surface mt-1">' + D.fmtDate(r.observed_at) + '</p></div>' +
      (r.photo_url ? '<div><div class="font-label-caps text-label-caps text-on-surface-variant">Evidence</div><img src="' + D.esc(r.photo_url) + '" class="mt-1 rounded-lg w-full max-h-56 object-cover border border-border-subtle" alt="Evidence photo"></div>' : '') +
      (r.resolution_note ? '<div><div class="font-label-caps text-label-caps text-on-surface-variant">Resolution Note</div><p class="font-body-md text-body-md text-on-surface-variant mt-1">' + D.esc(r.resolution_note) + '</p></div>' : '') +
      '</div>';
  }

  function openDetails(r) {
    var overlay = document.createElement("div");
    overlay.className = "fixed inset-0 z-[60] flex items-center justify-center p-4";
    overlay.innerHTML =
      '<div class="absolute inset-0 bg-black/40" data-rd-close></div>' +
      '<div class="relative bg-surface-container-lowest border border-border-subtle rounded-xl shadow-2xl w-full max-w-xl overflow-hidden">' +
      '<div class="flex items-center justify-between px-5 py-4 border-b border-border-subtle">' +
      '<h3 class="font-headline-md text-headline-md text-on-surface">Report Details</h3>' +
      '<button type="button" data-rd-close class="text-on-surface-variant hover:text-on-surface transition-colors p-1"><span class="material-symbols-outlined">close</span></button>' +
      '</div>' +
      '<div class="p-5 max-h-[70vh] overflow-y-auto">' + detailsHtml(r) + '</div>' +
      '<div class="flex justify-end px-5 py-4 border-t border-border-subtle bg-surface-container-low/50">' +
      (r.status !== "Resolved" && r.status !== "Dismissed"
        ? '<button type="button" data-rd-resolve class="px-4 py-2 rounded-lg bg-primary text-on-primary font-body-md text-body-md font-semibold transition-colors mr-2">Mark Resolved</button>' : '') +
      '<button type="button" data-rd-close class="px-4 py-2 rounded-lg border border-border-subtle text-on-surface font-body-md text-body-md hover:bg-surface-container transition-colors">Close</button>' +
      '</div></div>';
    overlay.querySelectorAll("[data-rd-close]").forEach(function (el) {
      el.addEventListener("click", function () { overlay.remove(); });
    });
    var resolveBtn = overlay.querySelector("[data-rd-resolve]");
    if (resolveBtn) {
      resolveBtn.addEventListener("click", function () { overlay.remove(); openResolve(r); });
    }
    document.body.appendChild(overlay);
  }

  function openResolve(r) {
    UI.openModal({
      title: "Mark Resolved - " + r.report_number,
      submitLabel: "Mark Resolved",
      fields: [
        { name: "note", label: "Resolution note", type: "textarea", required: false, placeholder: "Describe how the issue was handled..." }
      ],
      onSubmit: function (values) {
        return D.update("waste_reports", "id=eq." + r.id, {
          status: "Resolved",
          resolution_note: values.note || null,
          resolved_at: new Date().toISOString()
        });
      }
    }).then(function () {
      UI.toast.success("Report resolved.");
      load();
    }).catch(function (err) {
      if (err && err.message === "closed") return;
      UI.toast.error(err.message || "Failed to resolve report.");
    });
  }

  function buildRow(r) {
    var tmeta = TYPE_META[r.report_type] || TYPE_META["other"];
    var cat = CATEGORY_LABEL[r.waste_category] || r.waste_category || "";
    var tr = document.createElement("tr");
    tr.className = "hover:bg-surface transition-colors";
    tr.innerHTML =
      '<td class="py-4 px-3 sm:px-4"><span class="font-label-md text-label-md text-primary">' + D.esc(r.report_number) + '</span></td>' +
      '<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm"><div class="flex items-center gap-2"><span class="material-symbols-outlined text-outline text-sm">' + tmeta.icon + '</span> ' + D.esc(tmeta.label) + '</div></td>' +
      '<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm text-on-surface-variant">' + D.esc(cat) + '</td>' +
      '<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm">' + D.esc(r.address || "—") + '</td>' +
      '<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm text-on-surface-variant">' + D.fmtDate(r.observed_at) + '</td>' +
      '<td class="py-4 px-3 sm:px-4"><span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-status-progress">' + D.esc(r.status) + '</span></td>' +
      '<td class="py-4 px-3 sm:px-4 text-right"><button data-rd-open="' + r.id + '" class="font-label-md text-label-md text-primary hover:text-secondary bg-primary-fixed bg-opacity-20 hover:bg-opacity-40 px-3 py-1.5 rounded-lg transition-colors whitespace-nowrap">View</button></td>';
    return tr;
  }

  function filtered() {
    return UI.filterList(allReports, searchTerm, ["report_number", "address", "report_type"], {
      report_type: typeFilter || null
    });
  }

  function render() {
    var rows = filtered();
    var tbody = document.getElementById("report-table-body");
    tbody.innerHTML = "";
    var pg = UI.paginate(rows, page, PAGE_SIZE);
    if (!pg.rows.length) {
      tbody.innerHTML = '<tr><td colspan="7" class="py-12 text-center font-body-sm text-body-sm text-on-surface-variant">No assigned reports match your filters.</td></tr>';
    } else {
      pg.rows.forEach(function (r) { tbody.appendChild(buildRow(r)); });
    }
    var count = document.getElementById("report-count");
    if (count) count.textContent = "Showing " + (rows.length ? pg.start + " to " + pg.end + " of " : "0 of ") + rows.length + " entries";
    var navBtns = document.getElementById("report-pagination-btns");
    if (navBtns) UI.paginateButtons(navBtns, { page: pg.page, pages: pg.pages, onPage: function (p) { page = p; render(); } });
    tbody.querySelectorAll("[data-rd-open]").forEach(function (btn) {
      btn.addEventListener("click", function () {
        var r = findReport(btn.getAttribute("data-rd-open"));
        if (r) openDetails(r);
      });
    });
  }

  function findReport(id) {
    for (var i = 0; i < allReports.length; i++) {
      if (allReports[i].id === id) return allReports[i];
    }
    return null;
  }

  async function load() {
    allReports = await D.list("waste_reports",
      "id,report_number,waste_category,report_type,description,address,photo_url,observed_at,created_at,status,resolution_note",
      "created_at.desc",
      "assigned_to_id=eq." + uid + "&status=eq.Assigned");
    render();
  }

  document.getElementById("report-search").addEventListener("input", function (e) {
    searchTerm = e.target.value;
    page = 1;
    render();
  });
  document.getElementById("report-type").addEventListener("change", function (e) {
    typeFilter = e.target.value;
    page = 1;
    render();
  });

  load().catch(function (err) {
    console.error("EcoWaste assigned waste reports failed to load:", err);
  });
})();
</script>