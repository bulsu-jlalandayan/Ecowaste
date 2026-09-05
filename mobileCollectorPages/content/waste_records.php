<!-- Mobile Waste Records view -->
<div class="p-4 flex flex-col gap-4">
<!-- Back -->
<button class="self-start inline-flex items-center gap-1.5 font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors" data-view="collection_details" type="button">
<span class="material-symbols-outlined text-[20px]">arrow_back</span> Details
</button>

<h2 id="waste-title" class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface flex items-center gap-2">
<span class="material-symbols-outlined w-9 h-9 rounded-xl bg-primary text-on-primary flex items-center justify-center text-[20px]">delete_sweep</span>
Record Waste
</h2>

<!-- Context -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4">
<div class="flex items-center justify-between gap-2">
<span id="waste-request-number" class="font-label-md text-label-md text-primary">—</span>
<span id="waste-status-chip" class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold bg-blue-100 text-blue-800">—</span>
</div>
<p id="waste-waste-type" class="font-body-md text-body-md text-on-surface mt-2">—</p>
<p id="waste-location" class="font-body-sm text-body-sm text-on-surface-variant mt-1">—</p>
</div>

<!-- Collection selector (standalone mode) -->
<div id="waste-collection-section" class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 hidden">
<label class="font-label-sm text-label-sm text-primary">Collection Request *</label>
<div id="waste-request-locked" class="hidden mt-1.5"></div>
<select id="waste-request-select" class="w-full mt-1.5 px-3 py-3 border border-border-subtle rounded-xl font-body-md text-body-md appearance-none cursor-pointer">
<option disabled selected value="">Select a collection request...</option>
</select>
<p id="waste-request-none" class="hidden font-body-sm text-body-sm text-on-surface-variant mt-1">No active collections assigned to you.</p>
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
<div>
<label class="font-label-sm text-label-sm text-primary" for="waste-collection-status">Collection Status *</label>
<select id="waste-collection-status" class="w-full mt-1.5 px-3 py-3 border border-border-subtle rounded-xl font-body-md text-body-md appearance-none cursor-pointer">
<option value="In Process">In Process</option>
<option value="Completed">Completed</option>
</select>
</div>
<div class="border-2 border-dashed border-emerald-300 rounded-xl bg-emerald-50/50 p-4 flex flex-col items-center gap-1.5 cursor-pointer transition-colors hover:bg-emerald-50" id="photo-drop" role="button" tabindex="0">
<input class="hidden" id="photo-input" type="file" accept="image/*"/>
<span class="material-symbols-outlined text-[32px] text-emerald-500">add_a_photo</span>
<p class="font-body-sm text-body-sm text-emerald-700">Add Collection Photo</p>
<p class="font-label-sm text-label-sm text-emerald-600/80">PNG, JPG (max 10MB)</p>
</div>
<div id="evidence-preview" class="flex flex-col gap-2"></div>
</div>

<!-- Save bar -->
<div class="flex gap-3">
<a id="waste-cancel-btn" class="flex-1 inline-flex items-center justify-center py-3.5 rounded-xl border-2 border-border-subtle text-on-surface font-label-md text-label-md hover:bg-surface-container-low transition-colors" href="#" data-view="records">Cancel</a>
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
  var editingId = state.editingRecordId || null;
  var current = null;
  var editing = null;
  var activeRequests = [];
  var selectedFile = null;

  var STATUS_CHIP = {
    Scheduled: ["bg-amber-100 text-amber-800", "Pending"],
    "In Transit": ["bg-blue-100 text-blue-800", "In Progress"],
    Completed: ["bg-emerald-100 text-emerald-800", "Completed"]
  };

  function setStatusChip(status) {
    var chip = STATUS_CHIP[status] || ["bg-surface-container-high text-on-surface-variant", status];
    var chipEl = document.getElementById("waste-status-chip");
    chipEl.className = "inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold " + chip[0];
    chipEl.textContent = chip[1];
  }

  function renderLocked(req, fallback) {
    var wrap = document.getElementById("waste-request-locked");
    var sel = document.getElementById("waste-request-select");
    var none = document.getElementById("waste-request-none");
    var section = document.getElementById("waste-collection-section");
    if (req) {
      wrap.className = "flex items-center gap-2 px-3 py-2.5 border border-border-subtle rounded-xl bg-surface-container-low font-body-sm text-body-sm text-on-surface";
      wrap.innerHTML = '<span class="material-symbols-outlined text-[18px] text-primary">event_note</span> ' + D.esc(req.request_number);
      wrap.classList.remove("hidden");
      sel.classList.add("hidden");
      if (none) none.classList.add("hidden");
      if (section) section.classList.remove("hidden");
      return;
    }
    if (fallback) {
      wrap.className = "flex items-center gap-2 px-3 py-2.5 border border-border-subtle rounded-xl bg-surface-container-low font-body-sm text-body-sm text-on-surface";
      wrap.innerHTML = '<span class="material-symbols-outlined text-[18px] text-primary">link</span> ' + D.esc(fallback);
      wrap.classList.remove("hidden");
      sel.classList.add("hidden");
      if (none) none.classList.add("hidden");
      if (section) section.classList.remove("hidden");
      return;
    }
    wrap.classList.add("hidden");
  }

  function showEvidence(url) {
    var host = document.getElementById("evidence-preview");
    if (!host) return;
    host.innerHTML = "";
    if (!url) return;
    var html = '<div class="relative inline-block"><img src="' + D.esc(url) + '" alt="Evidence photo" class="w-24 h-24 object-cover rounded-xl border border-border-subtle"/>' +
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
    if (!/^image\//i.test(file.type)) { UI.toast.error("Please choose an image file."); return; }
    selectedFile = file;
    var reader = new FileReader();
    reader.onload = function (e) { showEvidence(e.target.result); };
    reader.readAsDataURL(file);
  }

  var drop = document.getElementById("photo-drop");
  var input = document.getElementById("photo-input");
  if (drop && input) {
    function pick() { input.click(); }
    drop.addEventListener("click", pick);
    drop.addEventListener("keydown", function (e) {
      if (e.key === "Enter" || e.key === " ") { e.preventDefault(); pick(); }
    });
    drop.addEventListener("dragover", function (e) { e.preventDefault(); drop.classList.add("bg-emerald-50"); });
    drop.addEventListener("dragleave", function () { drop.classList.remove("bg-emerald-50"); });
    drop.addEventListener("drop", function (e) {
      e.preventDefault();
      drop.classList.remove("bg-emerald-50");
      if (e.dataTransfer.files && e.dataTransfer.files.length) handleFiles(e.dataTransfer.files);
    });
    input.addEventListener("change", function () { handleFiles(input.files); });
  }

  function fillForm(r) {
    document.getElementById("waste-qty").value = r.weight_kg ? String(r.weight_kg) : "";
    var unit = r.unit || "kg";
    document.getElementById("waste-unit").value = ["kg", "tons", "bags", "items"].indexOf(unit) !== -1 ? unit : "kg";
    var qtype = (r.quantity_type === "Estimated" || r.quantity_type === "estimated") ? "Estimated" : "Actual";
    document.querySelector('input[name="quantity_type"][value="' + qtype + '"]').checked = true;
    var condMap = { normal: "Good Condition", "Good Condition": "Good Condition", mixed: "Needs Sorting", "Needs Sorting": "Needs Sorting", oversized: "Needs Sorting", hazardous: "Rejected", Contaminated: "Contaminated", other: "Good Condition", Rejected: "Rejected" };
    document.getElementById("waste-condition").value = condMap[r.condition_t] || "Good Condition";
    document.getElementById("waste-notes").value = r.notes || "";
    document.getElementById("waste-collection-status").value = r.collection_status === "Completed" ? "Completed" : "In Process";
    if (r.proof_url) showEvidence(r.proof_url);
  }

  async function loadContext() {
    var uid = D.currentUserId();
    if (editingId) {
      var erows = await D.list("recycling_records",
        "id,log_number,material_type,weight_kg,unit,quantity_type,condition_t,notes,proof_url,collection_status,request_id,collector_id,status,recorded_at",
        null, "id=eq." + editingId + "&collector_id=eq." + uid);
      if (!erows || !erows.length) {
        UI.toast.error("Record not found.");
        window.EcoWasteRouter.go("records");
        return;
      }
      editing = erows[0];
      requestId = editing.request_id;
      document.getElementById("waste-title").textContent = "Edit Record";
      var saveBtn = document.getElementById("waste-save-btn");
      saveBtn.innerHTML = '<span class="material-symbols-outlined text-[20px]">save</span> Update Record';
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
        document.getElementById("waste-request-number").textContent = current.request_number;
        document.getElementById("waste-waste-type").textContent = current.waste_type || "General";
        document.getElementById("waste-location").textContent = current.location || "";
      } else {
        document.getElementById("waste-collection-section").classList.remove("hidden");
        document.getElementById("waste-request-none").classList.remove("hidden");
      }
    }

    if (!requestId && !editingId) {
      document.getElementById("waste-collection-section").classList.remove("hidden");
      var sel = document.getElementById("waste-request-select");
      if (activeRequests.length) {
        renderLocked(null, null);
        sel.classList.remove("hidden");
        document.getElementById("waste-request-none").classList.add("hidden");
        sel.innerHTML = '<option disabled selected value="">Select a collection request...</option>';
        activeRequests.forEach(function (r) {
          var o = document.createElement("option");
          o.value = r.id;
          o.textContent = r.request_number + " - " + (r.waste_type || "General");
          sel.appendChild(o);
        });
        sel.addEventListener("change", function () {
          requestId = sel.value;
          current = activeRequests.filter(function (r) { return r.id === requestId; })[0] || null;
          document.getElementById("waste-request-number").textContent = current ? current.request_number : "—";
          document.getElementById("waste-waste-type").textContent = current ? (current.waste_type || "General") : "—";
          document.getElementById("waste-location").textContent = current ? (current.location || "") : "";
          setStatusChip(current ? current.status : "");
        });
      } else {
        sel.classList.add("hidden");
        document.getElementById("waste-request-none").classList.remove("hidden");
      }
    }

    if (editingId && editing) {
      document.getElementById("waste-request-number").textContent = editing.log_number;
      document.getElementById("waste-waste-type").textContent = editing.material_type || "—";
      document.getElementById("waste-location").textContent = editing.request_id ? "Linked to a collection request" : "—";
      setStatusChip(editing.collection_status || "");
      fillForm(editing);
    }
  }

  document.getElementById("waste-save-btn").addEventListener("click", async function () {
    var qty = parseFloat(document.getElementById("waste-qty").value);
    if ((!requestId || !current) && !editingId) {
      UI.toast.error("Select a collection request.");
      return;
    }
    if (!qty || qty <= 0) {
      UI.toast.error("Enter a quantity greater than 0.");
      return;
    }
    var unit = document.getElementById("waste-unit").value;
    var collectionStatus = document.getElementById("waste-collection-status").value;
    if (!collectionStatus) {
      UI.toast.error("Select a collection status (In Process or Completed).");
      return;
    }
    var quantityType = document.querySelector('input[name="quantity_type"]:checked');
    var condition = document.getElementById("waste-condition").value;
    var notes = document.getElementById("waste-notes").value.trim();
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
        UI.toast.success("Record updated.");
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
        UI.toast.success("Waste record saved.");
      }
      if (window.EcoWasteRouter) window.EcoWasteRouter.go("records");
    } catch (err) {
      UI.toast.error("Could not save record: " + (err.message || "unknown error"));
    } finally {
      btn.disabled = false;
      btn.classList.remove("opacity-70");
    }
  });

  var cancelBtn = document.getElementById("waste-cancel-btn");
  if (cancelBtn) cancelBtn.addEventListener("click", function (e) {
    e.preventDefault();
    if (window.EcoWasteRouter) window.EcoWasteRouter.go("records");
  });

  loadContext().catch(function (err) {
    console.error("EcoWaste waste records failed to load:", err);
  });
})();
</script>