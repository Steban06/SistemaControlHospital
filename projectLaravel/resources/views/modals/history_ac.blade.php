<style>
    .btn-color-red:hover {
        border-color: #dc2626 !important; /* rojo (tailwind red-600) */
        color: #dc2626 !important;
        background-color: transparent !important;
    }
</style>

<!-- View History AC Modal -->
<div id="historyACModal" class="fixed inset-0 z-[99999] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="z-index: 99999;">
    <!-- Overlay Background -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity z-[99998]" data-modal-cancel style="z-index: 99998; background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(4px);"></div>

    <!-- Modal Content -->
    <div role="dialog" id="historyACContent" 
         class="bg-white fixed top-[50%] left-[50%] z-[100000] flex flex-col translate-x-[-50%] translate-y-[-50%] rounded-xl border shadow-2xl duration-200 sm:max-w-lg max-w-5xl w-[95vw] max-h-[90vh]" 
         tabindex="-1" style="pointer-events: auto; z-index: 100000;">
         
        <!-- Close Button (X) -->
        <button type="button" data-modal-close class="cursor-pointer absolute right-4 top-4 rounded-sm opacity-70 transition-opacity hover:opacity-100 focus:outline-none disabled:pointer-events-none p-1 hover:bg-gray-100 hover:text-red-500 z-50 btn-color-red">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-5 w-5"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            <span class="sr-only">Close</span>
        </button>

        <!-- HEADER FIJO -->
        <div class="flex-shrink-0 px-6 pt-6  border-b border-gray-200">
            <div class="flex flex-col gap-2 text-center sm:text-left">
                <h2 id="history_modal_title" class="font-bold text-xl text-gray-900 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-history w-5 h-5 text-blue-600"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><path d="M3 3v5h5"></path><path d="M12 7v5l4 2"></path></svg>
                    Historial de Vida
                </h2>
                <p id="history_ac_subtitle" class="text-sm text-gray-500">
                    <!-- Populated by JS -->
                </p>
            </div>

            <div class="space-y-3 py-4 mb-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 font-medium text-xs text-gray-700">Desde</label>
                        <input id="ac-filter-desde" type="date" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-blue-500">
                    </div>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 font-medium text-xs text-gray-700">Hasta</label>
                        <input id="ac-filter-hasta" type="date" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-blue-500">
                    </div>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 font-medium text-xs text-gray-700">Tipo de Actividad</label>
                        <select id="filter-intervencion" class="flex h-9 w-full items-center justify-between rounded-md border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                            <option value="">Todos</option>
                            <option value="mantenimiento">Mantenimiento</option>
                            <option value="reparacion">Reparación</option>
                            <option value="falla">Falla</option>
                            <option value="instalacion">Instalación</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2">
                    <button id="btn-download-ac-history-pdf" style="color: #dc2626 !important;" class="inline-flex items-center justify-center whitespace-nowrap font-medium transition-colors h-8 rounded-md px-3 text-xs shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download mr-2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" x2="12" y1="15" y2="3"></line></svg>
                        Descargar PDF
                    </button>
                    <button id="ac-btn-reset" class="inline-flex items-center justify-center whitespace-nowrap font-medium transition-colors h-8 rounded-md px-3 text-xs shadow-sm border-gray-300">
                        Limpiar Filtros
                    </button>
                </div>
            </div>
        </div>

        <!-- BODY CON SCROLL -->
        <div class="flex-1 overflow-y-auto px-6 py-4">
            
            <!-- Filters -->
            

            <!-- List -->
            <div class="space-y-4">
                <div class="relative" id="history_aire_list">
                    
                    <!-- Este es el esapico donde se despliegan las tarjetas de intervencion -->

                </div>
            </div>
            
        </div>

        <!-- FOOTER FIJO -->
        <div class="flex-shrink-0 px-6 py-4 rounded-xl border-t border-gray-200 bg-gray-50">
             <div class="flex flex-col-reverse gap-2 sm:flex-row sm:justify-end">
                <div class="flex items-center justify-between w-full">
                    <p id="total_inter_ac" class="text-xs text-gray-500"></p>
                    <button type="button" data-modal-close class="btn-color-red inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md font-medium transition-all bg-white text-gray-700 hover:bg-gray-50 border border-gray-300 shadow-sm h-9 px-4 py-2 text-sm">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Dark mode fixes for AC History Modal
    document.addEventListener('DOMContentLoaded', function() {
    
        function updateHistoryACBadges() {
            const isDark = document.documentElement.classList.contains('dark');
            const badges = document.querySelectorAll('#historyACModal .inline-flex.items-center.justify-center.rounded-md.border');

            // Configuración de temas por estado
            const themes = {
                FALLA: {
                    light: { bg: '#fee2e2', text: '#b91c1c', border: '#fecaca', accent: '#dc2626' },
                    dark: { bg: 'rgba(127, 29, 29, 0.5)', text: '#fca5a5', border: '#7f1d1d', accent: '#dc2626' }
                },
                REPARACION: {
                    light: { bg: '#fef3c7', text: '#b45309', border: '#fde68a', accent: '#f59e0b' },
                    dark: { bg: 'rgba(120, 53, 15, 0.5)', text: '#fcd34d', border: '#78350f', accent: '#f59e0b' }
                },
                MANTENIMIENTO: {
                    light: { bg: '#dcfce7', text: '#15803d', border: '#bbf7d0', accent: '#16a34a' },
                    dark: { bg: 'rgba(20, 83, 45, 0.5)', text: '#86efac', border: '#14532d', accent: '#16a34a' }
                },
                INSTALACION: {
                    light: { bg: '#f3e8ff', text: '#7e22ce', border: '#e9d5ff', accent: '#9333ea' },
                    dark: { bg: 'rgba(88, 28, 135, 0.5)', text: '#d8b4fe', border: '#581c87', accent: '#9333ea' }
                },
                OTRO: {
                    light: { bg: '#f1f5f9', text: '#475569', border: '#e2e8f0', accent: '#64748b' },
                    dark: { bg: 'rgba(30, 41, 59, 0.5)', text: '#cbd5e1', border: '#1e293b', accent: '#64748b' }
                }
            };

            badges.forEach(badge => {
                const text = badge.textContent.trim().toUpperCase();
                const card = badge.closest('.rounded-xl');
                
                // Determinar qué tema usar
                let themeKey = 'OTRO';
                if (text.includes('FALLA')) themeKey = 'FALLA';
                else if (text.includes('REPARACI')) themeKey = 'REPARACION';
                else if (text.includes('MANTENIMIENTO')) themeKey = 'MANTENIMIENTO';
                else if (text.includes('INSTALACION')) themeKey = 'INSTALACION';

                const colors = isDark ? themes[themeKey].dark : themes[themeKey].light;

                // 1. Aplicar al Badge
                badge.style.setProperty('background-color', colors.bg, 'important');
                badge.style.setProperty('color', colors.text, 'important');
                badge.style.setProperty('border-color', colors.border, 'important');

                // 2. Aplicar a la Card (si existe)
                if (card) {
                    card.style.setProperty('border-left-color', colors.accent, 'important');

                    // Icono
                    const iconContainer = card.querySelector('.p-2.rounded-full');
                    if (iconContainer) {
                        iconContainer.style.setProperty('background-color', colors.bg, 'important');
                        const icon = iconContainer.querySelector('svg');
                        if (icon) icon.style.setProperty('color', colors.accent, 'important');
                    }

                    // Cuadro de observaciones
                    const obsBox = card.querySelector('.bg-blue-50\\/50') || 
                    card.querySelector('.bg-blue-50') || 
                    card.querySelector('.bg-gray-50');

                    if (obsBox) {
                        // Aplicamos el color de fondo del tema
                        obsBox.style.setProperty('background-color', isDark ? 'rgba(0,0,0,0.2)' : colors.bg, 'important');
                        // Aplicamos el borde del mismo tema para que combine
                        obsBox.style.setProperty('border-color', colors.border, 'important');
                    }
                }
            });
        }

        // --- Observadores y Ejecución ---
        updateHistoryACBadges();

        const observer = new MutationObserver(() => updateHistoryACBadges());
        observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });

        const historyModal = document.getElementById('historyACModal');
        if (historyModal) {
            new MutationObserver(() => updateHistoryACBadges()).observe(historyModal, { childList: true, subtree: true });
        }
    });
</script>
