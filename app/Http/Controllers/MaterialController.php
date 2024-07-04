<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Categoria;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class MaterialController extends Controller
{
    public function crearMaterial(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'unidadMedida' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'idCategoria' => 'required|integer|exists:categorias,idCategoria',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        try {
            $material = Material::create([
                'unidadMedida' => $request->unidadMedida,
                'descripcion' => $request->descripcion,
                'ubicacion' => $request->ubicacion,
                'idCategoria' => $request->idCategoria,
            ]);

            Log::info('Material creado: ' . $material->codigo);

            return response()->json([
                'message' => 'Material creado exitosamente',
                'material' => $material
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error al crear el material: ' . $e->getMessage());
            return response()->json(['error' => 'Error al crear el material', 'details' => $e->getMessage()], 500);
        }
    }

    public function actualizarMaterial(Request $request, $codigo)
{
    $validator = Validator::make($request->all(), [
        'unidadMedida' => 'nullable|string|max:255',
        'descripcion' => 'nullable|string|max:255',
        'ubicacion' => 'nullable|string|max:255',
        'idCategoria' => 'nullable|integer|exists:categorias,idCategoria',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 400);
    }

    try {
        $material = Material::findOrFail($codigo);

        $material->update($request->all());

        return response()->json(['message' => 'Material actualizado exitosamente', 'material' => $material], 200);
    } catch (\Exception $e) {
        Log::error('Error al actualizar el material: ' . $e->getMessage());
        return response()->json(['error' => 'Error al actualizar el material', 'details' => $e->getMessage()], 500);
}
}

public function obtenerMateriales()
{
    try {
        $materiales = Material::with('categoria')->get();

        return response()->json(['materiales' => $materiales], 200);
    } catch (\Exception $e) {
        Log::error('Error al obtener la lista de materiales: ' . $e->getMessage());
        return response()->json(['error' => 'Error al obtener la lista de materiales', 'details' => $e->getMessage()], 500);
}
}
}
