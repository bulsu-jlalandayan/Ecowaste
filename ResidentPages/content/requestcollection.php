<!-- Request Collection content fragment (loaded by resident.html via content.php) -->
<div class="max-w-4xl mx-auto px-margin py-lg">
<!-- Progress Stepper -->
<div class="mb-xl">
<div class="flex items-center justify-between relative">
<div class="absolute left-0 top-1/2 -translate-y-1/2 w-full h-1 bg-surface-variant rounded-full z-0"></div>
<div class="absolute left-0 top-1/2 -translate-y-1/2 w-1/4 h-1 bg-primary rounded-full z-0"></div>
<div class="relative z-10 flex flex-col items-center gap-2">
<div class="w-8 h-8 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-caps text-label-caps shadow-sm">1</div>
<span class="font-label-caps text-label-caps text-primary">Waste Type</span>
</div>
<div class="relative z-10 flex flex-col items-center gap-2">
<div class="w-8 h-8 rounded-full bg-surface-variant text-on-surface-variant flex items-center justify-center font-label-caps text-label-caps">2</div>
<span class="font-label-caps text-label-caps text-on-surface-variant">Details</span>
</div>
<div class="relative z-10 flex flex-col items-center gap-2">
<div class="w-8 h-8 rounded-full bg-surface-variant text-on-surface-variant flex items-center justify-center font-label-caps text-label-caps">3</div>
<span class="font-label-caps text-label-caps text-on-surface-variant">Schedule</span>
</div>
<div class="relative z-10 flex flex-col items-center gap-2">
<div class="w-8 h-8 rounded-full bg-surface-variant text-on-surface-variant flex items-center justify-center font-label-caps text-label-caps">4</div>
<span class="font-label-caps text-label-caps text-on-surface-variant">Review</span>
</div>
</div>
</div>
<!-- Step Content -->
<div class="mb-lg">
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-2">Step 1: Select Waste Type</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant">Choose the category of waste you need collected.</p>
</div>
<!-- Selection Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-sm mb-xl">
<!-- Selected Card -->
<label class="cursor-pointer">
<input checked="" class="sr-only" name="waste_type" type="radio">
<div class="h-full p-md bg-surface-container-lowest border-2 border-primary rounded-xl relative overflow-hidden transition-all shadow-[0_4px_16px_rgba(15,23,42,0.05)]">
<div class="absolute top-4 right-4 text-primary">
<span class="material-symbols-outlined" data-icon="check_circle" data-weight="fill" style="font-variation-settings: 'FILL' 1;">check_circle</span>
</div>
<div class="w-12 h-12 rounded-lg bg-primary-container/10 flex items-center justify-center text-primary mb-4">
<span class="material-symbols-outlined" data-icon="delete">delete</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface mb-2">General Household Waste</h3>
<p class="font-body-md text-body-md text-on-surface-variant">Typical kitchen and bathroom waste.</p>
</div>
</label>
<!-- Unselected Cards -->
<label class="cursor-pointer group">
<input class="sr-only" name="waste_type" type="radio">
<div class="h-full p-md bg-surface-container-lowest border border-outline-variant rounded-xl group-hover:border-primary/50 group-hover:bg-surface-container-low transition-all">
<div class="w-12 h-12 rounded-lg bg-surface-variant flex items-center justify-center text-on-surface-variant mb-4 group-hover:text-primary transition-colors">
<span class="material-symbols-outlined" data-icon="recycling">recycling</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface mb-2">Recyclables</h3>
<p class="font-body-md text-body-md text-on-surface-variant">Paper, plastic, metal, and glass.</p>
</div>
</label>
<label class="cursor-pointer group">
<input class="sr-only" name="waste_type" type="radio">
<div class="h-full p-md bg-surface-container-lowest border border-outline-variant rounded-xl group-hover:border-primary/50 group-hover:bg-surface-container-low transition-all">
<div class="w-12 h-12 rounded-lg bg-surface-variant flex items-center justify-center text-on-surface-variant mb-4 group-hover:text-primary transition-colors">
<span class="material-symbols-outlined" data-icon="park">park</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface mb-2">Organic/Green Waste</h3>
<p class="font-body-md text-body-md text-on-surface-variant">Garden clippings, food scraps, and yard debris.</p>
</div>
</label>
<label class="cursor-pointer group">
<input class="sr-only" name="waste_type" type="radio">
<div class="h-full p-md bg-surface-container-lowest border border-outline-variant rounded-xl group-hover:border-primary/50 group-hover:bg-surface-container-low transition-all">
<div class="w-12 h-12 rounded-lg bg-surface-variant flex items-center justify-center text-on-surface-variant mb-4 group-hover:text-primary transition-colors">
<span class="material-symbols-outlined" data-icon="chair">chair</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface mb-2">Bulky Items</h3>
<p class="font-body-md text-body-md text-on-surface-variant">Furniture, mattresses, or large appliances.</p>
</div>
</label>
<label class="cursor-pointer group md:col-span-2 lg:col-span-1">
<input class="sr-only" name="waste_type" type="radio">
<div class="h-full p-md bg-surface-container-lowest border border-outline-variant rounded-xl group-hover:border-primary/50 group-hover:bg-surface-container-low transition-all">
<div class="w-12 h-12 rounded-lg bg-error-container/20 flex items-center justify-center text-error mb-4">
<span class="material-symbols-outlined" data-icon="warning">warning</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface mb-2">Hazardous/E-Waste</h3>
<p class="font-body-md text-body-md text-on-surface-variant">Batteries, chemicals, or electronics.</p>
</div>
</label>
</div>
<!-- Footer Actions -->
<div class="flex flex-col-reverse sm:flex-row justify-between items-center gap-4 pt-md border-t border-outline-variant">
<button class="w-full sm:w-auto px-6 py-3 border border-secondary text-secondary font-label-caps text-label-caps rounded-lg hover:bg-surface-variant transition-colors">
                        Cancel
                    </button>
<button class="w-full sm:w-auto px-6 py-3 bg-primary text-on-primary font-label-caps text-label-caps rounded-lg hover:bg-primary-container transition-colors shadow-sm">
                        Continue
                    </button>
</div>
</div>
