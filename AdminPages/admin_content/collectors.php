<!-- Collectors view - loaded via admin_app.php -->
<!-- Page Header -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-md mb-xl">
<div>
<h2 class="font-display-lg text-display-lg text-on-surface">Collectors Management</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">Manage personnel, monitor routes, and evaluate performance.</p>
</div>
<button id="add-collector-btn" class="bg-primary text-on-primary font-title-md text-title-md px-lg py-sm rounded-DEFAULT flex items-center gap-sm hover:bg-surface-tint transition-colors shadow-sm self-start sm:self-auto" type="button">
<span class="material-symbols-outlined text-[20px]" data-icon="add">add</span>
                    Add New Collector
                </button>
</div>
<!-- Dashboard Bento Grid Metrics -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-lg mb-xl">
<!-- Metric Card 1 -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-lg shadow-card relative overflow-hidden group">
<div class="absolute top-0 right-0 p-lg text-primary/10 group-hover:scale-110 transition-transform duration-300">
<span class="material-symbols-outlined text-[64px]" data-icon="groups">groups</span>
</div>
<p class="font-title-md text-title-md text-on-surface-variant mb-xs relative z-10">Total Active</p>
<div class="flex items-end gap-sm relative z-10">
<span id="total-active-value" class="font-display-lg text-display-lg text-on-surface">—</span>
<span class="font-label-md text-label-md text-primary bg-primary-fixed px-2 py-1 rounded-full mb-1 flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">arrow_upward</span> 4%
                        </span>
</div>
</div>
<!-- Metric Card 2 -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-lg shadow-card relative overflow-hidden group">
<div class="absolute top-0 right-0 p-lg text-secondary/10 group-hover:scale-110 transition-transform duration-300">
<span class="material-symbols-outlined text-[64px]" data-icon="route">route</span>
</div>
<p class="font-title-md text-title-md text-on-surface-variant mb-xs relative z-10">Currently on Route</p>
<div class="flex items-end gap-sm relative z-10">
<span id="on-route-value" class="font-display-lg text-display-lg text-on-surface">—</span>
</div>
</div>
<!-- Metric Card 3 -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-lg shadow-card relative overflow-hidden group">
<div class="absolute top-0 right-0 p-lg text-error/10 group-hover:scale-110 transition-transform duration-300">
<span class="material-symbols-outlined text-[64px]" data-icon="warning">warning</span>
</div>
<p class="font-title-md text-title-md text-on-surface-variant mb-xs relative z-10">Issues Reported</p>
<div class="flex items-end gap-sm relative z-10">
<span id="issues-value" class="font-display-lg text-display-lg text-on-surface">—</span>
<span class="font-label-md text-label-md text-error bg-error-container px-2 py-1 rounded-full mb-1">Needs Attention</span>
</div>
</div>
</div>
<!-- Main Data Section -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-card flex flex-col">
<!-- Table Toolbar -->
<div class="p-md border-b border-outline-variant flex flex-col sm:flex-row justify-between items-center gap-md bg-surface-container-low/50">
<div class="relative w-full sm:w-72">
<span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]" data-icon="search">search</span>
<input id="collector-search" class="w-full pl-xl pr-sm py-2 rounded-DEFAULT border border-outline-variant bg-surface-container-lowest text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 font-body-sm text-body-sm" placeholder="Search by name, ID, or vehicle..." type="text"/>
</div>
<div class="flex items-center gap-sm w-full sm:w-auto">
<select id="collector-status-filter" class="bg-surface-container-lowest border border-outline-variant rounded-DEFAULT px-md py-2 font-body-sm text-body-sm text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary cursor-pointer">
<option value="">All Statuses</option>
<option value="On Route">On Route</option>
<option value="Off Duty">Off Duty</option>
<option value="Vehicle Issue">Vehicle Issue</option>
</select>
<div class="flex items-center gap-sm w-full sm:w-auto">
<button class="flex-1 sm:flex-none flex items-center justify-center gap-sm px-md py-2 border border-outline-variant rounded-DEFAULT text-on-surface hover:bg-surface-container transition-colors font-title-md text-title-md">
<span class="material-symbols-outlined text-[18px]" data-icon="filter_list">filter_list</span>
                            Filter
                        </button>
<button id="export-collectors-btn" class="flex-1 sm:flex-none flex items-center justify-center gap-sm px-md py-2 border border-outline-variant rounded-DEFAULT text-on-surface hover:bg-surface-container transition-colors font-title-md text-title-md">
<span class="material-symbols-outlined text-[18px]" data-icon="download">download</span>
                            Export
                        </button>
</div>
</div>
<!-- Data Table -->
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse min-w-[800px]">
<thead>
<tr class="bg-surface-container-low border-b border-outline-variant">
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md sticky top-0 bg-surface-container-low">Collector Info</th>
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md sticky top-0 bg-surface-container-low">ID Number</th>
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md sticky top-0 bg-surface-container-low">Vehicle</th>
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md sticky top-0 bg-surface-container-low">Status</th>
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md sticky top-0 bg-surface-container-low">Rating</th>
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md sticky top-0 bg-surface-container-low text-right">Actions</th>
</tr>
</thead>
<tbody id="collector-tbody" class="divide-y divide-outline-variant/50">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md">
<div class="flex items-center gap-md">
<div class="w-8 h-8 rounded-full bg-primary-fixed text-primary flex items-center justify-center font-title-md text-title-md">
                                            JD
                                        </div>
<div>
<p class="font-title-md text-title-md text-on-surface">John Doe</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">North District</p>
</div>
</div>
</td>
<td class="py-sm px-md font-mono-md text-mono-md text-on-surface-variant">COL-8492</td>
<td class="py-sm px-md">
<div class="flex items-center gap-xs text-on-surface">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant" data-icon="local_shipping">local_shipping</span>
<span class="font-body-md text-body-md">TRK-01 (Heavy)</span>
</div>
</td>
<td class="py-sm px-md">
<span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-status-onroute text-status-onroute-text font-label-md text-label-md">
<span class="w-1.5 h-1.5 rounded-full bg-status-onroute-text"></span>
                                        On Route
                                    </span>
</td>
<td class="py-sm px-md">
<div class="flex items-center gap-xs text-primary">
<span class="material-symbols-outlined text-[16px] fill-current" data-icon="star" data-weight="fill">star</span>
<span class="font-title-md text-title-md">4.9</span>
</div>
</td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
</button>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md">
<div class="flex items-center gap-md">
<div class="w-8 h-8 rounded-full bg-secondary-fixed text-secondary flex items-center justify-center font-title-md text-title-md">
                                            AS
                                        </div>
<div>
<p class="font-title-md text-title-md text-on-surface">Alice Smith</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">East District</p>
</div>
</div>
</td>
<td class="py-sm px-md font-mono-md text-mono-md text-on-surface-variant">COL-3721</td>
<td class="py-sm px-md">
<div class="flex items-center gap-xs text-on-surface">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant" data-icon="local_shipping">local_shipping</span>
<span class="font-body-md text-body-md">TRK-14 (Medium)</span>
</div>
</td>
<td class="py-sm px-md">
<span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-surface-variant text-on-surface-variant font-label-md text-label-md">
<span class="w-1.5 h-1.5 rounded-full bg-on-surface-variant"></span>
                                        Off Duty
                                    </span>
</td>
<td class="py-sm px-md">
<div class="flex items-center gap-xs text-primary">
<span class="material-symbols-outlined text-[16px] fill-current" data-icon="star" data-weight="fill">star</span>
<span class="font-title-md text-title-md">4.7</span>
</div>
</td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
</button>
</td>
</tr>
<!-- Row 3 (Issue) -->
<tr class="hover:bg-surface-container-lowest/50 transition-colors group bg-error-container/10">
<td class="py-sm px-md">
<div class="flex items-center gap-md">
<div class="w-8 h-8 rounded-full bg-error/10 text-error flex items-center justify-center font-title-md text-title-md">
                                            MJ
                                        </div>
<div>
<p class="font-title-md text-title-md text-on-surface">Marcus Johnson</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">West District</p>
</div>
</div>
</td>
<td class="py-sm px-md font-mono-md text-mono-md text-on-surface-variant">COL-9920</td>
<td class="py-sm px-md">
<div class="flex items-center gap-xs text-on-surface">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant" data-icon="local_shipping">local_shipping</span>
<span class="font-body-md text-body-md">TRK-05 (Heavy)</span>
</div>
</td>
<td class="py-sm px-md">
<span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-error-container text-on-error-container font-label-md text-label-md">
<span class="w-1.5 h-1.5 rounded-full bg-error"></span>
                                        Vehicle Issue
                                    </span>
</td>
<td class="py-sm px-md">
<div class="flex items-center gap-xs text-primary">
<span class="material-symbols-outlined text-[16px] fill-current" data-icon="star" data-weight="fill">star</span>
<span class="font-title-md text-title-md">4.2</span>
</div>
</td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="p-md border-t border-outline-variant flex items-center justify-between text-body-sm text-on-surface-variant bg-surface-container-low/30">
<div id="collector-count">Showing 0 entries</div>
<div id="collector-pagination" class="flex gap-xs"></div>
</div>
</div>
<div class="mt-xl text-center pb-xl">
<p class="font-body-sm text-body-sm text-on-surface-variant/70">EcoWaste Admin System v2.1.4</p>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var STATUS_BADGE = {
    "On Route": "bg-status-onroute text-status-onroute-text",
    "Off Duty": "bg-surface-variant text-on-surface-variant",
    "Vehicle Issue": "bg-error-container text-on-error-container"
  };
  var STATUS_DOT = {
    "On Route": "bg-status-onroute-text",
    "Off Duty": "bg-on-surface-variant",
    "Vehicle Issue": "bg-error"
  };

  function tempPassword() {
    var chars = "abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789";
    var out = "";
    for (var i = 0; i < 12; i++) out += chars.charAt(Math.floor(Math.random() * chars.length));
    return out;
  }

  function setText(id, value) {
    var el = document.getElementById(id);
    if (el) el.textContent = value;
  }

var allCollectors = [];
  var searchTerm = "";
  var statusFilter = "";
  var collectorPage = 1;

  async function load() {
    allCollectors = await D.list("collectors",
      "id,user_id,full_name,collector_number,district,vehicle_name,vehicle_type,status,rating",
      "full_name.asc");
    setText("total-active-value", D.fmtNum(allCollectors.filter(function (c) { return c.status !== "Vehicle Issue"; }).length));
    setText("on-route-value", D.fmtNum(allCollectors.filter(function (c) { return c.status === "On Route"; }).length));
    setText("issues-value", D.fmtNum(allCollectors.filter(function (c) { return c.status === "Vehicle Issue"; }).length));
    render();
  }

  function filtered() {
    return window.EcoWasteUI.filterList(allCollectors, searchTerm,
      ["full_name", "collector_number", "vehicle_name", "district"],
      { status: statusFilter });
  }

  function render() {
    var rows = filtered();
    var tbody = document.getElementById("collector-tbody");
    if (!tbody) return;
    var page = window.EcoWasteUI.paginate(rows, collectorPage, 10);
    if (!page.rows.length) {
      tbody.innerHTML = '<tr><td class="py-sm px-md text-on-surface-variant" colspan="6">No collectors yet.</td></tr>';
    } else {
      tbody.innerHTML = "";
      page.rows.forEach(function (c) {
        var initials = D.esc(D.initials(c.full_name));
        var badge = STATUS_BADGE[c.status] || "bg-surface-variant text-on-surface-variant";
        var dot = STATUS_DOT[c.status] || "bg-on-surface-variant";
        var rowStatus = c.status === "Vehicle Issue" ? "bg-error-container/10" : "";
        var tr = document.createElement("tr");
        tr.className = "hover:bg-surface-container-lowest/50 transition-colors group " + rowStatus;
        tr.innerHTML =
          '<td class="py-sm px-md">' +
            '<div class="flex items-center gap-md">' +
              '<div class="w-8 h-8 rounded-full bg-primary-fixed text-primary flex items-center justify-center font-title-md text-title-md">' + initials + '</div>' +
              '<div><p class="font-title-md text-title-md text-on-surface">' + D.esc(c.full_name) + '</p>' +
              '<p class="font-body-sm text-body-sm text-on-surface-variant">' + D.esc(c.district || "") + '</p></div>' +
            '</div>' +
          '</td>' +
          '<td class="py-sm px-md font-mono-md text-mono-md text-on-surface-variant">' + D.esc(c.collector_number) + '</td>' +
          '<td class="py-sm px-md"><div class="flex items-center gap-xs text-on-surface">' +
            '<span class="material-symbols-outlined text-[16px] text-on-surface-variant">local_shipping</span>' +
            '<span class="font-body-md text-body-md">' + D.esc(c.vehicle_name || "—") + ' (' + D.esc(c.vehicle_type || "—") + ')</span>' +
            '</div></td>' +
          '<td class="py-sm px-md"><span class="inline-flex items-center gap-xs px-2 py-1 rounded-full font-label-md text-label-md ' + badge + '">' +
            '<span class="w-1.5 h-1.5 rounded-full ' + dot + '"></span>' + D.esc(c.status) + '</span></td>' +
          '<td class="py-sm px-md"><div class="flex items-center gap-xs text-primary">' +
            '<span class="material-symbols-outlined text-[16px] fill-current" style="font-variation-settings: &quot;FILL&quot; 1;">star</span>' +
            '<span class="font-title-md text-title-md">' + (c.rating !== null ? D.esc(c.rating) : "—") + '</span>' +
            '</div></td>' +
          '<td class="py-sm px-md text-right"><button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors" data-action="menu" data-id="' + c.id + '"><span class="material-symbols-outlined">more_vert</span></button></td>';
        tbody.appendChild(tr);
      });
    }
    var count = document.getElementById("collector-count");
    if (count) {
      count.textContent = page.total ? "Showing " + page.start + " to " + page.end + " of " + page.total + " entries" : "Showing 0 entries";
    }
    var nav = document.getElementById("collector-pagination");
    if (nav) {
      window.EcoWasteUI.paginateButtons(nav, { page: page.page, pages: page.pages, onPage: function (p) { collectorPage = p; render(); } });
    }
  }

  var exportBtn = document.getElementById("export-collectors-btn");
  if (exportBtn) {
    exportBtn.addEventListener("click", function () {
      var rows = filtered().map(function (c) {
        return {
          full_name: c.full_name || "",
          collector_number: c.collector_number || "",
          district: c.district || "",
          vehicle: c.vehicle_name ? c.vehicle_name + " (" + (c.vehicle_type || "") + ")" : "",
          status: c.status || "",
          rating: c.rating !== null && c.rating !== undefined ? c.rating : ""
        };
      });
      D.exportCSV("ecowaste_collectors.csv", ["full_name", "collector_number", "district", "vehicle", "status", "rating"], rows);
    });
  }

  function findCollector(id) {
    for (var i = 0; i < allCollectors.length; i++) {
      if (allCollectors[i].id === id) return allCollectors[i];
    }
    return null;
  }

  function setCollectorStatus(c, status) {
    D.update("collectors", "id=eq." + c.id, { status: status })
      .then(function () {
        window.EcoWasteUI.toast("Collector status updated.", "success");
        load();
      })
      .catch(function (err) { window.EcoWasteUI.toast(err.message, "error"); });
  }

  function openEdit(c) {
    window.EcoWasteUI.openModal({
      title: "Edit Collector",
      submitLabel: "Save Changes",
      fields: [
        { name: "district", label: "District", value: c.district || "", placeholder: "e.g. North District" },
        { name: "vehicle_name", label: "Vehicle Name", value: c.vehicle_name || "", placeholder: "e.g. TRK-01" },
        { name: "vehicle_type", label: "Vehicle Type", value: c.vehicle_type || "", placeholder: "e.g. Heavy" },
        { name: "rating", label: "Rating (0 - 5)", type: "number", value: c.rating !== null ? String(c.rating) : "", placeholder: "e.g. 4.5" },
        { name: "status", label: "Status", type: "select", required: true, value: c.status,
          options: [
            { label: "On Route", value: "On Route" },
            { label: "Off Duty", value: "Off Duty" },
            { label: "Vehicle Issue", value: "Vehicle Issue" }
          ] }
      ],
      onSubmit: function (values) {
        var body = {
          district: values.district || null,
          vehicle_name: values.vehicle_name || null,
          vehicle_type: values.vehicle_type || null,
          status: values.status
        };
        if (values.rating !== "") {
          var r = parseFloat(values.rating);
          if (isNaN(r) || r < 0 || r > 5) throw new Error("Rating must be a number between 0 and 5.");
          body.rating = r;
        } else {
          body.rating = null;
        }
        return D.update("collectors", "id=eq." + c.id, body);
      }
    }).then(function () {
      window.EcoWasteUI.toast("Collector updated.", "success");
      load();
    }).catch(function (err) {
      if (err && err.message === "closed") return;
      window.EcoWasteUI.toast(err.message, "error");
    });
  }

  function deleteCollector(c) {
    window.EcoWasteUI.confirm({
      title: "Delete collector?",
      message: "Remove " + c.full_name + " from the collector roster?",
      danger: true,
      confirmLabel: "Delete"
    }).then(function (ok) {
      if (!ok) return;
      D.remove("collectors", "id=eq." + c.id)
        .then(function () {
          window.EcoWasteUI.toast("Collector removed.", "success");
          load();
        })
        .catch(function (err) { window.EcoWasteUI.toast(err.message, "error"); });
    });
  }

  var tbody = document.getElementById("collector-tbody");
  if (tbody) {
    tbody.addEventListener("click", function (e) {
      var btn = e.target.closest("button[data-action]");
      if (!btn) return;
      var c = findCollector(btn.getAttribute("data-id"));
      if (!c) return;
      if (btn.getAttribute("data-action") === "menu") {
        window.EcoWasteUI.menu(btn, [
          { label: "Edit", icon: "edit", onClick: function () { openEdit(c); } },
          "-",
          { label: "Set On Route", icon: "directions_car", onClick: function () { setCollectorStatus(c, "On Route"); } },
          { label: "Set Off Duty", icon: "home", onClick: function () { setCollectorStatus(c, "Off Duty"); } },
          { label: "Flag Vehicle Issue", icon: "warning", onClick: function () { setCollectorStatus(c, "Vehicle Issue"); } },
          "-",
          { label: "Delete", icon: "delete", danger: true, onClick: function () { deleteCollector(c); } }
        ]);
      }
    });
  }

  var searchEl = document.getElementById("collector-search");
  var statusFilterEl = document.getElementById("collector-status-filter");
if (searchEl) searchEl.addEventListener("input", function () { searchTerm = this.value; collectorPage = 1; render(); });
  if (statusFilterEl) statusFilterEl.addEventListener("change", function () { statusFilter = this.value; collectorPage = 1; render(); });

  var addBtn = document.getElementById("add-collector-btn");
  if (addBtn) {
    addBtn.addEventListener("click", function () {
      var tempPwd = "";
      window.EcoWasteUI.openModal({
        title: "Add New Collector",
        submitLabel: "Create Collector",
        fields: [
          { name: "full_name", label: "Full Name", required: true, placeholder: "e.g. John Doe" },
          { name: "email", label: "Email Address", type: "email", required: true, placeholder: "john@example.com" }
        ],
        onSubmit: async function (values) {
          tempPwd = tempPassword();
          var data = await D.signup(values.email, tempPwd, {
            full_name: values.full_name,
            role: "collector"
          });
          if (!data.user || !data.user.id) throw new Error("Account could not be created.");
          var cols = await D.request("/rest/v1/collectors?select=id&user_id=eq." + data.user.id);
          if (!cols.length) {
            throw new Error("That email already belongs to an existing account.");
          }
        }
      }).then(function () {
        window.EcoWasteUI.toast("Collector created. One-time password: " + tempPwd, "success");
        load();
      }).catch(function (err) {
        if (err && err.message === "closed") return;
        window.EcoWasteUI.toast(err.message, "error");
      });
    });
  }

  load().catch(function (err) {
    console.error("EcoWaste collectors data failed to load:", err);
  });
})();
</script>



