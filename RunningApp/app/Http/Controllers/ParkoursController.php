<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use Session;

class ParkoursController extends Controller
{
    //
    public function index(){


        if(Session::get('loggedIn')){

            $parcours = Activity::all();

            return view('parcours.index', ['loggedIn' => true] , compact('parcours'));

        }else{
            return redirect('/login');
        };

    }

    public function detail(){

        if(Session::get('loggedIn')){
            $avatarO = Session::get('userAvatarOriginal');
            $avatarM = Session::get('userAvatarMedium');
            return view('parcours.detail', ['loggedIn' => true, 'userAvatarO' => $avatarO, 'userAvatarM' => $avatarM]);

        }else{
            return redirect('/login');
        };

    }
}
