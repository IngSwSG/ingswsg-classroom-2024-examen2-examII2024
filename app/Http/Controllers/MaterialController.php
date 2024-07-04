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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|integer',
            'unidadMedida' => 'required|string',
            'descripcion' => 'required|string',
            'ubicacion' => 'required|string',
            'idCategoria' => 'required|exists:categoria,idCategoria'
        ]);

        $material = Material::create([
            'codigo' => $validated['codigo'],
            'unidadMedida' => $validated['unidadMedida'],
            'descripcion' => $validated['descripcion'],
            'ubicacion' => $validated['ubicacion'],
            'idCategoria' => $validated['idCategoria']
        ]);

        return redirect()->route('materials.index')->with('success', 'Material creado exitosamente');
    }

    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return view('materials.edit', compact('material'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'unidadMedida' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categoria,idCategoria',
        ]);

        $material = Material::findOrFail($id);
        $material->update([
            'unidadMedida' => $request->unidadMedida,
            'descripcion' => $request->descripcion,
            'ubicacion' => $request->ubicacion,
            'categoria_id' => $request->categoria_id,
        ]);

        return redirect()->route('material.edit')->with('success', 'Material actualizado correctamente.');
    }
};
