<!-- My Requests content fragment (loaded by resident.html via content.php) -->
<div class="p-margin max-w-7xl mx-auto flex flex-col gap-lg">
<!-- Header Section -->
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-md">
<div>
<h2 class="font-headline-lg text-headline-lg text-on-surface">My Requests</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-xs">Track and manage your waste collection requests.</p>
</div>
<div class="flex items-center gap-md w-full sm:w-auto">
<!-- Search Bar -->
<div class="relative flex-1 sm:flex-none">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-on-surface-variant">
<span class="material-symbols-outlined text-[20px]">search</span>
</div>
<input class="pl-10 pr-4 py-2 border border-outline-variant rounded-lg focus:ring-1 focus:ring-primary focus:border-primary text-body-sm text-body-sm shadow-sm bg-surface-container-lowest text-on-surface placeholder:text-outline w-full sm:w-64" placeholder="Search Request ID..." type="text"/>
</div>
<!-- New Request Button -->
<button class="inline-flex items-center gap-2 px-4 py-2 bg-primary text-on-primary rounded-lg font-body-md text-body-md font-semibold hover:bg-primary-container focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary shadow-sm transition-colors" type="button">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">add</span>
            New Request
          </button>
</div>
</div>
<!-- Filter Tabs -->
<div class="flex gap-2 flex-wrap">
<button class="px-4 py-1.5 rounded-full border border-primary bg-primary-container/10 text-primary font-body-md text-body-md font-medium flex items-center justify-center min-w-[4rem] transition-colors">
          All
        </button>
<button class="px-4 py-1.5 rounded-full border border-outline-variant text-on-surface-variant hover:bg-surface-container font-body-md text-body-md transition-colors">
          Pending
        </button>
<button class="px-4 py-1.5 rounded-full border border-outline-variant text-on-surface-variant hover:bg-surface-container font-body-md text-body-md transition-colors">
          Assigned
        </button>
<button class="px-4 py-1.5 rounded-full border border-outline-variant text-on-surface-variant hover:bg-surface-container font-body-md text-body-md transition-colors">
          Scheduled
        </button>
<button class="px-4 py-1.5 rounded-full border border-outline-variant text-on-surface-variant hover:bg-surface-container font-body-md text-body-md transition-colors">
          Completed
        </button>
</div>
<!-- Requests Table -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden shadow-sm">
<table class="min-w-full divide-y divide-outline-variant text-left">
<thead class="bg-surface-container-low">
<tr>
<th class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider w-1/5" scope="col">Request ID</th>
<th class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider w-1/4" scope="col">Waste Type</th>
<th class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider w-1/5" scope="col">Date Requested</th>
<th class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider w-1/5" scope="col">Status</th>
<th class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider text-right w-32" scope="col">Action</th>
</tr>
</thead>
<tbody class="bg-surface-container-lowest divide-y divide-outline-variant">
<!-- Row 1: Hazardous -->
<tr class="hover:bg-surface-container-low transition-colors">
<td class="px-6 py-4 whitespace-nowrap font-body-md text-body-md font-semibold text-on-surface">
                REQ-8092
              </td>
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-error text-[20px]" style="font-variation-settings: 'FILL' 1;">warning</span>
<span class="font-body-md text-body-md text-on-surface">Hazardous</span>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap font-body-md text-body-md text-on-surface-variant">
                Oct 24, 2023
              </td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full font-label-caps text-label-caps bg-error-container text-on-error-container">
<span class="w-1.5 h-1.5 rounded-full bg-error"></span>
                  Pending
                </span>
</td>
<td class="px-6 py-4 whitespace-nowrap text-right font-body-md text-body-md">
<a class="text-primary hover:text-primary-container transition-colors font-semibold" href="#">View Details</a>
</td>
</tr>
<!-- Row 2: Bulk Furniture -->
<tr class="hover:bg-surface-container-low transition-colors">
<td class="px-6 py-4 whitespace-nowrap font-body-md text-body-md font-semibold text-on-surface">
                REQ-8091
              </td>
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]" style="font-variation-settings: 'FILL' 1;">inventory_2</span>
<span class="font-body-md text-body-md text-on-surface">Bulk Furniture</span>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap font-body-md text-body-md text-on-surface-variant">
                Oct 22, 2023
              </td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full font-label-caps text-label-caps bg-secondary-container text-on-secondary-container">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                  Scheduled
                </span>
</td>
<td class="px-6 py-4 whitespace-nowrap text-right font-body-md text-body-md">
<a class="text-primary hover:text-primary-container transition-colors font-semibold" href="#">View Details</a>
</td>
</tr>
<!-- Row 3: Yard Waste -->
<tr class="hover:bg-surface-container-low transition-colors">
<td class="px-6 py-4 whitespace-nowrap font-body-md text-body-md font-semibold text-on-surface">
                REQ-8088
              </td>
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]" style="font-variation-settings: 'FILL' 1;">eco</span>
<span class="font-body-md text-body-md text-on-surface">Yard Waste</span>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap font-body-md text-body-md text-on-surface-variant">
                Oct 15, 2023
              </td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full font-label-caps text-label-caps bg-primary-container/10 text-primary">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                  Completed
                </span>
</td>
<td class="px-6 py-4 whitespace-nowrap text-right font-body-md text-body-md">
<a class="text-primary hover:text-primary-container transition-colors font-semibold" href="#">View Details</a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
