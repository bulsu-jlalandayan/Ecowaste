<!-- Profile view - loaded via admin_app.php -->
<div class="flex-1 p-margin-mobile md:p-margin-desktop max-w-[1440px] w-full mx-auto">
<div class="mb-xl">
<h2 class="font-display-lg text-display-lg text-on-surface">My Profile</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant mt-sm">View and manage your account details and security preferences.</p>
</div>

<!-- Identity header card -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-card mb-lg flex flex-col md:flex-row md:items-center gap-lg">
<div id="profile-avatar" class="w-16 h-16 rounded-full bg-primary-fixed text-primary flex items-center justify-center font-headline-md text-headline-md">—</div>
<div class="flex-1">
<p id="profile-full-name" class="font-headline-md text-headline-md text-on-surface">Loading…</p>
<p id="profile-email" class="font-body-lg text-body-lg text-on-surface-variant">—</p>
<span id="profile-role" class="mt-sm inline-flex items-center gap-xs px-2 py-1 rounded-full bg-primary-fixed text-primary font-label-md text-label-md">—</span>
<span id="profile-collector-badge" class="hidden mt-sm ml-sm inline-flex items-center gap-xs px-2 py-1 rounded-full bg-surface-variant text-on-surface-variant font-label-md text-label-md">Collector Account</span>
</div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-lg">
<!-- Profile Information Card -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-card">
<div class="flex items-center gap-sm mb-md border-b border-surface-variant pb-sm">
<span class="material-symbols-outlined text-primary">tune</span>
<h3 class="font-headline-md text-headline-md text-on-surface">Profile Information</h3>
</div>
<div class="space-y-md">
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Full Name</label>
<input id="profile-name-input" class="w-full bg-surface-container-lowest border border-outline-variant rounded px-md py-sm font-body-md focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all text-on-surface" type="text" placeholder="Your full name"/>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Email Address</label>
<input id="profile-email-input" class="w-full bg-surface-container-lowest border border-outline-variant rounded px-md py-sm font-body-md text-on-surface-variant cursor-not-allowed" type="email" readonly=""/>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-md">
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Role</label>
<input id="profile-role-input" class="w-full bg-surface-container-lowest border border-outline-variant rounded px-md py-sm font-body-md text-on-surface-variant cursor-not-allowed" type="text" readonly=""/>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Member Since</label>
<div id="profile-created" class="w-full bg-surface-container-low rounded px-md py-sm font-body-md text-on-surface-variant">—</div>
</div>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Last Active</label>
<div id="profile-last-active" class="w-full bg-surface-container-low rounded px-md py-sm font-body-md text-on-surface-variant">—</div>
</div>
</div>
<div class="mt-lg flex justify-end">
<button id="save-profile-btn" class="bg-primary text-on-primary font-title-md px-lg py-sm rounded hover:bg-surface-tint transition-colors">Update Profile</button>
</div>
</div>

<!-- Security Card -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-card">
<div class="flex items-center gap-sm mb-md border-b border-surface-variant pb-sm">
<span class="material-symbols-outlined text-primary">security</span>
<h3 class="font-headline-md text-headline-md text-on-surface">Change Password</h3>
</div>
<div class="space-y-md">
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">New Password</label>
<input id="profile-new-password" class="w-full bg-surface-container-lowest border border-outline-variant rounded px-md py-sm font-body-md focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all text-on-surface" type="password" placeholder="At least 6 characters"/>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Confirm New Password</label>
<input id="profile-confirm-password" class="w-full bg-surface-container-lowest border border-outline-variant rounded px-md py-sm font-body-md focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all text-on-surface" type="password" placeholder="Re-enter password"/>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">You will remain signed in after changing your password.</p>
</div>
<div class="mt-lg flex justify-end">
<button id="save-password-btn" class="bg-primary text-on-primary font-title-md px-lg py-sm rounded hover:bg-surface-tint transition-colors">Save Password</button>
</div>
</div>
</div>

<!-- Collector Record card (shown only if this admin is also a collector) -->
<div id="profile-collector-card" class="hidden mt-lg bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-card">
<div class="flex items-center gap-sm mb-md border-b border-surface-variant pb-sm">
<span class="material-symbols-outlined text-primary">local_shipping</span>
<h3 class="font-headline-md text-headline-md text-on-surface">Collection Profile</h3>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-md">
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Collector No.</label>
<div id="collector-number" class="font-title-md text-title-md text-on-surface">—</div>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">District</label>
<div id="collector-district" class="font-title-md text-title-md text-on-surface">—</div>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Vehicle</label>
<div id="collector-vehicle" class="font-title-md text-title-md text-on-surface">—</div>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Status</label>
<div id="collector-status" class="font-title-md text-title-md text-on-surface">—</div>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Rating</label>
<div id="collector-rating" class="font-title-md text-title-md text-on-surface">—</div>
</div>
</div>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  if (!D || !localStorage.getItem("sb-access-token")) return;
  var UI = window.EcoWasteUI;

  var uid = D.currentUserId();

  function setText(id, value) {
    var el = document.getElementById(id);
    if (el) el.textContent = value === null || value === undefined ? "—" : String(value);
  }

  async function load() {
    var profile = null;
    if (uid) {
      var rows = await D.list("profiles", "id,full_name,email,role,created_at,last_active_at", null, "id=eq." + uid);
      profile = rows && rows.length ? rows[0] : null;
    }
    if (profile) {
      var fullName = profile.full_name || "Admin";
      setText("profile-full-name", fullName);
      setText("profile-email", profile.email || "—");
      setText("profile-created", D.fmtDate(profile.created_at));
      setText("profile-last-active", D.fmtDate(profile.last_active_at));
      var av = document.getElementById("profile-avatar");
      if (av) av.textContent = D.initials(fullName);
      var nameIn = document.getElementById("profile-name-input");
      if (nameIn) nameIn.value = fullName;
      var emailIn = document.getElementById("profile-email-input");
      if (emailIn) emailIn.value = profile.email || "";
      var roleIn = document.getElementById("profile-role-input");
      var role = profile.role || "admin";
      if (roleIn) roleIn.value = role;
      setText("profile-role", role);
    }

    if (uid) {
      var cols = await D.list("collectors", "id,full_name,collector_number,district,vehicle_name,vehicle_type,status,rating", null, "user_id=eq." + uid);
      if (cols && cols.length) {
        var c = cols[0];
        var card = document.getElementById("profile-collector-card");
        if (card) card.classList.remove("hidden");
        var badge = document.getElementById("profile-collector-badge");
        if (badge) badge.classList.remove("hidden");
        setText("collector-number", c.collector_number);
        setText("collector-district", c.district);
        setText("collector-vehicle", (c.vehicle_name || "—") + (c.vehicle_type ? " (" + c.vehicle_type + ")" : ""));
        setText("collector-status", c.status);
        setText("collector-rating", (c.rating !== null && c.rating !== undefined) ? c.rating : "—");
      }
    }
  }

  var saveProfile = document.getElementById("save-profile-btn");
  if (saveProfile) {
    saveProfile.addEventListener("click", function () {
      var input = document.getElementById("profile-name-input");
      var name = input ? input.value.trim() : "";
      if (!name) {
        UI.toast("Full name is required.", "error");
        return;
      }
      D.updateAccount({ data: { full_name: name } })
        .then(function () {
          setText("profile-full-name", name);
          var av = document.getElementById("profile-avatar");
          if (av) av.textContent = D.initials(name);
          UI.toast("Profile updated.", "success");
        })
        .catch(function (err) { UI.toast(err.message, "error"); });
    });
  }

  var savePassword = document.getElementById("save-password-btn");
  if (savePassword) {
    savePassword.addEventListener("click", function () {
      var p1El = document.getElementById("profile-new-password");
      var p2El = document.getElementById("profile-confirm-password");
      var p1 = p1El ? p1El.value : "";
      var p2 = p2El ? p2El.value : "";
      if (!p1) {
        UI.toast("New password is required.", "error");
        return;
      }
      if (p1.length < 6) {
        UI.toast("Password must be at least 6 characters.", "error");
        return;
      }
      if (p1 !== p2) {
        UI.toast("Passwords do not match.", "error");
        return;
      }
      D.updateAccount({ password: p1 })
        .then(function () {
          if (p1El) p1El.value = "";
          if (p2El) p2El.value = "";
          UI.toast("Password updated.", "success");
        })
        .catch(function (err) { UI.toast(err.message, "error"); });
    });
  }

  load().catch(function (err) {
    console.error("EcoWaste profile failed to load:", err);
  });
})();
</script>