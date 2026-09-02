<!-- Users view - loaded via admin_app.php -->
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-md mb-xl">
<div>
<h2 class="font-display-lg text-display-lg text-on-surface mb-xs">User Management</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Manage residents, collectors, and system access.</p>
</div>
<div class="flex items-center gap-sm">
<button id="export-users-btn" class="px-md py-sm bg-surface-container-lowest border border-outline-variant rounded-DEFAULT font-title-md text-title-md text-on-surface-variant hover:bg-surface-container-highest transition-colors flex items-center gap-xs shadow-sm">
<span class="material-symbols-outlined text-[18px]">download</span>
                    Export
                </button>
<button id="add-user-btn" class="px-md py-sm bg-primary rounded-DEFAULT font-title-md text-title-md text-on-primary hover:bg-primary/90 transition-colors flex items-center gap-xs shadow-sm" type="button">
<span class="material-symbols-outlined text-[18px]">add</span>
                    Add New User
                </button>
</div>
</div>
<!-- Content Area - Card Container -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl shadow-card overflow-hidden">
<!-- Toolbar / Filters -->
<div class="p-lg border-b border-outline-variant bg-surface flex flex-col sm:flex-row justify-between items-start sm:items-center gap-md">
<!-- Tabs -->
<div class="flex bg-surface-container-high rounded-lg p-xs">
<button class="px-md py-xs rounded bg-surface-container-lowest shadow-sm font-title-md text-title-md text-primary" data-role-filter="" type="button">All</button>
<button class="px-md py-xs rounded font-title-md text-title-md text-on-surface-variant hover:text-on-surface transition-colors" data-role-filter="resident" type="button">Residents</button>
<button class="px-md py-xs rounded font-title-md text-title-md text-on-surface-variant hover:text-on-surface transition-colors" data-role-filter="collector" type="button">Collectors</button>
</div>
<!-- Filter Actions -->
<div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-sm">
<div class="relative">
<span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px] pointer-events-none">search</span>
<input id="user-search" class="w-full sm:w-56 pl-xl pr-sm py-2 bg-surface-container-lowest border border-outline-variant rounded-DEFAULT font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="Search users..." type="text"/>
</div>
<div class="relative">
<select id="user-status-filter" class="appearance-none pl-md pr-xl py-2 bg-surface-container-lowest border border-outline-variant rounded-DEFAULT font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all cursor-pointer">
<option value="">Status: All</option>
<option value="Active">Active</option>
<option value="Inactive">Inactive</option>
</select>
<span class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none text-[20px]">arrow_drop_down</span>
</div>
<button class="p-sm bg-surface-container-lowest border border-outline-variant rounded-DEFAULT text-on-surface-variant hover:bg-surface-container-highest transition-colors">
<span class="material-symbols-outlined text-[20px]">filter_list</span>
</button>
</div>
</div>
<!-- Data Table -->
<div class="overflow-x-auto table-scroll">
<table class="w-full text-left border-collapse min-w-[800px]">
<thead>
<tr class="bg-status-tableheader border-b border-outline-variant font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">
<th class="p-sm pl-lg w-[300px]">User</th>
<th class="p-sm w-[150px]">Role</th>
<th class="p-sm w-[150px]">Status</th>
<th class="p-sm w-[200px]">Last Activity</th>
<th class="p-sm pr-lg w-[100px] text-right">Actions</th>
</tr>
</thead>
<tbody id="user-tbody" class="font-body-md text-body-md text-on-surface divide-y divide-outline-variant/50">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="p-sm pl-lg py-sm">
<div class="flex items-center gap-md">
<div class="w-10 h-10 rounded-full bg-secondary-fixed text-on-secondary-fixed flex items-center justify-center font-title-md">
                                            JD
                                        </div>
<div>
<div class="font-title-md text-title-md">Jane Doe</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">jane.doe@example.com</div>
</div>
</div>
</td>
<td class="p-sm">Resident</td>
<td class="p-sm">
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-status-success text-status-success-text font-label-md text-[11px] font-bold">Active</span>
</td>
<td class="p-sm text-on-surface-variant">Today, 10:24 AM</td>
<td class="p-sm pr-lg text-right">
<button class="p-xs text-on-surface-variant hover:text-primary transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100" title="Edit">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
<button class="p-xs text-on-surface-variant hover:text-error transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100" title="More">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="p-sm pl-lg py-sm">
<div class="flex items-center gap-md">
<div class="w-10 h-10 rounded-full bg-surface-variant text-on-surface flex items-center justify-center font-title-md">
                                            MS
                                        </div>
<div>
<div class="font-title-md text-title-md">Michael Smith</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">m.smith@logistics.com</div>
</div>
</div>
</td>
<td class="p-sm">Collector</td>
<td class="p-sm">
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-status-success text-status-success-text font-label-md text-[11px] font-bold">Active</span>
</td>
<td class="p-sm text-on-surface-variant">Yesterday, 4:30 PM</td>
<td class="p-sm pr-lg text-right">
<button class="p-xs text-on-surface-variant hover:text-primary transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
<button class="p-xs text-on-surface-variant hover:text-error transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="p-sm pl-lg py-sm">
<div class="flex items-center gap-md">
<div class="w-10 h-10 rounded-full bg-surface-variant text-on-surface flex items-center justify-center font-title-md">
                                            AJ
                                        </div>
<div>
<div class="font-title-md text-title-md">Alex Johnson</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">alex.j@example.com</div>
</div>
</div>
</td>
<td class="p-sm">Resident</td>
<td class="p-sm">
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-surface-variant text-on-surface-variant font-label-md text-[11px] font-bold">Inactive</span>
</td>
<td class="p-sm text-on-surface-variant">Oct 12, 2023</td>
<td class="p-sm pr-lg text-right">
<button class="p-xs text-on-surface-variant hover:text-primary transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
<button class="p-xs text-on-surface-variant hover:text-error transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100">
<span class="material-symbols-outlined text-[20px]">more_vert</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="p-md border-t border-outline-variant bg-surface flex justify-between items-center">
<p id="user-count" class="font-body-sm text-body-sm text-on-surface-variant">Showing 0 users</p>
<div id="user-pagination" class="flex gap-xs"></div>
</div>
</div>
<script>
(function () {
  "use strict";
  var D = window.EcoWasteData;
  if (!D || !localStorage.getItem("sb-access-token")) return;

  function roleLabel(role) {
    if (role === "collector") return "Collector";
    if (role === "admin") return "Administrator";
    return "Resident";
  }

var allUsers = [];
  var searchTerm = "";
  var roleFilter = "";
  var statusFilter = "";
  var userPage = 1;

  async function load() {
    allUsers = await D.list("profiles", "id,full_name,email,role,status,last_active_at", "created_at.desc");
    renderUsers();
  }

  var incomingTerm = sessionStorage.getItem("eco_search_term");
  if (incomingTerm) {
    searchTerm = incomingTerm;
    sessionStorage.removeItem("eco_search_term");
  }

  function filtered() {
    return window.EcoWasteUI.filterList(allUsers, searchTerm, ["full_name", "email"], {
      role: roleFilter,
      status: statusFilter
    });
  }

  function renderUsers() {
    var users = filtered();
    var tbody = document.getElementById("user-tbody");
    if (!tbody) return;
    var page = window.EcoWasteUI.paginate(users, userPage, 10);
    if (!page.rows.length) {
      tbody.innerHTML = '<tr><td class="p-sm pl-lg py-sm text-on-surface-variant" colspan="5">No users found.</td></tr>';
    } else {
      tbody.innerHTML = "";
      page.rows.forEach(function (u) {
        var fullName = u.full_name || "Unknown User";
        var email = u.email || "";
        var initials = D.esc(D.initials(fullName));
        var active = u.status !== "Inactive";
        var badge = active
          ? 'bg-status-success text-status-success-text'
          : 'bg-surface-variant text-on-surface-variant';
        var tr = document.createElement("tr");
        tr.className = "hover:bg-surface-container-low transition-colors group";
        tr.innerHTML =
          '<td class="p-sm pl-lg py-sm">' +
            '<div class="flex items-center gap-md">' +
              '<div class="w-10 h-10 rounded-full bg-secondary-fixed text-on-secondary-fixed flex items-center justify-center font-title-md">' + initials + '</div>' +
              '<div>' +
                '<div class="font-title-md text-title-md">' + D.esc(fullName) + '</div>' +
                '<div class="font-body-sm text-body-sm text-on-surface-variant">' + D.esc(email) + '</div>' +
              '</div>' +
            '</div>' +
          '</td>' +
          '<td class="p-sm">' + roleLabel(u.role) + '</td>' +
          '<td class="p-sm"><span class="inline-flex items-center px-2 py-0.5 rounded-full font-label-md text-[11px] font-bold ' + badge + '">' + (active ? "Active" : "Inactive") + '</span></td>' +
          '<td class="p-sm text-on-surface-variant">' + D.esc(u.last_active_at ? D.fmtDate(u.last_active_at) : "Never") + '</td>' +
          '<td class="p-sm pr-lg text-right whitespace-nowrap">' +
            '<button class="p-xs text-on-surface-variant hover:text-primary transition-colors" data-action="edit" data-id="' + u.id + '" title="Edit"><span class="material-symbols-outlined text-[20px]">edit</span></button>' +
            '<button class="p-xs text-on-surface-variant hover:text-error transition-colors" data-action="toggle-status" data-id="' + u.id + '" title="' + (active ? "Deactivate" : "Reactivate") + '"><span class="material-symbols-outlined text-[20px]">' + (active ? "block" : "check_circle") + '</span></button>' +
          '</td>';
        tbody.appendChild(tr);
      });
    }
    var count = document.getElementById("user-count");
    if (count) {
      count.textContent = page.total ? "Showing " + page.start + " to " + page.end + " of " + page.total + " users" : "Showing 0 users";
    }
    var nav = document.getElementById("user-pagination");
    if (nav) {
      window.EcoWasteUI.paginateButtons(nav, { page: page.page, pages: page.pages, onPage: function (p) { userPage = p; renderUsers(); } });
    }
  }

  var exportBtn = document.getElementById("export-users-btn");
  if (exportBtn) {
    exportBtn.addEventListener("click", function () {
      var rows = filtered().map(function (u) {
        return {
          full_name: u.full_name || "",
          email: u.email || "",
          role: roleLabel(u.role),
          status: u.status || "",
          last_active_at: u.last_active_at ? D.fmtDate(u.last_active_at) : ""
        };
      });
      D.exportCSV("ecowaste_users.csv", ["full_name", "email", "role", "status", "last_active_at"], rows);
    });
  }

  var tbody = document.getElementById("user-tbody");
  if (tbody) {
    tbody.addEventListener("click", async function (e) {
      var btn = e.target.closest("button[data-action]");
      if (!btn) return;
      var id = btn.getAttribute("data-id");
      var user = null;
      for (var i = 0; i < allUsers.length; i++) {
        if (allUsers[i].id === id) { user = allUsers[i]; break; }
      }
      if (!user) return;

      if (btn.getAttribute("data-action") === "toggle-status") {
        var activating = user.status === "Inactive";
        var ok = await window.EcoWasteUI.confirm({
          title: activating ? "Reactivate user?" : "Deactivate user?",
          message: activating
            ? "Enable \"" + (user.full_name || user.email) + "\" to sign in again?"
            : "Block \"" + (user.full_name || user.email) + "\" from signing in? Their data is kept.",
          confirmLabel: activating ? "Reactivate" : "Deactivate",
          danger: !activating
        });
        if (!ok) return;
        try {
          await D.update("profiles", "id=eq." + id, { status: activating ? "Active" : "Inactive" });
          window.EcoWasteUI.toast(activating ? "User reactivated." : "User deactivated.", "success");
          load();
        } catch (err) {
          window.EcoWasteUI.toast(err.message, "error");
        }
        return;
      }

      // edit
      try {
        await window.EcoWasteUI.openModal({
          title: "Edit User",
          submitLabel: "Save Changes",
          fields: [
            { name: "role", label: "Role", type: "select", required: true, value: user.role,
              options: [
                { label: "Resident", value: "resident" },
                { label: "Collector", value: "collector" },
                { label: "Administrator", value: "admin" }
              ] },
            { name: "status", label: "Status", type: "select", required: true, value: user.status || "Active",
              options: [
                { label: "Active", value: "Active" },
                { label: "Inactive", value: "Inactive" }
              ] }
          ],
          onSubmit: function (values) {
            return D.update("profiles", "id=eq." + id, values);
          }
        });
        window.EcoWasteUI.toast("User updated.", "success");
        load();
      } catch (err) {
        if (err && err.message === "closed") return;
        window.EcoWasteUI.toast(err.message, "error");
      }
    });
  }

  var searchEl = document.getElementById("user-search");
  var statusFilterEl = document.getElementById("user-status-filter");
  var tabButtons = document.querySelectorAll("[data-role-filter]");
if (searchEl) searchEl.addEventListener("input", function () { searchTerm = this.value; userPage = 1; renderUsers(); });
  if (statusFilterEl) statusFilterEl.addEventListener("change", function () { statusFilter = this.value; userPage = 1; renderUsers(); });
  tabButtons.forEach(function (tab) {
    tab.addEventListener("click", function () {
      roleFilter = tab.getAttribute("data-role-filter");
      userPage = 1;
      tabButtons.forEach(function (t) {
        if (t === tab) {
          t.classList.add("bg-surface-container-lowest", "shadow-sm", "text-primary");
          t.classList.remove("text-on-surface-variant", "hover:text-on-surface");
        } else {
          t.classList.remove("bg-surface-container-lowest", "shadow-sm", "text-primary");
          t.classList.add("text-on-surface-variant", "hover:text-on-surface");
        }
      });
      renderUsers();
    });
  });

  var addBtn = document.getElementById("add-user-btn");
  if (addBtn) {
    addBtn.addEventListener("click", function () {
      window.EcoWasteUI.openModal({
        title: "Add New User",
        submitLabel: "Create User",
        fields: [
          { name: "full_name", label: "Full Name", required: true, placeholder: "e.g. Jane Doe" },
          { name: "email", label: "Email Address", type: "email", required: true, placeholder: "jane@example.com" },
          { name: "password", label: "Password", type: "password", required: true, placeholder: "Minimum 6 characters" },
          { name: "role", label: "Role", type: "select", required: true, value: "resident",
            options: [
              { label: "Resident", value: "resident" },
              { label: "Collector", value: "collector" }
            ] }
        ],
        onSubmit: async function (values) {
          var data = await D.signup(values.email, values.password, {
            full_name: values.full_name,
            role: values.role
          });
          if (!data.user || !data.user.id) throw new Error("Account could not be created.");
        }
      }).then(function () {
        window.EcoWasteUI.toast("User created.", "success");
        load();
      }).catch(function (err) {
        if (err && err.message === "closed") return;
        window.EcoWasteUI.toast(err.message, "error");
      });
    });
  }

  load().catch(function (err) {
    console.error("EcoWaste users data failed to load:", err);
  });
})();
</script>


