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
            'idCategoria' => 'required|exists:categorias,idCategoria'
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
}
