<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Bienes</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="/disenio/css/styles.css">
    <link rel="stylesheet" href="/disenio/css/tuestilo.css">
    <link rel="stylesheet" href="/disenio/css/theme.css">

</head>

<body>
    <div id="root">
        <div class="flex h-screen bg-gray-50">
                <!-- sidebar sidebar  -->
            <aside class="-translate-x-full lg:translate-x-0 fixed lg:static inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-blue-900 to-blue-800 text-white transition-transform duration-300 flex flex-col">
                <?php include __DIR__ . '/layouts/sidebar.php'; ?>
            </aside>

            <div class="flex-1 flex flex-col overflow-hidden w-full lg:w-auto">
                 
                <header class="bg-white border-b border-gray-200 px-4 lg:px-6 py-3 lg:py-4 flex items-center justify-between shadow-sm">
                    <?php $page_title = 'Movimientos y Asignaciones'; include __DIR__. '/layouts/header.php'; ?>
                </header>
                
                <!-- main content  -->
                <main class="flex-1 overflow-auto bg-gray-50 flex flex-col">
                    <div class="p-4 lg:p-6 space-y-4 lg:space-y-6 flex-1">
                        <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0">
                            <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                                <div class="flex flex-col gap-4">
                                    <div class="flex items-start justify-between gap-4">
                                        
                                        <div class="min-w-0 flex-1">
                                            <h4 data-slot="card-title" class="flex items-center gap-2 text-base lg:text-xl">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right-left w-5 h-5 lg:w-6 lg:h-6 text-blue-600 flex-shrink-0">
                                                    <path d="m16 3 4 4-4 4"></path>
                                                    <path d="M20 7H4"></path>
                                                    <path d="m8 21-4-4 4-4"></path>
                                                    <path d="M4 17h16"></path>
                                                </svg>
                                                <span class="truncate">Historial de Movimientos</span>
                                            </h4>
                                            <p data-slot="card-description" class="text-muted-foreground text-xs lg:text-sm mt-1">Registro de traslados y asignaciones de activos</p>
                                        </div>

                                        <div class="flex items-center justify-end gap-2">
                                            <button onclick=" Swal.fire('Funcionalidad Pendiente', 'Formulario para Traslados', 'info')" data-slot="button" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive text-primary-foreground h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 bg-amber-600 hover:bg-amber-700 flex-shrink-0 text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-truck w-4 h-4 lg:mr-2">
                                                    <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"/><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/>
                                                </svg>
                                                <span class="hidden lg:inline">Nuevo Traslado</span>
                                            </button>
                                            <button onclick=" Swal.fire('Funcionalidad Pendiente', 'Formulario para Asignación', 'info')" data-slot="button" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive text-primary-foreground h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 bg-blue-600 hover:bg-blue-700 flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-plus w-4 h-4 lg:mr-2">
                                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/>
                                                </svg>
                                                <span class="hidden lg:inline">Asignar</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="flex gap-2 lg:hidden"><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-background hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 flex-1 border-blue-200 text-blue-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-upload w-4 h-4 mr-1">
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                <polyline points="17 8 12 3 7 8"></polyline>
                                                <line x1="12" x2="12" y1="3" y2="15"></line>
                                            </svg>Importar</button><button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-background hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 flex-1 border-emerald-200 text-emerald-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download w-4 h-4 mr-1">
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                <polyline points="7 10 12 15 17 10"></polyline>
                                                <line x1="12" x2="12" y1="15" y2="3"></line>
                                            </svg>Exportar</button></div>
                                </div>
                            </div>
                            <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6 space-y-4">
                                <div class="flex flex-col gap-3">
                                    <div class="relative"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <path d="m21 21-4.3-4.3"></path>
                                        </svg><input data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border px-3 py-1 bg-input-background transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive pl-10 text-sm" placeholder="Buscar por código o nombre..." value=""></div>
                                    <div class="grid grid-cols-2 gap-2"><button type="button" role="combobox" aria-controls="radix-:r0:" aria-expanded="false" aria-autocomplete="none" dir="ltr" data-state="closed" data-slot="select-trigger" data-size="default" class="border-input data-[placeholder]:text-muted-foreground [&amp;_svg:not([class*='text-'])]:text-muted-foreground focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:bg-input/30 dark:hover:bg-input/50 flex w-full items-center justify-between gap-2 rounded-md border bg-input-background px-3 py-2 whitespace-nowrap transition-[color,box-shadow] outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50 data-[size=default]:h-9 data-[size=sm]:h-8 *:data-[slot=select-value]:line-clamp-1 *:data-[slot=select-value]:flex *:data-[slot=select-value]:items-center *:data-[slot=select-value]:gap-2 [&amp;_svg]:pointer-events-none [&amp;_svg]:shrink-0 [&amp;_svg:not([class*='size-'])]:size-4 text-xs lg:text-sm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-funnel w-3 h-3 lg:w-4 lg:h-4 mr-1 flex-shrink-0">
                                                <path d="M10 20a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341L21.74 4.67A1 1 0 0 0 21 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14z"></path>
                                            </svg><span data-slot="select-value" style="pointer-events: none;">Todos</span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down size-4 opacity-50" aria-hidden="true">
                                                <path d="m6 9 6 6 6-6"></path>
                                            </svg></button><button type="button" role="combobox" aria-controls="radix-:r1:" aria-expanded="false" aria-autocomplete="none" dir="ltr" data-state="closed" data-slot="select-trigger" data-size="default" class="border-input data-[placeholder]:text-muted-foreground [&amp;_svg:not([class*='text-'])]:text-muted-foreground focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:bg-input/30 dark:hover:bg-input/50 flex w-full items-center justify-between gap-2 rounded-md border bg-input-background px-3 py-2 whitespace-nowrap transition-[color,box-shadow] outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50 data-[size=default]:h-9 data-[size=sm]:h-8 *:data-[slot=select-value]:line-clamp-1 *:data-[slot=select-value]:flex *:data-[slot=select-value]:items-center *:data-[slot=select-value]:gap-2 [&amp;_svg]:pointer-events-none [&amp;_svg]:shrink-0 [&amp;_svg:not([class*='size-'])]:size-4 text-xs lg:text-sm"><span data-slot="select-value" style="pointer-events: none;">Todas</span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down size-4 opacity-50" aria-hidden="true">
                                                <path d="m6 9 6 6 6-6"></path>
                                            </svg></button></div>
                                </div>

                                <div class="hidden lg:block border rounded-lg overflow-hidden">
                                    <div data-slot="table-container" class="relative w-full overflow-x-auto">
                                        <div class="p-4">
                                        
                                        <!-- Table Toolbar: Row Filter (Mockup) -->
                                        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-4 pt-2">
                                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                                <span>Mostrar</span>
                                                <select class="border border-gray-300 rounded px-2 py-1 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent cursor-pointer">
                                                    <option>10</option>
                                                    <option>20</option>
                                                    <option>50</option>
                                                </select>
                                                <span>filas</span>
                                            </div>
                                        </div>

                                        <!-- Tabla de bienes -->
                                        <table data-slot="table" class="w-full caption-bottom text-sm">
                                            <thead data-slot="table-header" class="[&amp;_tr]:border-b">
                                                <tr data-slot="table-row" class="hover:bg-muted/50 data-[state=selected]:bg-muted border-b transition-colors bg-gray-50">
                                                    <th data-slot="table-head" class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap">Fecha</th>
                                                    <th data-slot="table-head" class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap">Bien</th>
                                                    <th data-slot="table-head" class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap">Tipo</th>
                                                    <th data-slot="table-head" class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap">Origen</th>
                                                    <th data-slot="table-head" class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap">Destino / Responsable</th>
                                                    <th data-slot="table-head" class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap">Acciones</th>
                                                </tr>
                                            </thead>
                                            <!-- Tabla de bienes body  -->
                                            <!-- TODO: Backend - Loop foreach($bienes as $bien) -->
                                            <tbody data-slot="table-body" class="[&amp;_tr:last-child]:border-0">
                                                <tr data-slot="table-row" class="data-[state=selected]:bg-muted border-b transition-colors hover:bg-gray-50">
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap font-mono text-sm">17/01/2026</td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap font-medium">Ecógrafo Portátil</td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap">
                                                        <span class="inline-flex items-center rounded-md bg-amber-50 px-2 py-1 text-xs font-medium text-amber-700 ring-1 ring-inset ring-amber-600/20">Traslado</span>
                                                    </td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap">Almacén Central</td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap">Emergencia</td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap text-right">
                                                        <button class="text-blue-600 hover:text-blue-800"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg></button>
                                                    </td>
                                                </tr>
                                                 <tr data-slot="table-row" class="data-[state=selected]:bg-muted border-b transition-colors hover:bg-gray-50">
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap font-mono text-sm">16/01/2026</td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap font-medium">Laptop HP ProBook</td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap">
                                                        <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">Asignación</span>
                                                    </td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap">Sistemas</td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap">Dr. Carlos Ruíz</td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap text-right">
                                                        <button class="text-blue-600 hover:text-blue-800"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-4 h-4"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg></button>
                                                    </td>
                                                </tr>

                                                <tr data-slot="table-row" class="data-[state=selected]:bg-muted border-b transition-colors hover:bg-gray-50">
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] font-mono text-sm">BN-2024-0002</td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] font-medium">Silla Ergonómica</td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">Mobiliario</td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">Recursos Humanos</td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]"><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300 flex items-center gap-1 w-fit text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-3 h-3">
                                                                <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                                                                <path d="m9 11 3 3L22 4"></path>
                                                            </svg>Operativo</span></td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">$180</td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">9/2/2024</td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] text-right"><button data-slot="dropdown-menu-trigger" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5" type="button" id="radix-:r4:" aria-haspopup="menu" aria-expanded="false" data-state="closed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis-vertical w-4 h-4">
                                                                <circle cx="12" cy="12" r="1"></circle>
                                                                <circle cx="12" cy="5" r="1"></circle>
                                                                <circle cx="12" cy="19" r="1"></circle>
                                                            </svg></button></td>
                                                </tr>
                                             </tbody>
                                        </table>
                                        
                                        <!-- Pagination -->
                                        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-4 text-sm text-gray-500 border-t pt-4">
                                            <span>Mostrando <span class="font-bold text-gray-900">1</span> a <span class="font-bold text-gray-900">3</span> de <span class="font-bold text-gray-900">3</span> resultados</span>
                                            
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
                                    </div>
                                </div>

                                <div class="lg:hidden space-y-3">
                                    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-sm">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex justify-between items-start mb-3">
                                                <div class="flex-1 min-w-0">
                                                    <p class="font-mono text-xs text-gray-500 mb-1">BN-2024-0001</p>
                                                    <h3 class="font-semibold text-sm truncate">Computadora Dell OptiPlex 7090</h3>
                                                </div><button data-slot="dropdown-menu-trigger" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 rounded-md gap-1.5 has-[&gt;svg]:px-2.5 h-8 w-8 p-0 flex-shrink-0" type="button" id="radix-:re:" aria-haspopup="menu" aria-expanded="false" data-state="closed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis-vertical w-4 h-4">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="12" cy="5" r="1"></circle>
                                                        <circle cx="12" cy="19" r="1"></circle>
                                                    </svg></button>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3 text-xs">
                                                <div>
                                                    <p class="text-gray-500 mb-1">Categoría</p>
                                                    <p class="font-medium">Tecnología</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Valor</p>
                                                    <p class="font-medium">$850</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Departamento</p>
                                                    <p class="font-medium truncate">Administración</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Estado</p><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300 flex items-center gap-1 w-fit text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-3 h-3">
                                                            <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                                                            <path d="m9 11 3 3L22 4"></path>
                                                        </svg>Operativo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-sm">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex justify-between items-start mb-3">
                                                <div class="flex-1 min-w-0">
                                                    <p class="font-mono text-xs text-gray-500 mb-1">BN-2024-0002</p>
                                                    <h3 class="font-semibold text-sm truncate">Silla Ergonómica</h3>
                                                </div><button data-slot="dropdown-menu-trigger" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 rounded-md gap-1.5 has-[&gt;svg]:px-2.5 h-8 w-8 p-0 flex-shrink-0" type="button" id="radix-:rg:" aria-haspopup="menu" aria-expanded="false" data-state="closed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis-vertical w-4 h-4">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="12" cy="5" r="1"></circle>
                                                        <circle cx="12" cy="19" r="1"></circle>
                                                    </svg></button>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3 text-xs">
                                                <div>
                                                    <p class="text-gray-500 mb-1">Categoría</p>
                                                    <p class="font-medium">Mobiliario</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Valor</p>
                                                    <p class="font-medium">$180</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Departamento</p>
                                                    <p class="font-medium truncate">Recursos Humanos</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Estado</p><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300 flex items-center gap-1 w-fit text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-3 h-3">
                                                            <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                                                            <path d="m9 11 3 3L22 4"></path>
                                                        </svg>Operativo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-sm">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex justify-between items-start mb-3">
                                                <div class="flex-1 min-w-0">
                                                    <p class="font-mono text-xs text-gray-500 mb-1">BN-2023-0156</p>
                                                    <h3 class="font-semibold text-sm truncate">Monitor LG 27"</h3>
                                                </div><button data-slot="dropdown-menu-trigger" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 rounded-md gap-1.5 has-[&gt;svg]:px-2.5 h-8 w-8 p-0 flex-shrink-0" type="button" id="radix-:ri:" aria-haspopup="menu" aria-expanded="false" data-state="closed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis-vertical w-4 h-4">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="12" cy="5" r="1"></circle>
                                                        <circle cx="12" cy="19" r="1"></circle>
                                                    </svg></button>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3 text-xs">
                                                <div>
                                                    <p class="text-gray-500 mb-1">Categoría</p>
                                                    <p class="font-medium">Tecnología</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Valor</p>
                                                    <p class="font-medium">$320</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Departamento</p>
                                                    <p class="font-medium truncate">Urgencias</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Estado</p><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-amber-100 text-amber-700 border-amber-300 flex items-center gap-1 w-fit text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert w-3 h-3">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <line x1="12" x2="12" y1="8" y2="12"></line>
                                                            <line x1="12" x2="12.01" y1="16" y2="16"></line>
                                                        </svg>Mantenimiento</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-sm">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex justify-between items-start mb-3">
                                                <div class="flex-1 min-w-0">
                                                    <p class="font-mono text-xs text-gray-500 mb-1">BN-2024-0003</p>
                                                    <h3 class="font-semibold text-sm truncate">Mesa de Reuniones</h3>
                                                </div><button data-slot="dropdown-menu-trigger" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 rounded-md gap-1.5 has-[&gt;svg]:px-2.5 h-8 w-8 p-0 flex-shrink-0" type="button" id="radix-:rk:" aria-haspopup="menu" aria-expanded="false" data-state="closed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis-vertical w-4 h-4">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="12" cy="5" r="1"></circle>
                                                        <circle cx="12" cy="19" r="1"></circle>
                                                    </svg></button>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3 text-xs">
                                                <div>
                                                    <p class="text-gray-500 mb-1">Categoría</p>
                                                    <p class="font-medium">Mobiliario</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Valor</p>
                                                    <p class="font-medium">$450</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Departamento</p>
                                                    <p class="font-medium truncate">Dirección</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Estado</p><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300 flex items-center gap-1 w-fit text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-3 h-3">
                                                            <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                                                            <path d="m9 11 3 3L22 4"></path>
                                                        </svg>Operativo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-sm">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex justify-between items-start mb-3">
                                                <div class="flex-1 min-w-0">
                                                    <p class="font-mono text-xs text-gray-500 mb-1">BN-2022-0089</p>
                                                    <h3 class="font-semibold text-sm truncate">Impresora HP LaserJet</h3>
                                                </div><button data-slot="dropdown-menu-trigger" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 rounded-md gap-1.5 has-[&gt;svg]:px-2.5 h-8 w-8 p-0 flex-shrink-0" type="button" id="radix-:rm:" aria-haspopup="menu" aria-expanded="false" data-state="closed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis-vertical w-4 h-4">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="12" cy="5" r="1"></circle>
                                                        <circle cx="12" cy="19" r="1"></circle>
                                                    </svg></button>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3 text-xs">
                                                <div>
                                                    <p class="text-gray-500 mb-1">Categoría</p>
                                                    <p class="font-medium">Tecnología</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Valor</p>
                                                    <p class="font-medium">$520</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Departamento</p>
                                                    <p class="font-medium truncate">Admisiones</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Estado</p><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-red-100 text-red-700 border-red-300 flex items-center gap-1 w-fit text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x w-3 h-3">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <path d="m15 9-6 6"></path>
                                                            <path d="m9 9 6 6"></path>
                                                        </svg>Fuera de Servicio</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-sm">
                                        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
                                            <div class="flex justify-between items-start mb-3">
                                                <div class="flex-1 min-w-0">
                                                    <p class="font-mono text-xs text-gray-500 mb-1">BN-2021-0045</p>
                                                    <h3 class="font-semibold text-sm truncate">Archivador Metálico</h3>
                                                </div><button data-slot="dropdown-menu-trigger" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 rounded-md gap-1.5 has-[&gt;svg]:px-2.5 h-8 w-8 p-0 flex-shrink-0" type="button" id="radix-:ro:" aria-haspopup="menu" aria-expanded="false" data-state="closed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis-vertical w-4 h-4">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="12" cy="5" r="1"></circle>
                                                        <circle cx="12" cy="19" r="1"></circle>
                                                    </svg></button>
                                            </div>
                                            <div class="grid grid-cols-2 gap-3 text-xs">
                                                <div>
                                                    <p class="text-gray-500 mb-1">Categoría</p>
                                                    <p class="font-medium">Mobiliario</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Valor</p>
                                                    <p class="font-medium">$280</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Departamento</p>
                                                    <p class="font-medium truncate">Archivo</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 mb-1">Estado</p><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-gray-100 text-gray-700 border-gray-300 flex items-center gap-1 w-fit text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive w-3 h-3">
                                                            <rect width="20" height="5" x="2" y="3" rx="1"></rect>
                                                            <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"></path>
                                                            <path d="M10 12h4"></path>
                                                        </svg>Desincorporado</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs lg:text-sm text-gray-500">Mostrando 6 de 6 bienes</div>
                            </div>
                        </div>
                    </div>
                    <?php include __DIR__ . '/layouts/footer.php'; ?>
                </main>
            </div>
        </div>
    </div>



    <span id="recharts_measurement_span" aria-hidden="true" style="position: absolute; top: -20000px; left: 0px; padding: 0px; margin: 0px; border: none; white-space: pre; font-size: 12px; letter-spacing: normal;">65</span>
    <!-- Scripts -->
    <script>
        // Placeholder for future logic
    </script>
</body>

</html>