<?php

namespace App\Models;

use App\Traits\FriendableTempFix;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
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
        return $this->hasMany('App\Models\Repository');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    public function planguages()
    {
        return $this->belongsToMany('App\Models\Planguage');
    }
}
