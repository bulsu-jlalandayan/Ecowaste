<!-- Waste Records view - loaded via collector_content.php -->
<!-- Header Section -->
<div>
    <h1 id="waste-title" class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface mb-2">Record Collected Waste</h1>
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
            <span id="waste-status-chip" class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-status-progress">—</span>
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
        <h2 class="font-headline-sm text-headline-sm text-on-surface border-b border-border-subtle pb-4">Collection</h2>
        <div>
            <label class="block font-label-md text-label-md text-on-surface mb-2" for="waste-request-select">Collection Request <span class="text-error">*</span></label>
            <div id="waste-request-locked" class="hidden"></div>
            <select id="waste-request-select" class="hidden block w-full py-3 px-3 border border-border-subtle rounded-lg focus:ring-primary focus:border-primary font-body-md text-body-md bg-surface-bright" required="">
                <option disabled="" selected="" value="">Select a collection request...</option>
            </select>
            <p id="waste-request-none" class="hidden font-body-sm text-body-sm text-on-surface-variant">No active collections assigned to you yet.</p>
        </div>
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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-stack-md items-start">
            <div>
                <label class="block font-label-md text-label-md text-on-surface mb-2" for="collection-status">Collection Status <span class="text-error">*</span></label>
                <select class="block w-full py-3 px-3 border border-border-subtle rounded-lg focus:ring-primary focus:border-primary font-body-md text-body-md bg-surface-bright" id="collection-status" name="collection_status" required="">
                    <option value="In Process">In Process</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
        </div>
    </div>
    <div class="bg-surface-container-lowest border border-border-subtle border-dashed rounded-xl p-stack-lg text-center cursor-pointer hover:bg-surface-container-low transition-colors" id="photo-drop" role="button" tabindex="0">
        <input class="hidden" id="photo-input" type="file" accept="image/*"/>
        <span class="material-symbols-outlined text-primary text-4xl mb-2">add_a_photo</span>
        <p class="font-label-md text-label-md text-on-surface">Add Collection Photo</p>
        <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">PNG, JPG (max 10MB)</p>
    </div>
    <div id="evidence-preview" class="mt-3"></div>
</form>

<!-- Sticky Footer Actions -->
<div class="mt-stack-lg flex flex-col-reverse sm:flex-row justify-end gap-stack-md">
    <button id="waste-cancel-btn" class="w-full sm:w-auto px-6 py-3 rounded-lg font-label-md text-label-md border border-border-subtle text-on-surface hover:bg-surface-container-low transition-colors bg-surface-container-lowest" type="button" data-view="records">Cancel</button>
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
  var editingId = state.editingRecordId || null;
  var current = null;
  var editing = null;
  var activeRequests = [];
  var selectedFile = null;

  var STATUS_CHIP = {
    Scheduled: "bg-amber-100 text-amber-800",
    "In Transit": "bg-blue-100 text-blue-800",
    Completed: "bg-emerald-100 text-emerald-800"
  };
  var STATUS_LABEL = { Scheduled: "Pending", "In Transit": "In Progress", Completed: "Completed" };

  function setStatusChip(status) {
    var chipCls = STATUS_CHIP[status] || "bg-surface-container-high text-on-surface-variant";
    var chipLabel = STATUS_LABEL[status] || status;
    var chipEl = document.getElementById("waste-status-chip");
    chipEl.className = "inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold " + chipCls;
    chipEl.textContent = chipLabel;
  }

  function renderLocked(req, fallback) {
    var wrap = document.getElementById("waste-request-locked");
    var sel = document.getElementById("waste-request-select");
    var none = document.getElementById("waste-request-none");
    if (req) {
      wrap.className = "inline-flex items-center gap-2 px-3 py-2 border border-border-subtle rounded-lg bg-surface-container-low font-body-sm text-body-sm text-on-surface";
      wrap.innerHTML = '<span class="material-symbols-outlined text-primary text-[16px]">event_note</span> ' + D.esc(req.request_number);
      wrap.classList.remove("hidden");
      sel.classList.add("hidden");
      if (none) none.classList.add("hidden");
      return;
    }
    if (fallback) {
      wrap.className = "inline-flex items-center gap-2 px-3 py-2 border border-border-subtle rounded-lg bg-surface-container-low font-body-sm text-body-sm text-on-surface";
      wrap.innerHTML = '<span class="material-symbols-outlined text-primary text-[16px]">link</span> ' + D.esc(fallback);
      wrap.classList.remove("hidden");
      sel.classList.add("hidden");
      if (none) none.classList.add("hidden");
      return;
    }
    wrap.classList.add("hidden");
  }

  function showEvidence(url) {
    var host = document.getElementById("evidence-preview");
    if (!host) return;
    host.innerHTML = "";
    if (!url) return;
    var html = '<div class="relative inline-block"><img src="' + D.esc(url) + '" alt="Evidence photo" class="w-28 h-28 object-cover rounded-lg border border-border-subtle"/>' +
      '<button id="evidence-remove" type="button" class="absolute -top-2 -right-2 w-7 h-7 rounded-full bg-error text-white flex items-center justify-center shadow" aria-label="Remove photo"><span class="material-symbols-outlined" style="font-size:16px;">close</span></button></div>';
    host.innerHTML = html;
    document.getElementById("evidence-remove").addEventListener("click", function () {
      selectedFile = null;
      editing = editing || {};
      editing.proof_url = null;
      showEvidence(null);
    });
  }

  function handleFiles(files) {
    if (!files || !files.length) return;
    var file = files[0];
    if (!/^image\//i.test(file.type)) { UI.toast("Please choose an image file.", "error"); return; }
    selectedFile = file;
    var reader = new FileReader();
    reader.onload = function (e) { showEvidence(e.target.result); };
    reader.readAsDataURL(file);
    // Also keep the existing proof_url in case replace fails silently
  }

  var drop = document.getElementById("photo-drop");
  var input = document.getElementById("photo-input");
  if (drop && input) {
    function pick() { input.click(); }
    drop.addEventListener("click", pick);
    drop.addEventListener("keydown", function (e) {
      if (e.key === "Enter" || e.key === " ") { e.preventDefault(); pick(); }
    });
    drop.addEventListener("dragover", function (e) { e.preventDefault(); drop.classList.add("bg-surface-container-low"); });
    drop.addEventListener("dragleave", function () { drop.classList.remove("bg-surface-container-low"); });
    drop.addEventListener("drop", function (e) {
      e.preventDefault();
      drop.classList.remove("bg-surface-container-low");
      if (e.dataTransfer.files && e.dataTransfer.files.length) handleFiles(e.dataTransfer.files);
    });
    input.addEventListener("change", function () { handleFiles(input.files); });
  }

  function fillForm(r, target) {
    document.getElementById("quantity").value = r.weight_kg ? String(r.weight_kg) : "";
    var unit = r.unit || "kg";
    document.getElementById("unit").value = ["kg", "tons", "bags", "items"].indexOf(unit) !== -1 ? unit : "kg";
    var qtype = (r.quantity_type === "Estimated" || r.quantity_type === "estimated") ? "estimated" : "actual";
    document.querySelector('input[name="quantityType"][value="' + qtype + '"]').checked = true;
    var condMap = { "Good Condition": "normal", "Needs Sorting": "mixed", "Contaminated": "mixed", "Rejected": "hazardous" };
    document.getElementById("condition").value = condMap[r.condition_t] || "normal";
    document.getElementById("notes").value = r.notes || "";
    document.getElementById("collection-status").value = r.collection_status === "Completed" ? "Completed" : "In Process";
    if (r.proof_url) showEvidence(r.proof_url);
  }

  async function loadContext() {
    var uid = D.currentUserId();
    if (editingId) {
      var erows = await D.list("recycling_records",
        "id,log_number,material_type,weight_kg,unit,quantity_type,condition_t,notes,proof_url,collection_status,request_id,collector_id,status,recorded_at",
        null, "id=eq." + editingId + "&collector_id=eq." + uid);
      if (!erows || !erows.length) {
        UI.toast("Record not found.", "error");
        window.EcoWasteRouter.go("records");
        return;
      }
      editing = erows[0];
      requestId = editing.request_id;
      document.getElementById("waste-title").textContent = "Edit Waste Record";
      document.getElementById("waste-subtitle").textContent = "Update record #" + editing.log_number;
      var saveBtn = document.getElementById("waste-save-btn");
      saveBtn.innerHTML = '<span class="material-symbols-outlined text-sm" style="font-variation-settings: \'FILL\' 1;">save</span> Update Record';
    }

    activeRequests = await D.list("collection_requests",
      "id,request_number,location,waste_type,status", "requested_at.asc",
      "collector_id=eq." + uid + "&status=neq.Completed");

    if (editingId) {
      var linked = requestId ? activeRequests.filter(function (r) { return r.id === requestId; })[0] || null : null;
      current = linked;
      renderLocked(linked, editing ? "Linked to a collection request" : null);
    } else if (requestId) {
      var lockedArr = activeRequests.filter(function (r) { return r.id === requestId; });
      if (lockedArr.length) {
        current = lockedArr[0];
        renderLocked(current, null);
        setStatusChip(current.status);
        document.getElementById("waste-req-number").textContent = current.request_number;
        document.getElementById("waste-type-display").textContent = current.waste_type || "General";
        document.getElementById("waste-location").textContent = current.location || "—";
        document.getElementById("waste-subtitle").textContent = "Log details for " + current.request_number;
      } else {
        var missNote = document.getElementById("waste-request-none");
        missNote.classList.remove("hidden");
        missNote.textContent = "This collection request is not assigned to you.";
      }
    }

    if (!requestId && !editingId) {
      var sel = document.getElementById("waste-request-select");
      if (activeRequests.length) {
        renderLocked(null, null);
        sel.classList.remove("hidden");
        sel.innerHTML = '<option disabled="" selected="" value="">Select a collection request...</option>';
        activeRequests.forEach(function (r) {
          var o = document.createElement("option");
          o.value = r.id;
          o.textContent = r.request_number + " - " + (r.waste_type || "General") + " (" + (r.location || "No location") + ")";
          sel.appendChild(o);
        });
        sel.addEventListener("change", function () {
          requestId = sel.value;
          current = activeRequests.filter(function (r) { return r.id === requestId; })[0] || null;
          document.getElementById("waste-req-number").textContent = current ? current.request_number : "—";
          document.getElementById("waste-type-display").textContent = current ? (current.waste_type || "General") : "—";
          document.getElementById("waste-location").textContent = current ? (current.location || "—") : "—";
          setStatusChip(current ? current.status : "");
        });
      } else {
        sel.classList.add("hidden");
        document.getElementById("waste-request-none").classList.remove("hidden");
      }
    }

    if (editingId && editing) {
      document.getElementById("waste-req-number").textContent = editing.log_number;
      document.getElementById("waste-type-display").textContent = editing.material_type || "—";
      document.getElementById("waste-location").textContent = editing.request_id ? "Linked to a collection request" : "—";
      setStatusChip(editing.collection_status || "");
      fillForm(editing, editing);
    }
  }

  document.getElementById("waste-save-btn").addEventListener("click", async function () {
    var qty = parseFloat(document.getElementById("quantity").value);
    if (!requestId || !current) {
      if (!editingId) { UI.toast("Select a collection request.", "error"); return; }
    }
    if (!qty || qty <= 0) { UI.toast("Enter a quantity greater than 0.", "error"); return; }
    var unit = document.getElementById("unit").value;
    if (!unit) { UI.toast("Please select a unit.", "error"); return; }
    var collectionStatus = document.getElementById("collection-status").value;
    if (!collectionStatus) { UI.toast("Select a collection status (In Process or Completed).", "error"); return; }
    var quantityType = document.querySelector('input[name="quantityType"]:checked');
    var condition = document.getElementById("condition").value;
    var notes = document.getElementById("notes").value.trim();
    var weightKg = unit === "tons" ? qty * 1000 : qty;

    var btn = document.getElementById("waste-save-btn");
    btn.disabled = true;
    btn.classList.add("opacity-70");

    try {
      var proofUrl = editing ? (editing.proof_url || null) : null;
      if (selectedFile) {
        proofUrl = await D.upload(selectedFile, "waste-reports");
      }

      if (editingId) {
        await D.update("recycling_records", "id=eq." + editingId, {
          material_type: editing.material_type,
          weight_kg: weightKg,
          unit: unit,
          quantity_type: quantityType ? quantityType.value : "Actual",
          condition_t: condition,
          notes: notes,
          proof_url: proofUrl,
          collection_status: collectionStatus
        });
        UI.toast("Record updated.", "success");
      } else {
        await D.add("recycling_records", {
          log_number: "LOG-" + Date.now().toString().slice(-8),
          recorded_at: new Date().toISOString(),
          material_type: current ? (current.waste_type || "General") : "General",
          weight_kg: weightKg,
          collector_id: D.currentUserId(),
          facility: "Collection vehicle",
          status: "Verified",
          unit: unit,
          quantity_type: quantityType ? quantityType.value : "Actual",
          condition_t: condition,
          notes: notes,
          request_id: current ? current.id : null,
          proof_url: proofUrl,
          collection_status: collectionStatus
        });
        UI.toast("Waste record saved.", "success");
      }
      if (window.EcoWasteRouter) window.EcoWasteRouter.go("records");
    } catch (err) {
      UI.toast("Could not save record: " + (err.message || "unknown error"), "error");
    } finally {
      btn.disabled = false;
      btn.classList.remove("opacity-70");
    }
  });

  var cancelBtn = document.getElementById("waste-cancel-btn");
  if (cancelBtn) cancelBtn.addEventListener("click", function () {
    if (window.EcoWasteRouter) window.EcoWasteRouter.go("records");
  });

  loadContext().catch(function (err) { console.error("EcoWaste waste records failed to load:", err); });
})();
</script>
