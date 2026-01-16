<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BNController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {

    

    return view('inicio');
})->name('inicio');

Route::get('/ejemplo', function () {
    return view('ejemplo');
})->name('ejemplo');

Route::get('/bienes-nacionales', [BNController::class, 'index'])->name('bienes-nacionales.index');
Route::post('/bienes-nacionales', [BNController::class, 'store'])->name('bienes-nacionales.store');
Route::put('/bienes-nacionales/{id}', [BNController::class, 'update'])->name('bienes-nacionales.update');
// Route::delete('/bienes-nacionales/{id}', [BNController::class, 'destroy'])->name('bienes-nacionales.destroy');