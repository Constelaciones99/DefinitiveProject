<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Reaccion;
use App\Models\Comentario;

class Publicacion extends Model
{
    protected $primaryKey = 'id_post';
    public $incrementing = true;
    protected $table = 'publicaciones';

    protected $fillable = [
        'id_post',
        'username',
        'define',
        'type',
        'datec',
        'photo'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }

    public function reacciones()
    {
        return $this->hasMany(Reaccion::class, 'id_post');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_post');
    }

}
