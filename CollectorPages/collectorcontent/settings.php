<!-- Settings view - loaded via collector_content.php -->
<div class="mb-stack-lg">
<h2 class="font-headline-lg text-headline-lg text-on-background">Settings</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">Manage your account settings, notifications, and preferences.</p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-container-margin">
<!-- Account Settings -->
<section class="lg:col-span-2 space-y-stack-md">
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle overflow-hidden">
<div class="px-4 sm:px-6 py-3 sm:py-4 border-b border-border-subtle bg-surface">
<h3 class="font-headline-sm text-headline-sm text-on-background">Account Information</h3>
</div>
<div class="p-4 sm:p-6 space-y-stack-md">
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<div>
<label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">First Name</label>
<input class="w-full bg-surface-bright border border-border-subtle rounded-lg px-3 py-2 font-body-md text-body-md text-on-background focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors h-12" type="text" value="John"/>
</div>
<div>
<label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Last Name</label>
<input class="w-full bg-surface-bright border border-border-subtle rounded-lg px-3 py-2 font-body-md text-body-md text-on-background focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors h-12" type="text" value="Doe"/>
</div>
</div>
<div>
<label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Email Address</label>
<input class="w-full bg-surface-bright border border-border-subtle rounded-lg px-3 py-2 font-body-md text-body-md text-on-background focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors h-12" type="email" value="john.doe@ecowaste.com"/>
</div>
<div>
<label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Phone Number</label>
<input class="w-full bg-surface-bright border border-border-subtle rounded-lg px-3 py-2 font-body-md text-body-md text-on-background focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors h-12" type="tel" value="+1 (555) 123-4567"/>
</div>
</div>
</div>
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle overflow-hidden">
<div class="px-4 sm:px-6 py-3 sm:py-4 border-b border-border-subtle bg-surface">
<h3 class="font-headline-sm text-headline-sm text-on-background">Password &amp; Security</h3>
</div>
<div class="p-4 sm:p-6 space-y-stack-md">
<div>
<label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Current Password</label>
<input class="w-full bg-surface-bright border border-border-subtle rounded-lg px-3 py-2 font-body-md text-body-md text-on-background focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors h-12" placeholder="••••••••" type="password"/>
</div>
<div>
<label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">New Password</label>
<input class="w-full bg-surface-bright border border-border-subtle rounded-lg px-3 py-2 font-body-md text-body-md text-on-background focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors h-12" placeholder="Enter new password" type="password"/>
</div>
<div>
<label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Confirm New Password</label>
<input class="w-full bg-surface-bright border border-border-subtle rounded-lg px-3 py-2 font-body-md text-body-md text-on-background focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors h-12" placeholder="Confirm new password" type="password"/>
</div>
</div>
</div>
</section>
<!-- Sidebar Settings (Notifications & Preferences) -->
<section class="space-y-stack-md">
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle overflow-hidden">
<div class="px-4 sm:px-6 py-3 sm:py-4 border-b border-border-subtle bg-surface">
<h3 class="font-headline-sm text-headline-sm text-on-background flex items-center gap-2">
<span class="material-symbols-outlined text-primary">notifications</span>
                                Notifications
                            </h3>
</div>
<div class="p-4 sm:p-6 space-y-4">
<!-- Toggle Item -->
<div class="flex items-center justify-between">
<div>
<p class="font-label-md text-label-md text-on-background">New Assignments</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">Get notified for new route tasks.</p>
</div>
<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
<input checked="" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-border-subtle checked:border-primary" id="toggle1" name="toggle" type="checkbox"/>
<label class="toggle-label block overflow-hidden h-6 rounded-full bg-border-subtle cursor-pointer" for="toggle1"></label>
</div>
</div>
<!-- Toggle Item -->
<div class="flex items-center justify-between">
<div>
<p class="font-label-md text-label-md text-on-background">Schedule Reminders</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">Alerts 30 mins before shift.</p>
</div>
<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
<input checked="" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-border-subtle checked:border-primary" id="toggle2" name="toggle" type="checkbox"/>
<label class="toggle-label block overflow-hidden h-6 rounded-full bg-border-subtle cursor-pointer" for="toggle2"></label>
</div>
</div>
<!-- Toggle Item -->
<div class="flex items-center justify-between">
<div>
<p class="font-label-md text-label-md text-on-background">System Updates</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">Portal maintenance news.</p>
</div>
<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
<input class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-border-subtle checked:border-primary" id="toggle3" name="toggle" type="checkbox"/>
<label class="toggle-label block overflow-hidden h-6 rounded-full bg-border-subtle cursor-pointer" for="toggle3"></label>
</div>
</div>
</div>
</div>
<div class="bg-surface-container-lowest rounded-xl border border-border-subtle overflow-hidden">
<div class="px-4 sm:px-6 py-3 sm:py-4 border-b border-border-subtle bg-surface">
<h3 class="font-headline-sm text-headline-sm text-on-background flex items-center gap-2">
<span class="material-symbols-outlined text-primary">tune</span>
                                Preferences
                            </h3>
</div>
<div class="p-4 sm:p-6 space-y-4">
<div>
<label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Language</label>
<div class="relative">
<select class="w-full bg-surface-bright border border-border-subtle rounded-lg px-3 py-2 font-body-md text-body-md text-on-background focus:border-primary focus:ring-1 focus:ring-primary outline-none appearance-none h-12">
<option>English (US)</option>
<option>Spanish</option>
<option>French</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-3 text-on-surface-variant pointer-events-none">expand_more</span>
</div>
</div>
<div>
<label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Time Format</label>
<div class="relative">
<select class="w-full bg-surface-bright border border-border-subtle rounded-lg px-3 py-2 font-body-md text-body-md text-on-background focus:border-primary focus:ring-1 focus:ring-primary outline-none appearance-none h-12">
<option>12-hour (AM/PM)</option>
<option>24-hour</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-3 text-on-surface-variant pointer-events-none">expand_more</span>
</div>
</div>
</div>
</div>
</section>
</div>
<!-- Action Area -->
<div class="mt-stack-lg flex flex-col-reverse sm:flex-row justify-end gap-3 sm:gap-4 pb-stack-lg">
<button class="w-full sm:w-auto px-6 py-3 rounded-lg font-label-md text-label-md border border-border-subtle text-on-surface-variant bg-surface hover:bg-surface-container-low transition-colors">
                    Cancel
                </button>
<button class="w-full sm:w-auto px-6 py-3 rounded-lg font-label-md text-label-md bg-primary-container text-on-primary hover:bg-primary transition-colors flex items-center justify-center gap-2 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05),_0px_2px_4px_-2px_rgba(0,0,0,0.05)]">
<span class="material-symbols-outlined">save</span>
                    Save Changes
                </button>
</div>
