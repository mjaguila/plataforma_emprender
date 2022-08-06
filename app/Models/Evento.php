<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    public $fillable = [
        'titulo', 
        'descripcion',
        'lugar',
        'start',
        'inicio',
        'hora_inicio',
        'end',
        'fin',
        'hora_fin',
        'folleto',
        'autorizado'
    ];
}
