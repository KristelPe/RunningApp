<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Session;

class GroupsController extends Controller
{
    //
    public function index(){

        $groups = Team::all();

        if(Session::get('loggedIn')){
            $avatarO = Session::get('userAvatarOriginal');
            $avatarM = Session::get('userAvatarMedium');
            return view('groups.index', ['groups' => $groups, 'loggedIn' => true, 'userAvatarO' => $avatarO, 'userAvatarM' => $avatarM]);

        }else{
            return redirect('/login');
        };

    }

    public function detail(){
        if(Session::get('loggedIn')){
            $avatarO = Session::get('userAvatarOriginal');
            $avatarM = Session::get('userAvatarMedium');
            return view('groups.detail', ['loggedIn' => true, 'userAvatarO' => $avatarO, 'userAvatarM' => $avatarM]);

        }else{
            return redirect('/login');
        };
    }
}
