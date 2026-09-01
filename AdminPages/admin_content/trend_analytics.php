<!-- Trends & Analytics view - loaded via admin_app.php -->
<!-- Header Section -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-md mb-xl">
<div>
<h1 class="font-display-lg text-display-lg text-on-surface">Trends &amp; Analytics</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant mt-xs">Comprehensive overview of waste generation and recycling efficiency.</p>
</div>
<div class="flex gap-sm">
<button class="flex items-center gap-sm px-lg py-sm bg-surface-container-lowest border border-outline-variant rounded-DEFAULT text-primary font-label-md text-label-md hover:bg-surface-container-low transition-colors shadow-sm">
<span class="material-symbols-outlined text-sm">calendar_month</span>
                        This Year
                        <span class="material-symbols-outlined text-sm">arrow_drop_down</span>
</button>
<button class="flex items-center gap-sm px-lg py-sm bg-primary text-on-primary rounded-DEFAULT font-label-md text-label-md hover:bg-primary/90 transition-colors shadow-sm">
<span class="material-symbols-outlined text-sm">download</span>
                        Export PDF
                    </button>
</div>
</div>
<!-- Metrics Overview (Bento Grid) -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-lg mb-xl">
<!-- Card 1 -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-[0px_1px_3px_rgba(0,0,0,0.05)] relative overflow-hidden group">
<div class="absolute -right-8 -top-8 w-32 h-32 bg-primary-container/20 rounded-full blur-2xl group-hover:bg-primary-container/30 transition-colors"></div>
<div class="flex justify-between items-start mb-md relative z-10">
<div>
<p class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Total Waste Collected</p>
<h2 class="font-headline-lg text-headline-lg text-on-surface mt-xs">1,245.8 <span class="font-title-md text-title-md text-on-surface-variant">Tons</span></h2>
</div>
<div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined">delete_sweep</span>
</div>
</div>
<div class="flex items-center gap-xs relative z-10">
<span class="flex items-center font-label-md text-label-md text-error bg-error-container/50 px-xs py-0.5 rounded-sm">
<span class="material-symbols-outlined text-[14px]">arrow_upward</span>
                            4.2%
                        </span>
<span class="font-body-sm text-body-sm text-on-surface-variant">vs last year</span>
</div>
</div>
<!-- Card 2 -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-[0px_1px_3px_rgba(0,0,0,0.05)] relative overflow-hidden group">
<div class="absolute -right-8 -top-8 w-32 h-32 bg-secondary-container/20 rounded-full blur-2xl group-hover:bg-secondary-container/30 transition-colors"></div>
<div class="flex justify-between items-start mb-md relative z-10">
<div>
<p class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Recycling Rate</p>
<h2 class="font-headline-lg text-headline-lg text-on-surface mt-xs">42.7 <span class="font-title-md text-title-md text-on-surface-variant">%</span></h2>
</div>
<div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-secondary">
<span class="material-symbols-outlined">recycling</span>
</div>
</div>
<div class="flex items-center gap-xs relative z-10">
<span class="flex items-center font-label-md text-label-md text-[#166534] bg-[#dcfce7]/50 px-xs py-0.5 rounded-sm">
<span class="material-symbols-outlined text-[14px]">arrow_upward</span>
                            8.5%
                        </span>
<span class="font-body-sm text-body-sm text-on-surface-variant">vs last year</span>
</div>
<!-- Mini Progress Bar -->
<div class="w-full h-1.5 bg-surface-container-highest rounded-full mt-md overflow-hidden">
<div class="h-full bg-secondary w-[42.7%] rounded-full"></div>
</div>
</div>
<!-- Card 3 -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-[0px_1px_3px_rgba(0,0,0,0.05)] relative overflow-hidden group">
<div class="absolute -right-8 -top-8 w-32 h-32 bg-tertiary-container/20 rounded-full blur-2xl group-hover:bg-tertiary-container/30 transition-colors"></div>
<div class="flex justify-between items-start mb-md relative z-10">
<div>
<p class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">CO2 Emissions Avoided</p>
<h2 class="font-headline-lg text-headline-lg text-on-surface mt-xs">892 <span class="font-title-md text-title-md text-on-surface-variant">MT</span></h2>
</div>
<div class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined">co2</span>
</div>
</div>
<div class="flex items-center gap-xs relative z-10">
<span class="flex items-center font-label-md text-label-md text-[#166534] bg-[#dcfce7]/50 px-xs py-0.5 rounded-sm">
<span class="material-symbols-outlined text-[14px]">arrow_upward</span>
                            12.1%
                        </span>
<span class="font-body-sm text-body-sm text-on-surface-variant">vs last year</span>
</div>
</div>
</div>
<!-- Charts Section (Main Bento Area) -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-lg mb-xl">
<!-- Main Area Chart: Volume Over Time -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl shadow-[0px_1px_3px_rgba(0,0,0,0.05)] flex flex-col lg:col-span-2 overflow-hidden">
<div class="p-lg border-b border-surface-container-highest flex justify-between items-center bg-[#f1f5f9]/30">
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
</div>
</div>
<!-- Secondary Chart: Efficiency Gauge -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl shadow-[0px_1px_3px_rgba(0,0,0,0.05)] flex flex-col overflow-hidden">
<div class="p-lg border-b border-surface-container-highest bg-[#f1f5f9]/30">
<h3 class="font-title-lg text-title-lg text-on-surface">Recycling Efficiency</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-xs">Current Month Goal: 45%</p>
</div>
<div class="p-lg flex-1 flex flex-col items-center justify-center relative min-h-[300px]"><div class="relative w-64 h-32 overflow-hidden flex items-end justify-center"><div class="absolute top-0 left-0 w-64 h-64 rounded-full border-[24px] border-surface-container-highest"></div><div class="absolute top-0 left-0 w-64 h-64 rounded-full border-[24px] border-primary border-b-transparent border-r-transparent transform -rotate-45" style="transform: rotate(-13deg);"></div><div class="relative z-10 flex flex-col items-center pb-sm mb-2"><div class="font-display-lg text-display-lg text-primary leading-none">42.7%</div><div class="font-body-md text-body-md text-on-surface-variant font-medium">Efficiency Rate</div></div><div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-4 h-4 bg-primary rounded-full z-20 border-2 border-surface-container-lowest"></div></div>
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
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl shadow-[0px_1px_3px_rgba(0,0,0,0.05)] flex flex-col overflow-hidden">
<div class="p-lg border-b border-surface-container-highest flex justify-between items-center bg-[#f1f5f9]/30">
<h3 class="font-title-lg text-title-lg text-on-surface">Regional Distribution</h3>
<button class="text-primary hover:text-primary/80">
<span class="material-symbols-outlined">more_vert</span>
</button>
</div>
<div class="p-lg flex-1 relative min-h-[300px]">
<canvas class="w-full h-full" id="regionalChart" width="576" height="252" style="display: block; box-sizing: border-box; height: 252px; width: 576px;"></canvas>
</div>
</div>
<!-- Year-over-Year Comparison Table -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl shadow-[0px_1px_3px_rgba(0,0,0,0.05)] flex flex-col overflow-hidden">
<div class="p-lg border-b border-surface-container-highest bg-[#f1f5f9]/30">
<h3 class="font-title-lg text-title-lg text-on-surface">Year-over-Year Reduction Metrics</h3>
</div>
<div class="flex-1 overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-[#f1f5f9] text-on-surface-variant font-label-md text-label-md uppercase tracking-wider">
<th class="p-md font-medium border-b border-surface-container-highest">Category</th>
<th class="p-md font-medium border-b border-surface-container-highest text-right">2023 (Tons)</th>
<th class="p-md font-medium border-b border-surface-container-highest text-right">2024 (Tons)</th>
<th class="p-md font-medium border-b border-surface-container-highest text-right">Change</th>
</tr>
</thead>
<tbody class="font-body-md text-body-md text-on-surface divide-y divide-surface-container-high">
<tr class="hover:bg-surface-container-lowest transition-colors">
<td class="p-md py-sm">General Waste</td>
<td class="p-md py-sm text-right">850.5</td>
<td class="p-md py-sm text-right">795.2</td>
<td class="p-md py-sm text-right">
<span class="inline-flex items-center gap-xs text-[#166534] bg-[#dcfce7]/50 px-xs py-0.5 rounded-sm font-label-md text-label-md">
<span class="material-symbols-outlined text-[14px]">arrow_downward</span> 6.5%
                                        </span>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest transition-colors">
<td class="p-md py-sm">Recyclables</td>
<td class="p-md py-sm text-right">410.2</td>
<td class="p-md py-sm text-right">450.6</td>
<td class="p-md py-sm text-right">
<span class="inline-flex items-center gap-xs text-[#166534] bg-[#dcfce7]/50 px-xs py-0.5 rounded-sm font-label-md text-label-md">
<span class="material-symbols-outlined text-[14px]">arrow_upward</span> 9.8%
                                        </span>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest transition-colors">
<td class="p-md py-sm">Organic</td>
<td class="p-md py-sm text-right">320.0</td>
<td class="p-md py-sm text-right">305.5</td>
<td class="p-md py-sm text-right">
<span class="inline-flex items-center gap-xs text-[#166534] bg-[#dcfce7]/50 px-xs py-0.5 rounded-sm font-label-md text-label-md">
<span class="material-symbols-outlined text-[14px]">arrow_downward</span> 4.5%
                                        </span>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest transition-colors">
<td class="p-md py-sm">Hazardous</td>
<td class="p-md py-sm text-right">45.8</td>
<td class="p-md py-sm text-right">52.1</td>
<td class="p-md py-sm text-right">
<span class="inline-flex items-center gap-xs text-error bg-error-container/50 px-xs py-0.5 rounded-sm font-label-md text-label-md">
<span class="material-symbols-outlined text-[14px]">arrow_upward</span> 13.7%
                                        </span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<!-- Chart Scripts -->
<script>
        (function() {
            // Colors from Tailwind config
            const primaryColor = '#630ed4';
            const primaryContainerColor = '#7c3aed';
            const secondaryColor = '#4648d4';
            const surfaceHighest = '#e5e1e4';
            const onSurfaceVariant = '#4a4455';

            // Chart.js Default Settings
            Chart.defaults.font.family = "'Hanken Grotesk', sans-serif";
            Chart.defaults.color = onSurfaceVariant;
            Chart.defaults.scale.grid.color = surfaceHighest;

            // Volume Chart (Area/Line)
            const volumeCtx = document.getElementById('volumeChart').getContext('2d');
            
            // Create Gradient
            const gradientPrimary = volumeCtx.createLinearGradient(0, 0, 0, 400);
            gradientPrimary.addColorStop(0, 'rgba(99, 14, 212, 0.2)');
            gradientPrimary.addColorStop(1, 'rgba(99, 14, 212, 0)');

            const gradientSecondary = volumeCtx.createLinearGradient(0, 0, 0, 400);
            gradientSecondary.addColorStop(0, 'rgba(70, 72, 212, 0.2)');
            gradientSecondary.addColorStop(1, 'rgba(70, 72, 212, 0)');

            new Chart(volumeCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [
                        {
                            label: 'Total Waste (Tons)',
                            data: [120, 135, 125, 145, 140, 150, 160, 155, 145, 150, 140, 135],
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
                            data: [45, 50, 48, 55, 60, 65, 70, 68, 65, 72, 65, 60],
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
                        legend: {
                            display: false // Using custom legend in HTML
                        },
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
                        x: {
                            grid: { display: false }
                        },
                        y: {
                            beginAtZero: true,
                            border: { display: false }
                        }
                    },
                    interaction: {
                        mode: 'nearest',
                        axis: 'x',
                        intersect: false
                    }
                }
            });

            // Regional Distribution Chart (Bar)
            const regionalCtx = document.getElementById('regionalChart').getContext('2d');
            new Chart(regionalCtx, {
                type: 'bar',
                data: {
                    labels: ['North Dist.', 'South Dist.', 'East Area', 'West End', 'Central', 'Port Zone'],
                    datasets: [{
                        label: 'Waste Generation (Tons)',
                        data: [320, 250, 180, 210, 450, 120],
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
                        x: {
                            grid: { display: false }
                        },
                        y: {
                            beginAtZero: true,
                            border: { display: false }
                        }
                    }
                }
            });
        })();
    </script>
