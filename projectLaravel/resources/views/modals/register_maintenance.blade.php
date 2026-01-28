<style>
    .btn-color-red:hover {
        border-color: #dc2626 !important;
        color: #dc2626 !important;
        background-color: transparent !important;
    }
    
    /* Custom Scrollbar Styles */
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }
    .dark .custom-scrollbar::-webkit-scrollbar-track {
        background: #1f2937;
    }
    .dark .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #4b5563;
    }
    .dark .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #6b7280;
    }
</style>

<!-- ✅ ARCHIVO ACTUALIZADO - 27 ENE 2026 19:05 -->
<!-- Modal Registrar Mantenimiento -->
<div role="dialog" id="radix-:register-maintenance:" 
    class="bg-white dark:bg-gray-800 fixed top-[50%] left-[50%] z-50 flex flex-col translate-x-[-50%] translate-y-[-50%] rounded-xl border dark:border-gray-700 shadow-2xl max-h-[90vh]" 
    tabindex="-1" style="pointer-events: auto; width: 500px; max-width: 95vw;">
    
    <!-- Close Button (X) - FIJO -->
    <button onclick="closeRegisterModal()" type="button" class="cursor-pointer absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-all hover:opacity-100 hover:text-red-600 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none p-1 z-50 btn-color-red">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-4 w-4">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
        </svg>
        <span class="sr-only">Close</span>
    </button>

    <!-- HEADER FIJO -->
    <div class="flex-shrink-0 px-6 pt-6 pb-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex flex-col gap-1 text-center sm:text-left">
            <h2 class="font-bold text-xl text-gray-900 dark:text-gray-100 pr-8 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-check w-5 h-5 text-blue-600">
                    <rect width="8" height="4" x="8" y="2" rx="1" ry="1"></rect>
                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                    <path d="m9 14 2 2 4-4"></path>
                </svg>
                Registrar Mantenimiento Realizado
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">Documenta el mantenimiento que ya se ejecutó</p>
        </div>
    </div>

    <!-- BODY CON SCROLL -->
    <div class="flex-1 overflow-y-auto px-6 py-4 custom-scrollbar">
        <!-- Progress Stepper -->
        <div class="flex items-center justify-between mb-6 px-4">
            <div class="flex items-center flex-1">
                <div class="flex flex-col items-center gap-2">
                    <div id="step1-indicator" class="w-8 h-8 lg:w-10 lg:h-10 rounded-full flex items-center justify-center font-semibold text-sm transition-colors bg-blue-600 text-white">1</div>
                    <p id="step1-label" class="text-xs font-medium text-blue-600">Bien</p>
                </div>
                <div class="flex-1 h-1 mx-2 bg-gray-200 min-w-12" style="min-width: 3rem;" id="progress1"></div>
            </div>
            <div class="flex items-center flex-1">
                <div class="flex flex-col items-center gap-2">
                    <div id="step2-indicator" class="w-8 h-8 lg:w-10 lg:h-10 rounded-full flex items-center justify-center font-semibold text-sm transition-colors bg-gray-200 text-gray-500">2</div>
                    <p id="step2-label" class="text-xs font-medium text-gray-400">Trabajo</p>
                </div>
                <div class="flex-1 h-1 mx-2 bg-gray-200 min-w-12" style="min-width: 3rem;" id="progress2"></div>
            </div>
            <div class="flex items-center flex-1">
                <div class="flex flex-col items-center gap-2">
                    <div id="step3-indicator" class="w-8 h-8 lg:w-10 lg:h-10 rounded-full flex items-center justify-center font-semibold text-sm transition-colors bg-gray-200 text-gray-500">3</div>
                    <p id="step3-label" class="text-xs font-medium text-gray-400">Detalles</p>
                </div>
            </div>
        </div>

        <form id="maintenanceForm" onsubmit="event.preventDefault(); submitMaintenance();">
            <!-- Step 1: Seleccionar Bien -->
            <div id="step1" class="space-y-4 py-4">
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4" id="step1-header-info">
                    <div class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0">
                            <path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"></path>
                            <path d="M12 22V12"></path>
                            <polyline points="3.29 7 12 12 20.71 7"></polyline>
                            <path d="m7.5 4.27 9 5.15"></path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-blue-900 text-sm mb-1">Paso 1: Seleccionar Bien Nacional</h4>
                            <p class="text-xs text-blue-700">Busca y selecciona el bien nacional, aire acondicionado o infraestructura <br> al que se le realizó el mantenimiento</p>
                        </div>
                    </div>
                </div>

                <!-- Selected Asset Card Step 1 (Initially Hidden) -->
                <div id="selectedAssetCard-step1" class="text-card-foreground flex flex-col gap-6 rounded-xl border-2 border-blue-500 bg-blue-50 hidden">
                    <div class="[&:last-child]:pb-6 p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs text-blue-600 font-semibold mb-1">BIEN SELECCIONADO</p>
                                <p class="font-mono text-sm font-medium" id="selected-asset-code-step1">CODE</p>
                                <p class="text-sm mt-1" id="selected-asset-name-step1">Asset Name</p>
                                
                                <span id="selected-asset-badge-step1" class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none mt-2 text-xs bg-white text-gray-700 border-gray-200">
                                    <!-- Icon injected via JS -->
                                    <span id="selected-asset-type-text-step1" class="ml-1">Type</span>
                                </span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-8 h-8 text-blue-600">
                                <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                                <path d="m9 11 3 3L22 4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-semibold uppercase text-gray-700" for="assetSearch">Buscar Bien</label>
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                        <input class="flex h-10 w-full rounded-md border border-gray-300 bg-white px-3 py-1 pl-10 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all" id="assetSearch" placeholder="Buscar por nombre o código..." value="">
                    </div>
                </div>

                <div class="border rounded-lg overflow-y-auto custom-scrollbar p-2" style="max-height: 270px;">
                    <!-- No Results Message -->
                    <div id="noResultsMessage" class="hidden p-8 text-center text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package w-12 h-12 mx-auto mb-2 text-gray-300">
                            <path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"></path>
                            <path d="M12 22V12"></path>
                            <polyline points="3.29 7 12 12 20.71 7"></polyline>
                            <path d="m7.5 4.27 9 5.15"></path>
                        </svg>
                        <p class="text-sm">No se encontraron bienes</p>
                    </div>

                    <div class="flex flex-col gap-2" id="assetList">
                        @foreach($assets as $asset)
                        <button type="button" class="w-full p-3 text-left hover:bg-gray-50 transition-colors asset-item border border-gray-200 rounded-md" 
                            data-asset-id="{{ $asset->id }}" 
                            data-asset-code="{{ $asset->code }}" 
                            data-asset-type="{{ $asset->type }}">
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-1">
                                        <p class="font-mono text-xs text-gray-600">{{ $asset->code }}</p>
                                        <span class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium text-xs {{ $asset->type == 'Bien Nacional' ? 'bg-blue-50 text-blue-700 border-blue-200' : 'bg-green-50 text-green-700 border-green-200' }}">
                                            @if($asset->type == 'Bien Nacional')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package w-3 h-3 mr-1">
                                                <path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"></path>
                                                <path d="M12 22V12"></path>
                                                <polyline points="3.29 7 12 12 20.71 7"></polyline>
                                                <path d="m7.5 4.27 9 5.15"></path>
                                            </svg>
                                            @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind w-3 h-3 mr-1">
                                                <path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path>
                                                <path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path>
                                                <path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path>
                                            </svg>
                                            @endif
                                            {{ $asset->type }}
                                        </span>
                                    </div>
                                    <p class="text-sm font-medium asset-name">{{ $asset->name }}</p>
                                </div>
                                <div class="hidden check-icon text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle-2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="m9 12 2 2 4-4"></path>
                                    </svg>
                                </div>
                            </div>
                        </button>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Step 2: Detalles del Trabajo -->
            <div id="step2" class="space-y-4 py-4 hidden">
                <!-- Selected Asset Card (Dynamic) -->
                <div class="bg-emerald-50 border border-emerald-200 rounded-lg p-4">
                    <div class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench w-5 h-5 text-emerald-600 mt-0.5 flex-shrink-0">
                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-emerald-900 text-sm mb-1">Paso 2: Documentar Trabajo Realizado</h4>
                            <p class="text-xs text-emerald-700">Describe detalladamente el trabajo ejecutado y las partes que se reemplazaron</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold uppercase text-gray-700" for="tipo">Tipo de Mantenimiento <span class="text-red-500">*</span></label>
                        <select id="tipo" name="tipo" required class="flex h-10 w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                            <option value="">Seleccione tipo de mantenimiento</option>
                            <option value="preventivo">Preventivo</option>
                            <option value="correctivo">Correctivo</option>
                            <option value="predictivo">Predictivo</option>
                            

                        </select>
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold uppercase text-gray-700" for="fecha_realizada">Fecha Realizada <span class="text-red-500">*</span></label>
                        <input type="date" id="fecha_realizada" name="fecha_realizada" required class="flex h-10 w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all" value="{{ date('Y-m-d') }}">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="text-xs font-semibold uppercase text-gray-700" for="tecnico">Técnico Responsable <span class="text-red-500">*</span></label>
                    <input type="text" id="tecnico" name="tecnico" required placeholder="Nombre del técnico" class="flex h-10 w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                </div>

                <div class="space-y-1.5">
                    <label class="text-xs font-semibold uppercase text-gray-700" for="descripcion">Descripción del Trabajo <span class="text-red-500">*</span></label>
                    <textarea id="descripcion" name="descripcion" required rows="4" placeholder="Describa el trabajo realizado..." class="flex min-h-[80px] w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all"></textarea>
                </div>

                <!-- Partes/Repuestos Section -->
                <div class="space-y-2 lg:col-span-2">
                    <label data-slot="label" class="font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50 text-sm flex items-center gap-2">
                        Partes/Repuestos Reemplazados
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info w-3 h-3 text-gray-400" data-state="closed" data-slot="tooltip-trigger">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 16v-4"></path>
                            <path d="M12 8h.01"></path>
                        </svg>
                    </label>
                    
                    <div id="parts-container" class="space-y-2">
                        <div class="flex gap-2">
                            <input name="partes[]" data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border px-3 py-1 text-base bg-input-background transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive flex-1" placeholder="Ej: Filtro de aire, Capacitor 50uF, etc." value="">
                            <button type="button" class="btn-remove-part inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-background text-foreground hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 flex-shrink-0">Eliminar</button>
                        </div>
                    </div>

                    <button id="btn-add-part" data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-background text-foreground hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 w-full" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-4 h-4 mr-2">
                            <path d="M5 12h14"></path>
                            <path d="M12 5v14"></path>
                        </svg>
                        Agregar Parte
                    </button>
                </div>
            </div>

            <!-- Step 3: Detalles Adicionales -->
            <div id="step3" class="space-y-4 py-4 hidden">
                <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                    <div class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-5 h-5 text-purple-600 mt-0.5 flex-shrink-0">
                            <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                            <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                            <path d="M10 9H8"></path>
                            <path d="M16 13H8"></path>
                            <path d="M16 17H8"></path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-purple-900 text-sm mb-1">Paso 3: Estado Final y Detalles</h4>
                            <p class="text-xs text-purple-700">Indica cómo quedó el bien después del mantenimiento <br> y agrega información adicional</p>
                        </div>
                    </div>
                </div>   

                

                <div class="space-y-1.5">
                    <label class="text-xs font-semibold uppercase text-gray-700" for="observaciones">Observaciones Adicionales (Opcional)</label>
                    <textarea id="observaciones" name="observaciones" rows="3" placeholder="Observaciones adicionales..." class="flex min-h-[60px] w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all"></textarea>
                </div>

                <div class="space-y-2">
                    <label data-slot="label" class="font-medium select-none group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50 peer-disabled:cursor-not-allowed peer-disabled:opacity-50 text-sm flex items-center gap-2" for="fotos">
                        Fotos Adjuntas
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-camera w-4 h-4 text-gray-400">
                            <path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"></path>
                            <circle cx="12" cy="13" r="3"></circle>
                        </svg>
                    </label>
                    <input type="file" data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border px-3 py-1 text-base bg-input-background transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive" id="fotos" multiple="" accept="image/*">
                </div>

                <!-- Summary Card -->
                <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 border rounded-lg bg-gray-50/50">
                    <h4 class="font-semibold text-sm mb-3 flex items-center gap-2 text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-check w-4 h-4 text-gray-500">
                            <rect width="8" height="4" x="8" y="2" rx="1" ry="1"></rect>
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <path d="m9 14 2 2 4-4"></path>
                        </svg>
                        Resumen del Registro
                    </h4>
                    <div class="space-y-2 text-xs">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Bien:</span>
                            <span class="font-medium text-gray-900" id="summary-asset">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Código:</span>
                            <span class="font-mono font-medium text-gray-900" id="summary-code">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Categoría:</span>
                            <span class="font-medium text-gray-900" id="summary-type">-</span>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <!-- FOOTER FIJO -->
    <div class="flex-shrink-0 rounded-xl px-6 py-4 border-t border-gray-200 bg-gray-50">
        <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
            <button type="button" id="btnCancel" onclick="closeRegisterModal()" class="w-full sm:w-auto inline-flex justify-center items-center rounded-md bg-white px-6 py-2.5 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 hover:text-red-600 hover:ring-red-300 transition-all btn-color-red">
                Cancelar
            </button>
            <button type="button" id="btnPrevious" onclick="previousStep()" class="hidden w-full sm:w-auto inline-flex justify-center items-center rounded-md bg-white px-6 py-2.5 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-all disabled:opacity-50 disabled:cursor-not-allowed">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left mr-1">
                    <path d="m15 18-6-6 6-6"></path>
                </svg>
                Anterior
            </button>
            <button type="button" id="btnNext" onclick="nextStep()" class="w-full sm:w-auto inline-flex justify-center items-center rounded-md bg-blue-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 hover:shadow-md transition-all disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                Siguiente
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right ml-1">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
            </button>
            <button type="button" onclick="submitMaintenance()" id="btnSubmit" class="hidden w-full sm:w-auto inline-flex justify-center items-center rounded-md bg-blue-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 hover:shadow-md transition-all disabled:opacity-50 disabled:cursor-not-allowed">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check mr-1">
                    <path d="M20 6 9 17l-5-5"></path>
                </svg>
                Guardar
            </button>
        </div>
    </div>
</div>
<script src="{{ asset('js/maintenance-wizard.js') }}"></script>
