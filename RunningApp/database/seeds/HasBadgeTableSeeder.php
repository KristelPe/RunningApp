<?php

use App\HasBadge;

/**
 * Created by PhpStorm.
 * User: jolan
 * Date: 13/11/2017
 * Time: 15:18
 */
class HasBadgeTableSeeder
{
    public function run(){
        factory(HasBadge::class, 1000000000)->create();
    }

}