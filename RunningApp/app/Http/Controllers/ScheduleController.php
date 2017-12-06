<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    public static function CalculateGoalToday($daysleft, $goal)
    {


        if ($daysleft == 36 ||
            $daysleft == 29 ||
            $daysleft == 22 ||
            $daysleft == 1){

            $recomendedDistance = $goal/1;

        }elseif ($daysleft == 50 ||
            $daysleft == 25 ||
            $daysleft == 24 ||
            $daysleft == 15){

            $recomendedDistance = $goal/1.25;

        }elseif ($daysleft == 43 ||
            $daysleft == 32 ||
            $daysleft == 31){

            $recomendedDistance = $goal/1.42;

        }elseif ($daysleft == 33){

            $recomendedDistance = $goal/1.53;

        }elseif ($daysleft == 64 ||
            $daysleft == 57 ||
            $daysleft == 46 ||
            $daysleft == 45 ||
            $daysleft == 39 ||
            $daysleft == 38 ||
            $daysleft == 34 ||
            $daysleft == 26 ||
            $daysleft == 20 ||
            $daysleft == 10 ||
            $daysleft == 8){

            $recomendedDistance = $goal/1.66;

        }elseif ($daysleft == 47 ||
            $daysleft == 40 ||
            $daysleft == 19 ){

            $recomendedDistance = $goal/1.81;

        }elseif ($daysleft == 60 ||
            $daysleft == 59 ||
            $daysleft == 53 ||
            $daysleft == 52 ||
            $daysleft == 48 ||
            $daysleft == 41 ||
            $daysleft == 18 ||
            $daysleft == 17 ||
            $daysleft == 13 ||
            $daysleft == 12 ||
            $daysleft == 11 ||
            $daysleft == 11){

            $recomendedDistance = $goal/2;

        }elseif ($daysleft == 61 ||
            $daysleft == 54 ||
            $daysleft == 5 ){

            $recomendedDistance = $goal/2.22;

        }elseif ($daysleft == 67 ||
            $daysleft == 66 ||
            $daysleft == 62 ||
            $daysleft == 55 ||
            $daysleft == 27 ||
            $daysleft == 4 ||
            $daysleft == 3 ||
            $daysleft == 2){

            $recomendedDistance = $goal/2.5;

        }elseif ($daysleft == 68){

            $recomendedDistance = $goal/2.85;

        }elseif ($daysleft == 69){

            $recomendedDistance = $goal/3.33;

        }elseif ($daysleft == 70 ||
            $daysleft == 65 ||
            $daysleft == 63 ||
            $daysleft == 58 ||
            $daysleft == 56 ||
            $daysleft == 51 ||
            $daysleft == 49 ||
            $daysleft == 44 ||
            $daysleft == 42 ||
            $daysleft == 37 ||
            $daysleft == 35 ||
            $daysleft == 30 ||
            $daysleft == 28 ||
            $daysleft == 23 ||
            $daysleft == 21||
            $daysleft == 16 ||
            $daysleft == 14 ||
            $daysleft == 9 ||
            $daysleft == 7 ||
            $daysleft % 3 == 0){

            //rustdagen
            $recomendedDistance = 0;
        }else{
            $recomendedDistance = $goal/5;
        }




        return $recomendedDistance;
    }

    public static function calculateGoalWeek($daysleft, $goal)
    {
        if ($daysleft == 70 ||
            $daysleft == 69 ||
            $daysleft == 68 ||
            $daysleft == 67 ||
            $daysleft == 66 ||
            $daysleft == 65 ||
            $daysleft == 64){

            $recomendedDistance = $goal/0.48;

        }elseif($daysleft == 63 ||
            $daysleft == 62 ||
            $daysleft == 61 ||
            $daysleft == 60 ||
            $daysleft == 59 ||
            $daysleft == 58 ||
            $daysleft == 57){

            $recomendedDistance = $goal/0.4;

        }elseif($daysleft == 56 ||
            $daysleft == 55 ||
            $daysleft == 54 ||
            $daysleft == 53 ||
            $daysleft == 52 ||
            $daysleft == 51 ||
            $daysleft == 50){

            $recomendedDistance = $goal/0.37;

        }elseif($daysleft == 49 ||
            $daysleft == 48 ||
            $daysleft == 47 ||
            $daysleft == 46 ||
            $daysleft == 45 ||
            $daysleft == 44 ||
            $daysleft == 43){

            $recomendedDistance = $goal/0.33;

        }elseif($daysleft == 42 ||
            $daysleft == 41 ||
            $daysleft == 40 ||
            $daysleft == 39 ||
            $daysleft == 38 ||
            $daysleft == 37 ||
            $daysleft == 36){

            $recomendedDistance = $goal/0.3;

        }elseif($daysleft == 35 ||
            $daysleft == 34 ||
            $daysleft == 33 ||
            $daysleft == 32 ||
            $daysleft == 31 ||
            $daysleft == 30 ||
            $daysleft == 29){

            $recomendedDistance = $goal/0.27;

        }elseif($daysleft == 28 ||
            $daysleft == 27 ||
            $daysleft == 26 ||
            $daysleft == 25 ||
            $daysleft == 24 ||
            $daysleft == 23 ||
            $daysleft == 22){

            $recomendedDistance = $goal/0.27;

        }elseif($daysleft == 21 ||
            $daysleft == 20 ||
            $daysleft == 19 ||
            $daysleft == 18 ||
            $daysleft == 17 ||
            $daysleft == 16 ||
            $daysleft == 15){

            $recomendedDistance = $goal/0.33;

        }elseif($daysleft == 14 ||
            $daysleft == 13 ||
            $daysleft == 12 ||
            $daysleft == 11 ||
            $daysleft == 10 ||
            $daysleft == 9 ||
            $daysleft == 8){

            $recomendedDistance = $goal/0.37;

        }elseif($daysleft == 7 ||
            $daysleft == 6 ||
            $daysleft == 5 ||
            $daysleft == 4 ||
            $daysleft == 3 ||
            $daysleft == 2 ||
            $daysleft == 1){

            $recomendedDistance = $goal/0.36;

        }else{
            $recomendedDistance = $goal/0.6;
        }

        return $recomendedDistance;
    }

}
