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
        <div class="flex-shrink-0 px-6 pt-6 pb-4 border-b border-gray-200">
            <div class="flex flex-col gap-2 text-center sm:text-left">
                <h2 id="history_modal_title" class="font-bold text-xl text-gray-900 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-history w-5 h-5 text-blue-600"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><path d="M3 3v5h5"></path><path d="M12 7v5l4 2"></path></svg>
                    Historial de Vida
                </h2>
                <p id="history_ac_subtitle" class="text-sm text-gray-500">
                    <!-- Populated by JS -->
                </p>
            </div>
        </div>

        <!-- BODY CON SCROLL -->
        <div class="flex-1 overflow-y-auto px-6 py-4">
            
            <!-- Filters -->
            <div class="space-y-3 py-4 border-b mb-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 font-medium text-xs text-gray-700">Desde</label>
                        <input type="date" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-blue-500">
                    </div>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 font-medium text-xs text-gray-700">Hasta</label>
                        <input type="date" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-blue-500">
                    </div>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 font-medium text-xs text-gray-700">Tipo de Actividad</label>
                        <select class="flex h-9 w-full items-center justify-between rounded-md border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                            <option value="">Todos</option>
                            <!-- Add options here -->
                        </select>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2">
                    <button class="inline-flex items-center justify-center whitespace-nowrap font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-red-200 bg-white text-red-600 hover:bg-red-50 h-8 rounded-md px-3 text-xs shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download mr-2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" x2="12" y1="15" y2="3"></line></svg>
                        Descargar PDF
                    </button>
                    <button class="inline-flex items-center justify-center whitespace-nowrap font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-gray-200 bg-white text-gray-700 hover:bg-gray-100 h-8 rounded-md px-3 text-xs shadow-sm">
                        Limpiar Filtros
                    </button>
                </div>
            </div>

            <!-- List -->
            <div class="space-y-4">
                <div class="relative">
                    <div class="absolute left-4 top-12 w-0.5 h-full bg-gray-200"></div>
                    
                    <!-- Example Card 1 -->
                    <div class="bg-white text-gray-900 flex flex-col gap-4 rounded-xl border border-l-4 border-l-blue-500 shadow-sm hover:shadow-md transition-shadow p-6 mb-4">
                        <div class="grid grid-cols-[1fr_auto] gap-2">
                            <div class="flex items-start gap-3">
                                <div class="bg-blue-100 p-2 rounded-full flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-600"><path d="M22 12h-2.48a2 2 0 0 0-1.93 1.46l-2.35 8.36a.25.25 0 0 1-.48 0L9.24 2.18a.25.25 0 0 0-.48 0l-2.35 8.36A2 2 0 0 1 4.49 12H2"></path></svg>
                                </div>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium text-xs bg-red-100 text-red-700 border-red-300">Cambio Estado</span>
                                        <span class="text-xs text-gray-500">14 de octubre de 2024</span>
                                    </div>
                                    <h4 class="font-semibold text-sm">Cambio de estado a mantenimiento por compresor defectuoso</h4>
                                    <p class="text-xs text-gray-600 mt-1">Técnico: Ing. Pedro García</p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 text-xs">
                            <div class="bg-gray-50 p-2 rounded"><p class="text-gray-500">Horas de Uso</p><p class="font-medium">8,450</p></div>
                            <div class="bg-gray-50 p-2 rounded"><p class="text-gray-500">Estado Anterior</p><p class="font-medium capitalize">operativo</p></div>
                            <div class="bg-gray-50 p-2 rounded"><p class="text-gray-500">Estado Nuevo</p><p class="font-medium capitalize">mantenimiento</p></div>
                        </div>
                        <div class="bg-blue-50 p-2 rounded border border-blue-100"><p class="text-xs text-gray-600 font-medium mb-1">Observaciones:</p><p class="text-xs text-gray-700">Programado cambio de compresor</p></div>
                    </div>

                     <!-- Example Card 2 -->
                     <div class="bg-white text-gray-900 flex flex-col gap-4 rounded-xl border border-l-4 border-l-blue-500 shadow-sm hover:shadow-md transition-shadow p-6 mb-4">
                        <div class="grid grid-cols-[1fr_auto] gap-2">
                            <div class="flex items-start gap-3">
                                <div class="bg-blue-100 p-2 rounded-full flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-amber-600"><circle cx="12" cy="12" r="10"></circle><line x1="12" x2="12" y1="8" y2="12"></line><line x1="12" x2="12.01" y1="16" y2="16"></line></svg>
                                </div>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium text-xs bg-amber-100 text-amber-700 border-amber-300">Reparación</span>
                                        <span class="text-xs text-gray-500">09 de enero de 2024</span>
                                    </div>
                                    <h4 class="font-semibold text-sm">Reparación de fuga menor</h4>
                                    <p class="text-xs text-gray-600 mt-1">Técnico: Ing. Carlos Méndez</p>
                                </div>
                            </div>
                        </div>
                         <div class="grid grid-cols-2 md:grid-cols-4 gap-2 text-xs">
                            <div class="bg-gray-50 p-2 rounded"><p class="text-gray-500">Costo Partes</p><p class="font-medium">$450</p></div>
                            <div class="bg-gray-50 p-2 rounded"><p class="text-gray-500">Mano de Obra</p><p class="font-medium">$300</p></div>
                            <div class="bg-gray-50 p-2 rounded"><p class="text-gray-500">Horas de Uso</p><p class="font-medium">4,200</p></div>
                        </div>
                        <div class="bg-blue-50 p-2 rounded border border-blue-100"><p class="text-xs text-gray-600 font-medium mb-1">Observaciones:</p><p class="text-xs text-gray-700">Fuga reparada en tubería de condensado</p></div>
                    </div>

                </div>
            </div>
            
        </div>

        <!-- FOOTER FIJO -->
        <div class="flex-shrink-0 px-6 py-4 rounded-xl border-t border-gray-200 bg-gray-50">
             <div class="flex flex-col-reverse gap-2 sm:flex-row sm:justify-end">
                <div class="flex items-center justify-between w-full">
                    <p class="text-xs text-gray-500">2 registro(s) encontrado(s)</p>
                    <button type="button" data-modal-close class="btn-color-red inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md font-medium transition-all bg-white text-gray-700 hover:bg-gray-50 border border-gray-300 shadow-sm h-9 px-4 py-2 text-sm">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
