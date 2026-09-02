<!-- Mobile Activity History view -->
<div class="p-4 flex flex-col gap-4">
<div>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface">Activity History</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">A timeline of everything you do as a collector.</p>
</div>

<div id="activity-list" class="flex flex-col"></div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var uid = D.currentUserId();
  var META = {
    collection_started: { icon: "play_circle", cls: "bg-blue-50 text-blue-700" },
    collection_completed: { icon: "check_circle", cls: "bg-emerald-50 text-emerald-700" },
    waste_recorded: { icon: "delete_sweep", cls: "bg-amber-50 text-amber-700" },
    default: { icon: "history", cls: "bg-surface-container-high text-on-surface-variant" }
  };

  var COLORS = "bg-primary text-on-primary";
  var COLORS_ALT = "bg-surface-container-high text-on-surface-variant";

  function entry(e) {
    var m = META[e.action] || META.default;
    var wrap = document.createElement("div");
    wrap.className = "flex gap-3";
    wrap.innerHTML =
      '<div class="flex flex-col items-center">' +
        '<span class="material-symbols-outlined w-10 h-10 rounded-full flex items-center justify-center ' + m.cls + '">' + m.icon + "</span>" +
      "</div>" +
      '<div class="flex-1 min-w-0 pb-4 border-b border-border-subtle">' +
        '<p class="font-body-md text-body-md text-on-surface capitalize">' + D.esc(e.action.replace(/_/g, " ")) + "</p>" +
        '<p class="font-label-sm text-label-sm text-on-surface-variant mt-1">' + (e.request_id ? "Request " + e.request_id + " · " : "") + D.fmtDate(e.created_at) + "</p>" +
        (e.description ? '<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">' + D.esc(e.description).slice(0, 160) + "</p>" : "") +
      "</div>";
    return wrap;
  }

  function render(rows) {
    var list = document.getElementById("activity-list");
    list.innerHTML = "";
    if (!rows.length) {
      list.innerHTML = '<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-6 text-center">' +
        '<span class="material-symbols-outlined text-[40px] text-on-surface-variant">history</span>' +
        '<p class="font-body-md text-body-md text-on-surface-variant mt-2">No activity yet. Start a collection to begin.</p></div>';
      return;
    }
    rows.forEach(function (e) { list.appendChild(entry(e)); });
  }

  D.list("activity_history", "*", "created_at.desc", "collector_id=eq." + uid)
    .then(function (rows) { render(rows || []); })
    .catch(function (err) {
      console.error("EcoWaste activity history failed to load:", err);
      var list = document.getElementById("activity-list");
      if (list) list.innerHTML = '<p class="font-body-sm text-body-sm text-on-surface-variant">Activity log unavailable right now.</p>';
    });
})();
</script>