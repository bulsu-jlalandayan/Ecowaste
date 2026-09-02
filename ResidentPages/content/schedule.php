<!-- Schedule content fragment (loaded by resident.html via content.php) -->
<div class="p-margin max-w-7xl mx-auto flex flex-col gap-lg">
<!-- Header -->
<div>
<h1 class="font-headline-lg text-headline-lg text-primary mb-xs">Collection Schedule</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant">Stay informed about upcoming waste collections in your area.</p>
</div>
<!-- Controls -->
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-md gap-md">
<div class="flex bg-surface-container-low rounded-full p-1 border border-outline-variant">
<button class="px-md py-sm rounded-full bg-primary text-on-primary font-body-sm text-body-sm font-semibold shadow-sm transition-all" data-sched-view="calendar" type="button">Calendar</button>
<button class="px-md py-sm rounded-full text-on-surface-variant font-body-sm text-body-sm hover:bg-surface-variant transition-all" data-sched-view="list" type="button">List</button>
</div>
<div class="flex gap-sm overflow-x-auto pb-2 w-full sm:w-auto" id="sched-type-filters">
<button class="whitespace-nowrap px-md py-sm rounded-full border border-primary text-primary font-label-caps text-label-caps hover:bg-surface-container-low transition-colors" data-type="ALL" type="button">ALL TYPES</button>
<button class="whitespace-nowrap px-md py-sm rounded-full border border-outline-variant text-on-surface-variant font-label-caps text-label-caps hover:bg-surface-container-low transition-colors" data-type="GENERAL" type="button">GENERAL</button>
<button class="whitespace-nowrap px-md py-sm rounded-full border border-outline-variant text-on-surface-variant font-label-caps text-label-caps hover:bg-surface-container-low transition-colors" data-type="RECYCLING" type="button">RECYCLING</button>
</div>
</div>
<div class="grid grid-cols-1 xl:grid-cols-3 gap-gutter">
<!-- Calendar Section -->
<div class="xl:col-span-2 flex flex-col gap-md">
<!-- Calendar Card -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-md">
<!-- Calendar Header -->
<div class="flex justify-between items-center mb-md">
<h2 class="font-headline-md text-headline-md text-on-background" id="cal-month-label">—</h2>
<div class="flex gap-sm">
<button class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-surface-container-low border border-outline-variant text-on-surface-variant" id="cal-prev" type="button"><span class="material-symbols-outlined">chevron_left</span></button>
<button class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-surface-container-low border border-outline-variant text-on-surface-variant" id="cal-next" type="button"><span class="material-symbols-outlined">chevron_right</span></button>
</div>
</div>
<!-- Calendar Grid -->
<div class="grid grid-cols-7 gap-xs text-center mb-sm">
<div class="font-label-caps text-label-caps text-on-surface-variant py-xs">SUN</div>
<div class="font-label-caps text-label-caps text-on-surface-variant py-xs">MON</div>
<div class="font-label-caps text-label-caps text-on-surface-variant py-xs">TUE</div>
<div class="font-label-caps text-label-caps text-on-surface-variant py-xs">WED</div>
<div class="font-label-caps text-label-caps text-on-surface-variant py-xs">THU</div>
<div class="font-label-caps text-label-caps text-on-surface-variant py-xs">FRI</div>
<div class="font-label-caps text-label-caps text-on-surface-variant py-xs">SAT</div>
</div>
<!-- Calendar Days (rendered by JS) -->
<div class="grid grid-cols-7 gap-xs" id="cal-grid"></div>
</div>
<!-- Legend Card -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-md">
<h3 class="font-label-caps text-label-caps text-on-surface-variant mb-sm border-b border-outline-variant pb-xs">COLLECTION TYPES</h3>
<div class="flex flex-wrap gap-md">
<div class="flex items-center gap-xs">
<div class="w-3 h-3 rounded-full bg-[#16a34a]"></div>
<span class="font-body-sm text-body-sm text-on-background">General Waste</span>
</div>
<div class="flex items-center gap-xs">
<div class="w-3 h-3 rounded-full bg-[#2563eb]"></div>
<span class="font-body-sm text-body-sm text-on-background">Recyclables</span>
</div>
<div class="flex items-center gap-xs">
<div class="w-3 h-3 rounded-full bg-[#a16207]"></div>
<span class="font-body-sm text-body-sm text-on-background">Organic / Green</span>
</div>
<div class="flex items-center gap-xs">
<div class="w-3 h-3 rounded-full bg-[#dc2626]"></div>
<span class="font-body-sm text-body-sm text-on-background">Hazardous</span>
</div>
</div>
</div>
</div>
<!-- Upcoming List Section -->
<div class="xl:col-span-1 flex flex-col">
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-md flex-1">
<h3 class="font-headline-md text-headline-md text-on-background mb-md border-b border-outline-variant pb-sm">Upcoming Collections</h3>
<div class="flex flex-col gap-sm" id="sched-upcoming-list">
<p class="p-sm font-body-sm text-body-sm text-on-surface-variant">Loading schedule…</p>
</div>
</div>
</div>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var all = [];
  var cursor = new Date();
  var activeNav = "calendar";
  var activeType = "ALL";

  var TYPE_COLOR = {
    "General Waste": "#16a34a",
    General: "#16a34a",
    Household: "#16a34a",
    Recyclables: "#2563eb",
    Recycling: "#2563eb",
    Recyclable: "#2563eb",
    Plastic: "#2563eb",
    Organic: "#a16207",
    "Organic Waste": "#a16207",
    Compost: "#a16207",
    Hazardous: "#dc2626",
    "E-Waste": "#dc2626",
    Bulky: "#7c3aed"
  };
  function typeColor(wt) {
    return TYPE_COLOR[wt] || TYPE_COLOR["General Waste"];
  }
  function typeIcon(wt) {
    if (/recycl|plastic|metal|glass|paper/i.test(wt)) return "recycling";
    if (/organic|compost|green/i.test(wt)) return "compost";
    if (/hazard|e-waste|battery/i.test(wt)) return "warning";
    if (/bulky/i.test(wt)) return "chair";
    return "delete";
  }

  function isRecyclingType(wt) { return /recycl/i.test(wt || ""); }
  function isGeneralType(wt) { return /general|household/i.test(wt || ""); }

  function monthLabel(d) {
    return d.toLocaleString("en-US", { month: "long", year: "numeric" });
  }

  function keyFor(isoDate) {
    return (isoDate || "").slice(0, 10);
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

    // Build lookup of schedules by date in this month (respecting type filter)
    var byDate = {};
    all.forEach(function (s) {
      var dk = keyFor(s.collection_date);
      if (dk.slice(0, 7) !== (year + "-" + String(month + 1).padStart(2, "0"))) return;
      if (activeType === "GENERAL" && !isGeneralType(s.waste_type)) return;
      if (activeType === "RECYCLING" && !isRecyclingType(s.waste_type)) return;
      (byDate[dk] = byDate[dk] || []).push(s);
    });

    for (var i = 0; i < startDow; i++) {
      grid.appendChild(emptyCell());
    }
    for (var day = 1; day <= daysInMonth; day++) {
      var d = new Date(year, month, day);
      var dk = d.toISOString().slice(0, 10);
      var items = byDate[dk] || [];
      var isToday = new Date().toDateString() === d.toDateString();
      var cell = document.createElement("div");
      cell.className = "aspect-square p-xs flex flex-col items-center justify-start rounded-lg cursor-pointer transition-colors group " +
        (isToday ? "border-2 border-primary bg-surface-container-low shadow-[0_4px_4px_rgba(0,0,0,0.05)]" : "border border-outline-variant bg-surface-bright hover:border-primary");
      cell.innerHTML = '<span class="font-data-mono text-data-mono ' + (isToday ? "font-bold text-primary" : "text-on-surface-variant group-hover:text-primary") + ' mt-1">' + day + "</span>";
      if (items.length) {
        var dots = '<div class="mt-auto flex gap-1 mb-1">' + items.slice(0, 3).map(function (s) {
          return '<div class="w-2 h-2 rounded-full" style="background:' + typeColor(s.waste_type) + '" title="' + D.esc(s.waste_type) + '"></div>';
        }).join("") + "</div>";
        cell.innerHTML += dots;
      }
      grid.appendChild(cell);
    }
  }

  function emptyCell() {
    var e = document.createElement("div");
    e.className = "aspect-square p-xs border border-transparent";
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
      listEl.innerHTML = '<p class="p-sm font-body-sm text-body-sm text-on-surface-variant">No upcoming collections.</p>';
      return;
    }
    rows.forEach(function (s) {
      var color = typeColor(s.waste_type);
      var item = document.createElement("div");
      item.className = "p-sm rounded-lg border border-outline-variant bg-surface hover:bg-surface-container-low transition-colors flex items-start gap-sm";
      item.innerHTML =
        '<div class="w-10 h-10 rounded-full shrink-0 flex items-center justify-center" style="background:' + color + '22;color:' + color + '">' +
        '<span class="material-symbols-outlined" style="font-variation-settings: \'FILL\' 1;">' + typeIcon(s.waste_type) + "</span></div>" +
        '<div class="flex-1">' +
        '<p class="font-body-md text-body-md font-semibold text-on-background">' + D.esc(s.waste_type || "Collection") + "</p>" +
        '<p class="font-body-sm text-body-sm text-on-surface-variant mb-1">' + D.esc(D.fmtDay(s.collection_date)) + "</p>" +
        '<p class="font-data-mono text-data-mono text-on-surface-variant">' + D.esc(D.fmtTime(s.time_start) + " - " + D.fmtTime(s.time_end)) + "</p></div>" +
        '<div class="px-2 py-1 rounded font-label-caps text-label-caps self-start ' + (s.status === "Confirmed" ? "bg-secondary-container text-on-secondary-container" : "border border-outline text-on-surface-variant") + '">' + D.esc((s.status || "Scheduled").toUpperCase()) + "</div>";
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
      "collection_date=gte." + new Date().toISOString().slice(0, 10)
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

  document.querySelectorAll("[data-sched-view]").forEach(function (btn) {
    btn.addEventListener("click", function () {
      activeNav = btn.getAttribute("data-sched-view");
      document.querySelectorAll("[data-sched-view]").forEach(function (b) {
        var on = b === btn;
        b.className = "px-md py-sm rounded-full font-body-sm text-body-sm transition-all " +
          (on ? "bg-primary text-on-primary font-semibold shadow-sm" : "text-on-surface-variant hover:bg-surface-variant");
      });
      var cal = document.querySelector("#cal-grid").closest(".bg-surface-container-lowest");
      if (activeNav === "list") cal.style.display = "none";
      else cal.style.display = "";
    });
  });

  document.querySelectorAll("#sched-type-filters button").forEach(function (btn) {
    btn.addEventListener("click", function () {
      activeType = btn.getAttribute("data-type");
      document.querySelectorAll("#sched-type-filters button").forEach(function (b) {
        var on = b === btn;
        b.className = "whitespace-nowrap px-md py-sm rounded-full border font-label-caps text-label-caps hover:bg-surface-container-low transition-colors " +
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
