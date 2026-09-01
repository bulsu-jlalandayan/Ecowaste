<!-- Dashboard content fragment (loaded by resident.html via content.php) -->
<div class="p-margin max-w-7xl mx-auto flex flex-col gap-lg">
<!-- Greeting & Quick Actions -->
<section class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-md">
<div>
<h1 class="font-display-lg text-display-lg text-on-surface mb-xs">Good morning, Maria!</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant">Here is a quick overview of your waste management schedule and requests.</p>
</div>
<div class="flex gap-sm">
<button class="bg-primary hover:bg-primary-container text-on-primary font-label-caps text-label-caps px-md py-sm rounded-lg transition-colors flex items-center gap-2 shadow-sm" data-view="reportwaste">
<span class="material-symbols-outlined text-[20px]">report_problem</span>
                        Report Waste
                    </button>
<button class="border border-outline text-primary hover:bg-surface-container-low font-label-caps text-label-caps px-md py-sm rounded-lg transition-colors flex items-center gap-2" data-view="requestcollection">
<span class="material-symbols-outlined text-[20px]">add_task</span>
                        Request Collection
                    </button>
</div>
</section>
<!-- Bento Grid Layout -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
<!-- Active Request -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex flex-col gap-sm hover:shadow-[0_4px_16px_rgba(15,23,42,0.05)] transition-shadow">
<div class="flex justify-between items-center border-b border-outline-variant pb-sm mb-sm">
<h3 class="font-headline-md text-headline-md text-on-surface flex items-center gap-2">
<span class="material-symbols-outlined text-primary">local_shipping</span>
                            Active Request
                        </h3>
<span class="font-data-mono text-data-mono text-on-surface-variant">REQ-1048</span>
</div>
<div class="flex flex-col gap-xs mb-sm">
<div class="flex justify-between items-center">
<span class="font-label-caps text-label-caps text-on-surface-variant">Type</span>
<span class="font-body-md text-body-md text-on-surface font-medium">Household Waste</span>
</div>
<div class="flex justify-between items-center">
<span class="font-label-caps text-label-caps text-on-surface-variant">Status</span>
<span class="font-label-caps text-label-caps bg-secondary-container text-on-secondary-container px-2 py-1 rounded-sm">Collector Assigned</span>
</div>
</div>
<div class="mt-auto pt-sm border-t border-outline-variant">
<div class="w-full h-2 bg-surface-container-highest rounded-full overflow-hidden">
<div class="h-full bg-primary w-2/3 rounded-full"></div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-2 text-right">Estimated arrival: 2 hours</p>
</div>
</div>
<!-- Upcoming Schedule -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md lg:col-span-2 hover:shadow-[0_4px_16px_rgba(15,23,42,0.05)] transition-shadow flex flex-col">
<div class="flex justify-between items-center border-b border-outline-variant pb-sm mb-sm">
<h3 class="font-headline-md text-headline-md text-on-surface flex items-center gap-2">
<span class="material-symbols-outlined text-primary">calendar_month</span>
                            Upcoming Schedule
                        </h3>
<a class="font-label-caps text-label-caps text-primary hover:underline" href="#">View Full Schedule</a>
</div>
<div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-sm">
<!-- Household -->
<div class="bg-surface-container flex items-center p-sm rounded-lg border border-outline-variant">
<div class="w-12 h-12 rounded-full bg-surface-container-lowest flex items-center justify-center mr-md">
<span class="material-symbols-outlined text-on-surface text-[24px]">delete</span>
</div>
<div>
<h4 class="font-headline-sm font-semibold text-on-surface">Household Waste</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Wednesday, Sep 2</p>
</div>
</div>
<!-- Recyclables -->
<div class="bg-tertiary-container/10 flex items-center p-sm rounded-lg border border-tertiary-container/30">
<div class="w-12 h-12 rounded-full bg-surface-container-lowest flex items-center justify-center mr-md">
<span class="material-symbols-outlined text-tertiary text-[24px]">recycling</span>
</div>
<div>
<h4 class="font-headline-sm font-semibold text-on-surface">Recyclables</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Friday, Sep 4</p>
</div>
</div>
</div>
</div>
<!-- Educational Tip -->
<div class="bg-primary text-on-primary rounded-xl p-md lg:col-span-3 relative overflow-hidden flex flex-col md:flex-row items-center gap-lg">
<!-- Subtle background pattern using tailwind -->
<div class="absolute inset-0 opacity-10 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-white via-transparent to-transparent"></div>
<div class="relative z-10 w-16 h-16 rounded-full bg-primary-container flex items-center justify-center flex-shrink-0 border-2 border-primary-fixed">
<span class="material-symbols-outlined text-primary-fixed text-4xl" style="font-variation-settings: 'FILL' 1;">lightbulb</span>
</div>
<div class="relative z-10 flex-1">
<h3 class="font-headline-md text-headline-md mb-2">Did you know?</h3>
<p class="font-body-lg text-body-lg text-primary-fixed-dim">
                            Rinsing your recyclables before tossing them in the bin significantly reduces contamination rates at processing facilities. Even a quick splash of water can make a huge difference in ensuring your items are actually recycled!
                        </p>
</div>
<div class="relative z-10 hidden md:block">
<img alt="Clean Recyclables" class="w-32 h-32 object-cover rounded-lg border border-primary-container" data-alt="A clean, minimalist illustration or photograph of a pristine, freshly rinsed glass jar sitting next to a modern green recycling bin on a light countertop, brightly lit in a modern corporate style." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAck6k3wib2L5j8z6oU9UBh3OsTvvfel_FZtkxMlzGf-SJYEX-j9mWo75_WWta9Zi8pQl8GUdoEV3L5vavKObWuHSpTHMGmKlUfY99NQIwvi3T_VGNZ5zQNIzcoJMtyh-9gekW30qqaXBVqO-gfzBvKh_PKvprFsaazl9e1ntk6PCHw3n9YcXI5Kg-sLXuwep5cWieQzSVVSFq5sRQzJuGqtWdKKwitESEQ6fwjtY3QSNwzOYdn6GfG">
</div>
</div>
</div>
</div>
