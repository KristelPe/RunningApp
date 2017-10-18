<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use Notifiable;

    protected $fillable = [
        'id', 'athlete', 'name','distance','max_speed','average_speed', 'type',
    ];
}