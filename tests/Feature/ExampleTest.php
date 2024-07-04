<?php

use App\Models\Material;
use App\Models\Categoria;
use Illuminate\Support\Facades\Route;

it('stores a material', function () {
    // Creamos datos de prueba para enviar en la solicitud
    $categoria = Categoria::factory()->create([
        'nombre' => 'Categoría de ejemplo',]);

    $data = [
        'unidadMedida' => 'metros',
        'descripcion' => 'Material de prueba',
        'ubicacion' => 'Bodega 1',
        'categoria_id' => $categoria->idCategoria,
    ];

    $response = $this->postJson(route('materiales.store'), $data);

    $response->assertStatus(201);

    $response->assertJson([
        'message' => 'Material creado',
        'material' => [
            'unidadMedida' => $data['unidadMedida'],
            'descripcion' => $data['descripcion'],
            'ubicacion' => $data['ubicacion'],
            'categoria_id' => $data['categoria_id'],
        ]
    ]);

    $this->assertDatabaseHas('materials', $data);
});

