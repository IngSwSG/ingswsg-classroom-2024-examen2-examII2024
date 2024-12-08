<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materials')->insert([
            [
                'unidadMedida' => 'kg',
                'descripcion' => 'Material 1',
                'ubicacion' => 'Almacen 1',
                'categoria_id' => 1
            ],
            [
                'unidadMedida' => 'm',
                'descripcion' => 'Material 2',
                'ubicacion' => 'Almacen 2',
                'categoria_id' => 1
            ],
            [
                'unidadMedida' => 'l',
                'descripcion' => 'Material 3',
                'ubicacion' => 'Almacen 3',
                'categoria_id' => 2
            ],
            [
                'unidadMedida' => 'pcs',
                'descripcion' => 'Material 4',
                'ubicacion' => 'Almacen 4',
                'categoria_id' => 2
            ],
        ]);
    }
}
