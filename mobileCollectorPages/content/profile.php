<!-- Mobile Profile view -->
<div class="p-4 flex flex-col gap-4">
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface">My Profile</h2>

<!-- Identity card -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-5 flex flex-col items-center text-center gap-3">
<div id="prof-avatar" class="w-16 h-16 rounded-full bg-gradient-to-br from-primary to-emerald-600 text-white flex items-center justify-center font-headline-md text-headline-md shadow-lg shadow-primary/25">—</div>
<div>
<p id="prof-name" class="font-headline-sm text-headline-sm text-on-surface">—</p>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-1">Collector</p>
</div>
<p id="prof-number" class="font-label-md text-label-md text-primary">—</p>
<span id="prof-status-chip" class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-semibold bg-surface-container-high text-on-surface-variant">—</span>
</div>

<!-- Account -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
<h3 class="px-4 pt-4 font-label-md text-label-md text-primary uppercase tracking-wider flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px]">person</span> Account
</h3>
<div class="p-4 flex flex-col">
<div class="flex items-center justify-between py-2.5 border-b border-border-subtle">
<span class="font-body-md text-body-md text-on-surface-variant">Email</span>
<span id="prof-email" class="font-body-md text-body-md text-on-surface">—</span>
</div>
<div class="flex items-center justify-between py-2.5">
<span class="font-body-md text-body-md text-on-surface-variant">Role</span>
<span class="font-body-md text-body-md text-on-surface">Collector</span>
</div>
</div>
</div>

<!-- Collector details -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
<h3 class="px-4 pt-4 font-label-md text-label-md text-emerald-700 uppercase tracking-wider flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px]">local_shipping</span> Collector Details
</h3>
<div class="p-4 flex flex-col">
<div class="flex items-center justify-between py-2.5 border-b border-border-subtle">
<span class="font-body-md text-body-md text-on-surface-variant">District</span>
<span id="prof-district" class="font-body-md text-body-md text-on-surface">—</span>
</div>
<div class="flex items-center justify-between py-2.5 border-b border-border-subtle">
<span class="font-body-md text-body-md text-on-surface-variant">Vehicle</span>
<span id="prof-vehicle" class="font-body-md text-body-md text-on-surface">—</span>
</div>
<div class="flex items-center justify-between py-2.5 border-b border-border-subtle">
<span class="font-body-md text-body-md text-on-surface-variant">Vehicle Type</span>
<span id="prof-vehicle-type" class="font-body-md text-body-md text-on-surface">—</span>
</div>
<div class="flex items-center justify-between py-2.5">
<span class="font-body-md text-body-md text-on-surface-variant">Rating</span>
<span class="flex items-center gap-1 font-body-md text-body-md text-on-surface font-semibold">
<span class="material-symbols-outlined text-amber-500 text-[18px]">star</span>
<span id="prof-rating">—</span>
</span>
</div>
</div>
</div>

<!-- Duty status -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4">
<h3 class="font-label-md text-label-md text-primary uppercase tracking-wider flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px]">work</span> Duty Status
</h3>
<div class="mt-3 flex items-center justify-between gap-3">
<div class="flex items-center gap-2 flex-1 min-w-0">
<div class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center shrink-0">
<span id="duty-icon" class="material-symbols-outlined text-emerald-600 text-[20px]">power_settings_new</span>
</div>
<div class="min-w-0">
<p id="prof-duty-label" class="font-label-md text-label-md text-on-surface">Loading...</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">Are you available to take collections?</p>
</div>
</div>
<button id="duty-toggle-btn" class="shrink-0 flex items-center gap-1.5 px-3.5 py-2.5 rounded-xl font-label-md text-label-md text-on-primary transition-colors" type="button">
<span id="duty-toggle-text">—</span>
</button>
</div>
</div>

<!-- Actions -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-2 flex flex-col">
<button id="edit-name-btn" class="w-full flex items-center gap-3 px-3 py-3.5 rounded-lg text-on-surface hover:bg-surface-container-low transition-colors font-body-md text-body-md" type="button">
<span class="material-symbols-outlined text-amber-600">badge</span> Edit Name
</button>
<button id="change-pass-btn" class="w-full flex items-center gap-3 px-3 py-3.5 rounded-lg text-on-surface hover:bg-surface-container-low transition-colors font-body-md text-body-md" type="button">
<span class="material-symbols-outlined text-primary">password</span> Change Password
</button>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  var UI = window.EcoWasteUI;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var uid = D.currentUserId();
  var profile = null;
  var collector = null;

  function setText(id, v) {
    var el = document.getElementById(id);
    if (el) el.textContent = v === null || v === undefined || v === "" ? "—" : v;
  }

  function applyData() {
    var name = profile && profile.full_name ? profile.full_name : "Collector";
    setText("prof-name", name);
    setText("prof-email", profile ? profile.email : "");
    var number = collector ? collector.collector_number : "";
    setText("prof-number", number);
    setText("prof-district", collector ? collector.district : "");
    setText("prof-vehicle", collector ? collector.vehicle_name : "");
    setText("prof-vehicle-type", collector ? collector.vehicle_type : "");
    setText("prof-rating", collector && collector.rating != null ? (Number(collector.rating) || 0).toFixed(1) : "—");
    var avatar = document.getElementById("prof-avatar");
    if (avatar) avatar.textContent = D.initials(name);
    var chip = document.getElementById("prof-status-chip");
    var status = collector && collector.status ? collector.status : "Active";
    var cls = status === "Active"
      ? "bg-emerald-100 text-emerald-800"
      : status === "Inactive"
        ? "bg-surface-container-high text-on-surface-variant"
        : "bg-amber-100 text-amber-800";
    chip.className = "inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-semibold " + cls;
    chip.textContent = status;

    var onDuty = (collector && collector.status === "On Route") || (status === "Active");
    var dutyBtn = document.getElementById("duty-toggle-btn");
    var dutyText = document.getElementById("duty-toggle-text");
    var dutyLabel = document.getElementById("prof-duty-label");
    var dutyIcon = document.getElementById("duty-icon");
    if (dutyText) dutyText.textContent = onDuty ? "Off Duty" : "On Duty";
    if (dutyLabel) dutyLabel.textContent = onDuty ? "On Duty" : "Off Duty";
    if (dutyBtn) {
      dutyBtn.className = "shrink-0 flex items-center gap-1.5 px-3.5 py-2.5 rounded-xl font-label-md text-label-md text-on-primary transition-colors " +
        (onDuty ? "bg-status-completed" : "bg-primary");
    }
    if (dutyIcon) {
      dutyIcon.className = "material-symbols-outlined text-[20px] " + (onDuty ? "text-emerald-600" : "text-on-surface-variant");
      dutyIcon.textContent = onDuty ? "power_settings_new" : "power_off";
    }
  }

  async function load() {
    var results = await Promise.all([
      D.list("profiles", "id,email,full_name", null, "id=eq." + uid),
      D.list("collectors", "*", null, "user_id=eq." + uid)
    ]);
    profile = results[0] && results[0].length ? results[0][0] : null;
    collector = results[1] && results[1].length ? results[1][0] : null;
    applyData();
  }

  document.getElementById("edit-name-btn").addEventListener("click", function () {
    UI.openModal({
      title: "Edit Name",
      submitLabel: "Save",
      fields: [
        { name: "full_name", label: "Full name", type: "text", required: true, value: profile ? profile.full_name : "" }
      ],
      onSubmit: function (values) {
        return D.updateAccount({ data: { full_name: values.full_name } });
      }
    }).then(function () {
      UI.toast.success("Name updated.");
      load();
    });
  });

  document.getElementById("change-pass-btn").addEventListener("click", function () {
    UI.openModal({
      title: "Change Password",
      submitLabel: "Update password",
      fields: [
        { name: "new_password", label: "New password", type: "password", required: true },
        { name: "confirm_password", label: "Confirm new password", type: "password", required: true }
      ],
      onSubmit: function (values) {
        if (values.new_password !== values.confirm_password) {
          throw new Error("Passwords do not match.");
        }
        if (values.new_password.length < 8) {
          throw new Error("Password must be at least 8 characters.");
        }
        return D.updateAccount({ password: values.new_password });
      }
    }).then(function () {
      UI.toast.success("Password updated.");
    });
  });

  document.getElementById("duty-toggle-btn").addEventListener("click", function () {
    if (!collector) { UI.toast.error("Collector profile not found."); return; }
    var next = (collector.status === "On Route") ? "Off Duty" : "On Route";
    var btn = document.getElementById("duty-toggle-btn");
    btn.disabled = true;
    D.update("collectors", "user_id=eq." + uid, { status: next })
      .then(function () {
        UI.toast.success(next === "On Route" ? "You are now On Duty." : "You are now Off Duty.");
        return load();
      })
      .catch(function (err) { UI.toast.error("Could not update duty: " + (err.message || "unknown error")); })
      .finally(function () {
        btn.disabled = false;
      });
  });

  load().catch(function (err) {
    console.error("EcoWaste profile failed to load:", err);
  });
})();
</script>