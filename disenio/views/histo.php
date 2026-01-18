<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial</title>
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
                    <?php $page_title = 'Historial'; include __DIR__ . '/layouts/header.php'; ?>
                </header>
                <main class="flex-1 overflow-auto bg-gray-50 flex flex-col">
                    <div class="p-4 lg:p-6 space-y-4 lg:space-y-6 flex-1">
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4">
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg">
                                <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                                    <div class="flex items-center gap-3 mb-2">
                                        <div class="w-10 h-10 lg:w-12 lg:h-12 bg-blue-500 rounded-lg flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-history w-5 h-5 lg:w-6 lg:h-6 text-white">
                                                <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path>
                                                <path d="M3 3v5h5"></path>
                                                <path d="M12 7v5l4 2"></path>
                                            </svg></div>
                                    </div>
                                    <p class="text-xs lg:text-sm text-gray-600 mb-1">Total Registros</p>
                                    <p class="text-2xl lg:text-3xl font-bold text-gray-900">6</p>
                                </div>
                            </div>
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg">
                                <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                                    <div class="flex items-center gap-3 mb-2">
                                        <div class="w-10 h-10 lg:w-12 lg:h-12 bg-emerald-500 rounded-lg flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-5 h-5 lg:w-6 lg:h-6 text-white">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5v14"></path>
                                            </svg></div>
                                    </div>
                                    <p class="text-xs lg:text-sm text-gray-600 mb-1">Creaciones</p>
                                    <p class="text-2xl lg:text-3xl font-bold text-gray-900">3</p>
                                </div>
                            </div>
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg">
                                <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                                    <div class="flex items-center gap-3 mb-2">
                                        <div class="w-10 h-10 lg:w-12 lg:h-12 bg-blue-500 rounded-lg flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen w-5 h-5 lg:w-6 lg:h-6 text-white">
                                                <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"></path>
                                            </svg></div>
                                    </div>
                                    <p class="text-xs lg:text-sm text-gray-600 mb-1">Ediciones</p>
                                    <p class="text-2xl lg:text-3xl font-bold text-gray-900">1</p>
                                </div>
                            </div>
                            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg">
                                <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                                    <div class="flex items-center gap-3 mb-2">
                                        <div class="w-10 h-10 lg:w-12 lg:h-12 bg-red-500 rounded-lg flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2 lucide-trash-2 w-5 h-5 lg:w-6 lg:h-6 text-white">
                                                <path d="M3 6h18"></path>
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                <line x1="10" x2="10" y1="11" y2="17"></line>
                                                <line x1="14" x2="14" y1="11" y2="17"></line>
                                            </svg></div>
                                    </div>
                                    <p class="text-xs lg:text-sm text-gray-600 mb-1">Eliminaciones</p>
                                    <p class="text-2xl lg:text-3xl font-bold text-gray-900">1</p>
                                </div>
                            </div>
                        </div>
                        <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0">
                            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                                    <div>
                                        <h4 data-slot="card-title" class="flex items-center gap-2 text-base lg:text-xl"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-history w-5 h-5 lg:w-6 lg:h-6 text-blue-600">
                                                <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path>
                                                <path d="M3 3v5h5"></path>
                                                <path d="M12 7v5l4 2"></path>
                                            </svg>Historial de Auditoría</h4>
                                        <p data-slot="card-description" class="text-muted-foreground text-xs lg:text-sm mt-1">Registro completo de todas las actividades del sistema</p>
                                    </div><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-background hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 border-emerald-200 text-emerald-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download w-4 h-4 mr-2">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                            <polyline points="7 10 12 15 17 10"></polyline>
                                            <line x1="12" x2="12" y1="15" y2="3"></line>
                                        </svg>Exportar Historial</button>
                                </div>
                            </div>
                            <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6 space-y-4">
                                <div class="flex flex-col gap-3">
                                    <div class="relative"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <path d="m21 21-4.3-4.3"></path>
                                        </svg><input data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border px-3 py-1 bg-input-background transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive pl-10 text-sm" placeholder="Buscar en historial..." value=""></div>
                                    <div class="grid grid-cols-2 gap-2"><button type="button" role="combobox" aria-controls="radix-:rm:" aria-expanded="false" aria-autocomplete="none" dir="ltr" data-state="closed" data-slot="select-trigger" data-size="default" class="border-input data-[placeholder]:text-muted-foreground [&amp;_svg:not([class*='text-'])]:text-muted-foreground focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:bg-input/30 dark:hover:bg-input/50 flex w-full items-center justify-between gap-2 rounded-md border bg-input-background px-3 py-2 whitespace-nowrap transition-[color,box-shadow] outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50 data-[size=default]:h-9 data-[size=sm]:h-8 *:data-[slot=select-value]:line-clamp-1 *:data-[slot=select-value]:flex *:data-[slot=select-value]:items-center *:data-[slot=select-value]:gap-2 [&amp;_svg]:pointer-events-none [&amp;_svg]:shrink-0 [&amp;_svg:not([class*='size-'])]:size-4 text-xs lg:text-sm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-funnel w-3 h-3 lg:w-4 lg:h-4 mr-1">
                                                <path d="M10 20a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341L21.74 4.67A1 1 0 0 0 21 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14z"></path>
                                            </svg><span data-slot="select-value" style="pointer-events: none;">Todos los módulos</span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down size-4 opacity-50" aria-hidden="true">
                                                <path d="m6 9 6 6 6-6"></path>
                                            </svg></button><button type="button" role="combobox" aria-controls="radix-:rn:" aria-expanded="false" aria-autocomplete="none" dir="ltr" data-state="closed" data-slot="select-trigger" data-size="default" class="border-input data-[placeholder]:text-muted-foreground [&amp;_svg:not([class*='text-'])]:text-muted-foreground focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:bg-input/30 dark:hover:bg-input/50 flex w-full items-center justify-between gap-2 rounded-md border bg-input-background px-3 py-2 whitespace-nowrap transition-[color,box-shadow] outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50 data-[size=default]:h-9 data-[size=sm]:h-8 *:data-[slot=select-value]:line-clamp-1 *:data-[slot=select-value]:flex *:data-[slot=select-value]:items-center *:data-[slot=select-value]:gap-2 [&amp;_svg]:pointer-events-none [&amp;_svg]:shrink-0 [&amp;_svg:not([class*='size-'])]:size-4 text-xs lg:text-sm"><span data-slot="select-value" style="pointer-events: none;">Todas las acciones</span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down size-4 opacity-50" aria-hidden="true">
                                                <path d="m6 9 6 6 6-6"></path>
                                            </svg></button></div>
                                </div>
                                <div class="space-y-3">
                                    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-sm hover:shadow-md transition-shadow">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex justify-between items-start mb-3">
                                                <div class="flex-1 min-w-0">
                                                    <div class="flex flex-wrap gap-2 mb-2"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&amp;]:hover:bg-primary/90 bg-blue-500 text-white text-xs">bienes</span><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300 flex items-center gap-1 w-fit text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-3 h-3">
                                                                <path d="M5 12h14"></path>
                                                                <path d="M12 5v14"></path>
                                                            </svg>Crear</span></div>
                                                    <p class="text-sm font-medium mb-1">Creó nuevo bien: Computadora Dell OptiPlex</p>
                                                    <p class="font-mono text-xs text-gray-500 mb-2">BN-2024-0001</p>
                                                </div><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-4 h-4">
                                                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg></button>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3 text-xs pt-3 border-t">
                                                <div>
                                                    <p class="text-gray-500 mb-1">Usuario</p>
                                                    <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user w-3 h-3 text-gray-400">
                                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <p class="font-medium truncate">María González</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Fecha y Hora</p>
                                                    <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-3 h-3 text-gray-400">
                                                            <path d="M8 2v4"></path>
                                                            <path d="M16 2v4"></path>
                                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                            <path d="M3 10h18"></path>
                                                        </svg>
                                                        <p class="font-medium">12/1/2026, 10:30:45</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-sm hover:shadow-md transition-shadow">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex justify-between items-start mb-3">
                                                <div class="flex-1 min-w-0">
                                                    <div class="flex flex-wrap gap-2 mb-2"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&amp;]:hover:bg-primary/90 bg-blue-500 text-white text-xs">bienes</span><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-amber-100 text-amber-700 border-amber-300 flex items-center gap-1 w-fit text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-3 h-3">
                                                                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                                <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                                                <path d="M10 9H8"></path>
                                                                <path d="M16 13H8"></path>
                                                                <path d="M16 17H8"></path>
                                                            </svg>Cambio Estado</span></div>
                                                    <p class="text-sm font-medium mb-1">Cambió estado de bien</p>
                                                    <p class="font-mono text-xs text-gray-500 mb-2">BN-2023-0156</p>
                                                </div><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-4 h-4">
                                                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg></button>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3 text-xs pt-3 border-t">
                                                <div>
                                                    <p class="text-gray-500 mb-1">Usuario</p>
                                                    <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user w-3 h-3 text-gray-400">
                                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <p class="font-medium truncate">Carlos Ramírez</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Fecha y Hora</p>
                                                    <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-3 h-3 text-gray-400">
                                                            <path d="M8 2v4"></path>
                                                            <path d="M16 2v4"></path>
                                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                            <path d="M3 10h18"></path>
                                                        </svg>
                                                        <p class="font-medium">12/1/2026, 9:15:22</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3 pt-3 border-t">
                                                <div class="grid grid-cols-2 gap-2 text-xs">
                                                    <div>
                                                        <p class="text-gray-500 mb-1">Valor Anterior</p>
                                                        <p class="font-medium text-red-600">Operativo</p>
                                                    </div>
                                                    <div>
                                                        <p class="text-gray-500 mb-1">Valor Nuevo</p>
                                                        <p class="font-medium text-emerald-600">Mantenimiento</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-sm hover:shadow-md transition-shadow">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex justify-between items-start mb-3">
                                                <div class="flex-1 min-w-0">
                                                    <div class="flex flex-wrap gap-2 mb-2"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&amp;]:hover:bg-primary/90 bg-amber-500 text-white text-xs">mantenimiento</span><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-blue-100 text-blue-700 border-blue-300 flex items-center gap-1 w-fit text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen w-3 h-3">
                                                                <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                                <path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"></path>
                                                            </svg>Editar</span></div>
                                                    <p class="text-sm font-medium mb-1">Actualizó programación de mantenimiento</p>
                                                    <p class="font-mono text-xs text-gray-500 mb-2">BN-2024-0045</p>
                                                </div><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-4 h-4">
                                                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg></button>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3 text-xs pt-3 border-t">
                                                <div>
                                                    <p class="text-gray-500 mb-1">Usuario</p>
                                                    <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user w-3 h-3 text-gray-400">
                                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <p class="font-medium truncate">Ana Martínez</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Fecha y Hora</p>
                                                    <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-3 h-3 text-gray-400">
                                                            <path d="M8 2v4"></path>
                                                            <path d="M16 2v4"></path>
                                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                            <path d="M3 10h18"></path>
                                                        </svg>
                                                        <p class="font-medium">11/1/2026, 16:45:10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-sm hover:shadow-md transition-shadow">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex justify-between items-start mb-3">
                                                <div class="flex-1 min-w-0">
                                                    <div class="flex flex-wrap gap-2 mb-2"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&amp;]:hover:bg-primary/90 bg-purple-500 text-white text-xs">usuarios</span><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300 flex items-center gap-1 w-fit text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-3 h-3">
                                                                <path d="M5 12h14"></path>
                                                                <path d="M12 5v14"></path>
                                                            </svg>Crear</span></div>
                                                    <p class="text-sm font-medium mb-1">Creó nuevo usuario: Pedro López</p>
                                                </div><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-4 h-4">
                                                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg></button>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3 text-xs pt-3 border-t">
                                                <div>
                                                    <p class="text-gray-500 mb-1">Usuario</p>
                                                    <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user w-3 h-3 text-gray-400">
                                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <p class="font-medium truncate">María González</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Fecha y Hora</p>
                                                    <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-3 h-3 text-gray-400">
                                                            <path d="M8 2v4"></path>
                                                            <path d="M16 2v4"></path>
                                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                            <path d="M3 10h18"></path>
                                                        </svg>
                                                        <p class="font-medium">11/1/2026, 14:20:33</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-sm hover:shadow-md transition-shadow">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex justify-between items-start mb-3">
                                                <div class="flex-1 min-w-0">
                                                    <div class="flex flex-wrap gap-2 mb-2"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&amp;]:hover:bg-primary/90 bg-blue-500 text-white text-xs">bienes</span><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-red-100 text-red-700 border-red-300 flex items-center gap-1 w-fit text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2 lucide-trash-2 w-3 h-3">
                                                                <path d="M3 6h18"></path>
                                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                                <line x1="10" x2="10" y1="11" y2="17"></line>
                                                                <line x1="14" x2="14" y1="11" y2="17"></line>
                                                            </svg>Eliminar</span></div>
                                                    <p class="text-sm font-medium mb-1">Desincorporó bien obsoleto</p>
                                                    <p class="font-mono text-xs text-gray-500 mb-2">BN-2021-0045</p>
                                                </div><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-4 h-4">
                                                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg></button>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3 text-xs pt-3 border-t">
                                                <div>
                                                    <p class="text-gray-500 mb-1">Usuario</p>
                                                    <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user w-3 h-3 text-gray-400">
                                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <p class="font-medium truncate">Carlos Ramírez</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Fecha y Hora</p>
                                                    <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-3 h-3 text-gray-400">
                                                            <path d="M8 2v4"></path>
                                                            <path d="M16 2v4"></path>
                                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                            <path d="M3 10h18"></path>
                                                        </svg>
                                                        <p class="font-medium">10/1/2026, 11:05:18</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-sm hover:shadow-md transition-shadow">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex justify-between items-start mb-3">
                                                <div class="flex-1 min-w-0">
                                                    <div class="flex flex-wrap gap-2 mb-2"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&amp;]:hover:bg-primary/90 bg-emerald-500 text-white text-xs">reportes</span><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300 flex items-center gap-1 w-fit text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-3 h-3">
                                                                <path d="M5 12h14"></path>
                                                                <path d="M12 5v14"></path>
                                                            </svg>Crear</span></div>
                                                    <p class="text-sm font-medium mb-1">Generó reporte mensual de inventario</p>
                                                </div><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-4 h-4">
                                                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg></button>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3 text-xs pt-3 border-t">
                                                <div>
                                                    <p class="text-gray-500 mb-1">Usuario</p>
                                                    <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user w-3 h-3 text-gray-400">
                                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                        <p class="font-medium truncate">Ana Martínez</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Fecha y Hora</p>
                                                    <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-3 h-3 text-gray-400">
                                                            <path d="M8 2v4"></path>
                                                            <path d="M16 2v4"></path>
                                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                                            <path d="M3 10h18"></path>
                                                        </svg>
                                                        <p class="font-medium">10/1/2026, 8:30:12</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs lg:text-sm text-gray-500">Mostrando 6 de 6 registros</div>
                            </div>
                        </div>
                    </div>
                    <?php include __DIR__ . '/layouts/footer.php'; ?>
                </main>
            </div>
        </div>
    </div>
    


    <span id="recharts_measurement_span" aria-hidden="true" style="position: absolute; top: -20000px; left: 0px; padding: 0px; margin: 0px; border: none; white-space: pre; font-size: 12px; letter-spacing: normal;">65</span>
</body>

</html>