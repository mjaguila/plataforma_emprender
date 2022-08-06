<?php

namespace Database\Seeders;

use App\Models\Localidad;
use Illuminate\Database\Seeder;

class LocalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $localidades = [
            ['codigo_localidad' => '86098040000', 'provincia_id' => '9', 'descripcion' => 'SUNCHO CORRAL'],
            ['codigo_localidad' => '86098050000', 'provincia_id' => '9', 'descripcion' => 'VILELAS'],
            ['codigo_localidad' => '86098060000', 'provincia_id' => '9', 'descripcion' => 'YUCHAN'],
            ['codigo_localidad' => '86105010000', 'provincia_id' => '9', 'descripcion' => 'VILLA SAN MARTIN'],
        ];

        Localidad::insert($localidades);
    }
}
