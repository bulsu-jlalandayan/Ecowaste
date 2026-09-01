
<!-- Activity History content fragment (loaded by resident.html via content.php) -->
<div class="p-margin max-w-7xl mx-auto flex flex-col gap-lg pb-24">
<!-- Header Section -->
<header>
<h1 class="font-headline-lg text-headline-lg text-primary mb-xs">Activity History</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
                Review your past service requests, reports, and community interactions. Track the progress and history of your environmental contributions.
            </p>
</header>
<!-- Controls: Search & Filter -->
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-md">
<!-- Search -->
<div class="relative w-full sm:w-96">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-surface-container-lowest border border-outline-variant rounded-full text-body-md font-body-md focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition-all placeholder:text-outline text-on-surface" placeholder="Search by ID or keyword..." type="text"/>
</div>
<!-- Filters -->
<div class="flex gap-sm overflow-x-auto pb-2 w-full sm:w-auto hide-scrollbar">
<button class="whitespace-nowrap px-md py-sm rounded-full bg-primary text-on-primary font-label-caps text-label-caps shadow-sm transition-all">All</button>
<button class="whitespace-nowrap px-md py-sm rounded-full border border-outline-variant text-on-surface-variant font-label-caps text-label-caps hover:bg-surface-container-low transition-colors">Reports</button>
<button class="whitespace-nowrap px-md py-sm rounded-full border border-outline-variant text-on-surface-variant font-label-caps text-label-caps hover:bg-surface-container-low transition-colors">Collections</button>
<button class="whitespace-nowrap px-md py-sm rounded-full border border-outline-variant text-on-surface-variant font-label-caps text-label-caps hover:bg-surface-container-low transition-colors">Recycling</button>
</div>
</div>
<!-- Data List / Table -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden shadow-[0_4px_16px_rgba(15,23,42,0.05)] transition-shadow">
<div class="table-scroll overflow-x-auto w-full">
<table class="w-full text-left border-collapse min-w-[800px]">
<thead>
<tr class="bg-surface-container-low border-b border-outline-variant text-label-caps font-label-caps text-on-surface-variant">
<th class="py-3 px-4 font-medium">Date / Time</th>
<th class="py-3 px-4 font-medium">Reference ID</th>
<th class="py-3 px-4 font-medium">Activity Type</th>
<th class="py-3 px-4 font-medium">Status</th>
<th class="py-3 px-4 font-medium text-right">Action</th>
</tr>
</thead>
<tbody class="text-body-sm font-body-sm text-on-surface divide-y divide-outline-variant">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="py-4 px-4 whitespace-nowrap">
<div class="font-data-mono text-data-mono">Oct 24, 2023</div>
<div class="text-on-surface-variant text-xs mt-1">09:15 AM</div>
</td>
<td class="py-4 px-4 font-data-mono text-data-mono text-primary font-medium">REQ-1048</td>
<td class="py-4 px-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-sm">local_shipping</span>
                                    Collection Completed
                                </div>
</td>
<td class="py-4 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-tertiary-container/10 text-tertiary-container border border-tertiary-container/30">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary-container"></span>
                                    Completed
                                </span>
</td>
<td class="py-4 px-4 text-right">
<button class="text-primary hover:text-primary-container font-medium transition-colors text-sm hover:underline">
                                    View Details
                                </button>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="py-4 px-4 whitespace-nowrap">
<div class="font-data-mono text-data-mono">Oct 22, 2023</div>
<div class="text-on-surface-variant text-xs mt-1">14:30 PM</div>
</td>
<td class="py-4 px-4 font-data-mono text-data-mono text-primary font-medium">RPT-8832</td>
<td class="py-4 px-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-sm">report_problem</span>
                                    Waste Report Resolved
                                </div>
</td>
<td class="py-4 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-primary-container/10 text-primary-container border border-primary-container/30">
<span class="w-1.5 h-1.5 rounded-full bg-primary-container"></span>
                                    Resolved
                                </span>
</td>
<td class="py-4 px-4 text-right">
<button class="text-primary hover:text-primary-container font-medium transition-colors text-sm hover:underline">
                                    View Details
                                </button>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="py-4 px-4 whitespace-nowrap">
<div class="font-data-mono text-data-mono">Oct 18, 2023</div>
<div class="text-on-surface-variant text-xs mt-1">11:05 AM</div>
</td>
<td class="py-4 px-4 font-data-mono text-data-mono text-primary font-medium">REQ-1042</td>
<td class="py-4 px-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-sm">local_shipping</span>
                                    Collection Request Submitted
                                </div>
</td>
<td class="py-4 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-secondary-container text-on-secondary-container border border-outline-variant">
<span class="w-1.5 h-1.5 rounded-full bg-on-secondary-container"></span>
                                    Pending
                                </span>
</td>
<td class="py-4 px-4 text-right">
<button class="text-primary hover:text-primary-container font-medium transition-colors text-sm hover:underline">
                                    View Details
                                </button>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="py-4 px-4 whitespace-nowrap">
<div class="font-data-mono text-data-mono">Oct 15, 2023</div>
<div class="text-on-surface-variant text-xs mt-1">16:45 PM</div>
</td>
<td class="py-4 px-4 font-data-mono text-data-mono text-primary font-medium">REC-4091</td>
<td class="py-4 px-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-sm">recycling</span>
                                    Recycling Bin Requested
                                </div>
</td>
<td class="py-4 px-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-tertiary-container/10 text-tertiary-container border border-tertiary-container/30">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary-container"></span>
                                    Completed
                                </span>
</td>
<td class="py-4 px-4 text-right">
<button class="text-primary hover:text-primary-container font-medium transition-colors text-sm hover:underline">
                                    View Details
                                </button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination / Footer -->
<div class="bg-surface-container-low border-t border-outline-variant p-4 flex items-center justify-between">
<span class="text-body-sm font-body-sm text-on-surface-variant">Showing 1-4 of 24 records</span>
<div class="flex items-center gap-2">
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant disabled:opacity-50" disabled="">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<button class="p-1 rounded hover:bg-surface-container text-on-surface-variant">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</div>
</div>
</div>

