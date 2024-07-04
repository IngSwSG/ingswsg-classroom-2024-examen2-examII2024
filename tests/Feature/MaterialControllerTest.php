<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Categoria;
use App\Models\Material; // Asegúrate de importar el modelo Material

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verifica que se inserte un nuevo material cuando no existe.
     *
     * @return void
     */
    public function test_dadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente()
    {
      
        $this->refreshApplication();

    
        $categoria = Categoria::create([
            'nombre' => 'Nuestra categoria de prueba',
        ]);

       
        $unidadMedida = 'KgBrandon';
        $descripcion = 'Sebastiandescriptivo';
        $ubicacion = 'la casa de Chris';

        
        $response = $this->post(route('materiales.store'), [
            'unidadMedida' => $unidadMedida,
            'descripcion' => $descripcion,
            'ubicacion' => $ubicacion,
            'categoria_id' => $categoria->id, // Envía el ID de la categoría creada
        ]);

        
        $response->assertRedirect(route('materiales.index'));

       
        $this->assertDatabaseHas('materials', [
            'unidadMedida' => $unidadMedida,
            'descripcion' => $descripcion,
            'ubicacion' => $ubicacion,
            'categoria_id' => $categoria->id,
        ]);
    }

    public function test_VerificaIngresoCorrectoDeMateriales()
    {
    
        $data = [
            'unidadMedida' => 'ml',
            'descripcion' => 'examen 2 test',
            'ubicacion' => 'caja',
            'categoria_nombre' => 'juguetes'
        ];

       
        $response = $this->post('/materiales', $data);


        $response->assertRedirect(route('materiales.index'));
        $this->assertDatabaseHas('materials', [
            'unidadMedida' => 'ml',
            'descripcion' => 'examen 2 test',
            'ubicacion' => 'caja',
        ]);

        $this->assertDatabaseHas('categorias', [
            'nombre' => 'juguetes',
        ]);
    }

}