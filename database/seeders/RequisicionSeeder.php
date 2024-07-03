<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Requisicion;

class RequisicionSeeder extends Seeder
{
    public function run()
    {
        Requisicion::factory()->count(10)->create();
    }
};
