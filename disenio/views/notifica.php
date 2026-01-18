<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificaciones</title>
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
                    <?php $page_title = 'Notificaciones'; include __DIR__ . '/layouts/header.php'; ?>
                </header>
                <main class="flex-1 overflow-auto p-4 lg:p-6 bg-gray-50">
                    <div class="space-y-4 lg:space-y-6">
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4">
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg">
                                <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-blue-500 rounded-lg flex items-center justify-center mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell w-5 h-5 lg:w-6 lg:h-6 text-white">
                                            <path d="M10.268 21a2 2 0 0 0 3.464 0"></path>
                                            <path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"></path>
                                        </svg></div>
                                    <p class="text-xs lg:text-sm text-gray-600 mb-1">Total</p>
                                    <p class="text-2xl lg:text-3xl font-bold text-gray-900">6</p>
                                </div>
                            </div>
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg">
                                <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-amber-500 rounded-lg flex items-center justify-center mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-5 h-5 lg:w-6 lg:h-6 text-white">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg></div>
                                    <p class="text-xs lg:text-sm text-gray-600 mb-1">No Leídas</p>
                                    <p class="text-2xl lg:text-3xl font-bold text-gray-900">3</p>
                                </div>
                            </div>
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg">
                                <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-emerald-500 rounded-lg flex items-center justify-center mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-5 h-5 lg:w-6 lg:h-6 text-white">
                                            <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                                            <path d="m9 11 3 3L22 4"></path>
                                        </svg></div>
                                    <p class="text-xs lg:text-sm text-gray-600 mb-1">Leídas</p>
                                    <p class="text-2xl lg:text-3xl font-bold text-gray-900">3</p>
                                </div>
                            </div>
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg">
                                <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-red-500 rounded-lg flex items-center justify-center mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-triangle-alert w-5 h-5 lg:w-6 lg:h-6 text-white">
                                            <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"></path>
                                            <path d="M12 9v4"></path>
                                            <path d="M12 17h.01"></path>
                                        </svg></div>
                                    <p class="text-xs lg:text-sm text-gray-600 mb-1">Urgentes</p>
                                    <p class="text-2xl lg:text-3xl font-bold text-gray-900">1</p>
                                </div>
                            </div>
                        </div>
                        <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0">
                            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                                    <div>
                                        <h4 data-slot="card-title" class="flex items-center gap-2 text-base lg:text-xl"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell w-5 h-5 lg:w-6 lg:h-6 text-blue-600">
                                                <path d="M10.268 21a2 2 0 0 0 3.464 0"></path>
                                                <path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"></path>
                                            </svg>Notificaciones<span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&amp;]:hover:bg-primary/90 bg-red-500 text-white ml-2">3</span></h4>
                                        <p data-slot="card-description" class="text-muted-foreground text-xs lg:text-sm mt-1">Centro de notificaciones y alertas del sistema</p>
                                    </div><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-background hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 border-blue-200 text-blue-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check w-4 h-4 mr-2">
                                            <path d="M20 6 9 17l-5-5"></path>
                                        </svg>Marcar Todas como Leídas</button>
                                </div>
                            </div>
                            <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6 space-y-4">
                                <div class="flex flex-col gap-3">
                                    <div dir="ltr" data-orientation="horizontal" data-slot="tabs" class="flex flex-col gap-2 w-full">
                                        <div role="tablist" aria-orientation="horizontal" data-slot="tabs-list" class="bg-muted text-muted-foreground h-9 items-center justify-center rounded-xl p-[3px] grid w-full grid-cols-3" tabindex="0" data-orientation="horizontal" style="outline: none;"><button type="button" role="tab" aria-selected="true" aria-controls="radix-:r2d:-content-todas" data-state="active" id="radix-:r2d:-trigger-todas" data-slot="tabs-trigger" class="data-[state=active]:bg-card dark:data-[state=active]:text-foreground focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:outline-ring dark:data-[state=active]:border-input dark:data-[state=active]:bg-input/30 text-foreground dark:text-muted-foreground inline-flex h-[calc(100%-1px)] flex-1 items-center justify-center gap-1.5 rounded-xl border border-transparent px-2 py-1 font-medium whitespace-nowrap transition-[color,box-shadow] focus-visible:ring-[3px] focus-visible:outline-1 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:shrink-0 [&amp;_svg:not([class*='size-'])]:size-4 text-xs lg:text-sm" tabindex="-1" data-orientation="horizontal" data-radix-collection-item="">Todas</button><button type="button" role="tab" aria-selected="false" aria-controls="radix-:r2d:-content-no_leidas" data-state="inactive" id="radix-:r2d:-trigger-no_leidas" data-slot="tabs-trigger" class="data-[state=active]:bg-card dark:data-[state=active]:text-foreground focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:outline-ring dark:data-[state=active]:border-input dark:data-[state=active]:bg-input/30 text-foreground dark:text-muted-foreground inline-flex h-[calc(100%-1px)] flex-1 items-center justify-center gap-1.5 rounded-xl border border-transparent px-2 py-1 font-medium whitespace-nowrap transition-[color,box-shadow] focus-visible:ring-[3px] focus-visible:outline-1 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:shrink-0 [&amp;_svg:not([class*='size-'])]:size-4 text-xs lg:text-sm" tabindex="-1" data-orientation="horizontal" data-radix-collection-item="">No Leídas<span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&amp;]:hover:bg-primary/90 bg-red-500 text-white ml-1 text-xs">3</span></button><button type="button" role="tab" aria-selected="false" aria-controls="radix-:r2d:-content-leidas" data-state="inactive" id="radix-:r2d:-trigger-leidas" data-slot="tabs-trigger" class="data-[state=active]:bg-card dark:data-[state=active]:text-foreground focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:outline-ring dark:data-[state=active]:border-input dark:data-[state=active]:bg-input/30 text-foreground dark:text-muted-foreground inline-flex h-[calc(100%-1px)] flex-1 items-center justify-center gap-1.5 rounded-xl border border-transparent px-2 py-1 font-medium whitespace-nowrap transition-[color,box-shadow] focus-visible:ring-[3px] focus-visible:outline-1 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:shrink-0 [&amp;_svg:not([class*='size-'])]:size-4 text-xs lg:text-sm" tabindex="-1" data-orientation="horizontal" data-radix-collection-item="">Leídas</button></div>
                                    </div><button type="button" role="combobox" aria-controls="radix-:r2h:" aria-expanded="false" aria-autocomplete="none" dir="ltr" data-state="closed" data-slot="select-trigger" data-size="default" class="border-input data-[placeholder]:text-muted-foreground [&amp;_svg:not([class*='text-'])]:text-muted-foreground focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:bg-input/30 dark:hover:bg-input/50 flex w-full items-center justify-between gap-2 rounded-md border bg-input-background px-3 py-2 whitespace-nowrap transition-[color,box-shadow] outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50 data-[size=default]:h-9 data-[size=sm]:h-8 *:data-[slot=select-value]:line-clamp-1 *:data-[slot=select-value]:flex *:data-[slot=select-value]:items-center *:data-[slot=select-value]:gap-2 [&amp;_svg]:pointer-events-none [&amp;_svg]:shrink-0 [&amp;_svg:not([class*='size-'])]:size-4 text-xs lg:text-sm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-funnel w-3 h-3 lg:w-4 lg:h-4 mr-2">
                                            <path d="M10 20a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341L21.74 4.67A1 1 0 0 0 21 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14z"></path>
                                        </svg><span data-slot="select-value" style="pointer-events: none;">Todos los tipos</span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down size-4 opacity-50" aria-hidden="true">
                                            <path d="m6 9 6 6 6-6"></path>
                                        </svg></button>
                                </div>
                                <div class="space-y-3">
                                    <div data-slot="card" class="text-card-foreground flex flex-col gap-6 rounded-xl border border-l-4 bg-amber-50 border-l-amber-500 shadow-md">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex gap-3">
                                                <div class="flex-shrink-0 pt-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-triangle-alert w-5 h-5 text-amber-600">
                                                        <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"></path>
                                                        <path d="M12 9v4"></path>
                                                        <path d="M12 17h.01"></path>
                                                    </svg></div>
                                                <div class="flex-1 min-w-0">
                                                    <div class="flex items-start justify-between gap-2 mb-2">
                                                        <h3 class="font-semibold text-sm lg:text-base">Mantenimiento Programado Próximo</h3><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&amp;]:hover:bg-primary/90 bg-blue-500 text-white text-xs flex-shrink-0">Nuevo</span>
                                                    </div>
                                                    <p class="text-xs lg:text-sm text-gray-600 mb-3">El mantenimiento del bien BN-2024-0001 está programado para mañana</p>
                                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                                                        <div class="flex items-center gap-2 text-xs text-gray-500"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-3 h-3">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <polyline points="12 6 12 12 16 14"></polyline>
                                                            </svg><span>12/1/2026, 10:30:00</span><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&amp;]:hover:bg-accent [a&amp;]:hover:text-accent-foreground text-xs">mantenimiento</span></div>
                                                        <div class="flex gap-2"><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent dark:hover:bg-accent/50 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 text-blue-600 hover:text-blue-700 h-8 text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check w-3 h-3 mr-1">
                                                                    <path d="M20 6 9 17l-5-5"></path>
                                                                </svg>Marcar leída</button><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent dark:hover:bg-accent/50 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 text-red-600 hover:text-red-700 h-8 text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x w-3 h-3 mr-1">
                                                                    <path d="M18 6 6 18"></path>
                                                                    <path d="m6 6 12 12"></path>
                                                                </svg>Eliminar</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-slot="card" class="text-card-foreground flex flex-col gap-6 rounded-xl border border-l-4 bg-red-50 border-l-red-500 shadow-md">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex gap-3">
                                                <div class="flex-shrink-0 pt-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x w-5 h-5 text-red-600">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <path d="m15 9-6 6"></path>
                                                        <path d="m9 9 6 6"></path>
                                                    </svg></div>
                                                <div class="flex-1 min-w-0">
                                                    <div class="flex items-start justify-between gap-2 mb-2">
                                                        <h3 class="font-semibold text-sm lg:text-base">Mantenimiento Atrasado</h3><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&amp;]:hover:bg-primary/90 bg-blue-500 text-white text-xs flex-shrink-0">Nuevo</span>
                                                    </div>
                                                    <p class="text-xs lg:text-sm text-gray-600 mb-3">El mantenimiento del bien BN-2022-0089 está atrasado desde hace 4 días</p>
                                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                                                        <div class="flex items-center gap-2 text-xs text-gray-500"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-3 h-3">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <polyline points="12 6 12 12 16 14"></polyline>
                                                            </svg><span>12/1/2026, 9:15:00</span><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&amp;]:hover:bg-accent [a&amp;]:hover:text-accent-foreground text-xs">mantenimiento</span></div>
                                                        <div class="flex gap-2"><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent dark:hover:bg-accent/50 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 text-blue-600 hover:text-blue-700 h-8 text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check w-3 h-3 mr-1">
                                                                    <path d="M20 6 9 17l-5-5"></path>
                                                                </svg>Marcar leída</button><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent dark:hover:bg-accent/50 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 text-red-600 hover:text-red-700 h-8 text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x w-3 h-3 mr-1">
                                                                    <path d="M18 6 6 18"></path>
                                                                    <path d="m6 6 12 12"></path>
                                                                </svg>Eliminar</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-slot="card" class="text-card-foreground flex flex-col gap-6 rounded-xl border border-l-4 bg-emerald-50 border-l-emerald-500 opacity-75">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex gap-3">
                                                <div class="flex-shrink-0 pt-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-5 h-5 text-emerald-600">
                                                        <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                                                        <path d="m9 11 3 3L22 4"></path>
                                                    </svg></div>
                                                <div class="flex-1 min-w-0">
                                                    <div class="flex items-start justify-between gap-2 mb-2">
                                                        <h3 class="font-semibold text-sm lg:text-base">Bien Registrado</h3>
                                                    </div>
                                                    <p class="text-xs lg:text-sm text-gray-600 mb-3">Se ha registrado exitosamente el bien BN-2024-0001</p>
                                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                                                        <div class="flex items-center gap-2 text-xs text-gray-500"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-3 h-3">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <polyline points="12 6 12 12 16 14"></polyline>
                                                            </svg><span>11/1/2026, 16:45:00</span><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&amp;]:hover:bg-accent [a&amp;]:hover:text-accent-foreground text-xs">bienes</span></div>
                                                        <div class="flex gap-2"><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent dark:hover:bg-accent/50 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 text-red-600 hover:text-red-700 h-8 text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x w-3 h-3 mr-1">
                                                                    <path d="M18 6 6 18"></path>
                                                                    <path d="m6 6 12 12"></path>
                                                                </svg>Eliminar</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-slot="card" class="text-card-foreground flex flex-col gap-6 rounded-xl border border-l-4 bg-blue-50 border-l-blue-500 opacity-75">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex gap-3">
                                                <div class="flex-shrink-0 pt-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info w-5 h-5 text-blue-600">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <path d="M12 16v-4"></path>
                                                        <path d="M12 8h.01"></path>
                                                    </svg></div>
                                                <div class="flex-1 min-w-0">
                                                    <div class="flex items-start justify-between gap-2 mb-2">
                                                        <h3 class="font-semibold text-sm lg:text-base">Reporte Generado</h3>
                                                    </div>
                                                    <p class="text-xs lg:text-sm text-gray-600 mb-3">El reporte mensual de inventario está disponible para descargar</p>
                                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                                                        <div class="flex items-center gap-2 text-xs text-gray-500"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-3 h-3">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <polyline points="12 6 12 12 16 14"></polyline>
                                                            </svg><span>11/1/2026, 14:20:00</span><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&amp;]:hover:bg-accent [a&amp;]:hover:text-accent-foreground text-xs">sistema</span></div>
                                                        <div class="flex gap-2"><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent dark:hover:bg-accent/50 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 text-red-600 hover:text-red-700 h-8 text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x w-3 h-3 mr-1">
                                                                    <path d="M18 6 6 18"></path>
                                                                    <path d="m6 6 12 12"></path>
                                                                </svg>Eliminar</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-slot="card" class="text-card-foreground flex flex-col gap-6 rounded-xl border border-l-4 bg-amber-50 border-l-amber-500 shadow-md">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex gap-3">
                                                <div class="flex-shrink-0 pt-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-triangle-alert w-5 h-5 text-amber-600">
                                                        <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"></path>
                                                        <path d="M12 9v4"></path>
                                                        <path d="M12 17h.01"></path>
                                                    </svg></div>
                                                <div class="flex-1 min-w-0">
                                                    <div class="flex items-start justify-between gap-2 mb-2">
                                                        <h3 class="font-semibold text-sm lg:text-base">Bajo Inventario</h3><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&amp;]:hover:bg-primary/90 bg-blue-500 text-white text-xs flex-shrink-0">Nuevo</span>
                                                    </div>
                                                    <p class="text-xs lg:text-sm text-gray-600 mb-3">La cantidad de sillas ergonómicas está por debajo del mínimo</p>
                                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                                                        <div class="flex items-center gap-2 text-xs text-gray-500"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-3 h-3">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <polyline points="12 6 12 12 16 14"></polyline>
                                                            </svg><span>10/1/2026, 11:05:00</span><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&amp;]:hover:bg-accent [a&amp;]:hover:text-accent-foreground text-xs">bienes</span></div>
                                                        <div class="flex gap-2"><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent dark:hover:bg-accent/50 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 text-blue-600 hover:text-blue-700 h-8 text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check w-3 h-3 mr-1">
                                                                    <path d="M20 6 9 17l-5-5"></path>
                                                                </svg>Marcar leída</button><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent dark:hover:bg-accent/50 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 text-red-600 hover:text-red-700 h-8 text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x w-3 h-3 mr-1">
                                                                    <path d="M18 6 6 18"></path>
                                                                    <path d="m6 6 12 12"></path>
                                                                </svg>Eliminar</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-slot="card" class="text-card-foreground flex flex-col gap-6 rounded-xl border border-l-4 bg-blue-50 border-l-blue-500 opacity-75">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex gap-3">
                                                <div class="flex-shrink-0 pt-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info w-5 h-5 text-blue-600">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <path d="M12 16v-4"></path>
                                                        <path d="M12 8h.01"></path>
                                                    </svg></div>
                                                <div class="flex-1 min-w-0">
                                                    <div class="flex items-start justify-between gap-2 mb-2">
                                                        <h3 class="font-semibold text-sm lg:text-base">Actualización del Sistema</h3>
                                                    </div>
                                                    <p class="text-xs lg:text-sm text-gray-600 mb-3">El sistema se actualizará el próximo lunes a las 02:00 AM</p>
                                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                                                        <div class="flex items-center gap-2 text-xs text-gray-500"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-3 h-3">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <polyline points="12 6 12 12 16 14"></polyline>
                                                            </svg><span>10/1/2026, 8:30:00</span><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&amp;]:hover:bg-accent [a&amp;]:hover:text-accent-foreground text-xs">sistema</span></div>
                                                        <div class="flex gap-2"><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent dark:hover:bg-accent/50 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 text-red-600 hover:text-red-700 h-8 text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x w-3 h-3 mr-1">
                                                                    <path d="M18 6 6 18"></path>
                                                                    <path d="m6 6 12 12"></path>
                                                                </svg>Eliminar</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs lg:text-sm text-gray-500">Mostrando 6 notificaciones</div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    


    <span id="recharts_measurement_span" aria-hidden="true" style="position: absolute; top: -20000px; left: 0px; padding: 0px; margin: 0px; border: none; white-space: pre; font-size: 12px; letter-spacing: normal;">65</span>
</body>

</html>