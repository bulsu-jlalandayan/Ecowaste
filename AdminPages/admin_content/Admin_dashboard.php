<!DOCTYPE html><html class="light" lang="en" style=""><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>EcoWaste Admin - Dashboard</title>
<!-- Material Symbols -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect">
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&amp;family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Tailwind Configuration -->
<script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "outline": "#7b7487",
                      "secondary-fixed": "#e1e0ff",
                      "tertiary": "#4d4f50",
                      "on-error-container": "#93000a",
                      "inverse-surface": "#313032",
                      "surface-container-low": "#f6f2f5",
                      "on-tertiary-fixed": "#1a1c1d",
                      "surface-dim": "#dcd9dc",
                      "primary-container": "#7c3aed",
                      "on-primary-container": "#ede0ff",
                      "surface-bright": "#fcf8fb",
                      "on-tertiary-container": "#e6e6e7",
                      "on-primary-fixed-variant": "#5a00c6",
                      "on-secondary": "#ffffff",
                      "secondary-container": "#6063ee",
                      "primary-fixed-dim": "#d2bbff",
                      "background": "#fcf8fb",
                      "surface-container-high": "#eae7ea",
                      "on-primary": "#ffffff",
                      "error": "#ba1a1a",
                      "inverse-primary": "#d2bbff",
                      "tertiary-container": "#656768",
                      "secondary": "#4648d4",
                      "error-container": "#ffdad6",
                      "surface-container-lowest": "#ffffff",
                      "on-background": "#1c1b1d",
                      "surface": "#fcf8fb",
                      "on-surface-variant": "#4a4455",
                      "outline-variant": "#ccc3d8",
                      "surface-container-highest": "#e5e1e4",
                      "surface-variant": "#e5e1e4",
                      "on-primary-fixed": "#25005a",
                      "on-error": "#ffffff",
                      "on-secondary-fixed": "#07006c",
                      "surface-container": "#f0edf0",
                      "inverse-on-surface": "#f3f0f2",
                      "tertiary-fixed": "#e2e2e3",
                      "primary": "#630ed4",
                      "tertiary-fixed-dim": "#c6c6c7",
                      "secondary-fixed-dim": "#c0c1ff",
                      "primary-fixed": "#eaddff",
                      "on-secondary-fixed-variant": "#2f2ebe",
                      "on-surface": "#1c1b1d",
                      "surface-tint": "#732ee4",
                      "on-tertiary": "#ffffff",
                      "on-secondary-container": "#fffbff",
                      "on-tertiary-fixed-variant": "#454748"
              },
              "borderRadius": {
                      "DEFAULT": "0.125rem",
                      "lg": "0.25rem",
                      "xl": "0.5rem",
                      "full": "0.75rem"
              },
              "spacing": {
                      "base": "4px",
                      "margin-mobile": "16px",
                      "xs": "4px",
                      "gutter": "20px",
                      "margin-desktop": "32px",
                      "max-width": "1440px",
                      "md": "16px",
                      "xl": "32px",
                      "lg": "24px",
                      "sm": "8px"
              },
              "fontFamily": {
                      "body-lg": [
                              "Hanken Grotesk"
                      ],
                      "headline-md": [
                              "Hanken Grotesk"
                      ],
                      "body-md": [
                              "Hanken Grotesk"
                      ],
                      "title-lg": [
                              "Hanken Grotesk"
                      ],
                      "title-md": [
                              "Hanken Grotesk"
                      ],
                      "mono-md": [
                              "Courier Prime"
                      ],
                      "body-sm": [
                              "Hanken Grotesk"
                      ],
                      "display-lg": [
                              "Hanken Grotesk"
                      ],
                      "headline-lg": [
                              "Hanken Grotesk"
                      ],
                      "label-md": [
                              "Hanken Grotesk"
                      ]
              },
              "fontSize": {
                      "body-lg": [
                              "16px",
                              {
                                      "lineHeight": "24px",
                                      "fontWeight": "400"
                              }
                      ],
                      "headline-md": [
                              "22px",
                              {
                                      "lineHeight": "28px",
                                      "fontWeight": "600"
                              }
                      ],
                      "body-md": [
                              "14px",
                              {
                                      "lineHeight": "20px",
                                      "fontWeight": "400"
                              }
                      ],
                      "title-lg": [
                              "18px",
                              {
                                      "lineHeight": "24px",
                                      "fontWeight": "600"
                              }
                      ],
                      "title-md": [
                              "16px",
                              {
                                      "lineHeight": "22px",
                                      "fontWeight": "500"
                              }
                      ],
                      "mono-md": [
                              "13px",
                              {
                                      "lineHeight": "18px",
                                      "fontWeight": "400"
                              }
                      ],
                      "body-sm": [
                              "13px",
                              {
                                      "lineHeight": "18px",
                                      "fontWeight": "400"
                              }
                      ],
                      "display-lg": [
                              "36px",
                              {
                                      "lineHeight": "44px",
                                      "letterSpacing": "-0.02em",
                                      "fontWeight": "700"
                              }
                      ],
                      "headline-lg": [
                              "28px",
                              {
                                      "lineHeight": "34px",
                                      "letterSpacing": "-0.01em",
                                      "fontWeight": "600"
                              }
                      ],
                      "label-md": [
                              "12px",
                              {
                                      "lineHeight": "16px",
                                      "fontWeight": "600"
                              }
                      ]
              }
      },
          },
        }
      </script>
<style>
        .material-symbols-outlined {
          font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-lg min-h-screen">
<!-- SideNavBar (Shared Component) -->
<nav class="hidden md:flex flex-col h-full py-lg bg-surface dark:bg-inverse-surface border-r border-outline-variant fixed left-0 top-0 h-screen w-[260px] z-50">
<div class="px-lg mb-xl">
<h1 class="font-headline-md text-headline-md font-bold text-primary dark:text-inverse-primary tracking-tight">EcoWaste Admin</h1>
<p class="font-body-sm text-body-sm text-on-surface-variant dark:text-on-surface-variant mt-sm">System Management</p>
</div>
<ul class="flex-1 space-y-sm px-md">
<!-- Active: Dashboard -->
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg text-primary dark:text-inverse-primary bg-secondary-fixed dark:bg-secondary-container font-semibold transition-all duration-150" href="#">
<span class="material-symbols-outlined text-lg">dashboard</span>
<span class="font-body-md text-body-md">Dashboard</span>
</a>
</li>
<!-- Inactive -->
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg text-on-surface-variant dark:text-on-surface-variant hover:bg-surface-container-high dark:hover:bg-surface-variant transition-colors" href="#">
<span class="material-symbols-outlined text-lg" style="font-variation-settings: &quot;FILL&quot; 0;">group</span>
<span class="font-body-md text-body-md">Users</span>
</a>
</li>
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg text-on-surface-variant dark:text-on-surface-variant hover:bg-surface-container-high dark:hover:bg-surface-variant transition-colors" href="#">
<span class="material-symbols-outlined text-lg" style="font-variation-settings: &quot;FILL&quot; 0;">category</span>
<span class="font-body-md text-body-md">Waste Categories</span>
</a>
</li>
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg text-on-surface-variant dark:text-on-surface-variant hover:bg-surface-container-high dark:hover:bg-surface-variant transition-colors" href="#">
<span class="material-symbols-outlined text-lg" style="font-variation-settings: &quot;FILL&quot; 0;">local_shipping</span>
<span class="font-body-md text-body-md">Collection Requests</span>
</a>
</li>
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg text-on-surface-variant dark:text-on-surface-variant hover:bg-surface-container-high dark:hover:bg-surface-variant transition-colors" href="#">
<span class="material-symbols-outlined text-lg" style="font-variation-settings: &quot;FILL&quot; 0;">person_pin_circle</span>
<span class="font-body-md text-body-md">Collectors</span>
</a>
</li>
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg text-on-surface-variant dark:text-on-surface-variant hover:bg-surface-container-high dark:hover:bg-surface-variant transition-colors" href="#">
<span class="material-symbols-outlined text-lg" style="font-variation-settings: &quot;FILL&quot; 0;">recycling</span>
<span class="font-body-md text-body-md">Recycling Records</span>
</a>
</li>
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg text-on-surface-variant dark:text-on-surface-variant hover:bg-surface-container-high dark:hover:bg-surface-variant transition-colors" href="#">
<span class="material-symbols-outlined text-lg" style="font-variation-settings: &quot;FILL&quot; 0;">assessment</span>
<span class="font-body-md text-body-md">Reports</span>
</a>
</li>
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg text-on-surface-variant dark:text-on-surface-variant hover:bg-surface-container-high dark:hover:bg-surface-variant transition-colors" href="#">
<span class="material-symbols-outlined text-lg" style="font-variation-settings: &quot;FILL&quot; 0;">trending_up</span>
<span class="font-body-md text-body-md">Trends</span>
</a>
</li>
</ul>
<div class="mt-auto px-md pt-lg border-t border-outline-variant">
<a class="flex items-center gap-md px-md py-sm rounded-lg text-on-surface-variant dark:text-on-surface-variant hover:bg-surface-container-high dark:hover:bg-surface-variant transition-colors" href="#">
<span class="material-symbols-outlined text-lg" style="font-variation-settings: &quot;FILL&quot; 0;">settings</span>
<span class="font-body-md text-body-md">Settings</span>
</a>
</div>
</nav>
<!-- Main Content Wrapper -->
<div class="md:ml-[260px] min-h-screen flex flex-col">
<!-- TopAppBar (Shared Component) -->
<header class="flex justify-between items-center h-16 px-margin-desktop sticky top-0 z-40 bg-surface dark:bg-inverse-surface border-b border-outline-variant shadow-sm w-full max-w-full">
<div class="flex items-center flex-1">
<div class="relative w-64 md:w-96">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant" style="font-variation-settings: &quot;FILL&quot; 0;">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-surface-container-low border border-outline-variant rounded-full font-body-sm text-body-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="Search..." type="text">
</div>
</div>
<div class="flex items-center gap-md">
<button class="p-2 rounded-full hover:bg-surface-container-highest dark:hover:bg-surface-variant transition-colors text-on-surface-variant hover:text-primary dark:hover:text-inverse-primary cursor-pointer active:scale-95 transition-transform duration-100">
<span class="material-symbols-outlined" style="font-variation-settings: &quot;FILL&quot; 0;">notifications</span>
</button>
<button class="p-2 rounded-full hover:bg-surface-container-highest dark:hover:bg-surface-variant transition-colors text-on-surface-variant hover:text-primary dark:hover:text-inverse-primary cursor-pointer active:scale-95 transition-transform duration-100">
<span class="material-symbols-outlined" style="font-variation-settings: &quot;FILL&quot; 0;">help</span>
</button>
<div class="h-8 w-8 rounded-full overflow-hidden ml-sm cursor-pointer border border-outline-variant flex items-center justify-center bg-surface-container-highest">
<span class="material-symbols-outlined text-on-surface-variant" style="font-variation-settings: &quot;FILL&quot; 1;">person</span>
</div>
</div>
</header>
<!-- Dashboard Canvas -->
<main class="flex-1 p-margin-mobile md:p-margin-desktop bg-surface-container-lowest overflow-y-auto">
<div class="max-w-[1440px] mx-auto space-y-xl">
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-md">
<div>
<h2 class="font-display-lg text-display-lg text-on-background">Dashboard Overview</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-xs">Real-time metrics and operational status.</p>
</div>
<div class="flex gap-sm">
<button class="flex items-center gap-2 bg-surface-container-high hover:bg-surface-container-highest text-on-surface px-4 py-2 rounded-lg font-title-md text-title-md transition-colors border border-outline-variant">
<span class="material-symbols-outlined text-sm" style="font-variation-settings: &quot;FILL&quot; 0;">calendar_today</span>
                            Today
                        </button>
<button class="flex items-center gap-2 bg-primary hover:bg-surface-tint text-on-primary px-4 py-2 rounded-lg font-title-md text-title-md shadow-sm transition-colors">
<span class="material-symbols-outlined text-sm">download</span>
                            Export Report
                        </button>
</div>
</div>
<!-- KPI Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-md">
<!-- Stat Card 1 -->
<div class="bg-surface border border-outline-variant rounded-xl p-lg shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
<div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-6xl text-primary" style="font-variation-settings: &quot;FILL&quot; 1;">group</span>
</div>
<div class="flex items-center justify-between mb-md">
<span class="font-title-md text-title-md text-on-surface-variant">Total Users</span>
<span class="flex items-center text-primary font-label-md text-label-md bg-secondary-fixed px-2 py-1 rounded-full">
<span class="material-symbols-outlined text-xs mr-1">arrow_upward</span> 12%
                            </span>
</div>
<div class="font-display-lg text-display-lg text-on-surface">24,592</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-sm">Active this month</p>
</div>
<!-- Stat Card 2 -->
<div class="bg-surface border border-outline-variant rounded-xl p-lg shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
<div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-6xl text-error" style="font-variation-settings: &quot;FILL&quot; 1;">local_shipping</span>
</div>
<div class="flex items-center justify-between mb-md">
<span class="font-title-md text-title-md text-on-surface-variant">Active Requests</span>
<span class="flex items-center text-error font-label-md text-label-md bg-error-container px-2 py-1 rounded-full">
<span class="material-symbols-outlined text-xs mr-1">arrow_upward</span> 5%
                            </span>
</div>
<div class="font-display-lg text-display-lg text-on-surface">1,843</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-sm">Pending processing</p>
</div>
<!-- Stat Card 3 -->
<div class="bg-surface border border-outline-variant rounded-xl p-lg shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
<div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-6xl text-secondary" style="font-variation-settings: &quot;FILL&quot; 1;">assignment</span>
</div>
<div class="flex items-center justify-between mb-md">
<span class="font-title-md text-title-md text-on-surface-variant">Pending Assignments</span>
<span class="flex items-center text-on-surface-variant font-label-md text-label-md bg-surface-variant px-2 py-1 rounded-full">
<span class="material-symbols-outlined text-xs mr-1">horizontal_rule</span> 0%
                            </span>
</div>
<div class="font-display-lg text-display-lg text-on-surface">428</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-sm">Awaiting dispatch</p>
</div>
<!-- Stat Card 4 -->
<div class="bg-surface border border-outline-variant rounded-xl p-lg shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
<div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
<span class="material-symbols-outlined text-6xl text-primary-container" style="font-variation-settings: &quot;FILL&quot; 1;">recycling</span>
</div>
<div class="flex items-center justify-between mb-md">
<span class="font-title-md text-title-md text-on-surface-variant">Recycling Rate</span>
<span class="flex items-center text-primary font-label-md text-label-md bg-secondary-fixed px-2 py-1 rounded-full">
<span class="material-symbols-outlined text-xs mr-1">arrow_upward</span> 2.4%
                            </span>
</div>
<div class="font-display-lg text-display-lg text-on-surface">68.5%</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-sm">Avg across zones</p>
</div>
</div>
<!-- Middle Section: Charts & Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-md">
<!-- Volume Chart -->
<div class="lg:col-span-2 bg-surface border border-outline-variant rounded-xl p-lg shadow-sm">
<div class="flex justify-between items-center mb-lg">
<h3 class="font-title-lg text-title-lg text-on-surface">Weekly Collection Volume</h3>
<button class="text-on-surface-variant hover:text-primary transition-colors">
<span class="material-symbols-outlined">more_vert</span>
</button>
</div>
<!-- Decorative Chart Area -->
<div class="h-64 w-full bg-surface-container-low rounded-lg relative overflow-hidden border border-outline-variant"><div class="absolute inset-0 flex flex-col justify-between py-4 px-6 opacity-20"><div class="w-full h-px bg-outline-variant"></div><div class="w-full h-px bg-outline-variant"></div><div class="w-full h-px bg-outline-variant"></div><div class="w-full h-px bg-outline-variant"></div></div><div class="absolute inset-0 flex items-end justify-around px-6 pb-4 gap-2"><div class="flex flex-col-reverse w-full h-full gap-1"><div class="w-full bg-primary rounded-t-sm" style="height: 45%"></div><div class="w-full bg-secondary opacity-50" style="height: 25%"></div><span class="text-[10px] text-on-surface-variant text-center mt-2">Mon</span></div><div class="flex flex-col-reverse w-full h-full gap-1"><div class="w-full bg-primary rounded-t-sm" style="height: 55%"></div><div class="w-full bg-secondary opacity-50" style="height: 30%"></div><span class="text-[10px] text-on-surface-variant text-center mt-2">Tue</span></div><div class="flex flex-col-reverse w-full h-full gap-1"><div class="w-full bg-primary rounded-t-sm" style="height: 40%"></div><div class="w-full bg-secondary opacity-50" style="height: 20%"></div><span class="text-[10px] text-on-surface-variant text-center mt-2">Wed</span></div><div class="flex flex-col-reverse w-full h-full gap-1"><div class="w-full bg-primary rounded-t-sm" style="height: 65%"></div><div class="w-full bg-secondary opacity-50" style="height: 15%"></div><span class="text-[10px] text-on-surface-variant text-center mt-2">Thu</span></div><div class="flex flex-col-reverse w-full h-full gap-1"><div class="w-full bg-primary rounded-t-sm" style="height: 50%"></div><div class="w-full bg-secondary opacity-50" style="height: 35%"></div><span class="text-[10px] text-on-surface-variant text-center mt-2">Fri</span></div><div class="flex flex-col-reverse w-full h-full gap-1"><div class="w-full bg-primary rounded-t-sm" style="height: 35%"></div><div class="w-full bg-secondary opacity-50" style="height: 25%"></div><span class="text-[10px] text-on-surface-variant text-center mt-2">Sat</span></div><div class="flex flex-col-reverse w-full h-full gap-1"><div class="w-full bg-primary rounded-t-sm" style="height: 30%"></div><div class="w-full bg-secondary opacity-50" style="height: 10%"></div><span class="text-[10px] text-on-surface-variant text-center mt-2">Sun</span></div></div></div>
<div class="flex justify-center gap-md mt-sm">
<div class="flex items-center gap-xs"><div class="w-3 h-3 rounded-full bg-primary"></div><span class="font-label-md text-label-md text-on-surface-variant">Organic</span></div>
<div class="flex items-center gap-xs"><div class="w-3 h-3 rounded-full bg-secondary"></div><span class="font-label-md text-label-md text-on-surface-variant">Recyclable (Est)</span></div>
</div>
</div>
<!-- Distribution Chart & Quick Actions -->
<div class="flex flex-col gap-md">
<!-- Doughnut -->
<div class="flex-1 bg-surface border border-outline-variant rounded-xl p-lg shadow-sm flex flex-col">
<h3 class="font-title-lg text-title-lg text-on-surface mb-md">Waste Distribution</h3>
<div class="flex-1 flex items-center justify-center relative"><svg class="w-40 h-40 transform -rotate-90" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="transparent" stroke="#7b7487" stroke-width="12" stroke-dasharray="251.3" stroke-dashoffset="0"></circle><circle cx="50" cy="50" r="40" fill="transparent" stroke="#4648d4" stroke-width="12" stroke-dasharray="251.3" stroke-dashoffset="113.1"></circle><circle cx="50" cy="50" r="40" fill="transparent" stroke="#630ed4" stroke-width="12" stroke-dasharray="251.3" stroke-dashoffset="0" style="stroke-dasharray: 138.2, 251.3;"></circle></svg><div class="absolute flex flex-col items-center justify-center"><span class="font-display-lg text-headline-lg font-bold text-on-surface">100%</span><span class="text-[10px] uppercase tracking-wider text-on-surface-variant font-bold">Total</span></div></div>
<div class="mt-md space-y-sm">
<div class="flex justify-between items-center"><div class="flex items-center gap-sm"><div class="w-3 h-3 rounded bg-primary"></div><span class="font-body-sm text-body-sm">Organic</span></div><span class="font-mono-md text-mono-md">55%</span></div>
<div class="flex justify-between items-center"><div class="flex items-center gap-sm"><div class="w-3 h-3 rounded bg-secondary"></div><span class="font-body-sm text-body-sm">Plastic</span></div><span class="font-mono-md text-mono-md">30%</span></div>
<div class="flex justify-between items-center"><div class="flex items-center gap-sm"><div class="w-3 h-3 rounded bg-outline"></div><span class="font-body-sm text-body-sm">Metal/Other</span></div><span class="font-mono-md text-mono-md">15%</span></div>
</div>
</div>
<!-- Quick Actions -->
<div class="bg-primary-container border border-outline-variant rounded-xl p-md shadow-sm">
<h3 class="font-title-md text-title-md text-on-primary-container mb-sm">Quick Actions</h3>
<div class="flex flex-col gap-sm">
<button class="w-full flex items-center justify-start gap-md bg-surface text-primary px-4 py-3 rounded-lg font-title-md text-title-md hover:bg-surface-container-high transition-colors shadow-sm">
<span class="material-symbols-outlined text-sm">person_add</span>
                                    Assign Collector
                                </button>
<button class="w-full flex items-center justify-start gap-md bg-surface text-primary px-4 py-3 rounded-lg font-title-md text-title-md hover:bg-surface-container-high transition-colors shadow-sm">
<span class="material-symbols-outlined text-sm">note_add</span>
                                    New Report
                                </button>
<button class="w-full flex items-center justify-start gap-md bg-surface text-primary px-4 py-3 rounded-lg font-title-md text-title-md hover:bg-surface-container-high transition-colors shadow-sm">
<span class="material-symbols-outlined text-sm">group_add</span>
                                    Add User
                                </button>
</div>
</div>
</div>
</div>
<!-- Recent Activity Table -->
<div class="bg-surface border border-outline-variant rounded-xl shadow-sm overflow-hidden">
<div class="px-lg py-md border-b border-outline-variant flex justify-between items-center bg-surface-container-lowest">
<h3 class="font-title-lg text-title-lg text-on-surface">Recent Collection Activities</h3>
<button class="text-primary font-label-md text-label-md hover:underline">View All</button>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low border-b border-outline-variant">
<th class="py-sm px-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">ID</th>
<th class="py-sm px-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Location</th>
<th class="py-sm px-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Type</th>
<th class="py-sm px-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Collector</th>
<th class="py-sm px-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Time</th>
<th class="py-sm px-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider text-right">Status</th>
</tr>
</thead>
<tbody class="font-body-md text-body-md divide-y divide-outline-variant">
<tr class="hover:bg-surface-container-lowest transition-colors group">
<td class="py-3 px-lg font-mono-md text-mono-md text-on-surface-variant group-hover:text-primary transition-colors">#REQ-8901</td>
<td class="py-3 px-lg text-on-surface">Sector 4, North District</td>
<td class="py-3 px-lg text-on-surface">Mixed Recyclables</td>
<td class="py-3 px-lg flex items-center gap-sm">
<div class="w-6 h-6 rounded-full bg-secondary-fixed text-primary flex items-center justify-center font-bold text-xs">JD</div>
                                        John Doe
                                    </td>
<td class="py-3 px-lg text-on-surface-variant">10:45 AM</td>
<td class="py-3 px-lg text-right">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-label-md text-label-md bg-secondary-fixed text-primary">
                                            In Progress
                                        </span>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest transition-colors group">
<td class="py-3 px-lg font-mono-md text-mono-md text-on-surface-variant group-hover:text-primary transition-colors">#REQ-8900</td>
<td class="py-3 px-lg text-on-surface">Downtown Core, Block B</td>
<td class="py-3 px-lg text-on-surface">Organic</td>
<td class="py-3 px-lg flex items-center gap-sm">
<div class="w-6 h-6 rounded-full bg-surface-variant text-on-surface-variant flex items-center justify-center font-bold text-xs">Un</div>
                                        Unassigned
                                    </td>
<td class="py-3 px-lg text-on-surface-variant">11:30 AM</td>
<td class="py-3 px-lg text-right">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-label-md text-label-md bg-surface-variant text-on-surface-variant">
                                            Scheduled
                                        </span>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest transition-colors group">
<td class="py-3 px-lg font-mono-md text-mono-md text-on-surface-variant group-hover:text-primary transition-colors">#REQ-8899</td>
<td class="py-3 px-lg text-on-surface">Industrial Park, East</td>
<td class="py-3 px-lg text-on-surface">Hazardous/Electronic</td>
<td class="py-3 px-lg flex items-center gap-sm">
<div class="w-6 h-6 rounded-full bg-secondary-fixed text-primary flex items-center justify-center font-bold text-xs">AS</div>
                                        Alice Smith
                                    </td>
<td class="py-3 px-lg text-on-surface-variant">09:15 AM</td>
<td class="py-3 px-lg text-right">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-label-md text-label-md bg-[#dcfce7] text-[#166534]">
                                            Completed
                                        </span>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest transition-colors group">
<td class="py-3 px-lg font-mono-md text-mono-md text-on-surface-variant group-hover:text-primary transition-colors">#REQ-8898</td>
<td class="py-3 px-lg text-on-surface">Residential Zone 2</td>
<td class="py-3 px-lg text-on-surface">General Waste</td>
<td class="py-3 px-lg flex items-center gap-sm">
<div class="w-6 h-6 rounded-full bg-secondary-fixed text-primary flex items-center justify-center font-bold text-xs">BJ</div>
                                        Bob Jones
                                    </td>
<td class="py-3 px-lg text-on-surface-variant">08:00 AM</td>
<td class="py-3 px-lg text-right">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-label-md text-label-md bg-[#dcfce7] text-[#166534]">
                                            Completed
                                        </span>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest transition-colors group">
<td class="py-3 px-lg font-mono-md text-mono-md text-on-surface-variant group-hover:text-primary transition-colors">#REQ-8897</td>
<td class="py-3 px-lg text-on-surface">Central Market Area</td>
<td class="py-3 px-lg text-on-surface">Organic</td>
<td class="py-3 px-lg flex items-center gap-sm">
<div class="w-6 h-6 rounded-full bg-secondary-fixed text-primary flex items-center justify-center font-bold text-xs">JD</div>
                                        John Doe
                                    </td>
<td class="py-3 px-lg text-on-surface-variant">07:30 AM</td>
<td class="py-3 px-lg text-right">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-label-md text-label-md bg-[#dcfce7] text-[#166534]">
                                            Completed
                                        </span>
</td>
</tr>
</tbody>
</table>
</div>
<div class="px-lg py-sm border-t border-outline-variant bg-surface-container-lowest flex justify-between items-center text-sm text-on-surface-variant">
<span>Showing 1 to 5 of 45 entries</span>
<div class="flex gap-2">
<button class="p-1 rounded hover:bg-surface-container-high transition-colors disabled:opacity-50"><span class="material-symbols-outlined text-sm">chevron_left</span></button>
<button class="p-1 rounded hover:bg-surface-container-high transition-colors"><span class="material-symbols-outlined text-sm">chevron_right</span></button>
</div>
</div>
</div>
</div>
</main>
</div>


</body></html>