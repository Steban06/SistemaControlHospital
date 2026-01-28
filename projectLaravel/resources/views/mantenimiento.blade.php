@extends('layouts.app')

@section('title', 'Mantenimiento - Sistema de Control Hospital')

@section('content')
<div class="p-4 lg:p-6 space-y-4 lg:space-y-6">

    <div data-slot="card" class="text-card-foreground flex flex-col gap-6 rounded-xl border border-l-4 border-l-blue-600 bg-blue-50/50 shadow-sm">
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
                    <h3 class="font-semibold text-blue-900 mb-1">Registro de Mantenimientos Realizados</h3>
                    <p class="text-sm text-blue-700">Este módulo permite <strong>registrar mantenimientos ya ejecutados</strong>, no programar futuros. Documenta el trabajo realizado, partes reemplazadas y el estado final del bien intervenido.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4">
        <!-- Total Mantenimientos -->
        <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg">
            <div data-slot="card-content" class="[&:last-child]:pb-6 p-4 lg:p-6">
                <div class="w-10 h-10 lg:w-12 lg:h-12 bg-blue-500 rounded-lg flex items-center justify-center mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench w-5 h-5 lg:w-6 lg:h-6 text-white">
                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                    </svg>
                </div>
                <p class="text-xs lg:text-sm text-gray-600 mb-1">Total Mantenimientos</p>
                <p class="text-2xl lg:text-3xl font-bold text-gray-900">{{ $totalMantenimientos }}</p>
            </div>
        </div>

        <!-- Preventivos -->
        <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg">
            <div data-slot="card-content" class="[&:last-child]:pb-6 p-4 lg:p-6">
                <div class="w-10 h-10 lg:w-12 lg:h-12 bg-emerald-500 rounded-lg flex items-center justify-center mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench w-5 h-5 lg:w-6 lg:h-6 text-white">
                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                    </svg>
                </div>
                <p class="text-xs lg:text-sm text-gray-600 mb-1">Preventivos</p>
                <p class="text-2xl lg:text-3xl font-bold text-gray-900">{{ $preventivos }}</p>
            </div>
        </div>

        <!-- Correctivos -->
        <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg">
            <div data-slot="card-content" class="[&:last-child]:pb-6 p-4 lg:p-6">
                <div class="w-10 h-10 lg:w-12 lg:h-12 bg-red-500 rounded-lg flex items-center justify-center mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench w-5 h-5 lg:w-6 lg:h-6 text-white">
                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                    </svg>
                </div>
                <p class="text-xs lg:text-sm text-gray-600 mb-1">Correctivos</p>
                <p class="text-2xl lg:text-3xl font-bold text-gray-900">{{ $correctivos }}</p>
            </div>
        </div>

        <!-- Este Mes -->
        <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg">
            <div data-slot="card-content" class="[&:last-child]:pb-6 p-4 lg:p-6">
                <div class="w-10 h-10 lg:w-12 lg:h-12 bg-amber-500 rounded-lg flex items-center justify-center mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-5 h-5 lg:w-6 lg:h-6 text-white">
                        <path d="M8 2v4"></path>
                        <path d="M16 2v4"></path>
                        <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                        <path d="M3 10h18"></path>
                    </svg>
                </div>
                <p class="text-xs lg:text-sm text-gray-600 mb-1">Este Mes</p>
                <p class="text-2xl lg:text-3xl font-bold text-gray-900">{{ $esteMes }}</p>
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
                    <input data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border px-3 py-1 bg-input-background transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive pl-10 text-sm" placeholder="Buscar por bien o descripción..." value="">
                </div>
                <select class="border border-gray-300 rounded-md px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 w-full sm:w-48">
                    <option value="">Todos los tipos</option>
                    <option value="preventivo">Preventivo</option>
                    <option value="correctivo">Correctivo</option>
                </select>
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

            <!-- Maintenance List -->
            <div class="space-y-6">
                <!-- Card 1: Computadora Dell -->
                <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-sm hover:shadow-md transition-shadow">
                    <div data-slot="card-content" class="[&:last-child]:pb-6 p-4">
                        <div class="flex justify-between items-start gap-4">
                            <div class="flex-1 min-w-0 space-y-3"><div>
                                <div class="flex items-center gap-2 mb-1">
                                    <span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&]:hover:bg-accent [a&]:hover:text-accent-foreground text-xs font-mono">BN-2024-0001</span>
                                    <span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&]:hover:bg-accent [a&]:hover:text-accent-foreground text-xs flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package w-4 h-4"><path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"></path><path d="M12 22V12"></path><polyline points="3.29 7 12 12 20.71 7"></polyline><path d="m7.5 4.27 9 5.15"></path></svg>
                                        Bien Nacional
                                    </span>
                                </div>
                                    <h3 class="font-semibold text-sm lg:text-base">Computadora Dell OptiPlex 7090</h3>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&]:hover:bg-primary/90 bg-blue-500 text-white text-xs">Preventivo</span>
                                <span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&>svg]:size-3 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300 flex items-center gap-1 w-fit text-xs">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-3 h-3"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                    Operativo
                                </span>
                            </div>
                            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 text-xs">
                            <div>
                                <p class="text-gray-500 mb-1">Fecha Realizada</p>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-3 h-3 text-gray-400"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg>
                                    <p class="font-medium">19/1/2026</p>
                                </div>
                            </div>
                            <div>
                                <p class="text-gray-500 mb-1">Técnico</p>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user w-3 h-3 text-gray-400"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <p class="font-medium truncate">Juan Pérez</p>
                                </div>
                            </div>
                            <div>
                                <p class="text-gray-500 mb-1">Costo</p>
                                <p class="font-semibold text-blue-600">$45</p>
                            </div><div><p class="text-gray-500 mb-1">Fotos</p>
                            <div class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-camera w-3 h-3 text-gray-400"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"></path><circle cx="12" cy="13" r="3"></circle></svg>
                                <p class="font-medium">3</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded p-2 lg:p-3">
                        <p class="text-xs text-gray-600 line-clamp-2">Se realizó limpieza interna del equipo, actualización del sistema operativo de Windows 10 a Windows 11, y optimización de programas de inicio.</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Partes Reemplazadas:</p>
                        <div class="flex flex-wrap gap-1">
                            <span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent bg-secondary text-secondary-foreground [a&]:hover:bg-secondary/90 text-xs">Pasta térmica</span>
                            <span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent bg-secondary text-secondary-foreground [a&]:hover:bg-secondary/90 text-xs">Ventilador interno</span>
                        </div>
                    </div>
                </div>
                <button onclick="openViewModal()" data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[>svg]:px-2.5 flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-4 h-4"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path><circle cx="12" cy="12" r="3"></circle></svg>
                </button>
            </div>
        </div>

                <!-- Card 2: Monitor LG -->
                <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-sm hover:shadow-md transition-shadow">
                    <div data-slot="card-content" class="[&:last-child]:pb-6 p-4"><div class="flex justify-between items-start gap-4"><div class="flex-1 min-w-0 space-y-3"><div><div class="flex items-center gap-2 mb-1"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&]:hover:bg-accent [a&]:hover:text-accent-foreground text-xs font-mono">BN-2023-0156</span><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&]:hover:bg-accent [a&]:hover:text-accent-foreground text-xs flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package w-4 h-4"><path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"></path><path d="M12 22V12"></path><polyline points="3.29 7 12 12 20.71 7"></polyline><path d="m7.5 4.27 9 5.15"></path></svg>Bien Nacional</span></div><h3 class="font-semibold text-sm lg:text-base">Monitor LG 27"</h3></div><div class="flex flex-wrap gap-2"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&]:hover:bg-primary/90 bg-red-500 text-white text-xs">Correctivo</span><span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&>svg]:size-3 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300 flex items-center gap-1 w-fit text-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-3 h-3"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>Operativo</span></div><div class="grid grid-cols-2 lg:grid-cols-4 gap-3 text-xs"><div><p class="text-gray-500 mb-1">Fecha Realizada</p><div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-3 h-3 text-gray-400"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg><p class="font-medium">17/1/2026</p></div></div><div><p class="text-gray-500 mb-1">Técnico</p><div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user w-3 h-3 text-gray-400"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg><p class="font-medium truncate">María González</p></div></div><div><p class="text-gray-500 mb-1">Tiempo</p><p class="font-medium">2h 15m</p></div><div><p class="text-gray-500 mb-1">Fotos</p><div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-camera w-3 h-3 text-gray-400"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"></path><circle cx="12" cy="13" r="3"></circle></svg><p class="font-medium">5</p></div></div></div><div class="bg-gray-50 rounded p-2 lg:p-3"><p class="text-xs text-gray-600 line-clamp-2">Se identificaron líneas verticales en la pantalla. Se procedió a reemplazar el panel LCD completo.</p></div><div><p class="text-xs text-gray-500 mb-1">Partes Reemplazadas:</p><div class="flex flex-wrap gap-1"><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent bg-secondary text-secondary-foreground [a&]:hover:bg-secondary/90 text-xs">Panel LCD 27"</span><span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent bg-secondary text-secondary-foreground [a&]:hover:bg-secondary/90 text-xs">Cable de video interno</span></div></div></div><button onclick="openViewModal()" data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[>svg]:px-2.5 flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-4 h-4"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path><circle cx="12" cy="12" r="3"></circle></svg></button></div></div>



                <!-- Card 3: Equipo de Ultrasonido -->
                <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border shadow-sm hover:shadow-md transition-shadow">
                    <div data-slot="card-content" class="[&:last-child]:pb-6 p-4">
                        <div class="flex justify-between items-start gap-4">
                            <div class="flex-1 min-w-0 space-y-3">
                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&]:hover:bg-accent [a&]:hover:text-accent-foreground text-xs font-mono">BN-2024-0045</span>
                                        <span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&]:hover:bg-accent [a&]:hover:text-accent-foreground text-xs flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package w-4 h-4"><path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"></path><path d="M12 22V12"></path><polyline points="3.29 7 12 12 20.71 7"></polyline><path d="m7.5 4.27 9 5.15"></path></svg>
                                            Bien Nacional
                                        </span>
                                    </div>
                                    <h3 class="font-semibold text-sm lg:text-base">Equipo de Ultrasonido</h3>
                                </div>
                                <div class="flex flex-wrap gap-2">
                                    <span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent [a&]:hover:bg-primary/90 bg-purple-500 text-white text-xs">Predictivo</span>
                                    <span data-slot="badge" class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&>svg]:size-3 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden [a&]:hover:bg-primary/90 bg-emerald-100 text-emerald-700 border-emerald-300 flex items-center gap-1 w-fit text-xs">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-3 h-3"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                        Operativo
                                    </span>
                                </div>
                                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 text-xs">
                                    <div>
                                        <p class="text-gray-500 mb-1">Fecha Realizada</p>
                                        <div class="flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-3 h-3 text-gray-400"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg>
                                            <p class="font-medium">11/1/2026</p>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 mb-1">Técnico</p>
                                        <div class="flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user w-3 h-3 text-gray-400"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                            <p class="font-medium truncate">Luis Martínez</p>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 mb-1">Tiempo</p>
                                        <p class="font-medium">4h 00m</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 mb-1">Fotos</p>
                                        <div class="flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-camera w-3 h-3 text-gray-400"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"></path><circle cx="12" cy="13" r="3"></circle></svg>
                                            <p class="font-medium">2</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 rounded p-2 lg:p-3">
                                    <p class="text-xs text-gray-600 line-clamp-2">Calibración de transductores, verificación de precisión de mediciones, actualización de firmware, limpieza profunda de componentes.</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 mb-1">Partes Reemplazadas:</p>
                                    <div class="flex flex-wrap gap-1">
                                        <span data-slot="badge" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent bg-secondary text-secondary-foreground [a&]:hover:bg-secondary/90 text-xs">Gel de calibración</span>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openViewModal()" data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[>svg]:px-2.5 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-4 h-4"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-6 text-sm text-gray-500 border-t pt-4">
                <span>Mostrando <span class="font-bold text-gray-900">1</span> a <span class="font-bold text-gray-900">4</span> de <span class="font-bold text-gray-900">4</span> registros</span>
                
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
</div>

<!-- Modal Container -->
<div id="modalRegisterContainer" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm transition-all duration-300">
    @include('modals.register_maintenance')
</div>

@include('modals.view_maintenance_details')

@push('scripts')
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
</div>
@endsection
