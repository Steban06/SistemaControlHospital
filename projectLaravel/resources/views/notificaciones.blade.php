@extends('layouts.app')

@section('title', 'Notificaciones - Sistema de Control Hospital')

@section('content')
<div class="p-6 lg:p-8 space-y-6 lg:space-y-8">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-bold text-gray-900 dark:text-gray-100">Notificaciones</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Centro de notificaciones del sistema</p>
        </div>
        <button class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition-colors shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-check">
                <path d="M18 6 7 17l-5-5"/>
                <path d="m22 10-7.5 7.5L13 16"/>
            </svg>
            Marcar todas como leídas
        </button>
    </div>

    <!-- Filters -->
    <div class="flex flex-wrap gap-2">
        <button class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg transition-colors">
            Todas
        </button>
        <button class="px-4 py-2 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
            Sin leer
        </button>
        <button class="px-4 py-2 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
            Mantenimiento
        </button>
        <button class="px-4 py-2 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
            Inventario
        </button>
        <button class="px-4 py-2 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
            Reportes
        </button>
    </div>

    <!-- Notifications List -->
    <div class="space-y-4">
        <!-- Notification 1 - Unread -->
        <div class="group bg-amber-50/30 dark:bg-amber-900/10 border-l-4 border-l-amber-500 hover:bg-amber-50/50 dark:hover:bg-amber-900/20 transition-all rounded-lg p-6 cursor-pointer relative overflow-hidden border border-amber-200 dark:border-amber-800">
            <div class="absolute top-3 right-3">
                <span class="inline-flex h-2.5 w-2.5 rounded-full bg-blue-500 animate-pulse"></span>
            </div>
            <div class="flex gap-5 pr-8">
                <div class="bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 w-12 h-12 rounded-full flex items-center justify-center shrink-0 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench">
                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-start justify-between mb-3">
                        <h3 class="text-base font-bold text-gray-900 dark:text-gray-100">Mantenimiento Preventivo Programado</h3>
                        <span class="text-xs text-gray-500 dark:text-gray-400 font-medium ml-4 shrink-0">Hace 2 horas</span>
                    </div>
                    <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                        El equipo de <strong>Aire Acondicionado Sala de Espera</strong> (BN-2024-0045) requiere su revisión trimestral programada. Se recomienda realizar la inspección antes del 15 de febrero.
                    </p>
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-400 text-xs font-semibold rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                            Mantenimiento
                        </span>
                        <span class="text-xs text-gray-500 dark:text-gray-400">•</span>
                        <span class="text-xs text-gray-500 dark:text-gray-400">Prioridad: Media</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notification 2 - Unread Critical -->
        <div class="group bg-red-50/30 dark:bg-red-900/10 border-l-4 border-l-red-500 hover:bg-red-50/50 dark:hover:bg-red-900/20 transition-all rounded-lg p-6 cursor-pointer relative overflow-hidden border border-red-200 dark:border-red-800">
            <div class="absolute top-3 right-3">
                <span class="inline-flex h-2.5 w-2.5 rounded-full bg-red-500 animate-pulse"></span>
            </div>
            <div class="flex gap-5 pr-8">
                <div class="bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 w-12 h-12 rounded-full flex items-center justify-center shrink-0 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-triangle">
                        <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/>
                        <path d="M12 9v4"/>
                        <path d="M12 17h.01"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-start justify-between mb-3">
                        <h3 class="text-base font-bold text-gray-900 dark:text-gray-100">Stock Crítico - Acción Requerida</h3>
                        <span class="text-xs text-gray-500 dark:text-gray-400 font-medium ml-4 shrink-0">Ayer a las 14:30</span>
                    </div>
                    <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                        El inventario de <strong>Filtros de Aire (Modelo X-200)</strong> ha alcanzado un nivel crítico. Quedan solo 3 unidades disponibles. Se recomienda realizar un pedido urgente.
                    </p>
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400 text-xs font-semibold rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package"><path d="m7.5 4.27 9 5.15"/><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22v-9"/></svg>
                            Inventario
                        </span>
                        <span class="text-xs text-gray-500 dark:text-gray-400">•</span>
                        <span class="text-xs text-red-600 dark:text-red-400 font-semibold">Prioridad: Alta</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notification 3 - Read -->
        <div class="group bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all rounded-lg p-6 cursor-pointer opacity-75">
            <div class="flex gap-5">
                <div class="bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 w-12 h-12 rounded-full flex items-center justify-center shrink-0 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text">
                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/>
                        <path d="M14 2v4a2 2 0 0 0 2 2h4"/>
                        <path d="M10 9H8"/>
                        <path d="M16 13H8"/>
                        <path d="M16 17H8"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-start justify-between mb-3">
                        <h3 class="text-base font-bold text-gray-900 dark:text-gray-100">Reporte Mensual Generado</h3>
                        <span class="text-xs text-gray-500 dark:text-gray-400 font-medium ml-4 shrink-0">Hace 1 día</span>
                    </div>
                    <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                        El <strong>Reporte Mensual de Activos</strong> correspondiente a Octubre 2025 ha sido generado exitosamente y está disponible para su descarga.
                    </p>
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 text-xs font-semibold rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
                            Reportes
                        </span>
                        <span class="text-xs text-gray-500 dark:text-gray-400">•</span>
                        <span class="text-xs text-gray-500 dark:text-gray-400">Prioridad: Baja</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notification 4 - Read -->
        <div class="group bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all rounded-lg p-6 cursor-pointer opacity-75">
            <div class="flex gap-5">
                <div class="bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 w-12 h-12 rounded-full flex items-center justify-center shrink-0 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle-2">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-start justify-between mb-3">
                        <h3 class="text-base font-bold text-gray-900 dark:text-gray-100">Mantenimiento Completado</h3>
                        <span class="text-xs text-gray-500 dark:text-gray-400 font-medium ml-4 shrink-0">Hace 2 días</span>
                    </div>
                    <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                        El mantenimiento correctivo del <strong>Monitor LG 27"</strong> (BN-2023-0156) ha sido completado exitosamente. El equipo está operativo nuevamente.
                    </p>
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 text-xs font-semibold rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                            Mantenimiento
                        </span>
                        <span class="text-xs text-gray-500 dark:text-gray-400">•</span>
                        <span class="text-xs text-gray-500 dark:text-gray-400">Prioridad: Media</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700">
        <p class="text-sm text-gray-600 dark:text-gray-400">
            Mostrando <strong>1-4</strong> de <strong>4</strong> notificaciones
        </p>
        <div class="flex gap-2">
            <button disabled class="px-3 py-1.5 text-sm font-medium text-gray-400 dark:text-gray-600 bg-gray-100 dark:bg-gray-800 rounded-md cursor-not-allowed">
                Anterior
            </button>
            <button disabled class="px-3 py-1.5 text-sm font-medium text-gray-400 dark:text-gray-600 bg-gray-100 dark:bg-gray-800 rounded-md cursor-not-allowed">
                Siguiente
            </button>
        </div>
    </div>

</div>

<script>
// Filtros de notificaciones
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.flex.flex-wrap.gap-2 button');
    const notifications = document.querySelectorAll('[class*="border-l-"]');
    
    if (filterButtons.length > 0) {
        filterButtons.forEach((button, index) => {
            button.addEventListener('click', function() {
                // Remover clase activa de todos los botones
                filterButtons.forEach(btn => {
                    btn.classList.remove('bg-blue-600', 'text-white');
                    btn.classList.add('bg-white', 'dark:bg-gray-800', 'text-gray-700', 'dark:text-gray-300', 'border', 'border-gray-200', 'dark:border-gray-700');
                });
                
                // Agregar clase activa al botón clickeado
                this.classList.add('bg-blue-600', 'text-white');
                this.classList.remove('bg-white', 'dark:bg-gray-800', 'text-gray-700', 'dark:text-gray-300', 'border', 'border-gray-200', 'dark:border-gray-700');
                
                const filterType = this.textContent.trim();
                
                // Filtrar notificaciones
                notifications.forEach(notification => {
                    const hasUnreadIndicator = notification.querySelector('.animate-pulse');
                    const categoryBadge = notification.querySelector('span[class*="bg-"]')?.textContent.trim();
                    
                    let shouldShow = false;
                    
                    switch(filterType) {
                        case 'Todas':
                            shouldShow = true;
                            break;
                        case 'Sin leer':
                            shouldShow = hasUnreadIndicator !== null;
                            break;
                        case 'Mantenimiento':
                            shouldShow = categoryBadge && categoryBadge.includes('Mantenimiento');
                            break;
                        case 'Inventario':
                            shouldShow = categoryBadge && categoryBadge.includes('Inventario');
                            break;
                        case 'Reportes':
                            shouldShow = categoryBadge && categoryBadge.includes('Reportes');
                            break;
                    }
                    
                    if (shouldShow) {
                        notification.style.display = '';
                    } else {
                        notification.style.display = 'none';
                    }
                });
            });
        });
    }
});
</script>
@endsection
