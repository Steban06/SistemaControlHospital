<!-- Modal Registrar Nuevo Aire Acondicionado -->
<div role="dialog" id="radix-:regist-ac-modal:" aria-describedby="radix-:regist-ac-desc:" aria-labelledby="radix-:regist-ac-title:" data-state="open" data-slot="dialog-content" 
    class="bg-white data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 fixed top-[50%] left-[50%] z-50 grid w-full translate-x-[-50%] translate-y-[-50%] gap-4 rounded-lg border p-6 shadow-xl duration-200 sm:max-w-lg max-w-xl max-h-[90vh] overflow-y-auto" tabindex="-1" style="pointer-events: auto;">
    
    <div class="flex flex-col space-y-1">
        <h2 id="radix-:regist-ac-title:" class="text-lg font-semibold leading-none tracking-tight flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-snowflake text-blue-600"><line x1="2" x2="22" y1="12" y2="12"/><line x1="12" x2="12" y1="2" y2="22"/><path d="m20 16-4-4 4-4"/><path d="m4 8 4 4-4 4"/><path d="m16 4-4 4-4-4"/><path d="m8 20 4-4 4 4"/></svg>
            Registrar Aire Acondicionado
        </h2>
        <p id="radix-:regist-ac-desc:" class="text-xs text-muted-foreground ml-7">
            Ingrese los datos técnicos del nuevo equipo de climatización.
        </p>
    </div>

    <form class="grid gap-3 py-2" onsubmit="event.preventDefault(); closeRegistACModal();">
        
        <!-- Marca y Modelo -->
        <div class="grid grid-cols-2 gap-3">
             <div class="space-y-1">
                <label class="text-xs font-medium leading-none" for="ac-brand">Marca</label>
                <input type="text" id="ac-brand" placeholder="Ej: Samsung" class="flex h-8 w-full rounded-md border border-input bg-transparent px-2 py-1 text-xs shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
            </div>
             <div class="space-y-1">
                <label class="text-xs font-medium leading-none" for="ac-model">Modelo</label>
                <input type="text" id="ac-model" placeholder="Ej: AR12..." class="flex h-8 w-full rounded-md border border-input bg-transparent px-2 py-1 text-xs shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
            </div>
        </div>

        <!-- Serial y Capacidad -->
        <div class="grid grid-cols-2 gap-3">
             <div class="space-y-1">
                <label class="text-xs font-medium leading-none" for="ac-serial">Serial</label>
                <input type="text" id="ac-serial" placeholder="S/N..." class="flex h-8 w-full rounded-md border border-input bg-transparent px-2 py-1 text-xs shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
            </div>
             <div class="space-y-1">
                <label class="text-xs font-medium leading-none" for="ac-btu">Capacidad (BTU)</label>
                 <select id="ac-btu" class="flex h-8 w-full rounded-md border border-input bg-transparent px-2 py-1 text-xs shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                    <option value="12000">12,000 BTU</option>
                    <option value="18000">18,000 BTU</option>
                    <option value="24000">24,000 BTU</option>
                    <option value="36000">36,000 BTU</option>
                    <option value="60000">60,000 BTU</option>
                </select>
            </div>
        </div>

        <!-- Ubicación y Tipo -->
        <div class="grid grid-cols-2 gap-3">
             <div class="space-y-1">
                <label class="text-xs font-medium leading-none" for="ac-location">Ubicación</label>
                <select id="ac-location" class="flex h-8 w-full rounded-md border border-input bg-transparent px-2 py-1 text-xs shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                    <option value="cons1">Consultorio 1</option>
                    <option value="cons2">Consultorio 2</option>
                    <option value="uci">UCI</option>
                    <option value="admin">Administración</option>
                    <option value="recepcion">Recepción</option>
                </select>
            </div>
             <div class="space-y-1">
                <label class="text-xs font-medium leading-none" for="ac-type">Tipo</label>
                 <select id="ac-type" class="flex h-8 w-full rounded-md border border-input bg-transparent px-2 py-1 text-xs shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                    <option value="split">Split Muro</option>
                    <option value="cassette">Cassette</option>
                    <option value="piso_techo">Piso Techo</option>
                    <option value="ventana">Ventana</option>
                    <option value="central">Central</option>
                </select>
            </div>
        </div>

        <!-- Fecha Instalación -->
        <div class="space-y-1">
            <label class="text-xs font-medium leading-none" for="ac-date">Fecha Instalación</label>
            <input type="date" id="ac-date" class="flex h-8 w-full rounded-md border border-input bg-transparent px-2 py-1 text-xs shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
        </div>

        <div data-slot="dialog-footer" class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2 gap-2 mt-4 pt-4 border-t border-gray-100">
            <button onclick="closeRegistACModal()" type="button" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground h-9 px-4 py-2 hover:bg-slate-100">
                Cancelar
            </button>
            <button type="submit" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-md text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-blue-600 text-white shadow hover:bg-blue-700 h-9 px-4 py-2">
                Registrar Equipo
            </button>
        </div>
    </form>
    
    <button onclick="closeRegistACModal()" class="cursor-pointer absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-opacity hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none data-[state=open]:bg-accent data-[state=open]:text-muted-foreground hover:bg-slate-100 p-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-4 w-4"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        <span class="sr-only">Close</span>
    </button>
</div>
