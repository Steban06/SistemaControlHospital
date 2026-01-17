<!-- Modal Editar Bien -->
<div role="dialog" id="radix-:edit-modal:" aria-describedby="radix-:edit-desc:" aria-labelledby="radix-:edit-title:" data-state="open" data-slot="dialog-content" 
    class="bg-background data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 fixed top-[50%] left-[50%] z-50 grid w-full translate-x-[-50%] translate-y-[-50%] gap-4 rounded-lg border p-6 shadow-lg duration-200 sm:max-w-lg max-w-2xl max-h-[90vh] overflow-y-auto" tabindex="-1" style="pointer-events: auto;">
    
    <div class="flex flex-col space-y-1.5 text-center sm:text-left">
        <h2 id="radix-:edit-title:" class="text-lg font-semibold leading-none tracking-tight flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil w-5 h-5 text-blue-600"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
            Editar Bien
        </h2>
        <p id="radix-:edit-desc:" class="text-xs text-muted-foreground">
            Modifique los detalles del bien. Haga clic en actualizar cuando termine.
        </p>
    </div>

    <form class="grid gap-4 py-4" onsubmit="event.preventDefault(); closeEditModal();">
        
        <!-- Identificación (Read-only ID) -->
        <div class="grid grid-cols-4 items-center gap-4">
            <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-right" for="edit-codigo">
                Código
            </label>
            <input class="flex h-9 w-full rounded-md border border-input bg-slate-50 px-3 py-1 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 col-span-3 font-mono text-gray-500" id="edit-codigo" value="BN-2024-0001" readonly>
        </div>

        <!-- Nombre -->
        <div class="grid grid-cols-4 items-center gap-4">
            <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-right" for="edit-nombre">
                Nombre
            </label>
            <input class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 col-span-3" id="edit-nombre" value="Computadora Dell OptiPlex 7090">
        </div>

        <!-- Categoría -->
        <div class="grid grid-cols-4 items-center gap-4">
            <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-right" for="edit-categoria">
                Categoría
            </label>
            <div class="col-span-3 relative">
                <select class="flex h-9 w-full items-center justify-between whitespace-nowrap rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-1 focus:ring-ring disabled:cursor-not-allowed disabled:opacity-50 [&>span]:line-clamp-1" id="edit-categoria">
                    <option value="tecnologia" selected>Tecnología</option>
                    <option value="mobiliario">Mobiliario</option>
                    <option value="medico">Equipo Médico</option>
                    <option value="vehiculo">Vehículos</option>
                </select>
            </div>
        </div>

        <!-- Departamento -->
        <div class="grid grid-cols-4 items-center gap-4">
            <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-right" for="edit-departamento">
                Ubicación
            </label>
             <div class="col-span-3 relative">
                <select class="flex h-9 w-full items-center justify-between whitespace-nowrap rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-1 focus:ring-ring disabled:cursor-not-allowed disabled:opacity-50 [&>span]:line-clamp-1" id="edit-departamento">
                    <option value="admin" selected>Administración</option>
                    <option value="uci">UCI</option>
                    <option value="urgencias">Urgencias</option>
                    <option value="rrhh">Recursos Humanos</option>
                </select>
            </div>
        </div>

         <!-- Estado -->
         <div class="grid grid-cols-4 items-center gap-4">
            <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-right" for="edit-estado">
                Estado
            </label>
             <div class="col-span-3 relative">
                <select class="flex h-9 w-full items-center justify-between whitespace-nowrap rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-1 focus:ring-ring disabled:cursor-not-allowed disabled:opacity-50 [&>span]:line-clamp-1" id="edit-estado">
                    <option value="operativo" selected>Operativo</option>
                    <option value="mantenimiento">En Mantenimiento</option>
                    <option value="danado">Dañado</option>
                    <option value="desincorporado">Desincorporado</option>
                </select>
            </div>
        </div>

        <!-- Valor -->
        <div class="grid grid-cols-4 items-center gap-4">
            <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-right" for="edit-valor">
                Valor ($)
            </label>
            <input type="number" class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 col-span-3" id="edit-valor" value="850">
        </div>
        
        <div class="grid grid-cols-4 items-center gap-4 mt-2">
             <div class="col-start-2 col-span-3 bg-blue-50 p-3 rounded-md text-xs text-blue-700 border border-blue-100 flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info shrink-0 mt-0.5"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                <p>Las ediciones se registrarán en el historial de auditoría automáticamente.</p>
             </div>
        </div>

        <div data-slot="dialog-footer" class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2 gap-2 mt-4 pt-4 border-t border-gray-100">
            <button onclick="closeEditModal()" type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground h-9 px-4 py-2">
                Cancelar
            </button>
            <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-blue-600 text-white shadow hover:bg-blue-700 h-9 px-4 py-2">
                Actualizar Bien
            </button>
        </div>
    </form>
    
    <button onclick="closeEditModal()" class="absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-opacity hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none data-[state=open]:bg-accent data-[state=open]:text-muted-foreground">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-4 w-4"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        <span class="sr-only">Close</span>
    </button>
</div>
