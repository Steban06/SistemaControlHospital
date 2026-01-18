<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <link rel="stylesheet" href="/disenio/css/styles.css">
    <link rel="stylesheet" href="/disenio/css/tuestilo.css">
    <link rel="stylesheet" href="/disenio/css/theme.css">
</head>

<body>
    <div id="root">
        <div class="flex h-screen bg-gray-50">
            <aside class="-translate-x-full lg:translate-x-0 fixed lg:static inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-blue-900 to-blue-800 text-white transition-transform duration-300 flex flex-col">
                <?php include __DIR__ . '/layouts/sidebar.php'; ?>
            </aside>
            <div class="flex-1 flex flex-col overflow-hidden w-full lg:w-auto">
                <header class="bg-white border-b border-gray-200 px-4 lg:px-6 py-3 lg:py-4 flex items-center justify-between shadow-sm">
                    <?php $page_title = 'Reportes'; include __DIR__ . '/layouts/header.php'; ?>
                </header>
                <main class="flex-1 overflow-auto bg-gray-50 flex flex-col">
                    <div class="p-4 lg:p-6 space-y-6 flex-1">
                        <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0">
                            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                                <h4 data-slot="card-title" class="leading-none flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-6 h-6 text-blue-600">
                                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                        <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                        <path d="M10 9H8"></path>
                                        <path d="M16 13H8"></path>
                                        <path d="M16 17H8"></path>
                                    </svg>Generación de Reportes</h4>
                                <p data-slot="card-description" class="text-muted-foreground">Cree reportes personalizados sobre el inventario de bienes nacionales</p>
                            </div>
                            <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6 space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4 bg-gray-50 rounded-lg">
                                    <div class="space-y-2"><label data-slot="label" class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50">Tipo de Reporte</label><button type="button" role="combobox" aria-controls="radix-:r0:" aria-expanded="false" aria-autocomplete="none" dir="ltr" data-state="closed" data-slot="select-trigger" data-size="default" class="border-input data-[placeholder]:text-muted-foreground [&amp;_svg:not([class*='text-'])]:text-muted-foreground focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:bg-input/30 dark:hover:bg-input/50 flex w-full items-center justify-between gap-2 rounded-md border bg-input-background px-3 py-2 text-sm whitespace-nowrap transition-[color,box-shadow] outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50 data-[size=default]:h-9 data-[size=sm]:h-8 *:data-[slot=select-value]:line-clamp-1 *:data-[slot=select-value]:flex *:data-[slot=select-value]:items-center *:data-[slot=select-value]:gap-2 [&amp;_svg]:pointer-events-none [&amp;_svg]:shrink-0 [&amp;_svg:not([class*='size-'])]:size-4"><span data-slot="select-value" style="pointer-events: none;">General</span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down size-4 opacity-50" aria-hidden="true">
                                                <path d="m6 9 6 6 6-6"></path>
                                            </svg></button></div>
                                    <div class="space-y-2"><label data-slot="label" class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50">Período</label><button type="button" role="combobox" aria-controls="radix-:r1:" aria-expanded="false" aria-autocomplete="none" dir="ltr" data-state="closed" data-slot="select-trigger" data-size="default" class="border-input data-[placeholder]:text-muted-foreground [&amp;_svg:not([class*='text-'])]:text-muted-foreground focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:bg-input/30 dark:hover:bg-input/50 flex w-full items-center justify-between gap-2 rounded-md border bg-input-background px-3 py-2 text-sm whitespace-nowrap transition-[color,box-shadow] outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50 data-[size=default]:h-9 data-[size=sm]:h-8 *:data-[slot=select-value]:line-clamp-1 *:data-[slot=select-value]:flex *:data-[slot=select-value]:items-center *:data-[slot=select-value]:gap-2 [&amp;_svg]:pointer-events-none [&amp;_svg]:shrink-0 [&amp;_svg:not([class*='size-'])]:size-4"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-4 h-4 mr-2">
                                                <path d="M8 2v4"></path>
                                                <path d="M16 2v4"></path>
                                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                <path d="M3 10h18"></path>
                                            </svg><span data-slot="select-value" style="pointer-events: none;">Último Mes</span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down size-4 opacity-50" aria-hidden="true">
                                                <path d="m6 9 6 6 6-6"></path>
                                            </svg></button></div>
                                    <div class="space-y-2"><label data-slot="label" class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50">Departamento</label><button type="button" role="combobox" aria-controls="radix-:r2:" aria-expanded="false" aria-autocomplete="none" dir="ltr" data-state="closed" data-slot="select-trigger" data-size="default" class="border-input data-[placeholder]:text-muted-foreground [&amp;_svg:not([class*='text-'])]:text-muted-foreground focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:bg-input/30 dark:hover:bg-input/50 flex w-full items-center justify-between gap-2 rounded-md border bg-input-background px-3 py-2 text-sm whitespace-nowrap transition-[color,box-shadow] outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50 data-[size=default]:h-9 data-[size=sm]:h-8 *:data-[slot=select-value]:line-clamp-1 *:data-[slot=select-value]:flex *:data-[slot=select-value]:items-center *:data-[slot=select-value]:gap-2 [&amp;_svg]:pointer-events-none [&amp;_svg]:shrink-0 [&amp;_svg:not([class*='size-'])]:size-4"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-funnel w-4 h-4 mr-2">
                                                <path d="M10 20a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341L21.74 4.67A1 1 0 0 0 21 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14z"></path>
                                            </svg><span data-slot="select-value" style="pointer-events: none;">Todos</span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down size-4 opacity-50" aria-hidden="true">
                                                <path d="m6 9 6 6 6-6"></path>
                                            </svg></button></div>
                                </div>
                                <div class="flex gap-3">
                                    <button onclick="Swal.fire('Generando Reporte', 'El reporte se está procesando...', 'success')" data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive text-primary-foreground h-9 px-4 py-2 has-[&gt;svg]:px-3 bg-blue-600 hover:bg-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4 mr-2">
                                            <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                            <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                            <path d="M10 9H8"></path>
                                            <path d="M16 13H8"></path>
                                            <path d="M16 17H8"></path>
                                        </svg>Generar Reporte
                                    </button>
                                    <button onclick="Swal.fire('Exportar Excel', 'Descargando archivo .xlsx...', 'info')" data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-background hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-9 px-4 py-2 has-[&gt;svg]:px-3 border-emerald-200 text-emerald-600 hover:bg-emerald-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download w-4 h-4 mr-2">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                            <polyline points="7 10 12 15 17 10"></polyline>
                                            <line x1="12" x2="12" y1="15" y2="3"></line>
                                        </svg>Exportar a Excel
                                    </button>
                                    <button onclick="Swal.fire('Exportar PDF', 'Generando PDF...', 'info')" data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-background hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-9 px-4 py-2 has-[&gt;svg]:px-3 border-red-200 text-red-600 hover:bg-red-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download w-4 h-4 mr-2">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                            <polyline points="7 10 12 15 17 10"></polyline>
                                            <line x1="12" x2="12" y1="15" y2="3"></line>
                                        </svg>Exportar a PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border cursor-pointer transition-all hover:shadow-lg ring-2 ring-blue-500 shadow-lg">
                                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                                    <div class="flex items-start justify-between"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package w-8 h-8 text-blue-600">
                                            <path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"></path>
                                            <path d="M12 22V12"></path>
                                            <polyline points="3.29 7 12 12 20.71 7"></polyline>
                                            <path d="m7.5 4.27 9 5.15"></path>
                                        </svg><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent text-primary-foreground [a&amp;]:hover:bg-primary/90 bg-blue-600">Seleccionado</span></div>
                                    <h4 data-slot="card-title" class="text-base mt-2">Reporte General de Inventario</h4>
                                    <p data-slot="card-description" class="text-muted-foreground text-sm">Vista completa de todos los bienes registrados</p>
                                </div>
                            </div>
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border cursor-pointer transition-all hover:shadow-lg">
                                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                                    <div class="flex items-start justify-between"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-dollar-sign w-8 h-8 text-emerald-600">
                                            <line x1="12" x2="12" y1="2" y2="22"></line>
                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                        </svg></div>
                                    <h4 data-slot="card-title" class="text-base mt-2">Reporte Financiero</h4>
                                    <p data-slot="card-description" class="text-muted-foreground text-sm">Valorización total de bienes y movimientos</p>
                                </div>
                            </div>
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border cursor-pointer transition-all hover:shadow-lg">
                                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                                    <div class="flex items-start justify-between"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-activity w-8 h-8 text-amber-600">
                                            <path d="M22 12h-2.48a2 2 0 0 0-1.93 1.46l-2.35 8.36a.25.25 0 0 1-.48 0L9.24 2.18a.25.25 0 0 0-.48 0l-2.35 8.36A2 2 0 0 1 4.49 12H2"></path>
                                        </svg></div>
                                    <h4 data-slot="card-title" class="text-base mt-2">Reporte de Mantenimiento</h4>
                                    <p data-slot="card-description" class="text-muted-foreground text-sm">Historial y programación de mantenimientos</p>
                                </div>
                            </div>
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border cursor-pointer transition-all hover:shadow-lg">
                                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                                    <div class="flex items-start justify-between"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-column w-8 h-8 text-purple-600">
                                            <path d="M3 3v16a2 2 0 0 0 2 2h16"></path>
                                            <path d="M18 17V9"></path>
                                            <path d="M13 17V5"></path>
                                            <path d="M8 17v-3"></path>
                                        </svg></div>
                                    <h4 data-slot="card-title" class="text-base mt-2">Reporte Analítico</h4>
                                    <p data-slot="card-description" class="text-muted-foreground text-sm">Estadísticas y tendencias de uso</p>
                                </div>
                            </div>
                        </div>
                        <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0">
                            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                                <h4 data-slot="card-title" class="leading-none flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up w-5 h-5 text-blue-600">
                                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                        <polyline points="16 7 22 7 22 13"></polyline>
                                    </svg>Resumen Rápido</h4>
                                <p data-slot="card-description" class="text-muted-foreground">Estadísticas actuales del inventario</p>
                            </div>
                            <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                    <div class="p-4 rounded-lg border bg-gradient-to-br from-white to-gray-50">
                                        <p class="text-sm text-gray-600 mb-2">Bienes Operativos</p>
                                        <p class="text-2xl font-bold text-gray-900 mb-1">1248</p>
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm font-medium text-gray-700">$2,145,000</p><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300">+12%</span>
                                        </div>
                                    </div>
                                    <div class="p-4 rounded-lg border bg-gradient-to-br from-white to-gray-50">
                                        <p class="text-sm text-gray-600 mb-2">En Mantenimiento</p>
                                        <p class="text-2xl font-bold text-gray-900 mb-1">87</p>
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm font-medium text-gray-700">$156,400</p><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-amber-100 text-amber-700 border-amber-300">-5%</span>
                                        </div>
                                    </div>
                                    <div class="p-4 rounded-lg border bg-gradient-to-br from-white to-gray-50">
                                        <p class="text-sm text-gray-600 mb-2">Fuera de Servicio</p>
                                        <p class="text-2xl font-bold text-gray-900 mb-1">34</p>
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm font-medium text-gray-700">$45,200</p><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-red-100 text-red-700 border-red-300">+3%</span>
                                        </div>
                                    </div>
                                    <div class="p-4 rounded-lg border bg-gradient-to-br from-white to-gray-50">
                                        <p class="text-sm text-gray-600 mb-2">Desincorporados (Este Mes)</p>
                                        <p class="text-2xl font-bold text-gray-900 mb-1">12</p>
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm font-medium text-gray-700">$23,800</p><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-gray-100 text-gray-700 border-gray-300">+18%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0">
                            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                                <h4 data-slot="card-title" class="leading-none flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-5 h-5 text-blue-600">
                                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                        <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                        <path d="M10 9H8"></path>
                                        <path d="M16 13H8"></path>
                                        <path d="M16 17H8"></path>
                                    </svg>Reportes Generados Recientemente</h4>
                                <p data-slot="card-description" class="text-muted-foreground">Historial de reportes descargables</p>
                            </div>
                            <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between p-4 border rounded-lg hover:bg-gray-50 transition-colors">
                                        <div class="flex items-center gap-4">
                                            <div class="bg-blue-100 p-3 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-5 h-5 text-blue-600">
                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                    <path d="M10 9H8"></path>
                                                    <path d="M16 13H8"></path>
                                                    <path d="M16 17H8"></path>
                                                </svg></div>
                                            <div>
                                                <p class="font-medium text-gray-900">Inventario General - Diciembre 2025</p>
                                                <div class="flex items-center gap-3 mt-1"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&amp;]:hover:bg-accent [a&amp;]:hover:text-accent-foreground">General</span><span class="text-sm text-gray-500">2026-01-05</span><span class="text-sm text-gray-400">2.4 MB</span></div>
                                            </div>
                                        </div><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 text-blue-600 hover:text-blue-700"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download w-4 h-4">
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                <polyline points="7 10 12 15 17 10"></polyline>
                                                <line x1="12" x2="12" y1="15" y2="3"></line>
                                            </svg></button>
                                    </div>
                                    <div class="flex items-center justify-between p-4 border rounded-lg hover:bg-gray-50 transition-colors">
                                        <div class="flex items-center gap-4">
                                            <div class="bg-blue-100 p-3 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-5 h-5 text-blue-600">
                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                    <path d="M10 9H8"></path>
                                                    <path d="M16 13H8"></path>
                                                    <path d="M16 17H8"></path>
                                                </svg></div>
                                            <div>
                                                <p class="font-medium text-gray-900">Valorización Anual 2025</p>
                                                <div class="flex items-center gap-3 mt-1"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&amp;]:hover:bg-accent [a&amp;]:hover:text-accent-foreground">Financiero</span><span class="text-sm text-gray-500">2026-01-02</span><span class="text-sm text-gray-400">1.8 MB</span></div>
                                            </div>
                                        </div><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 text-blue-600 hover:text-blue-700"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download w-4 h-4">
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                <polyline points="7 10 12 15 17 10"></polyline>
                                                <line x1="12" x2="12" y1="15" y2="3"></line>
                                            </svg></button>
                                    </div>
                                    <div class="flex items-center justify-between p-4 border rounded-lg hover:bg-gray-50 transition-colors">
                                        <div class="flex items-center gap-4">
                                            <div class="bg-blue-100 p-3 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-5 h-5 text-blue-600">
                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                    <path d="M10 9H8"></path>
                                                    <path d="M16 13H8"></path>
                                                    <path d="M16 17H8"></path>
                                                </svg></div>
                                            <div>
                                                <p class="font-medium text-gray-900">Mantenimientos Q4 2025</p>
                                                <div class="flex items-center gap-3 mt-1"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&amp;]:hover:bg-accent [a&amp;]:hover:text-accent-foreground">Mantenimiento</span><span class="text-sm text-gray-500">2025-12-28</span><span class="text-sm text-gray-400">1.2 MB</span></div>
                                            </div>
                                        </div><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 text-blue-600 hover:text-blue-700"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download w-4 h-4">
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                <polyline points="7 10 12 15 17 10"></polyline>
                                                <line x1="12" x2="12" y1="15" y2="3"></line>
                                            </svg></button>
                                    </div>
                                    <div class="flex items-center justify-between p-4 border rounded-lg hover:bg-gray-50 transition-colors">
                                        <div class="flex items-center gap-4">
                                            <div class="bg-blue-100 p-3 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-5 h-5 text-blue-600">
                                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                    <path d="M10 9H8"></path>
                                                    <path d="M16 13H8"></path>
                                                    <path d="M16 17H8"></path>
                                                </svg></div>
                                            <div>
                                                <p class="font-medium text-gray-900">Análisis de Tendencias 2025</p>
                                                <div class="flex items-center gap-3 mt-1"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&amp;]:hover:bg-accent [a&amp;]:hover:text-accent-foreground">Analítico</span><span class="text-sm text-gray-500">2025-12-20</span><span class="text-sm text-gray-400">3.1 MB</span></div>
                                            </div>
                                        </div><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 text-blue-600 hover:text-blue-700"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download w-4 h-4">
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                <polyline points="7 10 12 15 17 10"></polyline>
                                                <line x1="12" x2="12" y1="15" y2="3"></line>
                                            </svg></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0">
                            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                                <h4 data-slot="card-title" class="leading-none flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-5 h-5 text-blue-600">
                                        <path d="M8 2v4"></path>
                                        <path d="M16 2v4"></path>
                                        <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                        <path d="M3 10h18"></path>
                                    </svg>Reportes Programados</h4>
                                <p data-slot="card-description" class="text-muted-foreground">Configure la generación automática de reportes</p>
                            </div>
                            <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6">
                                <div dir="ltr" data-orientation="horizontal" data-slot="tabs" class="flex flex-col gap-2">
                                    <div role="tablist" aria-orientation="horizontal" data-slot="tabs-list" class="bg-muted text-muted-foreground h-9 items-center justify-center rounded-xl p-[3px] grid w-full grid-cols-3" tabindex="0" data-orientation="horizontal" style="outline: none;"><button type="button" role="tab" aria-selected="true" aria-controls="radix-:r3:-content-weekly" data-state="active" id="radix-:r3:-trigger-weekly" data-slot="tabs-trigger" class="data-[state=active]:bg-card dark:data-[state=active]:text-foreground focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:outline-ring dark:data-[state=active]:border-input dark:data-[state=active]:bg-input/30 text-foreground dark:text-muted-foreground inline-flex h-[calc(100%-1px)] flex-1 items-center justify-center gap-1.5 rounded-xl border border-transparent px-2 py-1 text-sm font-medium whitespace-nowrap transition-[color,box-shadow] focus-visible:ring-[3px] focus-visible:outline-1 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:shrink-0 [&amp;_svg:not([class*='size-'])]:size-4" tabindex="-1" data-orientation="horizontal" data-radix-collection-item="">Semanal</button><button type="button" role="tab" aria-selected="false" aria-controls="radix-:r3:-content-monthly" data-state="inactive" id="radix-:r3:-trigger-monthly" data-slot="tabs-trigger" class="data-[state=active]:bg-card dark:data-[state=active]:text-foreground focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:outline-ring dark:data-[state=active]:border-input dark:data-[state=active]:bg-input/30 text-foreground dark:text-muted-foreground inline-flex h-[calc(100%-1px)] flex-1 items-center justify-center gap-1.5 rounded-xl border border-transparent px-2 py-1 text-sm font-medium whitespace-nowrap transition-[color,box-shadow] focus-visible:ring-[3px] focus-visible:outline-1 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:shrink-0 [&amp;_svg:not([class*='size-'])]:size-4" tabindex="-1" data-orientation="horizontal" data-radix-collection-item="">Mensual</button><button type="button" role="tab" aria-selected="false" aria-controls="radix-:r3:-content-quarterly" data-state="inactive" id="radix-:r3:-trigger-quarterly" data-slot="tabs-trigger" class="data-[state=active]:bg-card dark:data-[state=active]:text-foreground focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:outline-ring dark:data-[state=active]:border-input dark:data-[state=active]:bg-input/30 text-foreground dark:text-muted-foreground inline-flex h-[calc(100%-1px)] flex-1 items-center justify-center gap-1.5 rounded-xl border border-transparent px-2 py-1 text-sm font-medium whitespace-nowrap transition-[color,box-shadow] focus-visible:ring-[3px] focus-visible:outline-1 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:shrink-0 [&amp;_svg:not([class*='size-'])]:size-4" tabindex="-1" data-orientation="horizontal" data-radix-collection-item="">Trimestral</button></div>
                                    <div data-state="active" data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-:r3:-trigger-weekly" id="radix-:r3:-content-weekly" tabindex="0" data-slot="tabs-content" class="flex-1 outline-none space-y-4 pt-4" style="animation-duration: 0s;">
                                        <div class="p-4 bg-blue-50 rounded-lg border border-blue-200">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <p class="font-medium text-blue-900">Reporte Semanal de Inventario</p>
                                                    <p class="text-sm text-blue-700 mt-1">Cada lunes a las 8:00 AM</p>
                                                </div><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent text-primary-foreground [a&amp;]:hover:bg-primary/90 bg-blue-600">Activo</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-state="inactive" data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-:r3:-trigger-monthly" hidden="" id="radix-:r3:-content-monthly" tabindex="0" data-slot="tabs-content" class="flex-1 outline-none space-y-4 pt-4"></div>
                                    <div data-state="inactive" data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-:r3:-trigger-quarterly" hidden="" id="radix-:r3:-content-quarterly" tabindex="0" data-slot="tabs-content" class="flex-1 outline-none space-y-4 pt-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include __DIR__ . '/layouts/footer.php'; ?>
                </main>
            </div>
        </div>
    </div>
    


    <span id="recharts_measurement_span" aria-hidden="true" style="position: absolute; top: -20000px; left: 0px; padding: 0px; margin: 0px; border: none; white-space: pre; font-size: 12px; letter-spacing: normal;">65</span>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>