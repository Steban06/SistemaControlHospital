<!-- Modal Ver Detalles Aire Acondicionado -->
<div role="dialog" id="radix-:view-ac-modal:" aria-describedby="radix-:view-ac-desc:" aria-labelledby="radix-:view-ac-title:" data-state="open" data-slot="dialog-content" 
    class="bg-white data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 fixed top-[50%] left-[50%] grid w-full translate-x-[-50%] translate-y-[-50%] gap-4 rounded-lg border p-6 shadow-lg duration-200 sm:max-w-lg max-w-2xl max-h-[90vh] overflow-y-auto" tabindex="-1" style="pointer-events: auto;">
    
    <!-- Modal Header -->
    <div class="flex flex-col space-y-1.5 text-center sm:text-left">
        <div class="flex justify-between items-start">
             <div>
                <h2 id="radix-:view-ac-title:" class="text-lg font-semibold leading-none tracking-tight flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-fan text-blue-600">
                        <path d="M10.827 16.379a6.082 6.082 0 0 1-8.618-7.002l5.412 1.45a6.082 6.082 0 0 1 7.002-8.618l-1.45 5.412a6.082 6.082 0 0 1 8.618 7.002l-5.412-1.45a6.082 6.082 0 0 1-7.002 8.618l1.45-5.412Z"/>
                        <path d="M12 12v.01"/>
                    </svg>
                    Split 12000 BTU
                </h2>
                <div class="flex items-center gap-2 mt-1.5">
                    <span class="text-xs font-mono text-slate-500 bg-slate-100 px-1.5 py-0.5 rounded border border-slate-200">AC-2024-001</span>
                    <span class="flex items-center gap-1 text-[10px] font-medium bg-emerald-50 text-emerald-700 px-1.5 py-0.5 rounded border border-emerald-100">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Operativo
                    </span>
                </div>
            </div>
            
            
             <!-- Quick Actions -->
             <div class="flex gap-4 mr-12">
                 <button class="cursor-pointer p-1.5 hover:bg-slate-100 rounded-md text-slate-500 transition-colors" title="Descargar Hoja de Vida">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-down"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><path d="M12 18v-6"/><path d="m9 15 3 3 3-3"/></svg>
                </button>
                <button onclick="openEditACModal()" class="cursor-pointer p-1.5 hover:bg-slate-100 rounded-md text-slate-500 transition-colors" title="Editar Equipo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Minimal Tabs -->
    <div class="flex gap-2 text-xs font-medium border-b border-slate-100 pb-1 mt-2">
         <button onclick="switchACTab('tab-info')" id="btn-tab-info" class="cursor-pointer ac-tab-btn text-blue-600 hover:text-blue-700 border-b-2 border-blue-600 pb-1 px-1 transition-colors">Información</button>
         <button onclick="switchACTab('tab-maintenance')" id="btn-tab-maintenance" class="cursor-pointer ac-tab-btn text-slate-500 hover:text-slate-800 border-b-2 border-transparent pb-1 px-1 transition-colors">Mantenimiento</button>
         <button onclick="switchACTab('tab-repairs')" id="btn-tab-repairs" class="cursor-pointer ac-tab-btn text-slate-500 hover:text-slate-800 border-b-2 border-transparent pb-1 px-1 transition-colors">Reparaciones</button>
    </div>

    <!-- Content -->
    <div class="py-2 h-[320px] overflow-y-auto pr-1">
        
        <!-- Tab: Información -->
        <div id="tab-info" class="ac-tab-content space-y-4">
             <div class="grid grid-cols-2 gap-4 text-sm">
                <div class="space-y-3">
                     <div>
                        <span class="text-[10px] uppercase text-slate-400 font-bold tracking-wider">Ubicación</span>
                        <div class="font-medium text-slate-800 flex items-center gap-1.5 mt-0.5">
                             <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin text-slate-400"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                             Consultorio 1
                        </div>
                    </div>
                     <div>
                        <span class="text-[10px] uppercase text-slate-400 font-bold tracking-wider">Marca / Modelo</span>
                        <p class="font-medium text-slate-800">Samsung AR12TXHQASIN</p>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase text-slate-400 font-bold tracking-wider">Serial</span>
                        <p class="font-mono text-slate-600 text-xs">SN-99887766</p>
                    </div>
                </div>
                <div class="space-y-3">
                     <div>
                        <span class="text-[10px] uppercase text-slate-400 font-bold tracking-wider">Capacidad</span>
                        <p class="font-medium text-slate-800">12,000 BTU</p>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase text-slate-400 font-bold tracking-wider">Refrigerante</span>
                        <p class="font-medium text-slate-800">R410A</p>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase text-slate-400 font-bold tracking-wider">Voltaje</span>
                        <p class="font-medium text-slate-800">220V / 60Hz</p>
                    </div>
                </div>
             </div>
             
             <div class="bg-blue-50 p-3 rounded text-xs text-blue-800 border border-blue-100">
                <span class="font-semibold">Nota:</span> Ubicado en pared norte. Control en recepción.
            </div>
        </div>

        <!-- Tab: Mantenimientos -->
        <div id="tab-maintenance" class="ac-tab-content space-y-3 hidden">
            <!-- Alert -->
            <div class="bg-amber-50 border border-amber-100 rounded p-2 flex items-center justify-between text-xs mb-2">
                <div class="text-amber-800">
                    <span class="font-bold">Próximo:</span> 10 Jul 2024
                </div>
                <button class="text-amber-700 underline font-medium hover:text-amber-900">Agendar</button>
            </div>

            <div class="space-y-3">
                 <!-- Item -->
                 <div class="flex gap-3 text-sm">
                    <div class="flex flex-col items-center">
                        <div class="w-2 h-2 rounded-full bg-green-500 mt-1.5"></div>
                        <div class="w-px h-full bg-slate-200 my-1"></div>
                    </div>
                    <div class="pb-2">
                        <p class="font-medium text-slate-900">Mantenimiento Preventivo</p>
                        <span class="text-xs text-slate-500">10 Ene 2024 &bull; Téc. Juan Pérez</span>
                         <p class="text-xs text-slate-600 mt-1">Limpieza general y revisión de carga. OK.</p>
                    </div>
                 </div>
                 <!-- Item -->
                 <div class="flex gap-3 text-sm">
                    <div class="flex flex-col items-center">
                        <div class="w-2 h-2 rounded-full bg-green-500 mt-1.5"></div>
                        <div class="w-px h-full bg-slate-200 my-1"></div>
                    </div>
                    <div class="pb-2">
                        <p class="font-medium text-slate-900">Mantenimiento Preventivo</p>
                        <span class="text-xs text-slate-500">15 Jul 2023 &bull; Serv. Generales</span>
                    </div>
                 </div>
            </div>
            
            <button onclick="openMaintenanceACModal()" class="cursor-pointer w-full py-2 text-xs font-medium text-blue-600 border border-blue-200 border-dashed rounded hover:bg-blue-50 transition-colors mt-2">
                + Registrar Mantenimiento
            </button>
        </div>
        
        <!-- Tab: Reparaciones -->
        <div id="tab-repairs" class="ac-tab-content space-y-3 hidden">
              <div class="space-y-3">
                 <!-- Item -->
                 <div class="bg-red-50 p-3 rounded border border-red-100">
                    <div class="flex justify-between items-start mb-1">
                        <span class="text-xs font-bold text-red-800 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap-off"><path d="M10.513 4.856 13.12 2.12a.5.5 0 0 1 .849.274l1.248 9.037a.5.5 0 0 0 .914.162l4.316-5.395a1 1 0 0 1 1.637 1.189l-7.771 13.313a.5.5 0 0 1-.925-.133l-1.09-8.625a.5.5 0 0 0-.916-.166l-5.61 7.013a1 1 0 0 1-1.63-1.116l4.282-12.772Z"/><line x1="4" x2="20" y1="4" y2="20"/></svg>
                            Capacitador
                        </span>
                        <span class="text-[10px] text-slate-500">20 Oct 2023</span>
                    </div>
                    <p class="text-xs text-slate-700">Reemplazo de capacitador 35uF quemado.</p>
                 </div>
            </div>
            
             <button onclick="openRepairModal()" class="cursor-pointer w-full py-2 text-xs font-medium text-red-600 border border-red-200 border-dashed rounded hover:bg-red-50 transition-colors mt-2">
                + Reportar Falla / Reparación
            </button>
        </div>

    </div>

    <!-- Footer -->
    <div data-slot="dialog-footer" class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2 gap-2 mt-2 pt-4 border-t border-gray-100">
        <button onclick="closeACModal()" type="button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground h-9 px-4 py-2">
            Cerrar
        </button>
    </div>
    
     <button onclick="closeACModal()" class="absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-opacity hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none data-[state=open]:bg-accent data-[state=open]:text-muted-foreground">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-4 w-4"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        <span class="sr-only">Close</span>
    </button>
</div>
