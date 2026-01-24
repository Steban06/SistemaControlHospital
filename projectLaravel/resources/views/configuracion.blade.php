@extends('layouts.app')

@section('title', 'Configuración - Sistema de Control Hospital')

@section('content')
<div class="p-4 lg:p-6 space-y-6 flex-1">
    <div dir="ltr" data-orientation="horizontal" data-slot="tabs" class="flex flex-col gap-2 w-full">
        <!-- Tab List -->
        <div role="tablist" aria-orientation="horizontal" data-slot="tabs-list" class="bg-gray-100 dark:bg-transparent text-gray-500 dark:text-gray-400 h-10 items-center justify-center rounded-xl p-1 grid w-full grid-cols-3 mb-6 border border-transparent dark:border-gray-600" tabindex="0" data-orientation="horizontal" style="outline: none;">
            <button type="button" role="tab" aria-selected="true" data-state="active" id="tab-trigger-users" onclick="switchConfigTab('users')" class="tab-trigger inline-flex h-full flex-1 items-center justify-center gap-2 rounded-lg px-2 py-1 text-sm font-medium whitespace-nowrap transition-all focus-visible:ring-2 focus-visible:ring-blue-500/50 disabled:pointer-events-none disabled:opacity-50 bg-white text-blue-700 shadow-sm dark:data-[state=active]:bg-gray-700 dark:data-[state=active]:text-blue-400 dark:hover:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-4 h-4 mr-1">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                Usuarios
            </button>
            <button type="button" role="tab" aria-selected="false" data-state="inactive" id="tab-trigger-security" onclick="switchConfigTab('security')" class="tab-trigger inline-flex h-full flex-1 items-center justify-center gap-2 rounded-lg px-2 py-1 text-sm font-medium whitespace-nowrap transition-all focus-visible:ring-2 focus-visible:ring-blue-500/50 disabled:pointer-events-none disabled:opacity-50 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 dark:data-[state=active]:bg-gray-700 dark:data-[state=active]:text-blue-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield w-4 h-4 mr-1">
                    <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                </svg>
                Seguridad
            </button>
            <button type="button" role="tab" aria-selected="false" data-state="inactive" id="tab-trigger-notifications" onclick="switchConfigTab('notifications')" class="tab-trigger inline-flex h-full flex-1 items-center justify-center gap-2 rounded-lg px-2 py-1 text-sm font-medium whitespace-nowrap transition-all focus-visible:ring-2 focus-visible:ring-blue-500/50 disabled:pointer-events-none disabled:opacity-50 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 dark:data-[state=active]:bg-gray-700 dark:data-[state=active]:text-blue-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell w-4 h-4 mr-1">
                    <path d="M10.268 21a2 2 0 0 0 3.464 0"></path>
                    <path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"></path>
                </svg>
                Notificaciones
            </button>
        </div>

        <!-- Users Tab Content -->
        <div data-state="active" id="tab-content-users" class="tab-content flex-1 outline-none space-y-6 animate-in fade-in zoom-in duration-300">
            <!-- Stats Cards -->
            <!-- Advanced Users Table Card -->
            <div data-slot="card" class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 flex flex-col gap-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <!-- Card Header with Title and Add Button -->
                <div class="px-6 pt-6 flex justify-between items-center">
                    <div class="flex flex-col gap-1">
                        <h4 class="text-lg font-bold leading-none flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-5 h-5 text-blue-600 dark:text-blue-400">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            Gestión de Usuarios
                        </h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Administre los usuarios y sus permisos en el sistema</p>
                    </div>
                    <button id="addUserBtn" data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive text-primary-foreground h-9 px-4 py-2 has-[&gt;svg]:px-3 bg-blue-600 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-plus w-4 h-4 mr-2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><line x1="19" x2="19" y1="8" y2="14"></line><line x1="22" x2="16" y1="11" y2="11"></line></svg>Agregar Usuario</button>
                </div>
                
                <div class="px-6 pb-6">
                    <!-- Stats Overview -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div class="p-4 bg-blue-50 dark:bg-blue-900/30 rounded-lg border border-blue-200 dark:border-blue-700">
                            <p class="text-sm text-blue-700 dark:text-blue-200 mb-1">Administradores</p>
                            <p class="text-2xl font-bold text-blue-900 dark:text-blue-50">1</p>
                        </div>
                        <div class="p-4 bg-emerald-50 dark:bg-emerald-900/30 rounded-lg border border-emerald-200 dark:border-emerald-700">
                            <p class="text-sm text-emerald-700 dark:text-emerald-200 mb-1">Usuarios</p>
                            <p class="text-2xl font-bold text-emerald-900 dark:text-emerald-50">2</p>
                        </div>
                        <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-1">Invitados</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-gray-50">1</p>
                        </div>
                    </div>

                    <!-- Filter & Search Bar -->
                    <div class="flex flex-col lg:flex-row items-center gap-6 w-full mb-4">
                        <div class="relative w-full lg:w-64">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.3-4.3"></path>
                            </svg>
                            <input id="searchUsers" class="placeholder:text-muted-foreground border-input flex h-9 w-full rounded-md border bg-input-background pl-10 pr-3 py-1 text-sm outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 transition-all shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:placeholder-gray-400" placeholder="Buscar por nombre, email...">
                        </div>

                        <div class="flex flex-col lg:flex-row gap-4 w-full lg:flex-1 items-center">
                            <div class="flex items-center gap-2 w-full lg:flex-1">
                                <span class="text-xs lg:text-sm font-medium text-gray-600 dark:text-gray-300 whitespace-nowrap">Estado:</span>
                                <div class="relative w-full">
                                    <select id="filterUserStatus" class="appearance-none border-input flex h-9 w-full items-center justify-between rounded-md border bg-input-background px-3 py-1 text-xs lg:text-sm outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 cursor-pointer transition-all pr-10 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                        <option value="">Todos</option>
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex items-center gap-2 w-full lg:flex-1">
                                <span class="text-xs lg:text-sm font-medium text-gray-600 dark:text-gray-300 whitespace-nowrap">Rol:</span>
                                <div class="relative w-full">
                                    <select id="filterUserRole" class="appearance-none border-input flex h-9 w-full items-center justify-between rounded-md border bg-input-background px-3 py-1 text-xs lg:text-sm outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 cursor-pointer transition-all pr-10 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                        <option value="">Todos</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Usuario">Usuario</option>
                                        <option value="Invitado">Invitado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Advanced Table Container -->
                    <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                        <!-- Toolbar (Rows per page) -->
                        <div class="px-4 pt-4 pb-2 bg-white dark:bg-gray-800 border-b dark:border-gray-700 z-30 relative">
                             <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                                <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                                    <span>Mostrar</span>
                                    <select id="rowsPerPageUsers" class="border border-gray-300 dark:border-gray-600 rounded px-2 py-1 text-sm bg-white dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent cursor-pointer dark:text-gray-100">
                                        <option>10</option>
                                        <option>20</option>
                                        <option>50</option>
                                    </select>
                                    <span>filas</span>
                                </div>
                            </div>
                        </div>

                        <!-- Scrollable Table -->
                        <div class="relative w-full overflow-x-auto overflow-y-auto" style="max-height: 520px;">
                            <table class="w-full text-sm text-left border-collapse">
                                <thead class="bg-gray-50 dark:bg-gray-700/50 border-b dark:border-gray-700">
                                    <tr class="border-b dark:border-gray-700 transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                        <th class="h-12 px-6 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 sticky top-0 z-20 bg-gray-50 dark:bg-gray-800 shadow-sm py-4 whitespace-nowrap text-gray-700 dark:text-gray-300">Nombre</th>
                                        <th class="h-12 px-6 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 sticky top-0 z-20 bg-gray-50 dark:bg-gray-800 shadow-sm py-4 whitespace-nowrap text-gray-700 dark:text-gray-300">Email</th>
                                        <th class="h-12 px-6 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 sticky top-0 z-20 bg-gray-50 dark:bg-gray-800 shadow-sm py-4 whitespace-nowrap text-gray-700 dark:text-gray-300">Rol</th>
                                        <th class="h-12 px-6 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 sticky top-0 z-20 bg-gray-50 dark:bg-gray-800 shadow-sm py-4 whitespace-nowrap text-gray-700 dark:text-gray-300">Departamento</th>
                                        <th class="h-12 px-6 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 sticky top-0 z-20 bg-gray-50 dark:bg-gray-800 shadow-sm py-4 whitespace-nowrap text-gray-700 dark:text-gray-300">Estado</th>
                                        <th class="h-12 px-6 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 sticky top-0 z-20 bg-gray-50 dark:bg-gray-800 shadow-sm py-4 whitespace-nowrap text-gray-700 dark:text-gray-300">Último Acceso</th>
                                        <th class="h-12 px-6 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 sticky top-0 z-20 bg-gray-50 dark:bg-gray-800 shadow-sm py-4 whitespace-nowrap text-gray-700 dark:text-gray-300 text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBodyUsers" class="divide-y divide-gray-100">
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="p-4 font-medium text-gray-900">María González</td>
                                        <td class="p-4 text-gray-600">maria.gonzalez@hospital.com</td>
                                        <td class="p-4"><span class="inline-flex items-center rounded-md bg-blue-600 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-blue-700/10">Administrador</span></td>
                                        <td class="p-4 text-gray-600">Administración</td>
                                        <td class="p-4"><span class="inline-flex items-center gap-1 rounded-md bg-emerald-100 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-600/20"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>Activo</span></td>
                                        <td class="p-4 text-gray-400 text-xs">2026-01-12 09:30</td>
                                        <td class="p-4 text-center">
                                            <button 
                                                data-user-id="1" 
                                                data-user-name="María González" 
                                                data-user-role="Administrador" 
                                                data-user-status="Activo"
                                                class="edit-user-btn inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground h-8 w-8 text-blue-600" title="Editar Usuario/Rol">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen w-4 h-4"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"></path></svg>
                                            </button>
                                        </td>
                                    </tr>
                                     <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="p-4 font-medium text-gray-900">Carlos Ramírez</td>
                                        <td class="p-4 text-gray-600">carlos.ramirez@hospital.com</td>
                                        <td class="p-4"><span class="inline-flex items-center rounded-md bg-emerald-600 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-emerald-700/10">Usuario</span></td>
                                        <td class="p-4 text-gray-600">Urgencias</td>
                                        <td class="p-4"><span class="inline-flex items-center gap-1 rounded-md bg-emerald-100 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-600/20"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>Activo</span></td>
                                        <td class="p-4 text-gray-400 text-xs">2026-01-12 08:15</td>
                                        <td class="p-4 text-center">
                                            <button 
                                                data-user-id="2"
                                                data-user-name="Carlos Ramírez"
                                                data-user-role="Usuario"
                                                data-user-status="Activo"
                                                class="edit-user-btn inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground h-8 w-8 text-blue-600" title="Editar Usuario/Rol">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen w-4 h-4"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"></path></svg>
                                            </button>
                                        </td>
                                    </tr>
                                     <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="p-4 font-medium text-gray-900">Ana Martínez</td>
                                        <td class="p-4 text-gray-600">ana.martinez@hospital.com</td>
                                        <td class="p-4"><span class="inline-flex items-center rounded-md bg-emerald-600 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-emerald-700/10">Usuario</span></td>
                                        <td class="p-4 text-gray-600">Cirugía</td>
                                        <td class="p-4"><span class="inline-flex items-center gap-1 rounded-md bg-emerald-100 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-600/20"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>Activo</span></td>
                                        <td class="p-4 text-gray-400 text-xs">2026-01-11 16:45</td>
                                        <td class="p-4 text-center">
                                            <button 
                                                data-user-id="3"
                                                data-user-name="Ana Martínez"
                                                data-user-role="Usuario"
                                                data-user-status="Activo"
                                                class="edit-user-btn inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground h-8 w-8 text-blue-600" title="Editar Usuario/Rol">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen w-4 h-4"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"></path></svg>
                                            </button>
                                        </td>
                                    </tr>
                                     <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="p-4 font-medium text-gray-900">Pedro López</td>
                                        <td class="p-4 text-gray-600">pedro.lopez@hospital.com</td>
                                        <td class="p-4"><span class="inline-flex items-center rounded-md bg-gray-500 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-gray-600/10">Invitado</span></td>
                                        <td class="p-4 text-gray-600">Auditoría</td>
                                        <td class="p-4"><span class="inline-flex items-center gap-1 rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-700 ring-1 ring-inset ring-gray-600/20"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>Inactivo</span></td>
                                        <td class="p-4 text-gray-400 text-xs">2026-01-10 14:20</td>
                                        <td class="p-4 text-center">
                                            <button 
                                                data-user-id="4"
                                                data-user-name="Pedro López"
                                                data-user-role="Invitado"
                                                data-user-status="Inactivo"
                                                class="edit-user-btn inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground h-8 w-8 text-blue-600" title="Editar Usuario/Rol">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen w-4 h-4"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"></path></svg>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination Container -->
                        <div class="pagination-container px-4" id="paginationUsers"></div>
                    </div>
                </div>
            </div>

            <!-- Permissions Card -->
            <div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 flex flex-col gap-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="px-6 pt-6 flex flex-col gap-1">
                    <h4 class="text-lg font-bold leading-none flex items-center gap-2 dark:text-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield w-5 h-5 text-blue-600 dark:text-blue-400">
                            <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                        </svg>
                        Permisos por Rol
                    </h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Descripción de permisos para cada tipo de usuario</p>
                </div>
                <div class="px-6 pb-6">
                    <div class="space-y-4">
                        <div class="p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
                            <div class="flex items-center gap-2 mb-2"><span class="inline-flex items-center rounded-md bg-blue-600 px-2 py-1 text-xs font-medium text-white">Administrador</span></div>
                            <ul class="text-sm text-blue-900 dark:text-blue-100 space-y-1 ml-4 list-disc">
                                <li>Acceso completo a todos los módulos</li>
                                <li>Gestión de usuarios y permisos</li>
                                <li>Crear, editar y eliminar bienes</li>
                                <li>Generar todos los tipos de reportes</li>
                            </ul>
                        </div>
                        <div class="p-4 bg-emerald-50 dark:bg-emerald-900/20 rounded-lg border border-emerald-200 dark:border-emerald-800">
                            <div class="flex items-center gap-2 mb-2"><span class="inline-flex items-center rounded-md bg-emerald-600 px-2 py-1 text-xs font-medium text-white">Usuario</span></div>
                            <ul class="text-sm text-emerald-900 dark:text-emerald-100 space-y-1 ml-4 list-disc">
                                <li>Ver y consultar inventario</li>
                                <li>Crear y editar bienes</li>
                                <li>Generar reportes básicos</li>
                                <li>Sin acceso a gestión de usuarios</li>
                            </ul>
                        </div>
                        <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg border border-gray-200 dark:border-gray-600">
                            <div class="flex items-center gap-2 mb-2"><span class="inline-flex items-center rounded-md bg-gray-500 px-2 py-1 text-xs font-medium text-white">Invitado</span></div>
                            <ul class="text-sm text-gray-900 dark:text-gray-300 space-y-1 ml-4 list-disc">
                                <li>Solo lectura del inventario</li>
                                <li>Ver estadísticas del dashboard</li>
                                <li>Sin permisos de edición</li>
                                <li>Sin acceso a reportes avanzados</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Security Tab Content -->
        <div data-state="inactive" id="tab-content-security" class="tab-content flex-1 outline-none space-y-6 hidden animate-in fade-in zoom-in duration-300">
            <div data-slot="card" class="bg-card dark:bg-gray-800 text-card-foreground dark:text-gray-100 flex flex-col gap-6 rounded-xl shadow-lg border-0 dark:border dark:border-gray-700">
                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6 border-b-0 dark:border-b dark:border-gray-700">
                    <h4 data-slot="card-title" class="leading-none flex items-center gap-2 dark:text-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock w-5 h-5 text-blue-600 dark:text-blue-400">
                            <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        Configuración de Seguridad
                    </h4>
                    <p data-slot="card-description" class="text-muted-foreground dark:text-gray-400">Actualice su contraseña y configure opciones de seguridad</p>
                </div>
                <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6 space-y-6">
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label data-slot="label" class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50 dark:text-gray-200" for="current-password">Contraseña Actual</label>
                            <div class="relative">
                                <input type="password" data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:placeholder-gray-400 border-input flex h-9 w-full min-w-0 rounded-md border px-3 py-1 text-base bg-input-background transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive" id="current-password" placeholder="Ingrese contraseña actual" maxlength="20" minlength="8">
                                <button type="button" onclick="togglePasswordVisibility('current-password', this)" data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-gray-600 dark:text-gray-400 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 absolute right-2 top-1/2 -translate-y-1/2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye w-4 h-4">
                                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label data-slot="label" class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50 dark:text-gray-200" for="new-password">Nueva Contraseña</label>
                            <div class="relative">
                                <input type="password" data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:placeholder-gray-400 border-input flex h-9 w-full min-w-0 rounded-md border px-3 py-1 text-base bg-input-background transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive" id="new-password" placeholder="Ingrese nueva contraseña" maxlength="20" minlength="8">
                                <button type="button" onclick="togglePasswordVisibility('new-password', this)" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-8 rounded-md gap-1.5 px-3 absolute right-2 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 dark:hover:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </button>
                            </div>
                            <!-- Password Requirements List -->
                            <div id="password-requirements" class="text-xs space-y-1 mt-2 p-3 bg-gray-50 dark:bg-gray-700/50 rounded-md hidden">
                                <p class="font-medium text-gray-700 dark:text-gray-200 mb-2">La contraseña debe contener:</p>
                                <ul class="space-y-1 text-gray-500 dark:text-gray-400">
                                    <li id="req-length" class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle"><circle cx="12" cy="12" r="10"/></svg> Mínimo 8 caracteres</li>
                                    <li id="req-uppercase" class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle"><circle cx="12" cy="12" r="10"/></svg> Al menos una mayúscula</li>
                                    <li id="req-lowercase" class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle"><circle cx="12" cy="12" r="10"/></svg> Al menos una minúscula</li>
                                    <li id="req-number" class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle"><circle cx="12" cy="12" r="10"/></svg> Al menos un número</li>
                                    <li id="req-special" class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle"><circle cx="12" cy="12" r="10"/></svg> Caracteres especiales (@$!%*?&)</li>
                                </ul>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label data-slot="label" class="flex items-center gap-2 text-sm leading-none font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50 dark:text-gray-200" for="confirm-password">Confirmar Nueva Contraseña</label>
                            <div class="relative">
                                <input type="password" data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:placeholder-gray-400 border-input flex h-9 w-full min-w-0 rounded-md border px-3 py-1 text-base bg-input-background transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive" id="confirm-password" placeholder="Confirme nueva contraseña" maxlength="20" minlength="8">
                                <button type="button" onclick="togglePasswordVisibility('confirm-password', this)" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-8 rounded-md gap-1.5 px-3 absolute right-2 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 dark:hover:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </button>
                            </div>
                            <p id="password-match-message" class="text-xs font-medium hidden"></p>
                        </div>
                        <button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive text-primary-foreground h-9 px-4 py-2 has-[&gt;svg]:px-3 bg-blue-600 hover:bg-blue-700">Actualizar Contraseña</button>
                    </div>
                    
                </div>
            </div>
            <!-- Database Backup Card -->
            <div data-slot="card" class="bg-card dark:bg-gray-800 text-card-foreground dark:text-gray-100 flex flex-col gap-6 rounded-xl shadow-lg border-0 dark:border dark:border-gray-700">
                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6 border-b-0 dark:border-b dark:border-gray-700">
                    <h4 data-slot="card-title" class="leading-none flex items-center gap-2 dark:text-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-database-backup w-5 h-5 text-blue-600 dark:text-blue-400">
                            <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                            <path d="M3 12a9 3 0 0 0 5 2.69"></path>
                            <path d="M21 9.3V5"></path>
                            <path d="M3 5v14a9 3 0 0 0 6.47 2.88"></path>
                            <path d="M12 12v4h4"></path>
                            <path d="M13 20a5 5 0 0 0 9-3 4.5 4.5 0 0 0-4.5-4.5c-1.33 0-2.54.54-3.41 1.41L12 16"></path>
                        </svg>
                        Copias de Seguridad
                    </h4>
                    <p data-slot="card-description" class="text-muted-foreground dark:text-gray-400">Gestione los respaldos de la base de datos del sistema</p>
                </div>
                <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6 space-y-6">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hard-drive-download w-5 h-5 text-blue-600 dark:text-blue-400">
                                    <path d="M12 2v8"></path>
                                    <path d="m16 6-4 4-4-4"></path>
                                    <rect width="20" height="8" x="2" y="14" rx="2"></rect>
                                    <path d="M6 18h.01"></path>
                                    <path d="M10 18h.01"></path>
                                </svg>
                                <div>
                                    <p class="font-medium dark:text-gray-200">Respaldo Manual</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Último respaldo: <span class="font-semibold text-gray-800 dark:text-gray-100">Nunca</span></p>
                                </div>
                            </div>
                            <button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive text-primary-foreground h-9 px-4 py-2 has-[&gt;svg]:px-3 bg-blue-600 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="7 10 12 15 17 10"></polyline>
                                    <line x1="12" x2="12" y1="15" y2="3"></line>
                                </svg>
                                Generar Respaldo
                            </button>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-refresh-ccw w-5 h-5 text-gray-600 dark:text-gray-400">
                                    <path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path>
                                    <path d="M3 3v5h5"></path>
                                    <path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"></path>
                                    <path d="M16 16h5v5"></path>
                                </svg>
                                <div>
                                    <p class="font-medium dark:text-gray-200">Respaldos Automáticos</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Generar copia de seguridad diariamente</p>
                                </div>
                            </div>
                            <button type="button" role="switch" aria-checked="false" data-state="unchecked" value="on" data-slot="switch" class="peer data-[state=checked]:bg-primary data-[state=unchecked]:bg-switch-background focus-visible:border-ring focus-visible:ring-ring/50 dark:data-[state=unchecked]:bg-input/80 inline-flex h-[1.15rem] w-8 shrink-0 items-center rounded-full border border-transparent transition-all outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50">
                                <span data-state="unchecked" data-slot="switch-thumb" class="bg-card dark:data-[state=unchecked]:bg-card-foreground dark:data-[state=checked]:bg-primary-foreground pointer-events-none block size-4 rounded-full ring-0 transition-transform data-[state=checked]:translate-x-[calc(100%-2px)] data-[state=unchecked]:translate-x-0"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notifications Tab Content -->
        <div data-state="inactive" id="tab-content-notifications" class="tab-content flex-1 outline-none space-y-6 hidden animate-in fade-in zoom-in duration-300">
            <div data-slot="card" class="bg-card dark:bg-gray-800 text-card-foreground dark:text-gray-100 flex flex-col gap-6 rounded-xl shadow-lg border-0 dark:border dark:border-gray-700">
                <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6 border-b-0 dark:border-b dark:border-gray-700">
                    <h4 data-slot="card-title" class="leading-none flex items-center gap-2 dark:text-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell w-5 h-5 text-blue-600 dark:text-blue-400">
                            <path d="M10.268 21a2 2 0 0 0 3.464 0"></path>
                            <path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"></path>
                        </svg>
                        Preferencias de Notificaciones
                    </h4>
                    <p data-slot="card-description" class="text-muted-foreground dark:text-gray-400">Configure cómo y cuándo desea recibir notificaciones</p>
                </div>
                <div data-slot="card-content" class="px-6 [&amp;:last-child]:pb-6 space-y-6">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell w-5 h-5 text-emerald-600 dark:text-emerald-400">
                                    <path d="M10.268 21a2 2 0 0 0 3.464 0"></path>
                                    <path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"></path>
                                </svg>
                                <div>
                                    <p class="font-medium dark:text-gray-200">Nuevos Bienes Registrados</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Notificar cuando se registren nuevos bienes</p>
                                </div>
                            </div>
                            <button type="button" role="switch" aria-checked="true" data-state="checked" value="on" data-slot="switch" class="peer data-[state=checked]:bg-primary data-[state=unchecked]:bg-switch-background focus-visible:border-ring focus-visible:ring-ring/50 dark:data-[state=unchecked]:bg-input/80 inline-flex h-[1.15rem] w-8 shrink-0 items-center rounded-full border border-transparent transition-all outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50">
                                <span data-state="checked" data-slot="switch-thumb" class="bg-card dark:data-[state=unchecked]:bg-card-foreground dark:data-[state=checked]:bg-primary-foreground pointer-events-none block size-4 rounded-full ring-0 transition-transform data-[state=checked]:translate-x-[calc(100%-2px)] data-[state=unchecked]:translate-x-0"></span>
                            </button>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-settings w-5 h-5 text-amber-600 dark:text-amber-400">
                                    <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                <div>
                                    <p class="font-medium dark:text-gray-200">Alertas de Mantenimiento</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Recordatorios de mantenimientos programados</p>
                                </div>
                            </div>
                            <button type="button" role="switch" aria-checked="true" data-state="checked" value="on" data-slot="switch" class="peer data-[state=checked]:bg-primary data-[state=unchecked]:bg-switch-background focus-visible:border-ring focus-visible:ring-ring/50 dark:data-[state=unchecked]:bg-input/80 inline-flex h-[1.15rem] w-8 shrink-0 items-center rounded-full border border-transparent transition-all outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50">
                                <span data-state="checked" data-slot="switch-thumb" class="bg-card dark:data-[state=unchecked]:bg-card-foreground dark:data-[state=checked]:bg-primary-foreground pointer-events-none block size-4 rounded-full ring-0 transition-transform data-[state=checked]:translate-x-[calc(100%-2px)] data-[state=unchecked]:translate-x-0"></span>
                            </button>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-5 h-5 text-purple-600 dark:text-purple-400">
                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                    <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                    <path d="M10 9H8"></path>
                                    <path d="M16 13H8"></path>
                                    <path d="M16 17H8"></path>
                                </svg>
                                <div>
                                    <p class="font-medium dark:text-gray-200">Reportes Generados</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Notificar cuando se generen reportes</p>
                                </div>
                            </div>
                            <button type="button" role="switch" aria-checked="false" data-state="unchecked" value="on" data-slot="switch" class="peer data-[state=checked]:bg-primary data-[state=unchecked]:bg-switch-background focus-visible:border-ring focus-visible:ring-ring/50 dark:data-[state=unchecked]:bg-input/80 inline-flex h-[1.15rem] w-8 shrink-0 items-center rounded-full border border-transparent transition-all outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50">
                                <span data-state="unchecked" data-slot="switch-thumb" class="bg-card dark:data-[state=unchecked]:bg-card-foreground dark:data-[state=checked]:bg-primary-foreground pointer-events-none block size-4 rounded-full ring-0 transition-transform data-[state=checked]:translate-x-[calc(100%-2px)] data-[state=unchecked]:translate-x-0"></span>
                            </button>
                        </div>
                    </div>
                    <button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive text-primary-foreground h-9 px-4 py-2 has-[&gt;svg]:px-3 bg-blue-600 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500">Guardar Preferencias</button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('modals.add_user')
@include('modals.edit_user_role')

@push('scripts')
<script src="{{ asset('js/table-pagination.js') }}"></script>
<script>
    // --- Password Security Logic ---
    function togglePasswordVisibility(inputId, button) {
        const input = document.getElementById(inputId);
        const icon = button.querySelector('svg');
        
        if (input.type === 'password') {
            input.type = 'text';
            // Change to eye-off icon
            icon.innerHTML = '<path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7c.44 0 .87-.03 1.28-.09"/><line x1="2" x2="22" y1="2" y2="22"/>';
        } else {
            input.type = 'password';
            // Change back to eye icon
            icon.innerHTML = '<path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path><circle cx="12" cy="12" r="3"></circle>';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // --- Password Validation ---
        const newPassInput = document.getElementById('new-password');
        const confirmPassInput = document.getElementById('confirm-password');
        const requirementsList = document.getElementById('password-requirements');
        const matchMessage = document.getElementById('password-match-message');

        const reqs = {
            length: document.getElementById('req-length'),
            uppercase: document.getElementById('req-uppercase'),
            lowercase: document.getElementById('req-lowercase'),
            number: document.getElementById('req-number'),
            special: document.getElementById('req-special')
        };

        if (newPassInput) {
            newPassInput.addEventListener('focus', () => {
                requirementsList.classList.remove('hidden');
            });

            // Opcional: Ocultar si está vacío y pierde foco, o dejar siempre visible tras focus
            // newPassInput.addEventListener('blur', () => {
            //    if(newPassInput.value === '') requirementsList.classList.add('hidden');
            // });

            newPassInput.addEventListener('input', function() {
                const val = this.value;
                
                // Helper to update UI
                const updateReq = (id, valid) => {
                    const el = reqs[id];
                    const icon = el.querySelector('svg');
                    if (valid) {
                        el.classList.remove('text-gray-500');
                        el.classList.add('text-emerald-600', 'font-medium');
                        icon.classList.remove('text-gray-400'); 
                        icon.classList.add('text-emerald-600');
                        // Change circle to check
                        icon.innerHTML = '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>'; 
                    } else {
                        el.classList.remove('text-emerald-600', 'font-medium');
                        el.classList.add('text-gray-500');
                        icon.classList.remove('text-emerald-600');
                        icon.classList.add('text-gray-400');
                        // Circle
                        icon.innerHTML = '<circle cx="12" cy="12" r="10"/>';
                    }
                };

                updateReq('length', val.length >= 8);
                updateReq('uppercase', /[A-Z]/.test(val));
                updateReq('lowercase', /[a-z]/.test(val));
                updateReq('number', /[0-9]/.test(val));
                updateReq('special', /[!@#$%^&*(),.?":{}|<>]/.test(val));

                // Re-check match if confirm field has value
                if (confirmPassInput.value !== '') {
                    checkMatch();
                }
            });
        }

        if (confirmPassInput) {
            confirmPassInput.addEventListener('input', checkMatch);
        }

        function checkMatch() {
            const pass = newPassInput.value;
            const confirm = confirmPassInput.value;

            if (confirm === '') {
                matchMessage.classList.add('hidden');
                return;
            }

            matchMessage.classList.remove('hidden');
            if (pass === confirm) {
                matchMessage.textContent = 'Las contraseñas coinciden';
                matchMessage.classList.remove('text-red-500');
                matchMessage.classList.add('text-emerald-600');
            } else {
                matchMessage.textContent = 'Las contraseñas no coinciden';
                matchMessage.classList.remove('text-emerald-600');
                matchMessage.classList.add('text-red-500');
            }
        }

        // --- Users Table Logic ---
        const usersTable = new TablePagination({
            searchInputId: 'searchUsers',
            tableBodyId: 'tableBodyUsers',
            paginationContainerId: 'paginationUsers',
            rowsPerPageSelectId: 'rowsPerPageUsers',
            statusFilterId: 'filterUserStatus',
            categoryFilterId: 'filterUserRole', // Reusamos el filtro de categoría para "Rol"
            defaultRowsPerPage: 10
        });
    });

    function switchConfigTab(tabId) {
        // Reset triggers
        document.querySelectorAll('.tab-trigger').forEach(trigger => {
            trigger.setAttribute('data-state', 'inactive');
            trigger.setAttribute('aria-selected', 'false');
            trigger.classList.remove('bg-white', 'text-blue-700', 'shadow-sm');
            trigger.classList.add('hover:text-gray-900');
        });

        // Activate clicked trigger
        const activeTrigger = document.getElementById('tab-trigger-' + tabId);
        if(activeTrigger) {
            activeTrigger.setAttribute('data-state', 'active');
            activeTrigger.setAttribute('aria-selected', 'true');
            activeTrigger.classList.remove('hover:text-gray-900');
            activeTrigger.classList.add('bg-white', 'text-blue-700', 'shadow-sm');
        }

        // Hide all contents
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
            content.setAttribute('data-state', 'inactive');
        });

        // Show active content
        const activeContent = document.getElementById('tab-content-' + tabId);
        if(activeContent) {
            activeContent.classList.remove('hidden');
            activeContent.setAttribute('data-state', 'active');
        }
    }

    // Modal Logic
    document.addEventListener('DOMContentLoaded', function() {
        const addUserBtn = document.getElementById('addUserBtn');
        const addUserModal = document.getElementById('addUserModal');
        
        if (addUserBtn && addUserModal) {
            // Open Modal
            addUserBtn.addEventListener('click', function(e) {
                e.preventDefault(); 
                addUserModal.classList.remove('hidden');
            });

            // Close Modal (Buttons)
            const closeButtons = addUserModal.querySelectorAll('[data-modal-close]');
            closeButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    addUserModal.classList.add('hidden');
                });
            });

            // Close Modal (Backdrop)
            const backdrop = addUserModal.querySelector('[data-modal-cancel]');
            if (backdrop) {
                backdrop.addEventListener('click', function(e) {
                     if (e.target === backdrop) {
                        addUserModal.classList.add('hidden');
                     }
                });
            }
        }

        // --- Edit User Modal Logic ---
        document.addEventListener('click', function(e) {
            // Check for edit button click
            const btn = e.target.closest('.edit-user-btn');
            if (btn) {
                e.preventDefault();
                
                // Find modal dynamically
                const editModal = document.getElementById('editUserModal');
                
                if (editModal) {
                    // Get data
                    const userId = btn.dataset.userId;
                    const userName = btn.dataset.userName;
                    const userRole = btn.dataset.userRole;
                    const userStatus = btn.dataset.userStatus;

                    // Populate Modal
                    const nameSpan = document.getElementById('editUserNameSpan');
                    if(nameSpan) nameSpan.textContent = userName;
                    
                    const idInput = document.getElementById('editUserId');
                    if(idInput) idInput.value = userId;
                    
                    // Set Role
                    const roleSelect = document.getElementById('editUserRole');
                    if (roleSelect) roleSelect.value = userRole;

                    // Set Status
                    const statusSelect = document.getElementById('editUserStatus');
                    if (statusSelect) statusSelect.value = userStatus;

                    // Update Form Action
                    const form = document.getElementById('editUserForm');
                    if(form) form.action = `/usuarios/${userId}`;

                    // Show Modal
                    editModal.classList.remove('hidden');
                    
                    // Setup close handlers if not already set (simple check)
                    if (!editModal.hasAttribute('data-listeners-set')) {
                        const closeButtons = editModal.querySelectorAll('[data-edit-modal-close]');
                        closeButtons.forEach(b => b.addEventListener('click', () => editModal.classList.add('hidden')));
                        
                        const backdrop = editModal.querySelector('[data-edit-modal-cancel]');
                        if(backdrop) {
                            backdrop.addEventListener('click', (ev) => {
                                if(ev.target === backdrop) editModal.classList.add('hidden');
                            });
                        }
                        editModal.setAttribute('data-listeners-set', 'true');
                    }
                } else {
                    console.error('Edit modal not found');
                }
            }
        });
    });
</script>
@endpush
@endsection

