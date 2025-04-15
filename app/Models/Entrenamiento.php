<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Entrenamiento extends Model
{
    protected $primaryKey = 'id_gym';

    protected $fillable = [
        'id_gym',
        'username',
        'type',
        'detail'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'username');
    }
}
