<?php

namespace Database\Seeders;

use App\Models\Provincia;
use Illuminate\Database\Seeder;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provincias = [
            ['codigo_provincia' => '2', 'descripcion' => 'Ciudad Autónoma de Buenos Aires'],
            ['codigo_provincia' => '6', 'descripcion' => 'Buenos Aires'],
            ['codigo_provincia' => '10', 'descripcion' => 'Catamarca'],
            ['codigo_provincia' => '14', 'descripcion' => 'Córdoba'],
            ['codigo_provincia' => '18', 'descripcion' => 'Corrientes'],
            ['codigo_provincia' => '22', 'descripcion' => 'Chaco'],
            ['codigo_provincia' => '26', 'descripcion' => 'Chubut'],
            ['codigo_provincia' => '30', 'descripcion' => 'Entre Rios'],
            ['codigo_provincia' => '86', 'descripcion' => 'Santiago del Estero'],
        ];

        Provincia::insert($provincias);
    }
}
