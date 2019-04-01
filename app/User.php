<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'provider', 'provider_id', 'password', 'avatar', 'provider_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function friends()
    {
        return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id')->withPivot('status');
    }

    public function friend_requests()
    {
        return $this->belongsToMany('App\User', 'friend_requests', 'user_id', 'friend_id');
    }

    public function repositories()
    {
        return $this->hasMany('App\Repository');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
