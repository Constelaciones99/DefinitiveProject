<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'seguidores';

    protected $fillable = ['id_follow','person', 'mode'];
}
