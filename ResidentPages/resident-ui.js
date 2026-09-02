(function () {
  "use strict";

  // Small UI toolkit shared by the resident portal: toasts, confirm
  // dialogs, and form modals. Styled to match the resident palette.
  var UI = {};

  var TOAST_META = {
    success: { cls: "bg-surface-container-lowest border-l-4 border-primary", icon: "check_circle", iconCls: "text-primary" },
    error: { cls: "bg-surface-container-lowest border-l-4 border-error", icon: "error", iconCls: "text-error" },
    info: { cls: "bg-surface-container-lowest border-l-4 border-primary", icon: "info", iconCls: "text-primary" }
  };

  UI.toast = function (message, type) {
    type = type || "success";
    var meta = TOAST_META[type] || TOAST_META.info;
    var container = document.getElementById("eco-toast-container");
    if (!container) {
      container = document.createElement("div");
      container.id = "eco-toast-container";
      container.className = "fixed top-4 right-4 z-[100] flex flex-col gap-sm w-80 max-w-[90vw]";
      document.body.appendChild(container);
    }
    if (container.children.length >= 4) container.removeChild(container.firstChild);

    var el = document.createElement("div");
    el.className = "flex items-start gap-sm px-md py-sm rounded-xl border border-outline-variant shadow-lg " + meta.cls;
    el.innerHTML =
      '<span class="material-symbols-outlined text-[20px] mt-px ' + meta.iconCls + '">' + meta.icon + "</span>" +
      '<div class="font-body-sm text-body-sm text-on-surface flex-1">' + window.EcoWasteData.esc(message) + "</div>" +
      '<button class="text-on-surface-variant hover:text-on-surface transition-colors" type="button">' +
      '<span class="material-symbols-outlined text-[18px]">close</span></button>';

    var close = function () {
      if (el.parentNode) el.parentNode.removeChild(el);
    };
    el.querySelector("button").addEventListener("click", close);
    setTimeout(close, 5000);
    container.appendChild(el);
  };

  UI.confirm = function (opts) {
    return new Promise(function (resolve) {
      var overlay = document.createElement("div");
      overlay.className = "fixed inset-0 z-[60] flex items-center justify-center p-4";
      overlay.innerHTML =
        '<div class="absolute inset-0 bg-black/40" data-ui-close></div>' +
        '<div class="relative bg-surface-container-lowest border border-outline-variant rounded-xl shadow-2xl w-full max-w-sm p-lg">' +
        '<div class="flex items-start gap-md mb-md">' +
        '<span class="material-symbols-outlined text-[28px] flex-shrink-0 ' + (opts.danger ? "text-error" : "text-primary") + '">' + (opts.danger ? "warning" : "help") + "</span>" +
        "<div>" +
        '<h3 class="font-headline-md text-headline-md text-on-surface mb-1">' + window.EcoWasteData.esc(opts.title || "Are you sure?") + "</h3>" +
        '<p class="font-body-md text-body-md text-on-surface-variant">' + window.EcoWasteData.esc(opts.message || "") + "</p>" +
        "</div></div>" +
        '<div class="flex flex-col-reverse sm:flex-row justify-end gap-sm">' +
        '<button type="button" data-ui-cancel class="px-4 py-2 rounded-lg border border-outline text-on-surface font-body-md text-body-md hover:bg-surface-container transition-colors">Cancel</button>' +
        '<button type="button" data-ui-ok class="px-4 py-2 rounded-lg font-body-md text-body-md font-semibold text-on-primary transition-colors ' +
        (opts.danger ? "bg-error hover:bg-error-container hover:text-on-error-container" : "bg-primary hover:bg-primary-container hover:text-on-primary-container") +
        '">' + window.EcoWasteData.esc(opts.confirmLabel || "Confirm") + "</button>" +
        "</div></div>";

      document.body.appendChild(overlay);

      var done = function (ok) {
        overlay.remove();
        resolve(ok);
      };
      overlay.querySelectorAll("[data-ui-close], [data-ui-cancel]").forEach(function (el) {
        el.addEventListener("click", function () { done(false); });
      });
      overlay.querySelector("[data-ui-ok]").addEventListener("click", function () { done(true); });
      overlay.querySelector("[data-ui-cancel]").focus();
    });
  };

  function fieldMarkup(f) {
    var req = f.required ? '<span class="text-error"> *</span>' : "";
    var value = f.value !== undefined && f.value !== null ? String(f.value).replace(/"/g, "&quot;") : "";
    var label =
      '<label class="block font-label-caps text-label-caps text-on-surface-variant mb-1" for="ui-field-' + f.name + '">' +
      window.EcoWasteData.esc(f.label || f.name) + req + "</label>";

    if (f.type === "select") {
      var opts = (f.options || []).map(function (o) {
        var ov = o.value !== undefined ? o.value : o.label;
        return '<option value="' + window.EcoWasteData.esc(ov) + '"' +
          (ov === String(f.value) ? " selected" : "") + ">" +
          window.EcoWasteData.esc(o.label) + "</option>";
      }).join("");
      return (
        label +
        '<select id="ui-field-' + f.name + '" class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-md py-sm font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition-all">' +
        opts + "</select>"
      );
    }

    if (f.type === "textarea") {
      return (
        label +
        '<textarea id="ui-field-' + f.name + '" rows="2" class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-md py-sm font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition-all" placeholder="' +
        window.EcoWasteData.esc(f.placeholder || "") + '">' + window.EcoWasteData.esc(f.value || "") + "</textarea>"
      );
    }

    return (
      label +
      '<input id="ui-field-' + f.name + '" type="' + (f.type || "text") + '" value="' + value + '" placeholder="' +
      window.EcoWasteData.esc(f.placeholder || "") + '" class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-md py-sm font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/10 transition-all">'
    );
  }

  UI.openModal = function (opts) {
    return new Promise(function (resolve, reject) {
      var overlay = document.createElement("div");
      overlay.className = "fixed inset-0 z-[60] flex items-center justify-center p-4";
      overlay.innerHTML =
        '<div class="absolute inset-0 bg-black/40" data-ui-close></div>' +
        '<div class="relative bg-surface-container-lowest border border-outline-variant rounded-xl shadow-2xl w-full max-w-md overflow-hidden">' +
        '<div class="flex items-center justify-between px-lg py-md border-b border-outline-variant">' +
        '<h3 class="font-headline-md text-headline-md text-on-surface">' + window.EcoWasteData.esc(opts.title) + "</h3>" +
        '<button type="button" data-ui-close class="text-on-surface-variant hover:text-on-surface transition-colors p-1"><span class="material-symbols-outlined">close</span></button>' +
        "</div>" +
        '<div class="p-lg">' +
        '<div class="space-y-md">' +
        opts.fields.map(fieldMarkup).join("") +
        "</div>" +
        '<div id="ui-modal-error" class="hidden mt-md text-sm font-body-sm rounded-lg px-md py-sm bg-error-container text-on-error-container"></div>' +
        "</div>" +
        '<div class="flex flex-col-reverse sm:flex-row justify-end gap-sm px-lg py-md border-t border-outline-variant bg-surface-container-low/50">' +
        '<button type="button" data-ui-close class="px-4 py-2 rounded-lg border border-outline text-on-surface font-body-md text-body-md hover:bg-surface-container transition-colors">Cancel</button>' +
        '<button type="button" data-ui-submit class="px-4 py-2 rounded-lg bg-primary text-on-primary font-body-md text-body-md font-semibold hover:bg-primary-container hover:text-on-primary-container transition-colors flex items-center justify-center gap-2">' +
        window.EcoWasteData.esc(opts.submitLabel || "Save") + "</button>" +
        "</div></div>";

      document.body.appendChild(overlay);

      var closed = false;
      var close = function () {
        if (closed) return;
        closed = true;
        overlay.remove();
        reject(new Error("closed"));
      };
      var errorEl = function () { return overlay.querySelector("#ui-modal-error"); };

      overlay.querySelectorAll("[data-ui-close]").forEach(function (el) {
        el.addEventListener("click", close);
      });

      overlay.querySelector("[data-ui-submit]").addEventListener("click", async function (e) {
        var btn = e.currentTarget;
        var values = {};
        for (var i = 0; i < opts.fields.length; i++) {
          var f = opts.fields[i];
          var input = overlay.querySelector("#ui-field-" + f.name);
          values[f.name] = f.type === "checkbox" ? input.checked : input.value.trim();
          if (f.required && (values[f.name] === "" || (f.type === "checkbox" && !values[f.name]))) {
            var errEl = errorEl();
            errEl.textContent = (f.label || f.name) + " is required.";
            errEl.classList.remove("hidden");
            return;
          }
        }
        var errEl = errorEl();
        errEl.classList.add("hidden");
        btn.disabled = true;
        btn.innerHTML = '<span class="material-symbols-outlined animate-spin text-[16px]">progress_activity</span> Saving...';
        try {
          var result = await opts.onSubmit(values);
          close();
          resolve(result);
        } catch (err) {
          if (!closed) {
            errEl.textContent = err.message || "Something went wrong.";
            errEl.classList.remove("hidden");
            btn.disabled = false;
            btn.innerHTML = window.EcoWasteData.esc(opts.submitLabel || "Save");
          }
        }
      });
    }).catch(function (err) {
      if (err && err.message === "closed") return;
      throw err;
    });
  };

  UI.menu = function (anchor, items) {
    var menu = document.createElement("div");
    var r = anchor.getBoundingClientRect();
    var open = true;
    menu.className = "fixed z-[70] w-56 bg-surface-container-lowest border border-outline-variant rounded-xl shadow-2xl py-xs overflow-hidden";
    menu.style.top = Math.min(r.bottom + 4, window.innerHeight - (items.length * 40 + 20)) + "px";
    menu.style.left = Math.max(8, Math.min(r.right - 224, window.innerWidth - 240)) + "px";
    menu.innerHTML = items.map(function (item) {
      if (item === "-") {
        return '<div class="my-1 border-t border-outline-variant"></div>';
      }
      return (
        '<button type="button" class="w-full flex items-center gap-3 px-4 py-2 hover:bg-surface-container text-left font-body-md text-body-md transition-colors ' +
        (item.danger ? "text-error" : "text-on-surface") + '">' +
        '<span class="material-symbols-outlined text-[18px]">' + (item.icon || "chevron_right") + "</span>" +
        window.EcoWasteData.esc(item.label) + "</button>"
      );
    }).join("");

    document.body.appendChild(menu);

    var close = function () {
      if (!open) return;
      open = false;
      if (menu.parentNode) menu.parentNode.removeChild(menu);
      document.removeEventListener("click", onClick);
      document.removeEventListener("keydown", onKey);
    };

    function onClick(e) {
      if (menu.contains(e.target)) return;
      close();
    }
    function onKey(e) {
      if (e.key === "Escape") close();
    }

    document.addEventListener("click", onClick);
    document.addEventListener("keydown", onKey);

    Array.prototype.forEach.call(menu.querySelectorAll("button"), function (btn, i) {
      var realItems = items.filter(function (it) { return it !== "-"; });
      btn.addEventListener("click", function (e) {
        e.stopPropagation();
        var item = realItems[i];
        close();
        if (item && item.onClick) item.onClick();
      });
    });

    return { close: close };
  };

  window.EcoWasteUI = UI;
})();
