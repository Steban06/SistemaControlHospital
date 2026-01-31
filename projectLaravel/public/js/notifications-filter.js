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
