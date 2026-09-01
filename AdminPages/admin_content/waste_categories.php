<!-- Waste Categories view - loaded via admin_app.php -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-md mb-xl">
<div>
<h2 class="font-display-lg text-display-lg text-on-surface">Waste Categories</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">Manage waste classification types and their disposal guidelines.</p>
</div>
<button class="bg-primary text-on-primary font-title-md text-title-md px-lg py-sm rounded-DEFAULT flex items-center gap-sm hover:bg-surface-tint transition-colors shadow-sm self-start sm:self-auto">
<span class="material-symbols-outlined text-[20px]">add</span>
Add New Category
</button>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-lg mb-xl">
<div class="bg-surface-container-lowest rounded-DEFAULT border border-outline-variant p-lg shadow-[0px_1px_3px_rgba(0,0,0,0.05)] relative overflow-hidden group">
<div class="absolute top-0 right-0 p-lg text-primary/10 group-hover:scale-110 transition-transform duration-300">
<span class="material-symbols-outlined text-[64px]">category</span>
</div>
<p class="font-title-md text-title-md text-on-surface-variant mb-xs relative z-10">Total Categories</p>
<div class="flex items-end gap-sm relative z-10">
<span class="font-display-lg text-display-lg text-on-surface">12</span>
</div>
</div>
<div class="bg-surface-container-lowest rounded-DEFAULT border border-outline-variant p-lg shadow-[0px_1px_3px_rgba(0,0,0,0.05)] relative overflow-hidden group">
<div class="absolute top-0 right-0 p-lg text-secondary/10 group-hover:scale-110 transition-transform duration-300">
<span class="material-symbols-outlined text-[64px]">recycling</span>
</div>
<p class="font-title-md text-title-md text-on-surface-variant mb-xs relative z-10">Recyclable</p>
<div class="flex items-end gap-sm relative z-10">
<span class="font-display-lg text-display-lg text-on-surface">6</span>
</div>
</div>
<div class="bg-surface-container-lowest rounded-DEFAULT border border-outline-variant p-lg shadow-[0px_1px_3px_rgba(0,0,0,0.05)] relative overflow-hidden group">
<div class="absolute top-0 right-0 p-lg text-error/10 group-hover:scale-110 transition-transform duration-300">
<span class="material-symbols-outlined text-[64px]">warning</span>
</div>
<p class="font-title-md text-title-md text-on-surface-variant mb-xs relative z-10">Hazardous</p>
<div class="flex items-end gap-sm relative z-10">
<span class="font-display-lg text-display-lg text-on-surface">3</span>
</div>
</div>
</div>
<div class="bg-surface-container-lowest rounded-DEFAULT border border-outline-variant shadow-[0px_1px_3px_rgba(0,0,0,0.05)] flex flex-col overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse min-w-[800px]">
<thead>
<tr class="bg-surface-container-low border-b border-outline-variant">
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md">Category Name</th>
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md">Type</th>
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md">Disposal Method</th>
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md">Status</th>
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/50">
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md font-title-md text-title-md text-on-surface">General Waste</td>
<td class="py-sm px-md"><span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-surface-variant text-on-surface-variant font-label-md text-label-md">Landfill</span></td>
<td class="py-sm px-md text-on-surface-variant">Standard collection</td>
<td class="py-sm px-md"><span class="inline-flex items-center px-2 py-0.5 rounded-full bg-green-100 text-green-800 font-label-md text-[11px] font-bold">Active</span></td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md font-title-md text-title-md text-on-surface">Organic</td>
<td class="py-sm px-md"><span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-[#e6f4ea] text-[#137333] font-label-md text-label-md">Compostable</span></td>
<td class="py-sm px-md text-on-surface-variant">Composting facility</td>
<td class="py-sm px-md"><span class="inline-flex items-center px-2 py-0.5 rounded-full bg-green-100 text-green-800 font-label-md text-[11px] font-bold">Active</span></td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md font-title-md text-title-md text-on-surface">Plastic</td>
<td class="py-sm px-md"><span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-secondary-fixed text-primary font-label-md text-label-md">Recyclable</span></td>
<td class="py-sm px-md text-on-surface-variant">Sorting & recycling</td>
<td class="py-sm px-md"><span class="inline-flex items-center px-2 py-0.5 rounded-full bg-green-100 text-green-800 font-label-md text-[11px] font-bold">Active</span></td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md font-title-md text-title-md text-on-surface">Paper</td>
<td class="py-sm px-md"><span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-secondary-fixed text-primary font-label-md text-label-md">Recyclable</span></td>
<td class="py-sm px-md text-on-surface-variant">Pulping & recycling</td>
<td class="py-sm px-md"><span class="inline-flex items-center px-2 py-0.5 rounded-full bg-green-100 text-green-800 font-label-md text-[11px] font-bold">Active</span></td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md font-title-md text-title-md text-on-surface">Metal</td>
<td class="py-sm px-md"><span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-secondary-fixed text-primary font-label-md text-label-md">Recyclable</span></td>
<td class="py-sm px-md text-on-surface-variant">Smelting & reforming</td>
<td class="py-sm px-md"><span class="inline-flex items-center px-2 py-0.5 rounded-full bg-green-100 text-green-800 font-label-md text-[11px] font-bold">Active</span></td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md font-title-md text-title-md text-on-surface">Glass</td>
<td class="py-sm px-md"><span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-secondary-fixed text-primary font-label-md text-label-md">Recyclable</span></td>
<td class="py-sm px-md text-on-surface-variant">Crushing & melting</td>
<td class="py-sm px-md"><span class="inline-flex items-center px-2 py-0.5 rounded-full bg-green-100 text-green-800 font-label-md text-[11px] font-bold">Active</span></td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md font-title-md text-title-md text-on-surface">E-Waste</td>
<td class="py-sm px-md"><span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-error-container text-on-error-container font-label-md text-label-md">Hazardous</span></td>
<td class="py-sm px-md text-on-surface-variant">Specialized facility</td>
<td class="py-sm px-md"><span class="inline-flex items-center px-2 py-0.5 rounded-full bg-green-100 text-green-800 font-label-md text-[11px] font-bold">Active</span></td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md font-title-md text-title-md text-on-surface">Batteries</td>
<td class="py-sm px-md"><span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-error-container text-on-error-container font-label-md text-label-md">Hazardous</span></td>
<td class="py-sm px-md text-on-surface-variant">Chemical recovery</td>
<td class="py-sm px-md"><span class="inline-flex items-center px-2 py-0.5 rounded-full bg-green-100 text-green-800 font-label-md text-[11px] font-bold">Active</span></td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<div class="p-md border-t border-outline-variant flex items-center justify-between text-body-sm text-on-surface-variant bg-surface-container-low/30">
<div>Showing 1 to 8 of 12 entries</div>
<div class="flex items-center gap-xs">
<button class="p-1 rounded hover:bg-surface-variant transition-colors disabled:opacity-50" disabled="">
<span class="material-symbols-outlined text-[20px]">chevron_left</span>
</button>
<button class="w-8 h-8 rounded bg-primary text-on-primary font-title-md text-title-md flex items-center justify-center">1</button>
<button class="w-8 h-8 rounded hover:bg-surface-variant font-title-md text-title-md flex items-center justify-center transition-colors">2</button>
<button class="p-1 rounded hover:bg-surface-variant transition-colors">
<span class="material-symbols-outlined text-[20px]">chevron_right</span>
</button>
</div>
</div>
</div>
