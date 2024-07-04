<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Material;
use App\Models\Categoria;

class MaterialTest extends TestCase
{
    use RefreshDatabase;

    public function testInsertarMaterialConCategoriaExitosamente()
    {
        // Crear una categoría
        $categoria = Categoria::create([
            'idCategoria' => 1,
            'nombre' => 'Metales'
        ]);

        // Datos del material
        $materialData = [
            'unidadMedida' => 'Kilogramos',
            'descripcion' => 'Acero inoxidable',
            'ubicacion' => 'Almacén A',
            'idCategoria' => $categoria->idCategoria,
        ];

        // Enviar solicitud POST para insertar material
        $response = $this->postJson('/insertar-material', $materialData);

        // Registrar la respuesta para depuración
        info('Response:', $response->json());

        // Verificar la respuesta
        $response->assertStatus(201)
                 ->assertJson([
                     'message' => 'Material creado exitosamente',
                     'material' => [
                         'unidadMedida' => $materialData['unidadMedida'],
                         'descripcion' => $materialData['descripcion'],
                         'ubicacion' => $materialData['ubicacion'],
                         'idCategoria' => $materialData['idCategoria'],
                     ],
                 ]);

        // Verificar que el material se ha insertado en la base de datos
        $this->assertDatabaseHas('materials', [
            'unidadMedida' => $materialData['unidadMedida'],
            'descripcion' => $materialData['descripcion'],
            'ubicacion' => $materialData['ubicacion'],
            'idCategoria' => $materialData['idCategoria'],
        ]);
    }
}
