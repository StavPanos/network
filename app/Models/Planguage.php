<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planguage extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
