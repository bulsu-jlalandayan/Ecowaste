<!-- Collection Requests view - loaded via admin_app.php -->
<!-- Canvas -->
<div class="flex-1 overflow-y-auto p-margin-desktop bg-background flex flex-col gap-lg">
<!-- Page Header & Global Actions -->
<div class="flex justify-between items-end">
<div>
<h2 class="font-display-lg text-display-lg font-bold text-on-surface">Collection Requests</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant mt-xs">Manage and assign incoming waste logistics.</p>
</div>
<div class="flex gap-sm">
<button class="flex items-center gap-xs px-lg py-2 bg-surface border border-outline-variant rounded text-on-surface font-title-md text-title-md hover:bg-surface-container-high transition-colors shadow-sm">
<span class="material-symbols-outlined text-[18px]">map</span>
                        Map View
                    </button>
</div>
</div>
<!-- Filters & Controls Bar -->
<div class="bg-surface border border-outline-variant rounded shadow-[0px_1px_3px_rgba(0,0,0,0.05)] p-md flex flex-wrap gap-md items-center justify-between">
<div class="flex items-center gap-md">
<label class="font-label-md text-label-md text-on-surface-variant">Search</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-2 top-1/2 -translate-y-1/2 text-on-surface-variant text-[18px]">search</span>
<input id="request-search" class="bg-surface-container-lowest border border-outline-variant rounded pl-9 pr-3 py-1.5 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary w-48" placeholder="Location or request #..." type="text"/>
</div>
</div>
<!-- Status Filter -->
<div class="flex flex-col gap-1">
<label class="font-label-md text-label-md text-on-surface-variant">Status</label>
<select id="request-status-filter" class="bg-surface-container-lowest border border-outline-variant rounded px-3 py-1.5 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary min-w-[150px]">
<option value="">All Statuses</option>
<option value="Unassigned">Unassigned</option>
<option value="Scheduled">Scheduled</option>
<option value="In Transit">In Transit</option>
<option value="Completed">Completed</option>
</select>
</div>
<!-- Waste Type Filter -->
<div class="flex flex-col gap-1">
<label class="font-label-md text-label-md text-on-surface-variant">Waste Type</label>
<select id="request-type-filter" class="bg-surface-container-lowest border border-outline-variant rounded px-3 py-1.5 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary min-w-[150px]">
<option value="">All Types</option>
<option value="General">General</option>
<option value="Recyclable">Recyclable</option>
<option value="Hazardous">Hazardous</option>
<option value="Organic">Organic</option>
</select>
</div>
</div>
</div>
<!-- Data Table Container -->
<div class="bg-surface border border-outline-variant rounded shadow-[0px_1px_3px_rgba(0,0,0,0.05)] overflow-hidden flex-1 flex flex-col">
<div class="overflow-x-auto flex-1">
<table class="w-full text-left border-collapse">
<thead class="bg-surface-container-low border-b border-outline-variant sticky top-0 z-10">
<tr>
<th class="p-sm pl-md font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Req ID</th>
<th class="p-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Location</th>
<th class="p-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Waste Type</th>
<th class="p-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Requested</th>
<th class="p-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Status</th>
<th class="p-sm font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Collector</th>
<th class="p-sm pr-md font-label-md text-label-md text-on-surface-variant uppercase tracking-wider text-right">Action</th>
</tr>
</thead>
<tbody id="request-tbody" class="font-body-md text-body-md text-on-surface">
</tbody>
</table>
</div>
<!-- Pagination Footer -->
<div class="p-sm px-md border-t border-outline-variant bg-surface-container-lowest flex items-center justify-between">
<span id="request-count" class="font-body-sm text-body-sm text-on-surface-variant">Showing 0 requests</span>
</div>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var STATUS_BADGE = {
    "Unassigned": "bg-error-container text-on-error-container border border-[#ffb4ab]",
    "Scheduled": "bg-secondary-fixed text-on-secondary-fixed border border-secondary-fixed-dim",
    "In Transit": "bg-surface-tint/10 text-surface-tint border border-surface-tint/20",
    "Completed": "bg-[#dcfce7] text-[#166534] border border-[#ceead6]"
  };

  var TYPE_ICON = {
    "Hazardous": "warning",
    "Recyclable": "recycling",
    "General": "delete",
    "Organic": "eco"
  };

  var allRequests = [];
  var searchTerm = "";
  var statusFilter = "";
  var typeFilter = "";

  async function load() {
    allRequests = await D.list("collection_requests",
      "id,request_number,location,zone,waste_type,status,requested_at,collector_name",
      "requested_at.desc");
    render();
  }

  function render() {
    var rows = window.EcoWasteUI.filterList(allRequests, searchTerm,
      ["location", "zone", "request_number"],
      { status: statusFilter, waste_type: typeFilter });
    var tbody = document.getElementById("request-tbody");
    if (!tbody) return;
    if (!rows.length) {
      tbody.innerHTML = '<tr><td class="p-sm pl-md pr-md text-on-surface-variant" colspan="7">No collection requests found.</td></tr>';
      return;
    }
    tbody.innerHTML = "";
    rows.forEach(function (r) {
      var badge = STATUS_BADGE[r.status] || "bg-surface-variant text-on-surface-variant";
      var icon = TYPE_ICON[r.waste_type] || "category";
      var collectorCell = "";
      var actionCell = "";
      if (r.status === "Unassigned" || !r.collector_name) {
        collectorCell = '<td class="p-sm text-on-surface-variant italic font-body-sm text-body-sm">Pending Allocation</td>';
        actionCell = '<button class="px-md py-1.5 bg-primary text-on-primary rounded font-title-md text-title-md hover:bg-primary-container hover:text-on-primary-container transition-colors shadow-sm" data-action="assign" data-id="' + r.id + '">Assign</button>';
      } else {
        var initials = D.esc(D.initials(r.collector_name));
        collectorCell = '<td class="p-sm"><div class="flex items-center gap-2">' +
          '<div class="w-6 h-6 rounded-full bg-surface-container-highest overflow-hidden flex items-center justify-center text-[10px] font-bold text-on-surface-variant">' + initials + '</div>' +
          '<span class="font-title-md text-title-md">' + D.esc(r.collector_name) + '</span>' +
          '</div></td>';
        actionCell = '<button class="p-1.5 text-on-surface-variant hover:text-primary transition-colors rounded hover:bg-surface-container-highest" data-action="menu" data-id="' + r.id + '"><span class="material-symbols-outlined text-[20px]">more_vert</span></button>';
      }
      var tr = document.createElement("tr");
      tr.className = "border-b border-surface-container-highest table-row-hover transition-colors";
      tr.innerHTML =
        '<td class="p-sm pl-md font-mono-md text-mono-md font-bold text-on-surface-variant">' + D.esc(r.request_number) + '</td>' +
        '<td class="p-sm">' +
          '<div class="font-title-md text-title-md">' + D.esc(r.location) + '</div>' +
          '<div class="font-body-sm text-body-sm text-on-surface-variant">' + D.esc(r.zone || "") + '</div>' +
        '</td>' +
        '<td class="p-sm"><span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-surface-container-high text-on-surface-variant font-label-md text-label-md">' +
          '<span class="material-symbols-outlined text-[14px]">' + icon + '</span>' + D.esc(r.waste_type) + '</span></td>' +
        '<td class="p-sm text-on-surface-variant">' + D.esc(D.fmtDate(r.requested_at)) + '</td>' +
        '<td class="p-sm"><span class="inline-flex px-2 py-1 rounded font-label-md text-label-md ' + badge + '">' + D.esc(r.status) + '</span></td>' +
        collectorCell +
        '<td class="p-sm pr-md text-right">' + actionCell + '</td>';
      tbody.appendChild(tr);
    });
    var count = document.getElementById("request-count");
    if (count) count.textContent = "Showing 1 to " + rows.length + " of " + rows.length + " requests";
  }

  function findRequest(id) {
    for (var i = 0; i < allRequests.length; i++) {
      if (allRequests[i].id === id) return allRequests[i];
    }
    return null;
  }

  function patchRequest(r, body, msg) {
    D.update("collection_requests", "id=eq." + r.id, body)
      .then(function () {
        if (msg) window.EcoWasteUI.toast(msg, "success");
        load();
      })
      .catch(function (err) { window.EcoWasteUI.toast(err.message, "error"); });
  }

  function openAssign(r) {
    D.list("collectors", "id,user_id,full_name", "full_name.asc")
      .then(function (cols) {
        if (!cols.length) {
          window.EcoWasteUI.toast("No collectors available yet.", "error");
          return;
        }
        var options = cols.map(function (c) {
          return { label: c.full_name, value: c.full_name + "|" + (c.user_id || "") };
        });
        return window.EcoWasteUI.openModal({
          title: "Assign Collector - " + r.request_number,
          submitLabel: "Assign",
          fields: [
            { name: "collector", label: "Collector", type: "select", required: true, options: options }
          ],
          onSubmit: function (values) {
            var parts = String(values.collector).split("|");
            return D.update("collection_requests", "id=eq." + r.id, {
              collector_name: parts[0],
              collector_id: parts[1] || null,
              status: "Scheduled"
            });
          }
        }).then(function () {
          window.EcoWasteUI.toast("Collector assigned.", "success");
          load();
        });
      })
      .catch(function (err) {
        if (err && err.message === "closed") return;
        window.EcoWasteUI.toast(err.message, "error");
      });
  }

  var tbody = document.getElementById("request-tbody");
  if (tbody) {
    tbody.addEventListener("click", function (e) {
      var btn = e.target.closest("button[data-action]");
      if (!btn) return;
      var r = findRequest(btn.getAttribute("data-id"));
      if (!r) return;
      if (btn.getAttribute("data-action") === "assign") { openAssign(r); return; }

      var items = [
        { label: "Reassign Collector", icon: "person_search", onClick: function () { openAssign(r); } }
      ];
      if (r.status === "Unassigned" || r.status === "Scheduled") {
        items.push({ label: "Set In Transit", icon: "local_shipping", onClick: function () { patchRequest(r, { status: "In Transit" }, "Request is now in transit."); } });
      }
      if (r.status !== "Completed") {
        items.push({ label: "Mark Completed", icon: "check_circle", onClick: function () { window.EcoWasteUI.confirm({
          title: "Mark as completed?",
          message: "Confirm " + r.request_number + " has been collected.",
          confirmLabel: "Complete"
        }).then(function (ok) {
          if (ok) patchRequest(r, { status: "Completed" }, "Request completed.");
        }); } });
      }
      if (r.status !== "Unassigned") {
        items.push("-");
        items.push({ label: "Reset to Unassigned", icon: "undo", onClick: function () { patchRequest(r, { status: "Unassigned", collector_name: null, collector_id: null }, "Request unassigned."); } });
      }
      items.push("-");
      items.push({ label: "Delete", icon: "delete", danger: true, onClick: function () {
        window.EcoWasteUI.confirm({
          title: "Delete request?",
          message: "Remove " + r.request_number + "? This cannot be undone.",
          danger: true,
          confirmLabel: "Delete"
        }).then(function (ok) {
          if (ok) {
            D.remove("collection_requests", "id=eq." + r.id)
              .then(function () { window.EcoWasteUI.toast("Request deleted.", "success"); load(); })
              .catch(function (err) { window.EcoWasteUI.toast(err.message, "error"); });
          }
        });
      } });
      window.EcoWasteUI.menu(btn, items);
    });
  }

  var searchEl = document.getElementById("request-search");
  var statusFilterEl = document.getElementById("request-status-filter");
  var typeFilterEl = document.getElementById("request-type-filter");
  if (searchEl) searchEl.addEventListener("input", function () { searchTerm = this.value; render(); });
  if (statusFilterEl) statusFilterEl.addEventListener("change", function () { statusFilter = this.value; render(); });
  if (typeFilterEl) typeFilterEl.addEventListener("change", function () { typeFilter = this.value; render(); });

  load().catch(function (err) {
    console.error("EcoWaste collection request data failed to load:", err);
  });
})();
</script>
