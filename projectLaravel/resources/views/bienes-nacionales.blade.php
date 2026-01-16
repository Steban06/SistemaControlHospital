@extends('layouts.app')

@section('title', 'Bienes Nacionales - Sistema de Control Hospital')

@section('title_superior', 'Gestión de Bienes Nacionales')

@section('content')
<div class="content-filters">
    <div class="input-group">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" id="searchInput" placeholder="Buscar...">
    </div>
    <div class="select-group">
        <label for="rowsPerPageSelect">Filas por página:</label>
        <select id="rowsPerPageSelect" class="rows-select">
            <option value="10" selected>10</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
    <button class="btn-add-bien" id="btnAddBien" title="Agregar nuevo Bien Nacional">
        <i class="fa-solid fa-plus"></i>
        <span>Agregar Bien Nacional</span>
    </button>
</div>

<div class="table-container">
    <div class="content-table">
        <table id="bienesTable">
            <thead>
                <tr>
                    <th class="center">ID</th>
                    <th>#BN</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Ubicacion</th>
                    <th class="center">Estado</th>
                    <th class="center">Acciones</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach($bienesNacionales as $bien)
                <tr>
                    <td class="center">{{ $bien->id }}</td>
                    <td class="center">{{ $bien->numero_bn }}</td>
                    <td>{{ $bien->nombre }}</td>
                    <td class="center">{{ $bien->categoria->tipo ?? 'N/A' }}</td>
                    <td class="center">{{ $bien->area->descripcion ?? 'N/A' }}</td>
                    <td class="center">
                        @php
                            $statusMap = [
                                'Operativo' => 'operativo',
                                'Dañado' => 'danado',
                                'En reparación' => 'reparacion',
                                'Desincorporado' => 'desincorporado',
                            ];
                            $stateClass = $statusMap[$bien->estado ?? ''] ?? 'status-unknown';
                        @endphp
                        <span class="status {{ $stateClass }}">{{ $bien->estado }}</span>
                    </td>
                    <td class="center">
                        <!-- Aquí puedes agregar botones de acción como Editar o Eliminar -->
                        <button class="btn btn-edit" title="Editar Bien Nacional"
                            data-id="{{ $bien->id }}"
                            data-numero="{{ $bien->numero_bn }}"
                            data-nombre="{{ $bien->nombre }}"
                            data-marca="{{ $bien->marca ?? '' }}"
                            data-modelo="{{ $bien->modelo ?? '' }}"
                            data-serial="{{ $bien->serial ?? '' }}"
                            data-area="{{ $bien->area_id ?? '' }}"
                            data-categoria="{{ $bien->categoria_id ?? '' }}"
                            data-estado="{{ $bien->estado ?? '' }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button class="btn btn-delete" title="Eliminar Bien Nacional">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="pagination-container" id="paginationContainer"></div>

<x-modal id="modalAddBien" title="Agregar Nuevo Bien Nacional" icon="plus-circle" form-id="formAddBien" save-btn-id="modalSaveBtn">
    <form class="modal-form" id="formAddBien">
        @csrf
        <div class="modal-form-row">
            <div class="modal-form-group">
                <label for="numeroBN">Número de Bien Nacional (#BN) *</label>
                <input type="text" id="numeroBN" name="numero_bn" required placeholder="Ingrese el número de bien nacional">
            </div>
            <div class="modal-form-group">
                <label for="nombreBien">Nombre del Bien *</label>
                <input type="text" id="nombreBien" name="nombre" required placeholder="Ingrese el nombre del bien">
            </div>
        </div>
        <div class="modal-form-row">
            <div class="modal-form-group">
                <label for="marcaBien">Marca</label>
                <input type="text" id="marcaBien" name="marca" placeholder="Ingrese la marca">
            </div>
            <div class="modal-form-group">
                <label for="modeloBien">Modelo</label>
                <input type="text" id="modeloBien" name="modelo" placeholder="Ingrese el modelo">
            </div>
        </div>
        <div class="modal-form-group full-width">
            <label for="serialBien">Serial</label>
            <input type="text" id="serialBien" name="serial" placeholder="Ingrese el serial">
        </div>
        <div class="modal-form-row">
            <div class="modal-form-group">
                <label for="ubicacionBien">Ubicación *</label>
                <select id="ubicacionBien" name="area_id" required>
                    <option value="">Seleccione una ubicación</option>
                    @foreach ($areas as $area)
                    <option value="{{ $area->id }}">
                        {{ $area->descripcion }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="modal-form-group">
                <label for="categoriaBien">Categoría *</label>
                <select id="categoriaBien" name="categoria_id" required>
                    <option value="">Seleccione una categoría</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">
                        {{ $categoria->tipo }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-form-group full-width">
            <label for="estadoBien">Estado *</label>
            <select id="estadoBien" name="estado" required>
                <option value="Operativo">Operativo</option>
                <option value="Dañado">Dañado</option>
                <option value="En reparación">En reparación</option>
                <option value="Desincorporado">Desincorporado</option>
            </select>
        </div>
    </form>
</x-modal>

<!-- Modal para Editar Bien Nacional (reutiliza el mismo componente) -->
<x-modal id="modalEditBien" title="Actualizar Bien Nacional" icon="pen-to-square" form-id="formEditBien" save-btn-id="modalSaveEditBtn" save-text="Actualizar">
    <form class="modal-form" id="formEditBien">
        @csrf
        <!-- El método será PUT al hacer la petición vía fetch desde JS -->
        <input type="hidden" name="id" id="editId">

        <div class="modal-form-row">
            <div class="modal-form-group">
                <label for="editNumeroBN">Número de Bien Nacional (#BN) *</label>
                <input type="text" id="editNumeroBN" name="numero_bn" required placeholder="Ingrese el número de bien nacional">
            </div>
            <div class="modal-form-group">
                <label for="editNombreBien">Nombre del Bien *</label>
                <input type="text" id="editNombreBien" name="nombre" required placeholder="Ingrese el nombre del bien">
            </div>
        </div>
        <div class="modal-form-row">
            <div class="modal-form-group">
                <label for="editMarcaBien">Marca</label>
                <input type="text" id="editMarcaBien" name="marca" placeholder="Ingrese la marca">
            </div>
            <div class="modal-form-group">
                <label for="editModeloBien">Modelo</label>
                <input type="text" id="editModeloBien" name="modelo" placeholder="Ingrese el modelo">
            </div>
        </div>
        <div class="modal-form-group full-width">
            <label for="editSerialBien">Serial</label>
            <input type="text" id="editSerialBien" name="serial" placeholder="Ingrese el serial">
        </div>
        <div class="modal-form-row">
            <div class="modal-form-group">
                <label for="editUbicacionBien">Ubicación *</label>
                <select id="editUbicacionBien" name="area_id" required>
                    <!-- <option value="">Seleccione una ubicación</option> -->
                    @foreach ($areas as $area)
                    <option value="{{ $area->id }}">
                        {{ $area->descripcion }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="modal-form-group">
                <label for="editCategoriaBien">Categoría *</label>
                <select id="editCategoriaBien" name="categoria_id" required>
                    <!-- <option value="">Seleccione una categoría</option> -->
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">
                        {{ $categoria->tipo }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-form-group full-width">
            <label for="editEstadoBien">Estado *</label>
            <select id="editEstadoBien" name="estado" required>
                <option value="Operativo">Operativo</option>
                <option value="Dañado">Dañado</option>
                <option value="En reparación">En reparación</option>
                <option value="Desincorporado">Desincorporado</option>
            </select>
        </div>
    </form>
</x-modal>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/table-pagination.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/modal.css') }}" type="text/css">
@endpush

@push('scripts')
<script src="{{ asset('js/table-pagination.js') }}"></script>
<script src="{{ asset('js/modal.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializar el ModalManager con las rutas necesarias
        ModalManager.init({
            storeUrl: '{{ route("bienes-nacionales.store") }}',
            updateBaseUrl: '{{ url("bienes-nacionales") }}',
            addButtonId: 'btnAddBien',
            modalAddId: 'modalAddBien',
            formAddId: 'formAddBien',
            modalEditId: 'modalEditBien',
            formEditId: 'formEditBien'
        });

        // Inicializar el sistema de tabla con paginación
        const tablePagination = new TablePagination({
            searchInputId: 'searchInput',
            tableBodyId: 'tableBody',
            paginationContainerId: 'paginationContainer',
            rowsPerPageSelectId: 'rowsPerPageSelect',
            defaultRowsPerPage: 10,
            tableContainerSelector: '.table-container',
            addButtonId: 'btnAddBien',
            onAddButtonClick: function() {
                const btn = document.getElementById('btnAddBien');
                if (btn) btn.click();
            }
        });
    });
</script>
@endpush
@endsection