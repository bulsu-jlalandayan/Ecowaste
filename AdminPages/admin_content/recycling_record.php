<!-- Recycling Records view - loaded via admin_app.php -->
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center justify-between mb-xl gap-md">
<div>
<h2 class="font-display-lg text-display-lg text-on-surface">Recycling Records</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">Manage and track processed materials across facilities.</p>
</div>
<div class="flex gap-md">
<button id="export-records-btn" class="bg-surface-container-lowest text-on-surface border border-outline-variant font-label-md text-label-md px-lg py-2 rounded flex items-center gap-2 hover:bg-surface-container-highest transition-colors shadow-sm">
<span class="material-symbols-outlined text-[18px]" data-icon="download">download</span>
                        Export
                    </button>
<button id="add-record-btn" class="bg-primary text-on-primary font-label-md text-label-md px-lg py-2 rounded flex items-center gap-2 hover:bg-secondary transition-colors shadow-sm">
<span class="material-symbols-outlined text-[18px]" data-icon="add">add</span>
                        Manual Log
                    </button>
</div>
</div>
<!-- Bento Grid Layout -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-lg mb-lg">
<!-- Summary Card - Total Recycled -->
<div class="lg:col-span-4 bg-surface-container-lowest border border-surface-variant rounded-xl p-lg shadow-card relative overflow-hidden group hover:shadow-card-hover transition-shadow">
<div class="absolute top-0 right-0 p-lg opacity-10 group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-8xl text-primary" data-icon="recycling">recycling</span>
</div>
<div class="relative z-10">
<h3 class="font-title-md text-title-md text-on-surface-variant mb-2">Total Recycled This Month</h3>
<div class="flex items-end gap-3 mb-4">
<span id="total-recycled-value" class="font-display-lg text-display-lg text-primary tracking-tight">—</span>
<span class="font-body-lg text-body-lg text-on-surface-variant mb-1">kg</span>
</div>
<div class="flex items-center gap-2">
<span id="monthly-delta-chip" class="bg-status-onroute text-status-onroute-text px-2 py-1 rounded font-label-md text-label-md flex items-center gap-1">
<span id="monthly-delta-arrow" class="material-symbols-outlined text-[14px]" data-icon="arrow_upward">arrow_upward</span>
<span id="monthly-delta-value">—</span>
</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">vs last month</span>
</div>
</div>
</div>
<!-- Material Breakdown (Placeholder for charts/stats) -->
<div class="lg:col-span-8 bg-surface-container-lowest border border-surface-variant rounded-xl p-lg shadow-card flex flex-col justify-center">
<h3 class="font-title-md text-title-md text-on-surface-variant mb-lg">Material Breakdown</h3>
<div id="material-breakdown" class="flex flex-wrap gap-md justify-between items-end h-full"></div>
</div>
</div>
<!-- Data Table Section -->
<div class="bg-surface-container-lowest border border-surface-variant rounded-xl shadow-card overflow-hidden flex flex-col">
<!-- Table Toolbar -->
<div class="p-md border-b border-surface-variant flex flex-col sm:flex-row justify-between items-center gap-md bg-surface">
<div class="flex items-center gap-md w-full sm:w-auto flex-wrap">
<div class="relative w-full sm:w-56">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[18px]" data-icon="search">search</span>
<input id="record-search" class="w-full pl-10 pr-3 py-1.5 bg-surface-container-lowest border border-outline-variant rounded font-body-sm text-body-sm text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary" placeholder="Search logs..." type="text"/>
</div>
<select id="record-material-filter" class="pl-4 pr-8 py-1.5 bg-surface-container-lowest border border-outline-variant rounded font-body-sm text-body-sm text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary appearance-none cursor-pointer">
<option value="">All Materials</option>
<option value="plastic">Plastic</option>
<option value="paper">Paper</option>
<option value="metal">Metal</option>
<option value="glass">Glass</option>
</select>
<div class="relative w-full sm:w-52">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[18px]" data-icon="filter_list">filter_list</span>
<select id="record-facility-filter" class="w-full sm:w-52 pl-10 pr-8 py-1.5 bg-surface-container-lowest border border-outline-variant rounded font-body-sm text-body-sm text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary appearance-none cursor-pointer">
<option value="">All Facilities</option>
<option value="North Processing Hub">North Processing Hub</option>
<option value="South Sorting Center">South Sorting Center</option>
<option value="East Industrial Depot">East Industrial Depot</option>
<option value="West Collection Point">West Collection Point</option>
</select>
</div>
</div>
</div>
<!-- Table Container -->
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse min-w-[800px]">
<thead>
<tr class="bg-status-tableheader border-b border-surface-variant">
<th class="py-3 px-md font-label-md text-label-md text-on-surface-variant font-semibold sticky top-0 bg-status-tableheader">Log ID</th>
<th class="py-3 px-md font-label-md text-label-md text-on-surface-variant font-semibold sticky top-0 bg-status-tableheader">Date &amp; Time</th>
<th class="py-3 px-md font-label-md text-label-md text-on-surface-variant font-semibold sticky top-0 bg-status-tableheader">Material Type</th>
<th class="py-3 px-md font-label-md text-label-md text-on-surface-variant font-semibold sticky top-0 bg-status-tableheader">Weight (kg)</th>
<th class="py-3 px-md font-label-md text-label-md text-on-surface-variant font-semibold sticky top-0 bg-status-tableheader">Facility Name</th>
<th class="py-3 px-md font-label-md text-label-md text-on-surface-variant font-semibold sticky top-0 bg-status-tableheader">Status</th>
<th class="py-3 px-md font-label-md text-label-md text-on-surface-variant font-semibold sticky top-0 bg-status-tableheader text-right">Actions</th>
</tr>
</thead>
<tbody id="record-tbody" class="font-body-md text-body-md text-on-surface">
</tbody>
</table>
</div>
<div class="p-md border-t border-surface-variant bg-surface flex items-center justify-between">
<span id="record-count" class="font-body-sm text-body-sm text-on-surface-variant">Showing 0 logs</span>
<div id="record-pagination" class="flex gap-2"></div>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var STATUS_BADGE = {
    "Verified": "bg-status-onroute text-status-onroute-text border border-status-onroute-border",
    "Pending Audit": "bg-status-pending text-status-pending-text border border-status-pending-border",
    "Discrepancy": "bg-status-error-soft text-status-error-soft-text border border-status-error-soft-border"
  };

var MATERIAL_ICON = {
    plastic: "water_bottle",
    paper: "description",
    metal: "build",
    glass: "local_drink",
    ewaste: "devices",
    bulky: "weekend",
    household: "delete_sweep",
    organic: "eco",
    general: "delete"
  };
  var MATERIAL_BOX_CLASS = {
    plastic: "bg-primary",
    paper: "bg-secondary",
    metal: "bg-tertiary",
    glass: "bg-outline",
    ewaste: "bg-error",
    bulky: "bg-tertiary-container",
    household: "bg-surface-variant",
    organic: "bg-status-success",
    general: "bg-surface-container-high"
  };
  var MATERIAL_ICON_CLASS = {
    plastic: "text-on-primary",
    paper: "text-on-secondary",
    metal: "text-on-tertiary",
    glass: "text-white",
    ewaste: "text-on-error",
    bulky: "text-on-tertiary-container",
    household: "text-on-surface-variant",
    organic: "text-status-success-text",
    general: "text-on-surface-variant",
    other: "text-primary"
  };
  var GROUP_LABEL = {
    plastic: "Plastic",
    paper: "Paper",
    metal: "Metal",
    glass: "Glass",
    ewaste: "E-Waste",
    bulky: "Bulky",
    household: "Household",
    organic: "Organic",
    general: "General",
    other: "Other"
  };
  var MATERIAL_TEXT_CLASS = {
    plastic: "text-primary",
    paper: "text-secondary",
    metal: "text-tertiary",
    glass: "text-outline",
    ewaste: "text-error",
    bulky: "text-tertiary-container",
    household: "text-on-surface-variant",
    organic: "text-status-success-text",
    general: "text-on-surface-variant",
    other: "text-primary"
  };

  function materialGroup(material) {
    var m = String(material || "").toLowerCase();
    if (/plastic|pet|hdpe/i.test(m)) return "plastic";
    if (/paper|cardboard|carton|pulp/i.test(m)) return "paper";
    if (/metals?|alumini?um|steel|iron|copper|scrap/i.test(m)) return "metal";
    if (/glass/i.test(m)) return "glass";
    if (/e-?\s*waste|batteri|electronic|hazard|tox|chem/i.test(m)) return "ewaste";
    if (/organic|compost|food waste|green waste|yard waste|biodegrad/i.test(m)) return "organic";
    if (/bulk|furniture|appliance/i.test(m)) return "bulky";
    if (/household|general|mixed|municipal|domestic/i.test(m)) return "household";
    return "other";
  }

  function fmtWeight(kg) {
    if (kg >= 1000) return (kg / 1000).toFixed(1) + "k kg";
    return Math.round(kg) + " kg";
  }

function renderSummary(allRecords) {
    var now = new Date();
    var curYear = now.getFullYear();
    var curMonth = now.getMonth();
    var prevStart = new Date(curYear, curMonth - 1, 1);

    var totalThisMonth = 0;
    var totalLastMonth = 0;
    var monthKg = {};
    var allGroups = [];

    (allRecords || []).forEach(function (r) {
      var w = Number(r.weight_kg) || 0;
      if (!(w > 0)) return;
      var d = r.recorded_at ? new Date(r.recorded_at) : null;
      if (!d || isNaN(d.getTime())) return;
      if (d.getTime() > now.getTime()) return;

      var g = materialGroup(r.material_type);
      if (allGroups.indexOf(g) === -1) allGroups.push(g);

      if (d.getFullYear() === curYear && d.getMonth() === curMonth) {
        totalThisMonth += w;
        monthKg[g] = (monthKg[g] || 0) + w;
      } else if (d.getFullYear() === prevStart.getFullYear() && d.getMonth() === prevStart.getMonth()) {
        totalLastMonth += w;
      }
    });

    var totalEl = document.getElementById("total-recycled-value");
    if (totalEl) totalEl.textContent = D.fmtNum(totalThisMonth);

    var delta = totalLastMonth > 0
      ? ((totalThisMonth - totalLastMonth) / totalLastMonth) * 100
      : (totalThisMonth > 0 ? 100 : 0);
    var up = delta >= 0;
    var deltaChip = document.getElementById("monthly-delta-chip");
    var deltaArrow = document.getElementById("monthly-delta-arrow");
    var deltaValue = document.getElementById("monthly-delta-value");
    if (deltaValue) deltaValue.textContent = Math.abs(delta).toFixed(1) + "%";
    if (deltaArrow) deltaArrow.textContent = up ? "arrow_upward" : "arrow_downward";
    if (deltaChip) {
      deltaChip.className = "px-2 py-1 rounded font-label-md text-label-md flex items-center gap-1 " +
        (up ? "bg-status-onroute text-status-onroute-text" : "bg-status-error-soft text-status-error-soft-text");
    }

    renderBreakdown(allGroups, monthKg, totalThisMonth);
  }

  function renderBreakdown(groups, monthKg, totalThisMonth) {
    var container = document.getElementById("material-breakdown");
    if (!container) return;
    container.innerHTML = "";

    if (!groups.length) {
      container.innerHTML = '<div class="w-full font-body-md text-body-md text-on-surface-variant">No recycling data yet.</div>';
      return;
    }

    groups.slice().sort(function (a, b) {
      return (monthKg[b] || 0) - (monthKg[a] || 0);
    }).forEach(function (g, idx) {
      var kg = monthKg[g] || 0;
      var pct = totalThisMonth > 0 ? (kg / totalThisMonth) * 100 : 0;
      var icon = MATERIAL_ICON[g] || "recycling";
      var barColor = MATERIAL_BOX_CLASS[g] || "bg-primary";
      var textClass = MATERIAL_TEXT_CLASS[g] || "text-primary";
      var label = GROUP_LABEL[g] || D.esc(g);
      var wrap = document.createElement("div");
      wrap.className = "flex-1 min-w-[100px]";
      wrap.innerHTML =
        '<div class="flex justify-between font-label-md text-label-md mb-2">' +
          '<span class="flex items-center gap-1 text-on-surface">' +
          '<span class="material-symbols-outlined text-[14px] ' + textClass + '">' + icon + '</span>' +
            label + '</span>' +
          '<span class="text-on-surface-variant">' + fmtWeight(kg) + '</span>' +
        '</div>' +
        '<div class="w-full bg-surface-variant h-2 rounded-full overflow-hidden">' +
          '<div class="' + barColor + ' h-full rounded-full" style="width:' + pct.toFixed(1) + '%"></div>' +
        '</div>';
      container.appendChild(wrap);
    });
  }

var allRecords = [];
  var searchTerm = "";
  var materialFilter = "";
  var facilityFilter = "";
  var recordPage = 1;

  async function load() {
    allRecords = await D.list("recycling_records",
      "id,log_number,recorded_at,material_type,weight_kg,facility,status",
      "recorded_at.desc");
    render();
  }

  function filtered() {
    var rows = window.EcoWasteUI.filterList(allRecords, searchTerm,
      ["material_type", "facility", "log_number"],
      { facility: facilityFilter });
    if (materialFilter) {
      rows = rows.filter(function (r) { return materialGroup(r.material_type) === materialFilter; });
    }
    return rows;
  }

  function render() {
    var allRows = filtered();
    var page = window.EcoWasteUI.paginate(allRows, recordPage, 10);

    renderSummary(allRecords);

    var tbody = document.getElementById("record-tbody");
    if (!tbody) return;
    if (!page.rows.length) {
      tbody.innerHTML = '<tr><td class="py-2 px-md text-on-surface-variant" colspan="7">No recycling records found.</td></tr>';
    } else {
      tbody.innerHTML = "";
      page.rows.forEach(function (r) {
        var group = materialGroup(r.material_type);
        var icon = MATERIAL_ICON[group] || "recycling";
        var boxClass = MATERIAL_BOX_CLASS[group] || "bg-surface-variant";
        var iconColor = MATERIAL_ICON_CLASS[group] || "text-primary";
        var badge = STATUS_BADGE[r.status] || "bg-surface-variant text-on-surface-variant";
        var tr = document.createElement("tr");
        tr.className = "border-b border-surface-variant hover:bg-surface-container-low transition-colors group";
        tr.innerHTML =
          '<td class="py-2 px-md font-mono-md text-primary">#' + D.esc(r.log_number) + '</td>' +
          '<td class="py-2 px-md text-on-surface-variant">' + D.esc(D.fmtDate(r.recorded_at)) + '</td>' +
          '<td class="py-2 px-md"><div class="flex items-center gap-2">' +
            '<div class="w-6 h-6 rounded flex items-center justify-center ' + boxClass + ' ' + iconColor + '">' +
            '<span class="material-symbols-outlined text-[14px]">' + icon + '</span></div>' +
            D.esc(r.material_type) + '</div></td>' +
          '<td class="py-2 px-md font-semibold">' + D.esc(D.fmtNum(r.weight_kg)) + '</td>' +
          '<td class="py-2 px-md text-on-surface-variant">' + D.esc(r.facility || "—") + '</td>' +
          '<td class="py-2 px-md"><span class="px-2 py-1 rounded font-label-md text-label-md ' + badge + '">' + D.esc(r.status) + '</span></td>' +
          '<td class="py-2 px-md text-right">' +
            '<button class="text-on-surface-variant hover:text-primary transition-colors p-1 rounded hover:bg-surface-container" data-action="menu" data-id="' + r.id + '"><span class="material-symbols-outlined text-[20px]">more_vert</span></button>' +
          '</td>';
        tbody.appendChild(tr);
      });
    }
    var count = document.getElementById("record-count");
    if (count) {
      count.textContent = page.total ? "Showing " + page.start + "-" + page.end + " of " + page.total + " logs" : "Showing 0 logs";
    }
    var nav = document.getElementById("record-pagination");
    if (nav) {
      window.EcoWasteUI.paginateButtons(nav, { page: page.page, pages: page.pages, onPage: function (p) { recordPage = p; render(); } });
    }
  }

  var exportBtn = document.getElementById("export-records-btn");
  if (exportBtn) {
    exportBtn.addEventListener("click", function () {
      var rows = filtered().map(function (r) {
        return {
          log_number: r.log_number,
          recorded_at: D.fmtDate(r.recorded_at),
          material_type: r.material_type,
          weight_kg: r.weight_kg,
          facility: r.facility || "",
          status: r.status
        };
      });
      D.exportCSV("ecowaste_recycling_records.csv", ["log_number", "recorded_at", "material_type", "weight_kg", "facility", "status"], rows);
    });
  }

  function findRecord(id) {
    for (var i = 0; i < allRecords.length; i++) {
      if (allRecords[i].id === id) return allRecords[i];
    }
    return null;
  }

  function openAdd() {
    window.EcoWasteUI.openModal({
      title: "Manual Log Entry",
      submitLabel: "Add Record",
      fields: [
        { name: "material_type", label: "Material Type", required: true, placeholder: "e.g. PET Plastic" },
        { name: "weight_kg", label: "Weight (kg)", type: "number", required: true, placeholder: "e.g. 150.5" },
        { name: "facility", label: "Facility", required: true, placeholder: "e.g. North Processing Hub" },
        { name: "status", label: "Status", type: "select", required: true, value: "Verified",
          options: [
            { label: "Verified", value: "Verified" },
            { label: "Pending Audit", value: "Pending Audit" },
            { label: "Discrepancy", value: "Discrepancy" }
          ] }
      ],
      onSubmit: function (values) {
        var w = parseFloat(values.weight_kg);
        if (isNaN(w) || w <= 0) throw new Error("Weight must be a number greater than 0.");
        return D.add("recycling_records", {
          log_number: "LOG-" + String(Date.now()).slice(-6),
          material_type: values.material_type,
          weight_kg: w,
          facility: values.facility,
          status: values.status
        });
      }
    }).then(function () {
      window.EcoWasteUI.toast("Record added.", "success");
      load();
    }).catch(function (err) {
      if (err && err.message === "closed") return;
      window.EcoWasteUI.toast(err.message, "error");
    });
  }

  function openEdit(r) {
    window.EcoWasteUI.openModal({
      title: "Edit Record - #" + r.log_number,
      submitLabel: "Save Changes",
      fields: [
        { name: "material_type", label: "Material Type", required: true, value: r.material_type },
        { name: "weight_kg", label: "Weight (kg)", type: "number", required: true, value: String(r.weight_kg) },
        { name: "facility", label: "Facility", required: true, value: r.facility || "" },
        { name: "status", label: "Status", type: "select", required: true, value: r.status,
          options: [
            { label: "Verified", value: "Verified" },
            { label: "Pending Audit", value: "Pending Audit" },
            { label: "Discrepancy", value: "Discrepancy" }
          ] }
      ],
      onSubmit: function (values) {
        var w = parseFloat(values.weight_kg);
        if (isNaN(w) || w <= 0) throw new Error("Weight must be a number greater than 0.");
        return D.update("recycling_records", "id=eq." + r.id, {
          material_type: values.material_type,
          weight_kg: w,
          facility: values.facility,
          status: values.status
        });
      }
    }).then(function () {
      window.EcoWasteUI.toast("Record updated.", "success");
      load();
    }).catch(function (err) {
      if (err && err.message === "closed") return;
      window.EcoWasteUI.toast(err.message, "error");
    });
  }

  function deleteRecord(r) {
    window.EcoWasteUI.confirm({
      title: "Delete record?",
      message: "Remove log #" + r.log_number + "? This cannot be undone.",
      danger: true,
      confirmLabel: "Delete"
    }).then(function (ok) {
      if (!ok) return;
      D.remove("recycling_records", "id=eq." + r.id)
        .then(function () { window.EcoWasteUI.toast("Record deleted.", "success"); load(); })
        .catch(function (err) { window.EcoWasteUI.toast(err.message, "error"); });
    });
  }

  var tbody = document.getElementById("record-tbody");
  if (tbody) {
    tbody.addEventListener("click", function (e) {
      var btn = e.target.closest("button[data-action]");
      if (!btn) return;
      var r = findRecord(btn.getAttribute("data-id"));
      if (!r) return;
      window.EcoWasteUI.menu(btn, [
        { label: "Edit", icon: "edit", onClick: function () { openEdit(r); } },
        "-",
        { label: "Mark Verified", icon: "verified", onClick: function () {
          D.update("recycling_records", "id=eq." + r.id, { status: "Verified" })
            .then(function () { window.EcoWasteUI.toast("Record marked verified.", "success"); load(); })
            .catch(function (err) { window.EcoWasteUI.toast(err.message, "error"); });
        } },
        { label: "Flag Discrepancy", icon: "warning", danger: true, onClick: function () {
          D.update("recycling_records", "id=eq." + r.id, { status: "Discrepancy" })
            .then(function () { window.EcoWasteUI.toast("Record flagged for review.", "success"); load(); })
            .catch(function (err) { window.EcoWasteUI.toast(err.message, "error"); });
        } },
        "-",
        { label: "Delete", icon: "delete", danger: true, onClick: function () { deleteRecord(r); } }
      ]);
    });
  }

  var searchEl = document.getElementById("record-search");
  var materialFilterEl = document.getElementById("record-material-filter");
  var facilityFilterEl = document.getElementById("record-facility-filter");
if (searchEl) searchEl.addEventListener("input", function () { searchTerm = this.value; recordPage = 1; render(); });
  if (materialFilterEl) materialFilterEl.addEventListener("change", function () { materialFilter = this.value; recordPage = 1; render(); });
  if (facilityFilterEl) facilityFilterEl.addEventListener("change", function () { facilityFilter = this.value; recordPage = 1; render(); });

  var addBtn = document.getElementById("add-record-btn");
  if (addBtn) addBtn.addEventListener("click", openAdd);

load().catch(function (err) {
    console.error("EcoWaste recycling records failed to load:", err);
    var totalEl = document.getElementById("total-recycled-value");
    if (totalEl) totalEl.textContent = "—";
    var deltaValue = document.getElementById("monthly-delta-value");
    if (deltaValue) deltaValue.textContent = "—";
    var breakdown = document.getElementById("material-breakdown");
    if (breakdown) breakdown.innerHTML = '<div class="w-full font-body-md text-body-md text-on-surface-variant">Could not load recycling data.</div>';
    if (window.EcoWasteUI && window.EcoWasteUI.toast) window.EcoWasteUI.toast("Could not load recycling records.", "error");
  });
})();
</script>


