<!-- Modal Registrar Mantenimiento/Reparación -->
<div role="dialog" id="radix-:maintenance-ac-modal:" aria-describedby="radix-:maint-ac-desc:" aria-labelledby="radix-:maint-ac-title:" data-state="open" data-slot="dialog-content" 
    class="bg-white data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 fixed top-[50%] left-[50%] z-[100] grid w-full translate-x-[-50%] translate-y-[-50%] gap-4 rounded-lg border p-6 shadow-xl duration-200 sm:max-w-lg max-h-[90vh] overflow-y-auto" tabindex="-1" style="pointer-events: auto;">
    
    <div class="flex flex-col space-y-1">
        <h2 id="radix-:maint-ac-title:" class="text-lg font-semibold leading-none tracking-tight flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-list text-blue-600"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M12 11h4"/><path d="M12 16h4"/><path d="M8 11h.01"/><path d="M8 16h.01"/></svg>
            Registrar Servicio
        </h2>
        <p id="radix-:maint-ac-desc:" class="text-xs text-muted-foreground ml-6.5">
            Diligencie la información del servicio realizado.
        </p>
    </div>

    <form class="grid gap-3 py-2" onsubmit="event.preventDefault(); closeMaintenanceACModal();">
        
        <!-- Tipo de Servicio & Fecha Row -->
        <div class="grid grid-cols-2 gap-3">
            <div class="space-y-1">
                <label class="text-xs font-medium leading-none" for="maint-type">Tipo</label>
                <select id="maint-type" class="flex h-8 w-full rounded-md border border-input bg-transparent px-2 py-1 text-xs shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                    <option value="preventivo">Preventivo</option>
                    <option value="correctivo">Correctivo</option>
                    <option value="instalacion">Instalación</option>
                </select>
            </div>
            <div class="space-y-1">
                <label class="text-xs font-medium leading-none" for="maint-date">Fecha</label>
                <input type="date" id="maint-date" class="flex h-8 w-full rounded-md border border-input bg-transparent px-2 py-1 text-xs shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
            </div>
        </div>

        <!-- Técnico / Responsable -->
        <div class="space-y-1">
            <label class="text-xs font-medium leading-none" for="maint-tech">Técnico / Empresa</label>
            <input type="text" id="maint-tech" placeholder="Ej: Servicios Grales / Tec. Juan" class="flex h-8 w-full rounded-md border border-input bg-transparent px-2 py-1 text-xs shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
        </div>

        <!-- Descripción -->
        <div class="space-y-1">
            <label class="text-xs font-medium leading-none" for="maint-desc">Descripción del Trabajo</label>
            <textarea id="maint-desc" rows="3" placeholder="Detalles..." class="flex min-h-[60px] w-full rounded-md border border-input bg-transparent px-3 py-2 text-xs shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50"></textarea>
        </div>

        <!-- Costo -->
        <div class="flex items-center gap-3">
             <label class="text-xs font-medium leading-none" for="maint-cost">Costo Total ($)</label>
             <input type="number" id="maint-cost" placeholder="0.00" class="flex h-8 w-32 rounded-md border border-input bg-transparent px-2 py-1 text-xs shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
        </div>

        <div data-slot="dialog-footer" class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2 gap-2 mt-4 pt-4 border-t border-gray-100">
            <button onclick="closeMaintenanceACModal()" type="button" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground h-8 px-3 py-2">
                Cancelar
            </button>
            <button type="submit" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-blue-600 text-white shadow hover:bg-blue-700 h-8 px-3 py-2">
                Guardar
            </button>
        </div>
    </form>
    
    <button onclick="closeMaintenanceACModal()" class="cursor-pointer absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-opacity hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none data-[state=open]:bg-accent data-[state=open]:text-muted-foreground">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-4 w-4"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        <span class="sr-only">Close</span>
    </button>
</div>
