@extends('layouts.app')

@section('title', 'Bienes Nacionales - Sistema de Control Hospital')

@section('content')
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
                        <button id="btnAddBien" data-slot="button" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive text-primary-foreground h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 bg-blue-600 hover:bg-blue-700 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-4 h-4 lg:mr-2">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                            <span class="hidden lg:inline">Agregar Bien Nacional</span>
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
            <div class="flex flex-col lg:flex-row items-center gap-6 w-full">

                <div class="relative w-full lg:w-64">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                    <input id="searchInput"
                        class="placeholder:text-muted-foreground border-input flex h-9 w-full rounded-md border bg-input-background pl-10 pr-3 py-1 text-sm outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 transition-all shadow-sm"
                        placeholder="Buscar...">
                </div>

                <div class="flex flex-col lg:flex-row gap-4 w-full lg:flex-1 items-center">

                    <div class="flex items-center gap-2 w-full lg:flex-1">
                        <span class="text-xs lg:text-sm font-medium text-gray-600 whitespace-nowrap">Estado:</span>
                        <div class="relative w-full">
                            <select id="filterStatus"
                                class="appearance-none border-input flex h-9 w-full items-center justify-between rounded-md border bg-input-background px-3 py-1 text-xs lg:text-sm outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 cursor-pointer transition-all pr-10 dark:bg-input/30">
                                <option value="">Todos</option>
                                <option value="operativo">Operativo</option>
                                <option value="danado">Fuera de servicio</option>
                                <option value="reparacion">En reparación</option>
                                <option value="desincorporado">Desincorporado</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 w-full lg:flex-1">
                        <span class="text-xs lg:text-sm font-medium text-gray-600 whitespace-nowrap">Categoría:</span>
                        <div class="relative w-full">
                            <select id="filterCategory"
                                class="appearance-none border-input flex h-9 w-full items-center justify-between rounded-md border bg-input-background px-3 py-1 text-xs lg:text-sm outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 cursor-pointer transition-all pr-10 dark:bg-input/30">
                                <option value="">Todas</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ mb_convert_case($categoria->tipo, MB_CASE_TITLE, "UTF-8") }}">{{ mb_convert_case($categoria->tipo, MB_CASE_TITLE, "UTF-8") }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>

            <div class="hidden lg:block border rounded-lg overflow-hidden">
                <!-- Toolbar Section (Fixed) -->
                <div class="px-4 pt-4 pb-2 bg-white border-b z-30 relative">
                     <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <span>Mostrar</span>
                            <select id="rowsPerPageSelect" class="border border-gray-300 rounded px-2 py-1 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent cursor-pointer">
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
                            <thead data-slot="table-header" class="[&amp;_tr]:border-b">
                                <tr data-slot="table-row" class="hover:bg-muted/50 data-[state=selected]:bg-muted border-b transition-colors bg-gray-50" >
                                    <th data-slot="table-head" class="text-foreground h-14 px-3 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] shadow-sm py-2" style="position: sticky; top: 0; z-index: 20; background-color: #ffffff; box-shadow: 0 4px 6px rgba(0,0,0,0.3);">
                                        ID
                                    </th>
                                    <th data-slot="table-head" class="text-foreground h-14 px-3 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] shadow-sm py-2" style="position: sticky; top: 0; z-index: 20; background-color: #ffffff; box-shadow: 0 4px 6px rgba(0,0,0,0.3);">
                                        #BN
                                    </th>
                                    <th data-slot="table-head" class="text-foreground h-14 px-3 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] shadow-sm py-2" style="position: sticky; top: 0; z-index: 20; background-color: #ffffff; box-shadow: 0 4px 6px rgba(0,0,0,0.3);">
                                        Nombre
                                    </th>
                                    <th data-slot="table-head" class="text-foreground h-14 px-3 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] shadow-sm py-2" style="position: sticky; top: 0; z-index: 20; background-color: #ffffff; box-shadow: 0 4px 6px rgba(0,0,0,0.3);">
                                        Categoría
                                    </th>
                                    <th data-slot="table-head" class="text-foreground h-14 px-3 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] shadow-sm py-2" style="position: sticky; top: 0; z-index: 20; background-color: #ffffff; box-shadow: 0 4px 6px rgba(0,0,0,0.3);">
                                        Departamento
                                    </th>
                                    <th data-slot="table-head" class="text-foreground h-14 px-3 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] shadow-sm py-2" style="position: sticky; top: 0; z-index: 20; background-color: #ffffff; box-shadow: 0 4px 6px rgba(0,0,0,0.3);">
                                        Estado
                                    </th>
                                    <th data-slot="table-head" class="text-foreground h-14 px-3 text-left align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] shadow-sm py-2" style="position: sticky; top: 0; z-index: 20; background-color: #ffffff; box-shadow: 0 4px 6px rgba(0,0,0,0.3);">Fecha</th>
                                    <th data-slot="table-head" class="text-foreground h-14 px-3 align-middle font-medium whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] text-center shadow-sm py-2" style="position: sticky; top: 0; z-index: 20; background-color: #ffffff; box-shadow: 0 4px 6px rgba(0,0,0,0.3);">Acciones</th>
                                </tr>
                            </thead>
                            <!-- Tabla de bienes body  -->
                            <!-- TODO: Backend - Loop foreach($bienes as $bien) -->
                            <tbody data-slot="table-body" class="[&amp;_tr:last-child]:border-0" id="tableBody">

                                @foreach($bienesNacionales as $bien)
                                <tr data-slot="table-row" class="data-[state=selected]:bg-muted border-b transition-colors hover:bg-gray-50">
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] font-mono text-sm">
                                        <span>{{ $bien->id }}</span>
                                    </td>
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] font-mono text-sm">
                                        <span>{{ $bien->numero_bn }}</span>
                                    </td>
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] font-medium">
                                        <span>{{ $bien->nombre }}</span>
                                    </td>
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">
                                        <span>{{ $bien->categoria->tipo ?? 'N/A' }}</span>
                                    </td>
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">
                                        <span>{{ $bien->area->descripcion ?? 'N/A' }}</span>
                                    </td>
                                    @switch($bien->estado)
                                    @case('Operativo')
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">
                                        <span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300 flex items-center gap-1 w-fit text-xs">
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
                                        <span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-red-100 text-red-700 border-red-300 flex items-center gap-1 w-fit text-xs">
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
                                        <span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-amber-100 text-amber-700 border-amber-300 flex items-center gap-1 w-fit text-xs">
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
                                        <span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-gray-100 text-gray-700 border-gray-300 flex items-center gap-1 w-fit text-xs">
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

                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">
                                        <span>{{ $bien->created_at->format('d/m/Y') }}</span>
                                    </td>

                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <button onclick="openViewModal({{ json_encode($bien) }})" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground h-8 w-8 text-blue-600" title="Ver Ficha">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-4 h-4">
                                                    <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>
                                            </button>
                                            <button onclick="openDeleteModal( {{ $bien->id }} )" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground h-8 w-8 text-red-500" title="Eliminar">
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

                                <tr data-slot="table-row" class="data-[state=selected]:bg-muted border-b transition-colors hover:bg-gray-50">
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] font-mono text-sm">BN-2024-0002</td>
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px] font-medium">Silla Ergonómica</td>
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">Mobiliario</td>
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">Recursos Humanos</td>
                                    <td data-slot="table-cell" class="p-3 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]"><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&amp;]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300 flex items-center gap-1 w-fit text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-3 h-3">
                                                <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                                                <path d="m9 11 3 3L22 4"></path>
                                            </svg>Operativo</span></td>
                                    <td data-slot="table-cell" class="px-2 py-1 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">$180</td>
                                    <td data-slot="table-cell" class="px-2 py-1 align-middle whitespace-nowrap [&amp;:has([role=checkbox])]:pr-0 [&amp;&gt;[role=checkbox]]:translate-y-[2px]">9/2/2024</td>
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

                <!-- Pagination Section -->
                <div class="pagination-container px-4" id="paginationContainer"></div>
            </div>
        </div>
    </div>
    <!-- AC Section -->
    <div class="mt-8 mb-6 p-4 lg:p-6 bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-blue-100 rounded-lg text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-snowflake">
                        <line x1="2" x2="22" y1="12" y2="12" />
                        <line x1="12" x2="12" y1="2" y2="22" />
                        <path d="m20 16-4-4 4-4" />
                        <path d="m4 8 4 4-4 4" />
                        <path d="m16 4-4 4-4-4" />
                        <path d="m8 20 4-4 4 4" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Control de Aires Acondicionados</h3>
                    <p class="text-sm text-gray-500">Gestión de equipos de climatización y mantenimientos</p>
                </div>
            </div>
            <button onclick="openRegistACModal()" class="cursor-pointer inline-flex items-center gap-2 bg-blue-50 text-blue-600 px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-100 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-fan">
                                    <path d="M10.827 16.379a6.082 6.082 0 0 1-8.618-7.002l5.412 1.45a6.082 6.082 0 0 1 7.002-8.618l-1.45 5.412a6.082 6.082 0 0 1 8.618 7.002l-5.412-1.45a6.082 6.082 0 0 1-7.002 8.618l1.45-5.412Z" />
                                    <path d="M12 12v.01" />
                                </svg>
                            </div>
                            <h4 class="font-semibold text-slate-900 text-sm">Split 12k BTU</h4>
                        </div>
                        <span class="bg-emerald-100 text-emerald-700 text-[9px] px-2 py-0.5 rounded-full font-medium border border-emerald-200 uppercase tracking-tight">OK</span>
                    </div>

                    <!-- Content -->
                    <div class="space-y-2 text-xs text-slate-600 relative z-10">
                        <div class="flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin text-slate-400">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                            <span class="font-medium">Consultorio 1</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tag text-slate-400">
                                <path d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l5 5a2 2 0 0 0 2.828 0l7-7a2 2 0 0 0 0-2.828l-5-5z" />
                                <circle cx="7.5" cy="7.5" r=".5" />
                                <path d="m18 13-1.5-7.5L2 2l3.5 14.5L13 18l5-5z" />
                                <path d="m2 2 7.586 7.586" />
                                <circle cx="11" cy="11" r="2" />
                            </svg>
                            <span class="truncate">Samsung AR12</span>
                        </div>
                        <div class="flex items-center gap-1.5 text-[10px] text-amber-600 bg-amber-50 px-2 py-1 rounded-md mt-2 w-fit border border-amber-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-clock">
                                <path d="M21 7.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.5" />
                                <path d="M16 2v4" />
                                <path d="M8 2v4" />
                                <path d="M3 10h5" />
                                <path d="M17.5 17.5 16 16.25V14" />
                                <path d="M22 16a6 6 0 1 1-12 0 6 6 0 0 1 12 0Z" />
                            </svg>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-fan">
                                    <path d="M10.827 16.379a6.082 6.082 0 0 1-8.618-7.002l5.412 1.45a6.082 6.082 0 0 1 7.002-8.618l-1.45 5.412a6.082 6.082 0 0 1 8.618 7.002l-5.412-1.45a6.082 6.082 0 0 1-7.002 8.618l1.45-5.412Z" />
                                    <path d="M12 12v.01" />
                                </svg>
                            </div>
                            <h4 class="font-semibold text-slate-900 text-sm">Split 18k BTU</h4>
                        </div>
                        <span class="bg-red-100 text-red-700 text-[9px] px-2 py-0.5 rounded-full font-medium border border-red-200 uppercase tracking-tight">Falla</span>
                    </div>

                    <!-- Content -->
                    <div class="space-y-2 text-xs text-slate-600 relative z-10">
                        <div class="flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin text-slate-400">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                            <span class="font-medium">Sala de Espera</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tag text-slate-400">
                                <path d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l5 5a2 2 0 0 0 2.828 0l7-7a2 2 0 0 0 0-2.828l-5-5z" />
                                <circle cx="7.5" cy="7.5" r=".5" />
                                <path d="m18 13-1.5-7.5L2 2l3.5 14.5L13 18l5-5z" />
                                <path d="m2 2 7.586 7.586" />
                                <circle cx="11" cy="11" r="2" />
                            </svg>
                            <span class="truncate">LG Dual Inverter</span>
                        </div>
                        <div class="flex items-center gap-1.5 text-[10px] text-red-600 bg-red-50 px-2 py-1 rounded-md mt-2 w-fit border border-red-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench">
                                <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />
                            </svg>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-fan">
                                    <path d="M10.827 16.379a6.082 6.082 0 0 1-8.618-7.002l5.412 1.45a6.082 6.082 0 0 1 7.002-8.618l-1.45 5.412a6.082 6.082 0 0 1 8.618 7.002l-5.412-1.45a6.082 6.082 0 0 1-7.002 8.618l1.45-5.412Z" />
                                    <path d="M12 12v.01" />
                                </svg>
                            </div>
                            <h4 class="font-semibold text-slate-900 text-sm">Cassette 24k</h4>
                        </div>
                        <span class="bg-emerald-100 text-emerald-700 text-[9px] px-2 py-0.5 rounded-full font-medium border border-emerald-200 uppercase tracking-tight">OK</span>
                    </div>

                    <!-- Content -->
                    <div class="space-y-2 text-xs text-slate-600 relative z-10">
                        <div class="flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin text-slate-400">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                            <span class="font-medium">Auditorio</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tag text-slate-400">
                                <path d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l5 5a2 2 0 0 0 2.828 0l7-7a2 2 0 0 0 0-2.828l-5-5z" />
                                <circle cx="7.5" cy="7.5" r=".5" />
                                <path d="m18 13-1.5-7.5L2 2l3.5 14.5L13 18l5-5z" />
                                <path d="m2 2 7.586 7.586" />
                                <circle cx="11" cy="11" r="2" />
                            </svg>
                            <span class="truncate">Carrier Inverter</span>
                        </div>
                        <div class="flex items-center gap-1.5 text-[10px] text-green-600 bg-green-50 px-2 py-1 rounded-md mt-2 w-fit border border-green-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <polyline points="22 4 12 14.01 9 11.01" />
                            </svg>
                            <span class="font-medium">Mant. Completo</span>
                        </div>
                    </div>
                </div>

                <!-- AC Card 4 (Add) -->
                <div class="group relative bg-white border-2 border-dashed border-slate-200 rounded-lg p-4 hover:border-blue-400 hover:bg-blue-50/30 transition-all cursor-pointer flex flex-col items-center justify-center min-h-[140px]" onclick="openRegistACModal()">
                    <div class="p-2 bg-slate-100 rounded-full mb-2 group-hover:bg-blue-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus text-slate-400 group-hover:text-blue-600">
                            <path d="M5 12h14" />
                            <path d="M12 5v14" />
                        </svg>
                    </div>
                    <span class="font-medium text-xs text-slate-500 group-hover:text-blue-600">Registrar Nuevo AC</span>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/table-pagination.js') }}"></script>
<script src="{{ asset('js/modal.js') }}"></script>
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

    <script>
        function openViewModal(bien) {
            if (!bien) return;
            
            // Helper to safely set text
            const setText = (id, val) => {
                const el = document.getElementById(id);
                if (el) el.textContent = val;
            };

            setText('modal-bn-id', bien.numero_bn);
            setText('modal-bn-nombre', bien.nombre);
            setText('modal-bn-desc', (bien.marca || '') + ' ' + (bien.modelo || ''));
            setText('modal-bn-serial', bien.serial || 'S/N');
            
            // Relations
            setText('modal-bn-area', bien.area ? bien.area.descripcion : 'N/A');
            setText('modal-bn-categoria', bien.categoria ? bien.categoria.tipo : 'N/A');

            // Date
            if (bien.created_at) {
                const date = new Date(bien.created_at);
                setText('modal-bn-fecha', date.toLocaleDateString('es-ES', { day: 'numeric', month: 'short', year: 'numeric' }));
            }

            // Status Styling
            const estadoEl = document.getElementById('modal-bn-estado');
            const badge = document.getElementById('modal-bn-estado-badge');
            
            if (estadoEl && badge) {
                estadoEl.textContent = bien.estado;
                const dot = badge.querySelector('span');
                
                let badgeClass = 'inline-flex items-center rounded-full px-2 py-0.5 text-[10px] font-medium';
                let dotClass = 'w-1.5 h-1.5 rounded-full mr-1.5';
                
                switch(bien.estado) {
                    case 'Operativo':
                        badgeClass += ' bg-emerald-100 text-emerald-700';
                        dotClass += ' bg-emerald-500';
                        break; 
                    case 'Fuera de servicio':
                        badgeClass += ' bg-red-100 text-red-700';
                        dotClass += ' bg-red-500';
                        break;
                    case 'En reparación':
                        badgeClass += ' bg-amber-100 text-amber-700';
                        dotClass += ' bg-amber-500';
                        break;
                    default: 
                        badgeClass += ' bg-gray-100 text-gray-700';
                        dotClass += ' bg-gray-500';
                }
                
                badge.className = badgeClass;
                if (dot) dot.className = dotClass;
            }

            // QR Code
            const qrEl = document.getElementById('modal-qr-code');
            if (qrEl && bien.numero_bn) {
                qrEl.src = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' + bien.numero_bn;
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

        function closeViewModal() {
            const overlay = document.getElementById('viewModalOverlay');
            if (overlay && ModalManager) {
                ModalManager.closeModal(overlay);
            } else if (overlay) {
                // Fallback si ModalManager no está disponible
                overlay.classList.add('hidden');
            }
        }
    </script>
@endpush
@endsection
