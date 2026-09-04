<!-- Waste Records view - loaded via collector_content.php -->
<!-- Header Section -->
<div>
    <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface mb-2">Record Collected Waste</h1>
    <p id="waste-subtitle" class="font-body-md text-body-md text-on-surface-variant">Log details for the selected collection request</p>
</div>

<!-- Summary Card -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-stack-md flex flex-col md:flex-row gap-stack-md md:gap-stack-lg">
    <div class="flex-1">
        <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block mb-1">Request Info</span>
        <div class="flex items-center gap-2 mb-1">
            <span class="material-symbols-outlined text-primary text-sm">tag</span>
            <span id="waste-req-number" class="font-label-md text-label-md text-on-surface">—</span>
        </div>
        <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-status-pending text-sm">category</span>
            <span id="waste-type-display" class="font-body-sm text-body-sm text-on-surface-variant">—</span>
        </div>
    </div>
    <div class="flex-1 border-t md:border-t-0 md:border-l border-border-subtle pt-4 md:pt-0 md:pl-stack-lg">
        <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block mb-1">Status</span>
        <div class="flex items-center gap-2">
            <span id="waste-status-chip" class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-status-progress">In Progress</span>
        </div>
    </div>
    <div class="flex-1 border-t md:border-t-0 md:border-l border-border-subtle pt-4 md:pt-0 md:pl-stack-lg">
        <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block mb-1">Location</span>
        <div class="flex items-start gap-2">
            <span class="material-symbols-outlined text-primary text-sm mt-0.5">location_on</span>
            <span id="waste-location" class="font-body-sm text-body-sm text-on-surface-variant">—</span>
        </div>
    </div>
</div>

<!-- Form Section -->
<form id="waste-form" class="space-y-stack-lg">
    <div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-stack-md md:p-stack-lg space-y-stack-lg">
        <h2 class="font-headline-sm text-headline-sm text-on-surface border-b border-border-subtle pb-4">Collection Details</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-stack-md">
            <div>
                <label class="block font-label-md text-label-md text-on-surface mb-2" for="quantity">Waste Quantity <span class="text-error">*</span></label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="material-symbols-outlined text-on-surface-variant text-lg">scale</span>
                    </div>
                    <input class="block w-full pl-10 pr-3 py-3 border border-border-subtle rounded-lg focus:ring-primary focus:border-primary font-body-md text-body-md bg-surface-bright" id="quantity" name="quantity" placeholder="Enter amount" required="" type="number" min="0" step="0.01"/>
                </div>
            </div>
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
        <div>
            <label class="block font-label-md text-label-md text-on-surface mb-2" for="notes">Additional Notes</label>
            <textarea class="block w-full py-3 px-3 border border-border-subtle rounded-lg focus:ring-primary focus:border-primary font-body-md text-body-md bg-surface-bright" id="notes" name="notes" placeholder="Any issues encountered, access problems, or specific observations..." rows="4"></textarea>
        </div>
    </div>
    <div class="bg-surface-container-lowest border border-border-subtle border-dashed rounded-xl p-stack-lg text-center cursor-pointer hover:bg-surface-container-low transition-colors">
        <span class="material-symbols-outlined text-primary text-4xl mb-2">add_a_photo</span>
        <p class="font-label-md text-label-md text-on-surface">Add Collection Photos</p>
        <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Photo proof coming soon. You can still save the record now.</p>
    </div>
</form>

<!-- Sticky Footer Actions -->
<div class="mt-stack-lg flex flex-col-reverse sm:flex-row justify-end gap-stack-md">
    <button class="w-full sm:w-auto px-6 py-3 rounded-lg font-label-md text-label-md border border-border-subtle text-on-surface hover:bg-surface-container-low transition-colors bg-surface-container-lowest" type="button" data-view="collection_details">Cancel</button>
    <button id="waste-save-btn" class="w-full sm:w-auto px-6 py-3 rounded-lg font-label-md text-label-md bg-primary-container text-on-primary hover:bg-primary transition-colors flex items-center justify-center gap-2" type="button">
        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">save</span>
        Save Waste Record
    </button>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  var UI = window.EcoWasteUI;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var state = window.EcoWasteAppState || {};
  var requestId = state.selectedRequestId;
  var current = null;

  var STATUS_CHIP = {
    Scheduled: "bg-amber-100 text-amber-800",
    "In Transit": "bg-blue-100 text-blue-800",
    Completed: "bg-emerald-100 text-emerald-800"
  };
  var STATUS_LABEL = { Scheduled: "Pending", "In Transit": "In Progress", Completed: "Completed" };

  async function loadContext() {
    if (!requestId) {
      document.getElementById("waste-req-number").textContent = "No collection selected";
      document.getElementById("waste-type-display").textContent = "Pick a collection from Assigned Collections first.";
      return;
    }
    var uid = D.currentUserId();
    var rows = await D.list("collection_requests", "id,request_number,location,waste_type,status", null, "id=eq." + requestId + "&collector_id=eq." + uid);
    if (!rows || !rows.length) {
      if (requestId) UI.toast("This task is not assigned to you.", "error");
      return;
    }
    current = rows[0];
    document.getElementById("waste-req-number").textContent = current.request_number;
    document.getElementById("waste-type-display").textContent = current.waste_type || "General";
    document.getElementById("waste-location").textContent = current.location || "—";
    document.getElementById("waste-subtitle").textContent = "Log details for " + current.request_number;
    var chipCls = STATUS_CHIP[current.status] || "bg-surface-container-high text-on-surface-variant";
    var chipLabel = STATUS_LABEL[current.status] || current.status;
    var chipEl = document.getElementById("waste-status-chip");
    chipEl.className = "inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold " + chipCls;
    chipEl.textContent = chipLabel;
  }

  document.getElementById("waste-save-btn").addEventListener("click", function () {
    var qty = parseFloat(document.getElementById("quantity").value);
    if (!requestId || !current) { UI.toast("No collection selected.", "error"); return; }
    if (!qty || qty <= 0) { UI.toast("Enter a quantity greater than 0.", "error"); return; }
    var unit = document.getElementById("unit").value;
    if (!unit) { UI.toast("Please select a unit.", "error"); return; }
    var quantityType = document.querySelector('input[name="quantityType"]:checked');
    var condition = document.getElementById("condition").value;
    var notes = document.getElementById("notes").value.trim();
    var weightKg = unit === "tons" ? qty * 1000 : qty;

    var btn = document.getElementById("waste-save-btn");
    btn.disabled = true;
    btn.classList.add("opacity-70");

    D.add("recycling_records", {
      log_number: "LOG-" + Date.now().toString().slice(-8),
      recorded_at: new Date().toISOString(),
      material_type: current.waste_type || "General",
      weight_kg: weightKg,
      collector_id: D.currentUserId(),
      facility: "Collection vehicle",
      status: "Verified",
      unit: unit,
      quantity_type: quantityType ? quantityType.value : "Actual",
      condition_t: condition,
      notes: notes,
      request_id: current.id,
      proof_url: null
    }).then(function () {
      UI.toast("Waste record saved.", "success");
      document.getElementById("quantity").value = "";
      document.getElementById("notes").value = "";
      document.getElementById("condition").value = "normal";
      document.querySelector('input[name="quantityType"][value="actual"]').checked = true;
    }).catch(function (err) {
      UI.toast("Could not save record: " + (err.message || "unknown error"), "error");
    }).finally(function () {
      btn.disabled = false;
      btn.classList.remove("opacity-70");
    });
  });

  loadContext().catch(function (err) { console.error("EcoWaste waste records failed to load:", err); });
})();
</script>
