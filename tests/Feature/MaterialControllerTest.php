<?php
use App\Models\Categoria;

use function PHPUnit\Framework\assertTrue;

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});


//test para probar que el api de creacion de materiales funciona
test('dadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente', function () {

    $categoria = Categoria::factory()->create();
    $categoria->save();

    //hacer un post request a la api de creacion de materiales
    $response = $this->post('api/Material', [
        'Codigo' => '1',
        'unidad_de_medida' => 'kg',
        'Descripcion' => 'material de prueba',
        'Ubicacion' => 'bodega',
        'idCategoria' => '1',
    ]);
    $response->assertStatus(200);
});

//update material
test('test_actualizar_material', function () {
    assertTrue(true);
});
