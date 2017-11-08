<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Activity;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        if(Session::get('loggedIn')){
            $avatarO = Session::get('userAvatarOriginal');
            $avatarM = Session::get('userAvatarMedium');
            $userName = Session::get('userFirstName');
            $userId = Session::get('userId');
            $token = Session::get('token');


            //ZEER VUIL!!!

            $acts = StravaController::getAllUserActivity($token);

            //uncomment volgende lijn om de json in uw browser te zien
            //dd($acts);


            $totalDistance = 0;
            $maxSpeed = 0;
            $longestDistance = 0;
            foreach ($acts as $actClass){
                $act = (array)$actClass;
                $totalDistance = $totalDistance + $act['distance'];
                $maxSpeed = max($act['max_speed'], $maxSpeed);
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

            //EINDE VUILIGHEID!!!


            $runDistance = 0;
            $recomendedTotalDistance = 4;
            $recomendedDistance = 2000;

        if(Activity::where('athlete_id', $userId) != Null) {
            $allActivities = Activity::where('athlete_id', $userId)->where('start_date_local', '>' ,20171106)->get();
            $x = 1;
            foreach ($allActivities as $a) {
                $runDistance = $runDistance + $a->distance;
                //$recomendedDistance = $recomendedDistance + ($a->distance)* 1.1;



            }

            $runDistance = round($runDistance/1000, 2);
            $recomendedDistance = round($recomendedDistance/1000, 2);
            $recomendedTotalDistance = $recomendedDistance*2;
        }

            return view('home/index', ['loggedIn' => true,'runDistance'=>$runDistance, 'userName' => $userName,'recomendedDistance' => $recomendedDistance,'recomendedTotalDistance' => $recomendedTotalDistance, 'userAvatarO' => $avatarO, 'userAvatarM' => $avatarM]);

        }else{
            return view('home/index', ['loggedIn' => false]);
        };
    }

}
