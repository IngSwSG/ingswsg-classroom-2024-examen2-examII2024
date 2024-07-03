<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Unidad;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MaterialUnidad>
 */
class MaterialUnidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'Cantidad' => $this->faker->numberBetween(1,10),
            'IdUnidad' => Unidad::factory()->create()->IdUnidad,


        ];
    }
}
