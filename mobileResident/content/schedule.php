<!-- Mobile Schedule view -->
<div class="p-4 flex flex-col gap-4">
<div>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface">Collection Schedule</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Upcoming waste collections in your area.</p>
</div>

<!-- Type filters -->
<div class="flex gap-2 overflow-x-auto pb-1" id="sched-type-filters">
<button class="whitespace-nowrap px-4 py-2 rounded-full border border-primary text-primary font-label-md text-label-md hover:bg-surface-container-low transition-colors" data-type="ALL" type="button">All</button>
<button class="whitespace-nowrap px-4 py-2 rounded-full border border-outline-variant text-on-surface-variant font-label-md text-label-md hover:bg-surface-container-low transition-colors" data-type="GENERAL" type="button">General</button>
<button class="whitespace-nowrap px-4 py-2 rounded-full border border-outline-variant text-on-surface-variant font-label-md text-label-md hover:bg-surface-container-low transition-colors" data-type="RECYCLING" type="button">Recycling</button>
</div>

<!-- Calendar Card -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-4" id="calendar-card">
<div class="flex justify-between items-center mb-3">
<h3 class="font-headline-sm text-headline-sm text-on-surface" id="cal-month-label">—</h3>
<div class="flex gap-2">
<button class="w-9 h-9 flex items-center justify-center rounded-full hover:bg-surface-container-low border border-outline-variant text-on-surface-variant" id="cal-prev" type="button"><span class="material-symbols-outlined">chevron_left</span></button>
<button class="w-9 h-9 flex items-center justify-center rounded-full hover:bg-surface-container-low border border-outline-variant text-on-surface-variant" id="cal-next" type="button"><span class="material-symbols-outlined">chevron_right</span></button>
</div>
</div>
<div class="grid grid-cols-7 gap-1 text-center mb-2">
<div class="font-label-caps text-label-caps text-on-surface-variant py-1">SUN</div>
<div class="font-label-caps text-label-caps text-on-surface-variant py-1">MON</div>
<div class="font-label-caps text-label-caps text-on-surface-variant py-1">TUE</div>
<div class="font-label-caps text-label-caps text-on-surface-variant py-1">WED</div>
<div class="font-label-caps text-label-caps text-on-surface-variant py-1">THU</div>
<div class="font-label-caps text-label-caps text-on-surface-variant py-1">FRI</div>
<div class="font-label-caps text-label-caps text-on-surface-variant py-1">SAT</div>
</div>
<div class="grid grid-cols-7 gap-1" id="cal-grid"></div>
</div>

<!-- Legend -->
<div class="flex flex-wrap gap-3 bg-surface-container-lowest border border-border-subtle rounded-xl p-3">
<span class="flex items-center gap-2"><span class="w-3 h-3 rounded-full" style="background:#16a34a"></span><span class="font-label-sm text-label-sm text-on-surface-variant">General</span></span>
<span class="flex items-center gap-2"><span class="w-3 h-3 rounded-full" style="background:#2563eb"></span><span class="font-label-sm text-label-sm text-on-surface-variant">Recyclables</span></span>
<span class="flex items-center gap-2"><span class="w-3 h-3 rounded-full" style="background:#a16207"></span><span class="font-label-sm text-label-sm text-on-surface-variant">Organic</span></span>
<span class="flex items-center gap-2"><span class="w-3 h-3 rounded-full" style="background:#dc2626"></span><span class="font-label-sm text-label-sm text-on-surface-variant">Hazardous</span></span>
</div>

<!-- Upcoming List -->
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
<div class="px-4 py-3 border-b border-border-subtle bg-gradient-to-r from-primary-fixed/70 to-transparent">
<h3 class="font-headline-sm text-headline-sm text-on-surface">Upcoming Collections</h3>
</div>
<div id="sched-upcoming-list" class="flex flex-col"></div>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var all = [];
  var cursor = new Date();
  var activeType = "ALL";

  var TYPE_COLOR = {
    "General Waste": "#16a34a", General: "#16a34a", Household: "#16a34a",
    Recyclables: "#2563eb", Recycling: "#2563eb", Recyclable: "#2563eb", Plastic: "#2563eb",
    Organic: "#a16207", "Organic Waste": "#a16207", Compost: "#a16207",
    Hazardous: "#dc2626", "E-Waste": "#dc2626", Bulky: "#7c3aed"
  };
  function typeColor(wt) { return TYPE_COLOR[wt] || TYPE_COLOR["General Waste"]; }
  function typeIcon(wt) {
    if (/recycl|plastic|metal|glass|paper/i.test(wt)) return "recycling";
    if (/organic|compost|green/i.test(wt)) return "compost";
    if (/hazard|e-waste|battery/i.test(wt)) return "warning";
    if (/bulky/i.test(wt)) return "chair";
    return "delete";
  }
  function isRecyclingType(wt) { return /recycl/i.test(wt || ""); }
  function isGeneralType(wt) { return /general|household/i.test(wt || ""); }
  function monthLabel(d) { return d.toLocaleString("en-US", { month: "long", year: "numeric" }); }
  function keyFor(isoDate) { return (isoDate || "").slice(0, 10); }
  function localDateKey(d) {
    return d.getFullYear() + "-" + String(d.getMonth() + 1).padStart(2, "0") + "-" + String(d.getDate()).padStart(2, "0");
  }

  function showDayDetail(dayKey, items) {
    if (!window.EcoWasteUI) return;
    var UI = window.EcoWasteUI;
    var label = new Date(dayKey + "T00:00:00").toLocaleDateString(undefined, { weekday: "long", month: "long", day: "numeric", year: "numeric" });
    var rows = items.map(function (s) {
      var color = typeColor(s.waste_type);
      return '<div class="flex items-start gap-3 p-3 border border-border-subtle rounded-xl bg-surface-container-low">' +
        '<span class="material-symbols-outlined w-9 h-9 rounded-full shrink-0 flex items-center justify-center" style="background:' + color + "22;color:" + color + '">' + typeIcon(s.waste_type) + "</span>" +
        '<div class="flex-1 min-w-0">' +
        '<div class="flex items-center justify-between gap-2"><p class="font-body-md text-body-md font-semibold text-on-surface">' + D.esc(s.waste_type || "Collection") + "</p>" +
        '<span class="px-2 py-0.5 rounded-full font-label-caps text-[10px] ' + (s.status === "Confirmed" ? "bg-secondary-container text-on-secondary-container" : "border border-outline text-on-surface-variant") + '">' + D.esc((s.status || "Scheduled").toUpperCase()) + "</span></div>" +
        '<p class="font-label-sm text-label-sm text-on-surface-variant mt-0.5">' + D.esc(D.fmtTime(s.time_start) + " - " + D.fmtTime(s.time_end)) + (s.zone ? " · " + D.esc(s.zone) : "") + "</p>" +
        (s.notes ? '<p class="font-label-sm text-label-sm text-on-surface-variant mt-0.5">' + D.esc(s.notes) + "</p>" : "") +
        "</div></div>";
    }).join("");
    var overlay = document.createElement("div");
    overlay.className = "fixed inset-0 z-[60] flex items-center justify-center p-4";
    overlay.innerHTML =
      '<div class="absolute inset-0 bg-black/40" data-ui-close></div>' +
      '<div class="relative bg-surface-container-lowest border border-outline-variant rounded-xl shadow-2xl w-full max-w-md overflow-hidden">' +
      '<div class="flex items-center justify-between px-5 py-4 border-b border-outline-variant">' +
      '<h3 class="font-headline-md text-headline-md text-on-surface">' + D.esc(label) + "</h3>" +
      '<button type="button" data-ui-close class="text-on-surface-variant hover:text-on-surface transition-colors p-1"><span class="material-symbols-outlined">close</span></button>' +
      "</div>" +
      '<div class="p-5 flex flex-col gap-2 max-h-[70vh] overflow-y-auto">' + rows + "</div>" +
      '<div class="flex justify-end px-5 py-4 border-t border-outline-variant bg-surface-container-low/50">' +
      '<button type="button" data-ui-close class="px-4 py-2 rounded-lg bg-primary text-on-primary font-body-md text-body-md font-semibold transition-colors">Close</button>' +
      "</div></div>";
    overlay.querySelectorAll("[data-ui-close]").forEach(function (el) {
      el.addEventListener("click", function () { overlay.remove(); });
    });
    document.body.appendChild(overlay);
  }

  function renderCalendar() {
    var label = document.getElementById("cal-month-label");
    if (label) label.textContent = monthLabel(cursor);
    var grid = document.getElementById("cal-grid");
    if (!grid) return;
    grid.innerHTML = "";
    var year = cursor.getFullYear();
    var month = cursor.getMonth();
    var first = new Date(year, month, 1);
    var startDow = first.getDay();
    var daysInMonth = new Date(year, month + 1, 0).getDate();
    var monthKey = year + "-" + String(month + 1).padStart(2, "0");

    var byDate = {};
    all.forEach(function (s) {
      var dk = keyFor(s.collection_date);
      if (dk.slice(0, 7) !== monthKey) return;
      if (activeType === "GENERAL" && !isGeneralType(s.waste_type)) return;
      if (activeType === "RECYCLING" && !isRecyclingType(s.waste_type)) return;
      (byDate[dk] = byDate[dk] || []).push(s);
    });

    for (var i = 0; i < startDow; i++) {
      grid.appendChild(emptyCell());
    }
    for (var day = 1; day <= daysInMonth; day++) {
      var d = new Date(year, month, day);
      var dk = localDateKey(d);
      var items = byDate[dk] || [];
      var isToday = localDateKey(new Date()) === dk;
      var cell = document.createElement("div");
      cell.className = "aspect-square p-0.5 flex flex-col items-center justify-start rounded-lg " +
        (isToday ? "border-2 border-primary bg-surface-container-low" : "border border-outline-variant bg-surface-bright");
      cell.innerHTML = '<span class="font-data-mono text-data-mono text-[12px] ' + (isToday ? "font-bold text-primary" : "text-on-surface-variant") + ' mt-0.5">' + day + "</span>";
      if (items.length) {
        cell.innerHTML += '<div class="mt-auto mb-0.5 flex flex-col items-center gap-0.5 w-full">' +
          '<span class="flex gap-0.5">' + items.slice(0, 3).map(function (s) {
            return '<span class="w-1.5 h-1.5 rounded-full" style="background:' + typeColor(s.waste_type) + '"></span>';
          }).join("") + "</span>" +
          '<span class="text-[9px] font-label-caps text-primary underline">View</span></div>';
        cell.classList.add("cursor-pointer", "hover:bg-surface-container-low");
        cell.addEventListener("click", function (dk2) {
          return function () {
            var dayItems = all.filter(function (s) {
              if (keyFor(s.collection_date) !== dk2) return false;
              if (activeType === "GENERAL" && !isGeneralType(s.waste_type)) return false;
              if (activeType === "RECYCLING" && !isRecyclingType(s.waste_type)) return false;
              return true;
            });
            if (dayItems.length) showDayDetail(dk2, dayItems);
          };
        }(dk));
      }
      grid.appendChild(cell);
    }
  }

  function emptyCell() {
    var e = document.createElement("div");
    e.className = "aspect-square border border-transparent";
    return e;
  }

  function renderUpcoming() {
    var listEl = document.getElementById("sched-upcoming-list");
    if (!listEl) return;
    listEl.innerHTML = "";
    var rows = all.filter(function (s) {
      if (activeType === "GENERAL" && !isGeneralType(s.waste_type)) return false;
      if (activeType === "RECYCLING" && !isRecyclingType(s.waste_type)) return false;
      return true;
    }).sort(function (a, b) {
      return String(a.collection_date).localeCompare(String(b.collection_date));
    }).slice(0, 8);

    if (!rows.length) {
      listEl.innerHTML = '<div class="p-6 text-center"><span class="material-symbols-outlined text-[32px] text-on-surface-variant">event_busy</span><p class="font-body-sm text-body-sm text-on-surface-variant mt-2">No upcoming collections.</p></div>';
      return;
    }
    rows.forEach(function (s) {
      var color = typeColor(s.waste_type);
      var item = document.createElement("div");
      item.className = "flex items-start gap-3 p-4 hover:bg-surface-container-low transition-colors border-b border-border-subtle last:border-b-0";
      item.innerHTML =
        '<span class="material-symbols-outlined w-10 h-10 rounded-full shrink-0 flex items-center justify-center" style="background:' + color + "22;color:" + color + '">' + typeIcon(s.waste_type) + "</span>" +
        '<div class="flex-1 min-w-0">' +
        '<div class="flex items-center justify-between gap-2"><p class="font-body-md text-body-md font-semibold text-on-surface">' + D.esc(s.waste_type || "Collection") + "</p>" +
        '<span class="px-2 py-0.5 rounded-full font-label-caps text-[10px] ' + (s.status === "Confirmed" ? "bg-secondary-container text-on-secondary-container" : "border border-outline text-on-surface-variant") + '">' + D.esc((s.status || "Scheduled").toUpperCase()) + "</span></div>" +
        '<p class="font-label-sm text-label-sm text-on-surface-variant mt-0.5">' + D.esc(D.fmtDay(s.collection_date)) + "</p>" +
        '<p class="font-label-sm text-label-sm text-on-surface-variant">' + D.esc(D.fmtTime(s.time_start) + " - " + D.fmtTime(s.time_end)) + "</p></div>";
      listEl.appendChild(item);
    });
  }

  function renderAll() {
    renderCalendar();
    renderUpcoming();
  }

  async function load() {
    all = await D.list(
      "collection_schedules",
      "zone,waste_type,collection_date,time_start,time_end,status,notes",
      "collection_date.asc",
      "collection_date=gte." + localDateKey(new Date())
    ).catch(function () { return []; });
    renderAll();
  }

  document.getElementById("cal-prev").addEventListener("click", function () {
    cursor.setMonth(cursor.getMonth() - 1);
    renderCalendar();
  });
  document.getElementById("cal-next").addEventListener("click", function () {
    cursor.setMonth(cursor.getMonth() + 1);
    renderCalendar();
  });

  document.querySelectorAll("#sched-type-filters button").forEach(function (btn) {
    btn.addEventListener("click", function () {
      activeType = btn.getAttribute("data-type");
      document.querySelectorAll("#sched-type-filters button").forEach(function (b) {
        var on = b === btn;
        b.className = "whitespace-nowrap px-4 py-2 rounded-full border font-label-md text-label-md hover:bg-surface-container-low transition-colors " +
          (on ? "border-primary text-primary" : "border-outline-variant text-on-surface-variant");
      });
      renderAll();
    });
  });

  load().catch(function (err) {
    console.error("EcoWaste schedule failed to load:", err);
  });
})();
</script>
