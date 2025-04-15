<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Publicacion;
use App\Models\Comentario;

class Reaccion extends Model
{
    protected $primaryKey = 'id_react';

    protected $fillable = [
        'id_react',
        'username',
        'id_post',
        'id_comm',
        'act'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'username');
    }

    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class, 'id_post');
    }

    public function comentario()
    {
        return $this->belongsTo(Comentario::class, 'id_comm');
    }
}
