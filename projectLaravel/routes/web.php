<?php

use App\Http\Controllers\AirAcondController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BNController;
use App\Http\Controllers\MaintenanceController;
// Generacion de reportes
use App\Http\Controllers\ReportesController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', function () {
    return redirect()->route('inicio');
})->name('login.post');

Route::any('/logout', function () {
    return redirect()->route('login');
})->name('logout');

use App\Http\Controllers\DashboardController;

// Route::get('/inicio', [DashboardController::class, 'index'])->name('inicio');
Route::get('/inicio', DashboardController::class)->name('inicio');

Route::get('/reportes', [ReportesController::class, 'index'])->name('reportes');
Route::get('/reportes/general', [ReportesController::class, 'reporteGeneral'])->name('reportes.general');
Route::get('/reportes/aires', [ReportesController::class, 'reporteAires'])->name('reportes.aires');
Route::get('/reportes/analitico', [ReportesController::class, 'reporteAnalitico'])->name('reportes.analitico');
Route::get('/reportes/{tipo}/pdf', [ReportesController::class, 'generarPDF'])->name('reportes.pdf');
Route::post('/reportes/custom', [ReportesController::class, 'generarReportePersonalizado'])->name('reportes.custom');

Route::prefix('bienes-nacionales')->group(function () {
    Route::get('/', [BNController::class, 'index'])->name('bienes-nacionales.index');
    Route::post('/', [BNController::class, 'store'])->name('bienes-nacionales.store');
    Route::put('/{id}', [BNController::class, 'update'])->name('bienes-nacionales.update');
    // Route::delete('/{id}', [BNController::class, 'destroy'])->name('bienes-nacionales.destroy');
    Route::get('/history/{id}', [BNController::class, 'history'])->name('bienes-nacionales.history');
});

// Route::get('/bienes-nacionales', [BNController::class, 'index'])->name('bienes-nacionales.index');
// Route::post('/bienes-nacionales', [BNController::class, 'store'])->name('bienes-nacionales.store');
// Route::put('/bienes-nacionales/{id}', [BNController::class, 'update'])->name('bienes-nacionales.update');

// Route::delete('/bienes-nacionales/{id}', [BNController::class, 'destroy'])->name('bienes-nacionales.destroy');

Route::get('/aires-acondicionados', [AirAcondController::class, 'index'])->name('aires-acondicionados.index');
Route::post('/aires-acondicionados', [AirAcondController::class, 'store'])->name('aires-acondicionados.store');
Route::get('/aires-acondicionados/{id}/edit', [AirAcondController::class, 'edit'])->name('aires-acondicionados.edit');
// Route::put('/aires-acondicionados/{id}', [AirAcondController::class, 'update'])->name('aires-acondicionados.update');
Route::get('/aires-acondicionados/{id}', [AirAcondController::class, 'show'])->name('aires-acondicionados.show');



Route::get('/mantenimiento', [MaintenanceController::class, 'index'])->name('mantenimiento.index');
Route::post('/mantenimiento', [MaintenanceController::class, 'store'])->name('mantenimiento.store');
Route::get('/mantenimiento/{id}', [MaintenanceController::class, 'show'])->name('mantenimiento.show');

Route::get('/configuracion', function () {
    return view('configuracion');
})->name('configuracion');