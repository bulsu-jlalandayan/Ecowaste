<!-- Mobile Report Waste view -->
<div class="p-4 flex flex-col gap-4">
<div>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface">Report a Waste Issue</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Report illegal dumping, missed collections, or damaged bins.</p>
</div>

<form action="#" method="POST" id="report-waste-form" enctype="multipart/form-data" class="flex flex-col gap-4">
<!-- Issue Details -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 flex flex-col gap-4">
<h3 class="font-headline-sm text-headline-sm text-on-surface border-b border-border-subtle pb-2">Issue Details</h3>
<div class="flex flex-col gap-3">
<div class="flex flex-col gap-1.5">
<label class="font-label-caps text-label-caps text-on-surface" for="wasteCategory">Waste Category *</label>
<select class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-3 py-2.5 font-body-md text-body-md text-on-surface focus:border-primary focus:ring-2 focus:ring-primary/10" id="wasteCategory" name="wasteCategory">
<option disabled selected value="">Select category...</option>
<option value="general">General Waste (Black Bin)</option>
<option value="recycling">Recycling (Blue Bin)</option>
<option value="organic">Organic/Compost (Green Bin)</option>
<option value="hazardous">Hazardous Materials</option>
<option value="bulky">Bulky Items (Furniture/Appliances)</option>
</select>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-caps text-label-caps text-on-surface" for="reportType">Report Type *</label>
<select class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-3 py-2.5 font-body-md text-body-md text-on-surface focus:border-primary focus:ring-2 focus:ring-primary/10" id="reportType" name="reportType">
<option disabled selected value="">Select issue type...</option>
<option value="illegal_dumping">Illegal Dumping</option>
<option value="missed_collection">Missed Collection</option>
<option value="damaged_bin">Damaged Bin</option>
<option value="overflowing">Overflowing Public Bin</option>
<option value="other">Other</option>
</select>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-caps text-label-caps text-on-surface" for="description">Description *</label>
<textarea class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-3 py-2.5 font-body-md text-body-md text-on-surface focus:border-primary focus:ring-2 focus:ring-primary/10 resize-y" id="description" name="description" placeholder="Please provide specific details about the issue..." rows="4"></textarea>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-caps text-label-caps text-on-surface" for="dateTime">Date &amp; Time of Observation *</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-3 py-2.5 font-body-md text-body-md text-on-surface focus:border-primary focus:ring-2 focus:ring-primary/10" id="dateTime" name="dateTime" type="datetime-local" max="" required>
</div>
</div>
</div>

<!-- Location -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 flex flex-col gap-3">
<h3 class="font-headline-sm text-headline-sm text-on-surface border-b border-border-subtle pb-2">Location</h3>
<div class="flex flex-col gap-1.5">
<label class="font-label-caps text-label-caps text-on-surface" for="address">Street Address or Landmark *</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-3 py-2.5 font-body-md text-body-md text-on-surface focus:border-primary focus:ring-2 focus:ring-primary/10" id="address" name="address" placeholder="e.g., 123 Main St, near the park entrance" type="text">
</div>
</div>

<!-- Evidence -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4 flex flex-col gap-3">
<h3 class="font-headline-sm text-headline-sm text-on-surface">Evidence</h3>
<div class="border-2 border-dashed border-outline-variant rounded-xl p-4 text-center bg-surface hover:bg-surface-container-low transition-colors cursor-pointer" id="photo-drop" role="button" tabindex="0">
<input class="hidden" id="photo-input" name="photo" type="file" accept="image/*">
<div class="flex flex-col items-center justify-center gap-2">
<span class="material-symbols-outlined w-12 h-12 rounded-full bg-primary-container/10 flex items-center justify-center text-primary">add_a_photo</span>
<p class="font-body-md text-body-md text-on-surface">Tap to upload a photo</p>
<p class="font-label-caps text-label-caps text-on-surface-variant text-[11px]">PNG, JPG (max. 10MB)</p>
</div>
</div>
<div id="upload-list" class="flex flex-col gap-2"></div>
</div>

<!-- Reporting tips -->
<div class="bg-secondary-fixed/30 border border-secondary-fixed rounded-xl p-4">
<div class="flex items-center gap-2 mb-2 text-secondary">
<span class="material-symbols-outlined">info</span>
<h4 class="font-headline-sm text-headline-sm text-on-secondary-fixed">Reporting Tips</h4>
</div>
<ul class="font-body-sm text-body-sm text-on-secondary-fixed-variant space-y-2 list-disc pl-4">
<li>Ensure photos clearly show the surrounding area for context.</li>
<li>For hazardous waste, do not approach or attempt to clean it yourself.</li>
<li>Accurate locations help our field teams respond up to 40% faster.</li>
</ul>
</div>

<!-- Actions -->
<div class="flex gap-3">
<button class="px-5 py-3 border border-outline-variant text-on-surface-variant font-label-caps text-label-caps rounded-xl hover:bg-surface-container-low transition-colors" type="button" id="report-cancel-btn">Cancel</button>
<button class="flex-1 px-5 py-3 bg-primary text-on-primary font-label-caps text-label-caps rounded-xl hover:bg-primary-container transition-colors shadow-sm flex items-center justify-center gap-2" type="submit" id="report-submit-btn">
<span class="material-symbols-outlined">send</span> Submit Report
</button>
</div>
</form>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  var UI = window.EcoWasteUI;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var uploads = [];
  var uploadedUrl = null;

  function localNowMax() {
    var d = new Date();
    var yyyy = d.getFullYear();
    var mm = String(d.getMonth() + 1).padStart(2, "0");
    var dd = String(d.getDate()).padStart(2, "0");
    var hh = String(d.getHours()).padStart(2, "0");
    var mi = String(d.getMinutes()).padStart(2, "0");
    return yyyy + "-" + mm + "-" + dd + "T" + hh + ":" + mi;
  }
  var dtInput = document.getElementById("dateTime");
  if (dtInput) dtInput.max = localNowMax();

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
      if (e.dataTransfer.files && e.dataTransfer.files.length) {
        input.files = e.dataTransfer.files;
        handleFiles(input.files);
      }
    });
    input.addEventListener("change", function () { handleFiles(input.files); });
  }

  function handleFiles(files) {
    var list = document.getElementById("upload-list");
    if (!list) return;
    list.innerHTML = "";
    uploads = [];
    Array.prototype.forEach.call(files, function (file) {
      uploads.push(file);
      var row = document.createElement("div");
      row.className = "flex items-center justify-between p-2.5 border border-border-subtle rounded-lg bg-surface-container-low";
      row.innerHTML =
        '<div class="flex items-center gap-2">' +
        '<div class="w-10 h-10 rounded bg-surface-dim bg-cover bg-center shrink-0"></div>' +
        '<div class="flex flex-col min-w-0"><span class="font-body-sm text-body-sm text-on-surface truncate w-40">' + D.esc(file.name) + "</span>" +
        '<span class="font-label-caps text-label-caps text-on-surface-variant text-[10px]">' + D.esc((file.size / 1048576).toFixed(1)) + " MB</span></div></div>" +
        '<button type="button" class="text-on-surface-variant hover:text-error transition-colors"><span class="material-symbols-outlined">delete</span></button>';
      row.querySelector("button").addEventListener("click", function () {
        row.remove();
        uploads = uploads.filter(function (f) { return f !== file; });
      });
      var thumb = row.querySelector(".bg-cover");
      var reader = new FileReader();
      reader.onload = function (e) { thumb.style.backgroundImage = "url('" + e.target.result + "')"; };
      reader.readAsDataURL(file);
      list.appendChild(row);
    });
  }

  var form = document.getElementById("report-waste-form");
  if (form) {
    var cancelBtn = document.getElementById("report-cancel-btn");
    if (cancelBtn) cancelBtn.addEventListener("click", function () {
      if (window.EcoWasteRouter) window.EcoWasteRouter.go("requestlist");
    });

    form.addEventListener("submit", async function (e) {
      e.preventDefault();
      var cat = document.getElementById("wasteCategory");
      var type = document.getElementById("reportType");
      var desc = document.getElementById("description");
      var addr = document.getElementById("address");
      var dt = document.getElementById("dateTime");

      if (!cat || !cat.value) { UI.toast("Please select a waste category.", "error"); return; }
      if (!type || !type.value) { UI.toast("Please select a report type.", "error"); return; }
      if (!desc || !desc.value.trim()) { UI.toast("Please provide a description.", "error"); return; }
      if (!addr || !addr.value.trim()) { UI.toast("Please provide a street address or landmark.", "error"); return; }
      if (!dt || !dt.value) { UI.toast("Please select the date and time of observation.", "error"); return; }
      if (dt.value > localNowMax()) { UI.toast("Observation date cannot be in the future.", "error"); return; }

      var btn = document.getElementById("report-submit-btn");
      if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<span class="material-symbols-outlined animate-spin text-[16px]">progress_activity</span> Submitting...';
      }
      try {
        if (uploads.length) {
          uploadedUrl = await D.upload(uploads[0], "waste-reports");
        }
        var body = {
          user_id: D.currentUserId(),
          waste_category: cat.value,
          report_type: type.value,
          description: desc.value.trim(),
          address: addr.value.trim(),
          photo_url: uploadedUrl,
          observed_at: dt && dt.value ? new Date(dt.value).toISOString() : new Date().toISOString(),
          status: "Submitted"
        };
        await D.add("waste_reports", body);
        UI.toast("Report submitted successfully.");
        if (window.EcoWasteRouter) window.EcoWasteRouter.go("activityhistory");
      } catch (err) {
        UI.toast(err.message || "Failed to submit report.", "error");
        if (btn) {
          btn.disabled = false;
          btn.innerHTML = '<span class="material-symbols-outlined">send</span> Submit Report';
        }
      }
    });
  }
})();
</script>
