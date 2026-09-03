<!-- Mobile Waste Records view -->
<div class="p-4 flex flex-col gap-4">
<!-- Back -->
<button class="self-start inline-flex items-center gap-1.5 font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" data-view="collection_details" type="button">
<span class="material-symbols-outlined text-[20px]">arrow_back</span> Details
</button>

<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface flex items-center gap-2">
<span class="material-symbols-outlined w-9 h-9 rounded-xl bg-primary text-on-primary flex items-center justify-center text-[20px]">delete_sweep</span>
Record Waste
</h2>

<!-- Context -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4">
<div class="flex items-center justify-between gap-2">
<span id="waste-request-number" class="font-label-md text-label-md text-primary">—</span>
<span id="waste-status-chip" class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold bg-blue-100 text-blue-800">In Progress</span>
</div>
<p id="waste-waste-type" class="font-body-md text-body-md text-on-surface mt-2">—</p>
<p id="waste-location" class="font-body-sm text-body-sm text-on-surface-variant mt-1">—</p>
</div>

<!-- Form -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 flex flex-col gap-4">
<div>
<label class="font-label-sm text-label-sm text-primary" for="waste-qty">Quantity</label>
<div class="mt-1.5 flex gap-2">
<input id="waste-qty" class="w-full px-3 py-3 border border-border-subtle rounded-xl font-body-md text-body-md outline-none" min="0" placeholder="0" step="0.01" type="number"/>
<select id="waste-unit" class="w-40 px-3 py-3 border border-border-subtle rounded-xl font-body-md text-body-md appearance-none cursor-pointer">
<option value="kg">kg</option>
<option value="tons">tons</option>
<option value="bags">bags</option>
<option value="items">items</option>
</select>
</div>
</div>
<div>
<label class="font-label-sm text-label-sm text-primary">Quantity Type</label>
<div class="mt-1.5 flex gap-5">
<label class="flex items-center gap-2 font-body-md text-body-md text-on-surface cursor-pointer">
<input class="w-4 h-4" name="quantity_type" type="radio" value="Actual" checked/> Actual
</label>
<label class="flex items-center gap-2 font-body-md text-body-md text-on-surface cursor-pointer">
<input class="w-4 h-4" name="quantity_type" type="radio" value="Estimated"/> Estimated
</label>
</div>
</div>
<div>
<label class="font-label-sm text-label-sm text-primary" for="waste-condition">Condition</label>
<select id="waste-condition" class="w-full mt-1.5 px-3 py-3 border border-border-subtle rounded-xl font-body-md text-body-md appearance-none cursor-pointer">
<option value="Good Condition">Good Condition</option>
<option value="Needs Sorting">Needs Sorting</option>
<option value="Contaminated">Contaminated</option>
<option value="Rejected">Rejected</option>
</select>
</div>
<div>
<label class="font-label-sm text-label-sm text-primary" for="waste-notes">Notes</label>
<textarea id="waste-notes" class="w-full mt-1.5 px-3 py-3 border border-border-subtle rounded-xl font-body-md text-body-md min-h-[72px] outline-none" placeholder="Optional notes for this collection..."></textarea>
</div>
<div class="border-2 border-dashed border-emerald-300 rounded-xl bg-emerald-50/50 p-4 flex flex-col items-center gap-1.5">
<span class="material-symbols-outlined text-[32px] text-emerald-500">add_a_photo</span>
<p class="font-body-sm text-body-sm text-emerald-700">Photo proof coming soon</p>
<p class="font-label-sm text-label-sm text-emerald-600/80">You can still save the record now.</p>
</div>
</div>

<!-- Save bar -->
<div class="flex gap-3">
<a class="flex-1 inline-flex items-center justify-center py-3.5 rounded-xl border-2 border-border-subtle text-on-surface font-label-md text-label-md hover:bg-surface-container-low transition-colors" href="#" data-view="collection_details">Cancel</a>
<button id="waste-save-btn" class="flex-1 inline-flex items-center justify-center gap-2 py-3.5 rounded-xl bg-gradient-to-r from-primary to-primary-container text-on-primary font-label-md text-label-md shadow-md shadow-primary/25 hover:opacity-90 active:scale-[0.99] transition-all" type="button">
<span class="material-symbols-outlined text-[20px]">save</span> Save Record
</button>
</div>
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
    Scheduled: ["bg-amber-100 text-amber-800", "Pending"],
    "In Transit": ["bg-blue-100 text-blue-800", "In Progress"],
    Completed: ["bg-emerald-100 text-emerald-800", "Completed"]
  };

  async function loadContext() {
    if (!requestId) {
      document.getElementById("waste-request-number").textContent = "No collection selected";
      var ctx = document.getElementById("waste-waste-type");
      if (ctx) ctx.textContent = "Pick a collection from Assigned Collections first.";
      return;
    }
    var rows = await D.list("collection_requests", "id,request_number,location,waste_type,status", null, "id=eq." + requestId);
    if (!rows || !rows.length) return;
    current = rows[0];
    document.getElementById("waste-request-number").textContent = current.request_number;
    document.getElementById("waste-waste-type").textContent = current.waste_type || "General";
    document.getElementById("waste-location").textContent = current.location || "";
    var chip = STATUS_CHIP[current.status] || ["bg-surface-container-high text-on-surface-variant", current.status];
    var chipEl = document.getElementById("waste-status-chip");
    chipEl.className = "inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold " + chip[0];
    chipEl.textContent = chip[1];
  }

  document.getElementById("waste-save-btn").addEventListener("click", function () {
    var qty = parseFloat(document.getElementById("waste-qty").value);
    if (!requestId || !current) {
      UI.toast.error("No collection selected.");
      return;
    }
    if (!qty || qty <= 0) {
      UI.toast.error("Enter a quantity greater than 0.");
      return;
    }
    var unit = document.getElementById("waste-unit").value;
    var quantityType = document.querySelector('input[name="quantity_type"]:checked');
    var condition = document.getElementById("waste-condition").value;
    var notes = document.getElementById("waste-notes").value.trim();
    var weightKg = unit === "tons" ? qty * 1000 : qty;

    var btn = document.getElementById("waste-save-btn");
    btn.disabled = true;
    btn.classList.add("opacity-70");

    D.add("recycling_records", {
      log_number: "LOG-" + Date.now().toString().slice(-8),
      recorded_at: new Date().toISOString(),
      material_type: current.waste_type || "General",
      weight_kg: weightKg,
      collector_name: null,
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
      UI.toast.success("Waste record saved.");
      document.getElementById("waste-qty").value = "";
      document.getElementById("waste-notes").value = "";
      document.getElementById("waste-condition").value = "Good Condition";
      document.querySelector('input[name="quantity_type"][value="Actual"]').checked = true;
    }).catch(function (err) {
      UI.toast.error("Could not save record: " + (err.message || "unknown error"));
    }).finally(function () {
      btn.disabled = false;
      btn.classList.remove("opacity-70");
    });
  });

  loadContext().catch(function (err) {
    console.error("EcoWaste waste records failed to load:", err);
  });
})();
</script>