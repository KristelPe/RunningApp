<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    //
    public function index(){
        $groups = Team::all();

        return view('groups.index', compact('groups'));
    }

    public function detail(){
        return view('groups.detail');
    }
}
