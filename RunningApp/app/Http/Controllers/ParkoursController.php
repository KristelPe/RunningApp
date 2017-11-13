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


        if(Auth::check()){

            $parcours = Activity::all();


            return view('parcours.index',  compact('parcours'));

        }else{
            return redirect('/login');
        };

    }

    public function detail(){

        if(Auth::check()){
            /*$avatarO = Session::get('userAvatarOriginal');
            $avatarM = Session::get('userAvatarMedium');
            return view('parcours.detail', ['loggedIn' => true, 'userAvatarO' => $avatarO, 'userAvatarM' => $avatarM]);
            */
            return view('parcours.detail' );
        }else{
            return redirect('/login');
        };

    }
}
