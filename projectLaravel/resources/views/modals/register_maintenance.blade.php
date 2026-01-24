<!-- Modal Registrar Mantenimiento -->
<div role="dialog" id="radix-:register-maintenance:" aria-describedby="radix-:register-desc:" aria-labelledby="radix-:register-title:" data-state="open" data-slot="dialog-content" 
    class="bg-white data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 fixed top-[50%] left-[50%] z-[110] grid w-full translate-x-[-50%] translate-y-[-50%] gap-4 rounded-lg border p-6 shadow-xl duration-200 sm:max-w-lg max-h-[90vh] overflow-y-auto" tabindex="-1" style="pointer-events: auto;">
    
    <div class="flex flex-col space-y-1">
        <h2 id="radix-:register-title:" class="text-lg font-semibold leading-none tracking-tight flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench text-blue-600">
                <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
            </svg>
            Registrar Mantenimiento
        </h2>
        <p id="radix-:register-desc:" class="text-xs text-muted-foreground ml-6.5">
            Registre un mantenimiento que ya ha sido realizado.
        </p>
    </div>

    <form class="grid gap-3 py-2" onsubmit="event.preventDefault(); alert('Funcionalidad de guardado pendiente de implementación'); closeRegisterModal();">
        
        <!-- Bien (Opcional) -->
        <div class="space-y-1">
            <label class="text-xs font-medium leading-none" for="bien_id">Bien/Activo (Opcional)</label>
            <div class="relative">
                <select id="bien_id" name="bien_id" class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                    <option value="">Sin bien asociado</option>
                    <option value="1">BN-2024-0001 - Computadora Dell OptiPlex</option>
                    <option value="2">BN-2023-0156 - Monitor LG 27"</option>
                    <option value="3">BN-2024-0045 - Equipo de Ultrasonido</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down"><path d="m6 9 6 6 6-6"/></svg>
                </div>
            </div>
        </div>

        <!-- Tipo & Fecha -->
        <div class="grid grid-cols-2 gap-3">
            <div class="space-y-1">
                <label class="text-xs font-medium leading-none" for="tipo">Tipo *</label>
                <select id="tipo" name="tipo" required class="flex h-8 w-full rounded-md border border-input bg-transparent px-2 py-1 text-xs shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                    <option value="preventivo">Preventivo</option>
                    <option value="correctivo">Correctivo</option>
                </select>
            </div>
            <div class="space-y-1">
                <label class="text-xs font-medium leading-none" for="fecha_realizada">Fecha Realizada *</label>
                <input type="date" id="fecha_realizada" name="fecha_realizada" required class="flex h-8 w-full rounded-md border border-input bg-transparent px-2 py-1 text-xs shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring" value="{{ date('Y-m-d') }}">
            </div>
        </div>

        <!-- Técnico -->
        <div class="space-y-1">
            <label class="text-xs font-medium leading-none" for="tecnico">Técnico *</label>
            <input type="text" id="tecnico" name="tecnico" required placeholder="Nombre del técnico" class="flex h-8 w-full rounded-md border border-input bg-transparent px-2 py-1 text-xs shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
        </div>

        <!-- Descripción del Trabajo -->
        <div class="space-y-1">
            <label class="text-xs font-medium leading-none" for="descripcion">Descripción del Trabajo *</label>
            <textarea id="descripcion" name="descripcion" required rows="4" placeholder="Describa el trabajo realizado..." class="flex min-h-[80px] w-full rounded-md border border-input bg-transparent px-3 py-2 text-xs shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50"></textarea>
        </div>
        
        <!-- Costo -->
        <div class="space-y-1">
            <label class="text-xs font-medium leading-none" for="costo">Costo (Opcional)</label>
            <input type="number" id="costo" name="costo" step="0.01" min="0" placeholder="0.00" class="flex h-8 w-full rounded-md border border-input bg-transparent px-2 py-1 text-xs shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
        </div>

        <!-- Observaciones -->
        <div class="space-y-1">
            <label class="text-xs font-medium leading-none" for="observaciones">Observaciones (Opcional)</label>
            <textarea id="observaciones" name="observaciones" rows="3" placeholder="Observaciones adicionales..." class="flex min-h-[60px] w-full rounded-md border border-input bg-transparent px-3 py-2 text-xs shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring"></textarea>
        </div>

        <div data-slot="dialog-footer" class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2 gap-2 mt-4 pt-4 border-t border-gray-100">
            <button onclick="closeRegisterModal()" type="button" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground h-9 px-4 py-2">
                Cancelar
            </button>
            <button type="submit" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-blue-600 text-white shadow hover:bg-blue-700 h-9 px-4 py-2">
                Guardar Mantenimiento
            </button>
        </div>
    </form>
    
    <button onclick="closeRegisterModal()" type="button" class="cursor-pointer absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-opacity hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none data-[state=open]:bg-accent data-[state=open]:text-muted-foreground">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-4 w-4"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        <span class="sr-only">Close</span>
    </button>
</div>
