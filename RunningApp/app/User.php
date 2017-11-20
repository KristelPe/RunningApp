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
        'name', 'email', 'password','firstName','lastName','gender', 'followingSchedule', 'avatar', 'avatar_original', 'token', 'id', 'badge', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];


    public function activities() {
        return $this->hasMany('App\Activity');
    }

    public function badges(){
        return $this->belongsToMany(Badge::class, 'hasBadge', 'user_id', 'badge_id')->withPivot('rank', 'unlock', 'relevant_data')->withTimestamps();
    }
}
