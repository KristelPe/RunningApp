<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HallOfFameController extends Controller
{
    public function index()
    {
        return view('halloffame.index');

    }
}
