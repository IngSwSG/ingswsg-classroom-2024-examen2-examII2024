<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Presupuesto;

class PresupuestoSeeder extends Seeder
{
    public function run()
    {
        Presupuesto::factory()->count(10)->create();
    }
};