<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generos = [
            ['descripcion' => 'Masculino'],
            ['descripcion' => 'Femenino'],
            ['descripcion' => 'Binario'],
            ['descripcion' => 'No contesta'],
        ];

        Genero::insert($generos);
    }
}
