<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materiales = Material::all();

        return response()->json([
            'status' => true,
            'Materiales' => $materiales
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //guardado de materiales entrastes
        $material = new Material();
        $material->Codigo = $request->Codigo;
        $material->unidad_de_medida = $request->unidad_de_medida;
        $material->Descripcion = $request->Descripcion;
        $material->Ubicacion = $request->Ubicacion;
        $material->idCategoria = $request->idCategoria;
        $material->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        //
    }
}
