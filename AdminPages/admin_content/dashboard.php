<!-- Dashboard view - loaded via admin_app.php -->
<div class="max-w-[1440px] mx-auto space-y-xl">
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-md">
<div>
<h2 class="font-display-lg text-display-lg text-on-background">Dashboard Overview</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-xs">Real-time metrics and operational status.</p>
</div>
<div class="flex gap-sm">
<button class="flex items-center gap-2 bg-surface-container-high hover:bg-surface-container-highest text-on-surface px-4 py-2 rounded-lg font-title-md text-title-md transition-colors border border-outline-variant">
<span class="material-symbols-outlined text-sm" style="font-variation-settings: &quot;FILL&quot; 0;">calendar_today</span>
                            Today
                        </button>
<button class="flex items-center gap-2 bg-primary hover:bg-surface-tint text-on-primary px-4 py-2 rounded-lg font-title-md text-title-md shadow-sm transition-colors">
<span class="material-symbols-outlined text-sm">download</span>
                            Export Report
                        </button>
</div>
</div>
<!-- KPI Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-md">
<!-- Stat Card 1 -->
<div class="bg-surface border border-outline-variant rounded-xl p-lg shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
<div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-6xl text-primary" style="font-variation-settings: &quot;FILL&quot; 1;">group</span>
</div>
<div class="flex items-center justify-between mb-md">
<span class="font-title-md text-title-md text-on-surface-variant">Total Users</span>
<span class="flex items-center text-primary font-label-md text-label-md bg-secondary-fixed px-2 py-1 rounded-full">
<span class="material-symbols-outlined text-xs mr-1">arrow_upward</span> 12%
                            </span>
</div>
<div class="font-display-lg text-display-lg text-on-surface">24,592</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-sm">Active this month</p>
</div>
<!-- Stat Card 2 -->
<div class="bg-surface border border-outline-variant rounded-xl p-lg shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
<div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-6xl text-error" style="font-variation-settings: &quot;FILL&quot; 1;">local_shipping</span>
</div>
<div class="flex items-center justify-between mb-md">
<span class="font-title-md text-title-md text-on-surface-variant">Active Requests</span>
<span class="flex items-center text-error font-label-md text-label-md bg-error-container px-2 py-1 rounded-full">
<span class="material-symbols-outlined text-xs mr-1">arrow_upward</span> 5%
                            </span>
</div>
<div class="font-display-lg text-display-lg text-on-surface">1,843</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-sm">Pending processing</p>
</div>
<!-- Stat Card 3 -->
<div class="bg-surface border border-outline-variant rounded-xl p-lg shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
<div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-6xl text-secondary" style="font-variation-settings: &quot;FILL&quot; 1;">assignment</span>
</div>
<div class="flex items-center justify-between mb-md">
<span class="font-title-md text-title-md text-on-surface-variant">Pending Assignments</span>
<span class="flex items-center text-on-surface-variant font-label-md text-label-md bg-surface-variant px-2 py-1 rounded-full">
<span class="material-symbols-outlined text-xs mr-1">horizontal_rule</span> 0%
                            </span>
</div>
<div class="font-display-lg text-display-lg text-on-surface">428</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-sm">Awaiting dispatch</p>
</div>
<!-- Stat Card 4 -->
<div class="bg-surface border border-outline-variant rounded-xl p-lg shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
<div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-6xl text-primary-container" style="font-variation-settings: &quot;FILL&quot; 1;">recycling</span>
</div>
<div class="flex items-center justify-between mb-md">
<span class="font-title-md text-title-md text-on-surface-variant">Recycling Rate</span>
<span class="flex items-center text-primary font-label-md text-label-md bg-secondary-fixed px-2 py-1 rounded-full">
<span class="material-symbols-outlined text-xs mr-1">arrow_upward</span> 2.4%
                            </span>
</div>
<div class="font-display-lg text-display-lg text-on-surface">68.5%</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-sm">Avg across zones</p>
</div>
</div>
<!-- Middle Section: Charts & Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-md">
<!-- Volume Chart -->
<div class="lg:col-span-2 bg-surface border border-outline-variant rounded-xl p-lg shadow-sm">
<div class="flex justify-between items-center mb-lg">
<h3 class="font-title-lg text-title-lg text-on-surface">Weekly Collection Volume</h3>
<button class="text-on-surface-variant hover:text-primary transition-colors">
<span class="material-symbols-outlined">more_vert</span>
</button>
</div>
<!-- Decorative Chart Area -->
<div class="h-64 w-full bg-surface-container-low rounded-lg relative overflow-hidden border border-outline-variant"><div class="absolute inset-0 flex flex-col justify-between py-4 px-6 opacity-20"><div class="w-full h-px bg-outline-variant"></div><div class="w-full h-px bg-outline-variant"></div><div class="w-full h-px bg-outline-variant"></div><div class="w-full h-px bg-outline-variant"></div></div><div class="absolute inset-0 flex items-end justify-around px-6 pb-4 gap-2"><div class="flex flex-col-reverse w-full h-full gap-1"><div class="w-full bg-primary rounded-t-sm" style="height: 45%"></div><div class="w-full bg-secondary opacity-50" style="height: 25%"></div><span class="text-[10px] text-on-surface-variant text-center mt-2">Mon</span></div><div class="flex flex-col-reverse w-full h-full gap-1"><div class="w-full bg-primary rounded-t-sm" style="height: 55%"></div><div class="w-full bg-secondary opacity-50" style="height: 30%"></div><span class="text-[10px] text-on-surface-variant text-center mt-2">Tue</span></div><div class="flex flex-col-reverse w-full h-full gap-1"><div class="w-full bg-primary rounded-t-sm" style="height: 40%"></div><div class="w-full bg-secondary opacity-50" style="height: 20%"></div><span class="text-[10px] text-on-surface-variant text-center mt-2">Wed</span></div><div class="flex flex-col-reverse w-full h-full gap-1"><div class="w-full bg-primary rounded-t-sm" style="height: 65%"></div><div class="w-full bg-secondary opacity-50" style="height: 15%"></div><span class="text-[10px] text-on-surface-variant text-center mt-2">Thu</span></div><div class="flex flex-col-reverse w-full h-full gap-1"><div class="w-full bg-primary rounded-t-sm" style="height: 50%"></div><div class="w-full bg-secondary opacity-50" style="height: 35%"></div><span class="text-[10px] text-on-surface-variant text-center mt-2">Fri</span></div><div class="flex flex-col-reverse w-full h-full gap-1"><div class="w-full bg-primary rounded-t-sm" style="height: 35%"></div><div class="w-full bg-secondary opacity-50" style="height: 25%"></div><span class="text-[10px] text-on-surface-variant text-center mt-2">Sat</span></div><div class="flex flex-col-reverse w-full h-full gap-1"><div class="w-full bg-primary rounded-t-sm" style="height: 30%"></div><div class="w-full bg-secondary opacity-50" style="height: 10%"></div><span class="text-[10px] text-on-surface-variant text-center mt-2">Sun</span></div></div></div>
<div class="flex justify-center gap-md mt-sm">
<div class="flex items-center gap-xs"><div class="w-3 h-3 rounded-full bg-primary"></div><span class="font-label-md text-label-md text-on-surface-variant">Organic</span></div>
<div class="flex items-center gap-xs"><div class="w-3 h-3 rounded-full bg-secondary"></div><span class="font-label-md text-label-md text-on-surface-variant">Recyclable (Est)</span></div>
</div>
</div>
<!-- Distribution Chart & Quick Actions -->
<div class="flex flex-col gap-md">
<!-- Doughnut -->
<div class="flex-1 bg-surface border border-outline-variant rounded-xl p-lg shadow-sm flex flex-col">
<h3 class="font-title-lg text-title-lg text-on-surface mb-md">Waste Distribution</h3>
<div class="flex-1 flex items-center justify-center relative"><svg class="w-40 h-40 transform -rotate-90" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="transparent" stroke="#7b7487" stroke-width="12" stroke-dasharray="251.3" stroke-dashoffset="0"></circle><circle cx="50" cy="50" r="40" fill="transparent" stroke="#4648d4" stroke-width="12" stroke-dasharray="251.3" stroke-dashoffset="113.1"></circle><circle cx="50" cy="50" r="40" fill="transparent" stroke="#630ed4" stroke-width="12" stroke-dasharray="251.3" stroke-dashoffset="0" style="stroke-dasharray: 138.2, 251.3;"></circle></svg><div class="absolute flex flex-col items-center justify-center"><span class="font-display-lg text-headline-lg font-bold text-on-surface">100%</span><span class="text-[10px] uppercase tracking-wider text-on-surface-variant font-bold">Total</span></div></div>
<div class="mt-md space-y-sm">
<div class="flex justify-between items-center"><div class="flex items-center gap-sm"><div class="w-3 h-3 rounded bg-primary"></div><span class="font-body-sm text-body-sm">Organic</span></div><span class="font-mono-md text-mono-md">55%</span></div>
<div class="flex justify-between items-center"><div class="flex items-center gap-sm"><div class="w-3 h-3 rounded bg-secondary"></div><span class="font-body-sm text-body-sm">Plastic</span></div><span class="font-mono-md text-mono-md">30%</span></div>
<div class="flex justify-between items-center"><div class="flex items-center gap-sm"><div class="w-3 h-3 rounded bg-outline"></div><span class="font-body-sm text-body-sm">Metal/Other</span></div><span class="font-mono-md text-mono-md">15%</span></div>
</div>
</div>
<!-- Quick Actions -->
<div class="bg-primary-container border border-outline-variant rounded-xl p-md shadow-sm">
<h3 class="font-title-md text-title-md text-on-primary-container mb-sm">Quick Actions</h3>
<div class="flex flex-col gap-sm">
<button class="w-full flex items-center justify-start gap-md bg-surface text-primary px-4 py-3 rounded-lg font-title-md text-title-md hover:bg-surface-container-high transition-colors shadow-sm">
<span class="material-symbols-outlined text-sm">person_add</span>
                                    Assign Collector
                                </button>
<button class="w-full flex items-center justify-start gap-md bg-surface text-primary px-4 py-3 rounded-lg font-title-md text-title-md hover:bg-surface-container-high transition-colors shadow-sm">
<span class="material-symbols-outlined text-sm">note_add</span>
                                    New Report
                                </button>
<button class="w-full flex items-center justify-start gap-md bg-surface text-primary px-4 py-3 rounded-lg font-title-md text-title-md hover:bg-surface-container-high transition-colors shadow-sm">
<span class="material-symbols-outlined text-sm">group_add</span>
                                    Add User
                                </button>
</div>
</div>
</div>
</div>
<!-- Recent Activity Table -->
<div class="bg-surface border border-outline-variant rounded-xl shadow-sm overflow-hidden">
<div class="px-lg py-md border-b border-outline-variant flex justify-between items-center bg-surface-container-lowest">
<h3 class="font-title-lg text-title-lg text-on-surface">Recent Collection Activities</h3>
<button class="text-primary font-label-md text-label-md hover:underline">View All</button>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low border-b border-outline-variant">
<th class="py-sm px-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">ID</th>
<th class="py-sm px-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Location</th>
<th class="py-sm px-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Type</th>
<th class="py-sm px-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Collector</th>
<th class="py-sm px-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Time</th>
<th class="py-sm px-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider text-right">Status</th>
</tr>
</thead>
<tbody class="font-body-md text-body-md divide-y divide-outline-variant">
<tr class="hover:bg-surface-container-lowest transition-colors group">
<td class="py-3 px-lg font-mono-md text-mono-md text-on-surface-variant group-hover:text-primary transition-colors">#REQ-8901</td>
<td class="py-3 px-lg text-on-surface">Sector 4, North District</td>
<td class="py-3 px-lg text-on-surface">Mixed Recyclables</td>
<td class="py-3 px-lg flex items-center gap-sm">
<div class="w-6 h-6 rounded-full bg-secondary-fixed text-primary flex items-center justify-center font-bold text-xs">JD</div>
                                        John Doe
                                    </td>
<td class="py-3 px-lg text-on-surface-variant">10:45 AM</td>
<td class="py-3 px-lg text-right">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-label-md text-label-md bg-secondary-fixed text-primary">
                                            In Progress
                                        </span>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest transition-colors group">
<td class="py-3 px-lg font-mono-md text-mono-md text-on-surface-variant group-hover:text-primary transition-colors">#REQ-8900</td>
<td class="py-3 px-lg text-on-surface">Downtown Core, Block B</td>
<td class="py-3 px-lg text-on-surface">Organic</td>
<td class="py-3 px-lg flex items-center gap-sm">
<div class="w-6 h-6 rounded-full bg-surface-variant text-on-surface-variant flex items-center justify-center font-bold text-xs">Un</div>
                                        Unassigned
                                    </td>
<td class="py-3 px-lg text-on-surface-variant">11:30 AM</td>
<td class="py-3 px-lg text-right">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-label-md text-label-md bg-surface-variant text-on-surface-variant">
                                            Scheduled
                                        </span>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest transition-colors group">
<td class="py-3 px-lg font-mono-md text-mono-md text-on-surface-variant group-hover:text-primary transition-colors">#REQ-8899</td>
<td class="py-3 px-lg text-on-surface">Industrial Park, East</td>
<td class="py-3 px-lg text-on-surface">Hazardous/Electronic</td>
<td class="py-3 px-lg flex items-center gap-sm">
<div class="w-6 h-6 rounded-full bg-secondary-fixed text-primary flex items-center justify-center font-bold text-xs">AS</div>
                                        Alice Smith
                                    </td>
<td class="py-3 px-lg text-on-surface-variant">09:15 AM</td>
<td class="py-3 px-lg text-right">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-label-md text-label-md bg-[#dcfce7] text-[#166534]">
                                            Completed
                                        </span>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest transition-colors group">
<td class="py-3 px-lg font-mono-md text-mono-md text-on-surface-variant group-hover:text-primary transition-colors">#REQ-8898</td>
<td class="py-3 px-lg text-on-surface">Residential Zone 2</td>
<td class="py-3 px-lg text-on-surface">General Waste</td>
<td class="py-3 px-lg flex items-center gap-sm">
<div class="w-6 h-6 rounded-full bg-secondary-fixed text-primary flex items-center justify-center font-bold text-xs">BJ</div>
                                        Bob Jones
                                    </td>
<td class="py-3 px-lg text-on-surface-variant">08:00 AM</td>
<td class="py-3 px-lg text-right">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-label-md text-label-md bg-[#dcfce7] text-[#166534]">
                                            Completed
                                        </span>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest transition-colors group">
<td class="py-3 px-lg font-mono-md text-mono-md text-on-surface-variant group-hover:text-primary transition-colors">#REQ-8897</td>
<td class="py-3 px-lg text-on-surface">Central Market Area</td>
<td class="py-3 px-lg text-on-surface">Organic</td>
<td class="py-3 px-lg flex items-center gap-sm">
<div class="w-6 h-6 rounded-full bg-secondary-fixed text-primary flex items-center justify-center font-bold text-xs">JD</div>
                                        John Doe
                                    </td>
<td class="py-3 px-lg text-on-surface-variant">07:30 AM</td>
<td class="py-3 px-lg text-right">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-label-md text-label-md bg-[#dcfce7] text-[#166534]">
                                            Completed
                                        </span>
</td>
</tr>
</tbody>
</table>
</div>
<div class="px-lg py-sm border-t border-outline-variant bg-surface-container-lowest flex justify-between items-center text-sm text-on-surface-variant">
<span>Showing 1 to 5 of 45 entries</span>
<div class="flex gap-2">
<button class="p-1 rounded hover:bg-surface-container-high transition-colors disabled:opacity-50"><span class="material-symbols-outlined text-sm">chevron_left</span></button>
<button class="p-1 rounded hover:bg-surface-container-high transition-colors"><span class="material-symbols-outlined text-sm">chevron_right</span></button>
</div>
</div>
</div>
</div>
