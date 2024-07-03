<?php
use App\Models\Material;
use App\Models\Categoria;

test('dado un material que no existe, insertarMaterial funciona correctamente', function () {
    $categoriaNombre = $this->faker->word;

    $data = [
        'codigo' => $this->faker->randomNumber(),
        'unidadMedida' => $this->faker->word,
        'descripcion' => $this->faker->sentence,
        'ubicacion' => $this->faker->address,
        'categoria_nombre' => $categoriaNombre,
    ];

    $response = $this->postJson('/api/material', $data);

    $response->assertStatus(201)
             ->assertJsonFragment([
                 'codigo' => $data['codigo'],
                 'unidadMedida' => $data['unidadMedida'],
                 'descripcion' => $data['descripcion'],
                 'ubicacion' => $data['ubicacion'],
             ]);

    $this->assertDatabaseHas('materiales', [
        'codigo' => $data['codigo'],
        'unidadMedida' => $data['unidadMedida'],
        'descripcion' => $data['descripcion'],
        'ubicacion' => $data['ubicacion'],
    ]);

    $this->assertDatabaseHas('categorias', [
        'nombre' => $categoriaNombre,
    ]);
});

test('obtener todos los materiales funciona correctamente', function () {
    $categoria1 = Categoria::factory()->create();
    $material1 = Material::factory()->create(['idCategoria' => $categoria1->idCategoria]);
    
    $categoria2 = Categoria::factory()->create();
    $material2 = Material::factory()->create(['idCategoria' => $categoria2->idCategoria]);

    $response = $this->getJson('/api/material');

    $response->assertStatus(200)
             ->assertJsonFragment([
                 'codigo' => $material1->codigo,
                 'unidadMedida' => $material1->unidadMedida,
                 'descripcion' => $material1->descripcion,
                 'ubicacion' => $material1->ubicacion,
                 'idCategoria' => $material1->idCategoria,
             ])
             ->assertJsonFragment([
                 'codigo' => $material2->codigo,
                 'unidadMedida' => $material2->unidadMedida,
                 'descripcion' => $material2->descripcion,
                 'ubicacion' => $material2->ubicacion,
                 'idCategoria' => $material2->idCategoria,
             ]);
});

test('dado un material existente, Actualiza Material funciona correctamente', function () {

    $categoria = Categoria::factory()->create();
    $material = Material::factory()->create(['idCategoria' => $categoria->idCategoria]);

    $newData = [
        'unidadMedida' => $this->faker->word,
        'descripcion' => $this->faker->sentence,
        'ubicacion' => $this->faker->address,
        'idCategoria' => $categoria->idCategoria,
    ];

    $response = $this->putJson("/api/material/{$material->codigo}", $newData);

    $response->assertStatus(200)
             ->assertJsonFragment($newData);

    $this->assertDatabaseHas('materiales', [
        'codigo' => $material->codigo,
        'unidadMedida' => $newData['unidadMedida'],
        'descripcion' => $newData['descripcion'],
        'ubicacion' => $newData['ubicacion'],
    ]);
});