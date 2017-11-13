<?php

use App\Badge;
use Illuminate\Database\Seeder;
/**
 * Created by PhpStorm.
 * User: jolan
 * Date: 13/11/2017
 * Time: 13:26
 */
class BadgeTableSeeder extends Seeder
{
    public function run(){
        factory(Badge::class, 15)->create();
}

}