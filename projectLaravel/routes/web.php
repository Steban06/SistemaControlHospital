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
