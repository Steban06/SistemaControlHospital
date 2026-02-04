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
        <button onclick="markAllNotificationsAsRead()" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition-colors shadow-sm">
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
        <button class="px-4 py-2 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 text-sm font-medium rounded-lg transition-colors filter-btn">
            Sin leer
        </button>
        <button class="px-4 py-2 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 text-sm font-medium rounded-lg transition-colors filter-btn">
            Mantenimiento
        </button>
        <button class="px-4 py-2 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 text-sm font-medium rounded-lg transition-colors filter-btn">
            Inventario
        </button>
        <button class="px-4 py-2 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700 text-sm font-medium rounded-lg transition-colors filter-btn">
            Reportes
        </button>
    </div>

    <!-- Notifications List -->
    <div class="space-y-4">
        @forelse($notifications as $notification)
            <!-- Dynamic Notification Item -->
            <div class="group {{ $notification->is_read ? 'bg-white dark:bg-gray-800 opacity-75' : 'bg-blue-50/30 dark:bg-blue-900/10 border-l-4 border-l-blue-500' }} dark:hover:bg-gray-700/50 transition-all rounded-lg p-6 cursor-pointer relative overflow-hidden border border-gray-200 dark:border-gray-700 notification-item" data-id="{{ $notification->id }}" data-type="{{ $notification->type }}" data-read="{{ $notification->is_read ? 'true' : 'false' }}" onclick="markNotificationRead({{ $notification->id }})">
                
                @if(!$notification->is_read)
                <div class="absolute top-3 right-3">
                    <span class="inline-flex h-2.5 w-2.5 rounded-full bg-blue-500 animate-pulse"></span>
                </div>
                @endif

                <div class="flex gap-5 pr-8">
                    <!-- Icon based on type -->
                    <div class="w-12 h-12 rounded-full flex items-center justify-center shrink-0 shadow-sm
                        @if($notification->type == 'reports') bg-purple-100 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400
                        @elseif($notification->type == 'maintenance') bg-amber-100 text-amber-600 dark:bg-amber-900/30 dark:text-amber-400
                        @elseif($notification->type == 'inventory') bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400
                        @else bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400 @endif">
                        
                        @if($notification->type == 'reports')
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
                        @elseif($notification->type == 'maintenance')
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                        @elseif($notification->type == 'inventory')
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package"><path d="m7.5 4.27 9 5.15"/><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22v-9"/></svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
                        @endif
                    </div>
                    
                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between mb-3">
                            <h3 class="text-base font-bold text-gray-900 dark:text-gray-100">{{ $notification->title }}</h3>
                            <span class="text-xs text-gray-500 dark:text-gray-400 font-medium ml-4 shrink-0">{{ $notification->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                            {{ $notification->message }}
                        </p>
                        <div class="flex items-center gap-2">
                             @php
                                $badgeClass = match($notification->type) {
                                    'reports' => 'bg-purple-100 text-purple-700 dark:bg-purple-900/30 dark:text-purple-400',
                                    'maintenance' => 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400',
                                    'inventory' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400',
                                    default => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400'
                                };
                                $label = match($notification->type) {
                                    'reports' => 'Reportes',
                                    'maintenance' => 'Mantenimiento',
                                    'inventory' => 'Inventario',
                                    default => 'Información'
                                };
                            @endphp
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 {{ $badgeClass }} text-xs font-semibold rounded-md notification-badge">
                                {{ $label }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-12 bg-white dark:bg-gray-800 rounded-lg border border-dashed border-gray-300 dark:border-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-100">No hay notificaciones</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Te avisaremos cuando haya novedades.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700 pagination-container">
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
// Mark individual notification as read
function markNotificationRead(notificationId) {
    fetch(`/api/notifications/${notificationId}/read`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const notificationElement = document.querySelector(`.notification-item[data-id="${notificationId}"]`);
            if (notificationElement) {
                // Update visual state
                notificationElement.classList.remove('bg-blue-50/30', 'dark:bg-blue-900/10', 'border-l-4', 'border-l-blue-500');
                notificationElement.classList.add('bg-white', 'dark:bg-gray-800', 'opacity-75');
                notificationElement.setAttribute('data-read', 'true');
                
                // Remove pulse indicator
                const pulseIndicator = notificationElement.querySelector('.animate-pulse');
                if (pulseIndicator) {
                    pulseIndicator.parentElement.remove();
                }
            }
        }
    })
    .catch(error => console.error('Error:', error));
}

// Mark all notifications as read
function markAllNotificationsAsRead() {
    fetch('/api/notifications/mark-all-read', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    })
    .catch(error => console.error('Error:', error));
}

// Filtros de notificaciones
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.flex.flex-wrap.gap-2 button');
    const notifications = document.querySelectorAll('.notification-item');
    
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
                    const type = notification.getAttribute('data-type');
                    const isRead = notification.getAttribute('data-read') === 'true';
                    
                    let shouldShow = false;
                    
                    switch(filterType) {
                        case 'Todas':
                            shouldShow = true;
                            break;
                            
                        case 'Sin leer':
                            shouldShow = !isRead;
                            break;
                            
                        case 'Mantenimiento':
                            shouldShow = type === 'maintenance';
                            break;
                            
                        case 'Inventario':
                            shouldShow = type === 'inventory';
                            break;
                            
                        case 'Reportes':
                            shouldShow = type === 'reports';
                            break;
                            
                        default:
                            shouldShow = true;
                    }
                    
                    if (shouldShow) {
                        notification.style.display = '';
                    } else {
                        notification.style.display = 'none';
                    }
                });

                // Re-apply styles after class changes
                if (typeof applyDarkModeStyles === 'function') {
                    applyDarkModeStyles();
                }
            });
        });
    }
});
// JS Styling Fixes for Dark Mode
// Defined globally to be accessible from click handlers
function applyDarkModeStyles() {
    const isDark = document.documentElement.classList.contains('dark');
    const paginationButtons = document.querySelectorAll('.pagination-container button');
    const notificationItems = document.querySelectorAll('.notification-item');
    const filterBtns = document.querySelectorAll('.flex.flex-wrap.gap-2 button'); // Select all filter buttons

    // 1. Pagination Buttons
    paginationButtons.forEach(btn => {
        if (isDark) {
            btn.style.backgroundColor = '#1f2937'; // gray-800
            btn.style.color = '#d1d5db'; // gray-300
            btn.style.borderColor = '#374151'; // gray-700
        } else {
            btn.style.backgroundColor = '#f3f4f6'; // gray-100
            btn.style.color = '#9ca3af'; // gray-400
            btn.style.borderColor = 'transparent';
        }
    });

    // 2. Notification Hover Effects
    notificationItems.forEach(item => {
        if (isDark) {
                if (item.classList.contains('bg-white')) {
                    item.classList.remove('bg-white');
                    item.classList.add('bg-gray-800');
                }
        }
        item.onmouseenter = function() {
            const dark = document.documentElement.classList.contains('dark');
            if (dark) {
                this.style.backgroundColor = 'rgba(55, 65, 81, 0.5)';
            } else {
                this.style.backgroundColor = '#f9fafb';
            }
        };
        item.onmouseleave = function() {
            this.style.backgroundColor = '';
        };
    });

    // 3. Filter Buttons Styling (Base + Hover)
    filterBtns.forEach(btn => {
        // If it's the active blue button, reset inline styles to let CSS classes work
        if (btn.classList.contains('bg-blue-600')) {
            btn.style.backgroundColor = '';
            btn.style.color = '';
            btn.style.borderColor = '';
            
            // Remove hover listeners for active button
            btn.onmouseenter = null;
            btn.onmouseleave = null;
            return;
        }

        // For inactive buttons, force colors
        if (isDark) {
            btn.style.backgroundColor = '#1f2937'; // gray-800
            btn.style.color = '#d1d5db'; // gray-300
            btn.style.borderColor = '#374151'; // gray-700
        } else {
            btn.style.backgroundColor = '#ffffff'; // white
            btn.style.color = '#374151'; // gray-700
            btn.style.borderColor = '#e5e7eb'; // gray-200
        }

        // Add hover logic for inactive buttons
        btn.onmouseenter = function() {
            if (this.classList.contains('bg-blue-600')) return;
            const dark = document.documentElement.classList.contains('dark');
            this.style.backgroundColor = dark ? '#374151' : '#f9fafb'; // gray-700 : gray-50
        };

        btn.onmouseleave = function() {
            if (this.classList.contains('bg-blue-600')) return;
            const dark = document.documentElement.classList.contains('dark');
            // Revert to base inactive color
            this.style.backgroundColor = dark ? '#1f2937' : '#ffffff'; 
        };
    });

    // 4. Notification Badges
    const badges = document.querySelectorAll('.notification-badge');
    badges.forEach(badge => {
        const text = badge.textContent.trim();
        let bgColor, textColor;

        if (isDark) {
            if (text === 'Reportes') {
                bgColor = 'rgba(88, 28, 135, 0.5)';
                textColor = '#e9d5ff';
            } else if (text === 'Mantenimiento') {
                    bgColor = 'rgba(120, 53, 15, 0.5)';
                    textColor = '#fde68a';
            } else if (text === 'Inventario') {
                bgColor = 'rgba(127, 29, 29, 0.5)';
                textColor = '#fecaca';
            } else {
                bgColor = 'rgba(30, 58, 138, 0.5)';
                textColor = '#bfdbfe';
            }
            
            badge.style.backgroundColor = bgColor;
            badge.style.color = textColor;
        } else {
            badge.style.backgroundColor = ''; 
            badge.style.color = '';
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // Run immediately
    applyDarkModeStyles();

    // Observer for theme changes
    const observer = new MutationObserver(applyDarkModeStyles);
    observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
});
</script>
@endsection
