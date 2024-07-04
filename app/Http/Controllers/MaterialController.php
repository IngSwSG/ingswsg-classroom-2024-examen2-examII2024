<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Categoria;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function create()
    {
        $categorias = Categoria::all();
        return view('materials.create', compact('categorias'));
    }

    public function edit()
    {
        $categorias = Categoria::all();
        return view('materials.edit', compact('categorias'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|exists:materials,id',
            'unidadMedida' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'idCategoria' => 'required|exists:categorias,idCategoria',
        ]);

        $material = Material::findOrFail($validated['id']);
        $material->update($validated);

        return redirect()->route('materials.edit')->with('success', 'Material actualizado correctamente.');
    }
};