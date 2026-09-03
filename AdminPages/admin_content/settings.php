<!-- Settings view - loaded via admin_app.php -->
<div class="flex-1 p-margin-mobile md:p-margin-desktop max-w-[1440px] w-full mx-auto">
<div class="mb-xl">
<h2 class="font-display-lg text-display-lg text-on-surface">System Settings</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant mt-sm">Manage global configurations, security policies, and notification preferences.</p>
</div>
<!-- Bento Grid Layout for Settings -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-lg">
<!-- General Settings Card -->
<div class="col-span-1 lg:col-span-2 bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-card">
<div class="flex items-center gap-sm mb-md border-b border-surface-variant pb-sm">
<span class="material-symbols-outlined text-primary">tune</span>
<h3 class="font-headline-md text-headline-md text-on-surface">General Settings</h3>
</div>
<div class="space-y-md">
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Organization Name</label>
<input id="setting-org-name" class="w-full bg-surface-container-lowest border border-outline-variant rounded px-md py-sm font-body-md focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all text-on-surface" type="text" value="EcoWaste Municipal Div."/>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-md">
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Timezone</label>
<select id="setting-timezone" class="w-full bg-surface-container-lowest border border-outline-variant rounded px-md py-sm font-body-md focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all text-on-surface appearance-none">
<option>UTC - Coordinated Universal Time</option>
<option>EST - Eastern Standard Time</option>
<option>PST - Pacific Standard Time</option>
</select>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Default Currency</label>
<select id="setting-currency" class="w-full bg-surface-container-lowest border border-outline-variant rounded px-md py-sm font-body-md focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all text-on-surface appearance-none">
<option>USD ($)</option>
<option>EUR (€)</option>
</select>
</div>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Support Email</label>
<input id="setting-support-email" class="w-full bg-surface-container-lowest border border-outline-variant rounded px-md py-sm font-body-md focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all text-on-surface" type="email" value="admin@ecowaste.gov"/>
</div>
</div>
<div class="mt-lg flex justify-end">
<button id="save-general-btn" class="bg-primary text-on-primary font-title-md px-lg py-sm rounded hover:bg-surface-tint transition-colors">Save General</button>
</div>
</div>
<!-- Security Card -->
<div class="col-span-1 bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-card">
<div class="flex items-center gap-sm mb-md border-b border-surface-variant pb-sm">
<span class="material-symbols-outlined text-primary">security</span>
<h3 class="font-headline-md text-headline-md text-on-surface">Security</h3>
</div>
<div class="space-y-lg">
<div class="flex items-center justify-between">
<div>
<h4 class="font-title-md text-title-md text-on-surface">Require MFA</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Mandatory for all admin roles.</p>
</div>
<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
<input checked="" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-outline-variant" id="toggle1" name="toggle1" type="checkbox"/>
<label class="toggle-label block overflow-hidden h-5 rounded-full bg-surface-variant cursor-pointer" for="toggle1"></label>
</div>
</div>
<div class="flex items-center justify-between">
<div>
<h4 class="font-title-md text-title-md text-on-surface">Strict Password Policy</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Min 12 chars, symbols required.</p>
</div>
<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
<input checked="" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-outline-variant" id="toggle2" name="toggle2" type="checkbox"/>
<label class="toggle-label block overflow-hidden h-5 rounded-full bg-surface-variant cursor-pointer" for="toggle2"></label>
</div>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface-variant mb-base">Session Timeout (Mins)</label>
<input id="setting-session-timeout" class="w-full bg-surface-container-lowest border border-outline-variant rounded px-md py-sm font-body-md focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all text-on-surface" type="number" value="30"/>
</div>
</div>
<div class="mt-lg flex justify-end">
<button id="save-security-btn" class="bg-primary text-on-primary font-title-md px-lg py-sm rounded hover:bg-surface-tint transition-colors">Save Security</button>
</div>
</div>
<!-- Notification Settings Card -->
<div class="col-span-1 lg:col-span-3 bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-card">
<div class="flex items-center gap-sm mb-md border-b border-surface-variant pb-sm">
<span class="material-symbols-outlined text-primary">notifications_active</span>
<h3 class="font-headline-md text-headline-md text-on-surface">Notification Preferences</h3>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-xl">
<div class="space-y-md">
<h4 class="font-title-lg text-title-lg text-on-surface">System Alerts</h4>
<div class="flex items-center justify-between p-sm hover:bg-surface-container-low rounded transition-colors">
<div>
<h5 class="font-title-md text-title-md text-on-surface">High Volume Warnings</h5>
<p class="font-body-sm text-body-sm text-on-surface-variant">Alert when collection requests exceed capacity.</p>
</div>
<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
<input checked="" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-outline-variant" id="toggle3" name="toggle3" type="checkbox"/>
<label class="toggle-label block overflow-hidden h-5 rounded-full bg-surface-variant cursor-pointer" for="toggle3"></label>
</div>
</div>
<div class="flex items-center justify-between p-sm hover:bg-surface-container-low rounded transition-colors">
<div>
<h5 class="font-title-md text-title-md text-on-surface">Collector Offline Alert</h5>
<p class="font-body-sm text-body-sm text-on-surface-variant">Notify when an active truck goes offline unexpectedly.</p>
</div>
<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
<input checked="" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-outline-variant" id="toggle4" name="toggle4" type="checkbox"/>
<label class="toggle-label block overflow-hidden h-5 rounded-full bg-surface-variant cursor-pointer" for="toggle4"></label>
</div>
    </div>
    </div>
    <div class="space-y-md">
<h4 class="font-title-lg text-title-lg text-on-surface">Email Digests</h4>
<div class="flex items-center justify-between p-sm hover:bg-surface-container-low rounded transition-colors">
<div>
<h5 class="font-title-md text-title-md text-on-surface">Daily Summary</h5>
<p class="font-body-sm text-body-sm text-on-surface-variant">Receive a daily report of total collections.</p>
</div>
<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
<input class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-outline-variant" id="toggle5" name="toggle5" type="checkbox"/>
<label class="toggle-label block overflow-hidden h-5 rounded-full bg-surface-variant cursor-pointer" for="toggle5"></label>
</div>
</div>
<div class="flex items-center justify-between p-sm hover:bg-surface-container-low rounded transition-colors">
<div>
<h5 class="font-title-md text-title-md text-on-surface">Weekly Impact Report</h5>
<p class="font-body-sm text-body-sm text-on-surface-variant">Recycling stats and environmental impact metrics.</p>
</div>
<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
<input checked="" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-outline-variant" id="toggle6" name="toggle6" type="checkbox"/>
<label class="toggle-label block overflow-hidden h-5 rounded-full bg-surface-variant cursor-pointer" for="toggle6"></label>
</div>
</div>
<div class="mt-lg flex justify-end">
<button id="save-notifications-btn" class="bg-primary text-on-primary font-title-md px-lg py-sm rounded hover:bg-surface-tint transition-colors">Save Notifications</button>
    </div>
    </div>
    </div>
    </div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var DEFAULTS = {
    general: {
      org_name: "EcoWaste Municipal Div.",
      timezone: "UTC - Coordinated Universal Time",
      currency: "USD ($)",
      support_email: "admin@ecowaste.gov"
    },
    security: {
      require_mfa: true,
      strict_password: true,
      session_timeout: 30
    },
    notifications: {
      high_volume: true,
      collector_offline: true,
      daily_summary: false,
      weekly_impact: true
    }
  };

  function val(id) {
    var el = document.getElementById(id);
    return el ? el.value : "";
  }

  function setVal(id, v) {
    var el = document.getElementById(id);
    if (el && v !== null && v !== undefined) el.value = String(v);
  }

  function setChecked(id, v) {
    var el = document.getElementById(id);
    if (el) el.checked = !!v;
  }

  async function loadSettings() {
    try {
      var rows = await D.settings.all();
      var map = {};
      rows.forEach(function (r) { map[r.key] = r.value; });

      var g = Object.assign({}, DEFAULTS.general, map.general || {});
      setVal("setting-org-name", g.org_name);
      setVal("setting-timezone", g.timezone);
      setVal("setting-currency", g.currency);
      setVal("setting-support-email", g.support_email);

      var s = Object.assign({}, DEFAULTS.security, map.security || {});
      setChecked("toggle1", s.require_mfa);
      setChecked("toggle2", s.strict_password);
      setVal("setting-session-timeout", s.session_timeout);

      var n = Object.assign({}, DEFAULTS.notifications, map.notifications || {});
      setChecked("toggle3", n.high_volume);
      setChecked("toggle4", n.collector_offline);
      setChecked("toggle5", n.daily_summary);
      setChecked("toggle6", n.weekly_impact);
    } catch (err) {
      console.error("EcoWaste settings failed to load:", err);
    }
  }

  function save(key) {
    var values;
    if (key === "general") {
      values = {
        org_name: val("setting-org-name"),
        timezone: val("setting-timezone"),
        currency: val("setting-currency"),
        support_email: val("setting-support-email")
      };
    } else if (key === "security") {
      values = {
        require_mfa: document.getElementById("toggle1").checked,
        strict_password: document.getElementById("toggle2").checked,
        session_timeout: parseInt(val("setting-session-timeout"), 10) || 30
      };
    } else {
      values = {
        high_volume: document.getElementById("toggle3").checked,
        collector_offline: document.getElementById("toggle4").checked,
        daily_summary: document.getElementById("toggle5").checked,
        weekly_impact: document.getElementById("toggle6").checked
      };
    }
    D.settings.set(key, values)
      .then(function () { window.EcoWasteUI.toast("Settings saved.", "success"); })
      .catch(function (err) { window.EcoWasteUI.toast(err.message, "error"); });
  }

  var genBtn = document.getElementById("save-general-btn");
  if (genBtn) genBtn.addEventListener("click", function () { save("general"); });
  var secBtn = document.getElementById("save-security-btn");
  if (secBtn) secBtn.addEventListener("click", function () { save("security"); });
  var notifBtn = document.getElementById("save-notifications-btn");
  if (notifBtn) notifBtn.addEventListener("click", function () { save("notifications"); });

  loadSettings();
})();
</script>
    </div>
    </div>

