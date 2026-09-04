<!-- Report Waste content fragment (loaded by resident.html via content.php) -->
<div class="px-margin py-margin pt-[80px] lg:pt-margin max-w-[1200px] mx-auto">
<div class="mb-lg">
<h2 class="font-headline-lg text-headline-lg text-on-surface">Report a Waste Issue</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant mt-xs">Help keep our community clean by reporting illegal dumping, missed collections, or damaged bins.</p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Form Section (Left Column) -->
<div class="lg:col-span-8">
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md shadow-sm">
<form action="#" class="space-y-lg" method="POST" id="report-waste-form" enctype="multipart/form-data">
<!-- Issue Details -->
<div>
<h3 class="font-headline-md text-headline-md text-on-surface mb-md pb-xs border-b border-outline-variant">Issue Details</h3>
<div class="grid grid-cols-1 md:grid-cols-2 gap-md">
<div class="flex flex-col gap-xs">
<label class="font-label-caps text-label-caps text-on-surface" for="wasteCategory">Waste Category *</label>
<div class="relative">
<select class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-sm py-sm font-body-md text-body-md text-on-surface focus:border-primary focus:ring-2 focus:ring-primary/10 appearance-none" id="wasteCategory" name="wasteCategory">
<option disabled="" selected="" value="">Select category...</option>
<option value="general">General Waste (Black Bin)</option>
<option value="recycling">Recycling (Blue Bin)</option>
<option value="organic">Organic/Compost (Green Bin)</option>
<option value="hazardous">Hazardous Materials</option>
<option value="bulky">Bulky Items (Furniture/Appliances)</option>
</select>
<span class="material-symbols-outlined absolute right-sm top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none" data-icon="expand_more">expand_more</span>
</div>
</div>
<div class="flex flex-col gap-xs">
<label class="font-label-caps text-label-caps text-on-surface" for="reportType">Report Type *</label>
<div class="relative">
<select class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-sm py-sm font-body-md text-body-md text-on-surface focus:border-primary focus:ring-2 focus:ring-primary/10 appearance-none" id="reportType" name="reportType">
<option disabled="" selected="" value="">Select issue type...</option>
<option value="illegal_dumping">Illegal Dumping</option>
<option value="missed_collection">Missed Collection</option>
<option value="damaged_bin">Damaged Bin</option>
<option value="overflowing">Overflowing Public Bin</option>
<option value="other">Other</option>
</select>
<span class="material-symbols-outlined absolute right-sm top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none" data-icon="expand_more">expand_more</span>
</div>
</div>
<div class="flex flex-col gap-xs md:col-span-2">
<label class="font-label-caps text-label-caps text-on-surface" for="description">Description *</label>
<textarea class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-sm py-sm font-body-md text-body-md text-on-surface focus:border-primary focus:ring-2 focus:ring-primary/10 resize-y" id="description" name="description" placeholder="Please provide specific details about the issue..." rows="4"></textarea>
</div>
<div class="flex flex-col gap-xs md:col-span-2">
<label class="font-label-caps text-label-caps text-on-surface" for="dateTime">Date &amp; Time of Observation</label>
<input class="w-full md:w-1/2 bg-surface-container-lowest border border-outline-variant rounded-lg px-sm py-sm font-body-md text-body-md text-on-surface focus:border-primary focus:ring-2 focus:ring-primary/10" id="dateTime" name="dateTime" type="datetime-local" max="">
</div>
</div>
</div>
<!-- Location Section -->
<div>
<h3 class="font-headline-md text-headline-md text-on-surface mb-md pb-xs border-b border-outline-variant">Location</h3>
<div class="flex flex-col gap-md">
<div class="flex flex-col gap-xs">
<label class="font-label-caps text-label-caps text-on-surface" for="address">Street Address or Landmark *</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-on-surface-variant" data-icon="location_on">location_on</span>
<input class="w-full pl-[40px] pr-sm py-sm bg-surface-container-lowest border border-outline-variant rounded-lg font-body-md text-body-md text-on-surface focus:border-primary focus:ring-2 focus:ring-primary/10" id="address" name="address" placeholder="e.g., 123 Main St, near the park entrance" type="text">
</div>
</div>
</div>
</div>
<!-- Submit Actions -->
<div class="flex justify-end gap-sm pt-md">
<button class="px-md py-sm rounded-lg border border-outline-variant text-on-surface-variant font-label-caps text-label-caps hover:bg-surface-container-low transition-colors" type="button" id="report-cancel-btn">
                                    Cancel
                                </button>
<button class="px-md py-sm rounded-lg bg-primary text-on-primary font-label-caps text-label-caps hover:bg-tertiary-container transition-colors shadow-sm flex items-center gap-xs" type="submit" id="report-submit-btn">
<span class="material-symbols-outlined" data-icon="send">send</span>
                                    Submit Report
                                </button>
</div>
</form>
</div>
</div>
<!-- Right Column (Photo Upload & Tips) -->
<div class="lg:col-span-4 flex flex-col gap-gutter">
<!-- Photo Upload Card -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md shadow-sm">
<h3 class="font-headline-md text-headline-md text-on-surface mb-md">Evidence</h3>
<div class="border-2 border-dashed border-outline-variant rounded-lg p-lg text-center bg-surface hover:bg-surface-container-low transition-colors cursor-pointer group" id="photo-drop" role="button" tabindex="0">
<input class="hidden" id="photo-input" name="photo" type="file" accept="image/*">
<div class="flex flex-col items-center justify-center gap-sm">
<div class="w-12 h-12 rounded-full bg-primary-container/10 flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-[24px]" data-icon="add_a_photo">add_a_photo</span>
</div>
<div>
<p class="font-body-md text-body-md text-on-surface">Click to upload or drag and drop</p>
<p class="font-label-caps text-label-caps text-on-surface-variant mt-xs">SVG, PNG, JPG (max. 10MB)</p>
</div>
</div>
</div>
<!-- Uploaded files list -->
<div class="mt-md">
<p class="font-label-caps text-label-caps text-on-surface mb-sm">Uploaded Files</p>
<div class="flex flex-col gap-sm" id="upload-list"></div>
</div>
</div>
<!-- Helpful Tips Info Card -->
<div class="bg-secondary-fixed/30 border border-secondary-fixed rounded-xl p-md">
<div class="flex items-center gap-sm mb-sm text-secondary">
<span class="material-symbols-outlined" data-icon="info">info</span>
<h4 class="font-headline-md text-headline-md text-on-secondary-fixed">Reporting Tips</h4>
</div>
<ul class="font-body-sm text-body-sm text-on-secondary-fixed-variant space-y-sm list-disc pl-md">
<li class="">Ensure photos clearly show the surrounding area for context.</li>
<li class="">For hazardous waste, do not approach or attempt to clean it yourself.</li>
 <li class="">Accurate locations help our field teams respond up to 40% faster.</li>
</ul>
</div>
</div>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  var UI = window.EcoWasteUI;
  if (!D || UI && !localStorage.getItem("sb-access-token")) return;

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
    drop.addEventListener("dragover", function (e) {
      e.preventDefault();
      drop.classList.add("bg-surface-container-low");
    });
    drop.addEventListener("dragleave", function () {
      drop.classList.remove("bg-surface-container-low");
    });
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
      row.className = "flex items-center justify-between p-sm border border-outline-variant rounded-lg bg-surface-container-low";
      row.innerHTML =
        '<div class="flex items-center gap-sm">' +
        '<div class="w-10 h-10 rounded bg-surface-dim bg-cover bg-center"></div>' +
        '<div class="flex flex-col"><span class="font-body-sm text-body-sm text-on-surface truncate w-40">' + D.esc(file.name) + "</span>" +
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
      if (dt && dt.value && dt.value > localNowMax()) { UI.toast("Observation date cannot be in the future.", "error"); return; }

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
