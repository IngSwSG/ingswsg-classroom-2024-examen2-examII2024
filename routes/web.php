<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/materiales', [MaterialController::class, 'index'])->name('materiales.index');

