<!-- Mobile Settings view -->
<div class="p-4 flex flex-col gap-4">
<div>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface">Settings</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">Manage your notification and app preferences.</p>
</div>

<!-- Notifications -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
<h3 class="px-4 pt-4 font-label-md text-label-md text-primary uppercase tracking-wider flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px]">notifications</span> Notifications
</h3>
<div class="p-4 flex flex-col gap-4">
<label class="flex items-center justify-between gap-3 cursor-pointer select-none">
<span class="font-body-md text-body-md text-on-surface">New assignments</span>
<span class="relative inline-block">
<input class="peer sr-only" id="t-new-assignments" type="checkbox"/>
<span class="block w-11 h-6 rounded-full bg-surface-container-high peer-checked:bg-primary transition-colors"></span>
<span class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full shadow transition-all peer-checked:translate-x-5"></span>
</span>
</label>
<label class="flex items-center justify-between gap-3 cursor-pointer select-none">
<span class="font-body-md text-body-md text-on-surface">Schedule reminders</span>
<span class="relative inline-block">
<input class="peer sr-only" id="t-schedule-reminders" type="checkbox"/>
<span class="block w-11 h-6 rounded-full bg-surface-container-high peer-checked:bg-primary transition-colors"></span>
<span class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full shadow transition-all peer-checked:translate-x-5"></span>
</span>
</label>
<label class="flex items-center justify-between gap-3 cursor-pointer select-none">
<span class="font-body-md text-body-md text-on-surface">System updates</span>
<span class="relative inline-block">
<input class="peer sr-only" id="t-system-updates" type="checkbox"/>
<span class="block w-11 h-6 rounded-full bg-surface-container-high peer-checked:bg-primary transition-colors"></span>
<span class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full shadow transition-all peer-checked:translate-x-5"></span>
</span>
</label>
</div>
</div>

<!-- Preferences -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
<h3 class="px-4 pt-4 font-label-md text-label-md text-amber-700 uppercase tracking-wider flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px]">tune</span> Preferences
</h3>
<div class="p-4 flex flex-col gap-4">
<div>
<label class="font-label-sm text-label-sm text-on-surface-variant" for="set-language">Language</label>
<select id="set-language" class="w-full mt-1.5 px-3 py-3 border border-primary/20 rounded-xl bg-primary-fixed font-body-md text-body-md appearance-none cursor-pointer text-primary">
<option value="English">English</option>
<option value="Filipino">Filipino</option>
</select>
</div>
<div>
<label class="font-label-sm text-label-sm text-on-surface-variant" for="set-time-format">Time Format</label>
<select id="set-time-format" class="w-full mt-1.5 px-3 py-3 border border-primary/20 rounded-xl bg-primary-fixed font-body-md text-body-md appearance-none cursor-pointer text-primary">
<option value="12-hour">12-hour</option>
<option value="24-hour">24-hour</option>
</select>
</div>
</div>
</div>

<!-- Save -->
<div class="flex gap-3">
<a class="flex-1 inline-flex items-center justify-center py-3.5 rounded-xl border-2 border-border-subtle text-on-surface font-label-md text-label-md hover:bg-surface-container-low transition-colors" href="#" data-view="dashboard">Cancel</a>
<button id="settings-save-btn" class="flex-1 inline-flex items-center justify-center gap-2 py-3.5 rounded-xl bg-gradient-to-r from-primary to-primary-container text-on-primary font-label-md text-label-md shadow-md shadow-primary/25 hover:opacity-90 active:scale-[0.99] transition-all" type="button">
<span class="material-symbols-outlined text-[20px]">save</span> Save Changes
</button>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  var UI = window.EcoWasteUI;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var KEY = "collector_settings";
  var DEFAULTS = {
    notifications: { new_assignments: true, schedule_reminders: true, system_updates: true },
    language: "English",
    time_format: "12-hour"
  };
  var current = null;

  function apply(v) {
    document.getElementById("t-new-assignments").checked = !!(v.notifications && v.notifications.new_assignments);
    document.getElementById("t-schedule-reminders").checked = !!(v.notifications && v.notifications.schedule_reminders);
    document.getElementById("t-system-updates").checked = !!(v.notifications && v.notifications.system_updates);
    document.getElementById("set-language").value = v.language || "English";
    document.getElementById("set-time-format").value = v.time_format || "12-hour";
  }

  function collect() {
    return {
      notifications: {
        new_assignments: document.getElementById("t-new-assignments").checked,
        schedule_reminders: document.getElementById("t-schedule-reminders").checked,
        system_updates: document.getElementById("t-system-updates").checked
      },
      language: document.getElementById("set-language").value,
      time_format: document.getElementById("set-time-format").value
    };
  }

  async function load() {
    var rows = await D.settings.all();
    var hit = (rows || []).filter(function (r) { return r.key === KEY; });
    if (hit.length && hit[0].value) {
      try { current = JSON.parse(hit[0].value); } catch (e) { current = null; }
    }
    apply(current || JSON.parse(JSON.stringify(DEFAULTS)));
  }

  document.getElementById("settings-save-btn").addEventListener("click", function () {
    var btn = document.getElementById("settings-save-btn");
    btn.disabled = true;
    btn.classList.add("opacity-70");
    D.settings.set(KEY, JSON.stringify(collect()))
      .then(function () {
        UI.toast.success("Settings saved.");
      })
      .catch(function (err) {
        UI.toast.error("Could not save settings: " + (err.message || "unknown error"));
      })
      .finally(function () {
        btn.disabled = false;
        btn.classList.remove("opacity-70");
      });
  });

  load().catch(function (err) {
    console.error("EcoWaste settings failed to load:", err);
  });
})();
</script>