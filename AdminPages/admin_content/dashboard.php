<!-- Dashboard view - loaded via admin_app.php -->
<div class="max-w-[1440px] mx-auto space-y-xl">
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-md">
<div>
<h2 class="font-display-lg text-display-lg text-on-background">Dashboard Overview</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-xs">Real-time metrics and operational status.</p>
</div>
<div class="flex gap-sm">
<button id="today-btn" class="flex items-center gap-2 bg-surface-container-high hover:bg-surface-container-highest text-on-surface px-4 py-2 rounded-lg font-title-md text-title-md transition-colors border border-outline-variant">
<span class="material-symbols-outlined text-sm" style="font-variation-settings: &quot;FILL&quot; 0;">calendar_today</span>
                            Today
                        </button>
<button id="export-report-btn" class="flex items-center gap-2 bg-primary hover:bg-surface-tint text-on-primary px-4 py-2 rounded-lg font-title-md text-title-md shadow-card transition-colors">
<span class="material-symbols-outlined text-sm">download</span>
                            Export Report
                        </button>
</div>
</div>
<!-- KPI Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-md">
<!-- Stat Card 1 -->
<div class="bg-surface border border-outline-variant rounded-xl p-lg shadow-card hover:shadow-card-hover transition-shadow relative overflow-hidden group">
<div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-6xl text-primary" style="font-variation-settings: &quot;FILL&quot; 1;">group</span>
</div>
<div class="flex items-center justify-between mb-md">
<span class="font-title-md text-title-md text-on-surface-variant">Total Users</span>
<span class="flex items-center text-primary font-label-md text-label-md bg-secondary-fixed px-2 py-1 rounded-full">
<span class="material-symbols-outlined text-xs mr-1">arrow_upward</span> <span id="kpi-users-change" class="font-label-md text-label-md text-primary">—</span>
                            </span>
</div>
<div id="total-users-value" class="font-display-lg text-display-lg text-on-surface">—</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-sm">Active this month</p>
</div>
<!-- Stat Card 2 -->
<div class="bg-surface border border-outline-variant rounded-xl p-lg shadow-card hover:shadow-card-hover transition-shadow relative overflow-hidden group">
<div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-6xl text-error" style="font-variation-settings: &quot;FILL&quot; 1;">local_shipping</span>
</div>
<div class="flex items-center justify-between mb-md">
<span class="font-title-md text-title-md text-on-surface-variant">Active Requests</span>
<span class="flex items-center text-error font-label-md text-label-md bg-error-container px-2 py-1 rounded-full">
<span class="material-symbols-outlined text-xs mr-1">arrow_upward</span> <span id="kpi-requests-change" class="font-label-md text-label-md text-error">—</span>
                            </span>
</div>
<div id="active-requests-value" class="font-display-lg text-display-lg text-on-surface">—</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-sm">Pending processing</p>
</div>
<!-- Stat Card 3 -->
<div class="bg-surface border border-outline-variant rounded-xl p-lg shadow-card hover:shadow-card-hover transition-shadow relative overflow-hidden group">
<div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-6xl text-secondary" style="font-variation-settings: &quot;FILL&quot; 1;">assignment</span>
</div>
<div class="flex items-center justify-between mb-md">
<span class="font-title-md text-title-md text-on-surface-variant">Pending Assignments</span>
<span class="flex items-center text-on-surface-variant font-label-md text-label-md bg-surface-variant px-2 py-1 rounded-full">
<span class="material-symbols-outlined text-xs mr-1">horizontal_rule</span> <span id="kpi-pending-change" class="font-label-md text-label-md text-on-surface-variant">—</span>
                            </span>
</div>
<div id="pending-assignments-value" class="font-display-lg text-display-lg text-on-surface">—</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-sm">Awaiting dispatch</p>
</div>
<!-- Stat Card 4 -->
<div class="bg-surface border border-outline-variant rounded-xl p-lg shadow-card hover:shadow-card-hover transition-shadow relative overflow-hidden group">
<div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-6xl text-primary-container" style="font-variation-settings: &quot;FILL&quot; 1;">recycling</span>
</div>
<div class="flex items-center justify-between mb-md">
<span class="font-title-md text-title-md text-on-surface-variant">Recycling Rate</span>
<span class="flex items-center text-primary font-label-md text-label-md bg-secondary-fixed px-2 py-1 rounded-full">
<span class="material-symbols-outlined text-xs mr-1">arrow_upward</span> <span id="kpi-rate-change" class="font-label-md text-label-md text-primary">—</span>
                            </span>
</div>
<div id="recycling-rate-value" class="font-display-lg text-display-lg text-on-surface">—</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-sm">Avg across zones</p>
</div>
</div>
<!-- Middle Section: Charts & Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-md">
<!-- Volume Chart -->
<div class="lg:col-span-2 bg-surface border border-outline-variant rounded-xl p-lg shadow-card">
<div class="flex justify-between items-center mb-lg">
<h3 class="font-title-lg text-title-lg text-on-surface">Monthly Collection Volume</h3>
<button class="text-on-surface-variant hover:text-primary transition-colors">
<span class="material-symbols-outlined">more_vert</span>
</button>
</div>
<!-- Decorative Chart Area -->
<div class="relative h-64 w-full bg-surface-container-low rounded-lg overflow-hidden border border-outline-variant"><canvas id="weeklyVolumeChart" class="w-full h-full"></canvas><div id="volume-chart-empty" class="absolute inset-0 items-center justify-center font-body-md text-body-md text-on-surface-variant" style="display:none;">No collection data available yet.</div></div>
<div class="flex justify-center gap-md mt-sm">
<div class="flex items-center gap-xs"><div class="w-3 h-3 rounded-full bg-primary"></div><span class="font-label-md text-label-md text-on-surface-variant">Total Waste</span></div>
<div class="flex items-center gap-xs"><div class="w-3 h-3 rounded-full bg-secondary"></div><span class="font-label-md text-label-md text-on-surface-variant">Recycled</span></div>
</div>
</div>
<!-- Distribution Chart & Quick Actions -->
<div class="flex flex-col gap-md">
<!-- Doughnut -->
<div class="flex-1 bg-surface border border-outline-variant rounded-xl p-lg shadow-card flex flex-col">
<h3 class="font-title-lg text-title-lg text-on-surface mb-md">Waste Distribution</h3>
<div class="flex-1 flex items-center justify-center relative"><svg class="w-40 h-40 transform -rotate-90" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="transparent" stroke="#7b7487" stroke-width="12" stroke-dasharray="251.3" stroke-dashoffset="0"></circle><circle id="dist-total-arc" cx="50" cy="50" r="40" fill="transparent" stroke="#630ed4" stroke-width="12" stroke-dasharray="251.3" stroke-dashoffset="0"></circle><circle id="dist-recycled-arc" cx="50" cy="50" r="40" fill="transparent" stroke="#4648d4" stroke-width="12" stroke-dasharray="251.3" stroke-dashoffset="251.3"></circle></svg><div class="absolute flex flex-col items-center justify-center"><span id="dist-total-label" class="font-display-lg text-headline-lg font-bold text-on-surface">—</span><span class="text-[10px] uppercase tracking-wider text-on-surface-variant font-bold">Recycled</span></div></div>
<div class="mt-md space-y-sm">
<div class="flex justify-between items-center"><div class="flex items-center gap-sm"><div class="w-3 h-3 rounded bg-primary"></div><span class="font-body-sm text-body-sm">Total Waste</span></div><span id="dist-total-pct" class="font-mono-md text-mono-md">—</span></div>
<div class="flex justify-between items-center"><div class="flex items-center gap-sm"><div class="w-3 h-3 rounded bg-secondary"></div><span class="font-body-sm text-body-sm">Recycled</span></div><span id="dist-recycled-pct" class="font-mono-md text-mono-md">—</span></div>
<div class="flex justify-between items-center"><div class="flex items-center gap-sm"><div class="w-3 h-3 rounded bg-outline"></div><span class="font-body-sm text-body-sm">Not Recycled</span></div><span id="dist-sink-pct" class="font-mono-md text-mono-md">—</span></div>
</div>
</div>
<!-- Quick Actions -->
<div class="bg-primary-container border border-outline-variant rounded-xl p-md shadow-card">
<h3 class="font-title-md text-title-md text-on-primary-container mb-sm">Quick Actions</h3>
<div class="flex flex-col gap-sm">
<button data-view="collection_request" class="w-full flex items-center justify-start gap-md bg-surface text-primary px-4 py-3 rounded-lg font-title-md text-title-md hover:bg-surface-container-high transition-colors shadow-card">
<span class="material-symbols-outlined text-sm">person_add</span>
                                    Assign Collector
                                </button>
<button data-view="reports" class="w-full flex items-center justify-start gap-md bg-surface text-primary px-4 py-3 rounded-lg font-title-md text-title-md hover:bg-surface-container-high transition-colors shadow-card">
<span class="material-symbols-outlined text-sm">note_add</span>
                                    New Report
                                </button>
<button data-view="users" class="w-full flex items-center justify-start gap-md bg-surface text-primary px-4 py-3 rounded-lg font-title-md text-title-md hover:bg-surface-container-high transition-colors shadow-card">
<span class="material-symbols-outlined text-sm">group_add</span>
                                    Add User
                                </button>
</div>
</div>
</div>
</div>
<!-- Recent Activity Table -->
<div class="bg-surface border border-outline-variant rounded-xl shadow-card overflow-hidden">
<div class="px-lg py-md border-b border-outline-variant flex justify-between items-center bg-surface-container-lowest">
<h3 class="font-title-lg text-title-lg text-on-surface">Recent Collection Activities</h3>
<button class="text-primary font-label-md text-label-md hover:underline" data-view="collection_request">View All</button>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low border-b border-outline-variant">
<th class="py-sm px-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">ID</th>
<th class="py-sm px-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Location</th>
<th class="py-sm px-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Type</th>
<th class="py-sm px-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Collector</th>
<th class="py-sm px-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Time</th>
<th class="py-sm px-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider text-right">Status</th>
</tr>
</thead>
<tbody id="recent-activity-tbody" class="font-body-md text-body-md divide-y divide-outline-variant">
<tr><td class="py-3 px-lg text-on-surface-variant" colspan="6">Loading recent activities&hellip;</td></tr>
</tbody>
</table>
</div>
<div class="px-lg py-sm border-t border-outline-variant bg-surface-container-lowest flex justify-between items-center text-sm text-on-surface-variant">
<span id="recent-activity-count">Showing 0 entries</span>
<div id="recent-activity-nav" class="flex gap-2"></div>
</div>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  if (!D || !localStorage.getItem("sb-access-token")) return;
  var UI = window.EcoWasteUI;

  var STATUS_BADGE = {
    "Unassigned": "bg-error-container text-on-error-container",
    "Scheduled": "bg-secondary-fixed text-primary",
    "In Transit": "bg-surface-tint/10 text-surface-tint",
    "Completed": "bg-status-success text-status-success-text"
  };

  function setText(id, value) {
    var el = document.getElementById(id);
    if (el) el.textContent = value;
  }

  var todayOnly = false;
  var allRequests = [];
  var activityPage = 1;
  var state = {
    totalUsers: 0,
    activeRequests: 0,
    pending: 0,
    rate: 0,
    totalTons: 0,
    recycledTons: 0
  };
  var volumeChart = null;
  var refreshing = false;

  function monthKey(iso) {
    var d = iso ? new Date(iso) : new Date();
    if (isNaN(d.getTime())) return null;
    return d.getFullYear() + "-" + d.getMonth();
  }

  function isToday(iso) {
    if (!iso) return false;
    var d = new Date(iso);
    if (isNaN(d.getTime())) return false;
    var now = new Date();
    return d.getFullYear() === now.getFullYear() && d.getMonth() === now.getMonth() && d.getDate() === now.getDate();
  }

  function bindDashboardControls() {
    var todayBtn = document.getElementById("today-btn");
    if (todayBtn) {
      todayBtn.addEventListener("click", function () {
        todayOnly = !todayOnly;
        activityPage = 1;
        todayBtn.classList.toggle("bg-primary", todayOnly);
        todayBtn.classList.toggle("text-on-primary", todayOnly);
        todayBtn.classList.toggle("border-tertiary-fixed-dim", todayOnly);
        var icon = todayBtn.querySelector(".material-symbols-outlined");
        if (icon) icon.classList.toggle("filled", todayOnly);
        renderActivity(getVisibleRequests());
      });
    }

    var exportBtn = document.getElementById("export-report-btn");
    if (exportBtn) {
      exportBtn.addEventListener("click", function () {
        var rows = allRequests.slice(0, 50).map(function (r) {
          return {
            request_number: r.request_number,
            location: r.location,
            zone: r.zone || "",
            waste_type: r.waste_type,
            status: r.status,
            collector_name: r.collector_name || "",
            requested_at: D.fmtDate(r.requested_at)
          };
        });
        var kpis = [
          { metric: "Total Users", value: state.totalUsers },
          { metric: "Active Requests", value: state.activeRequests },
          { metric: "Pending Assignments", value: state.pending },
          { metric: "Recycling Rate (%)", value: state.rate },
          { metric: "Total Waste (Tons)", value: state.totalTons },
          { metric: "Recycled (Tons)", value: state.recycledTons }
        ];
        D.exportCSV("ecowaste_dashboard_report.csv", ["request_number", "location", "zone", "waste_type", "status", "collector_name", "requested_at"], rows);
        D.exportJSON("ecowaste_dashboard_kpis.json", { generated_at: new Date().toISOString(), kpis: kpis });
      });
    }
  }

  function getVisibleRequests() {
    if (!todayOnly) return allRequests;
    return allRequests.filter(function (r) { return isToday(r.requested_at); });
  }

  async function refreshAll() {
    var totalUsers = await D.count("profiles");
    var activeRequests = await D.count("collection_requests", "status=neq.Completed");
    var pending = await D.count("collection_requests", "status=eq.Unassigned");

    var parents = await Promise.all([
      D.list("recycling_records", "weight_kg,recorded_at,material_type"),
      D.list("profiles", "created_at")
    ]);
    var stats = D.computeWasteStats(parents[0] || []);
    var profiles = parents[1] || [];

    state.totalUsers = totalUsers;
    state.activeRequests = activeRequests;
    state.pending = pending;
    state.rate = stats.rate;
    state.totalTons = Math.round((stats.totalKg / 1000) * 10) / 10;
    state.recycledTons = Math.round((stats.recycledKg / 1000) * 10) / 10;

    setText("total-users-value", D.fmtNum(totalUsers));
    setText("active-requests-value", D.fmtNum(activeRequests));
    setText("pending-assignments-value", D.fmtNum(pending));
    setText("recycling-rate-value", stats.rate.toFixed(1) + "%");

    allRequests = await D.list("collection_requests",
      "request_number,location,zone,waste_type,status,requested_at,collector_name",
      "requested_at.desc");

    renderKpiChanges(stats, profiles, allRequests);
    renderDistribution(stats);
    renderVolumeChart(stats.months);
    renderActivity(getVisibleRequests());
  }

  function load() {
    return refreshAll();
  }

  function scheduleRefresh() {
    if (window.__ecoDashRefresh) clearInterval(window.__ecoDashRefresh);
    window.__ecoDashRefresh = setInterval(function () {
      if (refreshing) return;
      refreshing = true;
      refreshAll().catch(function (err) {
        console.error("EcoWaste dashboard auto-refresh failed:", err);
      }).finally(function () {
        refreshing = false;
      });
    }, 60000);
  }

  function renderKpiChanges(stats, profiles, requests) {
    function setChange(id, value, upGood) {
      var el = document.getElementById(id);
      if (!el) return;
      var num = Number(value) || 0;
      var arrow = num > 0 ? "arrow_upward" : num < 0 ? "arrow_downward" : "horizontal_rule";
      var text = (num > 0 ? "+" : "") + num.toFixed(1) + "%";
      el.textContent = text;
      var icon = el.previousElementSibling;
      if (icon && icon.classList.contains("material-symbols-outlined")) icon.textContent = arrow;
      var cls = "font-label-md ";
      if (num === 0) cls += "text-on-surface-variant";
      else if (num > 0) cls += upGood ? "text-primary" : "text-error";
      else cls += upGood ? "text-error" : "text-primary";
      el.className = cls;
    }

    var now = new Date();
    var nowKey = now.getFullYear() + "-" + now.getMonth();
    var prevDate = new Date(now.getFullYear(), now.getMonth() - 1, 1);
    var prevKey = prevDate.getFullYear() + "-" + prevDate.getMonth();
    var newThisMonth = 0, newLastMonth = 0;
    (profiles || []).forEach(function (p) {
      var k = monthKey(p.created_at);
      if (k === nowKey) newThisMonth++;
      else if (k === prevKey) newLastMonth++;
    });
    var userChange = newLastMonth > 0
      ? ((newThisMonth - newLastMonth) / newLastMonth) * 100
      : (newThisMonth > 0 ? 100 : 0);

    var created30 = 0;
    var windowStart = Date.now() - 30 * 86400000;
    (requests || []).forEach(function (r) {
      var t = new Date(r.requested_at).getTime();
      if (!isNaN(t) && t >= windowStart) created30++;
    });
    var req30Pct = state.activeRequests > 0 ? (created30 / state.activeRequests) * 100 : 0;

    var rateChange = 0;
    var months = (stats && stats.months) || [];
    if (months.length >= 2) {
      var last = months[months.length - 1];
      var prev = months[months.length - 2];
      var lr = last.totalKg > 0 ? (last.recycledKg / last.totalKg) * 100 : 0;
      var pr = prev.totalKg > 0 ? (prev.recycledKg / prev.totalKg) * 100 : 0;
      rateChange = pr > 0 ? lr - pr : 0;
    }

    setChange("kpi-users-change", userChange, true);
    setChange("kpi-requests-change", req30Pct, true);
    setChange("kpi-pending-change", 0, false);
    setChange("kpi-rate-change", rateChange, true);
  }

  function renderDistribution(stats) {
    var hasData = stats.totalKg > 0;
    var recycledPct = hasData ? stats.rate : 0;
    var sinkPct = Math.max(0, 100 - recycledPct);
    var totalLabel = document.getElementById("dist-total-label");
    if (totalLabel) totalLabel.textContent = hasData ? Math.round(recycledPct) + "%" : "—";
    var tp = document.getElementById("dist-total-pct");
    if (tp) tp.textContent = hasData ? "100%" : "—";
    var rp = document.getElementById("dist-recycled-pct");
    if (rp) rp.textContent = hasData ? recycledPct.toFixed(1) + "%" : "—";
    var sp = document.getElementById("dist-sink-pct");
    if (sp) sp.textContent = hasData ? sinkPct.toFixed(1) + "%" : "—";
    var arc = document.getElementById("dist-recycled-arc");
    if (arc) {
      var circumference = 251.3;
      if (hasData) {
        var offset = circumference * (1 - recycledPct / 100);
        arc.setAttribute("stroke-dasharray", circumference.toFixed(1));
        arc.setAttribute("stroke-dashoffset", offset.toFixed(1));
      } else {
        arc.setAttribute("stroke-dasharray", circumference.toFixed(1));
        arc.setAttribute("stroke-dashoffset", circumference.toFixed(1));
      }
    }
  }

  function renderVolumeChart(months) {
    var canvas = document.getElementById("weeklyVolumeChart");
    if (!canvas) return;
    var emptyEl = document.getElementById("volume-chart-empty");
    if (typeof Chart === "undefined") {
      if (emptyEl) {
        emptyEl.textContent = "Chart library failed to load. Check your connection.";
        emptyEl.style.display = "flex";
      }
      return;
    }
    if (emptyEl) emptyEl.style.display = months.length ? "none" : "flex";
    if (volumeChart) {
      volumeChart.destroy();
      volumeChart = null;
    }
    if (!months.length) return;
    var labels = months.map(function (m) { return m.label; });
    var totalData = months.map(function (m) { return m.totalTons; });
    var recycledData = months.map(function (m) { return m.recycledTons; });
    var ctx = canvas.getContext("2d");
    var gradTotal = ctx.createLinearGradient(0, 0, 0, 260);
    gradTotal.addColorStop(0, "rgba(99, 14, 212, 0.2)");
    gradTotal.addColorStop(1, "rgba(99, 14, 212, 0)");
    var gradRecycled = ctx.createLinearGradient(0, 0, 0, 260);
    gradRecycled.addColorStop(0, "rgba(70, 72, 212, 0.2)");
    gradRecycled.addColorStop(1, "rgba(70, 72, 212, 0)");
    volumeChart = new Chart(ctx, {
      type: "line",
      data: {
        labels: labels,
        datasets: [
          {
            label: "Total Waste (Tons)",
            data: totalData,
            borderColor: "#630ed4",
            backgroundColor: gradTotal,
            borderWidth: 2,
            fill: true,
            tension: 0.4,
            pointRadius: 0,
            pointHoverRadius: 6
          },
          {
            label: "Recycled (Tons)",
            data: recycledData,
            borderColor: "#4648d4",
            backgroundColor: gradRecycled,
            borderWidth: 2,
            fill: true,
            tension: 0.4,
            pointRadius: 0,
            pointHoverRadius: 6
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false },
          tooltip: {
            mode: "index",
            intersect: false,
            backgroundColor: "rgba(28, 27, 29, 0.9)",
            titleFont: { size: 13, family: "'Hanken Grotesk', sans-serif" },
            bodyFont: { size: 14, family: "'Hanken Grotesk', sans-serif" },
            padding: 12,
            cornerRadius: 4
          }
        },
        scales: {
          x: { grid: { display: false } },
          y: { beginAtZero: true, border: { display: false } }
        },
        interaction: { mode: "nearest", axis: "x", intersect: false }
      }
    });
  }

  function renderActivity(rows) {
    var tbody = document.getElementById("recent-activity-tbody");
    if (!tbody) return;
    var page = UI.paginate(rows, activityPage, 5);
    if (!page.rows.length) {
      tbody.innerHTML = '<tr><td class="py-3 px-lg text-on-surface-variant" colspan="6">No collection activities yet.</td></tr>';
    } else {
      tbody.innerHTML = "";
      page.rows.forEach(function (r) {
        var name = r.collector_name || "Unassigned";
        var initials = D.esc(D.initials(name));
        var badge = STATUS_BADGE[r.status] || "bg-surface-variant text-on-surface-variant";
        var tr = document.createElement("tr");
        tr.className = "hover:bg-surface-container-lowest transition-colors group";
        tr.innerHTML =
          '<td class="py-3 px-lg font-mono-md text-mono-md text-on-surface-variant group-hover:text-primary transition-colors">#' +
            D.esc(r.request_number) + '</td>' +
          '<td class="py-3 px-lg text-on-surface">' + D.esc(r.location) + '</td>' +
          '<td class="py-3 px-lg text-on-surface">' + D.esc(r.waste_type) + '</td>' +
          '<td class="py-3 px-lg flex items-center gap-sm">' +
            '<div class="w-6 h-6 rounded-full bg-secondary-fixed text-primary flex items-center justify-center font-bold text-xs">' + initials + '</div>' +
            D.esc(name) + '</td>' +
          '<td class="py-3 px-lg text-on-surface-variant">' + D.esc(D.fmtDate(r.requested_at)) + '</td>' +
          '<td class="py-3 px-lg text-right">' +
            '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-label-md text-label-md ' + badge + '">' +
            D.esc(r.status) + '</span>' +
          '</td>';
        tbody.appendChild(tr);
      });
    }
    var count = document.getElementById("recent-activity-count");
    if (count) {
      count.textContent = page.total ? "Showing " + page.start + " to " + page.end + " of " + page.total + " entries" :
        "Showing 0 entries";
    }
    var nav = document.getElementById("recent-activity-nav");
    if (nav) {
      UI.paginateButtons(nav, { page: page.page, pages: page.pages, onPage: function (p) { activityPage = p; renderActivity(getVisibleRequests()); } });
    }
  }

bindDashboardControls();
  load().catch(function (err) {
    console.error("EcoWaste dashboard data failed to load:", err);
    setText("total-users-value", "—");
    setText("active-requests-value", "—");
    setText("pending-assignments-value", "—");
    setText("recycling-rate-value", "—");
    var tbody = document.getElementById("recent-activity-tbody");
    if (tbody) tbody.innerHTML = '<tr><td class="py-3 px-lg text-on-surface-variant" colspan="6">Unable to load dashboard data.</td></tr>';
    if (UI && UI.toast) UI.toast("Could not load dashboard data.", "error");
  });
  scheduleRefresh();
})();
</script>

