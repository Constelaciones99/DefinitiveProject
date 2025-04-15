<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Publicacion;

class Guardado extends Model
{
    protected $primaryKey = 'id_save';

    protected $fillable = [
        'id_save',
        'username',
        'id_post'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'username');
    }

    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class, 'id_post');
    }
}
