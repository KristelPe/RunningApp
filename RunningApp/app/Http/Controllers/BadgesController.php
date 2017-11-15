<?php

namespace App\Http\Controllers;

use App\Badge;
use App\User;
use DeepCopy\f001\B;
use Illuminate\Http\Request;

class BadgesController extends Controller
{
public static function getBadges($userId){
    $user = User::firstOrNew(['id' => $userId]);
    $badges = Badge::all();
    return $user->badges()->attach($badges, ['user_id' => $userId, 'level' => 0]);
}
}
