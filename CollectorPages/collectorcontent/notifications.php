<!-- Notifications view - loaded via collector_content.php -->
<div class="max-w-4xl mx-auto">
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between mb-stack-lg gap-4">
<div>
<h1 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-background mb-2">Notifications</h1>
<p class="font-body-md text-body-md text-on-surface-variant">Stay updated with your collection assignments and activities.</p>
</div>
<button class="bg-primary-container text-on-primary font-label-md text-label-md px-4 py-2 rounded-lg hover:bg-primary transition-colors flex items-center justify-center gap-2 h-10 w-full md:w-auto self-start md:self-end">
<span class="material-symbols-outlined text-[18px]" data-icon="done_all">done_all</span>
                        Mark all as read
                    </button>
</div>
<!-- Notifications List -->
<div class="flex flex-col gap-stack-sm">
<!-- Unread Notification: Assignment -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 md:p-6 hover:shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05),_0px_2px_4px_-2px_rgba(0,0,0,0.05)] transition-shadow relative overflow-hidden flex gap-4 items-start">
<!-- Unread Indicator Line -->
<div class="absolute left-0 top-0 bottom-0 w-1 bg-primary"></div>
<div class="bg-primary-fixed text-on-primary-fixed rounded-full p-3 flex-shrink-0">
<span class="material-symbols-outlined" data-icon="assignment">assignment</span>
</div>
<div class="flex-1 min-w-0">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-1 md:gap-4 mb-1">
<h3 class="font-headline-sm text-headline-sm text-on-background truncate font-bold">New collection request assigned</h3>
<span class="font-label-sm text-label-sm text-primary flex-shrink-0">Just now</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant">Route 42 - Downtown Commercial District. Please review the manifest and confirm availability.</p>
<div class="mt-4 flex gap-3">
<button class="bg-primary-container text-on-primary font-label-sm text-label-sm px-3 py-1.5 rounded flex items-center gap-1 hover:bg-primary transition-colors">
                                    View Details
                                </button>
</div>
</div>
</div>
<!-- Unread Notification: Schedule -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 md:p-6 hover:shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05),_0px_2px_4px_-2px_rgba(0,0,0,0.05)] transition-shadow relative overflow-hidden flex gap-4 items-start">
<div class="absolute left-0 top-0 bottom-0 w-1 bg-primary"></div>
<div class="bg-secondary-fixed text-on-secondary-fixed rounded-full p-3 flex-shrink-0">
<span class="material-symbols-outlined" data-icon="schedule">schedule</span>
</div>
<div class="flex-1 min-w-0">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-1 md:gap-4 mb-1">
<h3 class="font-headline-sm text-headline-sm text-on-background truncate font-bold">Collection scheduled for today</h3>
<span class="font-label-sm text-label-sm text-on-surface-variant flex-shrink-0">2 hours ago</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant">Your shift begins at 14:00. Ensure vehicle inspection is completed before departure.</p>
</div>
</div>
<!-- Read Notification: Success -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 md:p-6 hover:shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05),_0px_2px_4px_-2px_rgba(0,0,0,0.05)] transition-shadow flex gap-4 items-start opacity-75">
<div class="bg-surface-container-high text-on-surface-variant rounded-full p-3 flex-shrink-0">
<span class="material-symbols-outlined" data-icon="task_alt">task_alt</span>
</div>
<div class="flex-1 min-w-0">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-1 md:gap-4 mb-1">
<h3 class="font-headline-sm text-headline-sm text-on-background truncate">Waste record saved</h3>
<span class="font-label-sm text-label-sm text-on-surface-variant flex-shrink-0">Yesterday, 16:45</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant">Manifest #8892 for Industrial Park Sector B has been successfully uploaded and verified.</p>
</div>
</div>
<!-- Read Notification: System -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 md:p-6 hover:shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05),_0px_2px_4px_-2px_rgba(0,0,0,0.05)] transition-shadow flex gap-4 items-start opacity-75">
<div class="bg-surface-container-high text-on-surface-variant rounded-full p-3 flex-shrink-0">
<span class="material-symbols-outlined" data-icon="info">info</span>
</div>
<div class="flex-1 min-w-0">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-1 md:gap-4 mb-1">
<h3 class="font-headline-sm text-headline-sm text-on-background truncate">System maintenance notice</h3>
<span class="font-label-sm text-label-sm text-on-surface-variant flex-shrink-0">Oct 24, 09:00</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant">The Collector Portal will undergo scheduled maintenance on Sunday from 02:00 to 04:00 AM. Offline routing will remain available.</p>
</div>
</div>
</div>
<div class="mt-stack-lg flex justify-center">
<button class="bg-transparent text-secondary font-label-md text-label-md px-4 py-2 rounded border border-border-subtle hover:bg-surface-container-low transition-colors">
                        Load More
                    </button>
</div>
</div>
