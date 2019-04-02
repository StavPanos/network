<?php

namespace App;

use App\Traits\FriendableTempFix;
use Hootlex\Friendships\Traits\Friendable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, FriendableTempFix;

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
//    protected $hidden = [
//        'password', 'remember_token',
//    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function repositories()
    {
        return $this->hasMany('App\Repository');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }
}
