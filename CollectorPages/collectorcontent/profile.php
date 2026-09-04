<!-- Profile view - loaded via collector_content.php -->
<div class="w-full max-w-2xl mt-stack-lg md:mt-0">
<div class="mb-stack-lg text-center md:text-left">
<h2 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-background">My Profile</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-2">Manage your collector details and service information.</p>
</div>
<!-- Profile Card -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl shadow-sm overflow-hidden flex flex-col md:flex-row items-stretch">
<!-- Avatar & Status Section -->
<div class="bg-surface-bright border-b md:border-b-0 md:border-r border-border-subtle p-stack-lg flex flex-col items-center justify-center md:w-1/3 relative">
<div id="prof-active-badge-mobile" class="absolute top-4 right-4 md:hidden">
<span class="bg-primary-fixed text-on-primary-fixed-variant font-label-sm text-label-sm px-3 py-1 rounded-full flex items-center gap-1">
<div class="w-2 h-2 rounded-full bg-status-completed"></div>
                            Active
                        </span>
</div>
<div id="prof-avatar" class="w-32 h-32 rounded-full border-4 border-surface-container-lowest shadow-md overflow-hidden mb-stack-md relative z-10 bg-gradient-to-br from-primary to-emerald-600 flex items-center justify-center text-white font-headline-lg text-headline-lg">—</div>
<h3 id="prof-name" class="font-headline-md text-headline-md text-on-surface text-center mb-1">—</h3>
<p id="prof-number" class="font-label-md text-label-md text-primary mb-stack-sm text-center">—</p>
<div class="hidden md:flex mt-auto pt-stack-md w-full justify-center">
<span id="prof-status-chip" class="bg-primary-fixed text-on-primary-fixed-variant font-label-md text-label-md px-4 py-1.5 rounded-full flex items-center gap-2">
<div class="w-2.5 h-2.5 rounded-full bg-status-completed"></div>
                            Active Status
                        </span>
</div>
</div>
<!-- Details Section -->
<div class="p-stack-lg flex-1 flex flex-col justify-between">
<div class="space-y-stack-md">
<div class="flex flex-col bg-surface p-4 rounded-lg border border-border-subtle">
<span class="font-label-sm text-label-sm text-on-surface-variant mb-3 uppercase tracking-wider">Duty Status</span>
<div class="flex items-center justify-between gap-3">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container">
<span class="material-symbols-outlined">work</span>
</div>
<div>
<p id="prof-duty-label" class="font-label-md text-label-md text-on-surface">Loading...</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">Set whether you are currently available to take collections.</p>
</div>
</div>
<button id="duty-toggle-btn" class="flex items-center gap-2 px-4 py-2 rounded-lg font-label-md text-label-md transition-colors duration-200" type="button">
<span class="material-symbols-outlined">power_settings_new</span>
<span id="duty-toggle-text">—</span>
</button>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-stack-md">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant mb-1 uppercase tracking-wider">Email Address</span>
<div class="flex items-center gap-2 text-on-surface font-body-md text-body-md">
<span class="material-symbols-outlined text-outline">mail</span>
<span id="prof-email">—</span>
</div>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant mb-1 uppercase tracking-wider">Phone Number</span>
<div class="flex items-center gap-2 text-on-surface font-body-md text-body-md">
<span class="material-symbols-outlined text-outline">call</span>
<span id="prof-phone">—</span>
</div>
</div>
</div>
<div class="h-px bg-border-subtle w-full my-stack-sm"></div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant mb-2 uppercase tracking-wider">Assigned Service Area</span>
<div class="flex items-center gap-3 bg-surface p-4 rounded-lg border border-border-subtle">
<div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container">
<span class="material-symbols-outlined">map</span>
</div>
<div>
<p id="prof-district" class="font-label-md text-label-md text-on-surface">—</p>
<p id="prof-zones" class="font-body-sm text-body-sm text-on-surface-variant">—</p>
</div>
</div>
</div>
</div>
<div class="mt-stack-lg pt-stack-md border-t border-border-subtle flex justify-end gap-3">
<button id="edit-name-btn" class="bg-surface hover:bg-surface-container-low border border-border-subtle text-on-surface font-label-md text-label-md py-2.5 px-6 rounded-lg transition-colors duration-200 flex items-center gap-2">
<span class="material-symbols-outlined text-sm">edit</span>
                        Edit Name
                    </button>
<button id="change-pass-btn" class="bg-primary-container hover:bg-primary text-on-primary font-label-md text-label-md py-2.5 px-6 rounded-lg transition-colors duration-200 flex items-center gap-2 shadow-sm">
<span class="material-symbols-outlined text-sm">lock</span>
                        Change Password
                    </button>
</div>
</div>
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
    setText("prof-email", profile ? profile.email : "—");
    setText("prof-phone", profile ? profile.phone : "—");
    setText("prof-number", collector ? collector.collector_number : "—");
    setText("prof-district", collector ? collector.district : "—");
    setText("prof-zones", collector ? (collector.zones || "—") : "—");
    var avatar = document.getElementById("prof-avatar");
    if (avatar) avatar.textContent = D.initials(name);
    var chip = document.getElementById("prof-status-chip");
    var status = collector && collector.status ? collector.status : "Active";
    var cls = status === "Active" ? "bg-emerald-100 text-emerald-800" : "bg-surface-container-high text-on-surface-variant";
    if (chip) {
      chip.className = "font-label-md text-label-md px-4 py-1.5 rounded-full flex items-center gap-2 " + cls;
    }

    var onDuty = (collector && collector.status === "On Route") || (status === "Active");
    var dutyBtn = document.getElementById("duty-toggle-btn");
    var dutyText = document.getElementById("duty-toggle-text");
    var dutyLabel = document.getElementById("prof-duty-label");
    if (dutyText) dutyText.textContent = onDuty ? "Go Off Duty" : "Go On Duty";
    if (dutyBtn) {
      dutyBtn.className = "flex items-center gap-2 px-4 py-2 rounded-lg font-label-md text-label-md transition-colors duration-200 " +
        (onDuty ? "bg-status-completed hover:bg-emerald-600 text-white" : "bg-primary hover:bg-primary-container text-on-primary");
    }
    if (dutyLabel) dutyLabel.textContent = onDuty ? "On Duty — You are available" : "Off Duty — You are unavailable";
  }

  async function load() {
    var results = await Promise.all([
      D.list("profiles", "id,email,full_name,phone", null, "id=eq." + uid),
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
      UI.toast("Name updated.", "success");
      load();
    }).catch(function () {});
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
        if (values.new_password !== values.confirm_password) throw new Error("Passwords do not match.");
        if (values.new_password.length < 8) throw new Error("Password must be at least 8 characters.");
        return D.updateAccount({ password: values.new_password });
      }
    }).then(function () {
      UI.toast("Password updated.", "success");
    }).catch(function () {});
  });

  document.getElementById("duty-toggle-btn").addEventListener("click", function () {
    if (!collector) { UI.toast("Collector profile not found.", "error"); return; }
    var next = (collector.status === "On Route") ? "Off Duty" : "On Route";
    var btn = document.getElementById("duty-toggle-btn");
    btn.disabled = true;
    D.update("collectors", "user_id=eq." + uid, { status: next })
      .then(function () {
        UI.toast(next === "On Route" ? "You are now On Duty." : "You are now Off Duty.", "success");
        return load();
      })
      .catch(function (err) { UI.toast("Could not update duty: " + (err.message || "unknown error"), "error"); })
      .finally(function () {
        btn.disabled = false;
      });
  });

  load().catch(function (err) { console.error("EcoWaste profile failed to load:", err); });
})();
</script>
