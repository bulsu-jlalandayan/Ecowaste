<!-- My Records view - loaded via collector_content.php -->
<div class="mb-stack-lg flex flex-col sm:flex-row sm:items-center sm:justify-between gap-stack-md">
    <div>
        <h2 class="font-headline-lg text-headline-lg text-on-background mb-1">My Records</h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant">View and edit the waste records you have saved.</p>
    </div>
    <button id="new-record-btn" class="inline-flex items-center gap-2 bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md px-5 py-3 rounded-lg shadow-sm transition-colors">
        <span class="material-symbols-outlined text-[18px]">add</span>
        New Record
    </button>
</div>
<div class="bg-surface-container-lowest border border-border-subtle rounded-xl overflow-hidden">
    <div class="overflow-x-auto table-scroll">
        <table class="w-full min-w-[820px] text-left border-collapse">
            <thead class="sticky top-0 z-10">
                <tr class="bg-surface-container-low border-b border-border-subtle">
                    <th class="py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Log ID</th>
                    <th class="py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Date &amp; Time</th>
                    <th class="py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Material</th>
                    <th class="py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Quantity</th>
                    <th class="py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Status</th>
                    <th class="py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap">Proof</th>
                    <th class="py-3 px-3 sm:px-4 font-label-sm text-label-sm text-on-surface-variant whitespace-nowrap text-right">Actions</th>
                </tr>
            </thead>
            <tbody id="records-tbody" class="font-body-sm text-body-sm text-on-surface divide-y divide-border-subtle"></tbody>
        </table>
    </div>
    <div class="px-4 py-3 border-t border-border-subtle bg-surface-container-lowest flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
        <span id="records-count" class="font-body-sm text-body-sm text-on-surface-variant whitespace-nowrap">Showing 0 entries</span>
        <div id="records-pagination" class="flex items-center gap-2"></div>
    </div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  var UI = window.EcoWasteUI;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var uid = D.currentUserId();
  var allRecords = [];
  var page = 1;
  var PAGE_SIZE = 10;

  var STATUS_CHIP = {
    "In Process": "bg-blue-100 text-blue-800",
    Completed: "bg-emerald-100 text-emerald-800"
  };

  function chip(status) {
    return STATUS_CHIP[status] || "bg-surface-container-high text-on-surface-variant";
  }

  function buildRow(r) {
    var tr = document.createElement("tr");
    tr.className = "hover:bg-surface-bright transition-colors";
    tr.innerHTML =
      '<td class="py-4 px-3 sm:px-4 font-mono-md text-primary">#' + D.esc(r.log_number) + '</td>' +
      '<td class="py-4 px-3 sm:px-4 text-on-surface-variant whitespace-nowrap">' + D.esc(D.fmtDate(r.recorded_at)) + '</td>' +
      '<td class="py-4 px-3 sm:px-4">' + D.esc(r.material_type || "—") + '</td>' +
      '<td class="py-4 px-3 sm:px-4 font-semibold whitespace-nowrap">' + D.esc(D.fmtNum(r.weight_kg)) + ' ' + D.esc(r.unit || "kg") + '</td>' +
      '<td class="py-4 px-3 sm:px-4"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold ' + chip(r.collection_status) + '">' + D.esc(r.collection_status || "—") + '</span></td>' +
      '<td class="py-4 px-3 sm:px-4">' + (r.proof_url
        ? '<img src="' + D.esc(r.proof_url) + '" class="w-10 h-10 object-cover rounded-lg border border-border-subtle cursor-pointer" data-action="view" data-id="' + r.id + '" alt="Proof"/>'
        : '<span class="text-on-surface-variant">—</span>') + '</td>' +
      '<td class="py-4 px-3 sm:px-4 text-right whitespace-nowrap">' +
      '<button class="text-on-surface-variant hover:text-on-surface transition-colors font-label-md text-label-md mr-3" data-action="view" data-id="' + r.id + '">View</button>' +
      '<button class="text-primary hover:underline font-label-md text-label-md" data-action="edit" data-id="' + r.id + '">Edit</button>' +
      '</td>';
    return tr;
  }

  function openRecord(r) {
    var overlay = document.createElement("div");
    overlay.className = "fixed inset-0 z-[60] flex items-center justify-center p-4";
    var kv = function (label, value) {
      return '<div><div class="font-label-sm text-label-sm text-on-surface-variant uppercase mb-1">' + D.esc(label) + '</div>' +
        '<div class="font-body-md text-body-md text-on-surface">' + value + '</div></div>';
    };
    overlay.innerHTML =
      '<div class="absolute inset-0 bg-black/40" data-close></div>' +
      '<div class="relative bg-surface-container-lowest border border-border-subtle rounded-xl shadow-2xl w-full max-w-md overflow-hidden">' +
      '<div class="flex items-center justify-between px-6 py-4 border-b border-border-subtle">' +
      '<h3 class="font-headline-md text-headline-md text-on-surface">#' + D.esc(r.log_number) + '</h3>' +
      '<button type="button" data-close class="text-on-surface-variant hover:text-on-surface transition-colors p-1"><span class="material-symbols-outlined">close</span></button>' +
      '</div>' +
      '<div class="p-6 space-y-4">' +
      (r.proof_url ? '<img src="' + D.esc(r.proof_url) + '" class="w-full max-h-56 object-cover rounded-lg border border-border-subtle" alt="Proof photo"/>' : '') +
      '<div class="grid grid-cols-2 gap-4">' +
      kv("Date & Time", D.esc(D.fmtDate(r.recorded_at))) +
      kv("Material", D.esc(r.material_type || "—")) +
      kv("Quantity", D.esc(D.fmtNum(r.weight_kg)) + " " + D.esc(r.unit || "kg")) +
      kv("Collection Status", '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold ' + chip(r.collection_status) + '">' + D.esc(r.collection_status || "—") + '</span>') +
      '</div>' +
      (r.notes ? '<div><div class="font-label-sm text-label-sm text-on-surface-variant uppercase mb-1">Notes</div><p class="font-body-sm text-body-sm text-on-surface-variant">' + D.esc(r.notes) + '</p></div>' : '') +
      '</div>' +
      '<div class="flex justify-end gap-3 px-6 py-4 border-t border-border-subtle bg-surface-container-low/50">' +
      '<button type="button" data-close class="px-4 py-2 rounded-lg border border-border-subtle text-on-surface font-body-md text-body-md hover:bg-surface-container transition-colors">Close</button>' +
      '<button type="button" data-edit class="px-4 py-2 rounded-lg bg-primary text-on-primary font-body-md text-body-md font-semibold hover:bg-primary-container transition-colors">Edit Record</button>' +
      '</div></div>';
    document.body.appendChild(overlay);
    overlay.querySelectorAll("[data-close]").forEach(function (el) {
      el.addEventListener("click", function () { overlay.remove(); });
    });
    overlay.querySelector("[data-edit]").addEventListener("click", function () {
      overlay.remove();
      editRecord(r);
    });
  }

  function editRecord(r) {
    window.EcoWasteAppState.editingRecordId = r.id;
    window.EcoWasteAppState.selectedRequestId = r.request_id || null;
    if (window.EcoWasteRouter) window.EcoWasteRouter.go("waste_records");
  }

  function newRecord() {
    window.EcoWasteAppState.editingRecordId = null;
    window.EcoWasteAppState.selectedRequestId = null;
    if (window.EcoWasteRouter) window.EcoWasteRouter.go("waste_records");
  }

  function render() {
    var tbody = document.getElementById("records-tbody");
    tbody.innerHTML = "";
    var pg = UI.paginate(allRecords, page, PAGE_SIZE);
    if (!pg.rows.length) {
      var tr = document.createElement("tr");
      tr.innerHTML = '<td colspan="7" class="py-12 text-center font-body-sm text-body-sm text-on-surface-variant">No waste records yet. Tap "New Record" to create one.</td>';
      tbody.appendChild(tr);
    } else {
      pg.rows.forEach(function (r) { tbody.appendChild(buildRow(r)); });
    }
    var count = document.getElementById("records-count");
    if (count) count.textContent = "Showing " + (allRecords.length ? pg.start + " to " + pg.end + " of " : "0 of ") + allRecords.length + " entries";
    UI.paginateButtons(document.getElementById("records-pagination"), {
      page: pg.page, pages: pg.pages, onPage: function (p) { page = p; render(); }
    });
  }

  function findRecord(id) {
    for (var i = 0; i < allRecords.length; i++) {
      if (allRecords[i].id === id) return allRecords[i];
    }
    return null;
  }

  var tbody = document.getElementById("records-tbody");
  tbody.addEventListener("click", function (e) {
    var el = e.target.closest("[data-action]");
    if (!el) return;
    var r = findRecord(el.getAttribute("data-id"));
    if (!r) return;
    if (el.getAttribute("data-action") === "edit") editRecord(r);
    else if (el.getAttribute("data-action") === "view") openRecord(r);
  });

  document.getElementById("new-record-btn").addEventListener("click", newRecord);

  async function load() {
    allRecords = await D.list("recycling_records",
      "id,log_number,recorded_at,material_type,weight_kg,unit,collection_status,proof_url,request_id,notes,status",
      "recorded_at.desc", "collector_id=eq." + uid);
    render();
  }

  load().catch(function (err) { console.error("EcoWaste records failed to load:", err); });
})();
</script>