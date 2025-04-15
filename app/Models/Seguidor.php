<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Seguidor extends Model
{
    protected $primaryKey = 'id_follow';

    protected $fillable = [
        'id_follow',
        'username',
        'person',
        'mode'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'username');
    }
}
