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

}
