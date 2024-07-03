<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MaterialUnidad;

class MaterialUnidadSeeder extends Seeder
{
    public function run()
    {
        MaterialUnidad::factory()->count(10)->create();
    }
};