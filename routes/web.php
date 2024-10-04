<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('material', MaterialController::class);

Route::get('/material/create', [MaterialController::class, 'create'])->name('materials.create');
Route::post('/material', [MaterialController::class, 'store'])->name('materials.store');
Route::get('/material/edit', [MaterialController::class, 'edit'])->name('materials.edit');
Route::put('/material', [MaterialController::class, 'update'])->name('materials.update');
Route::get('/materiales', [MaterialController::class, 'index'])->name('materials.index');