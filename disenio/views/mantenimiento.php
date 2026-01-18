<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimineto</title>
    <link rel="stylesheet" href="/disenio/css/styles.css">
    <link rel="stylesheet" href="/disenio/css/tuestilo.css">
    <link rel="stylesheet" href="/disenio/css/theme.css">
</head>

<body >
    <div id="root">
        <div class="flex h-screen bg-gray-50">
            <aside class="-translate-x-full lg:translate-x-0 fixed lg:static inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-blue-900 to-blue-800 text-white transition-transform duration-300 flex flex-col">
                <?php include __DIR__ . '/layouts/sidebar.php'; ?>
            </aside>
            <div class="flex-1 flex flex-col overflow-hidden w-full lg:w-auto">
                <header class="bg-white border-b border-gray-200 px-4 lg:px-6 py-3 lg:py-4 flex items-center justify-between shadow-sm">
                    <?php $page_title = 'Mantenimiento'; include __DIR__ . '/layouts/header.php'; ?>
                </header>
                <main class="flex-1 overflow-auto bg-gray-50 flex flex-col">
                    <div class="p-4 lg:p-6 space-y-4 lg:space-y-6 flex-1">
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4">
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg">
                                <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-blue-500 rounded-lg flex items-center justify-center mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench w-5 h-5 lg:w-6 lg:h-6 text-white">
                                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                                        </svg></div>
                                    <p class="text-xs lg:text-sm text-gray-600 mb-1">Programados</p>
                                    <p class="text-2xl lg:text-3xl font-bold text-gray-900">1</p>
                                </div>
                            </div>
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg">
                                <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-amber-500 rounded-lg flex items-center justify-center mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench w-5 h-5 lg:w-6 lg:h-6 text-white">
                                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                                        </svg></div>
                                    <p class="text-xs lg:text-sm text-gray-600 mb-1">En Proceso</p>
                                    <p class="text-2xl lg:text-3xl font-bold text-gray-900">1</p>
                                </div>
                            </div>
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg">
                                <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-emerald-500 rounded-lg flex items-center justify-center mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench w-5 h-5 lg:w-6 lg:h-6 text-white">
                                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                                        </svg></div>
                                    <p class="text-xs lg:text-sm text-gray-600 mb-1">Completados</p>
                                    <p class="text-2xl lg:text-3xl font-bold text-gray-900">1</p>
                                </div>
                            </div>
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg">
                                <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-red-500 rounded-lg flex items-center justify-center mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench w-5 h-5 lg:w-6 lg:h-6 text-white">
                                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                                        </svg></div>
                                    <p class="text-xs lg:text-sm text-gray-600 mb-1">Atrasados</p>
                                    <p class="text-2xl lg:text-3xl font-bold text-gray-900">1</p>
                                </div>
                            </div>
                        </div>
                        <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0">
                            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                                    <div>
                                        <h4 data-slot="card-title" class="flex items-center gap-2 text-base lg:text-xl"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench w-5 h-5 lg:w-6 lg:h-6 text-blue-600">
                                                <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                                            </svg>Gestión de Mantenimientos</h4>
                                        <p data-slot="card-description" class="text-muted-foreground text-xs lg:text-sm mt-1">Programa y da seguimiento a los mantenimientos</p>
                                    </div><button onclick="openReparacionModal()" data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive text-primary-foreground h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 bg-blue-600 hover:bg-blue-700"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-4 h-4 mr-2">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5v14"></path>
                                        </svg>Programar Mantenimiento</button>
                                </div>
                            </div>
                            <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6 space-y-4">
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <div class="flex-1 relative"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <path d="m21 21-4.3-4.3"></path>
                                        </svg><input data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border px-3 py-1 bg-input-background transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive pl-10 text-sm" placeholder="Buscar por bien o código..." value=""></div><button type="button" role="combobox" aria-controls="radix-:r2t:" aria-expanded="false" aria-autocomplete="none" dir="ltr" data-state="closed" data-slot="select-trigger" data-size="default" class="border-input data-[placeholder]:text-muted-foreground [&amp;_svg:not([class*='text-'])]:text-muted-foreground focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:bg-input/30 dark:hover:bg-input/50 flex items-center justify-between gap-2 rounded-md border bg-input-background px-3 py-2 whitespace-nowrap transition-[color,box-shadow] outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50 data-[size=default]:h-9 data-[size=sm]:h-8 *:data-[slot=select-value]:line-clamp-1 *:data-[slot=select-value]:flex *:data-[slot=select-value]:items-center *:data-[slot=select-value]:gap-2 [&amp;_svg]:pointer-events-none [&amp;_svg]:shrink-0 [&amp;_svg:not([class*='size-'])]:size-4 w-full sm:w-48 text-xs lg:text-sm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-funnel w-3 h-3 lg:w-4 lg:h-4 mr-2">
                                            <path d="M10 20a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341L21.74 4.67A1 1 0 0 0 21 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14z"></path>
                                        </svg><span data-slot="select-value" style="pointer-events: none;">Todos</span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down size-4 opacity-50" aria-hidden="true">
                                            <path d="m6 9 6 6 6-6"></path>
                                        </svg></button>
                                </div>

                                <!-- Toolbar: Items per page -->
                                <div class="flex justify-between items-center mb-4 mt-4">
                                     <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <span>Mostrar</span>
                                        <select class="border border-gray-300 rounded px-2 py-1 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent cursor-pointer">
                                            <option>10</option>
                                            <option>20</option>
                                            <option>50</option>
                                        </select>
                                        <span>Items</span>
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-sm hover:shadow-md transition-shadow">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex justify-between items-start mb-3">
                                                <div class="flex-1 min-w-0">
                                                    <p class="font-mono text-xs text-gray-500 mb-1">BN-2024-0001</p>
                                                    <h3 class="font-semibold text-sm mb-2">Computadora Dell OptiPlex 7090</h3>
                                                    <div class="flex flex-wrap gap-2"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&amp;]:hover:bg-primary/90 bg-blue-500 text-white text-xs">preventivo</span><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-blue-100 text-blue-700 border-blue-300 flex items-center gap-1 w-fit text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-3 h-3">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <polyline points="12 6 12 12 16 14"></polyline>
                                                            </svg>Programado</span></div>
                                                </div><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-4 h-4">
                                                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg></button>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3 text-xs mt-3 pt-3 border-t">
                                                <div>
                                                    <p class="text-gray-500 mb-1">Fecha Programada</p>
                                                    <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-3 h-3 text-gray-400">
                                                            <path d="M8 2v4"></path>
                                                            <path d="M16 2v4"></path>
                                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                            <path d="M3 10h18"></path>
                                                        </svg>
                                                        <p class="font-medium">19/1/2026</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Técnico</p>
                                                    <p class="font-medium truncate">Juan Pérez</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-sm hover:shadow-md transition-shadow">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex justify-between items-start mb-3">
                                                <div class="flex-1 min-w-0">
                                                    <p class="font-mono text-xs text-gray-500 mb-1">BN-2023-0156</p>
                                                    <h3 class="font-semibold text-sm mb-2">Monitor LG 27"</h3>
                                                    <div class="flex flex-wrap gap-2"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&amp;]:hover:bg-primary/90 bg-red-500 text-white text-xs">correctivo</span><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-amber-100 text-amber-700 border-amber-300 flex items-center gap-1 w-fit text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench w-3 h-3">
                                                                <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                                                            </svg>En Proceso</span></div>
                                                </div><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-4 h-4">
                                                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg></button>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3 text-xs mt-3 pt-3 border-t">
                                                <div>
                                                    <p class="text-gray-500 mb-1">Fecha Programada</p>
                                                    <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-3 h-3 text-gray-400">
                                                            <path d="M8 2v4"></path>
                                                            <path d="M16 2v4"></path>
                                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                            <path d="M3 10h18"></path>
                                                        </svg>
                                                        <p class="font-medium">14/1/2026</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Técnico</p>
                                                    <p class="font-medium truncate">María González</p>
                                                </div>
                                                <div class="col-span-2">
                                                    <p class="text-gray-500 mb-1">Costo</p>
                                                    <p class="font-semibold text-blue-600">$120</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-sm hover:shadow-md transition-shadow">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex justify-between items-start mb-3">
                                                <div class="flex-1 min-w-0">
                                                    <p class="font-mono text-xs text-gray-500 mb-1">BN-2024-0045</p>
                                                    <h3 class="font-semibold text-sm mb-2">Equipo de Ultrasonido</h3>
                                                    <div class="flex flex-wrap gap-2"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&amp;]:hover:bg-primary/90 bg-blue-500 text-white text-xs">preventivo</span><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300 flex items-center gap-1 w-fit text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-3 h-3">
                                                                <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                                                                <path d="m9 11 3 3L22 4"></path>
                                                            </svg>Completado</span></div>
                                                </div><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-4 h-4">
                                                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg></button>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3 text-xs mt-3 pt-3 border-t">
                                                <div>
                                                    <p class="text-gray-500 mb-1">Fecha Programada</p>
                                                    <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-3 h-3 text-gray-400">
                                                            <path d="M8 2v4"></path>
                                                            <path d="M16 2v4"></path>
                                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                            <path d="M3 10h18"></path>
                                                        </svg>
                                                        <p class="font-medium">9/1/2026</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Técnico</p>
                                                    <p class="font-medium truncate">Carlos Ruiz</p>
                                                </div>
                                                <div class="col-span-2">
                                                    <p class="text-gray-500 mb-1">Costo</p>
                                                    <p class="font-semibold text-blue-600">$450</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-sm hover:shadow-md transition-shadow">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex justify-between items-start mb-3">
                                                <div class="flex-1 min-w-0">
                                                    <p class="font-mono text-xs text-gray-500 mb-1">BN-2022-0089</p>
                                                    <h3 class="font-semibold text-sm mb-2">Impresora HP LaserJet</h3>
                                                    <div class="flex flex-wrap gap-2"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&amp;]:hover:bg-primary/90 bg-red-500 text-white text-xs">correctivo</span><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-red-100 text-red-700 border-red-300 flex items-center gap-1 w-fit text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-triangle-alert w-3 h-3">
                                                                <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"></path>
                                                                <path d="M12 9v4"></path>
                                                                <path d="M12 17h.01"></path>
                                                            </svg>Atrasado</span></div>
                                                </div><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-4 h-4">
                                                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg></button>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3 text-xs mt-3 pt-3 border-t">
                                                <div>
                                                    <p class="text-gray-500 mb-1">Fecha Programada</p>
                                                    <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-3 h-3 text-gray-400">
                                                            <path d="M8 2v4"></path>
                                                            <path d="M16 2v4"></path>
                                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                            <path d="M3 10h18"></path>
                                                        </svg>
                                                        <p class="font-medium">7/1/2026</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Técnico</p>
                                                    <p class="font-medium truncate">Luis Martínez</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Pagination -->
                                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-6 text-sm text-gray-500 border-t pt-4">
                                    <span>Mostrando <span class="font-bold text-gray-900">1</span> a <span class="font-bold text-gray-900">2</span> de <span class="font-bold text-gray-900">2</span> tareas</span>
                                    
                                    <div class="inline-flex items-center gap-1">
                                        <button class="p-2 rounded-md border border-gray-200 bg-white hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed text-gray-600" disabled>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center rounded-md bg-blue-600 text-white font-medium shadow-sm border border-blue-600">1</button>
                                        <button class="p-2 rounded-md border border-gray-200 bg-white hover:bg-gray-50 text-gray-600" disabled>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="text-xs lg:text-sm text-gray-500">Mostrando 4 de 4 registros</div>
                            </div>
                        </div>
                    </div>
                    <?php include __DIR__ . '/layouts/footer.php'; ?>
                </main>
            </div>
        </div>
    </div>
    


    <span id="recharts_measurement_span" aria-hidden="true" style="position: absolute; top: -20000px; left: 0px; padding: 0px; margin: 0px; border: none; white-space: pre; font-size: 12px; letter-spacing: normal;">65</span>
    <!-- Modal Container (Hidden by default) -->
    <div id="modalReparacionContainer" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm transition-all duration-300">
        <?php include __DIR__ . '/layouts/modal_reparacion.php'; ?>
    </div>

    <!-- Scripts -->
    <script>
        function openReparacionModal() {
            const modal = document.getElementById('modalReparacionContainer');
            modal.classList.remove('hidden');
        }

        function closeReparacionModal() {
            const modal = document.getElementById('modalReparacionContainer');
            modal.classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('modalReparacionContainer').addEventListener('click', function(e) {
            if (e.target === this) closeReparacionModal();
        });
    </script>
</body>

</html>