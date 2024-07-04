<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

Route::post('/materiales', [MaterialController::class, 'crearMaterial']);
Route::put('/actualizar-material/{codigo}', [MaterialController::class, 'actualizarMaterial']);
Route::get('/obtener-materiales', [MaterialController::class, 'obtenerMateriales']);