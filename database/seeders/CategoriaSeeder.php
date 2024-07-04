<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Electrónica'],
            ['nombre' => 'Ropa'],
            ['nombre' => 'Herramientas'],
            ['nombre' => 'Juguetes'],
            ['nombre' => 'Libros'],
            // Agrega más categorías si lo deseas
        ];

        Categoria::insert($categorias);
    
    }
}
