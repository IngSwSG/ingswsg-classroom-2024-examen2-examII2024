<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Material;
use App\Models\Categoria;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Material::class;

    public function definition()
    {
        return [
            'codigo' => $this->faker->randomNumber(),
            'unidadMedida' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'ubicacion' => $this->faker->address,
            'idCategoria' => Categoria::factory(),
        ];
    }
}
