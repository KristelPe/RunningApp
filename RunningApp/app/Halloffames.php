<?php
/**
 * Created by PhpStorm.
 * User: jolan
 * Date: 12/5/2017
 * Time: 3:23 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Halloffames extends Model
{
    protected $fillable = ['goal'];

    public function user() {
        return $this->hasMany(User::class, 'id', 'userid');
    }
}