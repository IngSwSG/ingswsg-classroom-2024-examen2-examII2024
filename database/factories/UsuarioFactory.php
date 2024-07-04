<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition()
    {
        return [
            'idUsuario' => $this->faker->uuid,
            'identificacion' => $this->faker->unique()->randomNumber(8),
            'nombre' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'telefono' => $this->faker->phoneNumber,
            'unidad_id' => \App\Models\Unidad::factory(),
        ];
    }
};
