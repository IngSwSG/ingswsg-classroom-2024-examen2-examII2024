<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\Material;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function ActualizarMaterial()
    {
        $categoria = Categoria::factory()->create();

        $material = Material::factory()->create([
            'categoria_id' => $categoria->idCategoria,
        ]);

      
        $data = [
            'unidadMedida' => 'tons',
            'descripcion' => 'Material actualizandose',
            'ubicacion' => 'Zona zero',
            'idCategoria' => $categoria->idCategoria, 
        ];

        $response = $this->put('/materiales/' . $material->codigo, $data);

      
        $response->assertStatus(200);

        $this->assertDatabaseHas('materials', [
            'codigo' => $material->codigo,
            'unidadMedida' => 'tons',
            'descripcion' => 'Material actualizandose',
            'ubicacion' => 'Zona zero',
            'categoria_id' => $categoria->idCategoria,
        ]);
    }

    /** @test */
    public function it_stores_a_new_material()
    {
        $categoria = Categoria::factory()->create();

        // Datos para crear un nuevo material
        $data = [
            'codigo' => 'M001',
            'unidadMedida' => 'kg',
            'descripcion' => 'Nuevo material',
            'ubicacion' => 'Almacén B',
            'categoria_nombre' => $categoria->nombre, // Utilizamos el nombre de la categoría
        ];

        $response = $this->post('/materiales', $data);

        // Verificar que la respuesta sea exitosa (código 201)
        $response->assertStatus(201);

        // Verificar que el material se haya creado en la base de datos
        $this->assertDatabaseHas('materials', [
            'codigo' => 'M001',
            'unidadMedida' => 'kg',
            'descripcion' => 'Nuevo material',
            'ubicacion' => 'Almacén B',
            'categoria_id' => $categoria->idCategoria,
        ]);
    }
}
