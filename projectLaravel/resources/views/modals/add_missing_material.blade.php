<style>
    .btn-color-red:hover {
        border-color: #dc2626 !important; /* rojo (tailwind red-600) */
        color: #dc2626 !important;
        background-color: transparent !important;
    }
</style>
<!-- Add Missing Material Modal -->
<div id="addMaterialModal" class="fixed inset-0 z-[100001] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="z-index: 100001;">
    <!-- Overlay Background -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity z-[100000]" data-modal-cancel style="z-index: 100000; background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(4px);"></div>

    <!-- Modal Content -->
    <div role="dialog" id="addMaterialContent" 
         class="bg-white fixed top-[50%] left-[50%] z-[100002] flex flex-col translate-x-[-50%] translate-y-[-50%] rounded-xl border shadow-2xl duration-200 sm:max-w-lg w-[95vw] max-h-[90vh]" 
         tabindex="-1" style="pointer-events: auto; z-index: 100002;">
         
        <!-- Close Button (X) -->
        <button type="button" data-modal-close class="btn-color-red cursor-pointer absolute right-4 top-4 rounded-sm opacity-70 transition-opacity hover:opacity-100 focus:outline-none disabled:pointer-events-none p-1 hover:bg-gray-100 hover:text-red-500 z-50">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-5 w-5"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            <span class="sr-only">Close</span>
        </button>

        <!-- HEADER FIJO -->
        <div class="flex-shrink-0 px-6 pt-6 pb-4 border-b border-gray-200">
            <div class="flex flex-col gap-1 text-center sm:text-left">
                <h2 class="font-bold text-xl text-gray-900 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-circle w-5 h-5 text-blue-600"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                    Agregar Material Faltante
                </h2>
                <p id="add_material_subtitle" class="text-sm text-gray-500">
                    <!-- Populated by JS -->
                </p>
            </div>
        </div>

        <!-- BODY CON SCROLL -->
        <div class="flex-1 overflow-y-auto px-6 py-4">
            <form id="formAddMaterial" action="#" method="POST"> <!-- Action set by JS or handled via AJAX -->
                <input type="hidden" name="aire_id" id="add_material_aire_id">
                
                <div class="space-y-4">
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold uppercase text-gray-700" for="nombre_material">Nombre del Material <span class="text-red-500">*</span></label>
                        <input name="nombre_material" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all" id="nombre_material" placeholder="Ej: Compresor, Tubería de cobre..." required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold uppercase text-gray-700" for="cantidad">Cantidad <span class="text-red-500">*</span></label>
                            <input type="number" name="cantidad" class="flex h-9 w-full rounded-md border border-gray-300 bg-white px-3 py-1 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all" id="cantidad" placeholder="1" min="1" required>
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold uppercase text-gray-700" for="prioridad">Prioridad</label>
                            <select name="prioridad" id="prioridad" class="flex h-9 w-full appearance-none rounded-md border border-gray-300 bg-white px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                                <option value="Alta">Alta</option>
                                <option value="Media">Media</option>
                                <option value="Baja">Baja</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold uppercase text-gray-700" for="estado_material">Estado</label>
                        <select name="estado" id="estado_material" class="flex h-9 w-full appearance-none rounded-md border border-gray-300 bg-white px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                            <option value="Pendiente">Pendiente</option>
                            <option value="No Encontrado">No Encontrado</option>
                            <option value="Solicitado">Solicitado</option>
                        </select>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold uppercase text-gray-700" for="observaciones">Observaciones</label>
                        <textarea name="observaciones" class="flex w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all min-h-[80px]" id="observaciones" placeholder="Detalles adicionales..."></textarea>
                    </div>
                </div>
            </form>
        </div>

        <!-- FOOTER FIJO -->
        <div class="flex-shrink-0 rounded-xl px-6 py-4 border-t border-gray-200 bg-gray-50">
             <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
                <button type="button" data-modal-close class="btn-color-red w-full sm:w-auto inline-flex justify-center items-center rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 ">
                    Cancelar
                </button>
                <button type="submit" form="formAddMaterial" class="w-full sm:w-auto inline-flex justify-center items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 hover:shadow-md transition-all">
                    Guardar Material
                </button>
            </div>
        </div>
    </div>
</div>
