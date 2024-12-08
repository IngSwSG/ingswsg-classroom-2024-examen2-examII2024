<?php

namespace Database\Factories;

use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Material::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'unidadMedida' => $this->faker->randomElement(['kg', 'g', 'L']),
            'descripcion' => $this->faker->sentence,
            'ubicacion' => $this->faker->randomElement(['Almacén A', 'Almacén B']),
            'categoria_id' => function () {
                return \App\Models\Categoria::factory()->create()->id;
            },
        ];
    }
}
