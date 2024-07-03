<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MaterialUnidad;
use App\Models\Material;
use App\Models\Unidad;

class MaterialUnidadFactory extends Factory
{
    protected $model = MaterialUnidad::class;

    public function definition()
    {
        return [
            'cantidad' => $this->faker->randomNumber(),
            'idMaterial' => Material::factory(),
            'idUnidad' => Unidad::factory(),
        ];
    }
};
