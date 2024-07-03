<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

<<<<<<< HEAD
Route::post('/material', [MaterialController::class, 'store']);
Route::put('/material/{codigo}', [MaterialController::class, 'update']);
Route::get('/material', [MaterialController::class, 'index']);
=======

use App\Http\Controllers\MaterialController;

Route::post('/material', [MaterialController::class, 'store']);

>>>>>>> 5cbe3381800167d81a02b54332a18d8379d8a5fc
