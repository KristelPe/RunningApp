<?php
/**
 * Created by PhpStorm.
 * User: jolan
 * Date: 21/11/2017
 * Time: 13:04
 */

namespace App;
use Illuminate\Database\Eloquent\Model;


class Leaderboard extends Model
{
    protected $fillable = ['max_speed', 'run_count', 'total_distance', 'total_time', 'avg_speed', 'avg_distance', 'distance'];

    public function user() {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

}