<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;

    public $fillable = [
        'localidad_id',
        'provincia_id',
        'descripcion'
    ];

    public function provincia(){
        return $this->belongsTo(Provincia::class);
    }
}
