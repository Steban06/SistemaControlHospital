<?php

use App\Http\Controllers\AirAcondController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BNController;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\DashboardController;

// Route::get('/inicio', [DashboardController::class, 'index'])->name('inicio');
Route::get('/inicio', DashboardController::class)->name('inicio');

Route::get('/reportes', function () {
    return view('reportes');
})->name('reportes');

Route::get('/bienes-nacionales', [BNController::class, 'index'])->name('bienes-nacionales.index');
Route::post('/bienes-nacionales', [BNController::class, 'store'])->name('bienes-nacionales.store');
Route::put('/bienes-nacionales/{id}', [BNController::class, 'update'])->name('bienes-nacionales.update');
// Route::delete('/bienes-nacionales/{id}', [BNController::class, 'destroy'])->name('bienes-nacionales.destroy');

Route::get('/aires-acondicionados', [AirAcondController::class, 'index'])->name('aires-acondicionados.index');
Route::post('/aires-acondicionados', [AirAcondController::class, 'store'])->name('aires-acondicionados.store');
Route::get('/aires-acondicionados/{id}/edit', [AirAcondController::class, 'edit'])->name('aires-acondicionados.edit');
// Route::put('/aires-acondicionados/{id}', [AirAcondController::class, 'update'])->name('aires-acondicionados.update');
Route::get('/aires-acondicionados/{id}', [AirAcondController::class, 'show'])->name('aires-acondicionados.show');

use App\Http\Controllers\MaintenanceController;

Route::get('/mantenimiento', [MaintenanceController::class, 'index'])->name('mantenimiento.index');
Route::post('/mantenimiento', [MaintenanceController::class, 'store'])->name('mantenimiento.store');
Route::get('/mantenimiento/{id}', [MaintenanceController::class, 'show'])->name('mantenimiento.show');

Route::get('/configuracion', function () {
    return view('configuracion');
})->name('configuracion');