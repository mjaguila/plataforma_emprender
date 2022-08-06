<?php

namespace Database\Seeders;

use App\Models\Articulo;
use Illuminate\Database\Seeder;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articulos = [
            ['categoria_id' => '1','user_id' => '1','titulo' => 'Título','contenido' => 'Contenido','img' => 'img', 'autorizado' => '0'],
        ];

        Articulo::insert($articulos);
    }
}
