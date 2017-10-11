<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParkoursController extends Controller
{
    //
    public function index(){
        return view('parkours.index');
    }

    public function detail(){
        return view('parkours.detail');
    }
}
