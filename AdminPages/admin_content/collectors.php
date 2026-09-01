<!-- Collectors view - loaded via admin_app.php -->
<!-- Page Header -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-md mb-xl">
<div>
<h2 class="font-display-lg text-display-lg text-on-surface">Collectors Management</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">Manage personnel, monitor routes, and evaluate performance.</p>
</div>
<button class="bg-primary text-on-primary font-title-md text-title-md px-lg py-sm rounded-DEFAULT flex items-center gap-sm hover:bg-surface-tint transition-colors shadow-sm self-start sm:self-auto">
<span class="material-symbols-outlined text-[20px]" data-icon="add">add</span>
                    Add New Collector
                </button>
</div>
<!-- Dashboard Bento Grid Metrics -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-lg mb-xl">
<!-- Metric Card 1 -->
<div class="bg-surface-container-lowest rounded-DEFAULT border border-outline-variant p-lg shadow-[0px_1px_3px_rgba(0,0,0,0.05)] relative overflow-hidden group">
<div class="absolute top-0 right-0 p-lg text-primary/10 group-hover:scale-110 transition-transform duration-300">
<span class="material-symbols-outlined text-[64px]" data-icon="groups">groups</span>
</div>
<p class="font-title-md text-title-md text-on-surface-variant mb-xs relative z-10">Total Active</p>
<div class="flex items-end gap-sm relative z-10">
<span class="font-display-lg text-display-lg text-on-surface">142</span>
<span class="font-label-md text-label-md text-primary bg-primary-fixed px-2 py-1 rounded-full mb-1 flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">arrow_upward</span> 4%
                        </span>
</div>
</div>
<!-- Metric Card 2 -->
<div class="bg-surface-container-lowest rounded-DEFAULT border border-outline-variant p-lg shadow-[0px_1px_3px_rgba(0,0,0,0.05)] relative overflow-hidden group">
<div class="absolute top-0 right-0 p-lg text-secondary/10 group-hover:scale-110 transition-transform duration-300">
<span class="material-symbols-outlined text-[64px]" data-icon="route">route</span>
</div>
<p class="font-title-md text-title-md text-on-surface-variant mb-xs relative z-10">Currently on Route</p>
<div class="flex items-end gap-sm relative z-10">
<span class="font-display-lg text-display-lg text-on-surface">87</span>
</div>
</div>
<!-- Metric Card 3 -->
<div class="bg-surface-container-lowest rounded-DEFAULT border border-outline-variant p-lg shadow-[0px_1px_3px_rgba(0,0,0,0.05)] relative overflow-hidden group">
<div class="absolute top-0 right-0 p-lg text-error/10 group-hover:scale-110 transition-transform duration-300">
<span class="material-symbols-outlined text-[64px]" data-icon="warning">warning</span>
</div>
<p class="font-title-md text-title-md text-on-surface-variant mb-xs relative z-10">Issues Reported</p>
<div class="flex items-end gap-sm relative z-10">
<span class="font-display-lg text-display-lg text-on-surface">3</span>
<span class="font-label-md text-label-md text-error bg-error-container px-2 py-1 rounded-full mb-1">Needs Attention</span>
</div>
</div>
</div>
<!-- Main Data Section -->
<div class="bg-surface-container-lowest rounded-DEFAULT border border-outline-variant shadow-[0px_1px_3px_rgba(0,0,0,0.05)] flex flex-col">
<!-- Table Toolbar -->
<div class="p-md border-b border-outline-variant flex flex-col sm:flex-row justify-between items-center gap-md bg-surface-container-low/50">
<div class="relative w-full sm:w-72">
<span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]" data-icon="search">search</span>
<input class="w-full pl-xl pr-sm py-2 rounded-DEFAULT border border-outline-variant bg-surface-container-lowest text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 font-body-sm text-body-sm" placeholder="Search by name, ID, or vehicle..." type="text"/>
</div>
<div class="flex items-center gap-sm w-full sm:w-auto">
<button class="flex-1 sm:flex-none flex items-center justify-center gap-sm px-md py-2 border border-outline-variant rounded-DEFAULT text-on-surface hover:bg-surface-container transition-colors font-title-md text-title-md">
<span class="material-symbols-outlined text-[18px]" data-icon="filter_list">filter_list</span>
                            Filter
                        </button>
<button class="flex-1 sm:flex-none flex items-center justify-center gap-sm px-md py-2 border border-outline-variant rounded-DEFAULT text-on-surface hover:bg-surface-container transition-colors font-title-md text-title-md">
<span class="material-symbols-outlined text-[18px]" data-icon="download">download</span>
                            Export
                        </button>
</div>
</div>
<!-- Data Table -->
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse min-w-[800px]">
<thead>
<tr class="bg-surface-container-low border-b border-outline-variant">
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md sticky top-0 bg-surface-container-low">Collector Info</th>
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md sticky top-0 bg-surface-container-low">ID Number</th>
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md sticky top-0 bg-surface-container-low">Vehicle</th>
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md sticky top-0 bg-surface-container-low">Status</th>
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md sticky top-0 bg-surface-container-low">Rating</th>
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md sticky top-0 bg-surface-container-low text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/50">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md">
<div class="flex items-center gap-md">
<div class="w-8 h-8 rounded-full bg-primary-fixed text-primary flex items-center justify-center font-title-md text-title-md">
                                            JD
                                        </div>
<div>
<p class="font-title-md text-title-md text-on-surface">John Doe</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">North District</p>
</div>
</div>
</td>
<td class="py-sm px-md font-mono-md text-mono-md text-on-surface-variant">COL-8492</td>
<td class="py-sm px-md">
<div class="flex items-center gap-xs text-on-surface">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant" data-icon="local_shipping">local_shipping</span>
<span class="font-body-md text-body-md">TRK-01 (Heavy)</span>
</div>
</td>
<td class="py-sm px-md">
<span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-[#e6f4ea] text-[#137333] font-label-md text-label-md">
<span class="w-1.5 h-1.5 rounded-full bg-[#137333]"></span>
                                        On Route
                                    </span>
</td>
<td class="py-sm px-md">
<div class="flex items-center gap-xs text-primary">
<span class="material-symbols-outlined text-[16px] fill-current" data-icon="star" data-weight="fill">star</span>
<span class="font-title-md text-title-md">4.9</span>
</div>
</td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
</button>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md">
<div class="flex items-center gap-md">
<div class="w-8 h-8 rounded-full bg-secondary-fixed text-secondary flex items-center justify-center font-title-md text-title-md">
                                            AS
                                        </div>
<div>
<p class="font-title-md text-title-md text-on-surface">Alice Smith</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">East District</p>
</div>
</div>
</td>
<td class="py-sm px-md font-mono-md text-mono-md text-on-surface-variant">COL-3721</td>
<td class="py-sm px-md">
<div class="flex items-center gap-xs text-on-surface">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant" data-icon="local_shipping">local_shipping</span>
<span class="font-body-md text-body-md">TRK-14 (Medium)</span>
</div>
</td>
<td class="py-sm px-md">
<span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-surface-variant text-on-surface-variant font-label-md text-label-md">
<span class="w-1.5 h-1.5 rounded-full bg-on-surface-variant"></span>
                                        Off Duty
                                    </span>
</td>
<td class="py-sm px-md">
<div class="flex items-center gap-xs text-primary">
<span class="material-symbols-outlined text-[16px] fill-current" data-icon="star" data-weight="fill">star</span>
<span class="font-title-md text-title-md">4.7</span>
</div>
</td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
</button>
</td>
</tr>
<!-- Row 3 (Issue) -->
<tr class="hover:bg-surface-container-lowest/50 transition-colors group bg-error-container/10">
<td class="py-sm px-md">
<div class="flex items-center gap-md">
<div class="w-8 h-8 rounded-full bg-error/10 text-error flex items-center justify-center font-title-md text-title-md">
                                            MJ
                                        </div>
<div>
<p class="font-title-md text-title-md text-on-surface">Marcus Johnson</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">West District</p>
</div>
</div>
</td>
<td class="py-sm px-md font-mono-md text-mono-md text-on-surface-variant">COL-9920</td>
<td class="py-sm px-md">
<div class="flex items-center gap-xs text-on-surface">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant" data-icon="local_shipping">local_shipping</span>
<span class="font-body-md text-body-md">TRK-05 (Heavy)</span>
</div>
</td>
<td class="py-sm px-md">
<span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-error-container text-on-error-container font-label-md text-label-md">
<span class="w-1.5 h-1.5 rounded-full bg-error"></span>
                                        Vehicle Issue
                                    </span>
</td>
<td class="py-sm px-md">
<div class="flex items-center gap-xs text-primary">
<span class="material-symbols-outlined text-[16px] fill-current" data-icon="star" data-weight="fill">star</span>
<span class="font-title-md text-title-md">4.2</span>
</div>
</td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="p-md border-t border-outline-variant flex items-center justify-between text-body-sm text-on-surface-variant bg-surface-container-low/30">
<div>Showing 1 to 10 of 142 entries</div>
<div class="flex items-center gap-xs">
<button class="p-1 rounded hover:bg-surface-variant transition-colors disabled:opacity-50" disabled="">
<span class="material-symbols-outlined text-[20px]" data-icon="chevron_left">chevron_left</span>
</button>
<button class="w-8 h-8 rounded bg-primary text-on-primary font-title-md text-title-md flex items-center justify-center">1</button>
<button class="w-8 h-8 rounded hover:bg-surface-variant font-title-md text-title-md flex items-center justify-center transition-colors">2</button>
<button class="w-8 h-8 rounded hover:bg-surface-variant font-title-md text-title-md flex items-center justify-center transition-colors">3</button>
<span class="px-1">...</span>
<button class="p-1 rounded hover:bg-surface-variant transition-colors">
<span class="material-symbols-outlined text-[20px]" data-icon="chevron_right">chevron_right</span>
</button>
</div>
</div>
</div>
<div class="mt-xl text-center pb-xl">
<p class="font-body-sm text-body-sm text-on-surface-variant/70">EcoWaste Admin System v2.1.4</p>
</div>
