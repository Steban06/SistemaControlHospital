<style>
    .btn-color-red:hover {
        border-color: #dc2626 !important; /* rojo (tailwind red-600) */
        color: #dc2626 !important;
        background-color: transparent !important;
    }
</style>

<!-- View AC Details Modal -->
<div id="viewACModal" class="fixed inset-0 z-[99999] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="z-index: 99999;">
    <!-- Overlay Background -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity z-[99998]" data-modal-cancel style="z-index: 99998; background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(4px);"></div>

    <!-- Modal Content -->
    <div role="dialog" id="viewACContent" 
         class="bg-white fixed top-[50%] left-[50%] z-[100000] flex flex-col translate-x-[-50%] translate-y-[-50%] rounded-xl border shadow-2xl duration-200 sm:max-w-lg max-w-4xl w-[95vw] max-h-[90vh]" 
         tabindex="-1" style="pointer-events: auto; z-index: 100000;">
         
        <!-- Close Button (X) -->
        <button type="button" data-modal-close class="btn-color-red cursor-pointer absolute right-4 top-4 rounded-sm opacity-70 transition-opacity hover:opacity-100 focus:outline-none disabled:pointer-events-none p-1 hover:bg-gray-100 hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-5 w-5"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            <span class="sr-only">Close</span>
        </button>

        <!-- HEADER FIJO -->
        <div class="flex-shrink-0 px-6 pt-6 pb-4 border-b border-gray-200">
            <div class="flex flex-col gap-1 text-center sm:text-left">
                <h2 id="view_modal_title" class="font-bold text-xl text-gray-900 flex items-center gap-2" style="line-height: 2.7">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind w-5 h-5 text-blue-600"><path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path><path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path><path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path></svg>
                    Detalles Completos del Aire Acondicionado
                </h2>
                <p id="view_ac_subtitle" class="text-sm text-gray-500">
                    <!-- Javascript populates this -->
                </p>
            </div>
        </div>

        <!-- BODY CON SCROLL -->
        <div class="flex-1 overflow-y-auto px-6 py-4">
                <!-- TABS HEADER -->
                <div dir="ltr" data-orientation="horizontal" data-slot="tabs" class="flex flex-col gap-2 w-full">
                <div role="tablist" aria-orientation="horizontal" data-slot="tabs-list" class="bg-gray-100/80 text-gray-500 h-10 items-center justify-center rounded-lg p-1 grid w-full grid-cols-2 mb-6 border border-gray-100" tabindex="0" data-orientation="horizontal" style="outline: none;">
                    <button type="button" role="tab" aria-selected="true" data-state="active" id="tab-trigger-general" onclick="switchTab('general')" class="bg-blue-600 text-white font-bold shadow-sm inline-flex h-full flex-1 items-center justify-center gap-2 rounded-md transition-all focus-visible:ring-2 focus-visible:ring-blue-500/50 disabled:pointer-events-none disabled:opacity-50 text-sm font-medium hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                        Información General
                    </button>
                    <button type="button" role="tab" aria-selected="false" data-state="inactive" id="tab-trigger-tecnica" onclick="switchTab('tecnica')" class="inline-flex h-full flex-1 items-center justify-center gap-2 rounded-md transition-all focus-visible:ring-2 focus-visible:ring-blue-500/50 disabled:pointer-events-none disabled:opacity-50 text-sm font-medium hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-cpu"><rect width="16" height="16" x="4" y="4" rx="2"/><rect width="6" height="6" x="9" y="9" rx="1"/><path d="M15 2v2"/><path d="M15 20v2"/><path d="M2 15h2"/><path d="M2 9h2"/><path d="M20 15h2"/><path d="M20 9h2"/><path d="M9 2v2"/><path d="M9 20v2"/></svg>
                        Datos Técnicos
                    </button>
                </div>

                <!-- TAB CONTENT: GENERAL -->
                <div data-state="active" data-orientation="horizontal" role="tabpanel" id="tab-content-general" tabindex="0" data-slot="tabs-content" class="flex-1 outline-none space-y-4 block">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-3 rounded">
                            <p class="text-xs text-gray-500 mb-1">Código de BN</p>
                            <p id="view_codigo" class="font-medium text-sm"></p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded">
                            <p class="text-xs text-gray-500 mb-1">Estado</p>
                            <div id="view_estado_container">
                                <!-- JS will inject badge here -->
                            </div>
                        </div>
                        <!-- {{-- <div class="bg-gray-50 p-3 rounded">
                            <p class="text-xs text-gray-500 mb-1">Marca</p>
                            <p id="view_marca" class="font-medium text-sm"></p>
                        </div> --}} -->
                        <div class="bg-gray-50 p-3 rounded">
                            <p class="text-xs text-gray-500 mb-1">Modelo</p>
                            <p id="view_modelo" class="font-medium text-sm"></p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded">
                            <p class="text-xs text-gray-500 mb-1">Fecha de creación</p>
                            <p id="view_creacion" class="font-medium text-sm"></p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded">
                            <p class="text-xs text-gray-500 mb-1">Fecha de Actualización</p>
                            <p id="view_actualizacion" class="font-medium text-sm"></p>
                        </div>
                        <!-- {{-- <div class="bg-gray-50 p-3 rounded">
                            <p class="text-xs text-gray-500 mb-1">Fecha de Instalación</p>
                            <p id="view_fecha_instalacion" class="font-medium text-sm"></p>
                        </div> --}}
                        {{-- <div class="bg-gray-50 p-3 rounded">
                            <p class="text-xs text-gray-500 mb-1">Horas de Uso</p>
                            <p id="view_horas_uso" class="font-medium text-sm"></p>
                        </div> --}}
                        {{-- <div class="bg-emerald-50 p-3 rounded border border-emerald-200">
                            <p class="text-xs text-gray-500 mb-1">Último Mantenimiento</p>
                            <p id="view_ultimo_mant" class="font-medium text-sm"></p>
                        </div> --}}
                        {{-- <div class="bg-emerald-50 p-3 rounded border border-emerald-200">
                            <p class="text-xs text-gray-500 mb-1">Próximo Mantenimiento</p>
                            <p id="view_proximo_mant" class="font-medium text-sm"></p>
                        </div> --}} -->
                        <!-- {{-- <div class="bg-gray-50 p-3 rounded col-span-1 sm:col-span-2">
                            <p class="text-xs text-gray-500 mb-1">Responsable</p>
                            <p id="view_responsable" class="font-medium text-sm"></p>
                        </div> --}} -->
                        <div class="bg-yellow-50 p-3 rounded col-span-1 sm:col-span-2 border border-yellow-200">
                            <p class="text-xs text-gray-500 mb-1">Observaciones</p>
                            <p id="view_observaciones" class="font-medium text-sm"></p>
                        </div>
                    </div>
                </div>

                <!-- TAB CONTENT: TÉCNICA -->
                <div data-state="inactive" data-orientation="horizontal" role="tabpanel" id="tab-content-tecnica" tabindex="0" data-slot="tabs-content" class="flex-1 outline-none space-y-4 hidden">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-3 rounded">
                            <p class="text-xs text-gray-500 mb-1">Capacidad</p>
                            <p id="view_capacidad" class="font-medium text-sm"></p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded">
                            <p class="text-xs text-gray-500 mb-1">Voltaje</p>
                            <p id="view_voltaje" class="font-medium text-sm"></p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded">
                            <p class="text-xs text-gray-500 mb-1">Refrigerante</p>
                            <p id="view_refrigerante" class="font-medium text-sm"></p>
                        </div>
                        <!-- <div class="bg-gray-50 p-3 rounded">
                            <p class="text-xs text-gray-500 mb-1"></p>
                            <p id="view_consumo" class="font-medium text-sm"></p>
                        </div> -->
                        <div class="bg-gray-50 p-3 rounded">
                            <p class="text-xs text-gray-500 mb-1">Presion Alta</p>
                            <p id="view_presionA" class="font-medium text-sm"></p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded">
                            <p class="text-xs text-gray-500 mb-1">Presion Baja</p>
                            <p id="view_presionB" class="font-medium text-sm"></p>
                        </div>
                        <!-- <div class="bg-blue-50 p-3 rounded col-span-1 sm:col-span-2 border border-blue-200">
                            <p class="text-xs text-gray-500 mb-1">Ubicación</p>
                            <p id="view_ubicacion" class="font-medium text-sm"></p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- FOOTER FIJO -->
        <div class="flex-shrink-0 rounded-xl px-6 py-4 border-t border-gray-200 bg-gray-50">
            <div class="flex flex-col gap-3">
                <div class="flex flex-wrap justify-center gap-3">
                    <button id="view_btn_edit" onclick="" class="cursor-pointer inline-flex items-center justify-center gap-2 rounded-md font-semibold transition-all text-white h-auto py-2 px-4 bg-blue-600 hover:bg-blue-700 hover:shadow-md text-sm shadow-sm ring-1 ring-blue-700/10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"></path></svg>
                        Editar
                    </button>
                    <!-- Visual buttons -->
                     <button id="view_btn_materials" class="inline-flex items-center justify-center gap-2 rounded-md font-semibold transition-all text-white h-auto py-2 px-3 bg-emerald-600 hover:bg-emerald-700 hover:shadow-md text-sm shadow-sm ring-1 ring-emerald-700/10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-plus"><path d="M8 2v4"></path><path d="M16 2v4"></path><path d="M21 13V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8"></path><path d="M3 10h18"></path><path d="M16 19h6"></path><path d="M19 16v6"></path></svg>
                        Materiales Faltantes
                    </button>
                    <!-- <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md font-semibold transition-all text-white h-10 px-4 bg-amber-600 hover:bg-amber-700 hover:shadow-md text-sm shadow-sm ring-1 ring-amber-700/10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
                        Agendar Reparación
                    </button> -->
                    <button id="view_btn_history" class="cursor-pointer inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md font-semibold transition-all border bg-white text-gray-700 border-gray-300 hover:bg-gray-50 hover:border-gray-400 h-10 px-3 text-sm shadow-sm ring-1 ring-gray-200/50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-history w-4 h-4 mr-2"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><path d="M3 3v5h5"></path><path d="M12 7v5l4 2"></path></svg>
                        Ver Historial
                    </button>
                </div>
                <div class="flex justify-end pt-3 border-t border-gray-200 mt-2">
                    <button type="button" data-modal-close class="btn-color-red cursor-pointer inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md font-semibold transition-all border bg-white text-gray-700 hover:bg-gray-50 hover:text-red-600 hover:border-red-200 h-10 px-6 text-sm shadow-sm ring-1 ring-gray-200">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function switchTab(tabId) {
        // Triggers
        const generalTrigger = document.getElementById('tab-trigger-general');
        const tecnicaTrigger = document.getElementById('tab-trigger-tecnica');
        
        // Contents
        const generalContent = document.getElementById('tab-content-general');
        const tecnicaContent = document.getElementById('tab-content-tecnica');

        if (tabId === 'general') {
            generalTrigger.setAttribute('data-state', 'active');
            generalTrigger.setAttribute('aria-selected', 'true');
            // Force classes for General
            generalTrigger.classList.add('bg-blue-600', 'text-white');
            generalTrigger.classList.remove('bg-white', 'text-blue-700');
            
            tecnicaTrigger.setAttribute('data-state', 'inactive');
            tecnicaTrigger.setAttribute('aria-selected', 'false');
            // Reset classes for Tecnica
            tecnicaTrigger.classList.remove('bg-blue-600', 'text-white');
            // Note: Use transparent or default if inactive, or add hover styles back if needed
             
            generalContent.classList.remove('hidden');
            generalContent.classList.add('block');
            tecnicaContent.classList.remove('block');
            tecnicaContent.classList.add('hidden');
        } else {
            tecnicaTrigger.setAttribute('data-state', 'active');
            tecnicaTrigger.setAttribute('aria-selected', 'true');
             // Force classes for Tecnica
            tecnicaTrigger.classList.add('bg-blue-600', 'text-white');
            tecnicaTrigger.classList.remove('bg-white', 'text-blue-700');

            generalTrigger.setAttribute('data-state', 'inactive');
            generalTrigger.setAttribute('aria-selected', 'false');
            // Reset classes for General
            generalTrigger.classList.remove('bg-blue-600', 'text-white');

            tecnicaContent.classList.remove('hidden');
            tecnicaContent.classList.add('block');
            generalContent.classList.remove('block');
            generalContent.classList.add('hidden');
        }
    }
</script>
