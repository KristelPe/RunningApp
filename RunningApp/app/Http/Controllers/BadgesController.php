<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Badge;
use App\User;
use DeepCopy\f001\B;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BadgesController extends Controller
{
public static function getBadges($userId){
    $user = User::firstOrNew(['id' => $userId]);
    $badges = Badge::all();
    $act = Activity::where('id', '=', $userId)->get();
    $exists = DB::table('hasBadge')->where('user_id', $userId)->first();

    if(!$exists){
    return $user->badges()->attach($badges, ['user_id' => $userId, 'level' => 0,'relevant_data' => 0, 'unlock'=>0]);
        }else {
        BadgesController::setMaxSpeed($userId);
        BadgesController::totalDistance($userId);
        BadgesController::countRuns($userId);
    }
    }

    public static function getLatestBadge($userId){
        return DB::table('hasBadge')->where('user_id','=', $userId)->OrderBy('level','desc')->first();
    }

    public static function setMaxSpeed($userId){
        $array = DB::table('activities')->where('athlete_id', $userId)->OrderBy('max_speed', 'desc')->first();
        $decode = json_decode(json_encode($array), true);
        $max_speed = $decode['max_speed'];
        if($max_speed>=15){
            $lvl=9;
            $unlock=16;
        }else if($max_speed>=14){
            $lvl=8;
            $unlock=15;
        }else if($max_speed>=13){
            $lvl=7;
            $unlock=14;
        }else if($max_speed>=12){
            $lvl=6;
            $unlock=13;
        }else if($max_speed>=11){
            $lvl=5;
            $unlock=12;
        }else if($max_speed>=10){
            $lvl=4;
           $unlock=11;
        }else if($max_speed>=9){
            $lvl=3;
           $unlock=10;
        }else if($max_speed>=8){
            $lvl=2;
            $unlock=9;
        }else if($max_speed>=7){
            $lvl=1;
            $unlock=8;
        }else{
            $lvl=0;
            $unlock=7;
        }
        return DB::table('hasBadge')->where('user_id','=', $userId)->where('badge_id', '=', 2)->update(['level' => $lvl, 'unlock' => $unlock, 'relevant_data'=>$max_speed]);

    }
    public static function totalDistance($userId){
        $array = DB::table('activities')->where('athlete_id', $userId)->OrderBy('max_speed', 'desc')->get();
        $totalDistance=0;
        $decode = json_decode(json_encode($array), true);
        foreach ($decode as $dist){
            $totalDistance = $dist['distance'] + $totalDistance;
        }
        if ($totalDistance<500) {
            $lvl=1;
            $unlock = 1000;
        }else if($totalDistance<=1000){
            $lvl=2;
            $unlock = 1500;
        }else if($totalDistance<=1500){
            $lvl=3;
            $unlock =2000 ;
        }else if($totalDistance<=2000){
            $lvl=4;
            $unlock = 2500;
        }else if($totalDistance<=2500){
            $lvl=5;
            $unlock = 3000;
        }else if($totalDistance<=3000){
            $lvl=6;
            $unlock = 3500;
        }else if($totalDistance<=3500){
            $lvl=7;
            $unlock =4000 ;
        }else if($totalDistance<=4000){
            $lvl=8;
            $unlock = 4500;
        }else if($totalDistance<=4500){
            $lvl=9;
            $unlock = 5000;
        }

        return DB::table('hasBadge')->where('user_id','=', $userId)->where('badge_id', '=', 1)->update(['level' => $lvl, 'unlock' =>$unlock, 'relevant_data' => $totalDistance]);}

        public static function countRuns($userId){
            $runs = DB::table('activities')->where('athlete_id', $userId)->count();
            if ($runs==1) {
                $lvl=1;
                $unlock = 10;
            }else if($runs<=10){
                $lvl=2;
                $unlock=10;
            }else if($runs<=20){
                $lvl=3;
                $unlock=20;
            }else if($runs<=50){
                $lvl=4;
                $unlock=50;
            }else if($runs<=75){
                $lvl=5;
                $unlock=75;
            }else if($runs<=100){
                $lvl=6;
                $unlock=100;
            }else if($runs<=125){
                $lvl=7;
                $unlock=125;
            }else if($runs<=150){
                $lvl=8;
                $unlock=150;
            }else if($runs<=175){
                $lvl=9;
                $unlock=175;
            }else if($runs<=200){
                $lvl=10;
                $unlock=200;
            }
            return DB::table('hasBadge')->where('user_id','=', $userId)->where('badge_id', '=', 3)->update(['level' => $lvl,'unlock'=>$unlock, 'relevant_data' => $runs]);}

}



