<?php


use App\Rank;
use Illuminate\Database\Seeder;
/**
 * Created by PhpStorm.
 * User: jolan
 * Date: 13/11/2017
 * Time: 13:26
 */
class RankTableSeeder extends Seeder
{
    public function run(){

        $badges = [
            [
                'id' => 1,
                'title' => 'Rookie Runner',
                'pointsRankUp' => 0
            ],[
                'id' => 2,
                'title' => '',
                'pointsRankUp' => 200
            ],[
                'id' => 3,
                'title' => '',
                'pointsRankUp' => 500
            ],[
                'id' => 4,
                'title' => '',
                'pointsRankUp' => 1000
            ],[
                'id' => 5,
                'title' => '',
                'pointsRankUp' =>2000
            ],


        ];
        foreach($badges as $data){ Rank::create($data);};
    }

}