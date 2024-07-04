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
    public function it_updates_a_material()
    {
        $categoria = Categoria::factory()->create();

        $material = Material::factory()->create([
            'categoria_id' => $categoria->idCategoria,
        ]);

        // Datos para actualizar el material
        $data = [
            'unidadMedida' => 'kg',
            'descripcion' => 'Material actualizado',
            'ubicacion' => 'Almacén A',
            'idCategoria' => $categoria->idCategoria, // Utilizamos la misma categoría creada
        ];

        $response = $this->put('/materiales/' . $material->codigo, $data);

        // Verificar que la respuesta sea exitosa (código 200)
        $response->assertStatus(200);

        $this->assertDatabaseHas('materials', [
            'codigo' => $material->codigo,
            'unidadMedida' => 'kg',
            'descripcion' => 'Material actualizado',
            'ubicacion' => 'Almacén A',
            'categoria_id' => $categoria->idCategoria,
        ]);
    }
}
