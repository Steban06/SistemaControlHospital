@extends('layouts.app')

@section('title', 'Inicio - Sistema de Control Hospital')

@section('title_superior', 'Incio - Sistema de Control Hospital')

@section('content')

<style>
    .seccion-resumen {
        margin-top: 40px;
        display: flex;
        width: 100%;
    }

    .seccion-mitad {
        width: 50%;
        /* height: 200px; */
        background-color: #8a8787ff;
        border-radius: 10px;
        margin-bottom: 20px;

        display: flex;
        justify-content: center;
        border: 3px solid #000000;
    }

    .dashboard-cards {
        position: relative;
        display: flex;
        justify-content: space-around;
        /* margin-top: 20px; */
        flex-wrap: wrap;
        /* gap: 20px; */

        border: 3px solid red;
    }

    .card {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px 2px;
        margin: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        text-align: center;
        width: 40%;
    }

    .card-icon {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .card-info h2 {
        margin-bottom: 5px;
    }
</style>

<h1>RESUMEN GENERAL</h1>

<h2>Estado de Equipos</h2>
<section class="seccion-resumen">
    

    <div class="seccion-mitad">
        <div class="dashboard-cards">
            <div class="card">
                <div class="card-icon">
                    <i class="fa-solid fa-check-circle"></i>
                </div>
                <div class="card-info">
                    <h2>100</h2>
                    <p>Operativos</p>
                </div>
            </div>

            <div class="card">
                <div class="card-icon">
                    <i class="fa-solid fa-tools" style="color: orange;"></i>
                </div>
                <div class="card-info">
                    <h2>100</h2>
                    <p>En Mantenimiento</p>
                </div>
            </div>

            <div class="card">
                <div class="card-icon">
                    <i class="fa-solid fa-times-circle" style="color: red;"></i>
                </div>
                <div class="card-info">
                    <h2>100</h2>
                    <p>Fuera de Servicio</p>
                </div>
            </div>
            <div class="card">
                <div class="card-icon">
                    <i class="fa-solid fa-trash" style="color: blue;"></i>
                </div>
                <div class="card-info">
                    <h2>400</h2>
                    <p>Desincorporados</p>
                </div>
            </div>
        </div>
    </div>

    <div class="seccion-mitad">
        <h3>Aqui ira la grafica</h3>
    </div>




</section>





@endsection

