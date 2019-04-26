<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'user_id', 'repository'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
