<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        $eventos = [
            [
                'titulo' => 'Capacitación', 
                'descripcion' => 'Capacitación', 
                'lugar' => 'SUNCHO CORRAL',
                'start' => '2022-03-22 05:00:00',
                'inicio' => '2022-03-22',
                'hora_inicio' => '05:00:00', 
                'end' => '2022-03-25 13:00:00',
                'fin' => '2022-03-25', 
                'hora_fin' => '13:00:00',
                'folleto' => 'folleto',
                'autorizado' => '0'
            ]
        ];

        Evento::insert($eventos);
    }
}
