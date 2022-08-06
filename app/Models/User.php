<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable 
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'genero_id',
        'cuil',
        'domicilio',
        'localidad_id',
        'provincia_id',
        'celular',
        'profesion_id',
        'fechnac',
        'nombre',
        'logo',
        'etapa_id',
        'tipos_emprendimiento_id',
        'sector_id',
        'fecha_inicio',
        'clase_id',
        'empleado_id',
        'face',
        'twitter',
        'insta',
        'web',
        'mail',
        'idea',
        'pdf',
        'afip',
        'bromatologia',
        'autorizado'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function genero() {
        return $this->belongsTo(Genero::class);
    }

    public function localidad() {
        return $this->belongsTo(Localidad::class);
    }

    public function provincia() {
        return $this->belongsTo(Provincia::class);
    }

    public function profesion() {
        return $this->belongsTo(Profesion::class);
    }

    public function etapa() {
        return $this->belongsTo(Etapa::class);
    }

    public function tipo_emprendimiento() {
        return $this->belongsTo(Tipos_emprendimiento::class);
    }

    public function sector() {
        return $this->belongsTo(Sector::class);
    }

    public function clase() {
        return $this->belongsTo(Clase::class);
    }

    public function empleado() {
        return $this->belongsTo(Empleado::class);
    }

}
