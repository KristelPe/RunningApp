<?php

namespace App\Http\Controllers;

use App\Badge;
use App\Leaderboard;
use Illuminate\Http\Request;
use GuzzleHttp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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





        //uncomment volgende lijn om de json in uw browser te zien
        //dd($acts);
        $totalDistance = 0;
        $avgSpeed = 0;
        $longestDistance = 0;


        $totalDistance = round($totalDistance/1000, 2);
        $longestDistance = round($longestDistance/1000, 2);

        //dd($acts);
        $userId = Auth::user()->id;
        $acts = Activity::where('athlete_id', $userId)->get();
        BadgesController::updateBadges($userId);

        return View::make('users/index', ['totalDistance' => $totalDistance, 'avgSpeed' => $avgSpeed, 'longestDistance' => $longestDistance, 'allActivity' => $acts], compact('badge'));

    }

    public function detail(){
        return view('users.settings');
    }



}
