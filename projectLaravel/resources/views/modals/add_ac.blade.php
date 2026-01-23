<style>
    .btn-color-red:hover {
        border-color: #dc2626 !important; /* rojo (tailwind red-600) */
        color: #dc2626 !important;
        background-color: transparent !important;
    }
</style>
<!-- Add AC Modal -->
<div id="addACModal" class="fixed inset-0 z-[99999] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="z-index: 99999;">
    <!-- Overlay Background -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity z-[99998]" data-modal-cancel style="z-index: 99998; background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(4px);"></div>

    <!-- Modal Container con Flexbox -->
    <div role="dialog" id="radix-:add-ac-modal:" 
        class="bg-white fixed top-[50%] left-[50%] z-[100000] flex flex-col translate-x-[-50%] translate-y-[-50%] rounded-xl border shadow-2xl duration-200 sm:max-w-5xl w-[95vw] max-h-[90vh]" 
        tabindex="-1" style="pointer-events: auto; z-index: 100000;" onclick="event.stopPropagation()">

        <!-- Close Button (X) - FIJO -->
        <button title="Cerrar modal" data-modal-close type="button" class="cursor-pointer absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-all hover:opacity-100 hover:text-red-600 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none p-1 modal-close_btn z-50 btn-color-red">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-4 w-4"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            <span class="sr-only">Close</span>
        </button>

        <!-- HEADER FIJO -->
        <div class="flex-shrink-0 px-6 pt-6 pb-4 border-b border-gray-200">
            <div class="flex flex-col gap-1 text-center sm:text-left">
                <h2 class="font-bold text-xl text-gray-900 pr-8">Agregar Nuevo Aire Acondicionado</h2>
                <p class="text-sm text-gray-500">Complete la información técnica y administrativa del equipo de climatización.</p>
            </div>
        </div>

        <!-- BODY CON SCROLL -->
        <div class="flex-1 overflow-y-auto px-6 py-4">
            <form id="formAddAC" action="{{ route('aires-acondicionados.store') }}" method="POST">
                @csrf
            
                <!-- Section 1: Identificación del Equipo -->
                <div class="mb-6">
                    <h3 class="text-sm font-bold text-blue-900 uppercase tracking-wide mb-4 flex items-center gap-2">
                        <span class="bg-blue-100 text-blue-900 rounded-full w-6 h-6 flex items-center justify-center text-xs">1</span>
                        Identificación del Equipo
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold uppercase text-gray-700" for="codigo">Código (BN) <span class="text-red-500">*</span></label>
                            <input name="numero_bn" class="flex h-10 w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="codigo" placeholder="Ej: AC-2026-0001" required>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold uppercase text-gray-700" for="nombre">Nombre del equipo <span class="text-red-500">*</span></label>
                            <input name="nombre_aa" class="flex h-10 w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="nombre" placeholder="Ej: Quirofano 1" required>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold uppercase text-gray-700" for="modelo">Modelo</label>
                            <input name="modelo" class="flex h-10 w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="modelo" placeholder="Ej: Split 42QRF024">
                        </div>
                    </div>
                </div>

                <!-- Section 2: Especificaciones Técnicas -->
                <div class="mb-6">
                    <h3 class="text-sm font-bold text-blue-900 uppercase tracking-wide mb-4 flex items-center gap-2">
                        <span class="bg-blue-100 text-blue-900 rounded-full w-6 h-6 flex items-center justify-center text-xs">2</span>
                        Especificaciones Técnicas
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold uppercase text-gray-700" for="capacidad">Capacidad</label>
                            <input name="capacidad" class="flex h-10 w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="capacidad" placeholder="Ej: 24,000 BTU">
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold uppercase text-gray-700" for="voltaje">Voltaje</label>
                            <input name="voltaje" class="flex h-10 w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="voltaje" placeholder="Ej: 220V">
                        </div>

                        {{-- cambiar a input no quedar como select --}}
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold uppercase text-gray-700" for="refrigerante">Refrigerante</label>
                            <input name="refrigerante_tc" class="flex h-10 w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="refrigerante" placeholder="Ej: R410A">
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold uppercase text-gray-700" for="estado">Estado Operativo <span class="text-red-500">*</span></label>
                            <select name="estado" id="estado" class="flex h-10 w-full appearance-none rounded-md border border-gray-300 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" required>
                                <option value="operativo">Operativo</option>
                                <option value="mantenimiento">Mantenimiento</option>
                                <option value="fuera de servicio">Fuera de servicio</option>
                            </select>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold uppercase text-gray-700" for="presionA">Presión de Alta</label>
                            <input name="presion_alta" class="flex h-10 w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="presionA" placeholder="Ej: 4.4 MPa">
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold uppercase text-gray-700" for="presionB">Presión de Baja</label>
                            <input name="presion_baja" class="flex h-10 w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="presionB" placeholder="Ej: 2.6 MPa">
                        </div>
                    </div>
                </div>

                <!-- Section 3: Ubicación y Mantenimiento -->
                <div class="mb-6">
                    <h3 class="text-sm font-bold text-blue-900 uppercase tracking-wide mb-4 flex items-center gap-2">
                        <span class="bg-blue-100 text-blue-900 rounded-full w-6 h-6 flex items-center justify-center text-xs">3</span>
                        Ubicación y Mantenimiento
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold uppercase text-gray-700" for="ubicacion">Ubicación</label>
                            <input name="ubicacion" class="flex h-10 w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 disabled:cursor-not-allowed disabled:opacity-50 transition-all" id="ubicacion" placeholder="Ej: UCI - Piso 3">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- FOOTER FIJO -->
        <div class="flex-shrink-0 px-6 py-4 border-t border-gray-200 bg-gray-50">
            <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
                <button type="button" data-modal-close class="w-full sm:w-auto inline-flex justify-center items-center rounded-md bg-white px-6 py-2.5 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 hover:text-red-600 hover:ring-red-300 transition-all btn-color-red">
                    Cancelar
                </button>
                <button type="submit" form="formAddAC" class="w-full sm:w-auto inline-flex justify-center items-center rounded-md bg-blue-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 hover:shadow-md transition-all">
                    Registrar Equipo
                </button>
            </div>
        </div>
    </div>
</div>

