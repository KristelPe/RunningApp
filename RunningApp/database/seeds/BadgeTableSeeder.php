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
                'image' => '.\img\badges\total_distance.svg',
                'title' => 'Total Distance',
                'description' => 'The total amount of distance you ran.',
                'unit' => 'm',
                'unlockText' => 'Unlock next level at'
            ],
            [
                'id' => 2,
                'image' => '.\img\badges\high_speed.svg',
                'title' => 'High Speed',
                'description' => 'Boost your high speed!',
                'unit' => 'km/h',
                'unlockText' => 'Unlock next level at'
            ],
            [
                'id' => 3,
                'image' => '.\img\badges\total_runs.svg',
                'title' => 'Total Runs',
                'description' => 'The amount of runs.',
                'unit' => 'runs',
                'unlockText' => 'Unlock next level at'
            ],
            [
                'id' => 4,
                'image' => '.\img\badges\cyborg.svg',
                'title' => 'Cyborg',
                'description' => "You don't feel any pain, you have iron stamina, you're a Cyborg",
                'unit' => 'm',
                'unlockText' => 'Unlock next level at'
            ],
            [
                'id' => 5,
                'image' => '.\img\badges\joker.svg',
                'title' => 'Joker',
                'description' => 'Congratulations, you are a disgusting cheater',
                'unit' => 'km/h',
                'unlockText' => 'Unlocked by cheating'

            ],
            [
                'id' => 6,
                'image' => '.\img\badges\penguin.svg',
                'title' => 'Penguin',
                'description' => "We can't find you... Are you wandering around on the Antarctic?",
                'unit' => 'days',
                'unlockText' => 'Unlocked by inactivity of'

            ],
            [
                'id' => 7,
                'image' => '.\img\badges\flash.svg',
                'title' => 'The Flash',
                'description' => "You are the fastest man on earth... on this app",
                'unit' => 'km/h',
                'unlockText' => 'Unlocked by being the fastest'
            ],
            [
                'id' => 8,
                'image' => '.\img\badges\superman.svg',
                'title'      => 'Superman',
                'description' => "You are the Man of Steel, the strongest man on this app",
                'unit' => 'runs',
                'unlockText' => 'Unlocked by being the strongest'
            ],

        ];
        foreach($badges as $data){ Badge::create($data);};
}

}