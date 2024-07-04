<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/materiales/create', [MaterialController::class, 'create'])->name('materiales.create');

// Ruta para almacenar el material
Route::post('/materiales', [MaterialController::class, 'store'])->name('materiales.store');

// Ruta para mostrar un material específico
Route::get('/materiales/{id}', [MaterialController::class, 'show'])->name('materiales.show');