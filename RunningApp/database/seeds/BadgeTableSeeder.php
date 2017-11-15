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

        $badges = [
            [
                'id' => 1,
                'image' => 'https://cdn0.iconfinder.com/data/icons/gamification-flat-awards-and-badges/500/star13-512.png',
                'title' => 'Total Distance',
                'description' => 'The total amount of distance you ran.',
                'unit' => 'km',
            ],
            [
                'id' => 2,
                'image' => 'https://cdn0.iconfinder.com/data/icons/gamification-flat-awards-and-badges/500/star13-512.png',
                'title' => 'Hardrunner',
                'description' => 'Boost your high speed!',
                'unit' => 'km/h',
            ],
            [
                'id' => 3,
                'image' => 'https://cdn0.iconfinder.com/data/icons/gamification-flat-awards-and-badges/500/star13-512.png',
                'title' => 'Total time',
                'description' => 'The amount of times you ran.',
                'unit' => 'runs',
            ],
            [
                'id' => 4,
                'image' => 'https://cdn0.iconfinder.com/data/icons/gamification-flat-awards-and-badges/500/star13-512.png',
                'title' => 'Neighbourhood lover',
                'description' => 'Run the same parkour 20 times over',
                'unit' => 'runs',
            ]
        ];
        foreach($badges as $data){ Badge::create($data);};
}

}