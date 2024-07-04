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
}
