<?php

namespace App\Http\Controllers;

use App\Halloffame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class HallOfFameController extends Controller
{
    public function index()
    {
        return view('HallOfFame.index');
    }

    public static function insert($userId){
        $current_time = Carbon::now()->toDateTimeString();
        return DB::table('halloffame')->insert(['userid' => $userId, 'goal' => 0, 'created_at' => $current_time]);
    }


}
