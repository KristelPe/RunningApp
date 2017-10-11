<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupsController extends Controller
{
    //
    public function index(){
        return view('groups.index');
    }

    public function detail(){
        return view('groups.detail');
    }
}
