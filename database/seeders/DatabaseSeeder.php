<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProvinciaSeeder::class);
        $this->call(LocalidadSeeder::class);
        $this->call(SectorSeeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(ClaseSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(EtapaSeeder::class);
        $this->call(ProfesionSeeder::class);
        $this->call(Tipos_emprendimientoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ArticuloSeeder::class);
        $this->call(EventoSeeder::class);
    }
}
