<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Categoria;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Insertar un material con su categoría asociada.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|integer',
            'unidadMedida' => 'required|string',
            'descripcion' => 'required|string',
            'ubicacion' => 'required|string',
            'categoria_nombre' => 'required|string',
        ]);

        $categoria = Categoria::firstOrCreate(['nombre' => $validated['categoria_nombre']]);
        $material = Material::create([
            'codigo' => $validated['codigo'],
            'unidadMedida' => $validated['unidadMedida'],
            'descripcion' => $validated['descripcion'],
            'ubicacion' => $validated['ubicacion'],
            'idCategoria' => $categoria->idCategoria,
        ]);

        return response()->json($material, 201);
    }
}
