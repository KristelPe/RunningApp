<?php

namespace App\Http\Controllers;

use App\Halloffames;
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
            $runDistanceWeek = 0;

            $today = new \DateTime(date("Y-m-d"));

            $endDate = Schedule::where('id', $followingSchedule)->get();

            foreach ($endDate as $e) {
                $endDateV = new \DateTime($e->endDate);
                $endGoal = $e->endGoal;
                $startDate = $e->created_at;

            }
            $numberOfWeeks = $today->diff($endDateV);
            /*dd($numberOfWeeks);*/
            $numberOfDays = $numberOfWeeks->days;
            $recomendedDistance = 2000;
            $recomendedDistanceWeek = 0;

            $weeksLeft = (int) ($numberOfDays / 7);
            $fewDaysLeft = $numberOfDays % 7;

            $numberOfWeeksStart = $today->diff($startDate);
            $numberOfWeeksStart = $numberOfWeeksStart->days;
            $numberOfWeeksStart = (int) ($numberOfWeeksStart / 7);






        if(Activity::where('athlete_id', $userId) != Null) {
            $allActivities = Activity::where('athlete_id', $userId)->where('start_date_local', $today)->get();
            foreach ($allActivities as $a) {
                $runDistance = $runDistance + $a->distance;
            }

            $runDistance = round($runDistance/1000, 2);
            $recomendedDistance = round($recomendedDistance/1000, 2);
        }



            if(Activity::where('athlete_id', $userId) != Null) {
                $allActivitiesWeek = Activity::where('athlete_id', $userId)->where('start_date_local', '>' , date("Y-m-d",strtotime( "previous monday" )))->get();
                foreach ($allActivitiesWeek as $aW) {
                    $runDistanceWeek = $runDistanceWeek + $aW->distance;
                }

                $runDistanceWeek = round($runDistanceWeek/1000, 2);
                $recomendedDistanceWeek = round($recomendedDistanceWeek/1000, 2);
            }

            $recomendedDistanceToday = round(ScheduleController::CalculateGoalToday($numberOfDays, $endGoal), 1);
            $recomendedDistanceThisWeek = round(ScheduleController::CalculateGoalWeek($numberOfDays, $endGoal), 1);


            $days = (($created->diff($endDateV))->days)-$numberOfDays;
            $goalToday = $recomendedDistanceToday - $runDistance;
            $goalWeek = $recomendedDistanceThisWeek - $runDistanceWeek;
            if($runDistance >= $recomendedDistanceToday){
                $toRun = 0;
                $goalToday = 0;
                }else{
                $toRun = 100-(($runDistance/$recomendedDistanceToday)*100);
            }

            if($goalWeek <= 0){
                $current_time = Carbon::now()->toDateTimeString();
                $newHOF = Halloffames::firstOrNew(['userId' => $userId]);
                $newHOF->goal = 1;
                $newHOF->userId = $userId;
                $newHOF->updated_at = $current_time;
                $newHOF->save();
                $goalWeek = 0;
            }else{
                Halloffames::where('userId', $userId)->delete();


            }



            //hall of fame insert







            //htmlspecialchars() expects parameter 1 to be string, object given (View: /home/vagrant/Code/resources/views/home/index.blade.php)

            $schedules = Schedule::all();

            return view('home/index', ['numberOfWeeksStart'=>$numberOfWeeksStart,'fewDaysLeft'=>$fewDaysLeft,'weeksLeft'=>$weeksLeft,'goalWeek'=>$goalWeek,'goalThisWeek'=>$recomendedDistanceThisWeek,'schedules' => $schedules, 'runDistance'=>$runDistance, 'daysLeft' => $numberOfDays ,'recomendedDistance' => $recomendedDistance, 'recomendedDistanceToday' => $recomendedDistanceToday, 'goalToday' => $goalToday, 'days'=>$days, 'toRun'=>$toRun] );

        }else{
            return view('home/index');
        };
    }

}
