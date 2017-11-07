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


            $runDistance = 0;
            $recomendedTotalDistance = 4;
            $recomendedDistance = 2000;

        if(Activity::where('athlete_id', $userId) != Null) {
            $allActivities = Activity::where('athlete_id', $userId)->where('start_date_local', '>' ,20171101)->get();
            $x = 1;
            foreach ($allActivities as $a) {
                $runDistance = $runDistance + $a->distance;
                $recomendedDistance = $recomendedDistance + ($a->distance)* 1.1;



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
