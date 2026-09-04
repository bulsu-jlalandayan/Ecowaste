<!-- Mobile Profile view -->
<div class="p-4 flex flex-col gap-4">
<!-- Profile card -->
<div class="flex flex-col items-center text-center bg-surface-container-lowest border border-border-subtle rounded-2xl p-6">
<div class="w-20 h-20 rounded-full bg-primary/10 border border-outline-variant flex items-center justify-center text-primary font-headline-lg text-headline-lg font-bold" id="prof-avatar">?</div>
<h3 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface mt-3" id="prof-name">Loading…</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1 flex items-center justify-center gap-1"><span class="material-symbols-outlined text-[16px]">badge</span> Resident</p>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-1" id="prof-member">Member</p>
<button class="inline-flex items-center gap-2 mt-4 px-4 py-2 bg-primary text-on-primary rounded-lg font-body-md text-body-md font-semibold hover:bg-primary-container focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary shadow-sm transition-colors" id="edit-profile-btn" type="button">
<span class="material-symbols-outlined text-[18px]">edit</span> Edit Profile
</button>
</div>

<!-- Personal Information -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
<div class="px-4 py-3 border-b border-border-subtle flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">contact_page</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Personal Information</h3>
</div>
<div class="divide-y divide-border-subtle">
<div class="px-4 py-3 flex items-center justify-between gap-3">
<div class="flex items-center gap-2.5"><span class="material-symbols-outlined text-on-surface-variant text-[18px]">person</span><span class="font-body-md text-body-md text-on-surface-variant">Full Name</span></div>
<span class="font-body-md text-body-md text-on-surface text-right" id="pi-name">—</span>
</div>
<div class="px-4 py-3 flex items-center justify-between gap-3">
<div class="flex items-center gap-2.5"><span class="material-symbols-outlined text-on-surface-variant text-[18px]">mail</span><span class="font-body-md text-body-md text-on-surface-variant">Email</span></div>
<span class="font-data-mono text-data-mono text-on-surface text-right text-[13px]" id="pi-email">—</span>
</div>
<div class="px-4 py-3 flex items-center justify-between gap-3">
<div class="flex items-center gap-2.5"><span class="material-symbols-outlined text-on-surface-variant text-[18px]">phone</span><span class="font-body-md text-body-md text-on-surface-variant">Phone</span></div>
<span class="font-data-mono text-data-mono text-on-surface text-right text-[13px]" id="pi-phone">—</span>
</div>
<div class="px-4 py-3 flex items-center justify-between gap-3">
<div class="flex items-center gap-2.5"><span class="material-symbols-outlined text-on-surface-variant text-[18px]">home</span><span class="font-body-md text-body-md text-on-surface-variant">Address</span></div>
<span class="font-body-md text-body-md text-on-surface text-right" id="pi-address">—</span>
</div>
</div>
</div>

<!-- Preferences -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
<div class="px-4 py-3 border-b border-border-subtle flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">tune</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Preferences</h3>
</div>
<div class="divide-y divide-border-subtle">
<div class="px-4 py-3 flex items-center justify-between gap-3">
<div class="flex items-center gap-2.5"><span class="material-symbols-outlined text-on-surface-variant text-[18px]">notifications</span><span class="font-body-md text-body-md text-on-surface">Notification reminders</span></div>
<div class="w-11 h-6 bg-primary rounded-full p-1 cursor-pointer transition-colors shrink-0" id="tog-notifications" data-pref="notification_reminders">
<div class="w-4 h-4 bg-on-primary rounded-full ml-auto" data-knob></div>
</div>
</div>
<div class="px-4 py-3 flex items-center justify-between gap-3">
<div class="flex items-center gap-2.5"><span class="material-symbols-outlined text-on-surface-variant text-[18px]">language</span><span class="font-body-md text-body-md text-on-surface-variant">Language</span></div>
<span class="font-body-md text-body-md text-on-surface text-right" id="pref-language">English</span>
</div>
<div class="px-4 py-3 flex items-center justify-between gap-3">
<div class="flex items-center gap-2.5"><span class="material-symbols-outlined text-on-surface-variant text-[18px]">local_shipping</span><span class="font-body-md text-body-md text-on-surface">Collection day reminders</span></div>
<div class="w-11 h-6 bg-primary rounded-full p-1 cursor-pointer transition-colors shrink-0" id="tog-collection" data-pref="collection_reminders">
<div class="w-4 h-4 bg-on-primary rounded-full ml-auto" data-knob></div>
</div>
</div>
</div>
</div>

<!-- Account & Security -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
<div class="px-4 py-3 border-b border-border-subtle flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">security</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Account &amp; Security</h3>
</div>
<div class="divide-y divide-border-subtle">
<button class="w-full px-4 py-3 flex items-center justify-between gap-3 hover:bg-surface-container-low transition-colors text-left" id="change-pass-btn" type="button">
<div class="flex items-center gap-2.5"><span class="material-symbols-outlined text-on-surface-variant text-[18px]">lock</span><span class="font-body-md text-body-md text-on-surface">Change password</span></div>
<span class="material-symbols-outlined text-on-surface-variant text-[18px]">chevron_right</span>
</button>
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
  var prefs = null;

  function setTxt(id, v) {
    var el = document.getElementById(id);
    if (el) el.textContent = (v === null || v === undefined || v === "") ? "—" : v;
  }

  function renderToggle(id, on) {
    var el = document.getElementById(id);
    if (!el) return;
    var knob = el.querySelector("[data-knob]");
    if (on) {
      el.classList.add("bg-primary");
      el.classList.remove("bg-surface-variant");
      if (knob) knob.classList.add("ml-auto");
    } else {
      el.classList.remove("bg-primary");
      el.classList.add("bg-surface-variant");
      if (knob) knob.classList.remove("ml-auto");
    }
  }

  function applyData() {
    var name = profile ? profile.full_name : "";
    setTxt("prof-name", name || "Resident");
    setTxt("prof-member", profile && profile.created_at ? "Member since " + new Date(profile.created_at).toLocaleDateString(undefined, { month: "long", year: "numeric" }) : "Member");
    var av = document.getElementById("prof-avatar");
    if (av) av.textContent = D.initials(name || "Resident");
    setTxt("pi-name", name);
    setTxt("pi-email", profile ? profile.email : "");
    setTxt("pi-phone", profile ? profile.phone : "");
    setTxt("pi-address", profile ? profile.address : "");
    setTxt("pref-language", prefs && prefs.language ? prefs.language : "English");
    renderToggle("tog-notifications", !prefs || prefs.notification_reminders !== false);
    renderToggle("tog-collection", !prefs || prefs.collection_reminders !== false);
  }

  function upsertPref(patch) {
    var body = Object.assign({}, prefs || {}, patch, { updated_at: new Date().toISOString(), user_id: uid });
    return D.reqUpsert("POST", "/rest/v1/resident_preferences?on_conflict=user_id", body);
  }

  document.getElementById("edit-profile-btn").addEventListener("click", function () {
    UI.openModal({
      title: "Edit Profile",
      submitLabel: "Save",
      fields: [
        { name: "full_name", label: "Full name", type: "text", required: true, value: profile ? profile.full_name : "" },
        { name: "phone", label: "Phone", type: "text", value: profile ? profile.phone : "" },
        { name: "address", label: "Address", type: "text", value: profile ? profile.address : "" }
      ],
      onSubmit: async function (values) {
        await D.update("profiles", "id=eq." + uid, {
          full_name: values.full_name, phone: values.phone, address: values.address
        });
        await D.updateAccount({ data: { full_name: values.full_name } }).catch(function () {});
      }
    }).then(function () {
      UI.toast("Profile updated.");
      load();
    }).catch(function () { });
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
      UI.toast("Password updated.");
    }).catch(function () { });
  });

  document.querySelectorAll("[data-pref]").forEach(function (el) {
    el.addEventListener("click", function () {
      var key = el.getAttribute("data-pref");
      var next = !(prefs ? prefs[key] !== false : true);
      upsertPref((function () { var o = {}; o[key] = next; return o; })())
        .then(function () { prefs = Object.assign({}, prefs || {}, { [key]: next }); renderToggle(el.id, next); })
        .catch(function (err) { UI.toast(err.message || "Failed to update preference.", "error"); });
    });
  });

  async function load() {
    var results = await Promise.all([
      D.list("profiles", "id,email,full_name,phone,address,created_at", null, "id=eq." + uid),
      D.list("resident_preferences", "user_id,notification_reminders,collection_reminders,language", null, "user_id=eq." + uid)
    ]);
    profile = results[0] && results[0].length ? results[0][0] : null;
    prefs = results[1] && results[1].length ? results[1][0] : null;
    applyData();
  }

  load().catch(function (err) {
    console.error("EcoWaste profile failed to load:", err);
  });
})();
</script>
