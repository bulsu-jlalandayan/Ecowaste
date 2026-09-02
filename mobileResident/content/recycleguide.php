<!-- Mobile Recycling Guide view -->
<div class="p-4 flex flex-col gap-4">
<div>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface">Recycling Guide</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Learn what you can recycle and how to sort it.</p>
</div>

<!-- Search -->
<div class="relative">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-on-surface-variant">
<span class="material-symbols-outlined text-[20px]">search</span>
</div>
<input class="pl-10 pr-4 py-3 border border-outline-variant rounded-xl focus:ring-1 focus:ring-primary focus:border-primary text-body-sm text-body-sm shadow-sm bg-surface-container-lowest text-on-surface placeholder:text-outline w-full" id="recycle-search" placeholder="Search for an item (e.g., 'plastic bottle')" type="text"/>
</div>

<!-- Categories -->
<div class="flex flex-col gap-3" id="recycle-cards">
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 cursor-pointer group hover:shadow-md transition-shadow">
<div class="flex items-center gap-3 mb-2">
<span class="material-symbols-outlined w-10 h-10 rounded-lg bg-surface-container-low flex items-center justify-center text-primary">description</span>
<h3 class="font-body-md text-body-md text-on-surface font-semibold">Paper</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Clean, dry paper products, cardboard boxes (flattened), and newspapers.</p>
</div>
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 cursor-pointer group hover:shadow-md transition-shadow">
<div class="flex items-center gap-3 mb-2">
<span class="material-symbols-outlined w-10 h-10 rounded-lg bg-surface-container-low flex items-center justify-center text-primary">local_drink</span>
<h3 class="font-body-md text-body-md text-on-surface font-semibold">Plastic</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Bottles, jugs, and tubs (rinsed). Check local numbering guidelines for accepted types.</p>
</div>
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 cursor-pointer group hover:shadow-md transition-shadow">
<div class="flex items-center gap-3 mb-2">
<span class="material-symbols-outlined w-10 h-10 rounded-lg bg-surface-container-low flex items-center justify-center text-primary">wine_bar</span>
<h3 class="font-body-md text-body-md text-on-surface font-semibold">Glass</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Clean glass bottles and jars. Lids should typically be removed and sorted separately.</p>
</div>
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 cursor-pointer group hover:shadow-md transition-shadow">
<div class="flex items-center gap-3 mb-2">
<span class="material-symbols-outlined w-10 h-10 rounded-lg bg-surface-container-low flex items-center justify-center text-primary">hardware</span>
<h3 class="font-body-md text-body-md text-on-surface font-semibold">Metal</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Aluminum cans, steel/tin cans, and clean aluminum foil. Crush cans to save space.</p>
</div>
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 cursor-pointer group hover:shadow-md transition-shadow">
<div class="flex items-center gap-3 mb-2">
<span class="material-symbols-outlined w-10 h-10 rounded-lg bg-surface-container-low flex items-center justify-center text-primary">compost</span>
<h3 class="font-body-md text-body-md text-on-surface font-semibold">Organic</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Food scraps, yard waste, and compostable materials. Avoid plastic bags in organic bins.</p>
</div>
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 cursor-pointer group hover:shadow-md transition-shadow">
<div class="flex items-center gap-3 mb-2">
<span class="material-symbols-outlined w-10 h-10 rounded-lg bg-surface-container-low flex items-center justify-center text-primary">devices</span>
<h3 class="font-body-md text-body-md text-on-surface font-semibold">E-Waste</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Old electronics, batteries, and appliances. These require specialized drop-off locations.</p>
</div>
<div class="bg-surface-container-lowest border border-error-container/50 rounded-xl p-4 cursor-pointer group hover:shadow-md transition-shadow">
<div class="flex items-center gap-3 mb-2">
<span class="material-symbols-outlined w-10 h-10 rounded-lg bg-error-container/20 flex items-center justify-center text-error">warning</span>
<h3 class="font-body-md text-body-md text-on-surface font-semibold">Hazardous</h3>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Chemicals, paint, and fluorescent bulbs. Must be handled safely at designated facilities.</p>
</div>
</div>

<!-- General Guidelines -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4">
<h3 class="font-headline-sm text-headline-sm text-primary mb-3">General Guidelines</h3>
<div class="flex flex-col gap-4">
<div>
<h4 class="font-body-md text-body-md text-tertiary font-semibold flex items-center gap-2 mb-2"><span class="material-symbols-outlined text-tertiary">check_circle</span> Dos</h4>
<ul class="space-y-2">
<li class="flex items-start gap-2"><span class="material-symbols-outlined text-outline mt-0.5 text-[18px]">arrow_right</span><span class="font-body-sm text-body-sm text-on-surface-variant">Rinse all containers before placing them in the bin.</span></li>
<li class="flex items-start gap-2"><span class="material-symbols-outlined text-outline mt-0.5 text-[18px]">arrow_right</span><span class="font-body-sm text-body-sm text-on-surface-variant">Flatten cardboard boxes to maximize bin space.</span></li>
<li class="flex items-start gap-2"><span class="material-symbols-outlined text-outline mt-0.5 text-[18px]">arrow_right</span><span class="font-body-sm text-body-sm text-on-surface-variant">Check local guidelines for specific plastic types accepted.</span></li>
</ul>
</div>
<div>
<h4 class="font-body-md text-body-md text-error font-semibold flex items-center gap-2 mb-2"><span class="material-symbols-outlined text-error">cancel</span> Don'ts</h4>
<ul class="space-y-2">
<li class="flex items-start gap-2"><span class="material-symbols-outlined text-outline mt-0.5 text-[18px]">arrow_right</span><span class="font-body-sm text-body-sm text-on-surface-variant">Do not bag recyclables in plastic garbage bags.</span></li>
<li class="flex items-start gap-2"><span class="material-symbols-outlined text-outline mt-0.5 text-[18px]">arrow_right</span><span class="font-body-sm text-body-sm text-on-surface-variant">Do not include heavily soiled items (like greasy pizza boxes).</span></li>
<li class="flex items-start gap-2"><span class="material-symbols-outlined text-outline mt-0.5 text-[18px]">arrow_right</span><span class="font-body-sm text-body-sm text-on-surface-variant">Do not put tangled items like hoses or wires in standard bins.</span></li>
</ul>
</div>
</div>
</div>

<!-- Tips -->
<div class="flex flex-col gap-3">
<h3 class="font-headline-sm text-headline-sm text-primary">Latest Tips</h3>
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4">
<h4 class="font-body-md text-body-md text-on-surface font-bold">How to efficiently separate household waste</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Set up a simple home sorting station with labeled bins to make recycling easier.</p>
</div>
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4">
<h4 class="font-body-md text-body-md text-on-surface font-bold">Strategies for reducing daily plastic usage</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Simple swaps — like reusable bottles and bags — make a big impact.</p>
</div>
</div>
</div>
<script>
(function () {
  "use strict";
  if (!window.EcoWasteData) return;
  var grid = document.getElementById("recycle-cards");
  var search = document.getElementById("recycle-search");
  if (!grid || !search) return;
  var cards = Array.prototype.slice.call(grid.children);
  search.addEventListener("input", function () {
    var q = search.value.trim().toLowerCase();
    cards.forEach(function (card) {
      var show = !q || card.textContent.toLowerCase().indexOf(q) !== -1;
      card.style.display = show ? "" : "none";
    });
  });
})();
</script>
