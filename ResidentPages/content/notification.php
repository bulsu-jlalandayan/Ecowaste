<!-- Notifications content fragment (loaded by resident.html via content.php) -->
<div class="p-margin max-w-7xl mx-auto flex flex-col gap-lg">
<!-- Header -->
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
<div>
<h1 class="font-headline-lg text-headline-lg text-primary">Notifications</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">Stay updated on your waste management schedule and requests.</p>
</div>
<button class="bg-transparent border border-outline text-secondary px-4 py-2 rounded-full font-body-sm font-medium hover:bg-surface-container hover:text-primary transition-colors flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]" data-icon="done_all">done_all</span>
                    Mark all as read
                </button>
</div>

<!-- Notifications Feed -->
<div class="space-y-xl">
<!-- Today Group -->
<div>
<h3 class="font-label-caps text-label-caps text-secondary mb-sm">TODAY</h3>
<div class="space-y-sm">
<!-- Notification Card 1 (Unread) -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex gap-md relative overflow-hidden group hover:shadow-[0_4px_16px_rgba(15,23,42,0.05)] transition-shadow">
<!-- Unread indicator -->
<div class="absolute left-0 top-0 bottom-0 w-1 bg-primary"></div>
<div class="w-10 h-10 rounded-full bg-primary-fixed/20 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-primary-fixed-variant" data-icon="local_shipping">local_shipping</span>
</div>
<div class="flex-1">
<div class="flex justify-between items-start mb-1">
<h4 class="font-body-lg text-body-lg text-on-surface font-semibold flex items-center gap-2">
                                        Collection Reminder
                                        <span class="w-2 h-2 rounded-full bg-primary inline-block md:hidden"></span>
</h4>
<span class="font-data-mono text-data-mono text-secondary shrink-0">10:45 AM</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant">Upcoming: Recyclables pickup tomorrow at 8:00 AM. Please ensure your bins are at the curb.</p>
</div>
<div class="hidden md:flex items-center shrink-0 w-4 justify-end">
<span class="w-2 h-2 rounded-full bg-primary inline-block" title="Unread"></span>
</div>
</div>
<!-- Notification Card 2 (Unread) -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex gap-md relative overflow-hidden group hover:shadow-[0_4px_16px_rgba(15,23,42,0.05)] transition-shadow">
<div class="absolute left-0 top-0 bottom-0 w-1 bg-primary"></div>
<div class="w-10 h-10 rounded-full bg-tertiary-fixed/20 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-tertiary-container" data-icon="assignment_turned_in">assignment_turned_in</span>
</div>
<div class="flex-1">
<div class="flex justify-between items-start mb-1">
<h4 class="font-body-lg text-body-lg text-on-surface font-semibold flex items-center gap-2">
                                        Status Update
                                        <span class="w-2 h-2 rounded-full bg-primary inline-block md:hidden"></span>
</h4>
<span class="font-data-mono text-data-mono text-secondary shrink-0">08:12 AM</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant">Your waste report <span class="font-data-mono font-medium text-primary">RPT-8832</span> has been marked as Resolved.</p>
<div class="mt-sm">
<span class="inline-flex items-center px-2 py-1 rounded-full bg-primary-fixed/10 text-primary-fixed-variant font-label-caps text-[10px]">RESOLVED</span>
</div>
</div>
<div class="hidden md:flex items-center shrink-0 w-4 justify-end">
<span class="w-2 h-2 rounded-full bg-primary inline-block" title="Unread"></span>
</div>
</div>
</div>
</div>
<!-- Yesterday Group -->
<div>
<h3 class="font-label-caps text-label-caps text-secondary mb-sm">YESTERDAY</h3>
<div class="space-y-sm">
<!-- Notification Card 3 (Read) -->
<div class="bg-surface border border-outline-variant rounded-xl p-md flex gap-md relative group hover:shadow-[0_4px_16px_rgba(15,23,42,0.05)] transition-shadow opacity-75">
<div class="w-10 h-10 rounded-full bg-error-container/40 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-on-error-container" data-icon="calendar_month">calendar_month</span>
</div>
<div class="flex-1">
<div class="flex justify-between items-start mb-1">
<h4 class="font-body-lg text-body-lg text-on-surface font-medium">Service Alert</h4>
<span class="font-data-mono text-data-mono text-secondary shrink-0">Yesterday, 3:30 PM</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant">Holiday Schedule: No collections on Friday, Nov 10th. Services will resume on the next business day.</p>
</div>
<div class="hidden md:flex items-center shrink-0 w-4 justify-end">
<!-- No dot, read -->
</div>
</div>
</div>
</div>
<!-- Earlier Group -->
<div>
<h3 class="font-label-caps text-label-caps text-secondary mb-sm">EARLIER</h3>
<div class="space-y-sm">
<!-- Notification Card 4 (Read) -->
<div class="bg-surface border border-outline-variant rounded-xl p-md flex gap-md relative group hover:shadow-[0_4px_16px_rgba(15,23,42,0.05)] transition-shadow opacity-75">
<div class="w-10 h-10 rounded-full bg-secondary-container/40 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-on-secondary-container" data-icon="book">book</span>
</div>
<div class="flex-1">
<div class="flex justify-between items-start mb-1">
<h4 class="font-body-lg text-body-lg text-on-surface font-medium">Educational</h4>
<span class="font-data-mono text-data-mono text-secondary shrink-0">Nov 5</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant">New Guide: How to compost in small apartments. Learn tips and tricks for odor-free indoor composting.</p>
<button class="mt-sm text-primary font-body-sm font-medium hover:underline flex items-center gap-1">
                                    Read Guide <span class="material-symbols-outlined text-[14px]" data-icon="arrow_forward">arrow_forward</span>
</button>
</div>
<div class="hidden md:flex items-center shrink-0 w-4 justify-end">
</div>
</div>
</div>
</div>
</div>
<div class="mt-xl text-center pb-xl">
<p class="font-body-sm text-body-sm text-secondary">No more notifications</p>
</div>
</div>
