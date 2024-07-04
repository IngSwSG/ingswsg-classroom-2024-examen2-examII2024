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
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'unidadMedida' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'idCategoria' => 'required|integer|exists:categorias,idCategoria',
        ]);

        // Si la validación falla, devolver errores
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        try {
            // Crear el material con los datos validados
            $material = Material::create([
                'unidadMedida' => $request->unidadMedida,
                'descripcion' => $request->descripcion,
                'ubicacion' => $request->ubicacion,
                'idCategoria' => $request->idCategoria,
            ]);

            // Loggear la creación exitosa del material
            Log::info('Material creado: ' . $material->codigo);

            // Devolver una respuesta exitosa con los datos del material creado
            return response()->json([
                'message' => 'Material creado exitosamente',
                'material' => $material
            ], 201);
        } catch (\Exception $e) {
            // Loggear cualquier error que ocurra durante el proceso
            Log::error('Error al crear el material: ' . $e->getMessage());
            // Devolver una respuesta de error con los detalles
            return response()->json(['error' => 'Error al crear el material', 'details' => $e->getMessage()], 500);
        }
    }
}
