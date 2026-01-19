<div id="modalAddBien" class="fixed inset-0 z-[99999] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="z-index: 99999;">
    <!-- Overlay Background -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity z-[99998]" onclick="closeRegistModal()" style="z-index: 99998; background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(4px);"></div>

    <div role="dialog" id="radix-:regist-modal:" 
        class="bg-white fixed top-[50%] left-[50%] z-[100000] grid w-full translate-x-[-50%] translate-y-[-50%] gap-4 rounded-xl border p-6 shadow-2xl duration-200 sm:max-w-lg max-h-[90vh] overflow-y-auto" 
        tabindex="-1" style="pointer-events: auto; z-index: 100000;">

        <!-- Header -->
        <div class="flex flex-col gap-2 text-center sm:text-left mb-2">
            <h2 class="font-semibold text-xl text-gray-900 flex items-center gap-2">
                <div class="p-2 bg-blue-50 rounded-full text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-circle"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                </div>
                Agregar Nuevo Bien Nacional
            </h2>
            <p class="text-sm text-gray-500">
                Complete la información detallada para registrar el activo en el sistema.
            </p>
        </div>

        <form id="formAddBien" action="{{ route('bienes-nacionales.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                
                <!-- Numero BN -->
                <div class="space-y-2">
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-gray-700" for="numeroBN">
                        Número de Bien Nacional (#BN) <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="numeroBN" name="numero_bn" required placeholder="BN-2026-0000"
                        class="flex h-10 w-full rounded-md border border-gray-300 shadow-sm bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                </div>

                <!-- Nombre -->
                <div class="space-y-2">
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-gray-700" for="nombreBien">
                        Nombre del Bien <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nombreBien" name="nombre" required placeholder="Ej: Computadora Dell Optiplex"
                        class="flex h-10 w-full rounded-md border border-gray-300 shadow-sm bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                </div>

                <!-- Marca -->
                <div class="space-y-2">
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-gray-700" for="marcaBien">
                        Marca
                    </label>
                    <input type="text" id="marcaBien" name="marca" placeholder="Ingrese la marca"
                        class="flex h-10 w-full rounded-md border border-gray-300 shadow-sm bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                </div>

                <!-- Modelo -->
                <div class="space-y-2">
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-gray-700" for="modeloBien">
                        Modelo
                    </label>
                    <input type="text" id="modeloBien" name="modelo" placeholder="Ingrese el modelo"
                        class="flex h-10 w-full rounded-md border border-gray-300 shadow-sm bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                </div>

                <!-- Serial -->
                <div class="space-y-2 lg:col-span-2">
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-gray-700" for="serialBien">
                        Serial
                    </label>
                    <input type="text" id="serialBien" name="serial" placeholder="Ingrese el serial del dispositivo"
                        class="flex h-10 w-full rounded-md border border-gray-300 shadow-sm bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                </div>

                <!-- Ubicacion -->
                <div class="space-y-2">
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-gray-700" for="ubicacionBien">
                        Ubicación <span class="text-red-500">*</span>
                    </label>
                    <select id="ubicacionBien" name="area_id" required
                        class="flex h-10 w-full rounded-md border border-gray-300 shadow-sm bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                        <option value="">Seleccione una Ubicación</option>
                        @foreach ($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->descripcion }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Categoria -->
                <div class="space-y-2">
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-gray-700" for="categoriaBien">
                        Categoría <span class="text-red-500">*</span>
                    </label>
                    <select id="categoriaBien" name="categoria_id" required
                        class="flex h-10 w-full rounded-md border border-gray-300 shadow-sm bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                        <option value="">Seleccione una Categoría</option>
                        @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->tipo }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Estado -->
                <div class="space-y-2 lg:col-span-2">
                    <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-gray-700" for="estadoBien">
                        Estado <span class="text-red-500">*</span>
                    </label>
                    <select id="estadoBien" name="estado" required
                        class="flex h-10 w-full rounded-md border border-gray-300 shadow-sm bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                        <option value="Operativo">Operativo</option>
                        <option value="Dañado">Dañado</option>
                        <option value="En reparación">En reparación</option>
                        <option value="Desincorporado">Desincorporado</option>
                    </select>
                </div>

            </div>

            <!-- Footer -->
            <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 mt-8 pt-4 border-t">
                <button type="button" data-modal-cancel
                    class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-gray-300 shadow-sm bg-background hover:text-red-600 hover:border-red-500 hover:scale-[1.02] active:scale-[0.98] h-10 px-4 py-2 w-full sm:w-auto" style="hover:text-red-600 hover:border-red-500 hover:scale-[1.02] active:scale-[0.98]">
                    Cancelar
                </button>
                <button type="submit"
                    class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-blue-600 text-white hover:bg-blue-700 hover:scale-[1.02] active:scale-[0.98] h-10 px-4 py-2 w-full sm:w-auto shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M19 21v-8a2 2 0 0 0-2-2H9.172a2 2 0 0 0-1.414.586l-2.828 2.828A2 2 0 0 0 4.343 14H2v7a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2zm-5-9V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v8"/></svg>
                    Guardar Bien
                </button>
            </div>
        </form>

        <button data-modal-close type="button" class="cursor-pointer absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-all hover:opacity-100 hover:text-red-600 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none data-[state=open]:bg-accent data-[state=open]:text-muted-foreground p-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-4 w-4"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            <span class="sr-only">Close</span>
        </button>
    </div>
</div>
