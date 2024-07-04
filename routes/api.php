<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::post('/insertar-material', [ApiController::class, 'insertarMaterialConCategoria']);