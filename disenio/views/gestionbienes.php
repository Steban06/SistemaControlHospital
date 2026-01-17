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
                    <?php $page_title = 'Gestión de Bienes'; include __DIR__. '/layouts/header.php'; ?>
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package w-5 h-5 lg:w-6 lg:h-6 text-blue-600 flex-shrink-0">
                                                    <path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"></path>
                                                    <path d="M12 22V12"></path>
                                                    <polyline points="3.29 7 12 12 20.71 7"></polyline>
                                                    <path d="m7.5 4.27 9 5.15"></path>
                                                </svg>
                                                <span class="truncate">Inventario de Bienes</span>
                                            </h4>
                                            <p data-slot="card-description" class="text-muted-foreground text-xs lg:text-sm mt-1">Gestión completa de todos los bienes del hospital</p>
                                        </div>

                                        <div class="flex items-center justify-end gap-2">
                                            <button onclick="openModal()" data-slot="button" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive text-primary-foreground h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 bg-blue-600 hover:bg-blue-700 flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-4 h-4 lg:mr-2">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5v14"></path>
                                                </svg>
                                                <span class="hidden lg:inline">Agregar</span>
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
                                        
                                        <!-- Table Toolbar: Row Filter & Search (Mockup) -->
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
                                            <!-- Search is already in header, but this aligns correctly with it if needed or extra tools -->
                                        </div>

                                        <!-- Tabla de bienes -->
                                        <table data-slot="table" class="w-full caption-bottom text-sm">
                                            <thead data-slot="table-header" class="[&amp;_tr]:border-b">
                                                <tr data-slot="table-row" class="hover:bg-muted/50 data-[state=selected]:bg-muted border-b transition-colors bg-gray-50">
                                                    <th data-slot="table-head" class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">
                                                        Código
                                                    </th>
                                                    <th data-slot="table-head" class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">
                                                        Nombre
                                                    </th>
                                                    <th data-slot="table-head" class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">
                                                        Categoría
                                                    </th>
                                                    <th data-slot="table-head" class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">
                                                        Departamento
                                                    </th>
                                                    <th data-slot="table-head" class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">
                                                        Estado
                                                    </th>
                                                    <th data-slot="table-head" class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">
                                                        Valor
                                                    </th>
                                                    <th data-slot="table-head" class="text-foreground h-10 px-2 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">Fecha</th>
                                                    <th data-slot="table-head" class="text-foreground h-10 px-2 align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] text-right">Acciones</th>
                                                </tr>
                                            </thead>
                                            <!-- Tabla de bienes body  -->
                                            <!-- TODO: Backend - Loop foreach($bienes as $bien) -->
                                            <tbody data-slot="table-body" class="[&amp;_tr:last-child]:border-0">
                                                <tr data-slot="table-row" class="data-[state=selected]:bg-muted border-b transition-colors hover:bg-gray-50">
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] font-mono text-sm">
                                                        <span>BN-2024-0001</span>
                                                    </td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] font-medium">
                                                        <span>Computadora Dell OptiPlex 7090</span>
                                                    </td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">
                                                        <span>Tecnología</span>
                                                    </td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">
                                                        <span>Administración</span>
                                                    </td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">
                                                        <span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300 flex items-center gap-1 w-fit text-xs">
                                                            <svg 
                                                                xmlns="http://www.w3.org/2000/svg" 
                                                                width="24" 
                                                                height="24" 
                                                                viewBox="0 0 24 24" 
                                                                fill="none" 
                                                                stroke="currentColor" 
                                                                stroke-width="2" 
                                                                stroke-linecap="round" 
                                                                stroke-linejoin="round" 
                                                                class="lucide lucide-circle-check-big w-3 h-3">
                                                                <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                                                                <path d="m9 11 3 3L22 4"></path>
                                                            </svg>
                                                            Operativo
                                                        </span>
                                                    </td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">$850</td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">14/1/2024</td>
                                                    <td data-slot="table-cell" class="p-2 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] text-right">
                                                        <div class="flex items-center justify-end gap-2">
                                                            <button onclick="openViewModal()" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground h-8 w-8 text-blue-600" title="Ver Ficha">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-4 h-4"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg>
                                                            </button>
                                                            <button onclick="openEditModal()" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground h-8 w-8" title="Editar">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil w-4 h-4"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                                                            </button>
                                                            <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground h-8 w-8 text-red-500" title="Eliminar">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2 w-4 h-4"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                                            </button>
                                                        </div>
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
                                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-4 text-sm text-gray-500 border-t pt-4">
                                    <span>Mostrando <span class="font-bold text-gray-900">1</span> a <span class="font-bold text-gray-900">6</span> de <span class="font-bold text-gray-900">6</span> resultados</span>
                                    
                                    <div class="inline-flex items-center gap-1">
                                        <button class="p-2 rounded-md border border-gray-200 bg-white hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed text-gray-600" disabled>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
                                        </button>
                                        <button class="w-8 h-8 flex items-center justify-center rounded-md bg-blue-600 text-white font-medium shadow-sm border border-blue-600">1</button>
                                        <button class="w-8 h-8 flex items-center justify-center rounded-md border border-gray-200 bg-white hover:bg-gray-50 text-gray-600">2</button>
                                        <button class="w-8 h-8 flex items-center justify-center rounded-md border border-gray-200 bg-white hover:bg-gray-50 text-gray-600">3</button>
                                        <span class="px-1">...</span>
                                        <button class="p-2 rounded-md border border-gray-200 bg-white hover:bg-gray-50 text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- AC Section -->
                    <div class="mt-8 mb-6 p-4 lg:p-6 bg-white rounded-xl shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-blue-100 rounded-lg text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-snowflake"><line x1="2" x2="22" y1="12" y2="12"/><line x1="12" x2="12" y1="2" y2="22"/><path d="m20 16-4-4 4-4"/><path d="m4 8 4 4-4 4"/><path d="m16 4-4 4-4-4"/><path d="m8 20 4-4 4 4"/></svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Control de Aires Acondicionados</h3>
                                    <p class="text-sm text-gray-500">Gestión de equipos de climatización y mantenimientos</p>
                                </div>
                            </div>
                            <button onclick="openRegistACModal()" class="cursor-pointer inline-flex items-center gap-2 bg-blue-50 text-blue-600 px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-100 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                Registrar AC
                            </button>
                        </div>

                        <!-- AC Cards Grid Container (Scrollable) -->
                        <div class="overflow-y-auto max-h-[600px] pr-2">
                             <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                <!-- AC Card 1 -->
                                <div class="group relative bg-white border border-slate-100 rounded-lg p-4 hover:shadow-md transition-all cursor-pointer overflow-hidden" onclick="openACModal()">
                                    <!-- Decorative Circle -->
                                    <div class="absolute top-0 right-0 w-16 h-16 bg-emerald-50 rounded-full -mr-6 -mt-6 opacity-50 group-hover:scale-110 transition-transform"></div>
                                    
                                    <!-- Header -->
                                    <div class="flex justify-between items-start mb-3 relative z-10">
                                        <div class="flex items-center gap-2">
                                            <div class="p-1.5 bg-emerald-100 rounded-md text-emerald-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-fan"><path d="M10.827 16.379a6.082 6.082 0 0 1-8.618-7.002l5.412 1.45a6.082 6.082 0 0 1 7.002-8.618l-1.45 5.412a6.082 6.082 0 0 1 8.618 7.002l-5.412-1.45a6.082 6.082 0 0 1-7.002 8.618l1.45-5.412Z"/><path d="M12 12v.01"/></svg>
                                            </div>
                                            <h4 class="font-semibold text-slate-900 text-sm">Split 12k BTU</h4>
                                        </div>
                                        <span class="bg-emerald-100 text-emerald-700 text-[9px] px-2 py-0.5 rounded-full font-medium border border-emerald-200 uppercase tracking-tight">OK</span>
                                    </div>
                                    
                                    <!-- Content -->
                                    <div class="space-y-2 text-xs text-slate-600 relative z-10">
                                        <div class="flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin text-slate-400"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                            <span class="font-medium">Consultorio 1</span>
                                        </div>
                                        <div class="flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tag text-slate-400"><path d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l5 5a2 2 0 0 0 2.828 0l7-7a2 2 0 0 0 0-2.828l-5-5z"/><circle cx="7.5" cy="7.5" r=".5"/><path d="m18 13-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/><path d="m2 2 7.586 7.586"/><circle cx="11" cy="11" r="2"/></svg>
                                            <span class="truncate">Samsung AR12</span>
                                        </div>
                                        <div class="flex items-center gap-1.5 text-[10px] text-amber-600 bg-amber-50 px-2 py-1 rounded-md mt-2 w-fit border border-amber-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-clock"><path d="M21 7.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.5"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h5"/><path d="M17.5 17.5 16 16.25V14"/><path d="M22 16a6 6 0 1 1-12 0 6 6 0 0 1 12 0Z"/></svg>
                                            <span class="font-medium">Mant. en 20 días</span>
                                        </div>
                                    </div>
                                </div>

                                 <!-- AC Card 2 -->
                                 <div class="group relative bg-white border border-slate-100 rounded-lg p-4 hover:shadow-md transition-all cursor-pointer overflow-hidden" onclick="openACModal()">
                                    <!-- Decorative Circle -->
                                    <div class="absolute top-0 right-0 w-16 h-16 bg-red-50 rounded-full -mr-6 -mt-6 opacity-50 group-hover:scale-110 transition-transform"></div>
                                    
                                    <!-- Header -->
                                    <div class="flex justify-between items-start mb-3 relative z-10">
                                        <div class="flex items-center gap-2">
                                            <div class="p-1.5 bg-red-100 rounded-md text-red-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-fan"><path d="M10.827 16.379a6.082 6.082 0 0 1-8.618-7.002l5.412 1.45a6.082 6.082 0 0 1 7.002-8.618l-1.45 5.412a6.082 6.082 0 0 1 8.618 7.002l-5.412-1.45a6.082 6.082 0 0 1-7.002 8.618l1.45-5.412Z"/><path d="M12 12v.01"/></svg>
                                            </div>
                                            <h4 class="font-semibold text-slate-900 text-sm">Split 18k BTU</h4>
                                        </div>
                                        <span class="bg-red-100 text-red-700 text-[9px] px-2 py-0.5 rounded-full font-medium border border-red-200 uppercase tracking-tight">Falla</span>
                                    </div>
                                    
                                    <!-- Content -->
                                    <div class="space-y-2 text-xs text-slate-600 relative z-10">
                                        <div class="flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin text-slate-400"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                            <span class="font-medium">Sala de Espera</span>
                                        </div>
                                        <div class="flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tag text-slate-400"><path d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l5 5a2 2 0 0 0 2.828 0l7-7a2 2 0 0 0 0-2.828l-5-5z"/><circle cx="7.5" cy="7.5" r=".5"/><path d="m18 13-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/><path d="m2 2 7.586 7.586"/><circle cx="11" cy="11" r="2"/></svg>
                                            <span class="truncate">LG Dual Inverter</span>
                                        </div>
                                        <div class="flex items-center gap-1.5 text-[10px] text-red-600 bg-red-50 px-2 py-1 rounded-md mt-2 w-fit border border-red-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                                            <span class="font-medium">Fuga de Gas</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- AC Card 3 -->
                                 <div class="group relative bg-white border border-slate-100 rounded-lg p-4 hover:shadow-md transition-all cursor-pointer overflow-hidden" onclick="openACModal()">
                                    <!-- Decorative Circle -->
                                    <div class="absolute top-0 right-0 w-16 h-16 bg-emerald-50 rounded-full -mr-6 -mt-6 opacity-50 group-hover:scale-110 transition-transform"></div>
                                    
                                    <!-- Header -->
                                    <div class="flex justify-between items-start mb-3 relative z-10">
                                        <div class="flex items-center gap-2">
                                            <div class="p-1.5 bg-emerald-100 rounded-md text-emerald-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-fan"><path d="M10.827 16.379a6.082 6.082 0 0 1-8.618-7.002l5.412 1.45a6.082 6.082 0 0 1 7.002-8.618l-1.45 5.412a6.082 6.082 0 0 1 8.618 7.002l-5.412-1.45a6.082 6.082 0 0 1-7.002 8.618l1.45-5.412Z"/><path d="M12 12v.01"/></svg>
                                            </div>
                                            <h4 class="font-semibold text-slate-900 text-sm">Cassette 24k</h4>
                                        </div>
                                        <span class="bg-emerald-100 text-emerald-700 text-[9px] px-2 py-0.5 rounded-full font-medium border border-emerald-200 uppercase tracking-tight">OK</span>
                                    </div>
                                    
                                    <!-- Content -->
                                    <div class="space-y-2 text-xs text-slate-600 relative z-10">
                                        <div class="flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin text-slate-400"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                            <span class="font-medium">Auditorio</span>
                                        </div>
                                        <div class="flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tag text-slate-400"><path d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l5 5a2 2 0 0 0 2.828 0l7-7a2 2 0 0 0 0-2.828l-5-5z"/><circle cx="7.5" cy="7.5" r=".5"/><path d="m18 13-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/><path d="m2 2 7.586 7.586"/><circle cx="11" cy="11" r="2"/></svg>
                                            <span class="truncate">Carrier Inverter</span>
                                        </div>
                                        <div class="flex items-center gap-1.5 text-[10px] text-green-600 bg-green-50 px-2 py-1 rounded-md mt-2 w-fit border border-green-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                            <span class="font-medium">Mant. Completo</span>
                                        </div>
                                    </div>
                                </div>
                                 
                                 <!-- AC Card 4 (Add) -->
                                 <div class="group relative bg-white border-2 border-dashed border-slate-200 rounded-lg p-4 hover:border-blue-400 hover:bg-blue-50/30 transition-all cursor-pointer flex flex-col items-center justify-center min-h-[140px]" onclick="openRegistACModal()">
                                    <div class="p-2 bg-slate-100 rounded-full mb-2 group-hover:bg-blue-100 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus text-slate-400 group-hover:text-blue-600"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                    </div>
                                    <span class="font-medium text-xs text-slate-500 group-hover:text-blue-600">Registrar Nuevo AC</span>
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
    <!-- Modal Container (Hidden by default) -->
    <div id="modalContainer" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <?php include __DIR__ . '/layouts/modal_registBien.php'; ?>
    </div>

    <!-- View Modal Container (Hidden by default) -->
    <div id="modalViewContainer" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm transition-all duration-300">
        <?php include __DIR__ . '/layouts/modal_viewBien.php'; ?>
    </div>
    
    <!-- Edit Modal Container (Hidden by default) -->
    <div id="modalEditContainer" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm transition-all duration-300">
        <?php include __DIR__ . '/layouts/modal_editBien.php'; ?>
    </div>

    <!-- Edit AC Modal Container (Hidden by default) -->
    <div id="modalEditACContainer" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm transition-all duration-300">
        <?php include __DIR__ . '/layouts/modal_editAC.php'; ?>
    </div>


    <!-- AC Modal Container (Hidden by default) -->
    <div id="modalACContainer" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm transition-all duration-300">
        <?php include __DIR__ . '/layouts/modal_viewAC.php'; ?>
    </div>

    <!-- Regist AC Modal Container (Hidden by default) -->
    <div id="modalRegistACContainer" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm transition-all duration-300">
        <?php include __DIR__ . '/layouts/modal_registAC.php'; ?>
    </div>

     <!-- Maintenance AC Modal Container (Hidden by default) -->
     <div id="modalMaintenanceACContainer" class="hidden fixed inset-0 z-[100] flex items-center justify-center bg-black/50 backdrop-blur-sm transition-all duration-300">
        <?php include __DIR__ . '/layouts/modal_maintenanceAC.php'; ?>
    </div>

    <!-- Repair Modal Container (Hidden by default) -->
     <div id="modalRepairContainer" class="hidden fixed inset-0 z-[110] flex items-center justify-center bg-black/50 backdrop-blur-sm transition-all duration-300">
        <?php include __DIR__ . '/layouts/modal_reparacion.php'; ?>
    </div>
    
    <!-- External Scripts -->
    <script src="/disenio/js/gestionbienes.js"></script>
</body>

</html>