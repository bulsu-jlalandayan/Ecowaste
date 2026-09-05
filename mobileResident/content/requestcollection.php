<!-- Mobile Request Collection view (4-step wizard) -->
<div class="p-4 flex flex-col gap-4">
<!-- Progress stepper -->
<div class="mb-1">
<div class="flex items-center justify-between relative">
<div class="absolute left-0 top-1/2 -translate-y-1/2 w-full h-1 bg-surface-variant rounded-full z-0"></div>
<div class="absolute left-0 top-1/2 -translate-y-1/2 h-1 bg-primary rounded-full z-0 transition-all duration-300" id="stepper-progress" style="width:25%"></div>
<div class="relative z-10 flex flex-col items-center gap-1.5" data-step-marker="0">
<div class="w-8 h-8 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-caps text-label-caps shadow-sm step-dot">1</div>
<span class="font-label-caps text-label-caps text-primary text-[11px]">Type</span>
</div>
<div class="relative z-10 flex flex-col items-center gap-1.5" data-step-marker="1">
<div class="w-8 h-8 rounded-full bg-surface-variant text-on-surface-variant flex items-center justify-center font-label-caps text-label-caps step-dot">2</div>
<span class="font-label-caps text-label-caps text-on-surface-variant text-[11px]">Details</span>
</div>
<div class="relative z-10 flex flex-col items-center gap-1.5" data-step-marker="2">
<div class="w-8 h-8 rounded-full bg-surface-variant text-on-surface-variant flex items-center justify-center font-label-caps text-label-caps step-dot">3</div>
<span class="font-label-caps text-label-caps text-on-surface-variant text-[11px]">Schedule</span>
</div>
<div class="relative z-10 flex flex-col items-center gap-1.5" data-step-marker="3">
<div class="w-8 h-8 rounded-full bg-surface-variant text-on-surface-variant flex items-center justify-center font-label-caps text-label-caps step-dot">4</div>
<span class="font-label-caps text-label-caps text-on-surface-variant text-[11px]">Review</span>
</div>
</div>
</div>

<!-- Step 1: Waste Type -->
<div class="step-panel" data-panel="0">
<h2 class="font-headline-md text-headline-md text-on-surface mb-1">Select Waste Type</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-3">Choose the category of waste you need collected.</p>
<div class="flex flex-col gap-3">
<label class="cursor-pointer waste-card">
<input class="sr-only waste-type" name="waste_type" type="checkbox" value="Household">
<div class="waste-card-box p-4 bg-surface-container-lowest border border-outline-variant border-l-4 border-l-gray-800 rounded-xl relative overflow-hidden transition-all">
<div class="absolute top-4 right-4 text-primary check-ic" style="visibility:hidden"><span class="material-symbols-outlined filled">check_circle</span></div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined w-11 h-11 rounded-lg bg-gray-800/10 flex items-center justify-center text-gray-800">delete</span>
<div><h3 class="font-body-md text-body-md text-on-surface font-semibold">General Household Waste</h3><p class="font-body-sm text-body-sm text-on-surface-variant">Typical kitchen and bathroom waste.</p></div>
</div>
</div>
</label>
<label class="cursor-pointer waste-card">
<input class="sr-only waste-type" name="waste_type" type="checkbox" value="Recyclable">
<div class="waste-card-box p-4 bg-surface-container-lowest border border-outline-variant border-l-4 border-l-blue-600 rounded-xl transition-all">
<div class="absolute top-4 right-4 text-primary check-ic" style="visibility:hidden"><span class="material-symbols-outlined filled">check_circle</span></div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined w-11 h-11 rounded-lg bg-blue-600/10 flex items-center justify-center text-blue-600">recycling</span>
<div><h3 class="font-body-md text-body-md text-on-surface font-semibold">Recyclables</h3><p class="font-body-sm text-body-sm text-on-surface-variant">Paper, plastic, metal, and glass.</p></div>
</div>
</div>
</label>
<label class="cursor-pointer waste-card">
<input class="sr-only waste-type" name="waste_type" type="checkbox" value="Organic">
<div class="waste-card-box p-4 bg-surface-container-lowest border border-outline-variant border-l-4 border-l-green-600 rounded-xl transition-all">
<div class="absolute top-4 right-4 text-primary check-ic" style="visibility:hidden"><span class="material-symbols-outlined filled">check_circle</span></div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined w-11 h-11 rounded-lg bg-green-600/10 flex items-center justify-center text-green-600">park</span>
<div><h3 class="font-body-md text-body-md text-on-surface font-semibold">Organic / Green Waste</h3><p class="font-body-sm text-body-sm text-on-surface-variant">Garden clippings, food scraps, yard debris.</p></div>
</div>
</div>
</label>
<label class="cursor-pointer waste-card">
<input class="sr-only waste-type" name="waste_type" type="checkbox" value="Bulky">
<div class="waste-card-box p-4 bg-surface-container-lowest border border-outline-variant border-l-4 border-l-purple-600 rounded-xl transition-all">
<div class="absolute top-4 right-4 text-primary check-ic" style="visibility:hidden"><span class="material-symbols-outlined filled">check_circle</span></div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined w-11 h-11 rounded-lg bg-purple-600/10 flex items-center justify-center text-purple-600">chair</span>
<div><h3 class="font-body-md text-body-md text-on-surface font-semibold">Bulky Items</h3><p class="font-body-sm text-body-sm text-on-surface-variant">Furniture, mattresses, large appliances.</p></div>
</div>
</div>
</label>
<label class="cursor-pointer waste-card">
<input class="sr-only waste-type" name="waste_type" type="checkbox" value="E-Waste">
<div class="waste-card-box p-4 bg-surface-container-lowest border border-outline-variant border-l-4 border-l-red-600 rounded-xl transition-all">
<div class="absolute top-4 right-4 text-primary check-ic" style="visibility:hidden"><span class="material-symbols-outlined filled">check_circle</span></div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined w-11 h-11 rounded-lg bg-red-600/10 flex items-center justify-center text-red-600">warning</span>
<div><h3 class="font-body-md text-body-md text-on-surface font-semibold">Hazardous / E-Waste</h3><p class="font-body-sm text-body-sm text-on-surface-variant">Batteries, chemicals, electronics.</p></div>
</div>
</div>
</label>
</div>
</div>

<!-- Step 2: Details -->
<div class="step-panel hidden" data-panel="1">
<h2 class="font-headline-md text-headline-md text-on-surface mb-1">Collection Details</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-3">Add details about what you need collected.</p>
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 flex flex-col gap-4">
<div class="flex flex-col gap-1.5">
<label class="font-label-caps text-label-caps text-on-surface" for="req-desc">Description / Notes</label>
<textarea class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-3 py-2.5 font-body-md text-body-md text-on-surface focus:border-primary focus:ring-2 focus:ring-primary/10 resize-y" id="req-desc" rows="3" placeholder="e.g., 3 bags of plastic bottles and cardboard boxes"></textarea>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-caps text-label-caps text-on-surface" for="req-address">Collection Address *</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-3 py-2.5 font-body-md text-body-md text-on-surface focus:border-primary focus:ring-2 focus:ring-primary/10" id="req-address" value="123 Green St, Barangay San Isidro, Manila" type="text">
</div>
</div>
</div>

<!-- Step 3: Schedule -->
<div class="step-panel hidden" data-panel="2">
<h2 class="font-headline-md text-headline-md text-on-surface mb-1">Preferred Schedule</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-3">Pick a preferred date and time window.</p>
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 flex flex-col gap-4">
<div class="flex flex-col gap-1.5">
<label class="font-label-caps text-label-caps text-on-surface" for="req-date">Preferred Date *</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-3 py-2.5 font-body-md text-body-md text-on-surface focus:border-primary focus:ring-2 focus:ring-primary/10" id="req-date" type="date" min="">
</div>
<div class="grid grid-cols-2 gap-3">
<div class="flex flex-col gap-1.5">
<label class="font-label-caps text-label-caps text-on-surface" for="req-start">Time From *</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-3 py-2.5 font-body-md text-body-md text-on-surface focus:border-primary focus:ring-2 focus:ring-primary/10" id="req-start" type="time" value="08:00">
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-caps text-label-caps text-on-surface" for="req-end">Time To *</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-3 py-2.5 font-body-md text-body-md text-on-surface focus:border-primary focus:ring-2 focus:ring-primary/10" id="req-end" type="time" value="17:00">
</div>
</div>
</div>
</div>

<!-- Step 4: Review -->
<div class="step-panel hidden" data-panel="3">
<h2 class="font-headline-md text-headline-md text-on-surface mb-1">Review &amp; Submit</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-3">Confirm the details of your request.</p>
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 flex flex-col gap-3">
<div class="flex justify-between gap-2"><span class="font-label-caps text-label-caps text-on-surface-variant">Waste Type</span><span class="font-body-md text-body-md text-on-surface font-medium text-right" id="review-type">—</span></div>
<div class="flex justify-between gap-2"><span class="font-label-caps text-label-caps text-on-surface-variant">Date</span><span class="font-body-md text-body-md text-on-surface font-medium" id="review-date">—</span></div>
<div class="flex justify-between gap-2"><span class="font-label-caps text-label-caps text-on-surface-variant">Time</span><span class="font-body-md text-body-md text-on-surface font-medium" id="review-time">—</span></div>
<div class="flex justify-between gap-2"><span class="font-label-caps text-label-caps text-on-surface-variant">Address</span><span class="font-body-md text-body-md text-on-surface font-medium text-right" id="review-address">—</span></div>
<div class="flex justify-between gap-2"><span class="font-label-caps text-label-caps text-on-surface-variant">Notes</span><span class="font-body-md text-body-md text-on-surface text-right" id="review-notes">—</span></div>
</div>
</div>

<!-- Footer Actions -->
<div class="flex gap-3 pt-4 border-t border-border-subtle mt-2 pb-2">
<button class="px-5 py-3 border border-secondary text-secondary font-label-caps text-label-caps rounded-xl hover:bg-surface-variant transition-colors" id="wizard-cancel" type="button">Cancel</button>
<button class="px-5 py-3 border border-secondary text-secondary font-label-caps text-label-caps rounded-xl hover:bg-surface-variant transition-colors" id="wizard-back" type="button" style="display:none">Back</button>
<button class="flex-1 px-5 py-3 bg-primary text-on-primary font-label-caps text-label-caps rounded-xl hover:bg-primary-container transition-colors shadow-sm" id="wizard-next" type="button">Continue</button>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  var UI = window.EcoWasteUI;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var step = 0;
  var maxStep = 4;
  var state = { waste_type: [], description: "", address: "", scheduled_date: null, time_start: null, time_end: null };

  var TYPE_LABELS = {
    Household: "General Household Waste",
    Recyclable: "Recyclables",
    Organic: "Organic/Green Waste",
    Bulky: "Bulky Items",
    "E-Waste": "Hazardous / E-Waste"
  };

  // Block past dates and dates too far in advance (max 7 days).
  function localDateStr(d) {
    var mm = String(d.getMonth() + 1).padStart(2, "0");
    var dd = String(d.getDate()).padStart(2, "0");
    return d.getFullYear() + "-" + mm + "-" + dd;
  }
  var today = localDateStr(new Date());
  var maxDate = new Date();
  maxDate.setDate(maxDate.getDate() + 7);
  var maxDateStr = localDateStr(maxDate);
  var dateInput = document.getElementById("req-date");
  if (dateInput) {
    dateInput.min = today;
    dateInput.max = maxDateStr;
  }

  function localNowTime() {
    var d = new Date();
    return String(d.getHours()).padStart(2, "0") + ":" + String(d.getMinutes()).padStart(2, "0");
  }

  function updateStep() {
    document.querySelectorAll(".step-panel").forEach(function (panel) {
      panel.classList.toggle("hidden", parseInt(panel.getAttribute("data-panel"), 10) !== step);
    });
    var progress = document.getElementById("stepper-progress");
    if (progress) progress.style.width = ((step + 1) / maxStep) * 100 + "%";
    document.querySelectorAll("[data-step-marker]").forEach(function (m) {
      var idx = parseInt(m.getAttribute("data-step-marker"), 10);
      var dot = m.querySelector(".step-dot");
      var label = m.querySelector("span:last-child");
      var active = idx === step;
      var done = idx < step;
      if (dot) {
        dot.className = "w-8 h-8 rounded-full flex items-center justify-center font-label-caps text-label-caps step-dot " +
          (done || active ? "bg-primary text-on-primary shadow-sm" : "bg-surface-variant text-on-surface-variant");
        dot.textContent = done ? "✓" : (idx + 1);
      }
      if (label) {
        label.className = "font-label-caps text-label-caps text-[11px] " + (active || done ? "text-primary" : "text-on-surface-variant");
      }
    });
    var next = document.getElementById("wizard-next");
    var back = document.getElementById("wizard-back");
    var cancel = document.getElementById("wizard-cancel");
    if (next) next.textContent = step === maxStep - 1 ? "Submit Request" : "Continue";
    if (back) back.style.display = step === 0 ? "none" : "";
    if (cancel) cancel.style.display = step === 0 ? "" : "none";
    if (step === maxStep - 1) updateReview();
  }

  function updateReview() {
    var labels = state.waste_type.map(function (t) { return TYPE_LABELS[t] || t; });
    setTxt("review-type", labels.length ? labels.join(", ") : "—");
    setTxt("review-date", state.scheduled_date ? D.fmtDay(state.scheduled_date) : "Not set");
    setTxt("review-time", (state.time_start || "--") + " - " + (state.time_end || "--"));
    setTxt("review-address", state.address || "—");
    setTxt("review-notes", state.description || "—");
  }

  function setTxt(id, v) {
    var el = document.getElementById(id);
    if (el) el.textContent = v;
  }

  function next() {
    if (step === 0) {
      state.waste_type = [];
      document.querySelectorAll("input.waste-type:checked").forEach(function (cb) {
        state.waste_type.push(cb.value);
      });
      if (!state.waste_type.length) {
        UI.toast("Please select at least one waste type.", "error");
        return;
      }
    } else if (step === 1) {
      state.description = document.getElementById("req-desc").value.trim();
      state.address = document.getElementById("req-address").value.trim();
      if (!state.address) { UI.toast("Please provide a collection address.", "error"); return; }
    } else if (step === 2) {
      state.scheduled_date = document.getElementById("req-date").value;
      state.time_start = document.getElementById("req-start").value;
      state.time_end = document.getElementById("req-end").value;
      if (!state.scheduled_date) { UI.toast("Please pick a preferred date.", "error"); return; }
      if (state.scheduled_date < today) { UI.toast("Please select today or a future date.", "error"); return; }
      if (state.scheduled_date > maxDateStr) { UI.toast("Requests can only be scheduled up to 7 days in advance.", "error"); return; }
      if (!state.time_start || !state.time_end) { UI.toast("Please pick a time window.", "error"); return; }
      if (state.time_end <= state.time_start) { UI.toast("The end time must be later than the start time.", "error"); return; }
      if (state.scheduled_date === today && state.time_start < localNowTime()) { UI.toast("The start time must be in the future for today.", "error"); return; }
    } else if (step === 3) {
      submit();
      return;
    }
    step++;
    updateStep();
  }

  function back() {
    if (step === 0) return;
    step--;
    updateStep();
  }

  async function submit() {
    var btn = document.getElementById("wizard-next");
    var orig = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = '<span class="material-symbols-outlined animate-spin text-[16px]">progress_activity</span> Submitting...';
    try {
      var primaryType = state.waste_type[0] || "Household";
      var prefix = state.waste_type.indexOf("E-Waste") !== -1 ? "REQ-HZ" : "REQ";
      var request_number = prefix + "-" + Math.floor(1000 + Math.random() * 9000);
      var body = {
        request_number: request_number,
        user_id: D.currentUserId(),
        location: state.address || "Pending address",
        zone: "Zone A - Residential",
        waste_type: primaryType,
        status: "Unassigned",
        description: state.description,
        scheduled_date: state.scheduled_date,
        time_start: state.time_start,
        time_end: state.time_end
      };
      var inserted = await D.add("collection_requests", body);
      var requestId = inserted && inserted[0] ? inserted[0].id : null;
      if (requestId) {
        var items = state.waste_type.map(function (t) {
          return { request_id: requestId, waste_type: t };
        });
        await fetch(SUPABASE_URL + "/rest/v1/collection_request_items", {
          method: "POST",
          headers: Object.assign({}, D.headers(), { "Prefer": "return=minimal" }),
          body: JSON.stringify(items)
        });
      }
      UI.toast("Collection request submitted successfully.");
      if (window.EcoWasteRouter) window.EcoWasteRouter.go("requestlist");
    } catch (err) {
      UI.toast(err.message || "Failed to submit request.", "error");
      btn.disabled = false;
      btn.innerHTML = orig;
    }
  }

  // checkbox card selection styling
  function styleCard(cb) {
    var label = cb.closest(".waste-card");
    if (!label) return;
    var box = label.querySelector("div.waste-card-box");
    if (!box) box = label.querySelector("div");
    var checked = cb.checked;
    box.classList.toggle("ring-2", checked);
    box.classList.toggle("ring-primary/40", checked);
    box.classList.toggle("bg-primary/5", checked);
    var ic = box.querySelector(".check-ic");
    if (ic) ic.style.visibility = checked ? "visible" : "hidden";
  }
  function syncCardFromInput(cb) { styleCard(cb); }
  document.querySelectorAll("input.waste-type").forEach(function (cb) {
    cb.addEventListener("change", function () { syncCardFromInput(cb); });
  });
  document.querySelectorAll("label.waste-card").forEach(function (lbl) {
    var cb = lbl.querySelector("input.waste-type");
    if (cb) {
      lbl.addEventListener("click", function () {
        requestAnimationFrame(function () { styleCard(cb); });
      });
    }
  });

  document.getElementById("wizard-next").addEventListener("click", next);
  document.getElementById("wizard-back").addEventListener("click", back);
  document.getElementById("wizard-cancel").addEventListener("click", function () {
    if (window.EcoWasteRouter) window.EcoWasteRouter.go("dashboard");
  });

  updateStep();
})();
</script>
