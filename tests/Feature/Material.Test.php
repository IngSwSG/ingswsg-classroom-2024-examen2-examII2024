<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Material;
use App\Models\Categoria;

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function dadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente()
    {
        // Crear una categoría para asociar con el material
        $categoria = Categoria::factory()->create();

        // Datos de material de prueba
        $data = [
            'codigo' => 12345,
            'unidadMedida' => 'Unidad',
            'descripcion' => 'Material de prueba',
            'ubicacion' => 'Almacén A',
            'idCategoria' => $categoria->idCategoria,
        ];

        // Llamar al endpoint para insertar el material
        $response = $this->post(route('material.store'), $data);

        // Verificar que la respuesta tenga un estatus 302 (redirección)
        $response->assertStatus(302);

        // Verificar que el material se haya insertado en la base de datos
        $this->assertDatabaseHas('material', [
            'codigo' => 12345,
            'unidadMedida' => 'Unidad',
            'descripcion' => 'Material de prueba',
            'ubicacion' => 'Almacén A',
            'idCategoria' => $categoria->idCategoria,
        ]);
    }
}
