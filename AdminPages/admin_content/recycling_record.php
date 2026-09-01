<!-- Recycling Records view - loaded via admin_app.php -->
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center justify-between mb-xl gap-md">
<div>
<h2 class="font-display-lg text-display-lg text-on-surface">Recycling Records</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">Manage and track processed materials across facilities.</p>
</div>
<div class="flex gap-md">
<button class="bg-secondary-fixed text-primary font-label-md text-label-md px-lg py-2 rounded flex items-center gap-2 hover:bg-secondary-fixed-dim transition-colors border border-transparent">
<span class="material-symbols-outlined text-[18px]" data-icon="download">download</span>
                        Export CSV
                    </button>
<button class="bg-primary text-on-primary font-label-md text-label-md px-lg py-2 rounded flex items-center gap-2 hover:bg-secondary transition-colors shadow-sm">
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
<span class="font-display-lg text-display-lg text-primary tracking-tight">42,850</span>
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
<span class="text-on-surface-variant">15k kg</span>
</div>
<div class="w-full bg-surface-variant h-2 rounded-full overflow-hidden">
<div class="bg-primary h-full w-[35%] rounded-full"></div>
</div>
</div>
<div class="flex-1 min-w-[100px]">
<div class="flex justify-between font-label-md text-label-md mb-2">
<span class="text-on-surface">Paper</span>
<span class="text-on-surface-variant">12k kg</span>
</div>
<div class="w-full bg-surface-variant h-2 rounded-full overflow-hidden">
<div class="bg-secondary h-full w-[28%] rounded-full"></div>
</div>
</div>
<div class="flex-1 min-w-[100px]">
<div class="flex justify-between font-label-md text-label-md mb-2">
<span class="text-on-surface">Metal</span>
<span class="text-on-surface-variant">10k kg</span>
</div>
<div class="w-full bg-surface-variant h-2 rounded-full overflow-hidden">
<div class="bg-tertiary h-full w-[23%] rounded-full"></div>
</div>
</div>
<div class="flex-1 min-w-[100px]">
<div class="flex justify-between font-label-md text-label-md mb-2">
<span class="text-on-surface">Glass</span>
<span class="text-on-surface-variant">5.8k kg</span>
</div>
<div class="w-full bg-surface-variant h-2 rounded-full overflow-hidden">
<div class="bg-outline h-full w-[14%] rounded-full"></div>
</div>
</div>
</div>
</div>
</div>
<!-- Data Table Section -->
<div class="bg-surface-container-lowest border border-surface-variant rounded-xl shadow-[0_1px_3px_rgba(0,0,0,0.05)] overflow-hidden flex flex-col">
<!-- Table Toolbar -->
<div class="p-md border-b border-surface-variant flex flex-col sm:flex-row justify-between items-center gap-md bg-surface">
<div class="flex items-center gap-md w-full sm:w-auto">
<div class="relative w-full sm:w-64">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[18px]" data-icon="filter_list">filter_list</span>
<select class="w-full pl-10 pr-8 py-1.5 bg-surface-container-lowest border border-outline-variant rounded font-body-sm text-body-sm text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary appearance-none cursor-pointer">
<option value="">All Facilities</option>
<option value="north">North Processing Hub</option>
<option value="south">South sorting Center</option>
</select>
</div>
</div>
<div class="flex items-center gap-sm text-on-surface-variant font-body-sm text-body-sm">
<span>Showing 1-10 of 2,492 logs</span>
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
<tbody class="font-body-md text-body-md text-on-surface">
<!-- Row 1 -->
<tr class="border-b border-surface-variant hover:bg-surface-container-low transition-colors group">
<td class="py-2 px-md font-mono-md text-primary">#LOG-8924</td>
<td class="py-2 px-md text-on-surface-variant">Oct 24, 2023 <span class="text-outline text-[12px] block">14:30</span></td>
<td class="py-2 px-md">
<div class="flex items-center gap-2">
<div class="w-6 h-6 rounded bg-primary-fixed flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[14px]" data-icon="water_bottle">water_bottle</span>
</div>
                                        PET Plastic
                                    </div>
</td>
<td class="py-2 px-md font-semibold">1,250.5</td>
<td class="py-2 px-md text-on-surface-variant">North Processing Hub</td>
<td class="py-2 px-md">
<span class="bg-[#e6f4ea] text-[#137333] px-2 py-1 rounded font-label-md text-label-md border border-[#ceead6]">Verified</span>
</td>
<td class="py-2 px-md text-right">
<button class="text-on-surface-variant hover:text-primary transition-colors p-1 rounded hover:bg-surface-container">
<span class="material-symbols-outlined text-[20px]" data-icon="more_vert">more_vert</span>
</button>
</td>
</tr>
<!-- Row 2 -->
<tr class="border-b border-surface-variant hover:bg-surface-container-low transition-colors group">
<td class="py-2 px-md font-mono-md text-primary">#LOG-8923</td>
<td class="py-2 px-md text-on-surface-variant">Oct 24, 2023 <span class="text-outline text-[12px] block">11:15</span></td>
<td class="py-2 px-md">
<div class="flex items-center gap-2">
<div class="w-6 h-6 rounded bg-secondary-fixed flex items-center justify-center text-secondary">
<span class="material-symbols-outlined text-[14px]" data-icon="description">description</span>
</div>
                                        Mixed Paper
                                    </div>
</td>
<td class="py-2 px-md font-semibold">840.0</td>
<td class="py-2 px-md text-on-surface-variant">South Sorting Center</td>
<td class="py-2 px-md">
<span class="bg-[#e6f4ea] text-[#137333] px-2 py-1 rounded font-label-md text-label-md border border-[#ceead6]">Verified</span>
</td>
<td class="py-2 px-md text-right">
<button class="text-on-surface-variant hover:text-primary transition-colors p-1 rounded hover:bg-surface-container">
<span class="material-symbols-outlined text-[20px]" data-icon="more_vert">more_vert</span>
</button>
</td>
</tr>
<!-- Row 3 (Pending Status) -->
<tr class="border-b border-surface-variant hover:bg-surface-container-low transition-colors group">
<td class="py-2 px-md font-mono-md text-primary">#LOG-8922</td>
<td class="py-2 px-md text-on-surface-variant">Oct 24, 2023 <span class="text-outline text-[12px] block">09:45</span></td>
<td class="py-2 px-md">
<div class="flex items-center gap-2">
<div class="w-6 h-6 rounded bg-tertiary-fixed flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined text-[14px]" data-icon="build">build</span>
</div>
                                        Scrap Metal
                                    </div>
</td>
<td class="py-2 px-md font-semibold">2,100.0</td>
<td class="py-2 px-md text-on-surface-variant">East Industrial Depot</td>
<td class="py-2 px-md">
<span class="bg-[#fef7e0] text-[#b06000] px-2 py-1 rounded font-label-md text-label-md border border-[#fde293]">Pending Audit</span>
</td>
<td class="py-2 px-md text-right">
<button class="text-on-surface-variant hover:text-primary transition-colors p-1 rounded hover:bg-surface-container">
<span class="material-symbols-outlined text-[20px]" data-icon="more_vert">more_vert</span>
</button>
</td>
</tr>
<!-- Row 4 -->
<tr class="border-b border-surface-variant hover:bg-surface-container-low transition-colors group">
<td class="py-2 px-md font-mono-md text-primary">#LOG-8921</td>
<td class="py-2 px-md text-on-surface-variant">Oct 23, 2023 <span class="text-outline text-[12px] block">16:20</span></td>
<td class="py-2 px-md">
<div class="flex items-center gap-2">
<div class="w-6 h-6 rounded bg-outline-variant flex items-center justify-center text-on-surface-variant">
<span class="material-symbols-outlined text-[14px]" data-icon="local_drink">local_drink</span>
</div>
                                        Clear Glass
                                    </div>
</td>
<td class="py-2 px-md font-semibold">560.2</td>
<td class="py-2 px-md text-on-surface-variant">North Processing Hub</td>
<td class="py-2 px-md">
<span class="bg-[#e6f4ea] text-[#137333] px-2 py-1 rounded font-label-md text-label-md border border-[#ceead6]">Verified</span>
</td>
<td class="py-2 px-md text-right">
<button class="text-on-surface-variant hover:text-primary transition-colors p-1 rounded hover:bg-surface-container">
<span class="material-symbols-outlined text-[20px]" data-icon="more_vert">more_vert</span>
</button>
</td>
</tr>
<!-- Row 5 (Error Status) -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="py-2 px-md font-mono-md text-primary">#LOG-8920</td>
<td class="py-2 px-md text-on-surface-variant">Oct 23, 2023 <span class="text-outline text-[12px] block">14:05</span></td>
<td class="py-2 px-md">
<div class="flex items-center gap-2">
<div class="w-6 h-6 rounded bg-primary-fixed flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[14px]" data-icon="water_bottle">water_bottle</span>
</div>
                                        HDPE Plastic
                                    </div>
</td>
<td class="py-2 px-md font-semibold">920.0</td>
<td class="py-2 px-md text-on-surface-variant">West Collection Point</td>
<td class="py-2 px-md">
<span class="bg-[#fce8e6] text-[#c5221f] px-2 py-1 rounded font-label-md text-label-md border border-[#fad2cf]">Discrepancy</span>
</td>
<td class="py-2 px-md text-right">
<button class="text-on-surface-variant hover:text-primary transition-colors p-1 rounded hover:bg-surface-container">
<span class="material-symbols-outlined text-[20px]" data-icon="more_vert">more_vert</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="p-sm px-md border-t border-surface-variant bg-surface flex justify-between items-center">
<button class="text-on-surface-variant hover:text-primary transition-colors p-1 rounded hover:bg-surface-container flex items-center gap-1 font-label-md text-label-md disabled:opacity-50 disabled:cursor-not-allowed" disabled="">
<span class="material-symbols-outlined text-[18px]" data-icon="chevron_left">chevron_left</span>
                        Prev
                    </button>
<div class="flex gap-1">
<button class="w-8 h-8 rounded bg-primary text-on-primary font-label-md text-label-md flex items-center justify-center">1</button>
<button class="w-8 h-8 rounded hover:bg-surface-container text-on-surface-variant font-label-md text-label-md flex items-center justify-center transition-colors">2</button>
<button class="w-8 h-8 rounded hover:bg-surface-container text-on-surface-variant font-label-md text-label-md flex items-center justify-center transition-colors">3</button>
<span class="w-8 h-8 flex items-center justify-center text-on-surface-variant">...</span>
</div>
<button class="text-on-surface-variant hover:text-primary transition-colors p-1 rounded hover:bg-surface-container flex items-center gap-1 font-label-md text-label-md">
                        Next
                        <span class="material-symbols-outlined text-[18px]" data-icon="chevron_right">chevron_right</span>
</button>
</div>
</div>
