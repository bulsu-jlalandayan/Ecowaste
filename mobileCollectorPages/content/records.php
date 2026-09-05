<!-- Mobile My Records view -->
<div class="p-4 flex flex-col gap-4">
<div class="flex items-center justify-between gap-3">
<div>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-on-surface">My Records</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">View and edit saved waste records.</p>
</div>
</div>

<button id="new-record-btn" class="w-full inline-flex items-center justify-center gap-2 py-3.5 rounded-xl bg-gradient-to-r from-primary to-primary-container text-on-primary font-label-md text-label-md shadow-md shadow-primary/25 hover:opacity-90 active:scale-[0.99] transition-all" type="button">
<span class="material-symbols-outlined text-[20px]">add</span> New Record
</button>

<div id="records-list" class="flex flex-col gap-3"></div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  var UI = window.EcoWasteUI;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var uid = D.currentUserId();

  var STATUS_CHIP = {
    "In Process": "bg-blue-100 text-blue-800",
    Completed: "bg-emerald-100 text-emerald-800"
  };

  function openRecord(r) {
    var overlay = document.createElement("div");
    overlay.className = "fixed inset-0 z-[60] flex items-end sm:items-center justify-center p-0 sm:p-4";
    var kv = function (label, value) {
      return '<div><div class="font-label-sm text-label-sm text-on-surface-variant uppercase mb-1">' + D.esc(label) + '</div>' +
        '<div class="font-body-md text-body-md text-on-surface">' + value + '</div></div>';
    };
    overlay.innerHTML =
      '<div class="absolute inset-0 bg-black/40" data-close></div>' +
      '<div class="relative bg-surface-container-lowest border-t sm:border border-border-subtle sm:rounded-xl rounded-t-2xl shadow-2xl w-full sm:max-w-md max-h-[85vh] overflow-y-auto">' +
      '<div class="sticky top-0 flex items-center justify-between px-4 py-3.5 border-b border-border-subtle bg-surface-container-lowest">' +
      '<h3 class="font-headline-md text-headline-md text-on-surface">#' + D.esc(r.log_number) + '</h3>' +
      '<button type="button" data-close class="text-on-surface-variant hover:text-on-surface transition-colors p-1"><span class="material-symbols-outlined text-[22px]">close</span></button>' +
      '</div>' +
      '<div class="p-4 flex flex-col gap-4">' +
      (r.proof_url ? '<img src="' + D.esc(r.proof_url) + '" class="w-full max-h-56 object-cover rounded-xl border border-border-subtle" alt="Proof photo"/>' : '') +
      '<div class="grid grid-cols-2 gap-4">' +
      kv("Date & Time", D.esc(D.fmtDate(r.recorded_at))) +
      kv("Material", D.esc(r.material_type || "—")) +
      kv("Quantity", D.esc(D.fmtNum(r.weight_kg)) + " " + D.esc(r.unit || "kg")) +
      kv("Collection Status", '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold ' + (STATUS_CHIP[r.collection_status] || "bg-surface-container-high text-on-surface-variant") + '">' + D.esc(r.collection_status || "—") + '</span>') +
      '</div>' +
      (r.notes ? '<div><div class="font-label-sm text-label-sm text-on-surface-variant uppercase mb-1">Notes</div><p class="font-body-sm text-body-sm text-on-surface-variant">' + D.esc(r.notes) + '</p></div>' : '') +
      '</div>' +
      '<div class="flex gap-3 px-4 py-4 border-t border-border-subtle">' +
      '<button type="button" data-close class="flex-1 py-3 rounded-xl border-2 border-border-subtle text-on-surface font-label-md text-label-md hover:bg-surface-container-low transition-colors">Close</button>' +
      '<button type="button" data-edit class="flex-1 py-3 rounded-xl bg-gradient-to-r from-primary to-primary-container text-on-primary font-label-md text-label-md shadow-md shadow-primary/25">Edit Record</button>' +
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

  function buildCard(r) {
    var card = document.createElement("div");
    card.className = "bg-surface-container-lowest border border-border-subtle rounded-xl p-4";
    card.innerHTML =
      '<div class="flex items-center justify-between gap-2">' +
      '<span class="font-label-md text-label-md text-primary">#' + D.esc(r.log_number) + '</span>' +
      '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold ' + (STATUS_CHIP[r.collection_status] || "bg-surface-container-high text-on-surface-variant") + '">' + D.esc(r.collection_status || "—") + '</span>' +
      '</div>' +
      '<div class="flex items-center gap-2 mt-3">' +
      (r.proof_url ? '<img src="' + D.esc(r.proof_url) + '" class="w-12 h-12 rounded-xl object-cover border border-border-subtle shrink-0" alt="Proof"/>' : '<div class="w-12 h-12 rounded-xl bg-surface-container-high flex items-center justify-center text-on-surface-variant shrink-0"><span class="material-symbols-outlined text-[20px]">delete_sweep</span></div>') +
      '<div class="min-w-0">' +
      '<p class="font-body-md text-body-md text-on-surface truncate">' + D.esc(r.material_type || "General") + '</p>' +
      '<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">' + D.esc(D.fmtNum(r.weight_kg)) + ' ' + D.esc(r.unit || "kg") + " • " + D.esc(D.fmtDate(r.recorded_at)) + '</p>' +
      '</div></div>' +
      '<div class="flex gap-2 mt-3">' +
      '<button type="button" data-action="view" data-id="' + r.id + '" class="flex-1 py-2.5 rounded-xl border-2 border-border-subtle text-on-surface font-label-md text-label-md hover:bg-surface-container-low transition-colors">View</button>' +
      '<button type="button" data-action="edit" data-id="' + r.id + '" class="flex-1 py-2.5 rounded-xl bg-primary text-on-primary font-label-md text-label-md shadow-sm shadow-primary/20">Edit</button>' +
      '</div>';
    return card;
  }

  function render(rows) {
    var host = document.getElementById("records-list");
    host.innerHTML = "";
    if (!rows.length) {
      host.innerHTML = '<div class="bg-surface-container-lowest border border-border-subtle rounded-xl p-8 text-center">' +
        '<span class="material-symbols-outlined text-[40px] text-on-surface-variant opacity-50">inventory_2</span>' +
        '<p class="font-body-md text-body-md text-on-surface-variant mt-3">No waste records yet. Tap "New Record" to create one.</p></div>';
      return;
    }
    rows.forEach(function (r) {
      var card = buildCard(r);
      host.appendChild(card);
    });
  }

  document.getElementById("records-list").addEventListener("click", function (e) {
    var el = e.target.closest("[data-action]");
    if (!el) return;
    var r = allRecords.filter(function (x) { return x.id === el.getAttribute("data-id"); })[0];
    if (!r) return;
    if (el.getAttribute("data-action") === "edit") editRecord(r);
    else if (el.getAttribute("data-action") === "view") openRecord(r);
  });

  document.getElementById("new-record-btn").addEventListener("click", newRecord);

  var allRecords = [];
  async function load() {
    allRecords = await D.list("recycling_records",
      "id,log_number,recorded_at,material_type,weight_kg,unit,collection_status,proof_url,request_id,notes,status",
      "recorded_at.desc", "collector_id=eq." + uid);
    render(allRecords);
  }

  load().catch(function (err) { console.error("EcoWaste records failed to load:", err); });
})();
</script>