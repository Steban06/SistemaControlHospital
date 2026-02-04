@extends('layouts.app')

@section('content')
<div class="space-y-4 lg:space-y-6 p-4 lg:p-6">
    <!-- Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4">
        <!-- Total Card -->
        <div data-slot="card" class="bg-white dark:bg-gray-800 text-slate-800 dark:text-gray-100 flex flex-col gap-3 rounded-lg relative overflow-hidden border border-slate-100 dark:border-gray-700 shadow-sm hover:shadow-md transition-all p-4 group">
            <div class="absolute top-0 right-0 w-16 h-16 bg-blue-50 dark:bg-blue-900/20 rounded-full -mr-6 -mt-6 opacity-50 group-hover:scale-110 transition-transform"></div>
            <div class="flex items-center justify-between z-10">
                <div class="p-2 bg-blue-100 dark:bg-blue-900/50 rounded-md text-blue-600 dark:text-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind">
                        <path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path>
                        <path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path>
                        <path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-2xl font-bold text-slate-900 dark:text-gray-100 leading-tight">{{ $totalAires }}</p>
                <p class="text-xs text-slate-500 dark:text-gray-400 font-medium mt-0.5">Total Unidades</p>
            </div>
        </div>
        
        <!-- Operativos Card -->
        <div data-slot="card" class="bg-white dark:bg-gray-800 text-slate-800 dark:text-gray-100 flex flex-col gap-3 rounded-lg relative overflow-hidden border border-slate-100 dark:border-gray-700 shadow-sm hover:shadow-md transition-all p-4 group">
            <div class="absolute top-0 right-0 w-16 h-16 bg-emerald-50 dark:bg-emerald-900/20 rounded-full -mr-6 -mt-6 opacity-50 group-hover:scale-110 transition-transform"></div>
            <div class="flex items-center justify-between z-10">
                <div class="p-2 bg-emerald-100 dark:bg-emerald-900/50 rounded-md text-emerald-600 dark:text-emerald-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big">
                        <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                        <path d="m9 11 3 3L22 4"></path>
                    </svg>
                </div>
                <div class="flex items-center gap-1 text-xs font-medium text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/50 px-2 py-0.5 rounded-full border border-emerald-100 dark:border-emerald-800">
                    {{ $operativosPorcentaje }}%
                </div>
            </div>
            <div>
                <p class="text-2xl font-bold text-slate-900 dark:text-gray-100 leading-tight">{{ $operativosCount }}</p>
                <p class="text-xs text-slate-500 dark:text-gray-400 font-medium mt-0.5">Operativos</p>
            </div>
        </div>
        
        <!-- Mantenimiento Card -->
        <div data-slot="card" class="bg-white dark:bg-gray-800 text-slate-800 dark:text-gray-100 flex flex-col gap-3 rounded-lg relative overflow-hidden border border-slate-100 dark:border-gray-700 shadow-sm hover:shadow-md transition-all p-4 group">
            <div class="absolute top-0 right-0 w-16 h-16 bg-amber-50 dark:bg-amber-900/20 rounded-full -mr-6 -mt-6 opacity-50 group-hover:scale-110 transition-transform"></div>
            <div class="flex items-center justify-between z-10">
                <div class="p-2 bg-amber-100 dark:bg-amber-900/50 rounded-md text-amber-600 dark:text-amber-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench">
                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                    </svg>
                </div>
                <div class="flex items-center gap-1 text-xs font-medium text-amber-600 dark:text-amber-400 bg-amber-50 dark:bg-amber-900/50 px-2 py-0.5 rounded-full border border-amber-100 dark:border-amber-800">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" x2="12" y1="8" y2="12"></line>
                        <line x1="12" x2="12.01" y1="16" y2="16"></line>
                    </svg>
                    Pend.
                </div>
            </div>
            <div>
                <p class="text-2xl font-bold text-slate-900 dark:text-gray-100 leading-tight">{{ $mantenimientoCount }}</p>
                <p class="text-xs text-slate-500 dark:text-gray-400 font-medium mt-0.5">Mantenimiento</p>
            </div>
        </div>
        
        <!-- Fuera Servicio Card -->
        <div data-slot="card" class="bg-white dark:bg-gray-800 text-slate-800 dark:text-gray-100 flex flex-col gap-3 rounded-lg relative overflow-hidden border border-slate-100 dark:border-gray-700 shadow-sm hover:shadow-md transition-all p-4 group">
            <div class="absolute top-0 right-0 w-16 h-16 bg-red-50 dark:bg-red-900/20 rounded-full -mr-6 -mt-6 opacity-50 group-hover:scale-110 transition-transform"></div>
            <div class="flex items-center justify-between z-10">
                <div class="p-2 bg-red-100 dark:bg-red-900/50 rounded-md text-red-600 dark:text-red-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="m15 9-6 6"></path>
                        <path d="m9 9 6 6"></path>
                    </svg>
                </div>
                <div class="flex items-center gap-1 text-xs font-medium text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-900/50 px-2 py-0.5 rounded-full border border-red-100 dark:border-red-800">
                    Críticos
                </div>
            </div>
            <div>
                <p class="text-2xl font-bold text-slate-900 dark:text-gray-100 leading-tight">{{ $fueraCount }}</p>
                <p class="text-xs text-slate-500 dark:text-gray-400 font-medium mt-0.5">Fuera de Servicio</p>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0 bg-white dark:bg-gray-800">
        <!-- Header & Filters -->
        <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
            <div class="flex flex-col gap-4">
                <div class="flex items-start justify-between gap-4">
                    <div class="min-w-0 flex-1">
                        <h4 data-slot="card-title" class="flex items-center gap-2 text-base lg:text-xl font-semibold text-gray-900 dark:text-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind w-5 h-5 lg:w-6 lg:h-6 text-blue-600 dark:text-blue-400 flex-shrink-0"><path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path><path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path><path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path></svg>
                            <span class="truncate">Aires Acondicionados</span>
                        </h4>
                        <p data-slot="card-description" class="text-muted-foreground text-xs lg:text-sm mt-1 text-gray-500 dark:text-gray-400">Sistema de gestión y control de climatización hospitalaria</p>
                    </div>
                    {{-- onclick="ModalManager.openModal(document.getElementById('addACModal'))" --}}
                    @if(auth()->user()->role !== 'guest')
                    <button id="addACBtn" data-slot="button" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-blue-600 text-white shadow hover:bg-blue-700 h-8 rounded-md gap-1.5 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-4 h-4 lg:mr-2"><path d="M5 12h14"></path><path d="M12 5v14"></path></svg>
                        <span class="hidden lg:inline">Agregar Aire Acondicionado</span>
                    </button>
                    @endif
                </div>
            </div>
        </div>

        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6 space-y-4">
            <!-- Search & Filters -->
            <div class="flex flex-col lg:flex-row items-center gap-6 w-full">
                <div class="relative w-full lg:w-64">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                    <input id="searchInput" class="placeholder:text-muted-foreground border-input flex h-9 w-full rounded-md border bg-input-background pl-10 pr-3 py-1 text-sm outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 transition-all shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:placeholder-gray-400" placeholder="Buscar por código, nombre...">
                </div>

                <div class="flex flex-col lg:flex-row gap-4 w-full lg:flex-1 items-center">
                    <div class="flex items-center gap-2 w-full lg:flex-1">
                        <span class="text-xs lg:text-sm font-medium text-gray-600 dark:text-gray-300 whitespace-nowrap">Estado:</span>
                        <div class="relative w-full">
                            <select id="filterStatus" class="appearance-none border-input flex h-9 w-full items-center justify-between rounded-md border bg-input-background px-3 py-1 text-xs lg:text-sm outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 cursor-pointer transition-all pr-10 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                <option value="">Todos</option>
                                <option value="operativo">Operativo</option>
                                <option value="mantenimiento">Mantenimiento</option>
                                <option value="fuera de servicio">Fuera de servicio</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 w-full lg:flex-1">
                        {{-- <span class="text-xs lg:text-sm font-medium text-gray-600 dark:text-gray-300 whitespace-nowrap">Ubicación:</span> --}}
                        <div class="relative w-full">
                            {{-- <select id="filterLocation" class="appearance-none border-input flex h-9 w-full items-center justify-between rounded-md border bg-input-background px-3 py-1 text-xs lg:text-sm outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 cursor-pointer transition-all pr-10 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                <option value="">Todas</option>
                                @foreach($areas as $area)
                                    <option value="{{ $area->descripcion }}">{{ $area->descripcion }}</option>
                                @endforeach
                            </select> --}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grid -->
            <div id="acGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-3">
                    @foreach($aires as $aire)
                    <div data-slot="card" 
                         data-search="{{ strtolower($aire->numero_bn . ' ' . $aire->nombre_aa . ' ' . $aire->capacidad) }}"
                         data-status="{{ $aire->estado }}"
                         {{-- data-location="{{ $aire->bienNacional?->area?->descripcion ?? '' }}" --}}
                         class="bg-white text-card-foreground flex flex-col gap-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-lg transition-all hover:border-blue-300 group h-full dark:bg-gray-800 dark:border-gray-700 dark:hover:border-blue-600">
                        <div data-slot="card-header" class="px-6 pt-6 pb-3 space-y-2 flex-1">
                             <div class="flex items-start justify-between gap-2">
                                <div class="flex items-center gap-2">
                                    <div class="bg-blue-100 dark:bg-blue-900/50 p-1.5 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind w-3.5 h-3.5 text-blue-600 dark:text-white"><path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path><path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path><path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path></svg>
                                    </div>
                                    <span class="font-mono text-xs text-gray-600 dark:text-gray-400">{{ $aire->numero_bn }}</span>
                                </div>
                                
                                @php
                                    $statusClasses = match(strtolower($aire->estado)) {
                                        'operativo' => 'border-emerald-300 bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400 dark:border-emerald-800',
                                        'mantenimiento' => 'border-amber-300 bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400 dark:border-amber-800',
                                        'fuera de servicio' => 'border-red-300 bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400 dark:border-red-800',
                                        default => 'border-gray-300 bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600'
                                    };
                                    $statusIcon = match(strtolower($aire->estado)) {
                                        'operativo' => '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
                                        'mantenimiento' => '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>',
                                        'fuera de servicio' => '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>',
                                        default => ''
                                    };
                                @endphp

                                <span class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium gap-1 {{ $statusClasses }}">
                                    {!! $statusIcon !!}
                                    {{ ucfirst($aire->estado) }}
                                </span>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm text-gray-900 dark:text-gray-100 leading-tight">
                                    {{ sprintf('%02d', $aire->id) }} - {{ $aire->nombre_aa }}
                                </h3>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">{{ $aire->capacidad }}</p>
                            </div>
                        </div>
                        <div data-slot="card-content" class="px-6 pb-6 pt-0 space-y-2">
                             <button onclick="openViewACModal({{ $aire->id }})" class="cursor-pointer flex items-center justify-center w-full h-8 rounded-md bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 text-xs font-medium text-gray-700 hover:from-blue-100 hover:to-indigo-100 transition-colors gap-1.5 bg-blue-50 dark:bg-blue-900/30 dark:border-blue-800 dark:text-gray-100 dark:hover:bg-blue-900/50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                Ver Más Información
                            </button>
                            <div class="grid grid-cols-2 gap-1.5">
                                <button onclick="openEditACModal({{ $aire->id }})" class="cursor-pointer flex items-center justify-center h-8 rounded-md border border-gray-200 bg-white text-xs font-medium text-gray-700 hover:bg-gray-50 transition-colors gap-1.5 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"></path></svg>
                                    Editar
                                </button>
                                <button class="cursor-pointer flex items-center justify-center h-8 rounded-md border border-red-200 bg-white text-xs font-medium text-red-600 hover:bg-red-50 transition-colors gap-1.5 dark:bg-gray-700 dark:border-red-900/50 dark:text-red-400 dark:hover:bg-red-900/30">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path><line x1="10" x2="10" y1="11" y2="17"></line><line x1="14" x2="14" y1="11" y2="17"></line></svg>
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    <!-- Registrar Nuevo Card -->
                    @if(auth()->user()->role !== 'guest')
                    <!-- Registrar Nuevo Card -->
                    <div data-slot="card" class="group relative dark:bg-gray-800 rounded-xl border-2 border-dashed border-gray-300 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-500/50 hover:bg-blue-50/50 dark:hover:bg-blue-900/10 transition-all duration-300 min-h-[220px] flex items-center justify-center cursor-pointer" onclick="ModalManager.openModal(document.getElementById('addACModal'))">
                        <div class="flex flex-col items-center gap-3 text-center p-6">
                            <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-6 h-6 text-blue-600 dark:text-white"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-gray-100 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Registrar Nuevo</h3>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Haga clic para agregar un registro</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            <div id="countDisplay" class="text-xs lg:text-sm text-gray-500 pt-2 border-t dark:border-gray-700 dark:text-gray-400">Mostrando {{ count($aires) }} de {{ count($aires) }} unidades</div>
        </div>
    </div>
</div>


@include('modals.add_ac')
@include('modals.edit_ac')
@include('modals.view_ac')
@include('modals.history_ac')
@include('modals.missing_materials')
@include('modals.add_missing_material')

@push('scripts')
<script src="{{ asset('js/modal.js') }}"></script>
<script src="{{ asset('js/ac_filters.js') }}"></script>
<script src="{{ asset('js/modalController.js') }}"></script>
<script>
    // Fix stat card badge colors for dark mode
    (function() {
        function updateStatBadgeColors() {
            const isDark = document.documentElement.classList.contains('dark');
            
            // Find all stat card badges
            const badges = document.querySelectorAll('[data-slot="card"] .flex.items-center.gap-1.text-xs.font-medium');
            
            badges.forEach(badge => {
                const text = badge.textContent.trim();
                let bgColor, textColor, borderColor;
                
                // Identify badge by text content
                if (text.includes('%')) {
                    // Operativos badge (green)
                    bgColor = isDark ? 'rgba(6, 78, 59, 0.5)' : '#d1fae5';
                    textColor = isDark ? '#6ee7b7' : '#047857';
                    borderColor = isDark ? '#064e3b' : '#a7f3d0';
                } else if (text.includes('Pend')) {
                    // Mantenimiento badge (amber)
                    bgColor = isDark ? 'rgba(120, 53, 15, 0.5)' : '#fef3c7';
                    textColor = isDark ? '#fcd34d' : '#b45309';
                    borderColor = isDark ? '#78350f' : '#fde68a';
                } else if (text.includes('Críticos')) {
                    // Fuera de servicio badge (red)
                    bgColor = isDark ? 'rgba(127, 29, 29, 0.5)' : '#fee2e2';
                    textColor = isDark ? '#fca5a5' : '#b91c1c';
                    borderColor = isDark ? '#7f1d1d' : '#fecaca';
                } else {
                    return; // Skip if no match
                }
                
                badge.style.backgroundColor = bgColor;
                badge.style.color = textColor;
                badge.style.borderColor = borderColor;
            });
        }
        
        // Run on load
        updateStatBadgeColors();
        
        // Watch for theme changes
        const observer = new MutationObserver(updateStatBadgeColors);
        observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
    })();

    // Fix delete button colors for dark mode
    document.addEventListener('DOMContentLoaded', function() {
        function updateDeleteButtonColors() {
            const isDark = document.documentElement.classList.contains('dark');
            // More specific selector - buttons with trash icon
            const deleteButtons = document.querySelectorAll('button .lucide-trash2');
            
            deleteButtons.forEach(svg => {
                const btn = svg.closest('button');
                if (!btn) return;
                
                if (isDark) {
                    btn.style.setProperty('background-color', '#1f2937', 'important'); // gray-800
                    btn.style.setProperty('border-color', '#7f1d1d', 'important'); // red-900
                    btn.style.setProperty('color', 'red', 'important'); // red-300
                } else {
                    btn.style.removeProperty('background-color');
                    btn.style.removeProperty('border-color');
                    btn.style.removeProperty('color');
                }
            });
        }
        
        // Run immediately
        updateDeleteButtonColors();
        
        // Watch for theme changes
        const observer = new MutationObserver(updateDeleteButtonColors);
        observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
        
        // Add hover effect
        document.querySelectorAll('button .lucide-trash2').forEach(svg => {
            const btn = svg.closest('button');
            if (!btn) return;
            
            btn.addEventListener('mouseenter', function() {
                const isDark = document.documentElement.classList.contains('dark');
                if (isDark) {
                    this.style.setProperty('background-color', '#450a0a', 'important'); // red-950
                    this.style.setProperty('color', '#ffffff', 'important'); // white text
                }
            });
            
            btn.addEventListener('mouseleave', function() {
                const isDark = document.documentElement.classList.contains('dark');
                if (isDark) {
                    this.style.setProperty('background-color', '#1f2937', 'important');
                    this.style.setProperty('color', 'red', 'important'); // back to red
                }
            });
        });
    });

    // Asegurar que los botones de cierre funcionen para Add AC Modal
    document.addEventListener('DOMContentLoaded', function() {
        ModalManagerE.init({
            storeUrl: "{{ route('aires-acondicionados.store') }}",
            updateUrl: "",
            botonAdd: document.getElementById('addACBtn'),
            modalAdd: document.getElementById('addACModal'),
            formAdd: document.getElementById('formAddAC'),
            botonEdit: document.getElementById('editACBtn'),
        });


        const formEditAC = document.getElementById('formEditAC');
    if (formEditAC) {
        formEditAC.addEventListener('submit', function(e) {
            e.preventDefault();

            const acId = document.getElementById('editACId').value;
            
            // Verifica en consola que acId no esté vacío
            if (!acId) {
                console.error("ID del Aire no encontrado");
                return;
            }

            const updateUrl = `{{ url('aires-acondicionados') }}/${acId}`;
            const formData = new FormData(formEditAC);

            // Agregamos el método manualmente AQUÍ
            formData.append('_method', 'PUT');

            fetch(updateUrl, {
                method: 'POST', // El motor de envío es POST
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(async response => {
                const data = await response.json();
                if (!response.ok) throw data;
                return data;
            })
            .then(data => {
                console.log('Actualizado:', data);
                // Opcional: Cerrar modal y refrescar
                location.reload();
            })
            .catch(err => {
                console.error('Error:', err);
                alert('Error al actualizar: ' + (err.message || 'Verifica los campos'));
            });
        });
    }





        // Event listeners para Edit AC Modal
        const editModal = document.getElementById('editACModal');
        if (editModal) {
            editModal.querySelectorAll('[data-modal-close]').forEach(btn => {
                btn.addEventListener('click', function() {
                    ModalManager.closeModal(editModal);
                });
            });
            
            const editBackdrop = editModal.querySelector('[data-modal-cancel]');
            if (editBackdrop) {
                editBackdrop.addEventListener('click', function(e) {
                    if (e.target === editBackdrop) {
                        ModalManager.closeModal(editModal);
                    }
                });
            }
        }

        // Event listeners para View AC Modal
        const viewModal = document.getElementById('viewACModal');
        if (viewModal) {
            viewModal.querySelectorAll('[data-modal-close]').forEach(btn => {
                btn.addEventListener('click', function() {
                    ModalManager.closeModal(viewModal);
                });
            });
            
            const viewBackdrop = viewModal.querySelector('[data-modal-cancel]');
            if (viewBackdrop) {
                viewBackdrop.addEventListener('click', function(e) {
                    if (e.target === viewBackdrop) {
                        ModalManager.closeModal(viewModal);
                    }
                });
            }
        }

        // Event listeners para History AC Modal
        const historyModal = document.getElementById('historyACModal');
        if (historyModal) {
            historyModal.querySelectorAll('[data-modal-close]').forEach(btn => {
                btn.addEventListener('click', function() {
                    ModalManager.closeModal(historyModal);
                });
            });
            
            const historyBackdrop = historyModal.querySelector('[data-modal-cancel]');
            if (historyBackdrop) {
                historyBackdrop.addEventListener('click', function(e) {
                    if (e.target === historyBackdrop) {
                        ModalManager.closeModal(historyModal);
                    }
                });
            }
        }

        // Event listeners para Missing Materials Modal
        const materialsModal = document.getElementById('missingMaterialsModal');
        if (materialsModal) {
             materialsModal.querySelectorAll('[data-modal-close]').forEach(btn => {
                btn.addEventListener('click', function() {
                    ModalManager.closeModal(materialsModal);
                });
            });
            
            const materialsBackdrop = materialsModal.querySelector('[data-modal-cancel]');
            if (materialsBackdrop) {
                materialsBackdrop.addEventListener('click', function(e) {
                    if (e.target === materialsBackdrop) {
                        ModalManager.closeModal(materialsModal);
                    }
                });
            }

            // Handle "Add Material" button inside Missing Materials Modal
            const btnAddMaterial = document.getElementById('btnAddMissingMaterial');
            if (btnAddMaterial) {
                btnAddMaterial.addEventListener('click', function() {
                    const acId = materialsModal.dataset.acId;
                    const acName = materialsModal.dataset.acName;
                    
                    // Close Missing Materials Modal
                    ModalManager.closeModal(materialsModal);
                    
                    // Open Add Material Modal with delay
                    setTimeout(() => {
                        openAddMaterialModal(acId, acName);
                    }, 100);
                });
            }
        }

        // Event listeners para Add Material Modal
        const addMaterialModal = document.getElementById('addMaterialModal');
        if (addMaterialModal) {
            addMaterialModal.querySelectorAll('[data-modal-close]').forEach(btn => {
                btn.addEventListener('click', function() {
                    ModalManager.closeModal(addMaterialModal);
                    // Re-open Missing Materials Modal when Add Modal is closed (if needed context exists)
                    const acId = addMaterialModal.dataset.acId;
                    const acName = addMaterialModal.dataset.acName;
                    if (acId) {
                         setTimeout(() => {
                            openMissingMaterialsModal(acId, acName);
                        }, 100);
                    }
                });
            });
            
             const addMaterialBackdrop = addMaterialModal.querySelector('[data-modal-cancel]');
             if (addMaterialBackdrop) {
                addMaterialBackdrop.addEventListener('click', function(e) {
                    if (e.target === addMaterialBackdrop) {
                         // Same close logic as buttons
                         ModalManager.closeModal(addMaterialModal);
                          const acId = addMaterialModal.dataset.acId;
                          const acName = addMaterialModal.dataset.acName;
                          if (acId) {
                             setTimeout(() => {
                                openMissingMaterialsModal(acId, acName);
                            }, 100);
                        }
                    }
                });
            }
        }
    });

    // Función para abrir el modal de edición y pre-llenar datos
    function openEditACModal(acId) {
        // Obtener datos del AC via AJAX
        // fetch(`/aires-acondicionados/${acId}/edit`)
        fetch(`{{ url('aires-acondicionados') }}/${acId}/edit`)
            .then(response => response.json())
            .then(data => {
                // Pre-llenar campos del formulario
                document.getElementById('editACId').value = data.id || '';
                document.getElementById('edit_codigo').value = data.numero_bn || '';
                document.getElementById('edit_nombre_aa').value = data.nombre_aa || '';
                document.getElementById('edit_modelo').value = data.modelo || '';
                
                // Especificaciones técnicas
                document.getElementById('edit_capacidad').value = data.capacidad || '';
                document.getElementById('edit_voltaje').value = data.voltaje || '';
                document.getElementById('edit_refrigerante').value = data.refrigerante || '';
                document.getElementById('edit_estado').value = data.estado || 'operativo';
                document.getElementById('edit_presionA').value = data.presion_alta || '';
                document.getElementById('edit_presionB').value = data.presion_baja || '';
                
                document.getElementById('edit_observaciones').value = data.observaciones || '';
                
                // Actualizar action del form con el ID correcto
                document.getElementById('formEditAC').action = `/aires-acondicionados/${acId}`;
                
                // Abrir modal
                ModalManager.openModal(document.getElementById('editACModal'));
            })
            .catch(error => {
                console.error('Error al cargar datos del AC:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al cargar los datos del aire acondicionado'
                });
            });
    }

    // Función para abrir el modal de Ver Más Información
    function openViewACModal(acId) {
        fetch(`{{ url('aires-acondicionados') }}/${acId }`)
            .then(response => response.json())
            .then(data => {
                // Populate Subtitle
                document.getElementById('view_ac_subtitle').innerText = `${data.id.toString().padStart(2, '0')} - ${data.nombre_aa || ''}`;
                
                // // Populate Text Fields
                document.getElementById('view_codigo').innerText = data.numero_bn || 'N/A';
                document.getElementById('view_modelo').innerText = data.modelo || 'N/A';

                // // Technical Fields
                document.getElementById('view_capacidad').innerText = data.capacidad || 'N/A';
                document.getElementById('view_voltaje').innerText = data.voltaje || 'N/A';
                document.getElementById('view_refrigerante').innerText = data.refrigerante || '';
                document.getElementById('view_presionA').innerText = data.presion_alta;
                document.getElementById('view_presionB').innerText = data.presion_baja || 'N/A';

                document.getElementById('view_creacion').innerText = new Date(data.created_at).toISOString().split('T')[0] || 'N/A';
                document.getElementById('view_actualizacion').innerText = new Date(data.updated_at).toISOString().split('T')[0] || 'N/A';


                // Status Badge Logic
                const statusContainer = document.getElementById('view_estado_container');
                let badgeClass = '';
                let icon = '';
                let text = '';

                if (data.estado === 'operativo') {
                    badgeClass = 'bg-emerald-100 text-emerald-700 border-emerald-300';
                    icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-3 h-3"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>';
                    text = 'Operativo';
                } else if (data.estado === 'mantenimiento') {
                    badgeClass = 'bg-amber-100 text-amber-700 border-amber-300';
                    icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench w-3 h-3"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>';
                    text = 'Mantenimiento';
                } else {
                    badgeClass = 'bg-red-100 text-red-700 border-red-300';
                    icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x w-3 h-3"><circle cx="12" cy="12" r="10"></circle><path d="m15 9-6 6"></path><path d="m9 9 6 6"></path></svg>';
                    text = 'Fuera de Servicio';
                }

                statusContainer.innerHTML = `<span class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&>svg]:size-3 [&>svg]:pointer-events-none transition-[color,box-shadow] overflow-hidden flex items-center gap-1 w-fit text-xs ${badgeClass}">${icon}${text}</span>`;

                // Handle Edit Button inside View Modal
                const editBtn = document.getElementById('view_btn_edit');
                editBtn.onclick = function() {
                    ModalManager.closeModal(document.getElementById('viewACModal'));
                    // Small delay to ensure smooth transition? No need, synchronous is fine for basic display toggling if ModalManager handles it.
                   setTimeout(() => {
                        openEditACModal(data.id);
                   }, 100);
                };

                // Handle History Button inside View Modal
                const historyBtn = document.getElementById('view_btn_history');
                historyBtn.onclick = function() {
                    // ModalManager.closeModal(document.getElementById('viewACModal')); // Optional: close view modal first? Usually yes for stack clarity, or keep both?
                    // Let's close view modal to avoid backdrop stacking issues unless managed well.
                    ModalManager.closeModal(document.getElementById('viewACModal'));
                    setTimeout(() => {
                        openHistoryACModal(data.id, data.nombre_aa, data.numero_bn);
                    }, 100);
                };

                // Handle Missing Materials Button
                const materialsBtn = document.getElementById('view_btn_materials');
                materialsBtn.onclick = function() {
                    ModalManager.closeModal(document.getElementById('viewACModal'));
                    setTimeout(() => {
                        openMissingMaterialsModal(data.id, data.nombre_aa);
                    }, 100);
                };

                // Open Modal
                ModalManager.openModal(document.getElementById('viewACModal'));
            })
            .catch(error => {
                console.error('Error al cargar datos del AC:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al visualizar los datos'
                });
            });
    }

    let acHistoryData = []; // Store fetched history data globally for filtering

    // Filtros para el Historial de AC
    document.addEventListener('DOMContentLoaded', function() {
        // Escuchar cambios en fechas y en el nuevo select de intervención
        document.getElementById('ac-filter-desde')?.addEventListener('change', applyACFilters);
        document.getElementById('ac-filter-hasta')?.addEventListener('change', applyACFilters);
        document.getElementById('filter-intervencion')?.addEventListener('change', applyACFilters);

        // Actualizar el botón limpiar para que también resetee el select
        document.getElementById('ac-btn-reset')?.addEventListener('click', function() {
            document.getElementById('ac-filter-desde').value = '';
            document.getElementById('ac-filter-hasta').value = '';
            document.getElementById('filter-intervencion').value = ''; // Resetear select
            renderACHistory(acHistoryData);
        });
    });

    function applyACFilters() {
        const desde = document.getElementById('ac-filter-desde').value;
        const hasta = document.getElementById('ac-filter-hasta').value;
        const intervencion = document.getElementById('filter-intervencion').value.toLowerCase();

        const filtrados = acHistoryData.filter(record => {
            // 1. Filtro de Fechas
            const fechaRec = record.fecha_reporte.split('T')[0];
            const matchesDesde = desde === "" || fechaRec >= desde;
            const matchesHasta = hasta === "" || fechaRec <= hasta;

            // 2. Filtro de Intervención (Compara contra record.tipo o record.tipo_mantenimiento)
            // Se usa toLowerCase() para evitar problemas de mayúsculas/minúsculas
            const tipoRegistro = (record.tipo || record.tipo_mantenimiento || "").toLowerCase();
            const matchesIntervencion = intervencion === "" || tipoRegistro === intervencion;

            return matchesDesde && matchesHasta && matchesIntervencion;
        });

        renderACHistory(filtrados);
    }

    function renderACHistory(dataList) {
        const container = document.getElementById('history_aire_list');
        const totalLabel = document.getElementById('total_inter_ac');
        if (!container) return;

        container.innerHTML = '';

        container.innerHTML += '<div class="absolute left-4 top-12 w-0.5 h-full bg-gray-200"></div>';

        if (totalLabel) {
            const count = dataList.length;
            totalLabel.innerText = `${count} registro(s) encontrado(s)`;
        }

        if (dataList.length === 0) {
            container.innerHTML = `
                <div class="text-center py-10 text-gray-500">
                    <p class="text-sm">No hay registros de actividad para este equipo.</p>
                </div>`;
            return;
        }

        // Mapeo de colores por tipo de intervención
        const colorMap = {
            'mantenimiento': { border: 'border-l-blue-500', badge: 'bg-blue-100 text-blue-700 border-blue-300', icon: 'text-blue-600', iconBg: 'bg-blue-100' },
            'reparacion': { border: 'border-l-red-500', badge: 'bg-red-100 text-red-700 border-red-300', icon: 'text-red-600', iconBg: 'bg-red-100' },
            'falla': { border: 'border-l-orange-500', badge: 'bg-orange-100 text-orange-700 border-orange-300', icon: 'text-orange-600', iconBg: 'bg-orange-100' },
            'instalacion': { border: 'border-l-green-500', badge: 'bg-green-100 text-green-700 border-green-300', icon: 'text-green-600', iconBg: 'bg-green-100' },
            'otro': { border: 'border-l-gray-500', badge: 'bg-gray-100 text-gray-700 border-gray-300', icon: 'text-gray-600', iconBg: 'bg-gray-100' }
        };

        dataList.forEach(record => {
            // Obtener el estilo basado en el tipo (normalizado a minúsculas)
            const tipoKey = (record.tipo_mantenimiento || 'otro').toLowerCase();
            const style = colorMap[tipoKey] || colorMap['otro'];

            // Formatear Fecha
            const dateObj = new Date(record.fecha_reporte);
            const fechaFormateada = dateObj.toLocaleDateString('es-ES', { 
                day: 'numeric', month: 'long', year: 'numeric', timeZone: 'UTC' 
            });

            container.innerHTML += `
                <div class="bg-white text-gray-900 flex flex-col gap-4 rounded-xl border border-l-4 ${style.border} shadow-sm hover:shadow-md transition-shadow p-6 mb-4">
                    <div class="grid grid-cols-[1fr_auto] gap-2">
                        <div class="flex items-start gap-3">
                            <div class="${style.iconBg} p-2 rounded-full flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="${style.icon}">
                                    <path d="M22 12h-2.48a2 2 0 0 0-1.93 1.46l-2.35 8.36a.25.25 0 0 1-.48 0L9.24 2.18a.25.25 0 0 0-.48 0l-2.35 8.36A2 2 0 0 1 4.49 12H2"></path>
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium text-xs ${style.badge}">
                                        ${record.tipo_mantenimiento || 'Cambio Estado'}
                                    </span>
                                    <span class="text-xs text-gray-500">${fechaFormateada}</span>
                                </div>
                                <h4 class="font-semibold text-sm">${record.trabajo_realizado || 'Actualización de Sistema'}</h4>
                                <p class="text-xs text-gray-600 mt-1">Técnico: ${record.tecnico_responsable || record.usuario_nombre || 'Sistema'}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-2 text-xs">
                        <div class="bg-gray-50 p-2 rounded">
                            <p class="text-gray-500">Estado Anterior</p>
                            <p class="font-medium capitalize text-orange-600">${record.estado_inicial || 'Indefinido'}</p>
                        </div>
                        <div class="bg-gray-50 p-2 rounded">
                            <p class="text-gray-500">Estado Nuevo</p>
                            <p class="font-medium capitalize text-green-600">${record.estado_final || 'Indefinido'}</p>
                        </div>
                         <div class="bg-gray-50 p-2 rounded">
                            <p class="text-gray-500">Horas de Uso</p>
                            <p class="font-medium">${record.horas_uso || 'N/A'}</p>
                        </div>
                    </div>

                    <div class="bg-blue-50/50 p-2 rounded border border-blue-100">
                        <p class="text-xs text-gray-600 font-medium mb-1">Descripción de Intervención:</p>
                        <p class="text-xs text-gray-700">${record.descripcion_intervencion || 'Sin observaciones detalladas.'}</p>
                    </div>
                </div>`;
        });
    }

    function openHistoryACModal(acId, acName, acBN) {
        // 1. Preparar el título y limpiar filtros inmediatamente
        document.getElementById('history_ac_subtitle').innerText = `${acId} - ${acName} || #BN: ${acBN}` || 'Aire Acondicionado';

        if(document.getElementById('ac-filter-desde')) document.getElementById('ac-filter-desde').value = '';
        if(document.getElementById('ac-filter-hasta')) document.getElementById('ac-filter-hasta').value = '';
        if(document.getElementById('filter-intervencion')) document.getElementById('filter-intervencion').value = '';

        // 2. Mostrar un indicador de carga opcional (puedes usar un spinner o alert de "Cargando...")
        // Esto evita la incertidumbre si el servidor tarda un poco.

        // 3. Realizar la petición
        fetch(`{{ url('aires-acondicionados/history') }}/${acId}`)
            .then(response => {
                if (!response.ok) throw new Error('Error en la red');
                return response.json();
            })
            .then(data => {
                acHistoryData = data.history || []; 
                
                // 4. PRIMERO renderizamos las tarjetas en el DOM (aunque el modal esté oculto)
                renderACHistory(acHistoryData);
                
                // 5. Aplicar los colores manualmente para asegurar que nazcan con color
                if (typeof updateHistoryACBadges === 'function') {
                    updateHistoryACBadges();
                }

                // 6. ¡AHORA SÍ! Abrimos el modal cuando todo está dibujado
                ModalManager.openModal(document.getElementById('historyACModal'));
            })
            .catch(error => {
                console.error('Error:', error);
                alert('No se pudo cargar el historial en este momento.');
            });
    }

    function openMissingMaterialsModal(acId, acName) {
        const modal = document.getElementById('missingMaterialsModal');
        document.getElementById('missing_materials_subtitle').innerText = acName || 'Aire Acondicionado';

        // Store context in dataset for navigation
        modal.dataset.acId = acId;
        modal.dataset.acName = acName;
        
        // Here you would fetch materials data
        // fetch(`/aires-acondicionados/${acId}/materials`)
        //    .then(res => res.json())
        //    .then(materials => { ... populate table ... })

        // Clear search input on open
        const searchInput = document.getElementById('searchMaterialsInput');
        if (searchInput) {
            searchInput.value = '';
            // Trigger event to reset table
            searchInput.dispatchEvent(new Event('keyup')); 
        }

        // Open Modal
        ModalManager.openModal(document.getElementById('missingMaterialsModal'));
    }

    // Filter Logic for Materials Modal
    document.addEventListener('DOMContentLoaded', function() {
        const materialSearchInput = document.getElementById('searchMaterialsInput');
        if (materialSearchInput) {
            materialSearchInput.addEventListener('keyup', function() {
                const value = this.value.toLowerCase();
                const rows = document.querySelectorAll('#missing_materials_table_body tr');
                
                rows.forEach(row => {
                    const text = row.innerText.toLowerCase();
                    row.style.display = text.includes(value) ? '' : 'none';
                });
            });
        }
    });

    function openAddMaterialModal(acId, acName) {
        const modal = document.getElementById('addMaterialModal');
        document.getElementById('add_material_subtitle').innerText = acName || 'Aire Acondicionado';
        document.getElementById('add_material_aire_id').value = acId;
        
        // Store context for back navigation
        modal.dataset.acId = acId;
        modal.dataset.acName = acName;

        // Reset form if exists
        const form = document.getElementById('formAddMaterial');
        if (form) form.reset();

        ModalManager.openModal(modal);
    }
    // Fix for Icon Colors in Dark Mode
    document.addEventListener('DOMContentLoaded', function() {
        function updateIconColors() {
            const isDark = document.documentElement.classList.contains('dark');
            
            // 1. Register Card Icon
            const addCard = document.querySelector('div[onclick*="addACModal"]');
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

            // 2. AC Card Icons (wind icons inside blue rounded backgrounds)
            // Select all wind icons that are supposed to be blue
            const acIcons = document.querySelectorAll('.bg-blue-100 svg.lucide-wind, .dark\\:bg-blue-900\\/50 svg.lucide-wind');
            
            acIcons.forEach(icon => {
                 if (isDark) {
                    icon.classList.remove('text-blue-600');
                    icon.classList.add('text-white');
                    icon.style.setProperty('color', 'white', 'important');
                } else {
                    icon.classList.add('text-blue-600');
                    icon.classList.remove('text-white');
                    icon.style.removeProperty('color');
                }
            });
        }

        // Run immediately
        updateIconColors();
        
        // Watch for theme changes
        const observer = new MutationObserver(updateIconColors);
        observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
    });
</script>
@endpush
@endsection
