<!-- Settings view - loaded via admin_app.php -->
<div class="flex-1 p-margin-mobile md:p-margin-desktop max-w-[1440px] w-full mx-auto">
<div class="mb-xl">
<h2 class="font-display-lg text-display-lg text-on-surface">System Settings</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant mt-sm">Manage global configurations, security policies, and notification preferences.</p>
</div>
<!-- Bento Grid Layout for Settings -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-lg">
<!-- General Settings Card -->
<div class="col-span-1 lg:col-span-2 bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-[0px_1px_3px_rgba(0,0,0,0.05)]">
<div class="flex items-center gap-sm mb-md border-b border-surface-variant pb-sm">
<span class="material-symbols-outlined text-primary">tune</span>
<h3 class="font-headline-md text-headline-md text-on-surface">General Settings</h3>
</div>
<div class="space-y-md">
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Organization Name</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded px-md py-sm font-body-md focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all text-on-surface" type="text" value="EcoWaste Municipal Div."/>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-md">
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Timezone</label>
<select class="w-full bg-surface-container-lowest border border-outline-variant rounded px-md py-sm font-body-md focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all text-on-surface appearance-none">
<option>UTC - Coordinated Universal Time</option>
<option>EST - Eastern Standard Time</option>
<option>PST - Pacific Standard Time</option>
</select>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Default Currency</label>
<select class="w-full bg-surface-container-lowest border border-outline-variant rounded px-md py-sm font-body-md focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all text-on-surface appearance-none">
<option>USD ($)</option>
<option>EUR (€)</option>
</select>
</div>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Support Email</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded px-md py-sm font-body-md focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all text-on-surface" type="email" value="admin@ecowaste.gov"/>
</div>
</div>
<div class="mt-lg flex justify-end">
<button class="bg-primary text-on-primary font-title-md px-lg py-sm rounded hover:bg-surface-tint transition-colors">Save General</button>
</div>
</div>
<!-- Security Card -->
<div class="col-span-1 bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-[0px_1px_3px_rgba(0,0,0,0.05)]">
<div class="flex items-center gap-sm mb-md border-b border-surface-variant pb-sm">
<span class="material-symbols-outlined text-primary">security</span>
<h3 class="font-headline-md text-headline-md text-on-surface">Security</h3>
</div>
<div class="space-y-lg">
<div class="flex items-center justify-between">
<div>
<h4 class="font-title-md text-title-md text-on-surface">Require MFA</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Mandatory for all admin roles.</p>
</div>
<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
<input checked="" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-outline-variant" id="toggle1" name="toggle1" type="checkbox"/>
<label class="toggle-label block overflow-hidden h-5 rounded-full bg-surface-variant cursor-pointer" for="toggle1"></label>
</div>
</div>
<div class="flex items-center justify-between">
<div>
<h4 class="font-title-md text-title-md text-on-surface">Strict Password Policy</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Min 12 chars, symbols required.</p>
</div>
<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
<input checked="" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-outline-variant" id="toggle2" name="toggle2" type="checkbox"/>
<label class="toggle-label block overflow-hidden h-5 rounded-full bg-surface-variant cursor-pointer" for="toggle2"></label>
</div>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Session Timeout (Mins)</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded px-md py-sm font-body-md focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all text-on-surface" type="number" value="30"/>
</div>
</div>
</div>
<!-- Notification Settings Card -->
<div class="col-span-1 lg:col-span-3 bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-[0px_1px_3px_rgba(0,0,0,0.05)]">
<div class="flex items-center gap-sm mb-md border-b border-surface-variant pb-sm">
<span class="material-symbols-outlined text-primary">notifications_active</span>
<h3 class="font-headline-md text-headline-md text-on-surface">Notification Preferences</h3>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-xl">
<div class="space-y-md">
<h4 class="font-title-lg text-title-lg text-on-surface">System Alerts</h4>
<div class="flex items-center justify-between p-sm hover:bg-surface-container-low rounded transition-colors">
<div>
<h5 class="font-title-md text-title-md text-on-surface">High Volume Warnings</h5>
<p class="font-body-sm text-body-sm text-on-surface-variant">Alert when collection requests exceed capacity.</p>
</div>
<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
<input checked="" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-outline-variant" id="toggle3" name="toggle3" type="checkbox"/>
<label class="toggle-label block overflow-hidden h-5 rounded-full bg-surface-variant cursor-pointer" for="toggle3"></label>
</div>
</div>
<div class="flex items-center justify-between p-sm hover:bg-surface-container-low rounded transition-colors">
<div>
<h5 class="font-title-md text-title-md text-on-surface">Collector Offline Alert</h5>
<p class="font-body-sm text-body-sm text-on-surface-variant">Notify when an active truck goes offline unexpectedly.</p>
</div>
<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
<input checked="" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-outline-variant" id="toggle4" name="toggle4" type="checkbox"/>
<label class="toggle-label block overflow-hidden h-5 rounded-full bg-surface-variant cursor-pointer" for="toggle4"></label>
</div>
</div>
</div>
<div class="space-y-md">
<h4 class="font-title-lg text-title-lg text-on-surface">Email Digests</h4>
<div class="flex items-center justify-between p-sm hover:bg-surface-container-low rounded transition-colors">
<div>
<h5 class="font-title-md text-title-md text-on-surface">Daily Summary</h5>
<p class="font-body-sm text-body-sm text-on-surface-variant">Receive a daily report of total collections.</p>
</div>
<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
<input class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-outline-variant" id="toggle5" name="toggle5" type="checkbox"/>
<label class="toggle-label block overflow-hidden h-5 rounded-full bg-surface-variant cursor-pointer" for="toggle5"></label>
</div>
</div>
<div class="flex items-center justify-between p-sm hover:bg-surface-container-low rounded transition-colors">
<div>
<h5 class="font-title-md text-title-md text-on-surface">Weekly Impact Report</h5>
<p class="font-body-sm text-body-sm text-on-surface-variant">Recycling stats and environmental impact metrics.</p>
</div>
<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
<input checked="" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-outline-variant" id="toggle6" name="toggle6" type="checkbox"/>
<label class="toggle-label block overflow-hidden h-5 rounded-full bg-surface-variant cursor-pointer" for="toggle6"></label>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
        // Simple logic to toggle the visual state of the custom checkboxes (though CSS handles the main part)
        document.querySelectorAll('.toggle-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if(this.checked) {
                    this.style.borderColor = '#630ed4';
                } else {
                    this.style.borderColor = '#ccc3d8'; // outline-variant
                }
            });
            // Init state
            if(checkbox.checked) {
                checkbox.style.borderColor = '#630ed4';
            }
        });
    </script>
