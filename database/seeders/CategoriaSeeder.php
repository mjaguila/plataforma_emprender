<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            ['descripcion' => 'Categoria 1'],
            ['descripcion' => 'Categoria 2'],
            ['descripcion' => 'Categoria 3'],
            ['descripcion' => 'Categoria 4'],
        ];

        Categoria::insert($categorias);
    }
}
