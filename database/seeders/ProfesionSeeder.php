<?php

namespace Database\Seeders;

use App\Models\Profesion;
use Illuminate\Database\Seeder;

class ProfesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profesion = [
            ['descripcion' => 'Profesional'],
            ['descripcion' => 'Técnico'],
            ['descripcion' => 'Independiente'],
        ];

        Profesion::insert($profesion);
    }
}
