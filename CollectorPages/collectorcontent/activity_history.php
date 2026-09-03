<!-- Activity History view - loaded via collector_content.php -->
<div class="max-w-4xl mx-auto py-8">
<!-- Header -->
<div class="mb-stack-lg border-b border-border-subtle pb-6">
<h1 class="font-headline-lg text-headline-lg text-on-background">Activity History</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-2">Review your recent collection activities.</p>
</div>
<!-- Timeline -->
<div id="activity-timeline" class="relative border-l-2 border-border-subtle ml-4 md:ml-6 space-y-10 py-4">
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var uid = D.currentUserId();

  var META = {
    collection_started: { icon: "play_circle", cls: "bg-primary text-on-primary" },
    collection_completed: { icon: "check_circle", cls: "bg-primary text-on-primary" },
    waste_recorded: { icon: "delete_sweep", cls: "bg-surface-container-high text-primary border border-border-subtle" },
    proof_uploaded: { icon: "photo_camera", cls: "bg-surface-container-high text-primary border border-border-subtle" },
    default: { icon: "history", cls: "bg-surface-container-high text-on-surface-variant border border-border-subtle" }
  };

  function buildItem(e, idx) {
    var m = META[e.action] || META.default;
    var d = e.created_at ? new Date(e.created_at) : null;
    var dateStr = d ? d.toLocaleDateString(undefined, { month: "short", day: "numeric", year: "numeric" }) : "—";
    var timeStr = d ? d.toLocaleTimeString(undefined, { hour: "numeric", minute: "2-digit" }) : "";
    var div = document.createElement("div");
    div.className = "relative pl-8 md:pl-12 group";
    div.innerHTML =
      '<div class="absolute -left-[17px] top-1 w-8 h-8 rounded-full ' + m.cls + ' flex items-center justify-center ring-4 ring-background z-10 group-hover:scale-110 transition-transform duration-300 shadow-sm">' +
      '<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: \'FILL\' 1;">' + m.icon + '</span></div>' +
      '<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-5 hover:shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05),_0px_2px_4px_-2px_rgba(0,0,0,0.05)] transition-shadow duration-300">' +
      '<div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-2 mb-3">' +
      '<h3 class="font-label-md text-label-md text-on-background">' + D.esc((e.action || "").replace(/_/g, " ").replace(/\b\w/g, function (c) { return c.toUpperCase(); })) + '</h3>' +
      '<div class="flex flex-row sm:flex-col gap-2 sm:gap-0 sm:text-right items-center sm:items-end bg-surface sm:bg-transparent px-2 py-1 sm:p-0 rounded-md sm:rounded-none border border-border-subtle sm:border-none">' +
      '<span class="font-label-sm text-label-sm text-on-surface-variant flex items-center gap-1"><span class="material-symbols-outlined text-[14px] sm:hidden">calendar_today</span>' + dateStr + '</span>' +
      '<span class="hidden sm:inline-block text-border-subtle mx-1">-</span>' +
      '<span class="font-label-sm text-label-sm text-on-surface-variant flex items-center gap-1"><span class="material-symbols-outlined text-[14px] sm:hidden">schedule</span>' + timeStr + '</span>' +
      '</div></div>' +
      (e.description ? '<p class="font-body-sm text-body-sm text-on-surface-variant">' + D.esc(e.description).slice(0, 200) + '</p>' : '') +
      '</div>';
    return div;
  }

  function render(rows) {
    var host = document.getElementById("activity-timeline");
    host.innerHTML = "";
    if (!rows.length) {
      host.innerHTML = '<div class="text-center py-12"><span class="material-symbols-outlined text-[48px] text-on-surface-variant opacity-50">history</span><p class="font-body-md text-body-md text-on-surface-variant mt-3">No activity yet. Start a collection to begin.</p></div>';
      return;
    }
    rows.forEach(function (e, i) { host.appendChild(buildItem(e, i)); });
  }

  D.list("activity_history", "*", "created_at.desc", "collector_id=eq." + uid)
    .then(function (rows) { render(rows || []); })
    .catch(function (err) {
      console.error("EcoWaste activity history failed to load:", err);
      document.getElementById("activity-timeline").innerHTML = '<p class="font-body-sm text-body-sm text-on-surface-variant py-12 text-center">Activity log unavailable right now.</p>';
    });
})();
</script>
