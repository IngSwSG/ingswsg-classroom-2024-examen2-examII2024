<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Categoria;
use App\Models\Material;

class MaterialTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_material()
    {
        // Crear una categoría para asociarla con el material
        $categoria = Categoria::create([
            'nombre' => 'Categoría de Prueba'
        ]);

        // Datos del material
        $data = [
            'unidadMedida' => 'Metro',
            'descripcion' => 'Material de prueba',
            'ubicacion' => 'Almacén 1',
            'idCategoria' => $categoria->idCategoria,
        ];

        // Hacer una solicitud POST a la ruta de creación de material
        $response = $this->postJson('/api/materiales', $data);

        // Verificar que la respuesta sea exitosa
        $response->assertStatus(201);

        // Verificar que los datos del material se encuentren en la base de datos
        $this->assertDatabaseHas('materials', [
            'unidadMedida' => 'Metro',
            'descripcion' => 'Material de prueba',
            'ubicacion' => 'Almacén 1',
            'idCategoria' => $categoria->idCategoria,
        ]);
    }

    /** @test */
    public function valida_datos_para_crear_material()
    {
        // Datos incompletos o inválidos para el material
        $data = [
            'unidadMedida' => '',
            'descripcion' => '',
            'ubicacion' => '',
            'idCategoria' => 999, // ID de categoría que no existe
        ];

        // Hacer una solicitud POST a la ruta de creación de material
        $response = $this->postJson('/api/materiales', $data);

        // Verificar que la respuesta tenga errores de validación
        $response->assertStatus(400)
                 ->assertJsonValidationErrors(['unidadMedida', 'descripcion', 'ubicacion', 'idCategoria']);
    }
    public function puede_actualizar_material()
    {
        $categoria = Categoria::create([
            'nombre' => 'Categoría de Prueba'
        ]);

        $material = Material::create([
            'unidadMedida' => 'Metro',
            'descripcion' => 'Material de prueba',
            'ubicacion' => 'Almacén 1',
            'idCategoria' => $categoria->idCategoria,
        ]);

        $data = [
            'unidadMedida' => 'Litro',
            'descripcion' => 'Material actualizado',
            'ubicacion' => 'Almacén 2',
            'idCategoria' => $categoria->idCategoria,
        ];

        $response = $this->putJson("/api/actualizar-material/{$material->codigo}", $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('materials', [
            'codigo' => $material->codigo,
            'unidadMedida' => 'Litro',
            'descripcion' => 'Material actualizado',
            'ubicacion' => 'Almacén 2',
            'idCategoria' => $categoria->idCategoria,
 ]);
}

public function puede_obtener_lista_de_materiales_con_categorias()
    {
        $categoria = Categoria::create([
            'nombre' => 'Categoría de Prueba'
        ]);

        $material = Material::create([
            'unidadMedida' => 'Metro',
            'descripcion' => 'Material de prueba',
            'ubicacion' => 'Almacén 1',
            'idCategoria' => $categoria->idCategoria,
        ]);

        $response = $this->getJson('/api/obtener-materiales');

        $response->assertStatus(200);

        $response->assertJson([
            'materiales' => [
                [
                    'codigo' => $material->codigo,
                    'unidadMedida' => 'Metro',
                    'descripcion' => 'Material de prueba',
                    'ubicacion' => 'Almacén 1',
                    'idCategoria' => $categoria->idCategoria,
                    'categoria' => [
                        'idCategoria' => $categoria->idCategoria,
                        'nombre' => 'Categoría de Prueba'
                    ]
                ]
            ]
]);
}
}
