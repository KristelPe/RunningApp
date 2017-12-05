<?php

namespace App\Http\Controllers;

use App\Halloffames;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class HallOfFameController extends Controller
{
    public function index()
    {
        $halloffame = Halloffames::with('user')->get();
        return view('halloffame.index', compact('halloffame'));
    }

    public static function insert($userId){
        $current_time = Carbon::now()->toDateTimeString();
        return DB::table('halloffames')->insert(['userid' => $userId, 'goal' => 0, 'created_at' => $current_time]);
    }


}
