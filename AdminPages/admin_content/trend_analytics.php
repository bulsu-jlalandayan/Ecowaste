<!-- Trends & Analytics view - loaded via admin_app.php -->
<!-- Header Section -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-md mb-xl">
<div>
<h1 class="font-display-lg text-display-lg text-on-surface">Trends &amp; Analytics</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant mt-xs">Comprehensive overview of waste generation and recycling efficiency.</p>
</div>
<div class="flex gap-sm">
<select id="trend-year-filter" class="bg-surface-container-lowest border border-outline-variant rounded-DEFAULT px-lg py-sm text-primary font-label-md text-label-md hover:bg-surface-container-low transition-colors shadow-sm focus:outline-none focus:border-primary cursor-pointer">
<option value="all">All Years</option>
</select>
<button id="export-trends-btn" class="flex items-center gap-sm px-lg py-sm bg-primary text-on-primary rounded-DEFAULT font-label-md text-label-md hover:bg-primary/90 transition-colors shadow-sm">
<span class="material-symbols-outlined text-sm">download</span>
                        Export Data
                    </button>
</div>
</div>
<!-- Metrics Overview (Bento Grid) -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-lg mb-xl">
<!-- Card 1 -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-card relative overflow-hidden group">
<div class="absolute -right-8 -top-8 w-32 h-32 bg-primary-container/20 rounded-full blur-2xl group-hover:bg-primary-container/30 transition-colors"></div>
<div class="flex justify-between items-start mb-md relative z-10">
<div>
<p class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Total Waste Collected</p>
<h2 class="font-headline-lg text-headline-lg text-on-surface mt-xs"><span id="total-waste-value">—</span> <span class="font-title-md text-title-md text-on-surface-variant">Tons</span></h2>
</div>
<div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined">delete_sweep</span>
</div>
</div>
<div class="flex items-center gap-xs relative z-10">
<span class="flex items-center font-label-md text-label-md text-error bg-error-container/50 px-xs py-0.5 rounded-sm">
<span class="material-symbols-outlined text-[14px]">arrow_upward</span>
                            <span id="waste-delta">—</span>
                        </span>
<span class="font-body-sm text-body-sm text-on-surface-variant">vs last year</span>
</div>
</div>
<!-- Card 2 -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-card relative overflow-hidden group">
<div class="absolute -right-8 -top-8 w-32 h-32 bg-secondary-container/20 rounded-full blur-2xl group-hover:bg-secondary-container/30 transition-colors"></div>
<div class="flex justify-between items-start mb-md relative z-10">
<div>
<p class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Recycling Rate</p>
<h2 class="font-headline-lg text-headline-lg text-on-surface mt-xs"><span id="recycling-rate-value">—</span> <span class="font-title-md text-title-md text-on-surface-variant">%</span></h2>
</div>
<div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-secondary">
<span class="material-symbols-outlined">recycling</span>
</div>
</div>
<div class="flex items-center gap-xs relative z-10">
<span class="flex items-center font-label-md text-label-md text-status-success-text bg-status-success/50 px-xs py-0.5 rounded-sm">
<span class="material-symbols-outlined text-[14px]">arrow_upward</span>
                            <span id="rate-delta">—</span>
                        </span>
<span class="font-body-sm text-body-sm text-on-surface-variant">vs last year</span>
</div>
<!-- Mini Progress Bar -->
<div class="w-full h-1.5 bg-surface-container-highest rounded-full mt-md overflow-hidden">
<div id="recycling-progress" class="h-full bg-secondary w-[0%] rounded-full"></div>
</div>
</div>
<!-- Card 3 -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-card relative overflow-hidden group">
<div class="absolute -right-8 -top-8 w-32 h-32 bg-tertiary-container/20 rounded-full blur-2xl group-hover:bg-tertiary-container/30 transition-colors"></div>
<div class="flex justify-between items-start mb-md relative z-10">
<div>
<p class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">CO2 Emissions Avoided</p>
<h2 class="font-headline-lg text-headline-lg text-on-surface mt-xs"><span id="co2-value">—</span> <span class="font-title-md text-title-md text-on-surface-variant">MT</span></h2>
</div>
<div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined">co2</span>
</div>
</div>
<div class="flex items-center gap-xs relative z-10">
<span class="flex items-center font-label-md text-label-md text-status-success-text bg-status-success/50 px-xs py-0.5 rounded-sm">
<span class="material-symbols-outlined text-[14px]">arrow_upward</span>
                            <span id="co2-delta">—</span>
                        </span>
<span class="font-body-sm text-body-sm text-on-surface-variant">vs last year</span>
</div>
</div>
</div>
<!-- Charts Section (Main Bento Area) -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-lg mb-xl">
<!-- Main Area Chart: Volume Over Time -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl shadow-card flex flex-col lg:col-span-2 overflow-hidden">
<div class="p-lg border-b border-surface-container-highest flex justify-between items-center bg-status-tableheader/30">
<div>
<h3 class="font-title-lg text-title-lg text-on-surface">Waste Volume vs Recycled</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-xs">Monthly tracking (Tons)</p>
</div>
<div class="flex gap-sm">
<div class="flex items-center gap-xs">
<div class="w-3 h-3 rounded-full bg-primary"></div>
<span class="font-label-md text-label-md text-on-surface-variant">Total Waste</span>
</div>
<div class="flex items-center gap-xs">
<div class="w-3 h-3 rounded-full bg-secondary"></div>
<span class="font-label-md text-label-md text-on-surface-variant">Recycled</span>
</div>
</div>
</div>
<div class="p-lg flex-1 relative min-h-[300px]">
<canvas class="w-full h-full" id="volumeChart" width="792" height="289" style="display: block; box-sizing: border-box; height: 289.4px; width: 792.7px;"></canvas>
<div id="volume-chart-empty" class="absolute inset-0 items-center justify-center font-body-md text-body-md text-on-surface-variant" style="display:none;">No collection data available yet.</div>
</div>
</div>
<!-- Secondary Chart: Efficiency Gauge -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl shadow-card flex flex-col overflow-hidden">
<div class="p-lg border-b border-surface-container-highest bg-status-tableheader/30">
<h3 class="font-title-lg text-title-lg text-on-surface">Recycling Efficiency</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-xs">Current Month Goal: 45%</p>
</div>
<div class="p-lg flex-1 flex flex-col items-center justify-center relative min-h-[300px]"><div class="relative w-64 h-32 overflow-hidden flex items-end justify-center"><div class="absolute top-0 left-0 w-64 h-64 rounded-full border-[24px] border-surface-container-highest"></div><div class="absolute top-0 left-0 w-64 h-64 rounded-full border-[24px] border-primary border-b-transparent border-r-transparent transform -rotate-45" style="transform: rotate(-13deg);"></div><div class="relative z-10 flex flex-col items-center pb-sm mb-2"><div id="efficiency-gauge-value" class="font-display-lg text-display-lg text-primary leading-none">—</div><div class="font-body-md text-body-md text-on-surface-variant font-medium">Efficiency Rate</div></div><div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-4 h-4 bg-primary rounded-full z-20 border-2 border-surface-container-lowest"></div></div>
<div class="mt-lg w-full flex justify-between text-body-sm text-on-surface-variant px-xl">
    <span class="">0%</span>
    <span class="font-medium text-primary">Target: 45%</span>
    <span class="">100%</span>
</div></div>
</div>
</div>
<!-- Lower Section: Regional & Year over Year -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-lg mb-xl">
<!-- Regional Distribution Bar Chart -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl shadow-card flex flex-col overflow-hidden">
<div class="p-lg border-b border-surface-container-highest flex justify-between items-center bg-status-tableheader/30">
<h3 class="font-title-lg text-title-lg text-on-surface">Regional Distribution</h3>
</div>
<div class="p-lg flex-1 relative min-h-[300px]">
<canvas class="w-full h-full" id="regionalChart" width="576" height="252" style="display: block; box-sizing: border-box; height: 252px; width: 576px;"></canvas>
<div id="regional-chart-empty" class="absolute inset-0 items-center justify-center font-body-md text-body-md text-on-surface-variant" style="display:none;">No regional data available yet.</div>
</div>
</div>
<!-- Year-over-Year Comparison Table -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl shadow-card flex flex-col overflow-hidden">
<div class="p-lg border-b border-surface-container-highest bg-status-tableheader/30">
<h3 class="font-title-lg text-title-lg text-on-surface">Year-over-Year Reduction Metrics</h3>
</div>
<div class="flex-1 overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-status-tableheader text-on-surface-variant font-label-md text-label-md uppercase tracking-wider">
<th class="p-md font-medium border-b border-surface-container-highest">Category</th>
<th class="p-md font-medium border-b border-surface-container-highest text-right" id="yoy-year-a-col">— (Tons)</th>
<th class="p-md font-medium border-b border-surface-container-highest text-right" id="yoy-year-b-col">— (Tons)</th>
<th class="p-md font-medium border-b border-surface-container-highest text-right">Change</th>
</tr>
</thead>
<tbody id="yoy-tbody" class="font-body-md text-body-md text-on-surface divide-y divide-surface-container-high">
<tr><td class="p-md py-sm text-on-surface-variant" colspan="4">Loading year-over-year data&hellip;</td></tr>
</tbody>
</table>
</div>
</div>
</div>
<!-- Chart Scripts -->
<script>
        (function() {
            "use strict";
            var D = window.EcoWasteData;
            if (!D || !localStorage.getItem("sb-access-token")) return;

            // Colors from Tailwind config
            var primaryColor = '#630ed4';
            var primaryContainerColor = '#7c3aed';
            var secondaryColor = '#4648d4';
            var surfaceHighest = '#e5e1e4';
            var onSurfaceVariant = '#4a4455';

var CO2_FACTOR = 0.94; // metric tons CO2e avoided per ton recycled (EPA-derived assumption)

            // Chart.js Default Settings
            Chart.defaults.font.family = "'Hanken Grotesk', sans-serif";
            Chart.defaults.color = onSurfaceVariant;
            Chart.defaults.scale.grid.color = surfaceHighest;

            var stats = null;
            var zoneRows = [];
            var currentYear = "all";
            var charts = { volume: null, regional: null };
            var CATEGORY_ORDER = ["General Waste", "Recyclables", "Organic", "Hazardous"];

            async function load() {
                var results = await Promise.all([
                    D.list("recycling_records", "weight_kg,recorded_at,material_type,request_id"),
                    D.list("collection_requests", "id,zone")
                ]);
                var zoneById = {};
                (results[1] || []).forEach(function (r) { if (r.id) zoneById[r.id] = r.zone || "Unzoned"; });
                stats = D.computeWasteStats(results[0] || [], zoneById);

                zoneRows = Object.keys(stats.byZone).map(function (z) {
                    return { region: z, waste_tons: Math.round((stats.byZone[z] / 1000) * 10) / 10 };
                }).sort(function (a, b) { return b.waste_tons - a.waste_tons; });

                populateYearFilter();
                applyYear();
                renderRegionalChart();
                renderYoy();
                renderKpiDeltas();
            }

            function populateYearFilter() {
                var sel = document.getElementById("trend-year-filter");
                if (!sel) return;
                stats.years.forEach(function (y) {
                    var opt = document.createElement("option");
                    opt.value = String(y);
                    opt.textContent = String(y);
                    sel.appendChild(opt);
                });
                sel.addEventListener("change", function () {
                    currentYear = sel.value;
                    applyYear();
                });
            }

            function filteredMonths() {
                if (!stats) return [];
                if (currentYear === "all") return stats.months;
                return stats.months.filter(function (m) { return String(m.year) === currentYear; });
            }

            function applyYear() {
                var months = filteredMonths();
                var totalTons = 0, recycledTons = 0;
                months.forEach(function (m) { totalTons += m.totalTons; recycledTons += m.recycledTons; });
                var rate = totalTons > 0 ? (recycledTons / totalTons) * 100 : 0;

                setKpis(totalTons, rate, recycledTons);
                renderVolumeChart(months);
            }

            function exportTrends() {
                if (!stats) return;
                var lines = [];
                var months = filteredMonths();
                var lastYear = stats.years[0];
                var prevYear = stats.years[1];
                lines.push("SECTION,Monthly Collection Volume,,,,");
                lines.push("Year,Month,Total Waste (Tons),Recycled (Tons),,");
                months.forEach(function (m) {
                    lines.push([D.csvCell(m.year), D.csvCell(m.month), D.csvCell(m.totalTons), D.csvCell(m.recycledTons), D.csvCell(""), D.csvCell("")].join(","));
                });
                lines.push("SECTION,Regional Distribution,,,,");
                lines.push("Zone,Waste (Tons),,,,");
                zoneRows.forEach(function (z) {
                    lines.push([D.csvCell(z.region), D.csvCell(z.waste_tons), D.csvCell(""), D.csvCell(""), D.csvCell(""), D.csvCell("")].join(","));
                });
                lines.push("SECTION,Year over Year,,,,");
                lines.push("Category," + (prevYear || "—") + " (Tons)," + (lastYear || "—") + " (Tons),Change %,,");
                if (lastYear && prevYear) {
                    var aCat = stats.byYearCategory[prevYear] || {};
                    var bCat = stats.byYearCategory[lastYear] || {};
                    CATEGORY_ORDER.forEach(function (category) {
                        var a = (aCat[category] || 0) / 1000;
                        var b = (bCat[category] || 0) / 1000;
                        var diff = a > 0 ? ((b - a) / a) * 100 : 0;
                        lines.push([D.csvCell(category), D.csvCell(a), D.csvCell(b), D.csvCell(diff.toFixed(1) + "%"), D.csvCell(""), D.csvCell("")].join(","));
                    });
                }
                D.exportBlob("ecowaste_trends_data.csv", lines.join("\r\n"), "text/csv;charset=utf-8;");
            }

function setKpis(totalTons, rate, recycledTons) {
                var totalEl = document.getElementById("total-waste-value");
                if (totalEl) totalEl.textContent = D.fmtNum(totalTons);
                var rateEl = document.getElementById("recycling-rate-value");
                if (rateEl) rateEl.textContent = rate.toFixed(1);
                var progress = document.getElementById("recycling-progress");
                if (progress) progress.style.width = rate.toFixed(1) + "%";
                var gauge = document.getElementById("efficiency-gauge-value");
                if (gauge) gauge.textContent = rate.toFixed(1) + "%";
                var co2El = document.getElementById("co2-value");
                if (co2El) co2El.textContent = D.fmtNum(Math.round(recycledTons * CO2_FACTOR * 10) / 10);
            }

function destroyChart(key) {
                if (charts[key]) {
                    charts[key].destroy();
                    charts[key] = null;
                }
            }

            function setEmptyOverlay(id, visible) {
                var overlay = document.getElementById(id);
                if (overlay) overlay.style.display = visible ? "flex" : "none";
            }

            function renderVolumeChart(months) {
                var canvas = document.getElementById('volumeChart');
                if (!canvas) return;
                var emptyEl = document.getElementById("volume-chart-empty");
                if (typeof Chart === "undefined") {
                    if (emptyEl) {
                        emptyEl.textContent = "Chart library failed to load. Check your connection.";
                        emptyEl.style.display = "flex";
                    }
                    return;
                }
                setEmptyOverlay("volume-chart-empty", !months.length);
                destroyChart("volume");
                if (!months.length) return;

                var labels = months.map(function (m) { return m.label; });
                var totalData = months.map(function (m) { return m.totalTons; });
                var recycledData = months.map(function (m) { return m.recycledTons; });
                var volumeCtx = canvas.getContext('2d');

                var gradientPrimary = volumeCtx.createLinearGradient(0, 0, 0, 400);
                gradientPrimary.addColorStop(0, 'rgba(99, 14, 212, 0.2)');
                gradientPrimary.addColorStop(1, 'rgba(99, 14, 212, 0)');

                var gradientSecondary = volumeCtx.createLinearGradient(0, 0, 0, 400);
                gradientSecondary.addColorStop(0, 'rgba(70, 72, 212, 0.2)');
                gradientSecondary.addColorStop(1, 'rgba(70, 72, 212, 0)');

                charts.volume = new Chart(volumeCtx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Total Waste (Tons)',
                                data: totalData,
                                borderColor: primaryColor,
                                backgroundColor: gradientPrimary,
                                borderWidth: 2,
                                fill: true,
                                tension: 0.4,
                                pointRadius: 0,
                                pointHoverRadius: 6
                            },
                            {
                                label: 'Recycled (Tons)',
                                data: recycledData,
                                borderColor: secondaryColor,
                                backgroundColor: gradientSecondary,
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
                                mode: 'index',
                                intersect: false,
                                backgroundColor: 'rgba(28, 27, 29, 0.9)',
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
                        interaction: { mode: 'nearest', axis: 'x', intersect: false }
                    }
                });
            }

function renderRegionalChart() {
                var canvas = document.getElementById('regionalChart');
                if (!canvas) return;
                var emptyEl = document.getElementById("regional-chart-empty");
                if (typeof Chart === "undefined") {
                    if (emptyEl) {
                        emptyEl.textContent = "Chart library failed to load. Check your connection.";
                        emptyEl.style.display = "flex";
                    }
                    return;
                }
                setEmptyOverlay("regional-chart-empty", !zoneRows.length);
                destroyChart("regional");
                if (!zoneRows.length) return;
                charts.regional = new Chart(canvas.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: zoneRows.map(function (r) { return r.region; }),
                        datasets: [{
                            label: 'Waste Generation (Tons)',
                            data: zoneRows.map(function (r) { return Number(r.waste_tons) || 0; }),
                            backgroundColor: primaryContainerColor,
                            borderRadius: 4,
                            barPercentage: 0.6
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: 'rgba(28, 27, 29, 0.9)',
                                titleFont: { size: 13 },
                                bodyFont: { size: 14 },
                                padding: 12,
                                cornerRadius: 4
                            }
                        },
                        scales: {
                            x: { grid: { display: false } },
                            y: { beginAtZero: true, border: { display: false } }
                        }
                    }
                });
            }

function renderYoy() {
                var tbody = document.getElementById("yoy-tbody");
                if (!tbody) return;
                var lastYear = stats.years[0];
                var prevYear = stats.years[1];
                var colA = document.getElementById("yoy-year-a-col");
                var colB = document.getElementById("yoy-year-b-col");
                if (colA) colA.textContent = (prevYear || "—") + " (Tons)";
                if (colB) colB.textContent = (lastYear || "—") + " (Tons)";
                tbody.innerHTML = "";
                if (!lastYear || !prevYear) {
                    tbody.innerHTML = '<tr><td class="p-md py-sm text-on-surface-variant" colspan="4">No year-over-year data yet.</td></tr>';
                    return;
                }
                var aCat = stats.byYearCategory[prevYear] || {};
                var bCat = stats.byYearCategory[lastYear] || {};
                CATEGORY_ORDER.forEach(function (category) {
                    var a = (aCat[category] || 0) / 1000;
                    var b = (bCat[category] || 0) / 1000;
                    var diff = a > 0 ? ((b - a) / a) * 100 : 0;
                    var up = diff >= 0;
                    var arrow = up ? 'arrow_upward' : 'arrow_downward';
                    var isBad = up && category === 'Hazardous';
                    var badge = isBad
                        ? 'text-error bg-error-container/50'
                        : 'text-status-success-text bg-status-success/50';
                    var tr = document.createElement("tr");
                    tr.className = "hover:bg-surface-container-lowest transition-colors";
                    tr.innerHTML =
                        '<td class="p-md py-sm">' + D.esc(category) + '</td>' +
                        '<td class="p-md py-sm text-right">' + D.esc(D.fmtNum(a)) + '</td>' +
                        '<td class="p-md py-sm text-right">' + D.esc(D.fmtNum(b)) + '</td>' +
                        '<td class="p-md py-sm text-right">' +
                        '<span class="inline-flex items-center gap-xs px-xs py-0.5 rounded-sm font-label-md text-label-md ' + badge + '">' +
                        '<span class="material-symbols-outlined text-[14px]">' + arrow + '</span> ' + Math.abs(diff).toFixed(1) + '%' +
                        '</span></td>';
                    tbody.appendChild(tr);
                });
            }

            function renderKpiDeltas() {
                function setDelta(id, value) {
                    var el = document.getElementById(id);
                    if (el) el.textContent = value;
                }
                var lastYear = stats.years[0];
                var prevYear = stats.years[1];
                if (!lastYear || !prevYear) {
                    setDelta("waste-delta", "—");
                    setDelta("rate-delta", "—");
                    setDelta("co2-delta", "—");
                    return;
                }
                var aCat = stats.byYearCategory[prevYear] || {};
                var bCat = stats.byYearCategory[lastYear] || {};
                var sum = function (c) {
                    return (c["General Waste"] || 0) + (c["Recyclables"] || 0) + (c["Organic"] || 0) + (c["Hazardous"] || 0);
                };
                var aTotal = sum(aCat) / 1000;
                var bTotal = sum(bCat) / 1000;
                var aRec = (aCat["Recyclables"] || 0) / 1000;
                var bRec = (bCat["Recyclables"] || 0) / 1000;
                var aRate = aTotal > 0 ? (aRec / aTotal) * 100 : 0;
                var bRate = bTotal > 0 ? (bRec / bTotal) * 100 : 0;
                setDelta("waste-delta", (aTotal > 0 ? ((bTotal - aTotal) / aTotal) * 100 : (bTotal > 0 ? 100 : 0)).toFixed(1) + "%");
                setDelta("rate-delta", (bRate - aRate).toFixed(1) + " pts");
                setDelta("co2-delta", (aRec > 0 ? ((bRec - aRec) / aRec) * 100 : (bRec > 0 ? 100 : 0)).toFixed(1) + "%");
            }

load().catch(function (err) {
                console.error("EcoWaste trends data failed to load:", err);
            });

            var exportTrendsBtn = document.getElementById("export-trends-btn");
            if (exportTrendsBtn) {
                exportTrendsBtn.addEventListener("click", exportTrends);
            }
        })();
    </script>


