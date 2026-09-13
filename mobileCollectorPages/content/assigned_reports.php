<!-- Mobile Assigned Waste Reports view -->
<div class="p-4 flex flex-col gap-4">
<div>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface flex items-center gap-2">
<span class="material-symbols-outlined w-9 h-9 rounded-xl bg-primary text-on-primary flex items-center justify-center text-[20px]">fact_check</span>
Assigned Reports
</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">Waste issue reports assigned to you for resolution.</p>
</div>

<!-- Search + filter -->
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-primary">search</span>
<input id="report-search" class="w-full pl-10 pr-4 py-3 border border-primary/20 rounded-xl bg-surface-container-lowest font-body-md text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none" placeholder="Search Report ID or Address..." type="text"/>
</div>
<div class="flex gap-3">
<select id="report-type" class="flex-1 py-3 pl-3 pr-8 bg-primary-fixed rounded-xl font-body-md text-body-md appearance-none cursor-pointer text-primary">
<option value="">Report Type: All</option>
<option value="illegal_dumping">Illegal Dumping</option>
<option value="missed_collection">Missed Collection</option>
<option value="damaged_bin">Damaged Bin</option>
<option value="overflowing">Overflowing Bin</option>
<option value="other">Other</option>
</select>
</div>

<!-- List -->
<div id="report-list" class="flex flex-col gap-3"></div>

<!-- Pagination -->
<div id="report-pagination" class="flex items-center justify-center gap-1 pt-1"></div>
<p id="report-count" class="text-center font-label-sm text-label-sm text-on-surface-variant">Showing 0 entries</p>
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
  var PAGE_SIZE = 6;

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
    return '<div class="flex flex-col gap-2.5 text-left">' +
      '<div class="flex items-start justify-between gap-2"><span class="font-label-caps text-label-caps text-on-surface-variant shrink-0">Report #</span><span class="font-label-md text-label-md text-primary font-semibold text-right">' + D.esc(r.report_number) + '</span></div>' +
      '<div class="flex items-start justify-between gap-2"><span class="font-label-caps text-label-caps text-on-surface-variant shrink-0">Status</span><span class="font-body-md text-body-md text-on-surface font-semibold text-right">' + D.esc(r.status) + '</span></div>' +
      '<div class="flex items-start justify-between gap-2"><span class="font-label-caps text-label-caps text-on-surface-variant shrink-0">Issue</span><span class="font-body-md text-body-md text-on-surface text-right">' + D.esc(tmeta.label) + '</span></div>' +
      '<div class="flex items-start justify-between gap-2"><span class="font-label-caps text-label-caps text-on-surface-variant shrink-0">Category</span><span class="font-body-md text-body-md text-on-surface text-right">' + D.esc(cat) + '</span></div>' +
      '<div class="flex items-start justify-between gap-2"><span class="font-label-caps text-label-caps text-on-surface-variant shrink-0">Observed</span><span class="font-body-md text-body-md text-on-surface text-right">' + D.fmtDate(r.observed_at) + '</span></div>' +
      '<div><span class="font-label-caps text-label-caps text-on-surface-variant">Location</span><p class="font-body-md text-body-md text-on-surface mt-0.5">' + D.esc(r.address) + '</p></div>' +
      (r.description ? '<div><span class="font-label-caps text-label-caps text-on-surface-variant">Description</span><p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">' + D.esc(r.description) + '</p></div>' : '') +
      (r.photo_url ? '<div><span class="font-label-caps text-label-caps text-on-surface-variant">Evidence</span><img src="' + D.esc(r.photo_url) + '" class="mt-1 rounded-lg w-full max-h-48 object-cover" alt="Evidence photo"></div>' : '') +
      (r.resolution_note ? '<div><span class="font-label-caps text-label-caps text-on-surface-variant">Resolution Note</span><p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">' + D.esc(r.resolution_note) + '</p></div>' : '') +
      '</div>';
  }

  function openDetails(r) {
    var overlay = document.createElement("div");
    overlay.className = "fixed inset-0 z-[60] flex items-center justify-center p-4";
    overlay.innerHTML =
      '<div class="absolute inset-0 bg-black/40" data-rd-close></div>' +
      '<div class="relative bg-surface-container-lowest border border-border-subtle rounded-xl shadow-2xl w-full max-w-md overflow-hidden">' +
      '<div class="flex items-center justify-between px-5 py-4 border-b border-border-subtle">' +
      '<h3 class="font-headline-md text-headline-md text-on-surface">Report Details</h3>' +
      '<button type="button" data-rd-close class="text-on-surface-variant hover:text-on-surface transition-colors p-1"><span class="material-symbols-outlined">close</span></button>' +
      '</div>' +
      '<div class="p-5 max-h-[70vh] overflow-y-auto">' + detailsHtml(r) + '</div>' +
      '<div class="flex items-center justify-end gap-2 px-5 py-4 border-t border-border-subtle bg-surface-container-low/50">' +
      (r.status !== "Resolved" && r.status !== "Dismissed"
        ? '<button type="button" data-rd-resolve class="px-4 py-2 rounded-lg bg-primary text-on-primary font-body-md text-body-md font-semibold transition-colors">Resolve</button>' : '') +
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
      submitLabel: "Resolve",
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

  function card(r) {
    var tmeta = TYPE_META[r.report_type] || TYPE_META["other"];
    var div = document.createElement("div");
    div.className = "bg-surface-container-lowest border border-border-subtle rounded-xl p-4 flex flex-col gap-3 transition-colors hover:bg-surface-container-low";
    div.innerHTML =
      '<div class="flex items-center gap-2 flex-wrap">' +
        '<span class="font-label-md text-label-md text-primary">' + D.esc(r.report_number) + "</span>" +
        '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold bg-blue-100 text-status-progress">' + D.esc(r.status) + "</span>" +
      "</div>" +
      '<div class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-surface-container-high text-on-surface-variant">' +
        '<span class="material-symbols-outlined text-[13px]">' + tmeta.icon + "</span>" + D.esc(tmeta.label) +
      "</div>" +
      '<p class="font-body-sm text-body-sm text-on-surface-variant">' + D.esc(r.address || "") + "</p>" +
      '<p class="font-label-sm text-label-sm text-on-surface-variant">' + D.fmtDate(r.observed_at) + "</p>" +
      '<div class="flex gap-2 mt-1">' +
        '<button data-o="details" class="flex-1 flex items-center justify-center gap-1 px-3 py-2 rounded-lg border border-primary text-primary font-label-md text-label-md transition-colors"><span class="material-symbols-outlined text-[14px]">visibility</span> View</button>' +
        '<button data-o="resolve" class="flex-1 flex items-center justify-center gap-1 px-3 py-2 rounded-lg bg-primary text-on-primary font-label-md text-label-md transition-colors"><span class="material-symbols-outlined text-[14px]">check_circle</span> Resolve</button>' +
      "</div>";
    div.querySelector('[data-o="details"]').addEventListener("click", function () { openDetails(r); });
    div.querySelector('[data-o="resolve"]').addEventListener("click", function () { openResolve(r); });
    return div;
  }

  function filtered() {
    return UI.filterList(allReports, searchTerm, ["report_number", "address", "report_type"], {
      report_type: typeFilter || null
    });
  }

  function render() {
    var rows = filtered();
    var list = document.getElementById("report-list");
    list.innerHTML = "";
    var pg = UI.paginate(rows, page, PAGE_SIZE);
    if (!pg.rows.length) {
      list.innerHTML = '<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-6 text-center"><p class="font-body-md text-body-md text-on-surface-variant">No assigned reports match your filters.</p></div>';
    } else {
      pg.rows.forEach(function (r) { list.appendChild(card(r)); });
    }
    var count = document.getElementById("report-count");
    if (count) count.textContent = "Showing " + (rows.length ? pg.start + " to " + pg.end + " of " : "0 of ") + rows.length + " entries";
    var nav = document.getElementById("report-pagination");
    if (nav) UI.paginateButtons(nav, { page: pg.page, pages: pg.pages, onPage: function (p) { page = p; render(); } });
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