<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
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
    public function definition(): array
    {
        return [
                'Codigo' => $this->faker->randomNumber(),
                'unidad_de_medida' => $this->faker->word,
                'Descripcion' => $this->faker->sentence,
                'Ubicacion' => $this->faker->word,
                'idCategoria' => Categoria::factory(),
        ];
    }
}
