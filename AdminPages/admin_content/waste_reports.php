<!-- Waste Issue Reports view - loaded via admin_app.php -->
<!-- Canvas -->
<div class="flex-1 overflow-y-auto p-margin-desktop bg-background flex flex-col gap-lg">
<!-- Page Header & Global Actions -->
<div class="flex justify-between items-end">
<div>
<h2 class="font-display-lg text-display-lg font-bold text-on-surface">Waste Issue Reports</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant mt-xs">Receive, review, verify, assign, and resolve resident-submitted waste reports.</p>
</div>
<div class="flex gap-sm">
<button id="export-reports-btn" class="flex items-center gap-xs px-lg py-2 bg-surface border border-outline-variant rounded text-on-surface font-title-md text-title-md hover:bg-surface-container-high transition-colors shadow-sm">
<span class="material-symbols-outlined text-[18px]">download</span>
                        Export
                    </button>
</div>
</div>
<!-- Filters & Controls Bar -->
<div class="bg-surface border border-outline-variant rounded-xl shadow-card p-md flex flex-wrap gap-md items-center justify-between">
<div class="flex items-center gap-md">
<label class="font-label-md text-label-md text-on-surface-variant">Search</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-2 top-1/2 -translate-y-1/2 text-on-surface-variant text-[18px]">search</span>
<input id="report-search" class="bg-surface-container-lowest border border-outline-variant rounded pl-9 pr-3 py-1.5 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary w-48" placeholder="Report # or address..." type="text"/>
</div>
</div>
<!-- Status Filter -->
<div class="flex flex-col gap-1">
<label class="font-label-md text-label-md text-on-surface-variant">Status</label>
<select id="report-status-filter" class="bg-surface-container-lowest border border-outline-variant rounded px-3 py-1.5 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary min-w-[150px]">
<option value="">All Statuses</option>
<option value="Submitted">Submitted</option>
<option value="Under Review">Under Review</option>
<option value="Verified">Verified</option>
<option value="Assigned">Assigned</option>
<option value="Resolved">Resolved</option>
<option value="Dismissed">Dismissed</option>
</select>
</div>
<!-- Report Type Filter -->
<div class="flex flex-col gap-1">
<label class="font-label-md text-label-md text-on-surface-variant">Report Type</label>
<select id="report-type-filter" class="bg-surface-container-lowest border border-outline-variant rounded px-3 py-1.5 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary min-w-[160px]">
<option value="">All Types</option>
<option value="illegal_dumping">Illegal Dumping</option>
<option value="missed_collection">Missed Collection</option>
<option value="damaged_bin">Damaged Bin</option>
<option value="overflowing">Overflowing Bin</option>
<option value="other">Other</option>
</select>
</div>
</div>
</div>
<!-- Data Table Container -->
<div class="bg-surface border border-outline-variant rounded-xl shadow-card overflow-hidden flex-1 flex flex-col">
<div class="overflow-x-auto flex-1">
<table class="w-full text-left border-collapse">
<thead class="bg-surface-container-low border-b border-outline-variant sticky top-0 z-10">
<tr>
<th class="p-sm pl-md font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Report #</th>
<th class="p-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Resident</th>
<th class="p-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Issue</th>
<th class="p-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Location</th>
<th class="p-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Submitted</th>
<th class="p-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Status</th>
<th class="p-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Assigned</th>
<th class="p-sm pr-md font-label-md text-label-md text-on-surface-variant uppercase tracking-wider text-right">Action</th>
</tr>
</thead>
<tbody id="report-tbody" class="font-body-md text-body-md text-on-surface">
</tbody>
</table>
</div>
<!-- Pagination Footer -->
<div class="p-sm px-md border-t border-outline-variant bg-surface-container-lowest flex items-center justify-between">
<span id="report-count" class="font-body-sm text-body-sm text-on-surface-variant">Showing 0 reports</span>
<div id="report-pagination" class="flex gap-2"></div>
</div>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var STATUS_BADGE = {
    "Submitted": "bg-error-container text-on-error-container border border-[#ffb4ab]",
    "Under Review": "bg-secondary-fixed text-on-secondary-fixed border border-secondary-fixed-dim",
    "Verified": "bg-surface-tint/10 text-surface-tint border border-surface-tint/20",
    "Assigned": "bg-primary-fixed text-on-primary-fixed-variant border border-primary-fixed",
    "Resolved": "bg-status-success text-status-success-text border border-status-success-border",
    "Dismissed": "bg-surface-container-high text-on-surface-variant border border-outline-variant"
  };

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

  var PRIMARY_ACTION = {
    "Submitted": { action: "review", label: "Review" },
    "Under Review": { action: "verify", label: "Verify" },
    "Verified": { action: "assign", label: "Assign" },
    "Assigned": { action: "resolve", label: "Resolve" }
  };

  var allReports = [];
  var nameMap = {};
  var searchTerm = "";
  var statusFilter = "";
  var typeFilter = "";
  var reportPage = 1;

  async function load() {
    var profiles = await D.list("profiles", "id,full_name", "full_name.asc").catch(function () { return []; });
    nameMap = {};
    (profiles || []).forEach(function (p) { nameMap[p.id] = p.full_name || ""; });
    allReports = await D.list("waste_reports",
      "id,report_number,user_id,waste_category,report_type,description,address,photo_url,observed_at,created_at,status,assigned_to_name,assigned_to_id,resolution_note,reviewed_at,verified_at,assigned_at,resolved_at",
      "created_at.desc");
    render();
  }

  function residentName(r) {
    if (r.user_id && nameMap[r.user_id]) return nameMap[r.user_id];
    return "Resident";
  }

  function filtered() {
    return window.EcoWasteUI.filterList(allReports, searchTerm,
      ["report_number", "address"],
      { status: statusFilter, report_type: typeFilter });
  }

  function render() {
    var rows = filtered();
    var tbody = document.getElementById("report-tbody");
    if (!tbody) return;
    var page = window.EcoWasteUI.paginate(rows, reportPage, 10);
    if (!page.rows.length) {
      tbody.innerHTML = '<tr><td class="p-sm pl-md pr-md text-on-surface-variant" colspan="8">No waste reports found.</td></tr>';
    } else {
      tbody.innerHTML = "";
      page.rows.forEach(function (r) {
        var badge = STATUS_BADGE[r.status] || "bg-surface-variant text-on-surface-variant";
        var tmeta = TYPE_META[r.report_type] || TYPE_META["other"];
        var cat = CATEGORY_LABEL[r.waste_category] || r.waste_category || "";
        var primary = PRIMARY_ACTION[r.status];
        var name = residentName(r);
        var initials = D.esc(D.initials(name));
        var assigneeCell = "";
        var actionCell = "";
        if (r.assigned_to_name) {
          var aInitials = D.esc(D.initials(r.assigned_to_name));
          assigneeCell = '<td class="p-sm"><div class="flex items-center gap-2">' +
            '<div class="w-6 h-6 rounded-full bg-surface-container-highest overflow-hidden flex items-center justify-center text-[10px] font-bold text-on-surface-variant">' + aInitials + '</div>' +
            '<span class="font-title-md text-title-md">' + D.esc(r.assigned_to_name) + '</span>' +
            '</div></td>';
        } else {
          assigneeCell = '<td class="p-sm text-on-surface-variant italic font-body-sm text-body-sm">Unassigned</td>';
        }
        if (primary) {
          actionCell = '<button class="px-md py-1.5 bg-primary text-on-primary rounded font-title-md text-title-md hover:bg-primary-container hover:text-on-primary-container transition-colors shadow-sm" data-action="' + primary.action + '" data-id="' + r.id + '">' + primary.label + '</button>' +
            '<button class="p-1.5 text-on-surface-variant hover:text-primary transition-colors rounded hover:bg-surface-container-highest ml-1" data-action="menu" data-id="' + r.id + '"><span class="material-symbols-outlined text-[20px]">more_vert</span></button>';
        } else {
          actionCell = '<button class="p-1.5 text-on-surface-variant hover:text-primary transition-colors rounded hover:bg-surface-container-highest" data-action="menu" data-id="' + r.id + '"><span class="material-symbols-outlined text-[20px]">more_vert</span></button>';
        }
        var tr = document.createElement("tr");
        tr.className = "border-b border-surface-container-highest table-row-hover transition-colors";
        tr.innerHTML =
          '<td class="p-sm pl-md font-mono-md text-mono-md font-bold text-on-surface-variant">' + D.esc(r.report_number) + '</td>' +
          '<td class="p-sm"><div class="flex items-center gap-2">' +
            '<div class="w-6 h-6 rounded-full bg-surface-container-highest overflow-hidden flex items-center justify-center text-[10px] font-bold text-on-surface-variant">' + initials + '</div>' +
            '<span class="font-title-md text-title-md">' + D.esc(name) + '</span>' +
          '</div></td>' +
          '<td class="p-sm">' +
            '<div class="flex items-center gap-1 font-title-md text-title-md"><span class="material-symbols-outlined text-[16px] text-on-surface-variant">' + tmeta.icon + '</span>' + D.esc(tmeta.label) + '</div>' +
            (cat ? '<div class="font-body-sm text-body-sm text-on-surface-variant">' + D.esc(cat) + '</div>' : '') +
          '</td>' +
          '<td class="p-sm">' + D.esc(r.address || "—") + '</td>' +
          '<td class="p-sm text-on-surface-variant">' + D.esc(D.fmtDate(r.created_at)) + '</td>' +
          '<td class="p-sm"><span class="inline-flex px-2 py-1 rounded font-label-md text-label-md ' + badge + '">' + D.esc(r.status) + '</span></td>' +
          assigneeCell +
          '<td class="p-sm pr-md text-right whitespace-nowrap">' + actionCell + '</td>';
        tbody.appendChild(tr);
      });
    }
    var count = document.getElementById("report-count");
    if (count) {
      count.textContent = page.total ? "Showing " + page.start + " to " + page.end + " of " + page.total + " reports" : "Showing 0 reports";
    }
    var nav = document.getElementById("report-pagination");
    if (nav) {
      window.EcoWasteUI.paginateButtons(nav, { page: page.page, pages: page.pages, onPage: function (p) { reportPage = p; render(); } });
    }
  }

  var exportBtn = document.getElementById("export-reports-btn");
  if (exportBtn) {
    exportBtn.addEventListener("click", function () {
      var rows = filtered().map(function (r) {
        return {
          report_number: r.report_number,
          resident: residentName(r),
          waste_category: CATEGORY_LABEL[r.waste_category] || r.waste_category || "",
          report_type: (TYPE_META[r.report_type] || TYPE_META["other"]).label,
          address: r.address || "",
          observed_at: D.fmtDate(r.observed_at),
          submitted_at: D.fmtDate(r.created_at),
          status: r.status,
          assigned_to: r.assigned_to_name || "",
          resolution_note: r.resolution_note || ""
        };
      });
      D.exportCSV("ecowaste_waste_reports.csv",
        ["report_number", "resident", "waste_category", "report_type", "address", "observed_at", "submitted_at", "status", "assigned_to", "resolution_note"],
        rows);
    });
  }

  function findReport(id) {
    for (var i = 0; i < allReports.length; i++) {
      if (allReports[i].id === id) return allReports[i];
    }
    return null;
  }

  function patchReport(r, body, msg) {
    D.update("waste_reports", "id=eq." + r.id, body)
      .then(function () {
        if (msg) window.EcoWasteUI.toast(msg, "success");
        load();
      })
      .catch(function (err) { window.EcoWasteUI.toast(err.message, "error"); });
  }

  function openDetails(r) {
    var tmeta = TYPE_META[r.report_type] || TYPE_META["other"];
    var cat = CATEGORY_LABEL[r.waste_category] || r.waste_category || "";
    var timeline = function (label, iso) {
      return '<div class="flex items-start gap-2">' +
        '<span class="material-symbols-outlined text-[16px] mt-px ' + (iso ? "text-primary" : "text-outline") + '">' + (iso ? "check_circle" : "radio_button_unchecked") + '</span>' +
        '<div><div class="font-title-md text-title-md text-on-surface">' + label + '</div>' +
        (iso ? '<div class="font-body-sm text-body-sm text-on-surface-variant">' + D.fmtDate(iso) + '</div>' : '') +
        '</div></div>';
    };
    var html =
      '<div class="flex flex-col gap-4">' +
      '<div class="grid grid-cols-2 gap-md">' +
      '<div><div class="font-label-caps text-label-caps text-on-surface-variant">Report #</div><div class="font-data-mono text-data-mono text-primary font-semibold">' + D.esc(r.report_number) + '</div></div>' +
      '<div><div class="font-label-caps text-label-caps text-on-surface-variant">Resident</div><div class="font-body-md text-body-md text-on-surface">' + D.esc(residentName(r)) + '</div></div>' +
      '<div><div class="font-label-caps text-label-caps text-on-surface-variant">Issue Type</div><div class="font-body-md text-body-md text-on-surface">' + D.esc(tmeta.label) + '</div></div>' +
      '<div><div class="font-label-caps text-label-caps text-on-surface-variant">Waste Category</div><div class="font-body-md text-body-md text-on-surface">' + D.esc(cat) + '</div></div>' +
      '</div>' +
      (r.description ? '<div><div class="font-label-caps text-label-caps text-on-surface-variant">Description</div><p class="font-body-md text-body-md text-on-surface-variant mt-1">' + D.esc(r.description) + '</p></div>' : '') +
      '<div><div class="font-label-caps text-label-caps text-on-surface-variant">Location</div><p class="font-body-md text-body-md text-on-surface mt-1">' + D.esc(r.address || "—") + '</p></div>' +
      (r.photo_url ? '<div><div class="font-label-caps text-label-caps text-on-surface-variant">Evidence</div><img src="' + D.esc(r.photo_url) + '" class="mt-1 rounded-lg w-full max-h-56 object-cover border border-outline-variant" alt="Evidence photo"></div>' : '') +
      (r.resolution_note ? '<div><div class="font-label-caps text-label-caps text-on-surface-variant">Resolution / Note</div><p class="font-body-md text-body-md text-on-surface-variant mt-1">' + D.esc(r.resolution_note) + '</p></div>' : '') +
      (r.assigned_to_name ? '<div><div class="font-label-caps text-label-caps text-on-surface-variant">Assigned To</div><div class="font-body-md text-body-md text-on-surface mt-1">' + D.esc(r.assigned_to_name) + '</div></div>' : '') +
      '<div><div class="font-label-caps text-label-caps text-on-surface-variant mb-2">Workflow</div>' +
      '<div class="flex flex-col gap-2.5">' +
      timeline("Received", r.created_at) +
      timeline("Under Review", r.reviewed_at) +
      timeline("Verified", r.verified_at) +
      timeline("Assigned", r.assigned_at) +
      timeline("Resolved", r.resolved_at) +
      '</div></div></div>';
    var overlay = document.createElement("div");
    overlay.className = "fixed inset-0 z-[60] flex items-center justify-center p-4";
    overlay.innerHTML =
      '<div class="absolute inset-0 bg-black/40" data-rd-close></div>' +
      '<div class="relative bg-surface-container-lowest border border-outline-variant rounded-xl shadow-2xl w-full max-w-xl overflow-hidden">' +
      '<div class="flex items-center justify-between px-lg py-md border-b border-outline-variant">' +
      '<h3 class="font-headline-md text-headline-md text-on-surface">Report Details</h3>' +
      '<span class="inline-flex px-2 py-1 rounded font-label-md text-label-md ' + (STATUS_BADGE[r.status] || "bg-surface-variant text-on-surface-variant") + '">' + D.esc(r.status) + '</span>' +
      '</div>' +
      '<div class="p-lg max-h-[70vh] overflow-y-auto">' + html + '</div>' +
      '<div class="flex justify-end px-lg py-md border-t border-outline-variant bg-surface-container-low/50">' +
      '<button type="button" data-rd-close class="px-4 py-2 rounded-lg bg-primary text-on-primary font-body-md text-body-md font-semibold transition-colors">Close</button>' +
      '</div></div>';
    overlay.querySelectorAll("[data-rd-close]").forEach(function (el) {
      el.addEventListener("click", function () { overlay.remove(); });
    });
    document.body.appendChild(overlay);
  }

  function openAssign(r) {
    D.list("collectors", "id,user_id,full_name", "full_name.asc")
      .then(function (cols) {
        if (!cols.length) {
          window.EcoWasteUI.toast("No collectors available yet.", "error");
          return;
        }
        var options = cols.map(function (c) {
          return { label: c.full_name, value: c.full_name + "|" + (c.user_id || "") };
        });
        return window.EcoWasteUI.openModal({
          title: "Assign Collector - " + r.report_number,
          submitLabel: "Assign",
          fields: [
            { name: "collector", label: "Collector", type: "select", required: true, options: options }
          ],
          onSubmit: function (values) {
            var parts = String(values.collector).split("|");
            return D.update("waste_reports", "id=eq." + r.id, {
              assigned_to_name: parts[0],
              assigned_to_id: parts[1] || null,
              status: "Assigned",
              assigned_at: new Date().toISOString()
            });
          }
        }).then(function () {
          window.EcoWasteUI.toast("Collector assigned.", "success");
          load();
        });
      })
      .catch(function (err) {
        if (err && err.message === "closed") return;
        window.EcoWasteUI.toast(err.message, "error");
      });
  }

  function openNote(r, mode) {
    var resolve = mode === "resolve";
    window.EcoWasteUI.openModal({
      title: (resolve ? "Resolve" : "Dismiss") + " - " + r.report_number,
      submitLabel: resolve ? "Resolve" : "Dismiss",
      fields: [
        { name: "note", label: resolve ? "Resolution note" : "Reason", type: "textarea", required: false, placeholder: resolve ? "Describe how the issue was handled..." : "Why is this report being dismissed?" }
      ],
      onSubmit: function (values) {
        return D.update("waste_reports", "id=eq." + r.id, {
          status: resolve ? "Resolved" : "Dismissed",
          resolution_note: values.note || null,
          resolved_at: new Date().toISOString()
        });
      }
    }).then(function () {
      window.EcoWasteUI.toast(resolve ? "Report resolved." : "Report dismissed.", "success");
      load();
    }).catch(function (err) {
      if (err && err.message === "closed") return;
      window.EcoWasteUI.toast(err.message, "error");
    });
  }

  var tbody = document.getElementById("report-tbody");
  if (tbody) {
    tbody.addEventListener("click", function (e) {
      var btn = e.target.closest("button[data-action]");
      if (!btn) return;
      var r = findReport(btn.getAttribute("data-id"));
      if (!r) return;
      var action = btn.getAttribute("data-action");
      if (action === "review") { patchReport(r, { status: "Under Review", reviewed_at: new Date().toISOString() }, "Report is now under review."); return; }
      if (action === "verify") { patchReport(r, { status: "Verified", verified_at: new Date().toISOString() }, "Report verified."); return; }
      if (action === "assign") { openAssign(r); return; }
      if (action === "resolve") { openNote(r, "resolve"); return; }
      if (action === "menu") {
        var items = [
          { label: "View Details", icon: "visibility", onClick: function () { openDetails(r); } }
        ];
        items.push("-");
        if (r.status === "Submitted") {
          items.push({ label: "Start Review", icon: "fact_check", onClick: function () { patchReport(r, { status: "Under Review", reviewed_at: new Date().toISOString() }, "Report is now under review."); } });
        }
        if (r.status === "Under Review" || r.status === "Submitted") {
          items.push({ label: "Mark Verified", icon: "verified", onClick: function () { patchReport(r, { status: "Verified", verified_at: new Date().toISOString() }, "Report verified."); } });
        }
        if (r.status === "Submitted" || r.status === "Under Review" || r.status === "Verified") {
          items.push({ label: "Assign Collector", icon: "assignment_ind", onClick: function () { openAssign(r); } });
        }
        if (r.status !== "Resolved" && r.status !== "Dismissed") {
          items.push({ label: "Mark Resolved", icon: "check_circle", onClick: function () { openNote(r, "resolve"); } });
          items.push({ label: "Dismiss", icon: "block", onClick: function () { openNote(r, "dismiss"); } });
        }
        if (r.status !== "Submitted") {
          items.push("-");
          items.push({ label: "Reset to Submitted", icon: "undo", onClick: function () { patchReport(r, {
            status: "Submitted",
            reviewed_at: null,
            verified_at: null,
            assigned_at: null,
            assigned_to_name: null,
            assigned_to_id: null,
            resolved_at: null,
            resolution_note: null
          }, "Report reset to Submitted."); } });
        }
        items.push("-");
        items.push({ label: "Delete", icon: "delete", danger: true, onClick: function () {
          window.EcoWasteUI.confirm({
            title: "Delete report?",
            message: "Remove " + r.report_number + "? This cannot be undone.",
            danger: true,
            confirmLabel: "Delete"
          }).then(function (ok) {
            if (ok) {
              D.remove("waste_reports", "id=eq." + r.id)
                .then(function () { window.EcoWasteUI.toast("Report deleted.", "success"); load(); })
                .catch(function (err) { window.EcoWasteUI.toast(err.message, "error"); });
            }
          });
        } });
        window.EcoWasteUI.menu(btn, items);
      }
    });
  }

  var searchEl = document.getElementById("report-search");
  var statusFilterEl = document.getElementById("report-status-filter");
  var typeFilterEl = document.getElementById("report-type-filter");
  if (searchEl) searchEl.addEventListener("input", function () { searchTerm = this.value; reportPage = 1; render(); });
  if (statusFilterEl) statusFilterEl.addEventListener("change", function () { statusFilter = this.value; reportPage = 1; render(); });
  if (typeFilterEl) typeFilterEl.addEventListener("change", function () { typeFilter = this.value; reportPage = 1; render(); });

  load().catch(function (err) {
    console.error("EcoWaste waste report data failed to load:", err);
  });
})();
</script>