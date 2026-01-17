<!-- Modal Solicitud de Reparación -->
<div role="dialog" id="radix-:repair-modal:" aria-describedby="radix-:repair-desc:" aria-labelledby="radix-:repair-title:" data-state="open" data-slot="dialog-content" 
    class="bg-white data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 fixed top-[50%] left-[50%] z-[110] grid w-full translate-x-[-50%] translate-y-[-50%] gap-4 rounded-lg border p-6 shadow-xl duration-200 sm:max-w-lg max-h-[90vh] overflow-y-auto" tabindex="-1" style="pointer-events: auto;">
    
    <div class="flex flex-col space-y-1">
        <h2 id="radix-:repair-title:" class="text-lg font-semibold leading-none tracking-tight flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench text-red-600"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
            Solicitud de Reparación
        </h2>
        <p id="radix-:repair-desc:" class="text-xs text-muted-foreground ml-6.5">
            Reporte una falla o solicite reparación para un activo.
        </p>
    </div>

    <form class="grid gap-3 py-2" onsubmit="event.preventDefault(); closeRepairModal();">
        
        <!-- Activo / Bien -->
        <div class="space-y-1">
            <label class="text-xs font-medium leading-none" for="repair-asset">Activo a Reparar</label>
             <div class="relative">
                <select id="repair-asset" class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                    <option value="" disabled selected>Seleccione un bien...</option>
                    <option value="1">Aire Acondicionado - Consultorio 1</option>
                    <option value="2">Monitor Cardíaco - UCI</option>
                    <option value="3">Impresora - Administración</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                </div>
            </div>
        </div>

        <!-- Prioridad & Fecha -->
         <div class="grid grid-cols-2 gap-3">
            <div class="space-y-1">
                <label class="text-xs font-medium leading-none" for="repair-priority">Prioridad</label>
                <select id="repair-priority" class="flex h-8 w-full rounded-md border border-input bg-transparent px-2 py-1 text-xs shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                    <option value="baja">Baja</option>
                    <option value="media" selected>Media</option>
                    <option value="alta">Alta</option>
                    <option value="critica" class="text-red-600 font-bold">Crítica</option>
                </select>
            </div>
             <div class="space-y-1">
                <label class="text-xs font-medium leading-none" for="repair-date">Fecha Solicitud</label>
                <input type="date" id="repair-date" class="flex h-8 w-full rounded-md border border-input bg-transparent px-2 py-1 text-xs shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring" value="<?php echo date('Y-m-d'); ?>">
            </div>
        </div>

        <!-- Descripción de la Falla -->
        <div class="space-y-1">
            <label class="text-xs font-medium leading-none" for="repair-desc">Descripción de la Falla</label>
            <textarea id="repair-desc" rows="4" placeholder="Describa el problema detalladamente..." class="flex min-h-[80px] w-full rounded-md border border-input bg-transparent px-3 py-2 text-xs shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50"></textarea>
        </div>
        
         <!-- Solicitante -->
        <div class="space-y-1">
            <label class="text-xs font-medium leading-none" for="repair-requester">Solicitado Por</label>
            <input type="text" id="repair-requester" placeholder="Su Nombre / Departamento" class="flex h-8 w-full rounded-md border border-input bg-transparent px-2 py-1 text-xs shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
        </div>

        <div data-slot="dialog-footer" class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2 gap-2 mt-4 pt-4 border-t border-gray-100">
            <button onclick="closeRepairModal()" type="button" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground h-9 px-4 py-2">
                Cancelar
            </button>
            <button type="submit" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-blue-600 text-white shadow hover:bg-blue-700 h-9 px-4 py-2">
                Enviar Solicitud
            </button>
        </div>
    </form>
    
    <button onclick="closeRepairModal()" class="cursor-pointer absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-opacity hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none data-[state=open]:bg-accent data-[state=open]:text-muted-foreground">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-4 w-4"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        <span class="sr-only">Close</span>
    </button>
</div>
