<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function makeAdmin(){

        if($_POST['code'] == 'IAmRoot' && Auth::user()){
            $newAdmin = User::where('id', Auth::user()->id)->first();

            $newAdmin->admin = true;

            $newAdmin->save();


        }


        return redirect('/');
    }

    public function schedules(){

        if(Auth::user()->admin){

            $schedules = Schedule::all();
            return view('admin/schedules', ['schedules' => $schedules]);
        }else{
            return redirect('/');
        }



    }

    public function addSchedule(){

        if(Auth::user()->admin){
            $newSchedule = new Schedule();

            $newSchedule->name = $_POST['name'];
            $newSchedule->endGoal = $_POST['distGoal'];

            $newSchedule->endDate = $_POST['dateGoal'];
            $newSchedule->save();

            return redirect('/schedules');
        }else{
            return redirect('/');
        }



    }

    public function deleteSchedule(){

        if(Auth::user()->admin){
            Schedule::destroy($_POST['scheduleToDelete']);

            return redirect('/schedules');
        }else{
            return redirect('/');
        }



    }
    //
}
