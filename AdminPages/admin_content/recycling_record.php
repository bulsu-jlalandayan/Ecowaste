<!-- Recycling Records view - loaded via admin_app.php -->
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center justify-between mb-xl gap-md">
<div>
<h2 class="font-display-lg text-display-lg text-on-surface">Recycling Records</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">Manage and track processed materials across facilities.</p>
</div>
<div class="flex gap-md">
<button id="add-record-btn" class="bg-primary text-on-primary font-label-md text-label-md px-lg py-2 rounded flex items-center gap-2 hover:bg-secondary transition-colors shadow-sm">
<span class="material-symbols-outlined text-[18px]" data-icon="add">add</span>
                        Manual Log
                    </button>
</div>
</div>
<!-- Bento Grid Layout -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-lg mb-lg">
<!-- Summary Card - Total Recycled -->
<div class="lg:col-span-4 bg-surface-container-lowest border border-surface-variant rounded-xl p-lg shadow-[0_1px_3px_rgba(0,0,0,0.05)] relative overflow-hidden group hover:shadow-[0_4px_12px_rgba(0,0,0,0.05)] transition-shadow">
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
<span class="bg-[#e6f4ea] text-[#137333] px-2 py-1 rounded font-label-md text-label-md flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]" data-icon="arrow_upward">arrow_upward</span>
                                12.5%
                            </span>
<span class="font-body-sm text-body-sm text-on-surface-variant">vs last month</span>
</div>
</div>
</div>
<!-- Material Breakdown (Placeholder for charts/stats) -->
<div class="lg:col-span-8 bg-surface-container-lowest border border-surface-variant rounded-xl p-lg shadow-[0_1px_3px_rgba(0,0,0,0.05)] flex flex-col justify-center">
<h3 class="font-title-md text-title-md text-on-surface-variant mb-lg">Material Breakdown</h3>
<div class="flex flex-wrap gap-md justify-between items-end h-full">
<div class="flex-1 min-w-[100px]">
<div class="flex justify-between font-label-md text-label-md mb-2">
<span class="text-on-surface">Plastic</span>
<span id="plastic-value" class="text-on-surface-variant">—</span>
</div>
<div class="w-full bg-surface-variant h-2 rounded-full overflow-hidden">
<div id="plastic-bar" class="bg-primary h-full w-[0%] rounded-full"></div>
</div>
</div>
<div class="flex-1 min-w-[100px]">
<div class="flex justify-between font-label-md text-label-md mb-2">
<span class="text-on-surface">Paper</span>
<span id="paper-value" class="text-on-surface-variant">—</span>
</div>
<div class="w-full bg-surface-variant h-2 rounded-full overflow-hidden">
<div id="paper-bar" class="bg-secondary h-full w-[0%] rounded-full"></div>
</div>
</div>
<div class="flex-1 min-w-[100px]">
<div class="flex justify-between font-label-md text-label-md mb-2">
<span class="text-on-surface">Metal</span>
<span id="metal-value" class="text-on-surface-variant">—</span>
</div>
<div class="w-full bg-surface-variant h-2 rounded-full overflow-hidden">
<div id="metal-bar" class="bg-tertiary h-full w-[0%] rounded-full"></div>
</div>
</div>
<div class="flex-1 min-w-[100px]">
<div class="flex justify-between font-label-md text-label-md mb-2">
<span class="text-on-surface">Glass</span>
<span id="glass-value" class="text-on-surface-variant">—</span>
</div>
<div class="w-full bg-surface-variant h-2 rounded-full overflow-hidden">
<div id="glass-bar" class="bg-outline h-full w-[0%] rounded-full"></div>
</div>
</div>
</div>
</div>
</div>
<!-- Data Table Section -->
<div class="bg-surface-container-lowest border border-surface-variant rounded-xl shadow-[0_1px_3px_rgba(0,0,0,0.05)] overflow-hidden flex flex-col">
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
<div class="relative">
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
<div class="flex items-center gap-sm text-on-surface-variant font-body-sm text-body-sm">
<span id="record-count">Showing 0 logs</span>
</div>
</div>
<!-- Table Container -->
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse min-w-[800px]">
<thead>
<tr class="bg-[#f1f5f9] border-b border-surface-variant">
<th class="py-3 px-md font-label-md text-label-md text-on-surface-variant font-semibold sticky top-0 bg-[#f1f5f9]">Log ID</th>
<th class="py-3 px-md font-label-md text-label-md text-on-surface-variant font-semibold sticky top-0 bg-[#f1f5f9]">Date &amp; Time</th>
<th class="py-3 px-md font-label-md text-label-md text-on-surface-variant font-semibold sticky top-0 bg-[#f1f5f9]">Material Type</th>
<th class="py-3 px-md font-label-md text-label-md text-on-surface-variant font-semibold sticky top-0 bg-[#f1f5f9]">Weight (kg)</th>
<th class="py-3 px-md font-label-md text-label-md text-on-surface-variant font-semibold sticky top-0 bg-[#f1f5f9]">Facility Name</th>
<th class="py-3 px-md font-label-md text-label-md text-on-surface-variant font-semibold sticky top-0 bg-[#f1f5f9]">Status</th>
<th class="py-3 px-md font-label-md text-label-md text-on-surface-variant font-semibold sticky top-0 bg-[#f1f5f9] text-right">Actions</th>
</tr>
</thead>
<tbody id="record-tbody" class="font-body-md text-body-md text-on-surface">
</tbody>
</table>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var STATUS_BADGE = {
    "Verified": "bg-[#e6f4ea] text-[#137333] border border-[#ceead6]",
    "Pending Audit": "bg-[#fef7e0] text-[#b06000] border border-[#fde293]",
    "Discrepancy": "bg-[#fce8e6] text-[#c5221f] border border-[#fad2cf]"
  };

  var MATERIAL_ICON = {
    plastic: "water_bottle",
    paper: "description",
    metal: "build",
    glass: "local_drink"
  };
  var MATERIAL_BAR_CLASS = {
    plastic: "bg-primary",
    paper: "bg-secondary",
    metal: "bg-tertiary",
    glass: "bg-outline"
  };

  function materialGroup(material) {
    var m = String(material || "").toLowerCase();
    if (m.indexOf("plastic") > -1) return "plastic";
    if (m.indexOf("paper") > -1) return "paper";
    if (m.indexOf("metal") > -1) return "metal";
    if (m.indexOf("glass") > -1) return "glass";
    return "other";
  }

  function fmtWeight(kg) {
    if (kg >= 1000) return (kg / 1000).toFixed(1) + "k kg";
    return Math.round(kg) + " kg";
  }

  function applyBar(id, pct) {
    var el = document.getElementById(id);
    if (el) el.style.width = Math.max(pct, 3).toFixed(1) + "%";
  }

  var allRecords = [];
  var searchTerm = "";
  var materialFilter = "";
  var facilityFilter = "";

  async function load() {
    allRecords = await D.list("recycling_records",
      "id,log_number,recorded_at,material_type,weight_kg,facility,status",
      "recorded_at.desc");
    render();
  }

  function render() {
    var rows = window.EcoWasteUI.filterList(allRecords, searchTerm,
      ["material_type", "facility", "log_number"],
      { facility: facilityFilter });
    if (materialFilter) {
      rows = rows.filter(function (r) { return materialGroup(r.material_type) === materialFilter; });
    }

    var totals = { plastic: 0, paper: 0, metal: 0, glass: 0, other: 0 };
    var grand = 0;
    rows.forEach(function (r) {
      var w = Number(r.weight_kg) || 0;
      totals[materialGroup(r.material_type)] += w;
      grand += w;
    });

    var totalEl = document.getElementById("total-recycled-value");
    if (totalEl) totalEl.textContent = D.fmtNum(grand);

    var fourBench = totals.plastic + totals.paper + totals.metal + totals.glass;
    ["plastic", "paper", "metal", "glass"].forEach(function (key) {
      var valueEl = document.getElementById(key + "-value");
      if (valueEl) valueEl.textContent = fmtWeight(totals[key]);
      var pct = fourBench > 0 ? (totals[key] / fourBench) * 100 : 0;
      applyBar(key + "-bar", pct);
    });

    var tbody = document.getElementById("record-tbody");
    if (!tbody) return;
    if (!rows.length) {
      tbody.innerHTML = '<tr><td class="py-2 px-md text-on-surface-variant" colspan="7">No recycling records found.</td></tr>';
      return;
    }
    tbody.innerHTML = "";
    rows.forEach(function (r) {
      var group = materialGroup(r.material_type);
      var icon = MATERIAL_ICON[group] || "recycling";
      var boxClass = MATERIAL_BAR_CLASS[group] || "bg-surface-variant";
      var iconColor = group === "metal" ? "text-tertiary" : group === "glass" ? "text-on-surface-variant" : group === "paper" ? "text-secondary" : "text-primary";
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
    var count = document.getElementById("record-count");
    if (count) count.textContent = "Showing 1-" + rows.length + " of " + rows.length + " logs";
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
  if (searchEl) searchEl.addEventListener("input", function () { searchTerm = this.value; render(); });
  if (materialFilterEl) materialFilterEl.addEventListener("change", function () { materialFilter = this.value; render(); });
  if (facilityFilterEl) facilityFilterEl.addEventListener("change", function () { facilityFilter = this.value; render(); });

  var addBtn = document.getElementById("add-record-btn");
  if (addBtn) addBtn.addEventListener("click", openAdd);

  load().catch(function (err) {
    console.error("EcoWaste recycling records failed to load:", err);
  });
})();
</script>
