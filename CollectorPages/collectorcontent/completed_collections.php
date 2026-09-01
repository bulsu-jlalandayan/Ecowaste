<!-- Completed Collections view - loaded via collector_content.php -->
<div class="mb-stack-lg">
<h2 class="font-headline-lg text-headline-lg md:font-headline-lg md:text-headline-lg text-on-background mb-1">Completed Collections</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant">View your completed collection history.</p>
</div>
<!-- Filters -->
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle p-4 mb-stack-md grid grid-cols-1 sm:grid-cols-2 lg:flex lg:flex-wrap gap-4 items-end">
<div class="sm:col-span-2 lg:flex-1 lg:min-w-[220px]">
<label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Search Requests</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input class="w-full pl-10 pr-4 py-2 h-12 border border-border-subtle rounded-lg focus:border-primary focus:ring-1 focus:ring-primary outline-none font-body-sm text-body-sm bg-surface-container-lowest" placeholder="Search by ID or Location" type="text"/>
</div>
</div>
<div class="sm:col-span-1 lg:w-auto">
<label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Date Range</label>
<input class="w-full px-4 py-2 h-12 border border-border-subtle rounded-lg focus:border-primary focus:ring-1 focus:ring-primary outline-none font-body-sm text-body-sm bg-surface-container-lowest text-on-surface" type="date"/>
</div>
<div class="sm:col-span-1 lg:w-auto">
<label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Waste Type</label>
<select class="w-full px-4 py-2 h-12 border border-border-subtle rounded-lg focus:border-primary focus:ring-1 focus:ring-primary outline-none font-body-sm text-body-sm bg-surface-container-lowest text-on-surface appearance-none">
<option>All Types</option>
<option>Recyclables</option>
<option>General Waste</option>
<option>Organic</option>
<option>Hazardous</option>
</select>
</div>
<button class="sm:col-span-2 lg:col-span-1 h-12 px-6 bg-primary-container text-on-primary rounded-lg font-label-md text-label-md hover:bg-primary transition-colors flex items-center justify-center gap-2">
<span class="material-symbols-outlined">filter_list</span>
                    Apply Filters
                </button>
</div>
<!-- Data Table -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
<div class="overflow-x-auto table-scroll">
<table class="w-full min-w-[820px] text-left border-collapse">
<thead class="sticky top-0 z-10">
<tr class="bg-surface-container-low border-b border-border-subtle">
<th class="sticky left-0 bg-surface-container-low py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Request ID</th>
<th class="py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Waste Type</th>
<th class="py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Quantity</th>
<th class="py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Location</th>
<th class="py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Collection Date</th>
<th class="py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Completed Date</th>
<th class="py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Proof</th>
<th class="py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap text-right">Action</th>
</tr>
</thead>
<tbody class="font-body-sm text-body-sm text-on-surface divide-y divide-border-subtle">
<tr class="hover:bg-surface-bright transition-colors group">
<td class="sticky left-0 bg-surface-container-lowest py-4 px-3 sm:px-4 font-medium">REQ-1040</td>
<td class="py-4 px-3 sm:px-4">
<span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full bg-secondary-fixed text-on-secondary-fixed-variant font-label-sm text-label-sm whitespace-nowrap">
<span class="w-2 h-2 rounded-full bg-primary-container"></span>
                                        Recyclables
                                    </span>
</td>
<td class="py-4 px-3 sm:px-4 whitespace-nowrap">12 Bags</td>
<td class="py-4 px-3 sm:px-4 whitespace-nowrap">102 Main St</td>
<td class="py-4 px-3 sm:px-4 whitespace-nowrap">Oct 22, 2023</td>
<td class="py-4 px-3 sm:px-4 text-on-surface-variant whitespace-nowrap">Oct 22, 2023, 14:30</td>
<td class="py-4 px-3 sm:px-4">
<button class="text-primary hover:text-primary-container flex items-center gap-1">
<span class="material-symbols-outlined text-xl">image</span>
</button>
</td>
<td class="py-4 px-3 sm:px-4 text-right">
<button class="text-primary font-label-md text-label-md hover:underline whitespace-nowrap">View Details</button>
</td>
</tr>
<tr class="hover:bg-surface-bright transition-colors group">
<td class="sticky left-0 bg-surface-container-lowest py-4 px-3 sm:px-4 font-medium">REQ-1041</td>
<td class="py-4 px-3 sm:px-4">
<span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm whitespace-nowrap">
<span class="w-2 h-2 rounded-full bg-outline"></span>
                                        General Waste
                                    </span>
</td>
<td class="py-4 px-3 sm:px-4 whitespace-nowrap">5 Bins</td>
<td class="py-4 px-3 sm:px-4 whitespace-nowrap">450 Oak Ave</td>
<td class="py-4 px-3 sm:px-4 whitespace-nowrap">Oct 21, 2023</td>
<td class="py-4 px-3 sm:px-4 text-on-surface-variant whitespace-nowrap">Oct 21, 2023, 09:15</td>
<td class="py-4 px-3 sm:px-4">
<button class="text-primary hover:text-primary-container flex items-center gap-1">
<span class="material-symbols-outlined text-xl">image</span>
</button>
</td>
<td class="py-4 px-3 sm:px-4 text-right">
<button class="text-primary font-label-md text-label-md hover:underline whitespace-nowrap">View Details</button>
</td>
</tr>
<tr class="hover:bg-surface-bright transition-colors group">
<td class="sticky left-0 bg-surface-container-lowest py-4 px-3 sm:px-4 font-medium">REQ-1038</td>
<td class="py-4 px-3 sm:px-4">
<span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed-variant font-label-sm text-label-sm whitespace-nowrap">
<span class="w-2 h-2 rounded-full bg-tertiary-container"></span>
                                        Hazardous
                                    </span>
</td>
<td class="py-4 px-3 sm:px-4 whitespace-nowrap">2 Drums</td>
<td class="py-4 px-3 sm:px-4 whitespace-nowrap">89 Industrial Pkwy</td>
<td class="py-4 px-3 sm:px-4 whitespace-nowrap">Oct 20, 2023</td>
<td class="py-4 px-3 sm:px-4 text-on-surface-variant whitespace-nowrap">Oct 20, 2023, 16:45</td>
<td class="py-4 px-3 sm:px-4">
<button class="text-primary hover:text-primary-container flex items-center gap-1">
<span class="material-symbols-outlined text-xl">image</span>
</button>
</td>
<td class="py-4 px-3 sm:px-4 text-right">
<button class="text-primary font-label-md text-label-md hover:underline whitespace-nowrap">View Details</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="px-4 py-3 border-t border-border-subtle bg-surface-container-lowest flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
<span class="font-body-sm text-body-sm text-on-surface-variant whitespace-nowrap">Showing 1 to 3 of 42 entries</span>
<div class="flex items-center gap-2">
<button class="p-2 border border-border-subtle rounded-lg text-on-surface-variant hover:bg-surface-container-low disabled:opacity-50" disabled="">
<span class="material-symbols-outlined text-xl">chevron_left</span>
</button>
<button class="w-8 h-8 flex items-center justify-center rounded-lg bg-primary-container text-on-primary font-label-sm text-label-sm">1</button>
<button class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-surface-container-low text-on-surface font-label-sm text-label-sm">2</button>
<button class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-surface-container-low text-on-surface font-label-sm text-label-sm">3</button>
<span class="text-on-surface-variant">...</span>
<button class="p-2 border border-border-subtle rounded-lg text-on-surface-variant hover:bg-surface-container-low">
<span class="material-symbols-outlined text-xl">chevron_right</span>
</button>
</div>
</div>
</div>
