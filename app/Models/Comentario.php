<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Publicacion;
use App\Models\User;

class Comentario extends Model
{
    protected $primaryKey = 'id_comm';
    public $incrementing = true;

    protected $fillable = [
        'id_comm',
        'username',
        'id_post',
        'detail'
    ];

    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class, 'id_post');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'username');
    }
}
