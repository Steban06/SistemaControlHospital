@extends('layouts.app')

@section('title', 'Configuración - Sistema de Control Hospital')

@section('content')
<div class="p-4 lg:p-6 space-y-6 flex-1">
    <div dir="ltr" data-orientation="horizontal" data-slot="tabs" class="flex flex-col gap-2 w-full">
        <!-- Tab List -->
        <div role="tablist" aria-orientation="horizontal" data-slot="tabs-list" class="bg-gray-100 text-gray-500 h-10 items-center justify-center rounded-xl p-1 grid w-full grid-cols-3 mb-6" tabindex="0" data-orientation="horizontal" style="outline: none;">
            <button type="button" role="tab" aria-selected="true" data-state="active" id="tab-trigger-users" onclick="switchConfigTab('users')" class="tab-trigger inline-flex h-full flex-1 items-center justify-center gap-2 rounded-lg px-2 py-1 text-sm font-medium whitespace-nowrap transition-all focus-visible:ring-2 focus-visible:ring-blue-500/50 disabled:pointer-events-none disabled:opacity-50 bg-white text-blue-700 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-4 h-4 mr-1">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                Usuarios
            </button>
            <button type="button" role="tab" aria-selected="false" data-state="inactive" id="tab-trigger-security" onclick="switchConfigTab('security')" class="tab-trigger inline-flex h-full flex-1 items-center justify-center gap-2 rounded-lg px-2 py-1 text-sm font-medium whitespace-nowrap transition-all focus-visible:ring-2 focus-visible:ring-blue-500/50 disabled:pointer-events-none disabled:opacity-50 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield w-4 h-4 mr-1">
                    <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                </svg>
                Seguridad
            </button>
            <button type="button" role="tab" aria-selected="false" data-state="inactive" id="tab-trigger-notifications" onclick="switchConfigTab('notifications')" class="tab-trigger inline-flex h-full flex-1 items-center justify-center gap-2 rounded-lg px-2 py-1 text-sm font-medium whitespace-nowrap transition-all focus-visible:ring-2 focus-visible:ring-blue-500/50 disabled:pointer-events-none disabled:opacity-50 hover:text-gray-900">
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
            <div data-slot="card" class="bg-white text-gray-900 flex flex-col gap-6 rounded-xl shadow-sm border border-gray-200">
                <div class="px-6 pt-6 flex flex-col gap-1">
                    <h4 class="text-lg font-bold leading-none flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-5 h-5 text-blue-600">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        Gestión de Usuarios
                    </h4>
                    <p class="text-sm text-gray-500">Administre los usuarios y sus permisos en el sistema</p>
                </div>
                
                <div class="px-6 pb-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div class="p-4 bg-blue-50 rounded-lg border border-blue-200">
                            <p class="text-sm text-blue-700 mb-1">Administradores</p>
                            <p class="text-2xl font-bold text-blue-900">1</p>
                        </div>
                        <div class="p-4 bg-emerald-50 rounded-lg border border-emerald-200">
                            <p class="text-sm text-emerald-700 mb-1">Usuarios</p>
                            <p class="text-2xl font-bold text-emerald-900">2</p>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                            <p class="text-sm text-gray-700 mb-1">Invitados</p>
                            <p class="text-2xl font-bold text-gray-900">1</p>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="border rounded-lg overflow-hidden">
                        <div class="relative w-full overflow-x-auto">
                            <table class="w-full text-sm text-left">
                                <thead class="bg-gray-50 border-b">
                                    <tr>
                                        <th class="h-10 px-4 font-medium text-gray-700">Nombre</th>
                                        <th class="h-10 px-4 font-medium text-gray-700">Email</th>
                                        <th class="h-10 px-4 font-medium text-gray-700">Rol</th>
                                        <th class="h-10 px-4 font-medium text-gray-700">Departamento</th>
                                        <th class="h-10 px-4 font-medium text-gray-700">Estado</th>
                                        <th class="h-10 px-4 font-medium text-gray-700">Último Acceso</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="p-4 font-medium text-gray-900">María González</td>
                                        <td class="p-4 text-gray-600">maria.gonzalez@hospital.com</td>
                                        <td class="p-4"><span class="inline-flex items-center rounded-md bg-blue-600 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-blue-700/10">Administrador</span></td>
                                        <td class="p-4 text-gray-600">Administración</td>
                                        <td class="p-4"><span class="inline-flex items-center gap-1 rounded-md bg-emerald-100 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-600/20"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>Activo</span></td>
                                        <td class="p-4 text-gray-400 text-xs">2026-01-12 09:30</td>
                                    </tr>
                                     <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="p-4 font-medium text-gray-900">Carlos Ramírez</td>
                                        <td class="p-4 text-gray-600">carlos.ramirez@hospital.com</td>
                                        <td class="p-4"><span class="inline-flex items-center rounded-md bg-emerald-600 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-emerald-700/10">Usuario</span></td>
                                        <td class="p-4 text-gray-600">Urgencias</td>
                                        <td class="p-4"><span class="inline-flex items-center gap-1 rounded-md bg-emerald-100 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-600/20"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>Activo</span></td>
                                        <td class="p-4 text-gray-400 text-xs">2026-01-12 08:15</td>
                                    </tr>
                                     <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="p-4 font-medium text-gray-900">Ana Martínez</td>
                                        <td class="p-4 text-gray-600">ana.martinez@hospital.com</td>
                                        <td class="p-4"><span class="inline-flex items-center rounded-md bg-emerald-600 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-emerald-700/10">Usuario</span></td>
                                        <td class="p-4 text-gray-600">Cirugía</td>
                                        <td class="p-4"><span class="inline-flex items-center gap-1 rounded-md bg-emerald-100 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-600/20"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>Activo</span></td>
                                        <td class="p-4 text-gray-400 text-xs">2026-01-11 16:45</td>
                                    </tr>
                                     <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="p-4 font-medium text-gray-900">Pedro López</td>
                                        <td class="p-4 text-gray-600">pedro.lopez@hospital.com</td>
                                        <td class="p-4"><span class="inline-flex items-center rounded-md bg-gray-500 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-gray-600/10">Invitado</span></td>
                                        <td class="p-4 text-gray-600">Auditoría</td>
                                        <td class="p-4"><span class="inline-flex items-center gap-1 rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-700 ring-1 ring-inset ring-gray-600/20"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>Inactivo</span></td>
                                        <td class="p-4 text-gray-400 text-xs">2026-01-10 14:20</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Permissions Card -->
            <div class="bg-white text-gray-900 flex flex-col gap-6 rounded-xl shadow-sm border border-gray-200">
                <div class="px-6 pt-6 flex flex-col gap-1">
                    <h4 class="text-lg font-bold leading-none flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield w-5 h-5 text-blue-600">
                            <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                        </svg>
                        Permisos por Rol
                    </h4>
                    <p class="text-sm text-gray-500">Descripción de permisos para cada tipo de usuario</p>
                </div>
                <div class="px-6 pb-6">
                    <div class="space-y-4">
                        <div class="p-4 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="flex items-center gap-2 mb-2"><span class="inline-flex items-center rounded-md bg-blue-600 px-2 py-1 text-xs font-medium text-white">Administrador</span></div>
                            <ul class="text-sm text-blue-900 space-y-1 ml-4 list-disc">
                                <li>Acceso completo a todos los módulos</li>
                                <li>Gestión de usuarios y permisos</li>
                                <li>Crear, editar y eliminar bienes</li>
                                <li>Generar todos los tipos de reportes</li>
                            </ul>
                        </div>
                        <div class="p-4 bg-emerald-50 rounded-lg border border-emerald-200">
                            <div class="flex items-center gap-2 mb-2"><span class="inline-flex items-center rounded-md bg-emerald-600 px-2 py-1 text-xs font-medium text-white">Usuario</span></div>
                            <ul class="text-sm text-emerald-900 space-y-1 ml-4 list-disc">
                                <li>Ver y consultar inventario</li>
                                <li>Crear y editar bienes</li>
                                <li>Generar reportes básicos</li>
                                <li>Sin acceso a gestión de usuarios</li>
                            </ul>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                            <div class="flex items-center gap-2 mb-2"><span class="inline-flex items-center rounded-md bg-gray-500 px-2 py-1 text-xs font-medium text-white">Invitado</span></div>
                            <ul class="text-sm text-gray-900 space-y-1 ml-4 list-disc">
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
             <div class="flex items-center justify-center p-12 border-2 border-dashed border-gray-200 rounded-xl bg-gray-50/50">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto text-gray-300 mb-4"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/></svg>
                    <h3 class="text-lg font-medium text-gray-900">Configuración de Seguridad</h3>
                    <p class="text-gray-500 mt-1">Próximamente disponible</p>
                </div>
            </div>
        </div>

        <!-- Notifications Tab Content -->
        <div data-state="inactive" id="tab-content-notifications" class="tab-content flex-1 outline-none space-y-6 hidden animate-in fade-in zoom-in duration-300">
            <div class="flex items-center justify-center p-12 border-2 border-dashed border-gray-200 rounded-xl bg-gray-50/50">
                <div class="text-center">
                     <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto text-gray-300 mb-4"><path d="M10.268 21a2 2 0 0 0 3.464 0"/><path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"/></svg>
                    <h3 class="text-lg font-medium text-gray-900">Configuración de Notificaciones</h3>
                    <p class="text-gray-500 mt-1">Próximamente disponible</p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
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
</script>
@endpush
@endsection

