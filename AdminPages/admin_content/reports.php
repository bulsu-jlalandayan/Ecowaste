<!-- Reports view - loaded via admin_app.php -->
<div class="mb-xl">
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-2">System Reports</h2>
<p class="font-body-md text-body-md text-on-surface-variant max-w-2xl">Generate comprehensive analyses of EcoWaste operations, resident engagement, and environmental metrics. Select a report type to configure and run your analysis.</p>
</div>
<!-- Bento Grid Layout for Report Generation Generators -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-lg mb-xl">
<!-- Report Generator Card 1: Collection Efficiency -->
<div class="bg-surface border border-outline-variant rounded-xl p-lg shadow-card hover:shadow-card-hover transition-shadow relative overflow-hidden group">
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
<div class="bg-surface border border-outline-variant rounded-xl p-lg shadow-card hover:shadow-card-hover transition-shadow relative overflow-hidden group">
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
<div class="bg-surface border border-outline-variant rounded-xl p-lg shadow-card hover:shadow-card-hover transition-shadow relative overflow-hidden group">
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
<option value="">Loading periods&hellip;</option>
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
<div class="bg-surface border border-outline-variant rounded-xl shadow-card overflow-hidden flex flex-col">
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
<div class="p-md border-t border-outline-variant bg-surface-container-lowest flex items-center justify-between">
<span id="reports-count" class="font-body-sm text-body-sm text-on-surface-variant">Showing 0 reports</span>
<div id="reports-pagination" class="flex gap-2"></div>
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

var allReports = [];
  var reportsPage = 1;
  var CO2_FACTOR = 0.94; // metric tons CO2e avoided per ton recycled (EPA-derived assumption)

  async function load() {
    allReports = await D.list("reports", "id,report_name,type,generated_at,generated_by", "generated_at.desc");
    populateEnvironmentPeriods();
    render();
  }

  function render() {
    var tbody = document.getElementById("reports-tbody");
    if (!tbody) return;
    var page = window.EcoWasteUI.paginate(allReports, reportsPage, 10);
    if (!page.rows.length) {
      tbody.innerHTML = '<tr><td class="py-2 px-4 text-on-surface-variant" colspan="5">No reports generated yet.</td></tr>';
    } else {
      tbody.innerHTML = "";
      page.rows.forEach(function (r) {
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
    var count = document.getElementById("reports-count");
    if (count) {
      count.textContent = page.total ? "Showing " + page.start + " to " + page.end + " of " + page.total + " reports" : "Showing 0 reports";
    }
    var nav = document.getElementById("reports-pagination");
    if (nav) {
      window.EcoWasteUI.paginateButtons(nav, { page: page.page, pages: page.pages, onPage: function (p) { reportsPage = p; render(); } });
    }
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
      parts.push(metric + " - " + selectValue("environment-period", ""));
    }
    return parts.join(" — ");
  }

  function rangeDays(range) {
    if (range === "Last Quarter") return 90;
    if (range === "Year to Date" || range === "Custom Range") return 365;
    return 30;
  }

  function withinDays(iso, days) {
    if (!iso) return false;
    var d = new Date(iso);
    if (isNaN(d.getTime())) return false;
    return (Date.now() - d.getTime()) <= days * 86400000;
  }

  function filterByPeriod(records, period) {
    var now = new Date();
    var start = null, end = null;
    if (period === "Last Quarter") start = now.getTime() - 90 * 86400000;
    else if (period === "Year to Date") start = new Date(now.getFullYear(), 0, 1).getTime();
    else if (period === "All Time") start = null;
    else if (period === "Last 30 Days") start = now.getTime() - 30 * 86400000;
    else {
      var y = parseInt(period, 10);
      if (!isNaN(y)) {
        start = new Date(y, 0, 1).getTime();
        end = new Date(y + 1, 0, 1).getTime();
      } else {
        start = now.getTime() - 30 * 86400000;
      }
    }
    return (records || []).filter(function (r) {
      var t = r.recorded_at ? new Date(r.recorded_at).getTime() : NaN;
      if (isNaN(t)) return false;
      if (start && t < start) return false;
      if (end && t >= end) return false;
      return true;
    });
  }

  async function populateEnvironmentPeriods() {
    var sel = document.getElementById("environment-period");
    if (!sel) return;
    var records;
    try {
      records = await D.list("recycling_records", "recorded_at");
    } catch (e) {
      records = [];
    }
    var years = [];
    (records || []).forEach(function (r) {
      var y = r.recorded_at ? new Date(r.recorded_at).getFullYear() : NaN;
      if (!isNaN(y) && years.indexOf(y) === -1) years.push(y);
    });
    years.sort(function (a, b) { return b - a; });
    var options = ["Last 30 Days", "Last Quarter", "Year to Date", "All Time"];
    years.forEach(function (y) { options.push(String(y)); });
    sel.innerHTML = "";
    options.forEach(function (label) {
      var opt = document.createElement("option");
      opt.value = label;
      opt.textContent = label;
      sel.appendChild(opt);
    });
    sel.value = "Last 30 Days";
  }

  function flatMetrics(metrics) {
    var out = [];
    Object.keys(metrics).forEach(function (k) {
      var v = metrics[k];
      if (v && typeof v === "object" && !Array.isArray(v)) {
        Object.keys(v).forEach(function (k2) { out.push({ metric: k + " — " + k2, value: v[k2] }); });
      } else {
        out.push({ metric: k, value: v });
      }
    });
    return out;
  }

  async function computeCollection() {
    var rangeLabel = selectValue("collection-range", "Last 30 Days");
    var zoneLabel = selectValue("collection-zone", "All Zones");
    var requests = await D.list("collection_requests",
      "id,request_number,location,zone,waste_type,status,requested_at,collector_name", "requested_at.desc");
    var windowEnd = Date.now();
    var windowStart = windowEnd - rangeDays(rangeLabel) * 86400000;
    requests = requests.filter(function (r) {
      var t = new Date(r.requested_at).getTime();
      return t >= windowStart && t <= windowEnd;
    });
    if (zoneLabel && zoneLabel !== "All Zones") {
      requests = requests.filter(function (r) {
        return String(r.zone || "").toLowerCase().indexOf(zoneLabel.toLowerCase()) > -1;
      });
    }
    var byStatus = {};
    var byZone = {};
    requests.forEach(function (r) {
      byStatus[r.status] = (byStatus[r.status] || 0) + 1;
      byZone[(r.zone || "Unzoned")] = (byZone[(r.zone || "Unzoned")] || 0) + 1;
    });
    var completed = byStatus["Completed"] || 0;
    var assigned = requests.filter(function (r) { return r.collector_name; }).length;
    return {
      range: rangeLabel,
      zone: zoneLabel,
      total_requests: requests.length,
      assigned: assigned,
      unassigned: byStatus["Unassigned"] || 0,
      completed: completed,
      completion_rate_pct: requests.length ? Math.round((completed / requests.length) * 1000) / 10 : 0,
      by_status: byStatus,
      by_zone: byZone
    };
  }

  async function computeParticipation() {
    var rangeLabel = selectValue("participation-range", "Last 30 Days");
    var segmentLabel = selectValue("participation-segment", "All Users");
    var profiles = await D.list("profiles", "id,full_name,email,role,status,created_at,last_active_at", "created_at.asc");
    var available = profiles.slice();
    if (segmentLabel === "New Signups (30d)") {
      available = available.filter(function (p) { return withinDays(p.created_at, 30); });
    } else if (segmentLabel === "Highly Active") {
      available = available.filter(function (p) { return withinDays(p.last_active_at, 7); });
    }
    var roles = { "resident": 0, "collector": 0, "admin": 0 };
    available.forEach(function (p) {
      if (roles[p.role] !== undefined) roles[p.role]++;
    });
    var newSignups = profiles.filter(function (p) { return withinDays(p.created_at, rangeDays(rangeLabel)); }).length;
    return {
      range: rangeLabel,
      segment: segmentLabel,
      total_users: available.length,
      total_accounts_ever: profiles.length,
      new_signups_in_range: newSignups,
      active_users: available.filter(function (p) { return p.status === "Active"; }).length,
      inactive_users: available.filter(function (p) { return p.status === "Inactive"; }).length,
      by_role: roles
    };
  }

  async function computeEnvironmental() {
    var periodLabel = selectValue("environment-period", "Last 30 Days");
    var metricLabel = selectValue("environment-metric", "Comprehensive");
    var records = await D.list("recycling_records", "weight_kg,recorded_at,material_type");
    var inPeriod = filterByPeriod(records, periodLabel);
    var st = D.computeWasteStats(inPeriod);
    var totalWaste = Math.round((st.totalKg / 1000) * 10) / 10;
    var recycled = Math.round((st.recycledKg / 1000) * 10) / 10;
    var diversionRate = totalWaste > 0 ? Math.round((recycled / totalWaste) * 1000) / 10 : 0;
    return {
      period: periodLabel,
      metric_focus: metricLabel,
      total_waste_tons: totalWaste,
      recycled_tons: recycled,
      diversion_rate_pct: diversionRate,
      co2_avoided_mt: Math.round(recycled * CO2_FACTOR * 10) / 10,
      recycling_records_kg: Math.round(st.totalKg),
      co2_factor_used_mt_per_ton: CO2_FACTOR
    };
  }

  function generate(type) {
    window.EcoWasteUI.confirm({
      title: "Generate " + type + " report?",
      message: reportName(type) + " will be computed from live data and downloaded.",
      confirmLabel: "Generate"
    }).then(function (ok) {
      if (!ok) return;
      var name = reportName(type) + " - " + new Date().toLocaleString();
      var compute = type === "Collection" ? computeCollection()
        : type === "Participation" ? computeParticipation()
        : computeEnvironmental();
      compute.then(function (metrics) {
        var stamp = new Date().toISOString().slice(0, 10);
        D.exportJSON("ecowaste_" + type.toLowerCase() + "_report_" + stamp + ".json", {
          report_name: name,
          type: type,
          generated_at: new Date().toISOString(),
          metrics: metrics
        });
        D.exportCSV("ecowaste_" + type.toLowerCase() + "_report_" + stamp + ".csv",
          ["metric", "value"], flatMetrics(metrics));
        var uid = D.currentUserId();
        var genBy = "Admin";
        var lookup = uid ? D.request("/rest/v1/profiles?select=full_name&id=eq." + uid)
          .then(function (profiles) { return profiles && profiles.length ? profiles[0].full_name : "Admin"; })
          .catch(function () { return "Admin"; }) : Promise.resolve("Admin");
        lookup.then(function (nameBy) {
          genBy = nameBy || "Admin";
          return D.add("reports", { report_name: name, type: type, generated_by: genBy });
        }).then(function () {
          window.EcoWasteUI.toast(type + " report generated and downloaded.", "success");
          load();
        }).catch(function (err) {
          window.EcoWasteUI.toast(err.message, "error");
        });
      }).catch(function (err) {
        window.EcoWasteUI.toast("Could not compute report: " + err.message, "error");
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

