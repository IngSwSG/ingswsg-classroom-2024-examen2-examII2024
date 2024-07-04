<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'codigo' => $this->faker->unique()->numberBetween(1000, 9999),
            'unidadMedida' => $this->faker->randomElement(['kg', 'ltr', 'pcs', 'mtr']),
            'descripcion' => $this->faker->sentence,
            'ubicacion' => $this->faker->address,
            'idCategoria' => \App\Models\Categoria::factory(),
        ];
    }
}