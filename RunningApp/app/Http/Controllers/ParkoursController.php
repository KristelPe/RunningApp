<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class ParkoursController extends Controller
{
    //
    public function index(){




            $parcours = Activity::all();


            return view('parcours.index',  compact("parcours"));



    }

    public function detail($id){


            $avatarO = Session::get('userAvatarOriginal');
            $avatarM = Session::get('userAvatarMedium');

            $activity = Activity::where('id', $id)->get();

            return view('parcours.detail', ['loggedIn' => true, 'userAvatarO' => $avatarO, 'userAvatarM' => $avatarM, 'activity' => $activity]);


    }
}
