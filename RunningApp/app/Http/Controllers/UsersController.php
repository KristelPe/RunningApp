<?php

namespace App\Http\Controllers;

use App\Badge;
use Illuminate\Http\Request;
use GuzzleHttp;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
use App\Activity;
use View;
use App\Http\Controllers\StravaController;

class UsersController extends Controller
{
    //
    public function index(){

        $token = Auth::user()->token;


        if(Auth::check()){

        }else{
            return redirect('/login');
        };

        $acts = StravaController::getAllUserActivity($token);

        //uncomment volgende lijn om de json in uw browser te zien
        //dd($acts);


        $totalDistance = 0;
        $avgSpeed = 0;
        $longestDistance = 0;
        foreach ($acts as $actClass){
            $act = (array)$actClass;
            $totalDistance = $totalDistance + $act['distance'];
            $avgSpeed = ($act['average_speed'] + $avgSpeed)/count($actClass);
            $longestDistance = max($act['distance'], $longestDistance);


            if (Activity::where('id', '=', $act['id'])->exists()) {
            }else {
                if ($act != null) {
                    $athlete = (array)$act['athlete'];

                    $act['start_date_local'] = preg_replace('/[^0-9.]+/', '', $act['start_date_local']);
                    $act['start_date_local'] = substr($act['start_date_local'], 0, 8);


                    $newActivity = Activity::create([
                        'id' => $act['id'],
                        'athlete_id' => $athlete['id'],
                        'name' => $act['name'],
                        'distance' => $act['distance'],
                        'start_date_local' => $act['start_date_local'],
                        'max_speed' => $act['max_speed'],
                        'average_speed' => $act['average_speed'],
                        'type' => $act['type'],
                        'moving_time' => $act['moving_time'],
                        'elapsed_time' => $act['elapsed_time'],
                        'kudos_count' => $act['kudos_count'],
                    ]);

                    $newActivity->save();
                }
            }
        }

        $totalDistance = round($totalDistance/1000, 2);
        $longestDistance = round($longestDistance/1000, 2);

        //dd($acts);


        //badges
        $badges = Badge::all();

        return View::make('users/index', ['totalDistance' => $totalDistance, 'avgSpeed' => $avgSpeed, 'longestDistance' => $longestDistance, 'allActivity' => $acts, 'token' => $token, 'badges' => $badges])->withuser($token);

    }
    public function detail(){
        return view('users.settings');
    }
}
