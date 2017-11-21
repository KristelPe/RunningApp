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
                'unit' => 'm',
                'unlockText' => 'Unlock next level at'
            ],
            [
                'id' => 2,
                'image' => 'https://cdn0.iconfinder.com/data/icons/gamification-flat-awards-and-badges/500/star13-512.png',
                'title' => 'High Speed',
                'description' => 'Boost your high speed!',
                'unit' => 'km/h',
                'unlockText' => 'Unlock next level at'
            ],
            [
                'id' => 3,
                'image' => 'https://cdn0.iconfinder.com/data/icons/gamification-flat-awards-and-badges/500/star13-512.png',
                'title' => 'Total Runs',
                'description' => 'The amount of runs.',
                'unit' => 'runs',
                'unlockText' => 'Unlock next level at'
            ],
            [
                'id' => 4,
                'image' => 'https://cdn0.iconfinder.com/data/icons/gamification-flat-awards-and-badges/500/star13-512.png',
                'title' => 'Cyborg',
                'description' => "You don't feel any pain, you have iron stamina, you're a Cyborg",
                'unit' => 'm',
                'unlockText' => 'Unlock next level at'
            ],
            [
                'id' => 5,
                'image' => 'https://cdn0.iconfinder.com/data/icons/gamification-flat-awards-and-badges/500/star13-512.png',
                'title' => 'Joker',
                'description' => 'Congratulations, you are a disgusting cheater',
                'unit' => 'km/h',
                'unlockText' => 'Unlocked by cheating'

            ],
            [
                'id' => 6,
                'image' => 'https://cdn0.iconfinder.com/data/icons/gamification-flat-awards-and-badges/500/star13-512.png',
                'title' => 'Penguin',
                'description' => "We can't find you... Are you wandering around on the Antarctic?",
                'unit' => 'days',
                'unlockText' => 'Unlocked by inactivity of'

            ],
            [
                'id' => 7,
                'image' => 'https://cdn0.iconfinder.com/data/icons/gamification-flat-awards-and-badges/500/star13-512.png',
                'title' => 'The Flash',
                'description' => "You are the fastest man on earth... on this app",
                'unit' => 'km/h',
                'unlockText' => 'Unlocked by being the fastest'
            ],
            [
                'id' => 8,
                'image' => 'https://cdn0.iconfinder.com/data/icons/gamification-flat-awards-and-badges/500/star13-512.png',
                'title' => 'Superman',
                'description' => "You are the Man of Steel, the strongest man on this app",
                'unit' => 'runs',
                'unlockText' => 'Unlocked by being the strongest'
            ],

        ];
        foreach($badges as $data){ Badge::create($data);};
}

}