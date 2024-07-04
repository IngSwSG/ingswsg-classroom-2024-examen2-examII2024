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
}
