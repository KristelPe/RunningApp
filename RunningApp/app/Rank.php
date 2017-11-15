<?php
/**
 * Created by PhpStorm.
 * User: jolan
 * Date: 15/11/2017
 * Time: 16:11
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Rank extends Model
{
    protected $fillable = ['title', 'user_id', 'badge', 'body', 'unit'];

    public function user(){
        return $this->belongsToMany(User::class, 'hasRank', 'rank_id', 'user_id');
    }

}