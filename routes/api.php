<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

Route::post('/materiales', [MaterialController::class, 'crearMaterial']);