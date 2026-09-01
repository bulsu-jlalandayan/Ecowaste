<!-- Dashboard view - loaded via collector_content.php -->
<!-- Page Header -->
<div class="mb-stack-lg">
<h2 class="font-headline-lg text-headline-lg text-on-surface">Good morning, John Anderson</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant mt-2">Here's an overview of your collection tasks.</p>
</div>
<!-- Summary Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-3 sm:gap-gutter mb-stack-lg">
<!-- Card 1 -->
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle p-6 flex flex-col gap-2 hover:shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05),_0px_2px_4px_-2px_rgba(0,0,0,0.05)] transition-shadow">
<div class="flex items-center gap-3 text-on-surface-variant">
<span class="material-symbols-outlined text-primary">event_available</span>
<span class="font-label-md text-label-md uppercase tracking-wider">Assigned Today</span>
</div>
<span class="font-headline-lg text-headline-lg text-on-surface">8</span>
</div>
<!-- Card 2 -->
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle p-6 flex flex-col gap-2 hover:shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05),_0px_2px_4px_-2px_rgba(0,0,0,0.05)] transition-shadow">
<div class="flex items-center gap-3 text-on-surface-variant">
<span class="material-symbols-outlined text-status-pending">schedule</span>
<span class="font-label-md text-label-md uppercase tracking-wider">Pending Collections</span>
</div>
<span class="font-headline-lg text-headline-lg text-on-surface">4</span>
</div>
<!-- Card 3 -->
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle p-6 flex flex-col gap-2 hover:shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05),_0px_2px_4px_-2px_rgba(0,0,0,0.05)] transition-shadow">
<div class="flex items-center gap-3 text-on-surface-variant">
<span class="material-symbols-outlined text-status-progress">local_shipping</span>
<span class="font-label-md text-label-md uppercase tracking-wider">In Progress</span>
</div>
<span class="font-headline-lg text-headline-lg text-on-surface">2</span>
</div>
<!-- Card 4 -->
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle p-6 flex flex-col gap-2 hover:shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05),_0px_2px_4px_-2px_rgba(0,0,0,0.05)] transition-shadow">
<div class="flex items-center gap-3 text-on-surface-variant">
<span class="material-symbols-outlined text-status-completed">check_circle</span>
<span class="font-label-md text-label-md uppercase tracking-wider">Completed Today</span>
</div>
<span class="font-headline-lg text-headline-lg text-on-surface">2</span>
</div>
</div>
<!-- Main Content Area: Grids -->
<div class="grid grid-cols-1 xl:grid-cols-3 gap-container-margin">
<!-- Today's Collections Table -->
<div class="xl:col-span-2 bg-surface-container-lowest rounded-xl border border-border-subtle overflow-hidden">
<div class="p-6 border-b border-border-subtle flex justify-between items-center">
<h3 class="font-headline-sm text-headline-sm text-on-surface">Today's Collections</h3>
<button class="font-label-md text-label-md text-primary hover:text-primary-container transition-colors">View All</button>
</div>
<div class="overflow-x-auto table-scroll">
<table class="w-full min-w-[680px] text-left border-collapse">
<thead class="sticky top-0 z-10">
<tr class="bg-surface-container-low border-b border-border-subtle">
<th class="p-3 sm:p-4 font-label-sm text-label-sm text-on-surface-variant">Request ID</th>
<th class="p-3 sm:p-4 font-label-sm text-label-sm text-on-surface-variant">Resident</th>
<th class="p-3 sm:p-4 font-label-sm text-label-sm text-on-surface-variant">Waste Details</th>
<th class="p-3 sm:p-4 font-label-sm text-label-sm text-on-surface-variant">Location &amp; Time</th>
<th class="p-3 sm:p-4 font-label-sm text-label-sm text-on-surface-variant">Status</th>
<th class="p-3 sm:p-4 font-label-sm text-label-sm text-on-surface-variant text-right">Action</th>
</tr>
</thead>
<tbody class="font-body-sm text-body-sm text-on-surface">
<!-- Row 1 -->
<tr class="border-b border-border-subtle hover:bg-surface-container-low transition-colors">
<td class="p-3 sm:p-4 font-label-md text-label-md text-on-surface whitespace-nowrap">REQ-1042</td>
<td class="p-3 sm:p-4 whitespace-nowrap">Sarah Miller</td>
<td class="p-3 sm:p-4">
<div class="flex flex-col">
<span>Household</span>
<span class="text-on-surface-variant text-xs">4 Bags</span>
</div>
</td>
<td class="p-3 sm:p-4">
<div class="flex flex-col">
<span>24 Oak St</span>
<span class="text-on-surface-variant text-xs">9:30 AM</span>
</div>
</td>
<td class="p-3 sm:p-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 whitespace-nowrap">
                                            Pending
                                        </span>
</td>
<td class="p-3 sm:p-4 text-right">
<button class="font-label-md text-label-md text-primary hover:text-primary-container transition-colors whitespace-nowrap" data-view="collection_details">View Details</button>
</td>
</tr>
<!-- Row 2 -->
<tr class="border-b border-border-subtle hover:bg-surface-container-low transition-colors">
<td class="p-3 sm:p-4 font-label-md text-label-md text-on-surface whitespace-nowrap">REQ-1045</td>
<td class="p-3 sm:p-4 whitespace-nowrap">David Chen</td>
<td class="p-3 sm:p-4">
<div class="flex flex-col">
<span>Recyclables</span>
<span class="text-on-surface-variant text-xs">2 Bins</span>
</div>
</td>
<td class="p-3 sm:p-4">
<div class="flex flex-col">
<span>112 Pine Blvd</span>
<span class="text-on-surface-variant text-xs">10:15 AM</span>
</div>
</td>
<td class="p-3 sm:p-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 whitespace-nowrap">
                                            In Progress
                                        </span>
</td>
<td class="p-3 sm:p-4 text-right">
<button class="font-label-md text-label-md text-primary hover:text-primary-container transition-colors whitespace-nowrap" data-view="collection_details">View Details</button>
</td>
</tr>
<!-- Row 3 -->
<tr class="border-b border-border-subtle hover:bg-surface-container-low transition-colors">
<td class="p-3 sm:p-4 font-label-md text-label-md text-on-surface whitespace-nowrap">REQ-1048</td>
<td class="p-3 sm:p-4 whitespace-nowrap">Elena Rodriguez</td>
<td class="p-3 sm:p-4">
<div class="flex flex-col">
<span>Yard Waste</span>
<span class="text-on-surface-variant text-xs">1 Bundle</span>
</div>
</td>
<td class="p-3 sm:p-4">
<div class="flex flex-col">
<span>88 Maple Ave</span>
<span class="text-on-surface-variant text-xs">11:00 AM</span>
</div>
</td>
<td class="p-3 sm:p-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 whitespace-nowrap">
                                            Completed
                                        </span>
</td>
<td class="p-3 sm:p-4 text-right">
<button class="font-label-md text-label-md text-primary hover:text-primary-container transition-colors whitespace-nowrap" data-view="collection_details">View Details</button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Upcoming Collections -->
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle p-6 flex flex-col">
<div class="border-b border-border-subtle pb-4 mb-4">
<h3 class="font-headline-sm text-headline-sm text-on-surface">Upcoming Collections</h3>
</div>
<div class="flex flex-col gap-4 flex-1">
<!-- List Item 1 -->
<div class="flex gap-4 p-4 rounded-lg border border-border-subtle hover:bg-surface-container-low transition-colors">
<div class="w-12 h-12 rounded bg-surface-container flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-on-surface-variant">event</span>
</div>
<div class="flex-1">
<div class="flex justify-between items-start">
<h4 class="font-label-md text-label-md text-on-surface">REQ-1051 - Bulky Items</h4>
<span class="font-label-sm text-label-sm text-primary">Tomorrow</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">45 Cedar Ln • 9:00 AM</p>
</div>
</div>
<!-- List Item 2 -->
<div class="flex gap-4 p-4 rounded-lg border border-border-subtle hover:bg-surface-container-low transition-colors">
<div class="w-12 h-12 rounded bg-surface-container flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-on-surface-variant">event</span>
</div>
<div class="flex-1">
<div class="flex justify-between items-start">
<h4 class="font-label-md text-label-md text-on-surface">REQ-1055 - E-Waste</h4>
<span class="font-label-sm text-label-sm text-primary">Tomorrow</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">12 Birch Rd • 1:30 PM</p>
</div>
</div>
<!-- List Item 3 -->
<div class="flex gap-4 p-4 rounded-lg border border-border-subtle hover:bg-surface-container-low transition-colors">
<div class="w-12 h-12 rounded bg-surface-container flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-on-surface-variant">event</span>
</div>
<div class="flex-1">
<div class="flex justify-between items-start">
<h4 class="font-label-md text-label-md text-on-surface">REQ-1060 - Household</h4>
<span class="font-label-sm text-label-sm text-on-surface-variant">Oct 26</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">67 Elm St • 8:45 AM</p>
</div>
</div>
</div>
<div class="mt-4 pt-4 border-t border-border-subtle">
<button class="w-full py-2 bg-secondary-fixed text-on-secondary-fixed-variant rounded-lg font-label-md text-label-md hover:opacity-90 transition-opacity">
                            View Schedule
                        </button>
</div>
</div>
</div>
