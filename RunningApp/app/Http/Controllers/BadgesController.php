<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Badge;
use App\User;
use Illuminate\Support\Facades\DB;

class BadgesController extends Controller
{
public static function getBadges($userId)
{
    $user = User::firstOrNew(['id' => $userId]);
    $badges = Badge::all();


    return $user->badges()->attach($badges, ['user_id' => $userId, 'rank' => "NOT EARNED", 'relevant_data' => 0, 'unlock' => 0]);
}
public static function updateBadges($userId){

        BadgesController::setMaxSpeed($userId);
        BadgesController::totalDistance($userId);
        BadgesController::countRuns($userId);
        BadgesController::badgesOfShameJoker($userId);
        BadgesController::badgesOfShamePenguin($userId);
        BadgesController::flashBadge();
        BadgesController::supermanBadge();
    }


    public static function badgesOfShameJoker($userId){
        $array = DB::table('activities')->where('athlete_id', $userId)->OrderBy('max_speed', 'desc')->first();
        $decode = json_decode(json_encode($array), true);
        $max_speed = $decode['max_speed'];
        $unlock =20;
        $lvl = "NOT EARNED";
        if ($max_speed>$unlock){
            $lvl = "Joker";
        }
        return DB::table('hasBadge')->where('user_id', "=", $userId)->where('badge_id', '=', 5)->update(['rank' => $lvl, 'unlock' => $unlock, 'relevant_data'=>$max_speed]);
    }
    public static function badgesOfShamePenguin($userId){
        $time = DB::table('activities')->where('athlete_id', $userId)->OrderBy('start_date_local', 'desc')->select('start_date_local')->first();
        $decode = json_decode(json_encode($time), true);
        $startdate = strtotime($decode['start_date_local']);
        $startDay = $startdate;
        $one_week_ago = strtotime('-1 week');
        $unlock = 7;
        if( $startdate < $one_week_ago ) {
            // it's longer than one week ago
            $lvl="Penguin";
            return DB::table('hasBadge')->where('user_id', "=", $userId)->where('badge_id', '=', 6)->update(['rank' => $lvl, 'unlock' => $unlock, 'relevant_data'=>$startDay]);
        }
    }

    public static function getLatestBadge($userId){
        return DB::table('hasBadge')->where('user_id','=', $userId)->OrderBy('rank','desc')->first();
    }

    public static function setMaxSpeed($userId){
        $array = DB::table('activities')->where('athlete_id', $userId)->OrderBy('max_speed', 'desc')->first();
        $decode = json_decode(json_encode($array), true);
        $max_speed = $decode['max_speed'];
        if($max_speed>=15){
            $lvl="Fast as a Leopard";
            $unlock=16;
        }else if($max_speed>=14){
            $lvl="Heavy Horse";
            $unlock=15;
        }else if($max_speed>=13){
            $lvl="Hasty Hair";
            $unlock=14;
        }else if($max_speed>=12){
            $lvl="Racing Rabbit";
            $unlock=13;
        }else if($max_speed>=11){
            $lvl="Worrying Wolf";
            $unlock=12;
        }else if($max_speed>=10){
            $lvl="Puny Pig";
           $unlock=11;
        }else if($max_speed>=9){
            $lvl="Comfy Cow";
           $unlock=10;
        }else if($max_speed>=8){
            $lvl="Thirsty Turtle";
            $unlock=9;
        }else if($max_speed>=7){
            $lvl="Waggling Penguin";
            $unlock=8;
        }else{
            $lvl="NOT EARNED";
            $unlock=7;
        }

        return DB::table('hasBadge')->where('user_id','=', $userId)->where('badge_id', '=', 2)->update(['rank' => $lvl, 'unlock' => $unlock, 'relevant_data'=>$max_speed]);

    }
    public static function totalDistance($userId){
        $array = DB::table('activities')->where('athlete_id', $userId)->OrderBy('max_speed', 'desc')->get();
        $totalDistance=0;
        $decode = json_decode(json_encode($array), true);
        foreach ($decode as $dist){
            $totalDistance = $dist['distance'] + $totalDistance;
        }
        if ($totalDistance<500) {
            $lvl=500;
            $unlock = 1000;
        }else if($totalDistance<=1000){
            $lvl=1000;
            $unlock = 5000;
        }else if($totalDistance<=5000){
            $lvl=5000;
            $unlock =10000 ;
        }else if($totalDistance<=10000){
            $lvl=10000;
            $unlock = 20000;
        }else if($totalDistance<=20000){
            $lvl=20000;
            $unlock = 30000;
        }else if($totalDistance<=30000){
            $lvl=30000;
            $unlock = 40000;
        }else if($totalDistance<=40000){
            $lvl=40000;
            $unlock =40000 ;
        }else if($totalDistance<=50000){
            $lvl=50000;
            $unlock = 50000;
        }else if($totalDistance<=60000){
            $lvl=60000;
            $unlock = 60000;
        }

        return DB::table('hasBadge')->where('user_id','=', $userId)->where('badge_id', '=', 1)->update(['rank' => $lvl, 'unlock' =>$unlock, 'relevant_data' => $totalDistance]);}

        public static function countRuns($userId){
            $runs = DB::table('activities')->where('athlete_id', $userId)->count();
            if ($runs==1) {
                $lvl="Off to a start";
                $unlock = 10;
            }else if($runs<=10){
                $lvl="Baby Steps";
                $unlock=10;
            }else if($runs<=20){
                $lvl="Playground";
                $unlock=20;
            }else if($runs<=50){
                $lvl="Motivated Runner";
                $unlock=50;
            }else if($runs<=75){
                $lvl="Not easily Discouraged";
                $unlock=75;
            }else if($runs<=100){
                $lvl="Amazing Stamina";
                $unlock=100;
            }else if($runs<=125){
                $lvl="The Extra Mile";
                $unlock=125;
            }else if($runs<=150){
                $lvl="Expert Athlete";
                $unlock=150;
            }else if($runs<=175){
                $lvl="Professional";
                $unlock=175;
            }else if($runs<=200){
                $lvl="Olympic class";
                $unlock=200;
            }
            return DB::table('hasBadge')->where('user_id','=', $userId)->where('badge_id', '=', 3)->update(['rank' => $lvl,'unlock'=>$unlock, 'relevant_data' => $runs]);
    }
    public static function flashBadge(){
        $array = DB::table('activities')->OrderBy('max_speed', 'desc')->first();
        $fastestRun = json_decode(json_encode($array), true);
        $userId = $fastestRun['athlete_id'];
        return DB::table('hasBadge')->where('badge_id','=',7)->update(['user_id' => $userId,'rank' => 'Unique Badge']);
    }
    public static function supermanBadge(){
        $array = DB::table('activities')->OrderBy('max_speed', 'desc')->first();
        $fastestRun = json_decode(json_encode($array), true);
        $userId = $fastestRun['athlete_id'];
        return DB::table('hasBadge')->where('badge_id','=',7)->update(['user_id' => $userId,'rank' => 'Unique Badge']);
    }

}



