<?php

namespace Database\Seeders;

use App\Models\Etapa;
use Illuminate\Database\Seeder;

class EtapaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $etapas = [
            ['descripcion' => 'Idea'],
            ['descripcion' => 'Proyecto'],
            ['descripcion' => 'Emprendimiento en actividad'],
            ['descripcion' => 'Empresa'],
        ];

        Etapa::insert($etapas);
    }
}
