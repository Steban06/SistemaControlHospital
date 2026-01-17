<div role="dialog" id="radix-:view-modal:" aria-describedby="radix-:view-desc:" aria-labelledby="radix-:view-title:" data-state="open" data-slot="dialog-content" 
    class="bg-white data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 fixed top-[50%] left-[50%] z-50 grid w-full translate-x-[-50%] translate-y-[-50%] gap-0 rounded-xl border shadow-2xl duration-200 sm:max-w-lg max-h-[90vh] overflow-hidden" tabindex="-1" style="pointer-events: auto;">
    
    <!-- Header with Gradient -->
    <div class="relative bg-gradient-to-r from-slate-900 to-slate-800 p-4 flex items-center justify-between text-white shrink-0">
        <div class="flex flex-col gap-0.5">
            <h2 id="radix-:view-title:" class="font-bold text-lg flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-list text-blue-400"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M12 11h4"/><path d="M12 16h4"/><path d="M8 11h.01"/><path d="M8 16h.01"/></svg>
                Ficha Técnica
            </h2>
            <p id="radix-:view-desc:" class="text-slate-300 text-xs font-light tracking-wide">
                ID: <span class="font-mono font-bold text-white">BN-2026-0001</span>
            </p>
        </div>
        <button onclick="closeViewModal()" class="text-slate-400 hover:text-white transition-colors bg-white/10 hover:bg-white/20 p-1.5 rounded-full backdrop-blur-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
    </div>

    <!-- Main Content (Stacked) -->
    <div class="flex flex-col h-full overflow-y-auto max-h-[calc(90vh-130px)] bg-slate-50/50">
        <!-- Top Section: Image & Basic Info -->
        <div class="bg-white p-4 border-b border-gray-100 flex gap-4 items-start">
            <div class="w-20 h-20 bg-slate-100 rounded-lg flex items-center justify-center shrink-0 border border-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
            </div>
            <div class="flex-1 min-w-0">
                <h3 class="font-bold text-gray-900 text-base leading-tight mb-1">Monitor Multiparámetro</h3>
                <p class="text-xs text-gray-500 mb-2">Philips / IntelliVue MX40</p>
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center rounded-full bg-emerald-100 px-2 py-0.5 text-[10px] font-medium text-emerald-700">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span>
                        Operativo
                    </span>
                    <span class="text-[10px] text-gray-400 font-mono">PH-MX40-998877</span>
                </div>
            </div>
             <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=BN-2026-0001" alt="QR Code" class="w-12 h-12 mix-blend-multiply opacity-80">
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-2 gap-px bg-gray-200 border-b border-gray-200">
            <button class="flex items-center justify-center gap-2 py-2.5 text-xs font-medium text-gray-600 bg-white hover:bg-gray-50 hover:text-blue-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                Editar Bien
            </button>
            <button class="flex items-center justify-center gap-2 py-2.5 text-xs font-medium text-gray-600 bg-white hover:bg-gray-50 hover:text-blue-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-printer"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/></svg>
                Imprimir Etiqueta
            </button>
        </div>

        <!-- Details List -->
        <div class="p-4 space-y-4">
            <!-- Location -->
            <div class="bg-white rounded-lg p-3 border border-gray-100 shadow-sm flex items-start gap-3">
                <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center shrink-0 mt-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin text-blue-600"><path d="M20 10c0 6-9 13-9 13s-9-7-9-13a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                </div>
                <div class="flex-1">
                    <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold mb-0.5">Ubicación</p>
                    <p class="text-sm font-medium text-gray-900">UCI - Unidad de Cuidados Intensivos</p>
                    <p class="text-xs text-gray-500">Piso 2, Ala Norte</p>
                    
                    <div class="mt-2 pt-2 border-t border-gray-50 flex items-center gap-2">
                        <div class="w-5 h-5 rounded-full bg-indigo-100 flex items-center justify-center text-[10px] font-bold text-indigo-700">JL</div>
                        <span class="text-xs text-gray-600">Responsable: <span class="font-medium text-gray-900">Dr. Juan López</span></span>
                    </div>
                </div>
            </div>

            <!-- More Info -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-white p-3 rounded-lg border border-gray-100">
                     <p class="text-[10px] text-gray-500 uppercase font-semibold mb-1">Adquisición</p>
                     <p class="text-sm font-medium text-gray-900">15 Ene, 2024</p>
                </div>
                <div class="bg-white p-3 rounded-lg border border-gray-100">
                     <p class="text-[10px] text-gray-500 uppercase font-semibold mb-1">Categoría</p>
                     <p class="text-sm font-medium text-gray-900 truncate">Equipos Médicos</p>
                </div>
            </div>

             <!-- Financial -->
             <div>
                <h4 class="text-xs font-bold text-gray-900 mb-2">Datos Financieros</h4>
                <div class="flex items-center justify-between bg-white p-3 rounded-lg border border-gray-100">
                    <div>
                        <p class="text-[10px] text-gray-500">Valor Libro</p>
                        <p class="text-base font-bold text-gray-900">$11,205.00</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] text-gray-500">Valor Compra</p>
                        <p class="text-sm text-gray-600 strike-through decoration-gray-400">$12,450.00</p>
                    </div>
                </div>
             </div>

        </div>
    </div>

    <!-- Footer -->
    <div data-slot="dialog-footer" class="p-3 bg-gray-50 border-t flex justify-between items-center shrink-0">
        <button onclick="closeViewModal()" class="text-xs text-gray-500 hover:text-gray-800 underline">
            Cerrar
        </button>
        <button class="px-3 py-1.5 text-xs font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 shadow-sm transition-colors flex items-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
            Exportar PDF
        </button>
    </div>
</div>
