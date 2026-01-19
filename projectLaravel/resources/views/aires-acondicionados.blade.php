@extends('layouts.app')

@section('content')
<div class="space-y-4 lg:space-y-6 p-4 lg:p-6">
    <!-- Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4">
        <!-- Total Card -->
        <div data-slot="card" class="text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg bg-gradient-to-br from-blue-50 to-white hover:shadow-xl transition-shadow">
            <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-xs lg:text-sm font-medium text-gray-600">Total Unidades</p>
                    <div class="bg-blue-100 p-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind w-4 h-4 lg:w-5 lg:h-5 text-blue-600"><path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path><path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path><path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path></svg>
                    </div>
                </div>
                <p class="text-2xl lg:text-3xl font-bold text-gray-900">6</p>
                <p class="text-xs text-gray-500 mt-1">Equipos registrados</p>
            </div>
        </div>
        <!-- Operativos Card -->
        <div data-slot="card" class="text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg bg-gradient-to-br from-emerald-50 to-white hover:shadow-xl transition-shadow">
            <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-xs lg:text-sm font-medium text-gray-600">Operativos</p>
                    <div class="bg-emerald-100 p-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-4 h-4 lg:w-5 lg:h-5 text-emerald-600"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                    </div>
                </div>
                <p class="text-2xl lg:text-3xl font-bold text-emerald-600">4</p>
                <p class="text-xs text-emerald-600 mt-1">67% del total</p>
            </div>
        </div>
        <!-- Mantenimiento Card -->
        <div data-slot="card" class="text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg bg-gradient-to-br from-amber-50 to-white hover:shadow-xl transition-shadow">
            <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-xs lg:text-sm font-medium text-gray-600">Mantenimiento</p>
                    <div class="bg-amber-100 p-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench w-4 h-4 lg:w-5 lg:h-5 text-amber-600"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
                    </div>
                </div>
                <p class="text-2xl lg:text-3xl font-bold text-amber-600">1</p>
                <p class="text-xs text-amber-600 mt-1">Requieren atención</p>
            </div>
        </div>
        <!-- Fuera Servicio Card -->
        <div data-slot="card" class="text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg bg-gradient-to-br from-red-50 to-white hover:shadow-xl transition-shadow">
            <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-xs lg:text-sm font-medium text-gray-600">Fuera Servicio</p>
                    <div class="bg-red-100 p-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x w-4 h-4 lg:w-5 lg:h-5 text-red-600"><circle cx="12" cy="12" r="10"></circle><path d="m15 9-6 6"></path><path d="m9 9 6 6"></path></svg>
                    </div>
                </div>
                <p class="text-2xl lg:text-3xl font-bold text-red-600">1</p>
                <p class="text-xs text-red-600 mt-1">Críticos</p>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0 bg-white">
        <!-- Header & Filters -->
        <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
            <div class="flex flex-col gap-4">
                <div class="flex items-start justify-between gap-4">
                    <div class="min-w-0 flex-1">
                        <h4 data-slot="card-title" class="flex items-center gap-2 text-base lg:text-xl font-semibold text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind w-5 h-5 lg:w-6 lg:h-6 text-blue-600 flex-shrink-0"><path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path><path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path><path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path></svg>
                            <span class="truncate">Aires Acondicionados</span>
                        </h4>
                        <p data-slot="card-description" class="text-muted-foreground text-xs lg:text-sm mt-1 text-gray-500">Sistema de gestión y control de climatización hospitalaria</p>
                    </div>
                    <button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-blue-600 text-white shadow hover:bg-blue-700 h-8 rounded-md gap-1.5 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-4 h-4 lg:mr-2"><path d="M5 12h14"></path><path d="M12 5v14"></path></svg>
                        <span class="hidden lg:inline">Agregar</span>
                    </button>
                </div>
            </div>
        </div>

        <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6 space-y-4">
            <!-- Search & Filters -->
            <div class="flex flex-col gap-3">
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
                    <input class="flex h-9 w-full rounded-md border border-gray-300 bg-transparent px-3 py-1 pl-10 text-sm shadow-sm transition-colors placeholder:text-gray-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-blue-600" placeholder="Buscar por código, marca, modelo o ubicación...">
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <select class="flex h-9 w-full items-center justify-between rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-600">
                         <option>Estado: Todos</option>
                    </select>
                     <select class="flex h-9 w-full items-center justify-between rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-600">
                         <option>Ubicación: Todas</option>
                    </select>
                </div>
            </div>

            <!-- Scrollable Grid -->
            <div class="max-h-[600px] overflow-y-auto pr-2 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-3">
                    
                    <!-- Card 1 -->
                    <div data-slot="card" class="bg-white text-card-foreground flex flex-col gap-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-lg transition-all hover:border-blue-300 group">
                        <div data-slot="card-header" class="px-6 pt-6 pb-3 space-y-2">
                            <div class="flex items-start justify-between gap-2">
                                <div class="flex items-center gap-2">
                                    <div class="bg-blue-100 p-1.5 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind w-3.5 h-3.5 text-blue-600"><path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path><path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path><path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path></svg>
                                    </div>
                                    <span class="font-mono text-xs text-gray-600">AC-2024-0001</span>
                                </div>
                                <span class="inline-flex items-center justify-center rounded-md border border-emerald-300 bg-emerald-100 px-2 py-0.5 text-xs font-medium text-emerald-700 gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                    Operativo
                                </span>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm text-gray-900 leading-tight">Carrier Split 42QRF024</h3>
                                <p class="text-xs text-gray-500 mt-0.5">24,000 BTU</p>
                            </div>
                            <div class="flex items-start gap-1.5 bg-blue-50 p-2 rounded border border-blue-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin text-blue-600 flex-shrink-0 mt-0.5"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                <div class="min-w-0 flex-1">
                                    <p class="text-xs font-medium text-blue-900 truncate">UCI - Piso 3</p>
                                </div>
                            </div>
                        </div>
                        <div data-slot="card-content" class="px-6 pb-6 pt-0 space-y-2">
                            <button class="flex items-center justify-center w-full h-8 rounded-md bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 text-xs font-medium text-gray-700 hover:from-blue-100 hover:to-indigo-100 transition-colors gap-1.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                Ver Más Información
                            </button>
                            <div class="grid grid-cols-2 gap-1.5">
                                <button class="flex items-center justify-center h-8 rounded-md border border-gray-200 bg-white text-xs font-medium text-gray-700 hover:bg-gray-50 transition-colors gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"></path></svg>
                                    Editar
                                </button>
                                <button class="flex items-center justify-center h-8 rounded-md border border-red-200 bg-white text-xs font-medium text-red-600 hover:bg-red-50 transition-colors gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path><line x1="10" x2="10" y1="11" y2="17"></line><line x1="14" x2="14" y1="11" y2="17"></line></svg>
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div data-slot="card" class="bg-white text-card-foreground flex flex-col gap-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-lg transition-all hover:border-blue-300 group">
                        <div data-slot="card-header" class="px-6 pt-6 pb-3 space-y-2">
                            <div class="flex items-start justify-between gap-2">
                                <div class="flex items-center gap-2">
                                    <div class="bg-blue-100 p-1.5 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind w-3.5 h-3.5 text-blue-600"><path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path><path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path><path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path></svg>
                                    </div>
                                    <span class="font-mono text-xs text-gray-600">AC-2024-0002</span>
                                </div>
                                <span class="inline-flex items-center justify-center rounded-md border border-emerald-300 bg-emerald-100 px-2 py-0.5 text-xs font-medium text-emerald-700 gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                    Operativo
                                </span>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm text-gray-900 leading-tight">LG VRF Multi V5</h3>
                                <p class="text-xs text-gray-500 mt-0.5">36,000 BTU</p>
                            </div>
                            <div class="flex items-start gap-1.5 bg-blue-50 p-2 rounded border border-blue-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin text-blue-600 flex-shrink-0 mt-0.5"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                <div class="min-w-0 flex-1">
                                    <p class="text-xs font-medium text-blue-900 truncate">Quirófano 1</p>
                                </div>
                            </div>
                        </div>
                        <div data-slot="card-content" class="px-6 pb-6 pt-0 space-y-2">
                             <button class="flex items-center justify-center w-full h-8 rounded-md bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 text-xs font-medium text-gray-700 hover:from-blue-100 hover:to-indigo-100 transition-colors gap-1.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                Ver Más Información
                            </button>
                            <div class="grid grid-cols-2 gap-1.5">
                                <button class="flex items-center justify-center h-8 rounded-md border border-gray-200 bg-white text-xs font-medium text-gray-700 hover:bg-gray-50 transition-colors gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"></path></svg>
                                    Editar
                                </button>
                                <button class="flex items-center justify-center h-8 rounded-md border border-red-200 bg-white text-xs font-medium text-red-600 hover:bg-red-50 transition-colors gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path><line x1="10" x2="10" y1="11" y2="17"></line><line x1="14" x2="14" y1="11" y2="17"></line></svg>
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div data-slot="card" class="bg-white text-card-foreground flex flex-col gap-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-lg transition-all hover:border-blue-300 group">
                        <div data-slot="card-header" class="px-6 pt-6 pb-3 space-y-2">
                             <div class="flex items-start justify-between gap-2">
                                <div class="flex items-center gap-2">
                                    <div class="bg-blue-100 p-1.5 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind w-3.5 h-3.5 text-blue-600"><path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path><path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path><path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path></svg>
                                    </div>
                                    <span class="font-mono text-xs text-gray-600">AC-2023-0156</span>
                                </div>
                                <span class="inline-flex items-center justify-center rounded-md border border-amber-300 bg-amber-100 px-2 py-0.5 text-xs font-medium text-amber-700 gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert"><circle cx="12" cy="12" r="10"></circle><line x1="12" x2="12" y1="8" y2="12"></line><line x1="12" x2="12.01" y1="16" y2="16"></line></svg>
                                    Mantenimiento
                                </span>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm text-gray-900 leading-tight">Daikin Sky Air Series</h3>
                                <p class="text-xs text-gray-500 mt-0.5">18,000 BTU</p>
                            </div>
                            <div class="flex items-start gap-1.5 bg-blue-50 p-2 rounded border border-blue-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin text-blue-600 flex-shrink-0 mt-0.5"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                <div class="min-w-0 flex-1">
                                    <p class="text-xs font-medium text-blue-900 truncate">Emergencias</p>
                                </div>
                            </div>
                        </div>
                        <div data-slot="card-content" class="px-6 pb-6 pt-0 space-y-2">
                             <button class="flex items-center justify-center w-full h-8 rounded-md bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 text-xs font-medium text-gray-700 hover:from-blue-100 hover:to-indigo-100 transition-colors gap-1.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                Ver Más Información
                            </button>
                            <div class="grid grid-cols-2 gap-1.5">
                                <button class="flex items-center justify-center h-8 rounded-md border border-gray-200 bg-white text-xs font-medium text-gray-700 hover:bg-gray-50 transition-colors gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"></path></svg>
                                    Editar
                                </button>
                                <button class="flex items-center justify-center h-8 rounded-md border border-red-200 bg-white text-xs font-medium text-red-600 hover:bg-red-50 transition-colors gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path><line x1="10" x2="10" y1="11" y2="17"></line><line x1="14" x2="14" y1="11" y2="17"></line></svg>
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div data-slot="card" class="bg-white text-card-foreground flex flex-col gap-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-lg transition-all hover:border-blue-300 group">
                        <div data-slot="card-header" class="px-6 pt-6 pb-3 space-y-2">
                            <div class="flex items-start justify-between gap-2">
                                <div class="flex items-center gap-2">
                                    <div class="bg-blue-100 p-1.5 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind w-3.5 h-3.5 text-blue-600"><path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path><path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path><path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path></svg>
                                    </div>
                                    <span class="font-mono text-xs text-gray-600">AC-2022-0089</span>
                                </div>
                                <span class="inline-flex items-center justify-center rounded-md border border-red-300 bg-red-100 px-2 py-0.5 text-xs font-medium text-red-700 gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x"><circle cx="12" cy="12" r="10"></circle><path d="m15 9-6 6"></path><path d="m9 9 6 6"></path></svg>
                                    Fuera de Servicio
                                </span>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm text-gray-900 leading-tight">Mitsubishi Electric Mr. Slim</h3>
                                <p class="text-xs text-gray-500 mt-0.5">12,000 BTU</p>
                            </div>
                            <div class="flex items-start gap-1.5 bg-blue-50 p-2 rounded border border-blue-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin text-blue-600 flex-shrink-0 mt-0.5"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                <div class="min-w-0 flex-1">
                                    <p class="text-xs font-medium text-blue-900 truncate">Administración</p>
                                </div>
                            </div>
                        </div>
                        <div data-slot="card-content" class="px-6 pb-6 pt-0 space-y-2">
                             <button class="flex items-center justify-center w-full h-8 rounded-md bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 text-xs font-medium text-gray-700 hover:from-blue-100 hover:to-indigo-100 transition-colors gap-1.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                Ver Más Información
                            </button>
                            <div class="grid grid-cols-2 gap-1.5">
                                <button class="flex items-center justify-center h-8 rounded-md border border-gray-200 bg-white text-xs font-medium text-gray-700 hover:bg-gray-50 transition-colors gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"></path></svg>
                                    Editar
                                </button>
                                <button class="flex items-center justify-center h-8 rounded-md border border-red-200 bg-white text-xs font-medium text-red-600 hover:bg-red-50 transition-colors gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path><line x1="10" x2="10" y1="11" y2="17"></line><line x1="14" x2="14" y1="11" y2="17"></line></svg>
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-xs lg:text-sm text-gray-500 pt-2 border-t">Mostrando 6 de 6 unidades</div>
        </div>
    </div>
</div>
@endsection
