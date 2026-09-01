<!-- Collection Requests view - loaded via admin_app.php -->
<!-- Canvas -->
<div class="flex-1 overflow-y-auto p-margin-desktop bg-background flex flex-col gap-lg">
<!-- Page Header & Global Actions -->
<div class="flex justify-between items-end">
<div>
<h2 class="font-display-lg text-display-lg font-bold text-on-surface">Collection Requests</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant mt-xs">Manage and assign incoming waste logistics.</p>
</div>
<div class="flex gap-sm">
<button class="flex items-center gap-xs px-lg py-2 bg-surface border border-outline-variant rounded text-on-surface font-title-md text-title-md hover:bg-surface-container-high transition-colors shadow-sm">
<span class="material-symbols-outlined text-[18px]">download</span>
                        Export
                    </button>
<button class="flex items-center gap-xs px-lg py-2 bg-surface border border-outline-variant rounded text-on-surface font-title-md text-title-md hover:bg-surface-container-high transition-colors shadow-sm">
<span class="material-symbols-outlined text-[18px]">map</span>
                        Map View
                    </button>
</div>
</div>
<!-- Filters & Controls Bar -->
<div class="bg-surface border border-outline-variant rounded shadow-[0px_1px_3px_rgba(0,0,0,0.05)] p-md flex flex-wrap gap-md items-center justify-between">
<div class="flex flex-wrap gap-md items-center">
<!-- Status Filter -->
<div class="flex flex-col gap-1">
<label class="font-label-md text-label-md text-on-surface-variant">Status</label>
<select class="bg-surface-container-lowest border border-outline-variant rounded px-3 py-1.5 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary min-w-[150px]">
<option>All Statuses</option>
<option>Unassigned</option>
<option>Scheduled</option>
<option>In Transit</option>
<option>Completed</option>
</select>
</div>
<!-- Waste Type Filter -->
<div class="flex flex-col gap-1">
<label class="font-label-md text-label-md text-on-surface-variant">Waste Type</label>
<select class="bg-surface-container-lowest border border-outline-variant rounded px-3 py-1.5 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary min-w-[150px]">
<option>All Types</option>
<option>General</option>
<option>Recyclable</option>
<option>Hazardous</option>
<option>Organic</option>
</select>
</div>
<!-- Date Filter -->
<div class="flex flex-col gap-1">
<label class="font-label-md text-label-md text-on-surface-variant">Date Range</label>
<input class="bg-surface-container-lowest border border-outline-variant rounded px-3 py-1.5 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary" type="date">
</div>
</div>
<!-- Bulk Actions -->
<div class="flex items-center gap-sm">
<span class="font-body-sm text-body-sm text-on-surface-variant">0 selected</span>
<button class="px-md py-1.5 bg-surface-container-highest text-on-surface-variant rounded font-title-md text-title-md opacity-50 cursor-not-allowed">
                        Bulk Assign
                    </button>
</div>
</div>
<!-- Data Table Container -->
<div class="bg-surface border border-outline-variant rounded shadow-[0px_1px_3px_rgba(0,0,0,0.05)] overflow-hidden flex-1 flex flex-col">
<div class="overflow-x-auto flex-1">
<table class="w-full text-left border-collapse">
<thead class="bg-surface-container-low border-b border-outline-variant sticky top-0 z-10">
<tr>
<th class="p-sm pl-md w-10">
<input class="rounded border-outline-variant text-primary focus:ring-primary" type="checkbox">
</th>
<th class="p-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Req ID</th>
<th class="p-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Location</th>
<th class="p-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Waste Type</th>
<th class="p-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Requested</th>
<th class="p-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Status</th>
<th class="p-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Collector</th>
<th class="p-sm pr-md font-label-md text-label-md text-on-surface-variant uppercase tracking-wider text-right">Action</th>
</tr>
</thead>
<tbody class="font-body-md text-body-md text-on-surface">
<!-- Row 1: Unassigned -->
<tr class="border-b border-surface-container-highest table-row-hover transition-colors">
<td class="p-sm pl-md">
<input class="rounded border-outline-variant text-primary focus:ring-primary" type="checkbox">
</td>
<td class="p-sm font-mono-md text-mono-md font-bold text-on-surface-variant">REQ-8992</td>
<td class="p-sm">
<div class="font-title-md text-title-md">1420 Alpha Way</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Zone B - Commercial</div>
</td>
<td class="p-sm">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface-variant font-label-md text-label-md">
<span class="material-symbols-outlined text-[14px]">warning</span>
                                        Hazardous
                                    </span>
</td>
<td class="p-sm text-on-surface-variant">Today, 08:30 AM</td>
<td class="p-sm">
<span class="inline-flex px-2 py-1 rounded bg-error-container text-on-error-container font-label-md text-label-md border border-[#ffb4ab]">
                                        Unassigned
                                    </span>
</td>
<td class="p-sm text-on-surface-variant italic font-body-sm text-body-sm">
                                    Pending Allocation
                                </td>
<td class="p-sm pr-md text-right">
<button class="px-md py-1.5 bg-primary text-on-primary rounded font-title-md text-title-md hover:bg-primary-container hover:text-on-primary-container transition-colors shadow-sm">
                                        Assign
                                    </button>
</td>
</tr>
<!-- Row 2: Scheduled -->
<tr class="border-b border-surface-container-highest table-row-hover transition-colors">
<td class="p-sm pl-md">
<input class="rounded border-outline-variant text-primary focus:ring-primary" type="checkbox">
</td>
<td class="p-sm font-mono-md text-mono-md font-bold text-on-surface-variant">REQ-8991</td>
<td class="p-sm">
<div class="font-title-md text-title-md">773 Beta Crescent</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Zone A - Residential</div>
</td>
<td class="p-sm">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface-variant font-label-md text-label-md">
<span class="material-symbols-outlined text-[14px]">recycling</span>
                                        Recyclable
                                    </span>
</td>
<td class="p-sm text-on-surface-variant">Today, 07:15 AM</td>
<td class="p-sm">
<span class="inline-flex px-2 py-1 rounded bg-secondary-fixed text-on-secondary-fixed font-label-md text-label-md border border-secondary-fixed-dim">
                                        Scheduled
                                    </span>
</td>
<td class="p-sm">
<div class="flex items-center gap-2">
<div class="w-6 h-6 rounded-full bg-surface-container-highest overflow-hidden">
<img class="w-full h-full object-cover" data-alt="A tiny profile portrait of a male waste collection driver wearing a high-vis vest. Professional, light corporate photography style." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDa42SAGWzBw-zkY4Gl_9jMdIxWR0lVUScNC9iW0HL79wagYSCGJiJK_-hKT29JdRY6739_FwNlvSnVw9ycm1Q14HECeDHU9CYYWZovCN7vcVpGiNfGcY2TyFZqD7Dh0o6eQl30Z5LlJ8N4I3GVNU3pCT9UzPktN4eljEjZIdDHMDr79VvLkxpr6sEjfOQaIVxM-Dbx6HFxnfVH0duf4WOcG_jhnKcMHHOX9FRkcGBZYjV27WusvcRU">
</div>
<span class="font-title-md text-title-md">J. Miller</span>
</div>
</td>
<td class="p-sm pr-md text-right">
<button class="p-1.5 text-on-surface-variant hover:text-primary transition-colors rounded hover:bg-surface-container-highest">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 3: In Transit -->
<tr class="border-b border-surface-container-highest table-row-hover transition-colors">
<td class="p-sm pl-md">
<input class="rounded border-outline-variant text-primary focus:ring-primary" type="checkbox">
</td>
<td class="p-sm font-mono-md text-mono-md font-bold text-on-surface-variant">REQ-8985</td>
<td class="p-sm">
<div class="font-title-md text-title-md">902 Gamma Blvd</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Zone C - Industrial</div>
</td>
<td class="p-sm">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface-variant font-label-md text-label-md">
<span class="material-symbols-outlined text-[14px]">delete</span>
                                        General
                                    </span>
</td>
<td class="p-sm text-on-surface-variant">Yesterday, 04:20 PM</td>
<td class="p-sm">
<span class="inline-flex px-2 py-1 rounded bg-surface-tint/10 text-surface-tint font-label-md text-label-md border border-surface-tint/20">
                                        In Transit
                                    </span>
</td>
<td class="p-sm">
<div class="flex items-center gap-2">
<div class="w-6 h-6 rounded-full bg-surface-container-highest overflow-hidden">
<img class="w-full h-full object-cover" data-alt="A tiny profile portrait of a female logistics driver smiling slightly. Bright, modern light mode setting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCHB21Zn-UaDx8f5Y0gl5pNZAXYS2fwwj8rbh8wOMwSiUgf3Z3L4MJjjzuEoYWotBpvMnCO3n8wrrQ4VQylrCkl3bvM_5uKXuSmQkjY4KZldgokpw-ZR-TUYm1Ah3VMwr3qquUo6M4raD36xOOrdbRPkfy6BInCi6uNgwTJnTUP0ZCCouSAV3V11_OgHZcBQdH08nHKrxX-nElizZpGc0pa-2L2idpBes2YF_beqnOz7wv7BX7WtQIz">
</div>
<span class="font-title-md text-title-md">S. Connor</span>
</div>
</td>
<td class="p-sm pr-md text-right">
<button class="p-1.5 text-on-surface-variant hover:text-primary transition-colors rounded hover:bg-surface-container-highest">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination Footer -->
<div class="p-sm px-md border-t border-outline-variant bg-surface-container-lowest flex items-center justify-between">
<span class="font-body-sm text-body-sm text-on-surface-variant">Showing 1 to 3 of 156 requests</span>
<div class="flex items-center gap-1">
<button class="p-1 rounded text-on-surface-variant hover:bg-surface-container-highest disabled:opacity-50" disabled="">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<button class="w-8 h-8 rounded bg-secondary-fixed text-on-secondary-fixed font-title-md text-title-md flex items-center justify-center">1</button>
<button class="w-8 h-8 rounded hover:bg-surface-container-highest text-on-surface-variant font-title-md text-title-md flex items-center justify-center">2</button>
<button class="w-8 h-8 rounded hover:bg-surface-container-highest text-on-surface-variant font-title-md text-title-md flex items-center justify-center">3</button>
<span class="text-on-surface-variant">...</span>
<button class="p-1 rounded text-on-surface-variant hover:bg-surface-container-highest">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</div>
</div>
</div>
