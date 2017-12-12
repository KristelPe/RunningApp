<?php

namespace App\Http\Controllers;


use App\Activity;
use App\Schedule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{

    public function makeAdmin()
    {



        //middleware + input klasse
        if(Input::get('code') == 'IAmRoot'){
            $newAdmin = User::where('id',Input::get('userId'))->first();

            $newAdmin->admin = true;

            $newAdmin->save();


            return redirect('/');
        }elseif (Input::get('code') == 'IAmRoot2'){
            $newAdmin = User::where('id',Input::get('userId'))->first();

            $newAdmin->admin = true;

            $newAdmin->save();

            return redirect('/users');
        }




    }

    public function removeAdmin()
    {


        if(Auth::user()){
            $newAdmin = User::where('id', Input::get('userId'))->first();


            $newAdmin->admin = false;

            $newAdmin->save();

        }


        return redirect('/users');
    }

    public function schedules()
    {





            $schedules = Schedule::all();


            return view('admin/schedules', ['schedules' => $schedules]);





    }

    public function users()
    {


            $users = User::all();
            return view('admin/users', ['users' => $users]);

    }

    public function addSchedule()
    {


            $newSchedule = new Schedule();

            $newSchedule->name = Input::get('name');
            $newSchedule->endGoal = Input::get('distGoal');
            $newSchedule->endDate = Input::get('dateGoal');
            $newSchedule->save();

            return redirect('/schedules');

    }

    public function deleteSchedule()
    {


            Schedule::destroy($_POST['scheduleToDelete']);

            $updateFollow = User::where('followingSchedule', Input::get('scheduleToDelete'));


            foreach ($updateFollow as $u) {


                $u->followingSchedule = Schedule::all()->first;
            }

            return redirect('/schedules');

    }



    public function deleteUser()
    {

            User::destroy(Input::get('userToDelete'));
            Activity::where('athlete_id', Input::get('userToDelete'))->delete();

            return redirect('/users');

    }


}



