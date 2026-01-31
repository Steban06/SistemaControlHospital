<div id="modalViewDetails" class="fixed inset-0 z-[99999] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="z-index: 99999;">
    <!-- Overlay Background -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity z-[99998]" onclick="closeViewModal()" style="z-index: 99998; background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(4px);"></div>

    <!-- Modal Content -->
    <div role="dialog" id="viewMaintenanceContent" 
         class="bg-white fixed top-[50%] left-[50%] z-[100000] flex flex-col translate-x-[-50%] translate-y-[-50%] rounded-xl border shadow-2xl duration-200 sm:max-w-lg max-w-4xl w-[95vw] max-h-[90vh]" 
         tabindex="-1" style="pointer-events: auto; z-index: 100000;">
         
        <!-- Close Button (X) -->
        <button type="button" onclick="closeViewModal()" class="cursor-pointer absolute right-4 top-4 rounded-sm opacity-70 transition-opacity hover:opacity-100 focus:outline-none disabled:pointer-events-none p-1 hover:bg-gray-100 hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-5 w-5"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            <span class="sr-only">Close</span>
        </button>

        <!-- HEADER FIJO -->
        <div class="flex-shrink-0 px-6 pt-6 pb-4 border-b border-gray-200">
            <div class="flex flex-col gap-1 text-center sm:text-left">
                <h2 id="view_modal_title" class="font-bold text-xl text-gray-900 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-5 h-5 text-blue-600"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path><path d="M14 2v4a2 2 0 0 0 2 2h4"></path><path d="M10 9H8"></path><path d="M16 13H8"></path><path d="M16 17H8"></path></svg>
                    Detalles del Mantenimiento
                </h2>
                <p class="text-sm text-gray-500">
                    Información completa del registro
                </p>
            </div>
        </div>

        <!-- BODY CON SCROLL -->
        <div class="flex-1 overflow-y-auto px-6 py-4">
            <div class="space-y-4">
                <!-- Info Card -->
                <div data-slot="card" class="text-card-foreground flex flex-col gap-6 rounded-xl border bg-blue-50 border-blue-200">
                    <div data-slot="card-content" class="[&:last-child]:pb-6 p-4">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package w-4 h-4 text-white"><path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"></path><path d="M12 22V12"></path><polyline points="3.29 7 12 12 20.71 7"></polyline><path d="m7.5 4.27 9 5.15"></path></svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-xs text-blue-600 font-semibold mb-1">BIEN NACIONAL</p>
                                <p class="font-mono text-sm font-medium">BN-2024-0001</p>
                                <p class="text-sm font-semibold mt-1">Computadora Dell OptiPlex 7090</p>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <span class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 border-transparent bg-blue-500 text-white text-xs">Preventivo</span>
                            <span class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 bg-emerald-100 text-emerald-700 border-emerald-300 flex items-center gap-1 w-fit text-xs">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                Operativo
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Grid Details -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <p class="text-xs text-gray-500 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg>
                            Fecha de Realización
                        </p>
                        <p class="font-medium">19/1/2026</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-xs text-gray-500 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            Técnico Responsable
                        </p>
                        <p class="font-medium">Juan Pérez</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-xs text-gray-500">Tiempo Invertido</p>
                        <p class="font-semibold text-gray-900 text-lg">1h 30m</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-xs text-gray-500 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-camera"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"></path><circle cx="12" cy="13" r="3"></circle></svg>
                            Fotos Adjuntas
                        </p>
                        <p class="font-medium">3 archivos</p>
                    </div>
                </div>

                <div class="h-px bg-gray-200"></div>

                <!-- Trabajo Realizado -->
                <div class="space-y-2">
                    <h4 class="font-semibold text-sm flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench text-blue-600"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
                        Trabajo Realizado
                    </h4>
                    <div class="text-card-foreground flex flex-col gap-6 rounded-xl border bg-gray-50">
                        <div class="p-4">
                            <p class="text-sm text-gray-700 whitespace-pre-line">Se realizó limpieza interna del equipo, actualización del sistema operativo de Windows 10 a Windows 11, y optimización de programas de inicio.</p>
                        </div>
                    </div>
                </div>

                <!-- Partes y Repuestos -->
                <div class="space-y-2">
                    <h4 class="font-semibold text-sm flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-settings text-blue-600"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        Partes y Repuestos Reemplazados
                    </h4>
                    <div class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border">
                        <div class="p-4">
                            <ul class="space-y-2">
                                <li class="flex items-center gap-2 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big text-emerald-600 flex-shrink-0"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                    <span>Pasta térmica</span>
                                </li>
                                <li class="flex items-center gap-2 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big text-emerald-600 flex-shrink-0"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                    <span>Ventilador interno</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Observaciones -->
                <div class="space-y-2">
                    <h4 class="font-semibold text-sm flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text text-blue-600"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path><path d="M14 2v4a2 2 0 0 0 2 2h4"></path><path d="M10 9H8"></path><path d="M16 13H8"></path><path d="M16 17H8"></path></svg>
                        Observaciones y Recomendaciones
                    </h4>
                    <div class="text-card-foreground flex flex-col gap-6 rounded-xl border bg-amber-50 border-amber-200">
                        <div class="p-4">
                            <p class="text-sm text-gray-700">Equipo funcionando correctamente. Se recomienda nuevo mantenimiento en 6 meses.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FOOTER FIJO -->
        <div class="flex-shrink-0 rounded-xl px-6 py-4 border-t border-gray-200 bg-gray-50 text-right">
             <button type="button" onclick="closeViewModal()" class="cursor-pointer inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md font-semibold transition-all border bg-white text-gray-700 hover:bg-gray-50 hover:text-red-600 hover:border-red-200 h-10 px-6 text-sm shadow-sm ring-1 ring-gray-200">
                Cerrar
            </button>
        </div>
    </div>
</div>
