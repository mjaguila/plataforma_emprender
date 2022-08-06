<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail_masivo extends Model
{
    use HasFactory;

    public $fillable = [
        'configmail_id', 'user_id', 'enviado'
    ];

    public function campania() {
        return $this->belongsTo(ConfigMail::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
