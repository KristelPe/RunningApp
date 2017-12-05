<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use Notifiable;


    protected $fillable = [
        'id', 'name', 'endGoal', 'endDate'
    ];

}