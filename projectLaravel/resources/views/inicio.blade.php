@extends('layouts.app')

@section('title', 'Inicio - Sistema de Control Hospital')

@section('content')
<div class="content-filters">
    <div class="input-group">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Buscar...">
    </div>
</div>

<div class="table-container">
    <div class="table-titulo">
        <h2>Bienvenido al Sistema de Control Hospital</h2>
    </div>
    <div class="content-table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Ejemplo 1</td>
                    <td>Descripción del ejemplo 1</td>
                    <td><span class="status delivered">Activo</span></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Ejemplo 2</td>
                    <td>Descripción del ejemplo 2</td>
                    <td><span class="status pending">Pendiente</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

