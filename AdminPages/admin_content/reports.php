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
<select class="w-full bg-surface-container-lowest border border-outline-variant rounded-md px-3 py-2 font-body-sm text-body-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none">
<option>Last 30 Days</option>
<option>Last Quarter</option>
<option>Year to Date</option>
</select>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-1">Zone Filter</label>
<select class="w-full bg-surface-container-lowest border border-outline-variant rounded-md px-3 py-2 font-body-sm text-body-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none">
<option>All Zones</option>
<option>North District</option>
<option>South District</option>
</select>
</div>
</div>
<button class="w-full bg-primary text-on-primary font-label-md text-label-md py-2 px-4 rounded-md hover:bg-primary-container hover:text-on-primary-container transition-colors flex items-center justify-center gap-2">
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
<select class="w-full bg-surface-container-lowest border border-outline-variant rounded-md px-3 py-2 font-body-sm text-body-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none">
<option>Last 30 Days</option>
<option>Last Quarter</option>
<option>Custom Range</option>
</select>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-1">User Segment</label>
<select class="w-full bg-surface-container-lowest border border-outline-variant rounded-md px-3 py-2 font-body-sm text-body-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none">
<option>All Users</option>
<option>New Signups (30d)</option>
<option>Highly Active</option>
</select>
</div>
</div>
<button class="w-full bg-primary text-on-primary font-label-md text-label-md py-2 px-4 rounded-md hover:bg-primary-container hover:text-on-primary-container transition-colors flex items-center justify-center gap-2">
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
<select class="w-full bg-surface-container-lowest border border-outline-variant rounded-md px-3 py-2 font-body-sm text-body-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none">
<option>2023 Annual</option>
<option>Q3 2023</option>
<option>Q2 2023</option>
</select>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-1">Metric Focus</label>
<select class="w-full bg-surface-container-lowest border border-outline-variant rounded-md px-3 py-2 font-body-sm text-body-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none">
<option>Comprehensive</option>
<option>Carbon Footprint</option>
<option>Landfill Diversion</option>
</select>
</div>
</div>
<button class="w-full bg-primary text-on-primary font-label-md text-label-md py-2 px-4 rounded-md hover:bg-primary-container hover:text-on-primary-container transition-colors flex items-center justify-center gap-2">
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
<button class="text-primary font-label-md text-label-md hover:underline">View All Archive</button>
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
<tbody class="font-body-sm text-body-sm text-on-surface">
<tr class="border-b border-outline-variant hover:bg-surface-container-lowest transition-colors group">
<td class="py-2 px-4 flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-base" data-icon="description">description</span>
<span class="font-medium">Q3 Route Efficiency Audit</span>
</td>
<td class="py-2 px-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-primary-fixed text-on-primary-fixed-variant">Collection</span>
</td>
<td class="py-2 px-4 text-on-surface-variant">Oct 24, 2023 - 14:30</td>
<td class="py-2 px-4">System Auto</td>
<td class="py-2 px-4 text-right flex justify-end gap-2">
<button class="p-1.5 text-on-surface-variant hover:text-primary hover:bg-surface-container-highest rounded-md transition-colors" title="Download PDF">
<span class="material-symbols-outlined text-sm" data-icon="picture_as_pdf">picture_as_pdf</span>
</button>
<button class="p-1.5 text-on-surface-variant hover:text-primary hover:bg-surface-container-highest rounded-md transition-colors" title="Download CSV">
<span class="material-symbols-outlined text-sm" data-icon="csv">csv</span>
</button>
</td>
</tr>
<tr class="border-b border-outline-variant hover:bg-surface-container-lowest transition-colors group">
<td class="py-2 px-4 flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-base" data-icon="description">description</span>
<span class="font-medium">September Resident Engagement</span>
</td>
<td class="py-2 px-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-secondary-fixed text-on-secondary-fixed">Participation</span>
</td>
<td class="py-2 px-4 text-on-surface-variant">Oct 22, 2023 - 09:15</td>
<td class="py-2 px-4">Jane Smith</td>
<td class="py-2 px-4 text-right flex justify-end gap-2">
<button class="p-1.5 text-on-surface-variant hover:text-primary hover:bg-surface-container-highest rounded-md transition-colors" title="Download PDF">
<span class="material-symbols-outlined text-sm" data-icon="picture_as_pdf">picture_as_pdf</span>
</button>
<button class="p-1.5 text-on-surface-variant hover:text-primary hover:bg-surface-container-highest rounded-md transition-colors" title="Download CSV">
<span class="material-symbols-outlined text-sm" data-icon="csv">csv</span>
</button>
</td>
</tr>
<tr class="border-b border-outline-variant hover:bg-surface-container-lowest transition-colors group">
<td class="py-2 px-4 flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-base" data-icon="description">description</span>
<span class="font-medium">Annual Diversion Rate 2022</span>
</td>
<td class="py-2 px-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-surface-variant text-on-surface-variant">Environmental</span>
</td>
<td class="py-2 px-4 text-on-surface-variant">Oct 15, 2023 - 11:00</td>
<td class="py-2 px-4">Alex Johnson</td>
<td class="py-2 px-4 text-right flex justify-end gap-2">
<button class="p-1.5 text-on-surface-variant hover:text-primary hover:bg-surface-container-highest rounded-md transition-colors" title="Download PDF">
<span class="material-symbols-outlined text-sm" data-icon="picture_as_pdf">picture_as_pdf</span>
</button>
<button class="p-1.5 text-on-surface-variant hover:text-primary hover:bg-surface-container-highest rounded-md transition-colors" title="Download CSV">
<span class="material-symbols-outlined text-sm" data-icon="csv">csv</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
