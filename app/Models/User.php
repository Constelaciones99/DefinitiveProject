<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Publicacion; // 👈 Importa aquí
use App\Models\Reaccion;
use App\Models\Comentario;
use App\Models\Guardado;
use App\Models\Seguidor;
use App\Models\Entrenamiento;

class User extends Authenticatable implements AuthenticatableContract
{
    use Notifiable;
    protected $primaryKey = 'username';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'username',
        'name',
        'password',
        'email',
        'country',
        'mode',
        'datec',
    ];



    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'datec' => 'date',
        'mode' => 'integer',
    ];

    // User.php
    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class, 'username', 'username');
    }
}
