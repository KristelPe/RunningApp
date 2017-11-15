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

    public static function setMaxSpeed($userId){
        $array = DB::table('activities')->where('athlete_id', $userId)->OrderBy('max_speed', 'desc')->first();
        $decode = json_decode(json_encode($array), true);
        $max_speed = $decode['max_speed'];
        if($max_speed>=15){
            $lvl=9;
        }else if($max_speed>14){
            $lvl=8;
        }else if($max_speed>13){
            $lvl=7;
        }else if($max_speed>12){
            $lvl=6;
        }else if($max_speed>11){
            $lvl=5;
        }else if($max_speed>10){
            $lvl=4;
        }else if($max_speed>9){
            $lvl=3;
        }else if($max_speed>8){
            $lvl=2;
        }else if($max_speed>7){
            $lvl=1;
        }else{
            $lvl=0;
        }
        return DB::table('hasBadge')->where('user_id','=', $userId)->where('badge_id', '=', 2)->update(['level' => $lvl, 'relevant_data'=>$max_speed]);

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
        }else if($totalDistance<=1000){
            $lvl=2;
        }else if($totalDistance<=1500){
            $lvl=3;
        }else if($totalDistance<=2000){
            $lvl=4;
        }else if($totalDistance<=2500){
            $lvl=5;
        }else if($totalDistance<=3000){
            $lvl=6;
        }else if($totalDistance<=3500){
            $lvl=7;
        }else if($totalDistance<=4000){
            $lvl=8;
        }else if($totalDistance<=4500){
            $lvl=9;
        }
        return DB::table('hasBadge')->where('user_id','=', $userId)->where('badge_id', '=', 1)->update(['level' => $lvl, 'relevant_data' => $totalDistance]);}

        public static function countRuns($userId){
            $runs = DB::table('activities')->where('athlete_id', $userId)->count();
            if ($runs==1) {
                $lvl=1;
            }else if($runs<=10){
                $lvl=2;
            }else if($runs<=20){
                $lvl=3;
            }else if($runs<=50){
                $lvl=4;
            }else if($runs<=75){
                $lvl=5;
            }else if($runs<=100){
                $lvl=6;
            }else if($runs<=125){
                $lvl=7;
            }else if($runs<=150){
                $lvl=8;
            }else if($runs<=175){
                $lvl=9;
            }else if($runs<=200){
                $lvl=10;
            }
            return DB::table('hasBadge')->where('user_id','=', $userId)->where('badge_id', '=', 3)->update(['level' => $lvl, 'relevant_data' => $runs]);}

}



