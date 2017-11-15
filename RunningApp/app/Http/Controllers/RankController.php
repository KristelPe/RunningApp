<?php

namespace App\Http\Controllers;

use App\Badge;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RankController extends Controller
{
    public static function getRank($userId){
        $user = User::firstOrNew(['id' => $userId]);
        $rank = DB::table('hasBadge')->where('user_id', $userId)->first();




        if(!$rank){
            return $user->rank()->attach($rank, ['user_id' => $userId]);
        }
}
}
