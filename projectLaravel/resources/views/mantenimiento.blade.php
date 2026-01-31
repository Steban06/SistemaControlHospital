@extends('layouts.app')

@section('title', 'Mantenimiento - Sistema de Control Hospital')

@section('content')
<style>
    /* Custom Badge Styles for Dark Mode Reliability */
    .badge-base {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 0.375rem;
        border-width: 1px;
        padding: 0.125rem 0.5rem;
        font-weight: 500;
        font-size: 0.75rem;
        white-space: nowrap;
    }
    
    /* Bien Nacional (Blue) */
    .badge-bn {
        background-color: #eff6ff;
        color: #1d4ed8;
        border-color: #bfdbfe;
    }
    .dark .badge-bn {
        background-color: rgba(30, 58, 138, 0.4) !important;
        color: #93c5fd !important;
        border-color: rgba(30, 58, 138, 0.6) !important;
    }

    /* Aire Acondicionado (Cyan) */
    .badge-ac {
        background-color: #ecfeff;
        color: #0e7490;
        border-color: #a5f3fc;
    }
    .dark .badge-ac {
        background-color: rgba(8, 145, 178, 0.25) !important;
        color: #22d3ee !important;
        border-color: rgba(8, 145, 178, 0.5) !important;
    }
</style>
<div class="p-4 lg:p-6 space-y-4 lg:space-y-6">

    <div data-slot="card" class="text-card-foreground flex flex-col gap-6 rounded-xl border border-l-4 border-l-blue-600 bg-blue-50/50 dark:!bg-gray-900 border-blue-200 dark:!border-gray-700 shadow-sm dar">
        <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info w-5 h-5 text-white">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 16v-4"></path>
                        <path d="M12 8h.01"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-blue-900 dark:!text-gray-100 mb-1">Registro de Mantenimientos Realizados</h3>
                    <p class="text-sm text-gray-700 dark:!text-gray-300">Este módulo permite <strong>registrar mantenimientos ya ejecutados</strong>, no programar futuros. Documenta el trabajo realizado, partes reemplazadas y el estado final del bien intervenido.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
<!-- Statistics Cards (Compact) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4">
        <!-- Card 1: Total Mantenimientos (Blue) -->
        <div data-slot="card" class="bg-white dark:bg-gray-800 text-slate-800 dark:text-gray-100 flex flex-col gap-3 rounded-lg relative overflow-hidden border border-slate-100 dark:border-gray-700 shadow-sm hover:shadow-md transition-all p-4 group">
            <div class="absolute top-0 right-0 w-16 h-16 bg-blue-50 dark:bg-blue-900/20 rounded-full -mr-6 -mt-6 opacity-50 group-hover:scale-110 transition-transform"></div>
            <div class="flex items-center justify-between z-10">
                <div class="p-2 bg-blue-100 dark:bg-blue-900/50 rounded-md text-blue-600 dark:text-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench">
                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-2xl font-bold text-slate-900 dark:text-gray-100 leading-tight">{{ $totalMantenimientos }}</p>
                <p class="text-xs text-slate-500 dark:text-gray-400 font-medium mt-0.5">Total Mantenimientos</p>
            </div>
        </div>

        <!-- Card 2: Preventivos (Emerald) -->
        <div data-slot="card" class="bg-white dark:bg-gray-800 text-slate-800 dark:text-gray-100 flex flex-col gap-3 rounded-lg relative overflow-hidden border border-slate-100 dark:border-gray-700 shadow-sm hover:shadow-md transition-all p-4 group">
            <div class="absolute top-0 right-0 w-16 h-16 bg-emerald-50 dark:bg-emerald-900/20 rounded-full -mr-6 -mt-6 opacity-50 group-hover:scale-110 transition-transform"></div>
            <div class="flex items-center justify-between z-10">
                <div class="p-2 bg-emerald-100 dark:bg-emerald-900/50 rounded-md text-emerald-600 dark:text-emerald-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-check">
                        <rect width="8" height="4" x="8" y="2" rx="1" ry="1"></rect>
                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                        <path d="m9 14 2 2 4-4"></path>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-2xl font-bold text-slate-900 dark:text-gray-100 leading-tight">{{ $preventivos }}</p>
                <p class="text-xs text-slate-500 dark:text-gray-400 font-medium mt-0.5">Preventivos</p>
            </div>
        </div>

        <!-- Card 3: Correctivos (Red) -->
        <div data-slot="card" class="bg-white dark:bg-gray-800 text-slate-800 dark:text-gray-100 flex flex-col gap-3 rounded-lg relative overflow-hidden border border-slate-100 dark:border-gray-700 shadow-sm hover:shadow-md transition-all p-4 group">
            <div class="absolute top-0 right-0 w-16 h-16 bg-red-50 dark:bg-red-900/20 rounded-full -mr-6 -mt-6 opacity-50 group-hover:scale-110 transition-transform"></div>
            <div class="flex items-center justify-between z-10">
                <div class="p-2 bg-red-100 dark:bg-red-900/50 rounded-md text-red-600 dark:text-red-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-circle">
                         <circle cx="12" cy="12" r="10"></circle>
                         <line x1="12" x2="12" y1="8" y2="12"></line>
                         <line x1="12" x2="12.01" y1="16" y2="16"></line>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-2xl font-bold text-slate-900 dark:text-gray-100 leading-tight">{{ $correctivos }}</p>
                <p class="text-xs text-slate-500 dark:text-gray-400 font-medium mt-0.5">Correctivos</p>
            </div>
        </div>

        <!-- Card 4: Este Mes (Amber) -->
        <div data-slot="card" class="bg-white dark:bg-gray-800 text-slate-800 dark:text-gray-100 flex flex-col gap-3 rounded-lg relative overflow-hidden border border-slate-100 dark:border-gray-700 shadow-sm hover:shadow-md transition-all p-4 group">
            <div class="absolute top-0 right-0 w-16 h-16 bg-amber-50 dark:bg-amber-900/20 rounded-full -mr-6 -mt-6 opacity-50 group-hover:scale-110 transition-transform"></div>
            <div class="flex items-center justify-between z-10">
                <div class="p-2 bg-amber-100 dark:bg-amber-900/50 rounded-md text-amber-600 dark:text-amber-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-clock">
                        <path d="M21 7.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.5"></path>
                        <path d="M16 2v4"></path>
                        <path d="M8 2v4"></path>
                        <path d="M3 10h5"></path>
                        <path d="M17.5 17.5 16 16.25V14"></path>
                        <path d="M22 16a6 6 0 1 1-12 0 6 6 0 0 1 12 0Z"></path>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-2xl font-bold text-slate-900 dark:text-gray-100 leading-tight">{{ $esteMes }}</p>
                <p class="text-xs text-slate-500 dark:text-gray-400 font-medium mt-0.5">Realizados Este Mes</p>
            </div>
        </div>
    </div>

    <!-- Main Content Card -->
    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0">
        <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div>
                    <h4 data-slot="card-title" class="flex items-center gap-2 text-base lg:text-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench w-5 h-5 lg:w-6 lg:h-6 text-blue-600">
                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                        </svg>
                        Historial de Mantenimientos
                    </h4>
                    <p data-slot="card-description" class="text-muted-foreground text-xs lg:text-sm mt-1">Registro de mantenimientos realizados</p>
                </div>
                <button onclick="openRegisterModal()" data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive text-primary-foreground h-8 rounded-md gap-1.5 px-3 has-[>svg]:px-2.5 bg-blue-600 hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-4 h-4 mr-2">
                        <path d="M5 12h14"></path>
                        <path d="M12 5v14"></path>
                    </svg>
                    Registrar Mantenimiento
                </button>
            </div>
        </div>

        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6 space-y-4">
            <!-- Search and Filter -->
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="flex-1 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                    <input id="searchInput" data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border px-3 py-1 bg-input-background transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive pl-10 text-sm" placeholder="Buscar por bien o descripción..." value="">
                </div>
                <select id="filterType" class="border border-gray-300 rounded-md px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 w-full sm:w-48 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                    <option value="">Todos los tipos</option>
                    <option value="preventivo">Preventivo</option>
                    <option value="correctivo">Correctivo</option>
                    <option value="predictivo">Predictivo</option>
                </select>
            </div>

            <!-- Toolbar: Items per page -->
            <div class="flex justify-between items-center mb-4 mt-4">
                <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                    <span>Mostrar</span>
                    <select id="itemsPerPage" class="border border-gray-300 rounded px-2 py-1 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent cursor-pointer dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                    </select>
                    <span>Items</span>
                </div>
            </div>

            <!-- Maintenance List -->

            <div id="maintenanceGrid" class="grid grid-cols-1 lg:grid-cols-2 gap-4 max-h-[60vh] overflow-y-auto pr-2">
                <!-- Card 1: Computadora Dell (Preventivo - Blue) -->
                <div data-slot="card" class="maintenance-card group relative bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700/60 overflow-hidden hover:shadow-lg transition-all duration-300" data-type="preventivo" data-search="Computadora Dell OptiPlex 7090 BN-2024-0001 Juan Pérez">
                    <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-blue-500 transition-transform duration-300 group-hover:w-2"></div>
                    <div class="p-4 pl-6 flex flex-col h-full justify-between">
                        <div>
                            <!-- Top Row details -->
                            <div class="flex justify-between items-start mb-2">
                                <span class="badge-base badge-bn font-mono tracking-tight">
                                    BN-2024-0001
                                </span>
                                <span data-badge="preventivo" class="inline-flex items-center gap-1.5 px-1.5 py-0.5 rounded-full font-bold uppercase tracking-wide bg-blue-50 text-blue-600 dark:bg-blue-900 dark:text-blue-300 ring-1 ring-inset ring-blue-500/20" style="font-size: 10px;">
                                    Preventivo
                                </span>
                            </div>

                            <!-- Main Info -->
                            <div class="mb-3">
                                <h3 class="text-base font-bold text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors mb-0.5 leading-tight">Computadora Dell OptiPlex 7090</h3>
                                 <div class="flex flex-wrap items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    <span class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                        Juan Pérez
                                    </span>
                                    <span class="w-0.5 h-0.5 rounded-full bg-gray-300 dark:bg-slate-600"></span>
                                    <span class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>
                                        19 Ene 2026
                                    </span>
                                </div>
                            </div>

                            <!-- Divider -->
                            <div class="h-px bg-gray-100 dark:bg-slate-700/50 mb-3 border-dashed border-b border-gray-200 dark:border-slate-700"></div>

                            <!-- Bottom Grid -->
                             <div class="grid grid-cols-2 gap-2 mb-4">
                                <div>
                                    <p class="text-[9px] uppercase text-gray-400 font-bold tracking-wider mb-0.5">Estado</p>
                                    <span class="inline-flex items-center gap-1.5 text-[11px] font-medium text-emerald-700 dark:text-emerald-400">
                                        <span class="relative flex h-1.5 w-1.5">
                                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                          <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-emerald-500"></span>
                                        </span>
                                        Operativo
                                    </span>
                                </div>
                                <div class="text-right">
                                    <p class="text-[9px] uppercase text-gray-400 font-bold tracking-wider mb-0.5">Costo Total</p>
                                    <p class="text-sm font-bold text-gray-900 dark:text-white">$45.00</p>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Actions -->
                        <div class="flex items-center justify-between gap-3 mt-auto pt-2 border-t border-gray-50 dark:border-slate-700/30">
                            <div class="flex -space-x-1 overflow-hidden">
                                <div class="inline-flex items-center justify-center px-1.5 py-0.5 rounded bg-gray-100 dark:bg-white/5 text-[9px] text-gray-600 dark:text-gray-300 font-medium z-10 border border-gray-200 dark:border-white/10" data-badge="neutral">Pasta térmica</div>
                                <div class="inline-flex items-center justify-center px-1.5 py-0.5 rounded bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 font-medium border border-gray-200 dark:border-gray-600 px-1.5 py-0.5 rounded" style="font-size: 9px;" data-badge="neutral">Ventilador</div>
                            </div>
                            <button onclick="openViewModal()" class="group/btn inline-flex items-center gap-1.5 px-2 py-1 bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-300 border border-blue-200 dark:border-blue-800 font-medium rounded-md hover:bg-blue-100 dark:hover:bg-blue-900/40 hover:border-blue-300 dark:hover:border-blue-700 transition-all shadow-sm" style="font-size: 10px;"">
                                Ver detalles
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Monitor LG (Correctivo - Red) -->
                <div data-slot="card" class="maintenance-card group relative bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700/60 overflow-hidden hover:shadow-lg transition-all duration-300" data-type="correctivo" data-search="Monitor LG 27 Correctivo BN-2023-0156 María González Falla de pantalla">
                    <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-red-500 transition-transform duration-300 group-hover:w-2"></div>
                    <div class="p-4 pl-6 flex flex-col h-full justify-between">
                        <div>
                            <!-- Top Row details -->
                            <div class="flex justify-between items-start mb-2">
                                <span class="badge-base badge-bn font-mono tracking-tight">
                                    BN-2023-0156
                                </span>
                                <span data-badge="correctivo" class="inline-flex items-center gap-1.5 px-1.5 py-0.5 rounded-full font-bold uppercase tracking-wide bg-red-50 text-red-600 dark:bg-red-900 dark:text-red-300 ring-1 ring-inset ring-red-500/20" style="font-size: 10px;">
                                    Correctivo
                                </span>
                            </div>

                            <!-- Main Info -->
                            <div class="mb-3">
                                <h3 class="text-base font-bold text-gray-900 dark:text-white group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors mb-0.5 leading-tight">Monitor LG 27"</h3>
                                 <div class="flex flex-wrap items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    <span class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                        María González
                                    </span>
                                    <span class="w-0.5 h-0.5 rounded-full bg-gray-300 dark:bg-slate-600"></span>
                                    <span class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                        2h 15m
                                    </span>
                                </div>
                            </div>

                            <!-- Divider -->
                            <div class="h-px bg-gray-100 dark:bg-slate-700/50 mb-3 border-dashed border-b border-gray-200 dark:border-slate-700"></div>

                            <!-- Bottom Grid -->
                             <div class="grid grid-cols-2 gap-2 mb-4">
                                <div>
                                    <p class="text-[9px] uppercase text-gray-400 font-bold tracking-wider mb-0.5">Estado</p>
                                    <span class="inline-flex items-center gap-1.5 text-[10px] font-medium text-emerald-700 dark:text-emerald-400">
                                        <span class="relative flex h-1.5 w-1.5">
                                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                          <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-emerald-500"></span>
                                        </span>
                                        Operativo
                                    </span>
                                </div>
                                <div class="text-right">
                                    <p class="text-[9px] uppercase text-gray-400 font-bold tracking-wider mb-0.5">Diagnóstico</p>
                                    <p class="text-xs font-medium text-gray-700 dark:text-gray-300 truncate max-w-[100px] ml-auto">Falla de pantalla</p>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Actions -->
                        <div class="flex items-center justify-between gap-3 mt-auto pt-2 border-t border-gray-50 dark:border-slate-700/30">
                            <div class="flex -space-x-1 overflow-hidden">
                                <div class="inline-flex items-center justify-center px-1.5 py-0.5 rounded bg-gray-100 dark:bg-white/5 text-[9px] text-gray-600 dark:text-gray-300 font-medium z-10 border border-gray-200 dark:border-white/10" data-badge="neutral">Panel LCD</div>
                            </div>
                            <button onclick="openViewModal()" class="group/btn inline-flex items-center gap-1.5 px-2 py-1 bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-300 border border-red-200 dark:border-red-800 font-medium rounded-md hover:bg-red-100 dark:hover:bg-red-900/40 hover:border-red-300 dark:hover:border-red-700 transition-all shadow-sm" style="font-size: 10px;"">
                                Ver detalles
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Equipo de Ultrasonido (Predictivo - Purple) -->
                <div data-slot="card" class="maintenance-card group relative bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-gray-200 dark:border-slate-700/60 overflow-hidden hover:shadow-lg transition-all duration-300" data-type="predictivo" data-search="Equipo de Ultrasonido BN-2024-0045 Luis Martínez Predictivo">
                    <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-purple-500 transition-transform duration-300 group-hover:w-2"></div>
                    <div class="p-4 pl-6 flex flex-col h-full justify-between">
                        <div>
                            <!-- Top Row details -->
                            <div class="flex justify-between items-start mb-2">
                                <span class="badge-base badge-bn font-mono tracking-tight">
                                    BN-2024-0045
                                </span>
                                <span class="inline-flex items-center gap-1.5 px-1.5 py-0.5 rounded-full font-bold uppercase tracking-wide bg-purple-50 text-purple-600 dark:bg-purple-900 dark:text-purple-300 ring-1 ring-inset ring-purple-500/20" style="font-size: 10px;"">
                                    Predictivo
                                </span>
                            </div>

                            <!-- Main Info -->
                            <div class="mb-3">
                                <h3 class="text-base font-bold text-gray-900 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors mb-0.5 leading-tight">Equipo de Ultrasonido</h3>
                                 <div class="flex flex-wrap items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    <span class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                        Luis Martínez
                                    </span>
                                    <span class="w-0.5 h-0.5 rounded-full bg-gray-300 dark:bg-slate-600"></span>
                                    <span class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>
                                        11 Ene 2026
                                    </span>
                                </div>
                            </div>

                            <!-- Divider -->
                            <div class="h-px bg-gray-100 dark:bg-slate-700/50 mb-3 border-dashed border-b border-gray-200 dark:border-slate-700"></div>

                            <!-- Bottom Grid -->
                             <div class="grid grid-cols-2 gap-2 mb-4">
                                <div>
                                    <p class="text-[9px] uppercase text-gray-400 font-bold tracking-wider mb-0.5">Estado</p>
                                    <span class="inline-flex items-center gap-1.5 text-[10px] font-medium text-emerald-700 dark:text-emerald-400">
                                        <span class="relative flex h-1.5 w-1.5">
                                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                          <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-emerald-500"></span>
                                        </span>
                                        Operativo
                                    </span>
                                </div>
                                <div class="text-right">
                                    <p class="text-[9px] uppercase text-gray-400 font-bold tracking-wider mb-0.5">Duración</p>
                                    <p class="text-base font-bold text-gray-900 dark:text-white">4h 00m</p>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Actions -->
                        <div class="flex items-center justify-between gap-3 mt-auto pt-2 border-t border-gray-50 dark:border-slate-700/30">
                            <div class="flex -space-x-1 overflow-hidden">
                                <div class="inline-flex items-center justify-center px-1.5 py-0.5 rounded bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 font-medium z-10 border border-gray-200 dark:border-gray-600 px-1.5 py-0.5 rounded" style="font-size: 9px;" data-badge="neutral">Gel</div>
                            </div>
                            <button onclick="openViewModal()" class="group/btn inline-flex items-center gap-1.5 px-2 py-1 bg-purple-50 dark:bg-purple-900/20 text-purple-600 dark:text-purple-300 border border-purple-200 dark:border-purple-800 font-medium rounded-md hover:bg-purple-100 dark:hover:bg-purple-900/40 hover:border-purple-300 dark:hover:border-purple-700 transition-all shadow-sm" style="font-size: 10px;"">
                                Ver detalles
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- ADD NEW MAINTENANCE CARD -->
                <div data-slot="card" class="maintenance-card-add group relative dark:bg-gray-800/50 rounded-xl border-2 border-dashed border-gray-300 dark:border-slate-700 hover:border-blue-500 dark:hover:border-blue-500/50 hover:bg-blue-50/50 dark:hover:bg-blue-900/10 transition-all duration-300 min-h-[220px] flex items-center justify-center cursor-pointer" onclick="openRegisterModal()">
                    <div class="flex flex-col items-center gap-3 text-center p-6">
                        <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-6 h-6 text-blue-600 dark:text-blue-400"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Registrar Nuevo</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Haga clic para agregar un registro</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination Control (Dynamic) -->
            <div id="paginationControls" class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-6 text-sm text-gray-500 dark:text-gray-400 border-t border-gray-200 dark:border-gray-700 pt-4">
                <span id="paginationInfo">Mostrando <span class="font-bold text-gray-900 dark:text-white">1</span> a <span class="font-bold text-gray-900 dark:text-white">4</span> de <span class="font-bold text-gray-900 dark:text-white">4</span> registros</span>
                
                <div id="paginationButtons" class="inline-flex items-center gap-1">
                    <!-- Buttons generated by JS -->
                </div>
            </div>


        </div>
    </div>
</div>

<!-- Modal Container -->
<div id="modalRegisterContainer" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm transition-all duration-300">
    @include('modals.register_maintenance')
</div>

@include('modals.view_maintenance_details')

@push('scripts')
<script>
    (function () {
        // --- 1. Badge Color Logic ---
        function updateMaintenanceBadges() {
            const isDark = document.documentElement.classList.contains('dark');
            const badges = document.querySelectorAll('[data-badge]');
            
            badges.forEach(badge => {
                const type = badge.dataset.badge;
                let bg, text, border;

                if (type === 'neutral') {
                    bg = isDark ? 'rgba(55, 65, 81, 0.5)' : '#f3f4f6'; 
                    text = isDark ? '#d1d5db' : '#6b7280'; 
                    border = isDark ? 'rgba(75, 85, 99, 0.5)' : '#e5e7eb'; 
                } else if (type === 'preventivo') {
                    bg = isDark ? 'rgba(30, 58, 138, 0.4)' : '#eff6ff'; 
                    text = isDark ? '#93c5fd' : '#2563eb'; 
                    border = isDark ? 'rgba(30, 58, 138, 0.2)' : 'transparent';
                } else if (type === 'correctivo') {
                    bg = isDark ? 'rgba(127, 29, 29, 0.4)' : '#fef2f2'; 
                    text = isDark ? '#fca5a5' : '#dc2626'; 
                    border = isDark ? 'rgba(127, 29, 29, 0.2)' : 'transparent';
                } else if (type === 'predictivo') {
                    bg = isDark ? 'rgba(88, 28, 135, 0.4)' : '#faf5ff'; 
                    text = isDark ? '#d8b4fe' : '#9333ea'; 
                    border = isDark ? 'rgba(88, 28, 135, 0.2)' : 'transparent';
                }

                if (bg) badge.style.backgroundColor = bg;
                if (text) badge.style.color = text;
                if (border) badge.style.borderColor = border;
            });
        }

        updateMaintenanceBadges();
        

        const observer = new MutationObserver(function() {
            updateMaintenanceBadges();
            updateIconColors();
        });
        observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });

        // --- 3. Icon Color Logic (Force White in Dark Mode) ---
        function updateIconColors() {
            const isDark = document.documentElement.classList.contains('dark');
            
            // Register New Card Icon
            const addCard = document.querySelector('.maintenance-card-add');
            if (addCard) {
                const icon = addCard.querySelector('svg.lucide-plus');
                if (icon) {
                     if (isDark) {
                        icon.classList.remove('text-blue-600');
                        icon.classList.add('text-white');
                        icon.style.setProperty('color', 'white', 'important');
                    } else {
                        icon.classList.add('text-blue-600');
                        icon.classList.remove('text-white');
                        icon.style.removeProperty('color');
                    }
                }
            }
        }
        
        // Initial call
        updateIconColors();

        // --- 2. Search, Filter & Pagination Logic ---
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const filterType = document.getElementById('filterType');
            const itemsPerPage = document.getElementById('itemsPerPage');
            const grid = document.getElementById('maintenanceGrid');
            const paginationInfo = document.getElementById('paginationInfo');
            const paginationButtons = document.getElementById('paginationButtons');

            // Select all cards except the "Add New" card (which we might want to always show or exclude)
            // Strategy: Filter only .maintenance-card items, leave .maintenance-card-add visible or separate?
            // Usually "Add New" is the first item or last. Let's assume we filter CONTENT cards.
            // If the user wants to filter everything, we include the add card in the logic or keep it sticky.
            // Let's keep "Add New" always visible at the end or filtered out if strictly searching.
            // For now, let's include only data-cards in filtering.

            let allCards = Array.from(document.querySelectorAll('.maintenance-card'));
            let currentPage = 1;

            function getFilteredCards() {
                const query = searchInput.value.toLowerCase();
                const type = filterType.value.toLowerCase();

                return allCards.filter(card => {
                    const searchContent = (card.dataset.search || '').toLowerCase();
                    const cardType = (card.dataset.type || '').toLowerCase();

                    const matchesSearch = searchContent.includes(query);
                    const matchesType = type === '' || cardType === type;

                    return matchesSearch && matchesType;
                });
            }

            function render() {
                const perPage = parseInt(itemsPerPage.value);
                const filtered = getFilteredCards();
                const total = filtered.length;
                const totalPages = Math.ceil(total / perPage);

                // Adjust current page if out of bounds
                if (currentPage > totalPages) currentPage = totalPages || 1;
                if (currentPage < 1) currentPage = 1;

                const start = (currentPage - 1) * perPage;
                const end = start + perPage;
                const pageItems = filtered.slice(start, end);

                // 1. Hide ALL cards first
                allCards.forEach(card => card.classList.add('hidden'));

                // 2. Show only items for current page
                pageItems.forEach(card => card.classList.remove('hidden'));

                // 3. Update Pagination Controls
                updatePaginationUI(start + 1, Math.min(end, total), total, totalPages);
            }

            function updatePaginationUI(start, end, total, totalPages) {
                // Info Text
                if (total === 0) {
                    paginationInfo.innerHTML = 'Sin resultados';
                    start = 0; end = 0;
                } else {
                    paginationInfo.innerHTML = `Mostrando <span class="font-bold text-gray-900 dark:text-white">${start}</span> a <span class="font-bold text-gray-900 dark:text-white">${end}</span> de <span class="font-bold text-gray-900 dark:text-white">${total}</span> registros`;
                }

                // Buttons
                let btnsHtml = '';
                
                // Prev
                btnsHtml += `<button onclick="changePage(${currentPage - 1})" class="p-2 rounded-md border border-gray-200 dark:border-gray-700 bg-white dark:bg-slate-800 hover:bg-gray-50 dark:hover:bg-slate-700 disabled:opacity-50 disabled:cursor-not-allowed text-gray-600 dark:text-gray-400" ${currentPage === 1 ? 'disabled' : ''}>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
                             </button>`;

                // Pages (Simplified: 1, 2... Total)
                for (let i = 1; i <= totalPages; i++) {
                    if (i === currentPage) {
                        btnsHtml += `<button class="w-8 h-8 flex items-center justify-center rounded-md bg-blue-600 text-white font-medium shadow-sm border border-blue-600">${i}</button>`;
                    } else {
                        btnsHtml += `<button onclick="changePage(${i})" class="w-8 h-8 flex items-center justify-center rounded-md border border-gray-200 dark:border-gray-700 bg-white dark:bg-slate-800 hover:bg-gray-50 dark:hover:bg-slate-700 text-gray-600 dark:text-gray-400">${i}</button>`;
                    }
                }

                // Next
                btnsHtml += `<button onclick="changePage(${currentPage + 1})" class="p-2 rounded-md border border-gray-200 dark:border-gray-700 bg-white dark:bg-slate-800 hover:bg-gray-50 dark:hover:bg-slate-700 disabled:opacity-50 disabled:cursor-not-allowed text-gray-600 dark:text-gray-400" ${currentPage === totalPages || total === 0 ? 'disabled' : ''}>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
                             </button>`;

                paginationButtons.innerHTML = btnsHtml;
            }

            // Global wrapper for onclick
            window.changePage = function(page) {
                currentPage = page;
                render();
            };

            // Listeners
            searchInput.addEventListener('input', () => { currentPage = 1; render(); });
            filterType.addEventListener('change', () => { currentPage = 1; render(); });
            itemsPerPage.addEventListener('change', () => { currentPage = 1; render(); });

            // Initial Render
            render();
        });
    })();
</script>
<script>
    function openRegisterModal() {
        const modal = document.getElementById('modalRegisterContainer');
        modal.classList.remove('hidden');
        
        // Reset wizard state if the function exists
        if (typeof window.initMaintenanceWizard === 'function') {
            window.initMaintenanceWizard();
        }
    }

    function closeRegisterModal() {
        const modal = document.getElementById('modalRegisterContainer');
        modal.classList.add('hidden');
    }

    // Close modal when clicking outside
    document.getElementById('modalRegisterContainer').addEventListener('click', function(e) {
        if (e.target === this) closeRegisterModal();
    });

    // View Details Modal Logic
    function openViewModal() {
        const modal = document.getElementById('modalViewDetails');
        modal.classList.remove('hidden');
    }

    function closeViewModal() {
        const modal = document.getElementById('modalViewDetails');
        modal.classList.add('hidden');
    }

    document.getElementById('modalViewDetails').addEventListener('click', function(e) {
        if (e.target === this) closeViewModal();
    });
</script>
@endpush

@endsection
