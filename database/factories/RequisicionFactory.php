<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Requisicion;
use App\Models\Usuario;

class RequisicionFactory extends Factory
{
    protected $model = Requisicion::class;

    public function definition()
    {
        return [
            'fecha' => $this->faker->dateTime(),
            'estado' => $this->faker->word(),
            'idUsuario' => Usuario::factory(),
        ];
    }
};
