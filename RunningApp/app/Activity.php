<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use Notifiable;

    protected $fillable = [
        'id', 'athlete_id', 'name','distance','max_speed','average_speed', 'type', 'moving_time', 'elapsed_time', 'kudos_count'
    ];

    public function user(){
        $this->hasOne('App\User');
    }
}