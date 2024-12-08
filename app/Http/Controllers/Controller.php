<?php

namespace App\Http\Controllers;
use App\Models\Material;
use App\Models\Categoria;

abstract class Controller
{
    public function index()
    {
        $materiales = Material::with('categoria')->get();
        return response()->json($materiales);
    }
}
