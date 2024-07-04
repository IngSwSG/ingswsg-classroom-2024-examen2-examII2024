<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/material/create', [MaterialController::class, 'create'])->name('material.create');
Route::post('/material', [MaterialController::class, 'store'])->name('material.store');
