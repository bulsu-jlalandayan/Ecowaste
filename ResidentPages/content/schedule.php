<!-- Schedule content fragment (loaded by resident.html via content.php) -->
<div class="p-margin max-w-7xl mx-auto flex flex-col gap-lg">
<!-- Header -->
<div>
<h1 class="font-headline-lg text-headline-lg text-primary mb-xs">Collection Schedule</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant">Stay informed about upcoming waste collections in your area.</p>
</div>
<!-- Controls -->
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-md gap-md">
<div class="flex bg-surface-container-low rounded-full p-1 border border-outline-variant">
<button class="px-md py-sm rounded-full bg-primary text-on-primary font-body-sm text-body-sm font-semibold shadow-sm transition-all">Calendar</button>
<button class="px-md py-sm rounded-full text-on-surface-variant font-body-sm text-body-sm hover:bg-surface-variant transition-all">List</button>
</div>
<div class="flex gap-sm overflow-x-auto pb-2 w-full sm:w-auto">
<button class="whitespace-nowrap px-md py-sm rounded-full border border-primary text-primary font-label-caps text-label-caps hover:bg-surface-container-low transition-colors">ALL TYPES</button>
<button class="whitespace-nowrap px-md py-sm rounded-full border border-outline-variant text-on-surface-variant font-label-caps text-label-caps hover:bg-surface-container-low transition-colors">GENERAL</button>
<button class="whitespace-nowrap px-md py-sm rounded-full border border-outline-variant text-on-surface-variant font-label-caps text-label-caps hover:bg-surface-container-low transition-colors">RECYCLING</button>
</div>
</div>
<div class="grid grid-cols-1 xl:grid-cols-3 gap-gutter">
<!-- Calendar Section -->
<div class="xl:col-span-2 flex flex-col gap-md">
<!-- Calendar Card -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-md">
<!-- Calendar Header -->
<div class="flex justify-between items-center mb-md">
<h2 class="font-headline-md text-headline-md text-on-background">October 2024</h2>
<div class="flex gap-sm">
<button class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-surface-container-low border border-outline-variant text-on-surface-variant"><span class="material-symbols-outlined">chevron_left</span></button>
<button class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-surface-container-low border border-outline-variant text-on-surface-variant"><span class="material-symbols-outlined">chevron_right</span></button>
</div>
</div>
<!-- Calendar Grid -->
<div class="grid grid-cols-7 gap-xs text-center mb-sm">
<div class="font-label-caps text-label-caps text-on-surface-variant py-xs">SUN</div>
<div class="font-label-caps text-label-caps text-on-surface-variant py-xs">MON</div>
<div class="font-label-caps text-label-caps text-on-surface-variant py-xs">TUE</div>
<div class="font-label-caps text-label-caps text-on-surface-variant py-xs">WED</div>
<div class="font-label-caps text-label-caps text-on-surface-variant py-xs">THU</div>
<div class="font-label-caps text-label-caps text-on-surface-variant py-xs">FRI</div>
<div class="font-label-caps text-label-caps text-on-surface-variant py-xs">SAT</div>
</div>
<!-- Calendar Days (Sample) -->
<div class="grid grid-cols-7 gap-xs">
<!-- Empty slots -->
<div class="aspect-square p-xs flex flex-col items-center border border-transparent"></div>
<!-- Days -->
<div class="aspect-square p-xs flex flex-col items-center justify-start border border-outline-variant rounded-lg bg-surface-bright hover:border-primary cursor-pointer transition-colors group">
<span class="font-data-mono text-data-mono text-on-surface-variant group-hover:text-primary mt-1">1</span>
</div>
<div class="aspect-square p-xs flex flex-col items-center justify-start border border-outline-variant rounded-lg bg-surface-bright hover:border-primary cursor-pointer transition-colors group">
<span class="font-data-mono text-data-mono text-on-surface-variant group-hover:text-primary mt-1">2</span>
<div class="mt-auto flex gap-1 mb-1">
<div class="w-2 h-2 rounded-full bg-[#16a34a]" title="General Waste"></div>
</div>
</div>
<!-- Add more days here to fill grid ... -->
<div class="aspect-square p-xs flex flex-col items-center justify-start border-2 border-primary rounded-lg bg-surface-container-low cursor-pointer transition-colors shadow-[0_4px_4px_rgba(0,0,0,0.05)]">
<span class="font-data-mono text-data-mono font-bold text-primary mt-1">25</span>
<div class="mt-auto flex gap-1 mb-1">
<div class="w-2 h-2 rounded-full bg-[#16a34a]" title="General Waste"></div>
<div class="w-2 h-2 rounded-full bg-[#2563eb]" title="Recyclables"></div>
</div>
</div>
</div>
</div>
<!-- Legend Card -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-md">
<h3 class="font-label-caps text-label-caps text-on-surface-variant mb-sm border-b border-outline-variant pb-xs">COLLECTION TYPES</h3>
<div class="flex flex-wrap gap-md">
<div class="flex items-center gap-xs">
<div class="w-3 h-3 rounded-full bg-[#16a34a]"></div>
<span class="font-body-sm text-body-sm text-on-background">General Waste</span>
</div>
<div class="flex items-center gap-xs">
<div class="w-3 h-3 rounded-full bg-[#2563eb]"></div>
<span class="font-body-sm text-body-sm text-on-background">Recyclables</span>
</div>
<div class="flex items-center gap-xs">
<div class="w-3 h-3 rounded-full bg-[#a16207]"></div>
<span class="font-body-sm text-body-sm text-on-background">Organic / Green</span>
</div>
<div class="flex items-center gap-xs">
<div class="w-3 h-3 rounded-full bg-[#dc2626]"></div>
<span class="font-body-sm text-body-sm text-on-background">Hazardous</span>
</div>
</div>
</div>
</div>
<!-- Upcoming List Section -->
<div class="xl:col-span-1 flex flex-col">
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-md flex-1">
<h3 class="font-headline-md text-headline-md text-on-background mb-md border-b border-outline-variant pb-sm">Upcoming Collections</h3>
<div class="flex flex-col gap-sm">
<!-- Collection Item 1 -->
<div class="p-sm rounded-lg border border-outline-variant bg-surface hover:bg-surface-container-low transition-colors flex items-start gap-sm">
<div class="w-10 h-10 rounded-full bg-[#16a34a]/10 flex items-center justify-center text-[#16a34a] shrink-0">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">delete</span>
</div>
<div class="flex-1">
<p class="font-body-md text-body-md font-semibold text-on-background">General Waste</p>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-1">Wednesday, Oct 25</p>
<p class="font-data-mono text-data-mono text-on-surface-variant">08:00 AM - 12:00 PM</p>
</div>
<div class="px-2 py-1 rounded bg-secondary-container text-on-secondary-container font-label-caps text-label-caps">
                                CONFIRMED
                            </div>
</div>
<!-- Collection Item 2 -->
<div class="p-sm rounded-lg border border-outline-variant bg-surface hover:bg-surface-container-low transition-colors flex items-start gap-sm">
<div class="w-10 h-10 rounded-full bg-[#2563eb]/10 flex items-center justify-center text-[#2563eb] shrink-0">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">recycling</span>
</div>
<div class="flex-1">
<p class="font-body-md text-body-md font-semibold text-on-background">Recyclables</p>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-1">Wednesday, Oct 25</p>
<p class="font-data-mono text-data-mono text-on-surface-variant">08:00 AM - 12:00 PM</p>
</div>
<div class="px-2 py-1 rounded bg-secondary-container text-on-secondary-container font-label-caps text-label-caps">
                                CONFIRMED
                            </div>
</div>
<!-- Collection Item 3 -->
<div class="p-sm rounded-lg border border-outline-variant bg-surface hover:bg-surface-container-low transition-colors flex items-start gap-sm">
<div class="w-10 h-10 rounded-full bg-[#a16207]/10 flex items-center justify-center text-[#a16207] shrink-0">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">compost</span>
</div>
<div class="flex-1">
<p class="font-body-md text-body-md font-semibold text-on-background">Organic Waste</p>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-1">Friday, Oct 27</p>
<p class="font-data-mono text-data-mono text-on-surface-variant">12:00 PM - 04:00 PM</p>
</div>
<div class="px-2 py-1 rounded border border-outline text-on-surface-variant font-label-caps text-label-caps">
                                SCHEDULED
                            </div>
</div>
</div>
</div>
</div>
</div>
</div>
