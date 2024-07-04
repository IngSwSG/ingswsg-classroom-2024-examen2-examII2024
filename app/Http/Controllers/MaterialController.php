<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Categoria;

class MaterialController extends Controller
{
    // Mostrar el formulario de creación
    public function create()
    {
        
        $categorias = Categoria::all();
        return view('materials.create', compact('categorias'));
    }


    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'unidadMedida' => 'required|string',
            'descripcion' => 'required|string',
            'ubicacion' => 'required|string',
            'categoria_id' => 'nullable|exists:categorias,id', 
            'categoria_nombre' => 'nullable|string' 
        ]);

        
        if ($request->input('categoria_id')) {
            $categoria = Categoria::find($request->input('categoria_id'));
        } else {
            $categoria = Categoria::create([
                'nombre' => $request->input('categoria_nombre')
            ]);
        }

       
        $material = Material::create([
            'unidadMedida' => $request->input('unidadMedida'),
            'descripcion' => $request->input('descripcion'),
            'ubicacion' => $request->input('ubicacion'),
            'categoria_id' => $categoria->id
        ]);

    
        return redirect()->route('materiales.show', ['id' => $material->id])->with('success', 'Material y categoría creados correctamente.');
    }

 
    public function show($id)
    {
        
        $material = Material::with('categoria')->find($id);

       
        if (!$material) {
            return response()->json([
                'message' => 'Material no encontrado'
            ], 404);
        }

      
        return response()->json($material);
    }

     // Mostrar el formulario de edición
     public function edit($id)
     {
         $material = Material::findOrFail($id);
         $categorias = Categoria::all();
         return view('materials.update', compact('material', 'categorias'));
     }
 
     // Actualizar un material
     public function update(Request $request, $id)
     {
         // Validar la solicitud
         $request->validate([
             'unidadMedida' => 'sometimes|required|string',
             'descripcion' => 'sometimes|required|string',
             'ubicacion' => 'sometimes|required|string',
             'categoria_id' => 'nullable|exists:categorias,id', 
             'categoria_nombre' => 'nullable|string' 
         ]);
 
         $material = Material::findOrFail($id);
 
         if ($request->input('categoria_id')) {
             $categoria = Categoria::find($request->input('categoria_id'));
         } elseif ($request->input('categoria_nombre')) {
             $categoria = Categoria::create([
                 'nombre' => $request->input('categoria_nombre')
             ]);
         }
 
         $material->update([
             'unidadMedida' => $request->input('unidadMedida', $material->unidadMedida),
             'descripcion' => $request->input('descripcion', $material->descripcion),
             'ubicacion' => $request->input('ubicacion', $material->ubicacion),
             'categoria_id' => isset($categoria) ? $categoria->id : $material->categoria_id,
         ]);
 
         return redirect()->route('materiales.show', ['id' => $material->id])->with('success', 'Material actualizado correctamente.');
     }
 }

