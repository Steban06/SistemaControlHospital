<!-- Modal Editar Aire Acondicionado -->
<div role="dialog" id="radix-:edit-ac-modal:" aria-describedby="radix-:edit-ac-desc:" aria-labelledby="radix-:edit-ac-title:" data-state="open" data-slot="dialog-content" 
    class="bg-white data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 fixed top-[50%] left-[50%] grid w-full translate-x-[-50%] translate-y-[-50%] gap-4 rounded-lg border p-6 shadow-lg duration-200 sm:max-w-lg max-h-[90vh] overflow-y-auto" tabindex="-1" style="pointer-events: auto;">
    
    <div class="flex flex-col space-y-1.5 text-center sm:text-left">
        <h2 id="radix-:edit-ac-title:" class="text-lg font-semibold leading-none tracking-tight flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-fan text-blue-600"><path d="M10.827 16.379a6.082 6.082 0 0 1-8.618-7.002l5.412 1.45a6.082 6.082 0 0 1 7.002-8.618l-1.45 5.412a6.082 6.082 0 0 1 8.618 7.002l-5.412-1.45a6.082 6.082 0 0 1-7.002 8.618l1.45-5.412Z"/><path d="M12 12v.01"/></svg>
            Editar Aire Acondicionado
        </h2>
        <p id="radix-:edit-ac-desc:" class="text-sm text-muted-foreground">
            Actualice la información del equipo de climatización
        </p>
    </div>

    <form class="grid gap-4 py-4" onsubmit="event.preventDefault(); closeEditACModal();">
        
        <!-- Código y Ubicación -->
        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-2">
                <label class="text-sm font-medium leading-none" for="edit-ac-code">Código</label>
                <input type="text" id="edit-ac-code" class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring" value="AC-2024-001" readonly>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-medium leading-none" for="edit-ac-location">Ubicación</label>
                <input type="text" id="edit-ac-location" class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring" value="Consultorio 1">
            </div>
        </div>

        <!-- Tipo y Capacidad -->
        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-2">
                <label class="text-sm font-medium leading-none" for="edit-ac-type">Tipo</label>
                <select id="edit-ac-type" class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                    <option value="split" selected>Split</option>
                    <option value="ventana">Ventana</option>
                    <option value="cassette">Cassette</option>
                    <option value="piso-techo">Piso-Techo</option>
                </select>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-medium leading-none" for="edit-ac-capacity">Capacidad (BTU)</label>
                <input type="number" id="edit-ac-capacity" class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring" value="12000">
            </div>
        </div>

        <!-- Marca y Modelo -->
        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-2">
                <label class="text-sm font-medium leading-none" for="edit-ac-brand">Marca</label>
                <input type="text" id="edit-ac-brand" class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring" value="Samsung">
            </div>
            <div class="space-y-2">
                <label class="text-sm font-medium leading-none" for="edit-ac-model">Modelo</label>
                <input type="text" id="edit-ac-model" class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring" value="AR12TXHQASIN">
            </div>
        </div>

        <!-- Serial y Refrigerante -->
        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-2">
                <label class="text-sm font-medium leading-none" for="edit-ac-serial">Número de Serie</label>
                <input type="text" id="edit-ac-serial" class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring" value="SN-99887766">
            </div>
            <div class="space-y-2">
                <label class="text-sm font-medium leading-none" for="edit-ac-refrigerant">Refrigerante</label>
                <select id="edit-ac-refrigerant" class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                    <option value="R410A" selected>R410A</option>
                    <option value="R32">R32</option>
                    <option value="R22">R22</option>
                </select>
            </div>
        </div>

        <!-- Voltaje y Estado -->
        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-2">
                <label class="text-sm font-medium leading-none" for="edit-ac-voltage">Voltaje</label>
                <input type="text" id="edit-ac-voltage" class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring" value="220V / 60Hz">
            </div>
            <div class="space-y-2">
                <label class="text-sm font-medium leading-none" for="edit-ac-status">Estado</label>
                <select id="edit-ac-status" class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                    <option value="operativo" selected>Operativo</option>
                    <option value="mantenimiento">En Mantenimiento</option>
                    <option value="falla">Con Falla</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
        </div>

        <!-- Observaciones -->
        <div class="space-y-2">
            <label class="text-sm font-medium leading-none" for="edit-ac-notes">Observaciones</label>
            <textarea id="edit-ac-notes" rows="3" class="flex min-h-[60px] w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring" placeholder="Notas adicionales...">Ubicado en pared norte. Control en recepción.</textarea>
        </div>

        <!-- Footer -->
        <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2 gap-2 mt-2">
            <button onclick="closeEditACModal()" type="button" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground h-9 px-4 py-2">
                Cancelar
            </button>
            <button type="submit" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-blue-600 text-white shadow hover:bg-blue-700 h-9 px-4 py-2">
                Guardar Cambios
            </button>
        </div>
    </form>
    
    <button onclick="closeEditACModal()" class="cursor-pointer absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-opacity hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none data-[state=open]:bg-accent data-[state=open]:text-muted-foreground">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-4 w-4"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        <span class="sr-only">Close</span>
    </button>
</div>
