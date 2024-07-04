<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/material/create', [MaterialController::class, 'create'])->name('material.create');
Route::post('/material', [MaterialController::class, 'store'])->name('material.store');
Route::get('/material/edit', [MaterialController::class, 'edit'])->name('material.edit');
Route::post('/material', [MaterialController::class, 'update'])->name('material.update');
