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

Route::get('/configuracion', function () {
    return view('configuracion');
})->name('configuracion');