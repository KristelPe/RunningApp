<?php

namespace App\Http\Controllers;
use App\Activity;
use App\Badge;
use App\User;
use App\Leaderboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index(){
        if(Auth::check()){
            $leaderboards = Leaderboard::with('user')->orderBy('total_time', 'desc')->get();
            return view('leaderboard.index',  compact('leaderboards'));
        }else{
            return redirect('/login');
        }
    }
    public static function insertInLeaderboard($userId){
            $acts = Activity::where('athlete_id','=',$userId)->get();
        $countActs = Activity::where('athlete_id','=',$userId)->count();

        $totalDistance = 0;
            $avgSpeed = 0;
            $longestDistance = 0;
            $movingTime = 0;
            $count = 0;
            $avgDistance = 0;
            foreach ($acts as $actClass) {
                $count = $count + 1;
                $totalDistance = $totalDistance + $actClass['distance'];
                $movingTime = $movingTime + $actClass['moving_time'];
                $avgSpeed = ($actClass['average_speed'] + $avgSpeed) / $countActs;
                $longestDistance = max($actClass['distance'], $longestDistance);
                $avgDistance = ($actClass['distance'] + $avgDistance) / $countActs;
            }
            $get = Activity::where('athlete_id', '=', $userId)->OrderBy('max_speed', 'desc')->first();
            $maxSpeed = $get['max_speed'];

            return Leaderboard::insert(['user_id' => $userId, 'max_speed' => $maxSpeed, 'total_distance' => $totalDistance, 'total_time' => $movingTime, 'run_count' => $count, 'avg_speed' => $avgSpeed, 'avg_distance' => $avgDistance]);

    }
        public static function updateInLeaderboard($userId){
            $acts = Activity::where('athlete_id','=',$userId)->get();
            $countActs = Activity::where('athlete_id','=',$userId)->count();
            $boards = Leaderboard::where('user_id', '=' , $userId)->first();
            $latestAct = Activity::where('athlete_id','=',$userId)->orderBy('start_date_local', 'desc')->first();
            $avgDistance = 0;
            $avgSpeed = 0;
            $totalDistance = $boards['total_distance'] + $latestAct['distance'];
            $movingTime = $boards['total_time'] + $latestAct['moving_time'];
            $count = $boards['run_count']+1;
            $get = Activity::where('athlete_id', '=', $userId)->OrderBy('max_speed', 'desc')->first();
            $maxSpeed = $get['max_speed'];

            foreach ($acts as $actClass) {
                $avgSpeed = ($actClass['average_speed'] + $avgSpeed) / $countActs;
                $avgDistance = ($actClass['distance'] + $avgDistance) / $countActs;
            }
            return Leaderboard::where('user_id', "=" , $userId)->update(['max_speed' => $maxSpeed, 'total_distance' => $totalDistance, 'total_time' => $movingTime, 'run_count' => $count, 'avg_speed' => $avgSpeed, 'avg_distance' => $avgDistance]);
        }

}
