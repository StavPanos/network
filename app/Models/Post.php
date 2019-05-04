<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected $fillable = ['content', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User')->orderBy('created_at', 'DESC');
    }

    public function replies()
    {
        return $this->hasMany('App\Models\Post');
    }
}
