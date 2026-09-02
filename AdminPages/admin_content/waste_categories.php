<!-- Waste Categories view - loaded via admin_app.php -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-md mb-xl">
<div>
<h2 class="font-display-lg text-display-lg text-on-surface">Waste Categories</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">Manage waste classification types and their disposal guidelines.</p>
</div>
<button id="add-category-btn" class="bg-primary text-on-primary font-title-md text-title-md px-lg py-sm rounded-DEFAULT flex items-center gap-sm hover:bg-surface-tint transition-colors shadow-sm self-start sm:self-auto" type="button">
<span class="material-symbols-outlined text-[20px]">add</span>
Add New Category
</button>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-lg mb-xl">
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-lg shadow-card relative overflow-hidden group">
<div class="absolute top-0 right-0 p-lg text-primary/10 group-hover:scale-110 transition-transform duration-300">
<span class="material-symbols-outlined text-[64px]">category</span>
</div>
<p class="font-title-md text-title-md text-on-surface-variant mb-xs relative z-10">Total Categories</p>
<div class="flex items-end gap-sm relative z-10">
<span id="total-categories-value" class="font-display-lg text-display-lg text-on-surface">—</span>
</div>
</div>
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-lg shadow-card relative overflow-hidden group">
<div class="absolute top-0 right-0 p-lg text-secondary/10 group-hover:scale-110 transition-transform duration-300">
<span class="material-symbols-outlined text-[64px]">recycling</span>
</div>
<p class="font-title-md text-title-md text-on-surface-variant mb-xs relative z-10">Recyclable</p>
<div class="flex items-end gap-sm relative z-10">
<span id="recyclable-value" class="font-display-lg text-display-lg text-on-surface">—</span>
</div>
</div>
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-lg shadow-card relative overflow-hidden group">
<div class="absolute top-0 right-0 p-lg text-error/10 group-hover:scale-110 transition-transform duration-300">
<span class="material-symbols-outlined text-[64px]">warning</span>
</div>
<p class="font-title-md text-title-md text-on-surface-variant mb-xs relative z-10">Hazardous</p>
<div class="flex items-end gap-sm relative z-10">
<span id="hazardous-value" class="font-display-lg text-display-lg text-on-surface">—</span>
</div>
</div>
</div>
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-card flex flex-col overflow-hidden">
<div id="category-toolbar" class="p-md border-b border-outline-variant flex flex-col sm:flex-row justify-between items-center gap-md bg-surface-container-low/50">
<div class="relative w-full sm:w-72">
<span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">search</span>
<input id="category-search" class="w-full pl-xl pr-sm py-2 rounded-DEFAULT border border-outline-variant bg-surface-container-lowest text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 font-body-sm text-body-sm" placeholder="Search categories..." type="text"/>
</div>
<div class="flex items-center gap-sm w-full sm:w-auto">
<select id="category-type-filter" class="bg-surface-container-lowest border border-outline-variant rounded-DEFAULT px-md py-2 font-body-sm text-body-sm text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary cursor-pointer">
<option value="">All Types</option>
<option value="Recyclable">Recyclable</option>
<option value="Compostable">Compostable</option>
<option value="Landfill">Landfill</option>
<option value="Hazardous">Hazardous</option>
</select>
<select id="category-status-filter" class="bg-surface-container-lowest border border-outline-variant rounded-DEFAULT px-md py-2 font-body-sm text-body-sm text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary cursor-pointer">
<option value="">All Statuses</option>
<option value="Active">Active</option>
<option value="Inactive">Inactive</option>
</select>
<button id="export-categories-btn" class="flex-1 sm:flex-none flex items-center justify-center gap-sm px-md py-2 border border-outline-variant rounded-DEFAULT text-on-surface hover:bg-surface-container transition-colors font-title-md text-title-md">
<span class="material-symbols-outlined text-[18px]">download</span>
                    Export
                </button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse min-w-[800px]">
<thead>
<tr class="bg-surface-container-low border-b border-outline-variant">
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md">Category Name</th>
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md">Type</th>
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md">Disposal Method</th>
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md">Status</th>
<th class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider py-sm px-md text-right">Actions</th>
</tr>
</thead>
<tbody id="category-tbody" class="divide-y divide-outline-variant/50">
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md font-title-md text-title-md text-on-surface">General Waste</td>
<td class="py-sm px-md"><span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-surface-variant text-on-surface-variant font-label-md text-label-md">Landfill</span></td>
<td class="py-sm px-md text-on-surface-variant">Standard collection</td>
<td class="py-sm px-md"><span class="inline-flex items-center px-2 py-0.5 rounded-full bg-status-success text-status-success-text font-label-md text-[11px] font-bold">Active</span></td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md font-title-md text-title-md text-on-surface">Organic</td>
<td class="py-sm px-md"><span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-status-onroute text-status-onroute-text font-label-md text-label-md">Compostable</span></td>
<td class="py-sm px-md text-on-surface-variant">Composting facility</td>
<td class="py-sm px-md"><span class="inline-flex items-center px-2 py-0.5 rounded-full bg-status-success text-status-success-text font-label-md text-[11px] font-bold">Active</span></td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md font-title-md text-title-md text-on-surface">Plastic</td>
<td class="py-sm px-md"><span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-secondary-fixed text-primary font-label-md text-label-md">Recyclable</span></td>
<td class="py-sm px-md text-on-surface-variant">Sorting & recycling</td>
<td class="py-sm px-md"><span class="inline-flex items-center px-2 py-0.5 rounded-full bg-status-success text-status-success-text font-label-md text-[11px] font-bold">Active</span></td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md font-title-md text-title-md text-on-surface">Paper</td>
<td class="py-sm px-md"><span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-secondary-fixed text-primary font-label-md text-label-md">Recyclable</span></td>
<td class="py-sm px-md text-on-surface-variant">Pulping & recycling</td>
<td class="py-sm px-md"><span class="inline-flex items-center px-2 py-0.5 rounded-full bg-status-success text-status-success-text font-label-md text-[11px] font-bold">Active</span></td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md font-title-md text-title-md text-on-surface">Metal</td>
<td class="py-sm px-md"><span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-secondary-fixed text-primary font-label-md text-label-md">Recyclable</span></td>
<td class="py-sm px-md text-on-surface-variant">Smelting & reforming</td>
<td class="py-sm px-md"><span class="inline-flex items-center px-2 py-0.5 rounded-full bg-status-success text-status-success-text font-label-md text-[11px] font-bold">Active</span></td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md font-title-md text-title-md text-on-surface">Glass</td>
<td class="py-sm px-md"><span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-secondary-fixed text-primary font-label-md text-label-md">Recyclable</span></td>
<td class="py-sm px-md text-on-surface-variant">Crushing & melting</td>
<td class="py-sm px-md"><span class="inline-flex items-center px-2 py-0.5 rounded-full bg-status-success text-status-success-text font-label-md text-[11px] font-bold">Active</span></td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md font-title-md text-title-md text-on-surface">E-Waste</td>
<td class="py-sm px-md"><span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-error-container text-on-error-container font-label-md text-label-md">Hazardous</span></td>
<td class="py-sm px-md text-on-surface-variant">Specialized facility</td>
<td class="py-sm px-md"><span class="inline-flex items-center px-2 py-0.5 rounded-full bg-status-success text-status-success-text font-label-md text-[11px] font-bold">Active</span></td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest/50 transition-colors group">
<td class="py-sm px-md font-title-md text-title-md text-on-surface">Batteries</td>
<td class="py-sm px-md"><span class="inline-flex items-center gap-xs px-2 py-1 rounded-full bg-error-container text-on-error-container font-label-md text-label-md">Hazardous</span></td>
<td class="py-sm px-md text-on-surface-variant">Chemical recovery</td>
<td class="py-sm px-md"><span class="inline-flex items-center px-2 py-0.5 rounded-full bg-status-success text-status-success-text font-label-md text-[11px] font-bold">Active</span></td>
<td class="py-sm px-md text-right">
<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<div class="p-md border-t border-outline-variant flex items-center justify-between text-body-sm text-on-surface-variant bg-surface-container-low/30">
<div id="category-count">Showing 0 entries</div>
<div id="category-pagination" class="flex gap-xs"></div>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  var TYPE_BADGE = {
    "Landfill": "bg-surface-variant text-on-surface-variant",
    "Compostable": "bg-status-onroute text-status-onroute-text",
    "Recyclable": "bg-secondary-fixed text-primary",
    "Hazardous": "bg-error-container text-on-error-container"
  };

  function setText(id, value) {
    var el = document.getElementById(id);
    if (el) el.textContent = value;
  }

var allCats = [];
  var searchTerm = "";
  var typeFilter = "";
  var statusFilter = "";
  var catPage = 1;

  async function load() {
    allCats = await D.list("waste_categories", "id,name,type,disposal_method,status", "name.asc");
    setText("total-categories-value", D.fmtNum(allCats.length));
    setText("recyclable-value", D.fmtNum(allCats.filter(function (c) { return c.type === "Recyclable"; }).length));
    setText("hazardous-value", D.fmtNum(allCats.filter(function (c) { return c.type === "Hazardous"; }).length));
    render();
  }

  function filtered() {
    return window.EcoWasteUI.filterList(allCats, searchTerm, ["name", "disposal_method"], {
      type: typeFilter,
      status: statusFilter
    });
  }

  function render() {
    var cats = filtered();
    var tbody = document.getElementById("category-tbody");
    if (!tbody) return;
    var page = window.EcoWasteUI.paginate(cats, catPage, 10);
    if (!page.rows.length) {
      tbody.innerHTML = '<tr><td class="py-sm px-md text-on-surface-variant" colspan="5">No waste categories yet.</td></tr>';
    } else {
      tbody.innerHTML = "";
      page.rows.forEach(function (c) {
        var badge = TYPE_BADGE[c.type] || "bg-surface-variant text-on-surface-variant";
        var active = c.status !== "Inactive";
        var statusBadge = active ? 'bg-status-success text-status-success-text' : 'bg-surface-variant text-on-surface-variant';
        var tr = document.createElement("tr");
        tr.className = "hover:bg-surface-container-lowest/50 transition-colors group";
        tr.innerHTML =
          '<td class="py-sm px-md font-title-md text-title-md text-on-surface">' + D.esc(c.name) + '</td>' +
          '<td class="py-sm px-md"><span class="inline-flex items-center gap-xs px-2 py-1 rounded-full font-label-md text-label-md ' + badge + '">' + D.esc(c.type) + '</span></td>' +
          '<td class="py-sm px-md text-on-surface-variant">' + D.esc(c.disposal_method || "—") + '</td>' +
          '<td class="py-sm px-md"><span class="inline-flex items-center px-2 py-0.5 rounded-full font-label-md text-[11px] font-bold ' + statusBadge + '">' + (active ? "Active" : "Inactive") + '</span></td>' +
          '<td class="py-sm px-md text-right whitespace-nowrap">' +
            '<button class="text-on-surface-variant hover:text-primary p-1 rounded transition-colors" data-action="edit" data-id="' + c.id + '" title="Edit"><span class="material-symbols-outlined text-[20px]">edit</span></button>' +
            '<button class="text-on-surface-variant hover:text-error p-1 rounded transition-colors" data-action="delete" data-id="' + c.id + '" title="Delete"><span class="material-symbols-outlined text-[20px]">delete</span></button>' +
          '</td>';
        tbody.appendChild(tr);
      });
    }
    var count = document.getElementById("category-count");
    if (count) {
      count.textContent = page.total ? "Showing " + page.start + " to " + page.end + " of " + page.total + " entries" : "Showing 0 entries";
    }
    var nav = document.getElementById("category-pagination");
    if (nav) {
      window.EcoWasteUI.paginateButtons(nav, { page: page.page, pages: page.pages, onPage: function (p) { catPage = p; render(); } });
    }
  }

  var exportBtn = document.getElementById("export-categories-btn");
  if (exportBtn) {
    exportBtn.addEventListener("click", function () {
      var rows = filtered().map(function (c) {
        return {
          name: c.name || "",
          type: c.type || "",
          disposal_method: c.disposal_method || "",
          status: c.status || ""
        };
      });
      D.exportCSV("ecowaste_waste_categories.csv", ["name", "type", "disposal_method", "status"], rows);
    });
  }

  var tbody = document.getElementById("category-tbody");
  if (tbody) {
    tbody.addEventListener("click", async function (e) {
      var btn = e.target.closest("button[data-action]");
      if (!btn) return;
      var id = btn.getAttribute("data-id");
      var cat = null;
      for (var i = 0; i < allCats.length; i++) {
        if (allCats[i].id === id) { cat = allCats[i]; break; }
      }
      if (btn.getAttribute("data-action") === "edit" && cat) {
        try {
          await window.EcoWasteUI.openModal({
            title: "Edit Category",
            submitLabel: "Save Changes",
            fields: [
              { name: "name", label: "Category Name", required: true, value: cat.name },
              { name: "type", label: "Type", type: "select", required: true, value: cat.type,
                options: [
                  { label: "Landfill", value: "Landfill" },
                  { label: "Compostable", value: "Compostable" },
                  { label: "Recyclable", value: "Recyclable" },
                  { label: "Hazardous", value: "Hazardous" }
                ] },
              { name: "disposal_method", label: "Disposal Method", value: cat.disposal_method || "", placeholder: "e.g. Sorting & recycling" },
              { name: "status", label: "Status", type: "select", required: true, value: cat.status,
                options: [
                  { label: "Active", value: "Active" },
                  { label: "Inactive", value: "Inactive" }
                ] }
            ],
            onSubmit: function (values) {
              return D.update("waste_categories", "id=eq." + id, values);
            }
          });
          window.EcoWasteUI.toast("Category updated.", "success");
          load();
        } catch (err) {
          if (err && err.message === "closed") return;
          window.EcoWasteUI.toast(err.message, "error");
        }
      } else if (btn.getAttribute("data-action") === "delete" && cat) {
        var ok = await window.EcoWasteUI.confirm({
          title: "Delete category?",
          message: "Are you sure you want to delete \"" + cat.name + "\"? This cannot be undone.",
          danger: true,
          confirmLabel: "Delete"
        });
        if (!ok) return;
        try {
          await D.remove("waste_categories", "id=eq." + id);
          window.EcoWasteUI.toast("Category deleted.", "success");
          load();
        } catch (err) {
          window.EcoWasteUI.toast(err.message, "error");
        }
      }
    });
  }

  var searchEl = document.getElementById("category-search");
  var typeFilterEl = document.getElementById("category-type-filter");
  var statusFilterEl = document.getElementById("category-status-filter");
if (searchEl) searchEl.addEventListener("input", function () { searchTerm = this.value; catPage = 1; render(); });
  if (typeFilterEl) typeFilterEl.addEventListener("change", function () { typeFilter = this.value; catPage = 1; render(); });
  if (statusFilterEl) statusFilterEl.addEventListener("change", function () { statusFilter = this.value; catPage = 1; render(); });

  var addBtn = document.getElementById("add-category-btn");
  if (addBtn) {
    addBtn.addEventListener("click", function () {
      window.EcoWasteUI.openModal({
        title: "Add New Category",
        submitLabel: "Create Category",
        fields: [
          { name: "name", label: "Category Name", required: true, placeholder: "e.g. Textiles" },
          { name: "type", label: "Type", type: "select", required: true, value: "Recyclable",
            options: [
              { label: "Landfill", value: "Landfill" },
              { label: "Compostable", value: "Compostable" },
              { label: "Recyclable", value: "Recyclable" },
              { label: "Hazardous", value: "Hazardous" }
            ] },
          { name: "disposal_method", label: "Disposal Method", placeholder: "e.g. Sorting & recycling" },
          { name: "status", label: "Status", type: "select", required: true, value: "Active",
            options: [
              { label: "Active", value: "Active" },
              { label: "Inactive", value: "Inactive" }
            ] }
        ],
        onSubmit: function (values) {
          return D.add("waste_categories", values);
        }
      }).then(function () {
        window.EcoWasteUI.toast("Category created.", "success");
        load();
      }).catch(function (err) {
        if (err && err.message === "closed") return;
        window.EcoWasteUI.toast(err.message, "error");
      });
    });
  }

  load().catch(function (err) {
    console.error("EcoWaste categories data failed to load:", err);
  });
})();
</script>



