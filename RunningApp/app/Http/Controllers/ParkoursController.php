<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ParkoursController extends Controller
{
    //
    public function index(){


        if(Session::get('loggedIn')){
            $avatarO = Session::get('userAvatarOriginal');
            $avatarM = Session::get('userAvatarMedium');
            return view('parkours.index', ['loggedIn' => true, 'userAvatarO' => $avatarO, 'userAvatarM' => $avatarM]);

        }else{
            return redirect('/login');
        };

    }

    public function detail(){

        if(Session::get('loggedIn')){
            $avatarO = Session::get('userAvatarOriginal');
            $avatarM = Session::get('userAvatarMedium');
            return view('parkours.detail', ['loggedIn' => true, 'userAvatarO' => $avatarO, 'userAvatarM' => $avatarM]);

        }else{
            return redirect('/login');
        };

    }
}
