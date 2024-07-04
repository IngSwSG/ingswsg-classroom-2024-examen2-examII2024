<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Material;
use App\Models\Categoria;

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test para insertar un material que no existe.
     */
    public function test_dadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente()
    {
        $data = [
            'codigo' => '123',
            'unidadMedida' => 'kg',
            'descripcion' => 'Material de prueba',
            'ubicacion' => 'Almacén A',
            'categoria_nombre' => 'Categoría de prueba',
        ];
    
        $this->assertDatabaseMissing('materiales', ['codigo' => '123']);
        $this->assertDatabaseMissing('categorias', ['nombre' => 'Categoría de prueba']);
    

        $response = $this->postJson('/api/material', $data);
    
        $this->assertDatabaseHas('materiales', ['codigo' => '123']);
        $this->assertDatabaseHas('categorias', ['nombre' => 'Categoría de prueba']);
    }

    /**
     * Test para actualizar un material existente.
     */
    public function test_actualizarMaterial_funcionaCorrectamente()
    {
        $categoria = Categoria::create(['nombre' => 'Categoría de prueba']);
        $material = Material::create([
            'codigo' => '1234',
            'unidadMedida' => 'kg',
            'descripcion' => 'Material de prueba',
            'ubicacion' => 'Almacén A',
            'idCategoria' => $categoria->idCategoria,
        ]);

        $data = [
            'unidadMedida' => 'litros',
            'descripcion' => 'Descripción actualizada',
            'ubicacion' => 'Almacén B',
            'idCategoria' => $categoria->idCategoria,
        ];

        $response = $this->putJson("/api/material/{$material->codigo}", $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('materiales', ['codigo' => '1234', 'descripcion' => 'Descripción actualizada']);
    }

    /**
     * Test para obtener todos los materiales.
     */
    public function test_obtenerMateriales_funcionaCorrectamente()
    {
        $categoria = Categoria::create(['nombre' => 'Categoría de prueba']);
        Material::create([
            'codigo' => '1234',
            'unidadMedida' => 'kg',
            'descripcion' => 'Material de prueba',
            'ubicacion' => 'Almacén A',
            'idCategoria' => $categoria->idCategoria,
        ]);

        $response = $this->getJson('/api/material');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => ['codigo', 'unidadMedida', 'descripcion', 'ubicacion', 'categoria' => ['nombre']]
        ]);
    }
}