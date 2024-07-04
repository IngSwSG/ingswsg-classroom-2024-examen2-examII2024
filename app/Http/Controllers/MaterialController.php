<?php

namespace App\Http\Controllers;

use App\Models\Material;
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

}
