<?php
use App\Models\Categoria;

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});


//test para probar que el api de creacion de materiales funciona
test('test_creacion_material', function () {
    //crear categoria
    $categoria = Categoria::factory()->create();
    //insertar en la base de datos la categoria
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
