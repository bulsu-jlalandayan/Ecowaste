<!-- Users view - loaded via admin_app.php -->
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-md mb-xl">
<div>
<h2 class="font-display-lg text-display-lg text-on-surface mb-xs">User Management</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Manage residents, collectors, and system access.</p>
</div>
<div class="flex items-center gap-sm">
<button class="px-md py-sm bg-surface-container-lowest border border-outline-variant rounded-DEFAULT font-title-md text-title-md text-on-surface-variant hover:bg-surface-container-highest transition-colors flex items-center gap-xs shadow-sm">
<span class="material-symbols-outlined text-[18px]">download</span>
                    Export
                </button>
<button class="px-md py-sm bg-primary rounded-DEFAULT font-title-md text-title-md text-on-primary hover:bg-primary/90 transition-colors flex items-center gap-xs shadow-sm">
<span class="material-symbols-outlined text-[18px]">add</span>
                    Add New User
                </button>
</div>
</div>
<!-- Content Area - Card Container -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl shadow-[0px_1px_3px_rgba(0,0,0,0.05)] overflow-hidden">
<!-- Toolbar / Filters -->
<div class="p-lg border-b border-outline-variant bg-surface flex flex-col sm:flex-row justify-between items-start sm:items-center gap-md">
<!-- Tabs -->
<div class="flex bg-surface-container-high rounded-lg p-xs">
<button class="px-md py-xs rounded bg-surface-container-lowest shadow-sm font-title-md text-title-md text-primary">All</button>
<button class="px-md py-xs rounded font-title-md text-title-md text-on-surface-variant hover:text-on-surface transition-colors">Residents</button>
<button class="px-md py-xs rounded font-title-md text-title-md text-on-surface-variant hover:text-on-surface transition-colors">Collectors</button>
</div>
<!-- Filter Actions -->
<div class="flex items-center gap-sm">
<div class="relative">
<select class="appearance-none pl-md pr-xl py-sm bg-surface-container-lowest border border-outline-variant rounded-DEFAULT font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all cursor-pointer">
<option>Status: All</option>
<option>Active</option>
<option>Inactive</option>
</select>
<span class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none text-[20px]">arrow_drop_down</span>
</div>
<button class="p-sm bg-surface-container-lowest border border-outline-variant rounded-DEFAULT text-on-surface-variant hover:bg-surface-container-highest transition-colors">
<span class="material-symbols-outlined text-[20px]">filter_list</span>
</button>
</div>
</div>
<!-- Data Table -->
<div class="overflow-x-auto table-scroll">
<table class="w-full text-left border-collapse min-w-[800px]">
<thead>
<tr class="bg-[#f1f5f9] border-b border-outline-variant font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">
<th class="p-sm pl-lg w-[300px]">User</th>
<th class="p-sm w-[150px]">Role</th>
<th class="p-sm w-[150px]">Status</th>
<th class="p-sm w-[200px]">Last Activity</th>
<th class="p-sm pr-lg w-[100px] text-right">Actions</th>
</tr>
</thead>
<tbody class="font-body-md text-body-md text-on-surface divide-y divide-outline-variant/50">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="p-sm pl-lg py-sm">
<div class="flex items-center gap-md">
<div class="w-10 h-10 rounded-full bg-secondary-fixed text-on-secondary-fixed flex items-center justify-center font-title-md">
                                            JD
                                        </div>
<div>
<div class="font-title-md text-title-md">Jane Doe</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">jane.doe@example.com</div>
</div>
</div>
</td>
<td class="p-sm">Resident</td>
<td class="p-sm">
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-green-100 text-green-800 font-label-md text-[11px] font-bold">Active</span>
</td>
<td class="p-sm text-on-surface-variant">Today, 10:24 AM</td>
<td class="p-sm pr-lg text-right">
<button class="p-xs text-on-surface-variant hover:text-primary transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100" title="Edit">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
<button class="p-xs text-on-surface-variant hover:text-error transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100" title="More">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="p-sm pl-lg py-sm">
<div class="flex items-center gap-md">
<div class="w-10 h-10 rounded-full bg-surface-variant text-on-surface flex items-center justify-center font-title-md">
                                            MS
                                        </div>
<div>
<div class="font-title-md text-title-md">Michael Smith</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">m.smith@logistics.com</div>
</div>
</div>
</td>
<td class="p-sm">Collector</td>
<td class="p-sm">
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-green-100 text-green-800 font-label-md text-[11px] font-bold">Active</span>
</td>
<td class="p-sm text-on-surface-variant">Yesterday, 4:30 PM</td>
<td class="p-sm pr-lg text-right">
<button class="p-xs text-on-surface-variant hover:text-primary transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
<button class="p-xs text-on-surface-variant hover:text-error transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="p-sm pl-lg py-sm">
<div class="flex items-center gap-md">
<div class="w-10 h-10 rounded-full bg-surface-variant text-on-surface flex items-center justify-center font-title-md">
                                            AJ
                                        </div>
<div>
<div class="font-title-md text-title-md">Alex Johnson</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">alex.j@example.com</div>
</div>
</div>
</td>
<td class="p-sm">Resident</td>
<td class="p-sm">
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-surface-variant text-on-surface-variant font-label-md text-[11px] font-bold">Inactive</span>
</td>
<td class="p-sm text-on-surface-variant">Oct 12, 2023</td>
<td class="p-sm pr-lg text-right">
<button class="p-xs text-on-surface-variant hover:text-primary transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
<button class="p-xs text-on-surface-variant hover:text-error transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="p-md border-t border-outline-variant bg-surface flex justify-between items-center">
<p class="font-body-sm text-body-sm text-on-surface-variant">Showing 1 to 10 of 245 users</p>
<div class="flex items-center gap-xs">
<button class="w-8 h-8 flex items-center justify-center rounded border border-outline-variant text-on-surface-variant hover:bg-surface-container-highest disabled:opacity-50" disabled="">
<span class="material-symbols-outlined text-[18px]">chevron_left</span>
</button>
<button class="w-8 h-8 flex items-center justify-center rounded bg-primary text-on-primary font-title-sm">1</button>
<button class="w-8 h-8 flex items-center justify-center rounded border border-transparent text-on-surface hover:bg-surface-container-highest font-title-sm">2</button>
<button class="w-8 h-8 flex items-center justify-center rounded border border-transparent text-on-surface hover:bg-surface-container-highest font-title-sm">3</button>
<span class="px-1 text-on-surface-variant">...</span>
<button class="w-8 h-8 flex items-center justify-center rounded border border-outline-variant text-on-surface-variant hover:bg-surface-container-highest">
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</button>
</div>
</div>
</div>
