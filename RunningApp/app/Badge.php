<?php
/**
 * Created by PhpStorm.
 * User: jolan
 * Date: 13/11/2017
 * Time: 12:54
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable = ['title', 'user_id', 'badge', 'body', 'unit'];

    public function user(){
        return $this->belongsToMany(User::class, 'hasBadge', 'badge_id', 'user_id');
    }
}