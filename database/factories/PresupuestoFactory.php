<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Presupuesto;

class PresupuestoFactory extends Factory
{
    protected $model = Presupuesto::class;

    public function definition()
    {
        return [
            'nombrePresupuesto' => $this->faker->word(),
        ];
    }
};