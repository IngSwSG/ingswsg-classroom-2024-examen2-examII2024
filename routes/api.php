<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/material', [MaterialController::class, 'index']);
Route::post('/material', [MaterialController::class, 'store']);
Route::put('/material/{codigo}', [MaterialController::class, 'update']);

