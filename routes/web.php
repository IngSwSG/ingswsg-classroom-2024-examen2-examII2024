<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/materiales', [MaterialController::class, 'index'])->name('materiales.index');
Route::put('/materiales/{codigo}', [MaterialController::class, 'update'])->name('materiales.update');
Route::post('/materiales', [MaterialController::class, 'store'])->name('materiales.store');


