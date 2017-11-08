<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use Notifiable;

    protected $fillable = [
        'id','start_date_local', 'athlete_id', 'name','distance','max_speed','average_speed', 'type', 'moving_time', 'elapsed_time', 'kudos_count'
    ];

    public function getUser(){
        return $this->belongsTo('App\User', 'athlete_id', 'id');
    }
}