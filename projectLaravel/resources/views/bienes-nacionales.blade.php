@extends('layouts.app')

@section('title', 'Bienes Nacionales - Sistema de Control Hospital')

@section('content')
<div class="p-4 lg:p-6 space-y-4 lg:space-y-6 flex-1">
    <div data-slot="card" class="bg-card text-card-foreground dark:bg-gray-800 dark:text-gray-100 flex flex-col gap-6 rounded-xl shadow-lg border-0">
        <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
            <div class="flex flex-col gap-4">
                <div class="flex items-start justify-between gap-4">

                    <div class="min-w-0 flex-1">
                        <h4 data-slot="card-title" class="flex items-center gap-2 text-base lg:text-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package w-5 h-5 lg:w-6 lg:h-6 text-blue-600 dark:text-blue-400 flex-shrink-0">
                                <path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"></path>
                                <path d="M12 22V12"></path>
                                <polyline points="3.29 7 12 12 20.71 7"></polyline>
                                <path d="m7.5 4.27 9 5.15"></path>
                            </svg>
                            <span class="truncate">Inventario de Bienes</span>
                        </h4>
                        <p data-slot="card-description" class="text-muted-foreground text-xs lg:text-sm mt-1 dark:text-gray-400">Gestión completa de todos los bienes del hospital</p>
                    </div>

                    <div class="flex items-center justify-end gap-2">
                        @if(auth()->user()->role !== 'guest')
                        <button id="btnAddBien" data-slot="button" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive text-primary-foreground h-8 rounded-md gap-1.5 px-3 has-[>svg]:px-2.5 bg-blue-600 hover:bg-blue-700 flex-shrink-0 text-white dark:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-4 h-4 lg:mr-2">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                            <span class="hidden lg:inline">Agregar Bien Nacional</span>
                        </button>
                        @endif
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
            <div class="flex flex-col lg:flex-row items-center gap-6 w-full">

                <div class="relative w-full lg:w-64">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                    <input id="searchInput"
                        class="placeholder:text-muted-foreground border-input flex h-9 w-full rounded-md border bg-input-background pl-10 pr-3 py-1 text-sm outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 transition-all shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:placeholder-gray-400"
                        placeholder="Buscar...">
                </div>

                <div class="flex flex-col lg:flex-row gap-4 w-full lg:flex-1 items-center">

                    <div class="flex items-center gap-2 w-full lg:flex-1">
                        <span class="text-xs lg:text-sm font-medium text-gray-600 dark:text-gray-300 whitespace-nowrap">Estado:</span>
                        <div class="relative w-full">
                            <select id="filterStatus"
                                class="appearance-none border-input flex h-9 w-full items-center justify-between rounded-md border bg-input-background px-3 py-1 text-xs lg:text-sm outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 cursor-pointer transition-all pr-10 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                <option value="">Todos</option>
                                <option value="operativo">Operativo</option>
                                <option value="danado">Fuera de servicio</option>
                                <option value="reparacion">En reparación</option>
                                <option value="desincorporado">Desincorporado</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 w-full lg:flex-1">
                        <span class="text-xs lg:text-sm font-medium text-gray-600 dark:text-gray-300 whitespace-nowrap">Categoría:</span>
                        <div class="relative w-full">
                            <select id="filterCategory"
                                class="appearance-none border-input flex h-9 w-full items-center justify-between rounded-md border bg-input-background px-3 py-1 text-xs lg:text-sm outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 cursor-pointer transition-all pr-10 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                <option value="">Todas</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ mb_convert_case($categoria->tipo, MB_CASE_TITLE, "UTF-8") }}">{{ mb_convert_case($categoria->tipo, MB_CASE_TITLE, "UTF-8") }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>

            <div class="hidden lg:block border rounded-lg overflow-hidden dark:border-gray-700">
                <!-- Toolbar Section (Fixed) -->
                <div class="px-4 pt-4 pb-2 bg-white border-b z-30 relative dark:bg-gray-800 dark:border-gray-700">
                     <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-300">
                            <span>Mostrar</span>
                            <select id="rowsPerPageSelect" class="border border-gray-300 rounded px-2 py-1 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent cursor-pointer dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                <option>10</option>
                                <option>20</option>
                                <option>50</option>
                            </select>
                            <span>filas</span>
                        </div>
                        <!-- Search is already in header, but this aligns correctly with it if needed or extra tools -->
                    </div>
                </div>

                <!-- Scrollable Table Container -->
                <div data-slot="table-container" class="relative w-full overflow-x-auto overflow-y-auto" style="max-height: 520px;">
                    <div class="px-4 pt-2"> <!-- Reduced top padding since toolbar is above -->

                        <!-- Tabla de bienes -->
                        <table data-slot="table" class="w-full caption-bottom text-sm border-collapse">
                            <thead data-slot="table-header" class="[&amp;_tr]:border-b dark:[&amp;_tr]:border-gray-700">
                                <tr data-slot="table-row" class="hover:bg-muted/50 data-[state=selected]:bg-muted border-b transition-colors bg-gray-50 dark:bg-gray-900/50" >
                                    <th data-slot="table-head" class="text-foreground h-14 px-3 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] shadow-sm py-2 sticky top-0 z-20 bg-white dark:bg-gray-800">
                                        ID
                                    </th>
                                    <th data-slot="table-head" class="text-foreground h-14 px-3 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] shadow-sm py-2 sticky top-0 z-20 bg-white dark:bg-gray-800">
                                        #BN
                                    </th>
                                    <th data-slot="table-head" class="text-foreground h-14 px-3 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] shadow-sm py-2 sticky top-0 z-20 bg-white dark:bg-gray-800">
                                        Nombre
                                    </th>
                                    <th data-slot="table-head" class="text-foreground h-14 px-3 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] shadow-sm py-2 sticky top-0 z-20 bg-white dark:bg-gray-800">
                                        Categoría
                                    </th>
                                    <th data-slot="table-head" class="text-foreground h-14 px-3 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] shadow-sm py-2 sticky top-0 z-20 bg-white dark:bg-gray-800">
                                        Departamento
                                    </th>
                                    <th data-slot="table-head" class="text-foreground h-14 px-3 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] shadow-sm py-2 sticky top-0 z-20 bg-white dark:bg-gray-800">
                                        Estado
                                    </th>
                                    <th data-slot="table-head" class="text-foreground h-14 px-3 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] shadow-sm py-2 sticky top-0 z-20 bg-white dark:bg-gray-800">Fecha</th>
                                    <th data-slot="table-head" class="text-foreground h-14 px-3 align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] text-center shadow-sm py-2 sticky top-0 z-20 bg-white dark:bg-gray-800">Acciones</th>
                                </tr>
                            </thead>
                            <!-- Tabla de bienes body  -->
                            <tbody data-slot="table-body" class="[&amp;_tr:last-child]:border-0 dark:divide-gray-700" id="tableBody">

                                @foreach($bienesNacionales as $bien)
                                <tr data-slot="table-row" class="data-[state=selected]:bg-muted border-b dark:border-gray-700 transition-colors hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] font-mono text-sm text-gray-900 dark:text-gray-100">
                                        <span>{{ $bien->id }}</span>
                                    </td>
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] font-mono text-sm text-gray-600 dark:text-gray-300">
                                        <span>{{ $bien->numero_bn }}</span>
                                    </td>
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] font-medium text-gray-900 dark:text-gray-100">
                                        <span>{{ $bien->nombre }}</span>
                                    </td>
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] text-gray-600 dark:text-gray-300">
                                        <span>{{ $bien->categoria->tipo ?? 'N/A' }}</span>
                                    </td>
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] text-gray-600 dark:text-gray-300">
                                        <span>{{ $bien->area->descripcion ?? 'N/A' }}</span>
                                    </td>
                                    @switch($bien->estado)
                                    @case('Operativo')
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">
                                        <span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300 dark:bg-emerald-900/30 dark:text-emerald-400 dark:border-emerald-800 flex items-center gap-1 w-fit text-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-3 h-3">
                                                <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                                                <path d="m9 11 3 3L22 4"></path>
                                            </svg>
                                            Operativo
                                        </span>
                                    </td>
                                    @break
                                    @case('Fuera de servicio')
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">
                                        <span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-red-100 text-red-700 border-red-300 dark:bg-red-900/30 dark:text-red-400 dark:border-red-800 flex items-center gap-1 w-fit text-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x w-3 h-3">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <path d="m15 9-6 6"></path>
                                                <path d="m9 9 6 6"></path>
                                            </svg>
                                            Fuera de servicio
                                        </span>
                                    </td>
                                    @break
                                    @case('En reparación')
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">
                                        <span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-amber-100 text-amber-700 border-amber-300 dark:bg-amber-900/30 dark:text-amber-400 dark:border-amber-800 flex items-center gap-1 w-fit text-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert w-3 h-3">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="12" x2="12" y1="8" y2="12"></line>
                                                <line x1="12" x2="12.01" y1="16" y2="16"></line>
                                            </svg>
                                            En reparación
                                        </span>
                                    </td>
                                    @break
                                    @case('Desincorporado')
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">
                                        <span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-gray-100 text-gray-700 border-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 flex items-center gap-1 w-fit text-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-archive w-3 h-3">
                                                <rect width="20" height="5" x="2" y="3" rx="1"></rect>
                                                <path d="M4 8v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"></path>
                                                <path d="M10 12h4"></path>
                                            </svg>
                                            Desincorporado
                                        </span>
                                    </td>
                                    @break
                                    @endswitch

                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] text-gray-600 dark:text-gray-400">
                                        <span>{{ $bien->created_at->format('d/m/Y') }}</span>
                                    </td>

                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <button onclick="openViewModal({{ json_encode($bien) }})" 
                                                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background dark:bg-transparent dark:border-gray-600 shadow-sm hover:bg-accent hover:text-accent-foreground dark:hover:bg-gray-700 h-8 w-8 text-blue-600 dark:text-blue-400" title="Ver Ficha">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-4 h-4">
                                                    <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>
                                            </button>
                                            <button onclick="openDeleteModal({{ $bien->id }})" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background dark:bg-transparent dark:border-gray-600 shadow-sm hover:bg-accent hover:text-accent-foreground dark:hover:bg-gray-700 h-8 w-8 text-red-500 dark:text-red-400" title="Eliminar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2 w-4 h-4">
                                                    <path d="M3 6h18" />
                                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                    <line x1="10" x2="10" y1="11" y2="17" />
                                                    <line x1="14" x2="14" y1="11" y2="17" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination Section -->
                <div class="pagination-container px-4" id="paginationContainer"></div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/table-pagination.js') }}"></script>
<script src="{{ asset('js/modal.js') }}"></script>
<script>
    // Fix status badge colors for dark mode
    (function() {
        function updateTableBadgeColors() {
            const isDark = document.documentElement.classList.contains('dark');
            const badges = document.querySelectorAll('[data-slot="badge"]');
            
            badges.forEach(badge => {
                const text = badge.textContent.trim();
                let bgColor, textColor, borderColor;
                
                switch(text) {
                    case 'Operativo':
                        bgColor = isDark ? 'rgba(6, 78, 59, 0.3)' : '#d1fae5';
                        textColor = isDark ? '#6ee7b7' : '#047857';
                        borderColor = isDark ? '#064e3b' : '#a7f3d0';
                        break;
                    case 'Fuera de servicio':
                    case 'Dañado':
                        bgColor = isDark ? 'rgba(127, 29, 29, 0.3)' : '#fee2e2';
                        textColor = isDark ? '#fca5a5' : '#b91c1c';
                        borderColor = isDark ? '#7f1d1d' : '#fecaca';
                        break;
                    case 'En reparación':
                        bgColor = isDark ? 'rgba(120, 53, 15, 0.3)' : '#fef3c7';
                        textColor = isDark ? '#fcd34d' : '#b45309';
                        borderColor = isDark ? '#78350f' : '#fde68a';
                        break;
                    case 'Desincorporado':
                        bgColor = isDark ? 'rgba(55, 65, 81, 0.3)' : '#f3f4f6';
                        textColor = isDark ? '#d1d5db' : '#374151';
                        borderColor = isDark ? '#4b5563' : '#d1d5db';
                        break;
                    default:
                        return; // No cambiar si no coincide
                }
                
                badge.style.backgroundColor = bgColor;
                badge.style.color = textColor;
                badge.style.borderColor = borderColor;
            });
        }
        
        // Ejecutar al cargar
        updateTableBadgeColors();
        
        // Observar cambios de tema
        const observer = new MutationObserver(updateTableBadgeColors);
        observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
        
        // Re-aplicar después de que la tabla se actualice (para paginación, filtros, etc.)
        const tableObserver = new MutationObserver(updateTableBadgeColors);
        const tableBody = document.querySelector('tbody');
        if (tableBody) {
            tableObserver.observe(tableBody, { childList: true, subtree: true });
        }
    })();
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializar el ModalManager con las rutas necesarias
        ModalManager.init({
            storeUrl: '{{ route("bienes-nacionales.store") }}',
            updateBaseUrl: '{{ url("bienes-nacionales") }}',
            addButtonId: 'btnAddBien',
            modalAddId: 'modalAddBien',
            formAddId: 'formAddBien',
            modalEditId: 'modalEditBien',
            formEditId: 'formEditBien'
        });

        // Inicializar el sistema de tabla con Paginación
        const tablePagination = new TablePagination({
            searchInputId: 'searchInput',
            tableBodyId: 'tableBody',
            paginationContainerId: 'paginationContainer',
            rowsPerPageSelectId: 'rowsPerPageSelect',
            statusFilterId: 'filterStatus',   // Added
            categoryFilterId: 'filterCategory', // Added
            defaultRowsPerPage: 10,
            tableContainerSelector: '.table-container',
            addButtonId: 'btnAddBien',
            onAddButtonClick: function() {
                const btn = document.getElementById('btnAddBien');
                if (btn) btn.click();
            }
        });
    });
</script>
@endpush

@push('modals')
    <!-- Modal Registrar Bien -->
    @include('layouts.partials.modal-regist-bien')
    
    <!-- Modal Ver Ficha -->
    @include('layouts.partials.modal-view-bien')

    <!-- Modal Editar Bien -->
    @include('layouts.partials.modal-edit-bien')

    <!-- Modal Historial Bien -->
    @include('layouts.partials.modal-history-bien')

    <script>
        let currentBien = null; // Store current asset for history navigation

        function openViewModal(bien) {
            if (!bien) return;
            currentBien = bien; // Save state
            
            // Helper to safely set text
            const setText = (id, val) => {
                const el = document.getElementById(id);
                if (el) el.textContent = val;
            };

            setText('modal-bn-id', bien.id);
            setText('modal-bn-numero', bien.numero_bn);
            setText('modal-bn-nombre', bien.nombre);
            setText('modal-bn-desc', (bien.marca ? `Marca: ${bien.marca}` : 'Sin marca') + ' | ' + (bien.modelo ? `Modelo: ${bien.modelo}` : 'Sin modelo') + ' | ' + (bien.serial ? `Serial: ${bien.serial}` : 'Sin serial'));
            
            // Relations
            setText('modal-bn-area', bien.area ? bien.area.descripcion : 'N/A');
            setText('modal-bn-categoria', bien.categoria ? bien.categoria.tipo : 'N/A');

            // Date
            if (bien.created_at) {
                const date = new Date(bien.created_at);
                setText('modal-bn-fecha', date.toLocaleDateString('es-ES', { day: 'numeric', month: 'short', year: 'numeric', timeZone: 'UTC' }));
            }

            // Estado Badge
            const badge = document.getElementById('modal-bn-estado-badge');
            if (badge) {
                const estadoText = bien.estado || 'Sin estado';
                const estadoSpan = document.getElementById('modal-bn-estado');
                if (estadoSpan) {
                    estadoSpan.textContent = estadoText;
                }
                
                const dot = badge.querySelector('span');
                
                const isDark = document.documentElement.classList.contains('dark');
                badge.className = 'inline-flex items-center rounded-full px-2 py-0.5 text-[10px] font-medium';
                
                let bgColor, textColor, dotColor;
                
                switch(bien.estado) {
                    case 'Operativo':
                        bgColor = isDark ? 'rgba(6, 78, 59, 0.3)' : '#d1fae5';
                        textColor = isDark ? '#6ee7b7' : '#047857';
                        dotColor = isDark ? '#10b981' : '#059669';
                        break; 
                    case 'Fuera de servicio':
                        bgColor = isDark ? 'rgba(127, 29, 29, 0.3)' : '#fee2e2';
                        textColor = isDark ? '#fca5a5' : '#b91c1c';
                        dotColor = isDark ? '#ef4444' : '#dc2626';
                        break;
                    case 'En reparación':
                        bgColor = isDark ? 'rgba(120, 53, 15, 0.3)' : '#fef3c7';
                        textColor = isDark ? '#fcd34d' : '#b45309';
                        dotColor = isDark ? '#f59e0b' : '#d97706';
                        break;
                    case 'Dañado':
                        bgColor = isDark ? 'rgba(127, 29, 29, 0.3)' : '#fee2e2';
                        textColor = isDark ? '#fca5a5' : '#b91c1c';
                        dotColor = isDark ? '#ef4444' : '#dc2626';
                        break;
                    default: 
                        bgColor = isDark ? 'rgba(31, 41, 55, 0.3)' : '#f3f4f6';
                        textColor = isDark ? '#d1d5db' : '#374151';
                        dotColor = isDark ? '#9ca3af' : '#6b7280';
                }
                
                badge.style.backgroundColor = bgColor;
                badge.style.color = textColor;
                
                if (dot) {
                    dot.className = 'w-1.5 h-1.5 rounded-full mr-1.5';
                    dot.style.backgroundColor = dotColor;
                }
            }

            // QR Code
            const qrEl = document.getElementById('modal-qr-code');
            if (qrEl && bien.id) {
                qrEl.src = '{{ url("bienes-nacionales") }}/' + bien.id + '/qr';
            }

            // Populate Edit Button for ModalManager
            const btnEdit = document.getElementById('btnEditFromView');
            if (btnEdit) {
                btnEdit.dataset.id = bien.id;
                btnEdit.dataset.numero = bien.numero_bn;
                btnEdit.dataset.nombre = bien.nombre;
                btnEdit.dataset.marca = bien.marca || '';
                btnEdit.dataset.modelo = bien.modelo || '';
                btnEdit.dataset.serial = bien.serial || '';
                btnEdit.dataset.area = bien.area_id || (bien.area ? bien.area.id : '');
                btnEdit.dataset.categoria = bien.categoria_id || (bien.categoria ? bien.categoria.id : '');
                btnEdit.dataset.estado = bien.estado;
            }

            // Show Overlay usando ModalManager
            const overlay = document.getElementById('viewModalOverlay');
            if (overlay && ModalManager) {
                ModalManager.openModal(overlay);
            } else if (overlay) {
                // Fallback si ModalManager no está disponible
                overlay.classList.remove('hidden');
            }
        }

        // Handle Edit Button Click from View Modal
        document.addEventListener('click', function(e) {
            if (e.target && (e.target.id === 'btnEditFromView' || e.target.closest('#btnEditFromView'))) {
                const btn = e.target.id === 'btnEditFromView' ? e.target : e.target.closest('#btnEditFromView');
                
                // Close View Modal first
                closeViewModal();

                // Wait for close transitions
                setTimeout(() => {
                    const modalEdit = document.getElementById('modalEditBien');
                    if (modalEdit && ModalManager) {
                        const formEdit = document.getElementById('formEditBien');
                        if (formEdit) {
                           formEdit.reset();
                           document.getElementById('editId').value = btn.dataset.id || '';
                           document.getElementById('editNumeroBN').value = btn.dataset.numero || '';
                           document.getElementById('editNombreBien').value = btn.dataset.nombre || '';
                           document.getElementById('editMarcaBien').value = btn.dataset.marca || '';
                           document.getElementById('editModeloBien').value = btn.dataset.modelo || '';
                           document.getElementById('editSerialBien').value = btn.dataset.serial || '';
                           document.getElementById('editUbicacionBien').value = btn.dataset.area || '';
                           document.getElementById('editCategoriaBien').value = btn.dataset.categoria || '';
                           document.getElementById('editEstadoBien').value = btn.dataset.estado || '';
                           
                           // Set recordId for submit handler in ModalManager
                           formEdit.dataset.recordId = btn.dataset.id || '';
                        }
                        
                        ModalManager.openModal(modalEdit);
                    } else {
                        console.error('ModalEdit or ModalManager not found');
                        // Fallback
                        if (modalEdit) modalEdit.classList.remove('hidden');
                    }
                }, 100); // 100ms delay
            }
        });

        function closeViewModal() {
            const overlay = document.getElementById('viewModalOverlay');
            if (overlay && ModalManager) {
                ModalManager.closeModal(overlay);
            } else if (overlay) {
                // Fallback si ModalManager no está disponible
                overlay.classList.add('hidden');
            }
        }

        // function viewAssetHistory() {
        //     closeViewModal();
            
        //     // Populate History Header if needed
        //     if (currentBien) {
        //         const subtitle = document.getElementById('history_bien_subtitle');
        //         if (subtitle) {
        //             subtitle.textContent = `Historial completo de: ${currentBien.nombre} (${currentBien.numero_bn})`;
        //         }

        //         fetch(`{{ url('bienes-nacionales/history') }}/${currentBien.id}`)
        //             .then(response => response.json())
        //             .then(data => {
        //                 const historyBody = document.getElementById('history_bien_list');
        //                 console.log(data.history);
                        
        //                 if (historyBody) {
        //                     historyBody.innerHTML = ''; // Limpiar lista

        //                     const estilosPorTipo = {
        //                         'ASIGNACION':     { border: 'border-l-blue-500',   bgIcon: 'bg-blue-100',   textIcon: 'text-blue-600',   bgBadge: 'bg-blue-100',   textBadge: 'text-blue-700',   borderBadge: 'border-blue-300',   bgDetalle: 'bg-blue-50' },
        //                         'DESINCORPORADO': { border: 'border-l-slate-500',  bgIcon: 'bg-slate-100',  textIcon: 'text-slate-600',  bgBadge: 'bg-slate-100',  textBadge: 'text-slate-700',  borderBadge: 'border-slate-300',  bgDetalle: 'bg-slate-50' },
        //                         'FALLA':          { border: 'border-l-red-500',    bgIcon: 'bg-red-100',    textIcon: 'text-red-600',    bgBadge: 'bg-red-100',    textBadge: 'text-red-700',    borderBadge: 'border-red-300',    bgDetalle: 'bg-red-50' },
        //                         'MANTENIMIENTO':  { border: 'border-l-indigo-500', bgIcon: 'bg-indigo-100', textIcon: 'text-indigo-600', bgBadge: 'bg-indigo-100', textBadge: 'text-indigo-700', borderBadge: 'border-indigo-300', bgDetalle: 'bg-indigo-50' },
        //                         'REPARACION':     { border: 'border-l-amber-500', bgIcon: 'bg-amber-100', textIcon: 'text-amber-600', bgBadge: 'bg-amber-100', textBadge: 'text-amber-700', borderBadge: 'border-amber-300', bgDetalle: 'bg-amber-50' },
        //                         'TRASLADO':       { border: 'border-l-emerald-500',bgIcon: 'bg-emerald-100',textIcon: 'text-emerald-600',bgBadge: 'bg-emerald-100',textBadge: 'text-emerald-700',borderBadge: 'border-emerald-300',bgDetalle: 'bg-emerald-50' },
        //                         'OTRO':           { border: 'border-l-gray-500',   bgIcon: 'bg-gray-100',   textIcon: 'text-gray-600',   bgBadge: 'bg-gray-100',   textBadge: 'text-gray-700',   borderBadge: 'border-gray-300',   bgDetalle: 'bg-gray-50' }
        //                     };

        //                     data.history.forEach(record => {
        //                         // 1. Formatear la fecha (evitando el error del día menos)
        //                         const dateObj = new Date(record.fecha_reporte);
        //                         const fechaFormateada = dateObj.toLocaleDateString('es-ES', { 
        //                             day: 'numeric', 
        //                             month: 'long', 
        //                             year: 'numeric',
        //                             timeZone: 'UTC' 
        //                         });

        //                         // 2. Capitalizar el tipo de movimiento o nombre si es necesario
        //                         const estilo = estilosPorTipo[record.tipo] || estilosPorTipo['OTRO'];
        //                         const detalle = record.detalle || 'Sin descripción';
        //                         const usuario = record.usuario_nombre || 'Sistema';

        //                         // Tipos de movimientos: 'ASIGNACION','DESINCORPORADO','FALLA','MANTENIMIENTO','REPARACION','TRASLADO','OTRO'

        //                         // 3. Inyectar el HTML con las variables ${}
        //                         historyBody.innerHTML += `
        //                             <div class="bg-white text-gray-900 flex flex-col gap-4 rounded-xl border border-l-4 ${estilo.border} shadow-sm hover:shadow-md transition-shadow p-6 mb-4">
        //                                 <div class="grid grid-cols-[1fr_auto] gap-2">
        //                                     <div class="flex items-start gap-3">
        //                                         <div class="${estilo.bgIcon} p-2 rounded-full flex-shrink-0">
        //                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="${estilo.textIcon}">
        //                                                 <path d="M12 20v-6M6 20V10M18 20V4"/>
        //                                             </svg>
        //                                         </div>
        //                                         <div class="min-w-0">
        //                                             <div class="flex items-center gap-2 mb-1">
        //                                                 <span class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium text-xs ${estilo.bgBadge} ${estilo.textBadge} ${estilo.borderBadge}">
        //                                                     ${record.tipo}
        //                                                 </span>
        //                                                 <span class="text-xs text-gray-500">${fechaFormateada}</span>
        //                                             </div>
        //                                             <h4 class="font-semibold text-sm">${record.titulo || 'Actualización de Bien'}</h4>
        //                                             <p class="text-xs text-gray-600 mt-1">Registrado por: ${record.usuario_nombre || 'Sistema'}</p>
        //                                         </div>
        //                                     </div>
        //                                 </div>
        //                                 <div class="${estilo.bgDetalle} p-2 rounded border border-opacity-50">
        //                                     <p class="text-xs text-gray-600 font-medium mb-1">Descripción:</p>
        //                                     <p class="text-xs text-gray-700">${record.descripcion || 'Sin descripción adicional.'}</p>
        //                                 </div>
        //                             </div>`;
        //                     });
        //                 }
        //             })
        //             .catch(error => {
        //                 console.error('Error fetching history:', error);
        //             });
        //     }

        //     // Open History Modal using ModalManager
        //     setTimeout(() => {
        //         const historyModal = document.getElementById('historyBienModal');
        //         if (historyModal && ModalManager) {
        //             ModalManager.openModal(historyModal);
        //         }
        //     }, 300); // Wait for close animation
        // }

        let allHistoryData = []; // Aquí guardaremos los datos originales

        // Escuchadores de eventos para los filtros
        document.getElementById('filter-desde')?.addEventListener('change', applyHistoryFilters);
        document.getElementById('filter-hasta')?.addEventListener('change', applyHistoryFilters);
        document.getElementById('filter-tipo')?.addEventListener('change', applyHistoryFilters);

        function applyHistoryFilters() {
            const desde = document.getElementById('filter-desde').value;
            const hasta = document.getElementById('filter-hasta').value;
            const tipo = document.getElementById('filter-tipo').value;

            const filtrados = allHistoryData.filter(record => {
                // Filtro de tipo
                const matchesTipo = tipo === "" || record.tipo === tipo;
                
                // Filtro de fechas (YYYY-MM-DD)
                const fechaRec = record.fecha_reporte.split('T')[0];
                const matchesDesde = desde === "" || fechaRec >= desde;
                const matchesHasta = hasta === "" || fechaRec <= hasta;

                return matchesTipo && matchesDesde && matchesHasta;
            });

            renderHistoryCards(filtrados); // Llamamos a la función que dibuja
        }

        function viewAssetHistory() {
            closeViewModal();
            
            if (currentBien) {
                const subtitle = document.getElementById('history_bien_subtitle');
                if (subtitle) {
                    subtitle.textContent = `Historial completo de: ${currentBien.nombre} (${currentBien.numero_bn})`;
                }

                fetch(`{{ url('bienes-nacionales/history') }}/${currentBien.id}`)
                    .then(response => response.json())
                    .then(data => {
                        allHistoryData = data.history; // <--- GUARDAMOS LOS DATOS
                        
                        // Limpiar los inputs de filtro al abrir un nuevo bien
                        document.getElementById('filter-desde').value = '';
                        document.getElementById('filter-hasta').value = '';
                        document.getElementById('filter-tipo').value = '';

                        renderHistoryCards(allHistoryData); // <--- DIBUJAMOS
                    })
                    .catch(error => console.error('Error:', error));
            }

            setTimeout(() => {
                const historyModal = document.getElementById('historyBienModal');
                if (historyModal && ModalManager) {
                    ModalManager.openModal(historyModal);
                }
            }, 300);
        }

        function renderHistoryCards(dataList) {
            const historyBody = document.getElementById('history_bien_list');
            if (!historyBody) return;

            historyBody.innerHTML = ''; 

            // Definir colores con CSS inline para garantizar que siempre se apliquen
            const isDark = document.documentElement.classList.contains('dark');
            
            const estilosPorTipo = {
                'ASIGNACION': {
                    borderColor: '#3b82f6',
                    bgIcon: isDark ? 'rgba(30, 58, 138, 0.5)' : '#dbeafe',
                    textIcon: isDark ? '#93c5fd' : '#2563eb',
                    bgBadge: isDark ? 'rgba(30, 58, 138, 0.5)' : '#dbeafe',
                    textBadge: isDark ? '#93c5fd' : '#1d4ed8',
                    borderBadge: isDark ? '#1e3a8a' : '#93c5fd',
                    bgDetalle: isDark ? 'rgba(30, 58, 138, 0.2)' : '#eff6ff'
                },
                'DESINCORPORADO': {
                    borderColor: '#8b5cf6',
                    bgIcon: isDark ? 'rgba(76, 29, 149, 0.5)' : '#ede9fe',
                    textIcon: isDark ? '#c4b5fd' : '#7c3aed',
                    bgBadge: isDark ? 'rgba(76, 29, 149, 0.5)' : '#ede9fe',
                    textBadge: isDark ? '#c4b5fd' : '#6d28d9',
                    borderBadge: isDark ? '#4c1d95' : '#c4b5fd',
                    bgDetalle: isDark ? 'rgba(76, 29, 149, 0.2)' : '#f5f3ff'
                },
                'FALLA': {
                    borderColor: '#ef4444',
                    bgIcon: isDark ? 'rgba(127, 29, 29, 0.5)' : '#fee2e2',
                    textIcon: isDark ? '#fca5a5' : '#dc2626',
                    bgBadge: isDark ? 'rgba(127, 29, 29, 0.5)' : '#fee2e2',
                    textBadge: isDark ? '#fca5a5' : '#b91c1c',
                    borderBadge: isDark ? '#7f1d1d' : '#fca5a5',
                    bgDetalle: isDark ? 'rgba(127, 29, 29, 0.2)' : '#fef2f2'
                },
                'MANTENIMIENTO': {
                    borderColor: '#6366f1',
                    bgIcon: isDark ? 'rgba(49, 46, 129, 0.5)' : '#e0e7ff',
                    textIcon: isDark ? '#a5b4fc' : '#4f46e5',
                    bgBadge: isDark ? 'rgba(49, 46, 129, 0.5)' : '#e0e7ff',
                    textBadge: isDark ? '#a5b4fc' : '#4338ca',
                    borderBadge: isDark ? '#312e81' : '#a5b4fc',
                    bgDetalle: isDark ? 'rgba(49, 46, 129, 0.2)' : '#eef2ff'
                },
                'REPARACION': {
                    borderColor: '#f59e0b',
                    bgIcon: isDark ? 'rgba(120, 53, 15, 0.5)' : '#fef3c7',
                    textIcon: isDark ? '#fcd34d' : '#d97706',
                    bgBadge: isDark ? 'rgba(120, 53, 15, 0.5)' : '#fef3c7',
                    textBadge: isDark ? '#fcd34d' : '#b45309',
                    borderBadge: isDark ? '#78350f' : '#fcd34d',
                    bgDetalle: isDark ? 'rgba(120, 53, 15, 0.2)' : '#fffbeb'
                },
                'TRASLADO': {
                    borderColor: '#10b981',
                    bgIcon: isDark ? 'rgba(6, 78, 59, 0.5)' : '#d1fae5',
                    textIcon: isDark ? '#6ee7b7' : '#059669',
                    bgBadge: isDark ? 'rgba(6, 78, 59, 0.5)' : '#d1fae5',
                    textBadge: isDark ? '#6ee7b7' : '#047857',
                    borderBadge: isDark ? '#064e3b' : '#6ee7b7',
                    bgDetalle: isDark ? 'rgba(6, 78, 59, 0.2)' : '#ecfdf5'
                },
                'OTRO': {
                    borderColor: '#6b7280',
                    bgIcon: isDark ? '#1f2937' : '#f3f4f6',
                    textIcon: isDark ? '#9ca3af' : '#4b5563',
                    bgBadge: isDark ? '#1f2937' : '#f3f4f6',
                    textBadge: isDark ? '#d1d5db' : '#374151',
                    borderBadge: isDark ? '#4b5563' : '#d1d5db',
                    bgDetalle: isDark ? 'rgba(31, 41, 55, 0.5)' : '#f9fafb'
                }
            };

            if (dataList.length === 0) {
                historyBody.innerHTML = '<p class="text-center text-gray-500 dark:text-gray-400 py-10 text-sm">No hay registros que coincidan con los filtros.</p>';
                return;
            }

            dataList.forEach(record => {
                const dateObj = new Date(record.fecha_reporte);
                const fechaFormateada = dateObj.toLocaleDateString('es-ES', { 
                    day: 'numeric', month: 'long', year: 'numeric', timeZone: 'UTC' 
                });

                const tipoKey = record.tipo ? record.tipo.toUpperCase() : 'OTRO';
                const estilo = estilosPorTipo[tipoKey] || estilosPorTipo['OTRO'];

                historyBody.innerHTML += `
                    <div class="flex flex-col gap-4 rounded-xl border shadow-sm hover:shadow-md transition-shadow p-6 mb-4" 
                         style="background-color: ${isDark ? '#0f172a' : '#ffffff'}; 
                                color: ${isDark ? '#ffffff' : '#111827'}; 
                                border-left: 4px solid ${estilo.borderColor}; 
                                border-color: ${isDark ? '#1e293b' : '#e5e7eb'}; 
                                border-left-color: ${estilo.borderColor};">
                        <div class="grid grid-cols-[1fr_auto] gap-2">
                            <div class="flex items-start gap-3">
                                <div class="p-2 rounded-full flex-shrink-0" style="background-color: ${estilo.bgIcon};">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: ${estilo.textIcon};"><path d="M12 20v-6M6 20V10M18 20V4"/></svg>
                                </div>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium text-xs" 
                                              style="background-color: ${estilo.bgBadge}; 
                                                     color: ${estilo.textBadge}; 
                                                     border-color: ${estilo.borderBadge};">
                                            ${record.tipo}
                                        </span>
                                        <span class="text-xs" style="color: ${isDark ? '#9ca3af' : '#6b7280'};">${fechaFormateada}</span>
                                    </div>
                                    <h4 class="font-semibold text-sm" style="color: ${isDark ? '#ffffff' : '#111827'};">${record.titulo || 'Actualización de Bien'}</h4>
                                    <p class="text-xs mt-1" style="color: ${isDark ? '#9ca3af' : '#4b5563'};">Registrado por: ${record.usuario_nombre || 'Sistema'}</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 rounded border" style="background-color: ${estilo.bgDetalle}; 
                                                                border-color: ${isDark ? 'rgba(55, 65, 81, 0.2)' : 'rgba(229, 231, 235, 0.5)'};">
                            <p class="text-xs font-medium mb-1" style="color: ${isDark ? '#d1d5db' : '#4b5563'};">Descripción:</p>
                            <p class="text-xs" style="color: ${isDark ? '#e5e7eb' : '#374151'};">${record.descripcion || 'Sin descripción adicional.'}</p>
                        </div>
                    </div>`;
            });
        }

        document.getElementById('btn-reset-filters')?.addEventListener('click', function() {
            // 1. Limpiamos los valores de los inputs
            document.getElementById('filter-desde').value = '';
            document.getElementById('filter-hasta').value = '';
            document.getElementById('filter-tipo').value = '';

            // 2. Volvemos a mostrar la lista original completa
            // Usamos la variable global que ya teníamos: allHistoryData
            renderHistoryCards(allHistoryData);
        });

        document.getElementById('btn-download-history-pdf')?.addEventListener('click', function() {
            if (!currentBien) return;

            const desde = document.getElementById('filter-desde').value;
            const hasta = document.getElementById('filter-hasta').value;
            const tipo = document.getElementById('filter-tipo').value;

            let url = `{{ route('bienes-nacionales.history.pdf', ':id') }}`;
            url = url.replace(':id', currentBien.id);

            const params = new URLSearchParams();
            if (desde) params.append('desde', desde);
            if (hasta) params.append('hasta', hasta);
            if (tipo) params.append('tipo', tipo);

            if (params.toString()) {
                url += '?' + params.toString();
            }

            window.open(url, '_blank');
        });

        document.getElementById('btn-export-pdf-view')?.addEventListener('click', function() {
            if (!currentBien) return;
            
            let url = `{{ route('bienes-nacionales.pdf', ':id') }}`;
            url = url.replace(':id', currentBien.id);
            
            window.open(url, '_blank');
        });

        function closeHistoryModal() {
            const historyModal = document.getElementById('historyBienModal');
            if (historyModal && ModalManager) {
                ModalManager.closeModal(historyModal);
            }

            // Re-open View Modal if we have state
            if (currentBien) {
                setTimeout(() => {
                    openViewModal(currentBien);
                }, 400); // 300ms close animation + buffer
            }
        }
    </script>
    
<script src="{{ asset('js/print-asset.js') }}"></script>
@endpush
@endsection
