<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empleados = [
            ['descripcion' => 'Ninguno o 0'],
            ['descripcion' => 'Entre 1 y 5 empleados'],
            ['descripcion' => '+ de 5 empleados'],
            ['descripcion' => '+ de 20 empleados'],
        ];

        Empleado::insert($empleados);
    }
}
