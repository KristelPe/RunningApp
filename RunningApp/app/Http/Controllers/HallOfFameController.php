<?php

namespace App\Http\Controllers;

use App\Halloffame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HallOfFameController extends Controller
{
    public function index()
    {
        return view('HallOfFame.index');
    }

    public static function insert($userId){
        return DB::table('halloffame')->insert(['userid' => $userId, 'goal' => 0]);
    }
}
