<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;

    public $fillable = [
        'anio',
        'pdf',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
