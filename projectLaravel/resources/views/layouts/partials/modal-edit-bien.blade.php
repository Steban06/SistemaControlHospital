<style>
    .modal-close_btn:hover{
        cursor: pointer;
        border-color: #dc2626 !important;;
        background-color: transparent !important;
        color: #dc2626 !important;
    }
</style>

<div id="editModalOverlay" class="fixed inset-0 z-[99999] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="z-index: 99999;">
    <!-- Overlay Background -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity z-[99998]" onclick="closeEditModal()" style="z-index: 99998; background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(4px);"></div>

    <div role="dialog" id="radix-:edit-modal:" 
        class="bg-white fixed top-[50%] left-[50%] z-[100000] grid w-full translate-x-[-50%] translate-y-[-50%] gap-4 rounded-xl border p-6 shadow-2xl duration-200 sm:max-w-lg max-h-[90vh] overflow-y-auto overflow-x-hidden" 
        tabindex="-1" style="pointer-events: auto; z-index: 100000;" onclick="event.stopPropagation()">

        <!-- Header -->
        <div class="flex flex-col gap-2 text-center sm:text-left mb-2">
            <h2 class="font-semibold text-xl text-gray-900 flex items-center gap-2">
                <div class="p-2 bg-blue-50 rounded-full text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                </div>
                Editar Bien Nacional
            </h2>
            <p class="text-sm text-gray-500">
                Modifique los detalles del bien. Haga clic en actualizar cuando termine.
            </p>
        </div>

        <form class="py-4" onsubmit="event.preventDefault(); closeEditModal();">
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                
                <!-- Código (Read-only) -->
                <div class="space-y-2">
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-gray-700" for="edit-codigo">
                        Código
                    </label>
                    <input type="text" id="edit-codigo" value="BN-2024-0001" readonly
                        class="flex h-10 w-full rounded-md border border-gray-300 shadow-sm bg-slate-50 px-3 py-2 text-sm font-mono text-gray-500 ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                </div>

                <!-- Nombre -->
                <div class="space-y-2">
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-gray-700" for="edit-nombre">
                        Nombre del Bien
                    </label>
                    <input type="text" id="edit-nombre" value="Computadora Dell OptiPlex 7090"
                        class="flex h-10 w-full rounded-md border border-gray-300 shadow-sm bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                </div>

                <!-- Categoría -->
                <div class="space-y-2">
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-gray-700" for="edit-categoria">
                        Categoría
                    </label>
                    <select id="edit-categoria"
                        class="flex h-10 w-full rounded-md border border-gray-300 shadow-sm bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                        <option value="tecnologia" selected>Tecnología</option>
                        <option value="mobiliario">Mobiliario</option>
                        <option value="medico">Equipo Médico</option>
                        <option value="vehiculo">Vehículos</option>
                    </select>
                </div>

                <!-- Ubicación -->
                <div class="space-y-2">
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-gray-700" for="edit-departamento">
                        Ubicación
                    </label>
                    <select id="edit-departamento"
                        class="flex h-10 w-full rounded-md border border-gray-300 shadow-sm bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                        <option value="admin" selected>Administración</option>
                        <option value="uci">UCI</option>
                        <option value="urgencias">Urgencias</option>
                        <option value="rrhh">Recursos Humanos</option>
                    </select>
                </div>

                <!-- Estado -->
                <div class="space-y-2">
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-gray-700" for="edit-estado">
                        Estado
                    </label>
                    <select id="edit-estado"
                        class="flex h-10 w-full rounded-md border border-gray-300 shadow-sm bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                        <option value="operativo" selected>Operativo</option>
                        <option value="mantenimiento">En Mantenimiento</option>
                        <option value="danado">Dañado</option>
                        <option value="desincorporado">Desincorporado</option>
                    </select>
                </div>

                <!-- Valor -->
                <div class="space-y-2">
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-gray-700" for="edit-valor">
                        Valor ($)
                    </label>
                    <input type="number" id="edit-valor" value="850"
                        class="flex h-10 w-full rounded-md border border-gray-300 shadow-sm bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                </div>
                
                <!-- Info Box -->
                <div class="col-span-1 lg:col-span-2 mt-2">
                     <div class="bg-blue-50 p-3 rounded-md text-xs text-blue-700 border border-blue-100 flex gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info shrink-0 mt-0.5"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                        <p>Las ediciones se registrarán en el historial de auditoría automáticamente.</p>
                     </div>
                </div>

            </div>

            <!-- Footer -->
            <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 mt-8 pt-4 border-t">
                <button type="button" onclick="closeEditModal()"
                    class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-gray-300 shadow-sm bg-background hover:text-red-600 hover:border-red-500 h-10 px-4 py-2 w-full sm:w-auto modal-close_btn">
                    Cancelar
                </button>
                <button type="submit"
                    class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-blue-600 text-white hover:bg-blue-700 h-10 px-4 py-2 w-full sm:w-auto shadow-sm">
                    Actualizar Bien
                </button>
            </div>
        </form>
        
        <button onclick="closeEditModal()" type="button" class="cursor-pointer absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-all hover:opacity-100 hover:text-red-600 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none data-[state=open]:bg-accent data-[state=open]:text-muted-foreground p-1 modal-close_btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-4 w-4"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            <span class="sr-only">Close</span>
        </button>
    </div>
</div>


