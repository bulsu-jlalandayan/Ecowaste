<!-- Waste Records view - loaded via collector_content.php -->
<!-- Header Section -->
<div>
    <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface mb-2">Record Collected Waste</h1>
    <p class="font-body-md text-body-md text-on-surface-variant">Log details for request #REQ-1043</p>
</div>

<!-- Summary Card -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-stack-md flex flex-col md:flex-row gap-stack-md md:gap-stack-lg">
    <div class="flex-1">
        <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block mb-1">Request Info</span>
        <div class="flex items-center gap-2 mb-1">
            <span class="material-symbols-outlined text-primary text-sm">tag</span>
            <span class="font-label-md text-label-md text-on-surface">REQ-1043</span>
        </div>
        <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-status-pending text-sm">category</span>
            <span class="font-body-sm text-body-sm text-on-surface-variant">Commercial Mixed Waste</span>
        </div>
    </div>
    <div class="flex-1 border-t md:border-t-0 md:border-l border-border-subtle pt-4 md:pt-0 md:pl-stack-lg">
        <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block mb-1">Estimated</span>
        <div class="flex items-center gap-2 mb-1">
            <span class="material-symbols-outlined text-primary text-sm">scale</span>
            <span class="font-label-md text-label-md text-on-surface">~500 kg</span>
        </div>
    </div>
    <div class="flex-1 border-t md:border-t-0 md:border-l border-border-subtle pt-4 md:pt-0 md:pl-stack-lg">
        <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block mb-1">Location</span>
        <div class="flex items-start gap-2">
            <span class="material-symbols-outlined text-primary text-sm mt-0.5">location_on</span>
            <span class="font-body-sm text-body-sm text-on-surface-variant">124 Industrial Pkwy,<br/>Loading Dock B</span>
        </div>
    </div>
</div>

<!-- Form Section -->
<form class="space-y-stack-lg">
    <div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-stack-md md:p-stack-lg space-y-stack-lg">
        <h2 class="font-headline-sm text-headline-sm text-on-surface border-b border-border-subtle pb-4">Collection Details</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-stack-md">
            <!-- Waste Quantity -->
            <div>
                <label class="block font-label-md text-label-md text-on-surface mb-2" for="quantity">Waste Quantity <span class="text-error">*</span></label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="material-symbols-outlined text-on-surface-variant text-lg">scale</span>
                    </div>
                    <input class="block w-full pl-10 pr-3 py-3 border border-border-subtle rounded-lg focus:ring-primary focus:border-primary font-body-md text-body-md bg-surface-bright" id="quantity" name="quantity" placeholder="Enter amount" required="" type="number"/>
                </div>
            </div>
            <!-- Unit -->
            <div>
                <label class="block font-label-md text-label-md text-on-surface mb-2" for="unit">Unit <span class="text-error">*</span></label>
                <select class="block w-full py-3 px-3 border border-border-subtle rounded-lg focus:ring-primary focus:border-primary font-body-md text-body-md bg-surface-bright" id="unit" name="unit" required="">
                    <option disabled="" selected="" value="">Select unit</option>
                    <option value="kg">Kilograms (kg)</option>
                    <option value="tons">Tons</option>
                    <option value="bags">Bags</option>
                    <option value="items">Individual Items</option>
                </select>
            </div>
        </div>
        <!-- Quantity Type -->
        <div>
            <span class="block font-label-md text-label-md text-on-surface mb-3">Quantity Type <span class="text-error">*</span></span>
            <div class="flex gap-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input checked="" class="w-5 h-5 border-outline text-primary focus:ring-primary" name="quantityType" type="radio" value="actual"/>
                    <span class="font-body-md text-body-md text-on-surface">Actual (Weighed)</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input class="w-5 h-5 border-outline text-primary focus:ring-primary" name="quantityType" type="radio" value="estimated"/>
                    <span class="font-body-md text-body-md text-on-surface">Estimated (Visual)</span>
                </label>
            </div>
        </div>
        <!-- Waste Condition -->
        <div>
            <label class="block font-label-md text-label-md text-on-surface mb-2" for="condition">Waste Condition</label>
            <select class="block w-full py-3 px-3 border border-border-subtle rounded-lg focus:ring-primary focus:border-primary font-body-md text-body-md bg-surface-bright" id="condition" name="condition">
                <option value="normal">Normal (As expected)</option>
                <option value="mixed">Mixed/Contaminated</option>
                <option value="oversized">Oversized Items Present</option>
                <option value="hazardous">Suspected Hazardous</option>
                <option value="other">Other</option>
            </select>
        </div>
        <!-- Notes -->
        <div>
            <label class="block font-label-md text-label-md text-on-surface mb-2" for="notes">Additional Notes</label>
            <textarea class="block w-full py-3 px-3 border border-border-subtle rounded-lg focus:ring-primary focus:border-primary font-body-md text-body-md bg-surface-bright" id="notes" name="notes" placeholder="Any issues encountered, access problems, or specific observations..." rows="4"></textarea>
        </div>
    </div>
    <!-- Photo Upload Placeholder -->
    <div class="bg-surface-container-lowest border border-border-subtle border-dashed rounded-xl p-stack-lg text-center cursor-pointer hover:bg-surface-container-low transition-colors">
        <span class="material-symbols-outlined text-primary text-4xl mb-2">add_a_photo</span>
        <p class="font-label-md text-label-md text-on-surface">Add Collection Photos</p>
        <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Tap to capture or upload evidence (Optional)</p>
    </div>
</form>

<!-- Sticky Footer Actions -->
<div class="fixed bottom-0 inset-x-0 md:inset-auto md:bottom-auto md:relative w-full bg-surface border-t border-border-subtle p-container-margin flex flex-col-reverse sm:flex-row justify-end gap-stack-md z-30 shadow-[0px_-4px_6px_-1px_rgba(0,0,0,0.05)] md:shadow-none">
    <button class="w-full sm:w-auto px-6 py-3 rounded-lg font-label-md text-label-md border border-border-subtle text-on-surface hover:bg-surface-container-low transition-colors bg-surface-container-lowest" type="button">
        Cancel
    </button>
    <button class="w-full sm:w-auto px-6 py-3 rounded-lg font-label-md text-label-md bg-primary-container text-on-primary hover:bg-primary transition-colors flex items-center justify-center gap-2" type="submit">
        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">save</span>
        Save Waste Record
    </button>
</div>
