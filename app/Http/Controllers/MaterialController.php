<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Categoria;
use Illuminate\Support\Facades\Log;

class MaterialController extends Controller
{
    public function insertarMaterialConCategoria(Request $request)
    {
        Log::info('Datos recibidos para insertar material:', $request->all());

        $request->validate([
            'unidadMedida' => 'required|string',
            'descripcion' => 'required|string',
            'ubicacion' => 'required|string',
            'idCategoria' => 'required|exists:categorias,idCategoria'
        ]);

        $material = new Material();
        $material->unidadMedida = $request->unidadMedida;
        $material->descripcion = $request->descripcion;
        $material->ubicacion = $request->ubicacion;
        $material->idCategoria = $request->idCategoria;

        try {
            $material->save();
            Log::info('Material guardado exitosamente:', $material->toArray());
        } catch (\Exception $e) {
            Log::error('Error al guardar material:', ['error' => $e->getMessage()]);
            return response()->json([
                'message' => 'Error al crear material',
                'error' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'message' => 'Material creado exitosamente',
            'material' => $material
        ], 201);
    }
}
