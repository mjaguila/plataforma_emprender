<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configmail extends Model
{
    use HasFactory;
    
    public $fillable = [
        'asunto', 'cuerpo', 'imagen', 'user_id', 'autorizado', 'fecha_enviar'
    ];

    public function mails()
    {
        return $this->hasMany(Mail_masivo::class);
    }
}


