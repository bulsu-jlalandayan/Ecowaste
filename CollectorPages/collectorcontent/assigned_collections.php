<!-- Assigned Collections view - loaded via collector_content.php -->
<!-- Page Header -->
<div class="mb-stack-lg">
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-2">Assigned Collections</h2>
<p class="font-body-md text-body-md text-on-surface-variant">View and manage waste collection requests assigned to you.</p>
</div>
<!-- Toolbar (Filters & Search) -->
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle p-4 mb-stack-lg grid grid-cols-1 sm:grid-cols-2 gap-4 items-end shadow-sm">
<!-- Search -->
<div class="relative sm:col-span-2">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input class="w-full pl-10 pr-4 py-2 h-11 bg-surface border border-border-subtle rounded-lg focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors font-body-sm text-body-sm" placeholder="Search Request ID or Address..." type="text"/>
</div>
<!-- Filters -->
<div class="sm:col-span-2 grid grid-cols-1 sm:grid-cols-3 gap-3">
<select class="w-full py-2.5 pl-3 pr-8 bg-surface border border-border-subtle rounded-lg focus:border-primary outline-none font-body-sm text-body-sm cursor-pointer">
<option value="">Status: All</option>
<option value="pending">Pending</option>
<option value="progress">In Progress</option>
</select>
<select class="w-full py-2.5 pl-3 pr-8 bg-surface border border-border-subtle rounded-lg focus:border-primary outline-none font-body-sm text-body-sm cursor-pointer">
<option value="">Date: Today</option>
<option value="tomorrow">Tomorrow</option>
<option value="week">This Week</option>
</select>
<select class="w-full py-2.5 pl-3 pr-8 bg-surface border border-border-subtle rounded-lg focus:border-primary outline-none font-body-sm text-body-sm cursor-pointer">
<option value="">Waste Type: All</option>
<option value="recyclable">Recyclable</option>
<option value="hazardous">Hazardous</option>
<option value="organic">Organic</option>
</select>
</div>
</div>
<!-- Data Table Card -->
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle shadow-sm overflow-hidden">
<div class="overflow-x-auto table-scroll">
<table class="w-full min-w-[720px] text-left border-collapse">
<thead class="sticky top-0 z-10">
<tr class="bg-surface-container-low border-b border-border-subtle">
<th class="sticky left-0 bg-surface-container-low py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant">Request ID</th>
<th class="py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant">Waste Type</th>
<th class="py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant">Quantity</th>
<th class="py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant">Address</th>
<th class="py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant">Schedule</th>
<th class="py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant">Status</th>
<th class="py-3 px-3 sm:px-4 font-label-md text-label-md text-on-surface-variant text-right">Action</th>
</tr>
</thead>
<tbody class="divide-y divide-border-subtle">
<!-- Row 1 -->
<tr class="hover:bg-surface transition-colors">
<td class="sticky left-0 bg-surface-container-lowest py-4 px-3 sm:px-4">
<span class="font-label-md text-label-md text-primary">REQ-1042</span>
</td>
<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-outline text-sm">precision_manufacturing</span>
                                        Industrial
                                    </div>
</td>
<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm text-on-surface-variant">500 kg</td>
<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm">
                                    124 Factory Lane, Sector 7<br/>
<span class="text-on-surface-variant text-xs">North District</span>
</td>
<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm">
                                    Oct 24, 2023<br/>
<span class="text-on-surface-variant text-xs">08:00 AM - 10:00 AM</span>
</td>
<td class="py-4 px-3 sm:px-4">
<span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-amber-100 text-status-pending">
                                        Pending
                                    </span>
</td>
<td class="py-4 px-3 sm:px-4 text-right">
<button data-view="collection_details" class="font-label-md text-label-md text-primary hover:text-secondary bg-primary-fixed bg-opacity-20 hover:bg-opacity-40 px-3 py-1.5 rounded-lg transition-colors whitespace-nowrap">
                                        View Details
                                    </button>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface transition-colors">
<td class="sticky left-0 bg-surface-container-lowest py-4 px-3 sm:px-4">
<span class="font-label-md text-label-md text-primary">REQ-1043</span>
</td>
<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-outline text-sm">warning</span>
                                        Hazardous
                                    </div>
</td>
<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm text-on-surface-variant">150 L</td>
<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm">
                                    BioMed Labs, Tech Park<br/>
<span class="text-on-surface-variant text-xs">East District</span>
</td>
<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm">
                                    Oct 24, 2023<br/>
<span class="text-on-surface-variant text-xs">11:30 AM - 12:30 PM</span>
</td>
<td class="py-4 px-3 sm:px-4">
<span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-status-progress">
                                        In Progress
                                    </span>
</td>
<td class="py-4 px-3 sm:px-4 text-right">
<button data-view="collection_details" class="font-label-md text-label-md text-primary hover:text-secondary bg-primary-fixed bg-opacity-20 hover:bg-opacity-40 px-3 py-1.5 rounded-lg transition-colors whitespace-nowrap">
                                        View Details
                                    </button>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface transition-colors">
<td class="sticky left-0 bg-surface-container-lowest py-4 px-3 sm:px-4">
<span class="font-label-md text-label-md text-primary">REQ-1045</span>
</td>
<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-outline text-sm">recycling</span>
                                        Recyclable
                                    </div>
</td>
<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm text-on-surface-variant">80 kg</td>
<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm">
                                    Sunrise Apartments, Block B<br/>
<span class="text-on-surface-variant text-xs">West District</span>
</td>
<td class="py-4 px-3 sm:px-4 font-body-sm text-body-sm">
                                    Oct 25, 2023<br/>
<span class="text-on-surface-variant text-xs">09:00 AM - 11:00 AM</span>
</td>
<td class="py-4 px-3 sm:px-4">
<span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-amber-100 text-status-pending">
                                        Pending
                                    </span>
</td>
<td class="py-4 px-3 sm:px-4 text-right">
<button data-view="collection_details" class="font-label-md text-label-md text-primary hover:text-secondary bg-primary-fixed bg-opacity-20 hover:bg-opacity-40 px-3 py-1.5 rounded-lg transition-colors whitespace-nowrap">
                                        View Details
                                    </button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination footer placeholder -->
<div class="bg-surface p-4 border-t border-border-subtle flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 text-sm text-on-surface-variant">
<span>Showing 1 to 3 of 12 entries</span>
<div class="flex gap-2">
<button class="px-3 py-1 border border-border-subtle rounded hover:bg-surface-container-low disabled:opacity-50" disabled="">Prev</button>
<button class="px-3 py-1 border border-border-subtle rounded hover:bg-surface-container-low">Next</button>
</div>
</div>
</div>
