<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{

    public function getAllActivityFromUser($userId)
    {
        $allActivities = Activity::where('id', '=', $userId)->get();
        $userId = Auth::user()->id;
        BadgesController::getBadges($userId);
        return $allActivities;
    }

}
