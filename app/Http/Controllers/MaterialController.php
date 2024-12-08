<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class MaterialController extends Controller
{
    public function index()
    {
        $materiales = Material::with('categoria')->get();

        return response()->json([
            'materiales' => $materiales
        ]);
    }

    public function update(Request $request, $codigo)
    {
        $validated = $request->validate([
            'unidadMedida' => 'sometimes|required|max:255',
            'descripcion' => 'sometimes|required|max:255',
            'ubicacion' => 'sometimes|required|max:255',
            'idCategoria' => 'sometimes|required',
        ]);

        $material = Material::where('codigo', $codigo)->firstOrFail();

        $material->update($validated);

        return response()->json($material);
    }

    
    // MaterialController.php
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required',
            'unidadMedida' => 'required',
            'descripcion' => 'required',
            'ubicacion' => 'required',
            'categoria_id' => 'required|exists:categorias,idCategoria', // Asegura que exista la categoría con ese ID
        ]);

        $categoria = Categoria::findOrFail($validated['categoria_id']); // Busca la categoría por ID

        $material = Material::create([
            'codigo' => $validated['codigo'],
            'unidadMedida' => $validated['unidadMedida'],
            'descripcion' => $validated['descripcion'],
            'ubicacion' => $validated['ubicacion'],
            'categoria_id' => $categoria->idCategoria, // Asigna el ID de la categoría encontrada
        ]);

        return response()->json($material, 201);
    }


}
