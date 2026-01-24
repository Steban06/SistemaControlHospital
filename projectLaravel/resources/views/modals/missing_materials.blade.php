<style>
    .btn-color-red:hover {
        border-color: #dc2626 !important; /* rojo (tailwind red-600) */
        color: #dc2626 !important;
        background-color: transparent !important;
    }
</style>
<!-- Missing Materials Modal -->
<div id="missingMaterialsModal" class="fixed inset-0 z-[99999] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="z-index: 99999;">
    <!-- Overlay Background -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity z-[99998]" data-modal-cancel style="z-index: 99998; background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(4px);"></div>

    <!-- Modal Content -->
    <div role="dialog" id="missingMaterialsContent" 
         class="bg-white fixed top-[50%] left-[50%] z-[100000] flex flex-col translate-x-[-50%] translate-y-[-50%] rounded-xl border shadow-2xl duration-200 sm:max-w-3xl w-[95vw] max-h-[90vh]" 
         tabindex="-1" style="pointer-events: auto; z-index: 100000;">
         
        <!-- Close Button (X) -->
        <button type="button" data-modal-close class="btn-color-red cursor-pointer absolute right-4 top-4 rounded-sm opacity-70 transition-opacity hover:opacity-100 focus:outline-none disabled:pointer-events-none p-1 hover:bg-gray-100 hover:text-red-500 z-50">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-5 w-5"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            <span class="sr-only">Close</span>
        </button>

        <!-- HEADER FIJO -->
        <div class="flex-shrink-0 px-6 pt-6 pb-4 border-b border-gray-200">
            <div class="flex flex-col gap-2 text-center sm:text-left">
                <h2 class="font-bold text-xl text-gray-900 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package-x w-5 h-5 text-red-600"><path d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"></path><path d="m7.5 4.27 9 5.15"></path><polyline points="3.29 7 12 12.01 20.71 7"></polyline><line x1="12" x2="12" y1="22.76" y2="12.01"></line><path d="m17 13 5 5m-5 0 5-5"/></svg>
                    Materiales Faltantes
                </h2>
                <p id="missing_materials_subtitle" class="text-sm text-gray-500">
                    <!-- Populated by JS -->
                </p>
            </div>
        </div>

        <!-- BODY CON SCROLL -->
        <div class="flex-1 overflow-y-auto px-6 py-4">
            <!-- Toolbar -->
            <div class="flex flex-col sm:flex-row justify-between gap-3 mb-4">
                <div class="relative sm:w-60" style="width: 240px;">
                    <input type="text" id="searchMaterialsInput" placeholder="Buscar material..." class="flex h-9 w-full rounded-md border border-gray-300 bg-white pl-3 pr-9 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-blue-500 placeholder:text-gray-400">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    </div>
                </div>
                <button id="btnAddMissingMaterial" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-blue-600 text-white shadow hover:bg-blue-700 h-9 px-4 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                    Agregar Material
                </button>
            </div>
            <div class="rounded-md border border-gray-200 overflow-hidden">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50 text-gray-700 font-semibold border-b border-gray-200">
                        <tr>
                            <th class="px-4 py-3">Material</th>
                            <th class="px-4 py-3 w-20 text-center">Cant.</th>
                            <th class="px-4 py-3">Prioridad</th>
                            <th class="px-4 py-3">Estado</th>
                            <th class="px-4 py-3">Observaciones</th>
                            <th class="px-4 py-3 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="missing_materials_table_body" class="divide-y divide-gray-100">
                        <!-- Example Row (will be replaced by JS) -->
                        <tr>
                            <td class="px-4 py-3 font-medium text-gray-900">Compresor 15TON</td>
                            <td class="px-4 py-3 text-center">1</td>
                            <td class="px-4 py-3"><span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Alta</span></td>
                            <td class="px-4 py-3 text-gray-500">Pendiente</td>
                            <td class="px-4 py-3 text-gray-500">Solicitado a compras</td>
                            <td class="px-4 py-3 text-center">
                                <button class="cursor-pointer inline-flex items-center justify-center gap-1 rounded-md border border-emerald-200 bg-emerald-50 px-2 py-1 text-xs font-medium text-emerald-700 hover:bg-emerald-100 transition-colors" title="Marcar como solucionado">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
                                    Solucionado
                                </button>
                            </td>
                        </tr>
                        <!-- Example Row 2 -->
                        <tr class="bg-gray-50/50">
                            <td class="px-4 py-3 font-medium text-gray-900">Capacitor 45uF</td>
                            <td class="px-4 py-3 text-center">2</td>
                            <td class="px-4 py-3"><span class="inline-flex items-center rounded-md bg-amber-50 px-2 py-1 text-xs font-medium text-amber-700 ring-1 ring-inset ring-amber-600/20">Media</span></td>
                            <td class="px-4 py-3 text-gray-500">No Encontrado</td>
                            <td class="px-4 py-3 text-gray-500">Sin stock en almacén</td>
                            <td class="px-4 py-3 text-center">
                                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-emerald-200 bg-emerald-50 shadow-sm hover:bg-emerald-100 h-8 w-8 text-emerald-600" title="Marcar como encontrado/solucionado">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination Controls (Bienes Style) -->
            <!-- Pagination Controls (Bienes JS Style Recreated) -->
            <div class="flex items-center justify-between border-t border-gray-200 bg-white px-1 py-4">
                <div class="flex flex-1 justify-between sm:hidden">
                    <p class="text-sm text-gray-500">
                        Mostrando <span class="font-bold text-gray-900">1</span> a <span class="font-bold text-gray-900">2</span> de <span class="font-bold text-gray-900">2</span> resultados
                    </p>    
                <!-- <button class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Anterior</button>
                    <button class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Siguiente</button> -->
                </div>
                <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between items-center gap-4">
                    <div>
                        <!-- <p class="text-sm text-gray-500">
                            Mostrando <span class="font-bold text-gray-900">1</span> a <span class="font-bold text-gray-900">2</span> de <span class="font-bold text-gray-900">2</span> resultados
                        </p> -->
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <span>Mostrar</span>
                            <select class="border border-gray-300 rounded px-2 py-1 text-xs bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent cursor-pointer h-8">
                                <option>5</option>
                                <option>10</option>
                            </select>
                            <span>filas</span>
                        </div>
                        
                        <div class="inline-flex items-center gap-1">
                            <!-- Prev Button -->
                            <button class="p-2 rounded-md border border-gray-200 bg-white hover:bg-gray-50 text-gray-600 disabled opacity-50 cursor-not-allowed">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
                            </button>
                            
                            <!-- Page 1 (Active) -->
                            <button class="w-8 h-8 flex items-center justify-center rounded-md cursor-pointer transition-colors bg-blue-600 text-white font-medium shadow-sm border border-blue-600 hover:bg-blue-700">1</button>
                            
                            <!-- Next Button -->
                            <button class="p-2 rounded-md border border-gray-200 bg-white hover:bg-gray-50 text-gray-600 disabled opacity-50 cursor-not-allowed">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="no_materials_message" class="hidden text-center py-8 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle w-8 h-8 mx-auto text-green-500 mb-2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                <p>No se registran materiales faltantes para este equipo.</p>
            </div>
        </div>

        <!-- FOOTER FIJO -->
        <div class="flex-shrink-0 rounded-xl px-6 py-4 border-t border-gray-200 bg-gray-50">
             <div class="flex flex-col-reverse gap-2 sm:flex-row sm:justify-end">
                <button type="button" data-modal-close class="btn-color-red inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md font-medium transition-all bg-white text-gray-700 hover:bg-gray-50 border border-gray-300 shadow-sm h-9 px-4 py-2 text-sm">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
