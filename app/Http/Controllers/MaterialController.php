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


    public function index()
    {
         $materiales = Material::with('categoria')->get();
         return response()->json($materiales);
    }

    public function update(Request $request, $codigo)
    {
        $validated = $request->validate([
            'unidadMedida' => 'sometimes|required',
            'descripcion' => 'sometimes|required',
            'ubicacion' => 'sometimes|required',
            'idCategoria' => 'sometimes|required',
        ]);

        $material = Material::where('codigo', $codigo)->firstOrFail();
        $material->update($validated);

        return response()->json($material);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required',
            'unidadMedida' => 'required',
            'descripcion' => 'required',
            'ubicacion' => 'required',
            'categoria_nombre' => 'required',
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
