<?php

namespace Database\Seeders;

use App\Models\Tipos_emprendimiento;
use Illuminate\Database\Seeder;

class Tipos_emprendimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            ['descripcion' => 'Productivo: Produce o agrega valor a algún bien'],
            ['descripcion' => 'Comercial: Reventa sin valor agregado'],
            ['descripcion' => 'Servicio'],
        ];

        Tipos_emprendimiento::insert($tipos);
    }
}
