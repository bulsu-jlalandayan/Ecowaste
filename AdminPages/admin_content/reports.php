<!-- Reports view - loaded via admin_app.php -->
<div class="mb-xl">
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-2">System Reports</h2>
<p class="font-body-md text-body-md text-on-surface-variant max-w-2xl">Generate comprehensive analyses of EcoWaste operations, resident engagement, and environmental metrics. Select a report type to configure and run your analysis.</p>
</div>
<!-- Bento Grid Layout for Report Generation Generators -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-lg mb-xl">
<!-- Report Generator Card 1: Collection Efficiency -->
<div class="bg-surface border border-outline-variant rounded-xl p-lg shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
<div class="absolute -right-6 -top-6 w-32 h-32 bg-primary-fixed rounded-full opacity-20 group-hover:scale-150 transition-transform duration-500"></div>
<div class="relative z-10">
<div class="w-12 h-12 rounded-lg bg-primary-container text-on-primary-container flex items-center justify-center mb-4">
<span class="material-symbols-outlined" data-icon="route">route</span>
</div>
<h3 class="font-title-lg text-title-lg text-on-surface mb-2">Collection Efficiency</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-6 h-10">Analyze route completion times, vehicle utilization, and collector performance metrics.</p>
<div class="space-y-4 mb-6">
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-1">Date Range</label>
<select id="collection-range" class="w-full bg-surface-container-lowest border border-outline-variant rounded-md px-3 py-2 font-body-sm text-body-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none">
<option>Last 30 Days</option>
<option>Last Quarter</option>
<option>Year to Date</option>
</select>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-1">Zone Filter</label>
<select id="collection-zone" class="w-full bg-surface-container-lowest border border-outline-variant rounded-md px-3 py-2 font-body-sm text-body-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none">
<option>All Zones</option>
<option>North District</option>
<option>South District</option>
</select>
</div>
</div>
<button data-gen="Collection" class="w-full bg-primary text-on-primary font-label-md text-label-md py-2 px-4 rounded-md hover:bg-primary-container hover:text-on-primary-container transition-colors flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm" data-icon="play_arrow">play_arrow</span>
                            Generate Report
                        </button>
</div>
</div>
<!-- Report Generator Card 2: Resident Participation -->
<div class="bg-surface border border-outline-variant rounded-xl p-lg shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
<div class="absolute -right-6 -top-6 w-32 h-32 bg-secondary-fixed rounded-full opacity-30 group-hover:scale-150 transition-transform duration-500"></div>
<div class="relative z-10">
<div class="w-12 h-12 rounded-lg bg-secondary-container text-on-secondary-container flex items-center justify-center mb-4">
<span class="material-symbols-outlined" data-icon="diversity_3">diversity_3</span>
</div>
<h3 class="font-title-lg text-title-lg text-on-surface mb-2">Resident Participation</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-6 h-10">Evaluate user onboarding rates, app engagement, and sorting accuracy statistics.</p>
<div class="space-y-4 mb-6">
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-1">Date Range</label>
<select id="participation-range" class="w-full bg-surface-container-lowest border border-outline-variant rounded-md px-3 py-2 font-body-sm text-body-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none">
<option>Last 30 Days</option>
<option>Last Quarter</option>
<option>Custom Range</option>
</select>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-1">User Segment</label>
<select id="participation-segment" class="w-full bg-surface-container-lowest border border-outline-variant rounded-md px-3 py-2 font-body-sm text-body-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none">
<option>All Users</option>
<option>New Signups (30d)</option>
<option>Highly Active</option>
</select>
</div>
</div>
<button data-gen="Participation" class="w-full bg-primary text-on-primary font-label-md text-label-md py-2 px-4 rounded-md hover:bg-primary-container hover:text-on-primary-container transition-colors flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm" data-icon="play_arrow">play_arrow</span>
                            Generate Report
                        </button>
</div>
</div>
<!-- Report Generator Card 3: Environmental Impact -->
<div class="bg-surface border border-outline-variant rounded-xl p-lg shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
<div class="absolute -right-6 -top-6 w-32 h-32 bg-primary-fixed-dim rounded-full opacity-30 group-hover:scale-150 transition-transform duration-500"></div>
<div class="relative z-10">
<div class="w-12 h-12 rounded-lg bg-surface-tint text-on-primary flex items-center justify-center mb-4">
<span class="material-symbols-outlined" data-icon="eco">eco</span>
</div>
<h3 class="font-title-lg text-title-lg text-on-surface mb-2">Environmental Impact</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-6 h-10">Quantify CO2 emissions saved, landfill diversion rates, and recycling purity.</p>
<div class="space-y-4 mb-6">
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-1">Reporting Period</label>
<select id="environment-period" class="w-full bg-surface-container-lowest border border-outline-variant rounded-md px-3 py-2 font-body-sm text-body-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none">
<option>2023 Annual</option>
<option>Q3 2023</option>
<option>Q2 2023</option>
</select>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-1">Metric Focus</label>
<select id="environment-metric" class="w-full bg-surface-container-lowest border border-outline-variant rounded-md px-3 py-2 font-body-sm text-body-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none">
<option>Comprehensive</option>
<option>Carbon Footprint</option>
<option>Landfill Diversion</option>
</select>
</div>
</div>
<button data-gen="Environmental" class="w-full bg-primary text-on-primary font-label-md text-label-md py-2 px-4 rounded-md hover:bg-primary-container hover:text-on-primary-container transition-colors flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm" data-icon="play_arrow">play_arrow</span>
                            Generate Report
                        </button>
</div>
</div>
</div>
<!-- Recently Generated Reports Table -->
<div class="bg-surface border border-outline-variant rounded-xl shadow-sm overflow-hidden flex flex-col">
<div class="p-4 border-b border-outline-variant flex justify-between items-center bg-surface-container-lowest">
<h3 class="font-title-lg text-title-lg text-on-surface">Recently Generated Reports</h3>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container text-on-surface-variant font-label-md text-label-md border-b border-outline-variant">
<th class="py-3 px-4 font-semibold">Report Name</th>
<th class="py-3 px-4 font-semibold">Type</th>
<th class="py-3 px-4 font-semibold">Date Generated</th>
<th class="py-3 px-4 font-semibold">Generated By</th>
<th class="py-3 px-4 font-semibold text-right">Actions</th>
</tr>
</thead>
<tbody id="reports-tbody" class="font-body-sm text-body-sm text-on-surface">
</tbody>
</table>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var TYPE_BADGE = {
    "Collection": "bg-primary-fixed text-on-primary-fixed-variant",
    "Participation": "bg-secondary-fixed text-on-secondary-fixed",
    "Environmental": "bg-surface-variant text-on-surface-variant"
  };
  var TYPE_LABEL = {
    "Collection": "Collection",
    "Participation": "Participation",
    "Environmental": "Environmental"
  };

  async function load() {
    var rows = await D.list("reports", "id,report_name,type,generated_at,generated_by", "generated_at.desc");
    render(rows);
  }

  function render(rows) {
    var tbody = document.getElementById("reports-tbody");
    if (!tbody) return;
    if (!rows.length) {
      tbody.innerHTML = '<tr><td class="py-2 px-4 text-on-surface-variant" colspan="5">No reports generated yet.</td></tr>';
      return;
    }
    tbody.innerHTML = "";
    rows.forEach(function (r) {
      var badge = TYPE_BADGE[r.type] || "bg-surface-variant text-on-surface-variant";
      var tr = document.createElement("tr");
      tr.className = "border-b border-outline-variant hover:bg-surface-container-lowest transition-colors group";
      tr.innerHTML =
        '<td class="py-2 px-4 flex items-center gap-2">' +
          '<span class="material-symbols-outlined text-primary text-base">description</span>' +
          '<span class="font-medium">' + D.esc(r.report_name) + '</span></td>' +
        '<td class="py-2 px-4"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium ' + badge + '">' + D.esc(TYPE_LABEL[r.type] || r.type) + '</span></td>' +
        '<td class="py-2 px-4 text-on-surface-variant">' + D.esc(D.fmtDate(r.generated_at)) + '</td>' +
        '<td class="py-2 px-4">' + D.esc(r.generated_by || "—") + '</td>' +
        '<td class="py-2 px-4 text-right">' +
          '<button class="p-1.5 text-on-surface-variant hover:text-error hover:bg-surface-container-highest rounded-md transition-colors" data-action="delete" data-id="' + r.id + '" title="Delete report"><span class="material-symbols-outlined text-sm">delete</span></button>' +
        '</td>';
      tbody.appendChild(tr);
    });
  }

  function selectValue(id, fallback) {
    var el = document.getElementById(id);
    return el ? el.value : fallback;
  }

  function reportName(type) {
    var parts = [];
    if (type === "Collection") {
      parts.push("Collection Efficiency");
      var zone = selectValue("collection-zone", "");
      parts.push(zone && zone !== "All Zones" ? zone : selectValue("collection-range", "Last 30 Days"));
    } else if (type === "Participation") {
      parts.push("Resident Participation");
      parts.push(selectValue("participation-segment", "All Users") + " - " + selectValue("participation-range", "Last 30 Days"));
    } else {
      parts.push("Environmental Impact");
      var metric = selectValue("environment-metric", "Comprehensive");
      parts.push(metric + " - " + selectValue("environment-period", "2023 Annual"));
    }
    return parts.join(" — ");
  }

  function generate(type) {
    window.EcoWasteUI.confirm({
      title: "Generate " + type + " report?",
      message: reportName(type) + " will be added to the report list.",
      confirmLabel: "Generate"
    }).then(function (ok) {
      if (!ok) return;
      var uid = D.currentUserId();
      var maybeName = Promise.resolve("");
      if (uid) {
        maybeName = D.request("/rest/v1/profiles?select=full_name&id=eq." + uid)
          .then(function (profiles) {
            return profiles && profiles.length ? profiles[0].full_name : "";
          })
          .catch(function () { return ""; });
      }
      maybeName.then(function (genBy) {
        return D.add("reports", {
          report_name: reportName(type) + " - " + new Date().toLocaleString(),
          type: type,
          generated_by: genBy || "Admin"
        });
      }).then(function () {
        window.EcoWasteUI.toast(type + " report generated.", "success");
        load();
      }).catch(function (err) {
        window.EcoWasteUI.toast(err.message, "error");
      });
    });
  }

  var genButtons = document.querySelectorAll("[data-gen]");
  genButtons.forEach(function (btn) {
    btn.addEventListener("click", function () {
      generate(btn.getAttribute("data-gen"));
    });
  });

  var tbody = document.getElementById("reports-tbody");
  if (tbody) {
    tbody.addEventListener("click", function (e) {
      var btn = e.target.closest("button[data-action]");
      if (!btn) return;
      window.EcoWasteUI.confirm({
        title: "Delete report?",
        message: "Remove this report from the list? This cannot be undone.",
        danger: true,
        confirmLabel: "Delete"
      }).then(function (ok) {
        if (!ok) return;
        D.remove("reports", "id=eq." + btn.getAttribute("data-id"))
          .then(function () { window.EcoWasteUI.toast("Report deleted.", "success"); load(); })
          .catch(function (err) { window.EcoWasteUI.toast(err.message, "error"); });
      });
    });
  }

  load().catch(function (err) {
    console.error("EcoWaste reports failed to load:", err);
  });
})();
</script>
