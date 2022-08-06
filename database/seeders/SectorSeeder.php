<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectores = [
            ['descripcion' => 'Agrícola / ganadero'],
            ['descripcion' => 'Tecnológico / informática'],
            ['descripcion' => 'Alimentos'],
            ['descripcion' => 'Textil / Accesorios / Moda'],
            ['descripcion' => 'Servicios profesionales'],
            ['descripcion' => 'Construcción'],
            ['descripcion' => 'Carpintería, ferretería y relacionados'],
            ['descripcion' => 'Manualidades y artesanías'],
            ['descripcion' => 'Otro'],
        ];

        Sector::insert($sectores);
    }
}
