<?php

namespace App\Http\Controllers;

use App\Leaderboard;
use App\Schedule;
use Faker\Provider\DateTime;
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
        if(Auth::check()){

            $userId = Auth::user()->id;
            $token = Auth::user()->token;

            $createdAt = Auth::user()->created_at->toDateString();
            $created = new \DateTime($createdAt);
            //ZEER VUIL!!!

            $acts = StravaController::getAllUserActivity($token);



            //uncomment volgende lijn om de json in uw browser te zien
            //dd($acts);


            $totalDistance = 0;
            $maxSpeed = 0;
            $longestDistance = 0;
            //dd($acts);
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
                        $act['start_date_local'] = substr($act['start_date_local'], 0, 4) . "-" . substr($act['start_date_local'], 4, 2) . "-" . substr($act['start_date_local'], 6, 2);



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
                            'map_polyline' => $act['map']->summary_polyline,
                            'elev_high' => $act['elev_high'],
                            'elev_low' => $act['elev_low'],
                        ]);

                        $newActivity->save();

                    }
                }
            }


            //EINDE VUILIGHEID!!!

            //Zet user in de leaderboards

            $inLeaderboard = Leaderboard::where('user_id', $userId)->first();
            $timesUpdated = $inLeaderboard['run_count'];
            $countActs = Activity::where('athlete_id', $userId)->get();
            $countAct = count($countActs);
            if(!$inLeaderboard){
                //enkel inserten wanneer je nog niet in database staat
                LeaderboardController::insertInLeaderboard($userId);}
            else if($countAct>$timesUpdated){
                //enkel updaten wanneer er een nieuwe activity geupload werd
                LeaderboardController::updateInLeaderboard($userId);
            }

            $runDistance = 0;

            $today = new \DateTime(date("Y-m-d"));

            $endDate = Schedule::where('id', 1)->first()->get();
            foreach ($endDate as $e) {
                $endDateV = new \DateTime($e->endDate);
                $endGoal = $e->endGoal;
            }


            $numberOfWeeks = $today->diff($endDateV);
            //dd($numberOfWeeks);
            $numberOfDays = $numberOfWeeks->days;
            $recomendedDistance = 2000;



            //dd(strtotime('today midnight'));



        if(Activity::where('athlete_id', $userId) != Null) {
            $allActivities = Activity::where('athlete_id', $userId)->where('start_date_local', $today)->get();
            foreach ($allActivities as $a) {
                $runDistance = $runDistance + $a->distance;
            }

            $runDistance = round($runDistance/1000, 2);
            $recomendedDistance = round($recomendedDistance/1000, 2);
        }

            $recomendedDistanceToday = ScheduleController::CalculateGoalToday($numberOfDays, $endGoal);
            $recomendedDistanceYesterday = ScheduleController::CalculateGoalToday($numberOfDays+1, $endGoal);
            $recomendedDistanceTomorrow = ScheduleController::CalculateGoalToday($numberOfDays-1, $endGoal);

            $days = (($created->diff($endDateV))->days)-$numberOfDays;
            $goal = $recomendedDistanceToday - $runDistance;
            if($runDistance >= $recomendedDistanceToday){
                $toRun = 0;
                $goal = 0;
            }else{
                $toRun = 100-(($runDistance/$recomendedDistanceToday)*100);
            }
            //htmlspecialchars() expects parameter 1 to be string, object given (View: /home/vagrant/Code/resources/views/home/index.blade.php)


            return view('home/index', ['runDistance'=>$runDistance, 'daysLeft' => $numberOfDays , 'recomendedDistanceToday' => $recomendedDistanceToday, 'recomendedDistanceTomorrow' => $recomendedDistanceTomorrow, 'recomendedDistanceYesterday' => $recomendedDistanceYesterday, 'goal' => $goal, 'days'=>$days, 'toRun'=>$toRun] );

        }else{
            return view('home/index');
        };
    }

}
