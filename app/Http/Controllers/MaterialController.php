<?php

namespace App\Http\Controllers;

use App\Models\Material;
use illuminate\Http\Request;
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
        
        $validatedData = $request->validate([
            'unidadMedida' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,idCategoria',
        ]);

       
        $material = Material::findOrFail($codigo);

        
        $material->update($validatedData);

        
        return response()->json([
            'message' => 'Material actualizado',
            'material' => $material
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'unidadMedida' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,idCategoria',
        ]);

        $material = Material::create($validatedData);

        return response()->json([
            'message' => 'Material creado',
            'material' => $material
        ]);
    }
}
