@extends('layouts.app')

@section('content')
<div class="space-y-4 lg:space-y-6 p-4 lg:p-6">
    <!-- Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4">
        <!-- Total Card -->
        <div data-slot="card" class="text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg bg-gradient-to-br from-blue-50 to-white hover:shadow-xl transition-shadow">
            <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-xs lg:text-sm font-medium text-gray-600">Total Unidades</p>
                    <div class="bg-blue-100 p-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind w-4 h-4 lg:w-5 lg:h-5 text-blue-600"><path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path><path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path><path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path></svg>
                    </div>
                </div>
                <p class="text-2xl lg:text-3xl font-bold text-gray-900">{{ $totalAires }}</p>
                <p class="text-xs text-gray-500 mt-1">Equipos registrados</p>
            </div>
        </div>
        <!-- Operativos Card -->
        <div data-slot="card" class="text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg bg-gradient-to-br from-emerald-50 to-white hover:shadow-xl transition-shadow">
            <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-xs lg:text-sm font-medium text-gray-600">Operativos</p>
                    <div class="bg-emerald-100 p-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-4 h-4 lg:w-5 lg:h-5 text-emerald-600"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                    </div>
                </div>
                <p class="text-2xl lg:text-3xl font-bold text-emerald-600">{{ $operativosCount }}</p>
                <p class="text-xs text-emerald-600 mt-1">{{ $operativosPorcentaje }}% del total</p>
            </div>
        </div>
        <!-- Mantenimiento Card -->
        <div data-slot="card" class="text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg bg-gradient-to-br from-amber-50 to-white hover:shadow-xl transition-shadow">
            <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-xs lg:text-sm font-medium text-gray-600">Mantenimiento</p>
                    <div class="bg-amber-100 p-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench w-4 h-4 lg:w-5 lg:h-5 text-amber-600"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
                    </div>
                </div>
                <p class="text-2xl lg:text-3xl font-bold text-amber-600">{{ $mantenimientoCount }}</p>
                <p class="text-xs text-amber-600 mt-1">Requieren atención</p>
            </div>
        </div>
        <!-- Fuera Servicio Card -->
        <div data-slot="card" class="text-card-foreground flex flex-col gap-6 rounded-xl border-0 shadow-lg bg-gradient-to-br from-red-50 to-white hover:shadow-xl transition-shadow">
            <div data-slot="card-content" class="[&amp;:last-child]:pb-6 p-4 lg:p-6">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-xs lg:text-sm font-medium text-gray-600">Fuera Servicio</p>
                    <div class="bg-red-100 p-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x w-4 h-4 lg:w-5 lg:h-5 text-red-600"><circle cx="12" cy="12" r="10"></circle><path d="m15 9-6 6"></path><path d="m9 9 6 6"></path></svg>
                    </div>
                </div>
                <p class="text-2xl lg:text-3xl font-bold text-red-600">{{ $fueraCount }}</p>
                <p class="text-xs text-red-600 mt-1">Críticos</p>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl shadow-lg border-0 bg-white">
        <!-- Header & Filters -->
        <div data-slot="card-header" class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 pt-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
            <div class="flex flex-col gap-4">
                <div class="flex items-start justify-between gap-4">
                    <div class="min-w-0 flex-1">
                        <h4 data-slot="card-title" class="flex items-center gap-2 text-base lg:text-xl font-semibold text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind w-5 h-5 lg:w-6 lg:h-6 text-blue-600 flex-shrink-0"><path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path><path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path><path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path></svg>
                            <span class="truncate">Aires Acondicionados</span>
                        </h4>
                        <p data-slot="card-description" class="text-muted-foreground text-xs lg:text-sm mt-1 text-gray-500">Sistema de gestión y control de climatización hospitalaria</p>
                    </div>
                    {{-- onclick="ModalManager.openModal(document.getElementById('addACModal'))" --}}
                    <button id="addACBtn" data-slot="button" class="cursor-pointer inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-blue-600 text-white shadow hover:bg-blue-700 h-8 rounded-md gap-1.5 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-4 h-4 lg:mr-2"><path d="M5 12h14"></path><path d="M12 5v14"></path></svg>
                        <span class="hidden lg:inline">Agregar Aire Acondicionado</span>
                    </button>
                </div>
            </div>
        </div>

        <div data-slot="card-content" class="px-6 [&:last-child]:pb-6 space-y-4">
            <!-- Search & Filters -->
            <div class="flex flex-col lg:flex-row items-center gap-6 w-full">
                <div class="relative w-full lg:w-64">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                    <input id="searchInput" class="placeholder:text-muted-foreground border-input flex h-9 w-full rounded-md border bg-input-background pl-10 pr-3 py-1 text-sm outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 transition-all shadow-sm" placeholder="Buscar por código, marca...">
                </div>

                <div class="flex flex-col lg:flex-row gap-4 w-full lg:flex-1 items-center">
                    <div class="flex items-center gap-2 w-full lg:flex-1">
                        <span class="text-xs lg:text-sm font-medium text-gray-600 whitespace-nowrap">Estado:</span>
                        <div class="relative w-full">
                            <select id="filterStatus" class="appearance-none border-input flex h-9 w-full items-center justify-between rounded-md border bg-input-background px-3 py-1 text-xs lg:text-sm outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 cursor-pointer transition-all pr-10">
                                <option value="">Todos</option>
                                <option value="Operativo">Operativo</option>
                                <option value="Mantenimiento">Mantenimiento</option>
                                <option value="Fuera de servicio">Fuera de servicio</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 w-full lg:flex-1">
                        <span class="text-xs lg:text-sm font-medium text-gray-600 whitespace-nowrap">Ubicación:</span>
                        <div class="relative w-full">
                            <select id="filterLocation" class="appearance-none border-input flex h-9 w-full items-center justify-between rounded-md border bg-input-background px-3 py-1 text-xs lg:text-sm outline-none focus-visible:ring-[3px] focus-visible:ring-ring/50 cursor-pointer transition-all pr-10">
                                <option value="">Todas</option>
                                @foreach($areas as $area)
                                    <option value="{{ $area->descripcion }}">{{ $area->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grid -->
            <div id="acGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-3">
                    @foreach($aires as $aire)
                    <div data-slot="card" 
                         data-search="{{ strtolower($aire->numero_bn . ' ' . $aire->nombre_aa . ' ' . $aire->capacidad) }}"
                         data-status="{{ $aire->estado }}"
                         {{-- data-location="{{ $aire->bienNacional?->area?->descripcion ?? '' }}" --}}
                         class="bg-white text-card-foreground flex flex-col gap-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-lg transition-all hover:border-blue-300 group h-full">
                        <div data-slot="card-header" class="px-6 pt-6 pb-3 space-y-2 flex-1">
                             <div class="flex items-start justify-between gap-2">
                                <div class="flex items-center gap-2">
                                    <div class="bg-blue-100 p-1.5 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind w-3.5 h-3.5 text-blue-600"><path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path><path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path><path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path></svg>
                                    </div>
                                    <span class="font-mono text-xs text-gray-600">{{ $aire->numero_bn }}</span>
                                </div>
                                
                                @php
                                    $statusClasses = match(strtolower($aire->estado)) {
                                        'operativo' => 'border-emerald-300 bg-emerald-100 text-emerald-700',
                                        'mantenimiento' => 'border-amber-300 bg-amber-100 text-amber-700',
                                        'fuera de servicio' => 'border-red-300 bg-red-100 text-red-700',
                                        default => 'border-gray-300 bg-gray-100 text-gray-700'
                                    };
                                    $statusIcon = match(strtolower($aire->estado)) {
                                        'operativo' => '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
                                        'mantenimiento' => '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>',
                                        'fuera de servicio' => '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>',
                                        default => ''
                                    };
                                @endphp

                                <span class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium gap-1 {{ $statusClasses }}">
                                    {!! $statusIcon !!}
                                    {{ ucfirst($aire->estado) }}
                                </span>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm text-gray-900 leading-tight">{{ $aire->nombre_aa }}</h3>
                                <p class="text-xs text-gray-500 mt-0.5">{{ $aire->capacidad }}</p>
                            </div>
                        </div>
                        <div data-slot="card-content" class="px-6 pb-6 pt-0 space-y-2">
                             <button onclick="openViewACModal({{ $aire->id }})" class="cursor-pointer flex items-center justify-center w-full h-8 rounded-md bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 text-xs font-medium text-gray-700 hover:from-blue-100 hover:to-indigo-100 transition-colors gap-1.5 bg-blue-50  ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                Ver Más Información
                            </button>
                            <div class="grid grid-cols-2 gap-1.5">
                                <button onclick="openEditACModal({{ $aire->id }})" class="cursor-pointer flex items-center justify-center h-8 rounded-md border border-gray-200 bg-white text-xs font-medium text-gray-700 hover:bg-gray-50 transition-colors gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"></path></svg>
                                    Editar
                                </button>
                                <button class="cursor-pointer flex items-center justify-center h-8 rounded-md border border-red-200 bg-white text-xs font-medium text-red-600 hover:bg-red-50 transition-colors gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path><line x1="10" x2="10" y1="11" y2="17"></line><line x1="14" x2="14" y1="11" y2="17"></line></svg>
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            <div id="countDisplay" class="text-xs lg:text-sm text-gray-500 pt-2 border-t">Mostrando {{ count($aires) }} de {{ count($aires) }} unidades</div>
        </div>
    </div>
</div>


@include('modals.add_ac')
@include('modals.edit_ac')
@include('modals.view_ac')
@include('modals.history_ac')
@include('modals.missing_materials')
@include('modals.add_missing_material')

@push('scripts')
<script src="{{ asset('js/modal.js') }}"></script>
<script src="{{ asset('js/ac_filters.js') }}"></script>
<script src="{{ asset('js/modalController.js') }}"></script>
<script>
    // Asegurar que los botones de cierre funcionen para Add AC Modal
    document.addEventListener('DOMContentLoaded', function() {
        ModalManagerE.init({
            storeUrl: "{{ route('aires-acondicionados.store') }}",
            updateUrl: "",
            botonAdd: document.getElementById('addACBtn'),
            modalAdd: document.getElementById('addACModal'),
            formAdd: document.getElementById('formAddAC'),
            botonEdit: document.getElementById('editACBtn'),
        });









        // Event listeners para Edit AC Modal
        const editModal = document.getElementById('editACModal');
        if (editModal) {
            editModal.querySelectorAll('[data-modal-close]').forEach(btn => {
                btn.addEventListener('click', function() {
                    ModalManager.closeModal(editModal);
                });
            });
            
            const editBackdrop = editModal.querySelector('[data-modal-cancel]');
            if (editBackdrop) {
                editBackdrop.addEventListener('click', function(e) {
                    if (e.target === editBackdrop) {
                        ModalManager.closeModal(editModal);
                    }
                });
            }
        }

        // Event listeners para View AC Modal
        const viewModal = document.getElementById('viewACModal');
        if (viewModal) {
            viewModal.querySelectorAll('[data-modal-close]').forEach(btn => {
                btn.addEventListener('click', function() {
                    ModalManager.closeModal(viewModal);
                });
            });
            
            const viewBackdrop = viewModal.querySelector('[data-modal-cancel]');
            if (viewBackdrop) {
                viewBackdrop.addEventListener('click', function(e) {
                    if (e.target === viewBackdrop) {
                        ModalManager.closeModal(viewModal);
                    }
                });
            }
        }

        // Event listeners para History AC Modal
        const historyModal = document.getElementById('historyACModal');
        if (historyModal) {
            historyModal.querySelectorAll('[data-modal-close]').forEach(btn => {
                btn.addEventListener('click', function() {
                    ModalManager.closeModal(historyModal);
                });
            });
            
            const historyBackdrop = historyModal.querySelector('[data-modal-cancel]');
            if (historyBackdrop) {
                historyBackdrop.addEventListener('click', function(e) {
                    if (e.target === historyBackdrop) {
                        ModalManager.closeModal(historyModal);
                    }
                });
            }
        }

        // Event listeners para Missing Materials Modal
        const materialsModal = document.getElementById('missingMaterialsModal');
        if (materialsModal) {
             materialsModal.querySelectorAll('[data-modal-close]').forEach(btn => {
                btn.addEventListener('click', function() {
                    ModalManager.closeModal(materialsModal);
                });
            });
            
            const materialsBackdrop = materialsModal.querySelector('[data-modal-cancel]');
            if (materialsBackdrop) {
                materialsBackdrop.addEventListener('click', function(e) {
                    if (e.target === materialsBackdrop) {
                        ModalManager.closeModal(materialsModal);
                    }
                });
            }

            // Handle "Add Material" button inside Missing Materials Modal
            const btnAddMaterial = document.getElementById('btnAddMissingMaterial');
            if (btnAddMaterial) {
                btnAddMaterial.addEventListener('click', function() {
                    const acId = materialsModal.dataset.acId;
                    const acName = materialsModal.dataset.acName;
                    
                    // Close Missing Materials Modal
                    ModalManager.closeModal(materialsModal);
                    
                    // Open Add Material Modal with delay
                    setTimeout(() => {
                        openAddMaterialModal(acId, acName);
                    }, 100);
                });
            }
        }

        // Event listeners para Add Material Modal
        const addMaterialModal = document.getElementById('addMaterialModal');
        if (addMaterialModal) {
            addMaterialModal.querySelectorAll('[data-modal-close]').forEach(btn => {
                btn.addEventListener('click', function() {
                    ModalManager.closeModal(addMaterialModal);
                    // Re-open Missing Materials Modal when Add Modal is closed (if needed context exists)
                    const acId = addMaterialModal.dataset.acId;
                    const acName = addMaterialModal.dataset.acName;
                    if (acId) {
                         setTimeout(() => {
                            openMissingMaterialsModal(acId, acName);
                        }, 100);
                    }
                });
            });
            
             const addMaterialBackdrop = addMaterialModal.querySelector('[data-modal-cancel]');
             if (addMaterialBackdrop) {
                addMaterialBackdrop.addEventListener('click', function(e) {
                    if (e.target === addMaterialBackdrop) {
                         // Same close logic as buttons
                         ModalManager.closeModal(addMaterialModal);
                          const acId = addMaterialModal.dataset.acId;
                          const acName = addMaterialModal.dataset.acName;
                          if (acId) {
                             setTimeout(() => {
                                openMissingMaterialsModal(acId, acName);
                            }, 100);
                        }
                    }
                });
            }
        }
    });

    // Función para abrir el modal de edición y pre-llenar datos
    function openEditACModal(acId) {
        // Obtener datos del AC via AJAX
        // fetch(`/aires-acondicionados/${acId}/edit`)
        fetch(`{{ url('aires-acondicionados') }}/${acId}/edit`)
            .then(response => response.json())
            .then(data => {
                // Pre-llenar campos del formulario
                document.getElementById('editACId').value = data.id || '';
                document.getElementById('edit_codigo').value = data.numero_bn || '';
                document.getElementById('edit_marca').value = data.marca || '';
                document.getElementById('edit_modelo').value = data.modelo || '';
                // document.getElementById('edit_numeroSerie').value = data.numero_serie || '';
                // document.getElementById('edit_tipoUnidad').value = data.tipo_unidad || '';
                document.getElementById('edit_estado').value = data.estado || 'operativo';
                
                // Especificaciones técnicas
                document.getElementById('edit_capacidad').value = data.capacidad || '';
                document.getElementById('edit_voltaje').value = data.voltaje || '';
                document.getElementById('edit_refrigerante').value = data.refrigerante || '';
                // document.getElementById('edit_consumoEnergetico').value = data.consumo_energetico || '';
                document.getElementById('edit_temperatura').value = data.temperatura || '';
                document.getElementById('edit_horasUso').value = data.horas_uso || '';
                
                // Ubicación y mantenimiento
                // Ubicación y mantenimiento
                document.getElementById('edit_ubicacion').value = data.ubicacion || '';
                // document.getElementById('edit_area').value = data.area_especifica || '';
                // document.getElementById('edit_responsable').value = data.responsable || '';
                // document.getElementById('edit_fechaInstalacion').value = data.fecha_instalacion || '';
                // document.getElementById('edit_ultimoMantenimiento').value = data.ultimo_mantenimiento || '';
                // document.getElementById('edit_proximoMantenimiento').value = data.proximo_mantenimiento || '';
                document.getElementById('edit_observaciones').value = data.observaciones || '';
                
                // Actualizar action del form con el ID correcto
                document.getElementById('formEditAC').action = `/aires-acondicionados/${acId}`;
                
                // Abrir modal
                ModalManager.openModal(document.getElementById('editACModal'));
            })
            .catch(error => {
                console.error('Error al cargar datos del AC:', error);
                alert('Error al cargar los datos del aire acondicionado');
            });
    }

    // Función para abrir el modal de Ver Más Información
    function openViewACModal(acId) {
        fetch(`{{ url('aires-acondicionados') }}/${acId }`)
            .then(response => response.json())
            .then(data => {
                // Populate Subtitle
                document.getElementById('view_ac_subtitle').innerText = `${data.id.toString().padStart(2, '0')} - ${data.nombre_aa || ''}`;
                
                // // Populate Text Fields
                document.getElementById('view_codigo').innerText = data.numero_bn || 'N/A';
                document.getElementById('view_modelo').innerText = data.modelo || 'N/A';
                // document.getElementById('view_serie').innerText = data.numero_serie || 'N/A';
                // document.getElementById('view_tipo').innerText = data.tipo_unidad || 'N/A';
                // document.getElementById('view_ubicacion').innerText = `${data.ubicacion || ''} ${data.area_especifica ? '- ' + data.area_especifica : ''}`;
                // document.getElementById('view_fecha_instalacion').innerText = data.fecha_instalacion || 'N/A';
                // document.getElementById('view_horas_uso').innerText = data.horas_uso ? data.horas_uso + ' hrs' : 'N/A';
                // document.getElementById('view_ultimo_mant').innerText = data.ultimo_mantenimiento || 'N/A';
                // document.getElementById('view_proximo_mant').innerText = data.proximo_mantenimiento || 'N/A';
                // document.getElementById('view_responsable').innerText = data.responsable || 'N/A';
                // document.getElementById('view_observaciones').innerText = data.observaciones || 'No hay observaciones registradas.';

                // // Technical Fields
                document.getElementById('view_capacidad').innerText = data.capacidad || 'N/A';
                document.getElementById('view_voltaje').innerText = data.voltaje || 'N/A';
                document.getElementById('view_refrigerante').innerText = data.refrigerante || '';
                document.getElementById('view_presionA').innerText = data.presion_alta;
                document.getElementById('view_presionB').innerText = data.presion_baja || 'N/A';

                document.getElementById('view_creacion').innerText = new Date(data.created_at).toISOString().split('T')[0] || 'N/A';
                document.getElementById('view_actualizacion').innerText = new Date(data.updated_at).toISOString().split('T')[0] || 'N/A';


                // Status Badge Logic
                const statusContainer = document.getElementById('view_estado_container');
                let badgeClass = '';
                let icon = '';
                let text = '';

                if (data.estado === 'operativo') {
                    badgeClass = 'bg-emerald-100 text-emerald-700 border-emerald-300';
                    icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big w-3 h-3"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>';
                    text = 'Operativo';
                } else if (data.estado === 'mantenimiento') {
                    badgeClass = 'bg-amber-100 text-amber-700 border-amber-300';
                    icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench w-3 h-3"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>';
                    text = 'Mantenimiento';
                } else {
                    badgeClass = 'bg-red-100 text-red-700 border-red-300';
                    icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x w-3 h-3"><circle cx="12" cy="12" r="10"></circle><path d="m15 9-6 6"></path><path d="m9 9 6 6"></path></svg>';
                    text = 'Fuera de Servicio';
                }

                statusContainer.innerHTML = `<span class="justify-center rounded-md border px-2 py-0.5 font-medium whitespace-nowrap shrink-0 [&>svg]:size-3 [&>svg]:pointer-events-none transition-[color,box-shadow] overflow-hidden flex items-center gap-1 w-fit text-xs ${badgeClass}">${icon}${text}</span>`;

                // Handle Edit Button inside View Modal
                const editBtn = document.getElementById('view_btn_edit');
                editBtn.onclick = function() {
                    ModalManager.closeModal(document.getElementById('viewACModal'));
                    // Small delay to ensure smooth transition? No need, synchronous is fine for basic display toggling if ModalManager handles it.
                   setTimeout(() => {
                        openEditACModal(data.id);
                   }, 100);
                };

                // Handle History Button inside View Modal
                const historyBtn = document.getElementById('view_btn_history');
                historyBtn.onclick = function() {
                    // ModalManager.closeModal(document.getElementById('viewACModal')); // Optional: close view modal first? Usually yes for stack clarity, or keep both?
                    // Let's close view modal to avoid backdrop stacking issues unless managed well.
                    ModalManager.closeModal(document.getElementById('viewACModal'));
                    setTimeout(() => {
                        openHistoryACModal(data.id, data.nombre_aa);
                    }, 100);
                };

                // Handle Missing Materials Button
                const materialsBtn = document.getElementById('view_btn_materials');
                materialsBtn.onclick = function() {
                    ModalManager.closeModal(document.getElementById('viewACModal'));
                    setTimeout(() => {
                        openMissingMaterialsModal(data.id, data.nombre_aa);
                    }, 100);
                };

                // Open Modal
                ModalManager.openModal(document.getElementById('viewACModal'));
            })
            .catch(error => {
                console.error('Error al cargar datos del AC:', error);
                alert('Error al visualizar los datos');
            });
    }

    function openHistoryACModal(acId, acName) {
        // Here you would fetch history data using acId
        // fetch(`/aires-acondicionados/${acId}/history`) ...
        
        // For now, just set the title/subtitle
        document.getElementById('history_ac_subtitle').innerText = acName || 'Aire Acondicionado';
        
        ModalManager.openModal(document.getElementById('historyACModal'));
    }

    function openMissingMaterialsModal(acId, acName) {
        const modal = document.getElementById('missingMaterialsModal');
        document.getElementById('missing_materials_subtitle').innerText = acName || 'Aire Acondicionado';

        // Store context in dataset for navigation
        modal.dataset.acId = acId;
        modal.dataset.acName = acName;
        
        // Here you would fetch materials data
        // fetch(`/aires-acondicionados/${acId}/materials`)
        //    .then(res => res.json())
        //    .then(materials => { ... populate table ... })

        // Clear search input on open
        const searchInput = document.getElementById('searchMaterialsInput');
        if (searchInput) {
            searchInput.value = '';
            // Trigger event to reset table
            searchInput.dispatchEvent(new Event('keyup')); 
        }

        // Open Modal
        ModalManager.openModal(document.getElementById('missingMaterialsModal'));
    }

    // Filter Logic for Materials Modal
    document.addEventListener('DOMContentLoaded', function() {
        const materialSearchInput = document.getElementById('searchMaterialsInput');
        if (materialSearchInput) {
            materialSearchInput.addEventListener('keyup', function() {
                const value = this.value.toLowerCase();
                const rows = document.querySelectorAll('#missing_materials_table_body tr');
                
                rows.forEach(row => {
                    const text = row.innerText.toLowerCase();
                    row.style.display = text.includes(value) ? '' : 'none';
                });
            });
        }
    });

    function openAddMaterialModal(acId, acName) {
        const modal = document.getElementById('addMaterialModal');
        document.getElementById('add_material_subtitle').innerText = acName || 'Aire Acondicionado';
        document.getElementById('add_material_aire_id').value = acId;
        
        // Store context for back navigation
        modal.dataset.acId = acId;
        modal.dataset.acName = acName;

        // Reset form if exists
        const form = document.getElementById('formAddMaterial');
        if (form) form.reset();

        ModalManager.openModal(modal);
    }
</script>
@endpush
@endsection
