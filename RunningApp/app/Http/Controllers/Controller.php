<?php

namespace App\Http\Controllers;

use App\Leaderboard;
use App\Schedule;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\Activity;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        if(Auth::check()){

            $userId = Auth::user()->id;
            $followingSchedule = Auth::user()->followingSchedule;


            $createdAt = Auth::user()->created_at->toDateString();
            $created = new \DateTime($createdAt);


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
            $runDistanceThisWeek = 0;

            $today = new \DateTime(date("Y-m-d"));

            $endDate = Schedule::where('id', $followingSchedule)->get();
            foreach ($endDate as $e) {
                $endDateV = new \DateTime($e->endDate);
                $endGoal = $e->endGoal;
            }


            $numberOfWeeks = $today->diff($endDateV);
            //dd($numberOfWeeks);
            $numberOfDays = 100; /* $numberOfWeeks->days;*/
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

            $recomendedDistanceToday = round(ScheduleController::CalculateGoalToday($numberOfDays, $endGoal), 1);
            $recomendedDistanceYesterday = round(ScheduleController::CalculateGoalToday(($numberOfDays+1), $endGoal), 1);
            $recomendedDistanceTomorrow = round(ScheduleController::CalculateGoalToday(($numberOfDays-1), $endGoal), 1);


            $days = (($created->diff($endDateV))->days)-$numberOfDays;
            $goal = $recomendedDistanceToday - $runDistance;
            if($runDistance >= $recomendedDistanceToday){
                $toRun = 0;
                $goal = 0;
                }else{
                $toRun = 100-(($runDistance/$recomendedDistanceToday)*100);
            }
            $recommendDistanceThisWeek = $recomendedDistanceToday*7;
            $oneweekago = new \DateTime(date("Y-m-d", strtotime("-1 week")));;
             $allActivities2 = Activity::where('athlete_id', $userId)->where('start_date_local','>', $oneweekago)->get();

            foreach ($allActivities2 as $a2) {
                $runDistanceThisWeek  = $runDistanceThisWeek + $a2->distance;
            }
            $runDistanceThisWeek = round($runDistanceThisWeek /1000, 2);


            if( $runDistanceThisWeek >= $recommendDistanceThisWeek){
                $current_time = Carbon::now()->toDateTimeString();
                DB::table('halloffame')->where('userid', $userId)->update(['goal' => 1, 'updated_at' => $current_time]);
            }
            //htmlspecialchars() expects parameter 1 to be string, object given (View: /home/vagrant/Code/resources/views/home/index.blade.php)

            $schedules = Schedule::all();

            return view('home/index', ['schedules' => $schedules, 'runDistance'=>$runDistance, 'daysLeft' => $numberOfDays ,'recomendedDistance' => $recomendedDistance, 'recomendedDistanceToday' => $recomendedDistanceToday, 'recomendedDistanceTomorrow' => $recomendedDistanceTomorrow, 'recomendedDistanceYesterday' => $recomendedDistanceYesterday, 'goal' => $goal, 'days'=>$days, 'toRun'=>$toRun] );

        }else{
            return view('home/index');
        };
    }

}
