<?php

namespace App\Http\Controllers;

use App\Badge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Session;
use App\Activity;
use GuzzleHttp;
use Illuminate\Support\Facades\Auth;


class StravaController extends Controller
{
    public function login(){
        return Socialite::with('strava')->redirect();
    }

    public function getAllUserData(){
        return Socialite::with('strava')->user();
    }

    /* $user = array() van user data en $data moet de key zijn van de data die je wilt */
    public function getUserData($user, $data){
        switch ($data) {
            case 'token':
                return $user->accessTokenResponseBody['access_token'];
                break;
            case 'id':
                return $user->accessTokenResponseBody['athlete'][$data];
                break;
            case 'profile':
                return $user->accessTokenResponseBody['athlete'][$data];
                break;
            case 'profile_medium':
                return $user->accessTokenResponseBody['athlete'][$data];
                break;
            case 'firstname':
                return $user->accessTokenResponseBody['athlete'][$data];
                break;
            case 'lastname':
                return $user->accessTokenResponseBody['athlete'][$data];
                break;
            case 'email':
                return $user->accessTokenResponseBody['athlete'][$data];
                break;
            case 'sex':
                return $user->accessTokenResponseBody['athlete'][$data];
                break;
        }
    }

    public function callback(){
        $loggedInUser = $this->getAllUserData();

        $token = $this->getUserData($loggedInUser, 'token');
        $userId = $this->getUserData($loggedInUser, 'id');
        $userAvatarOriginal = $this->getUserData($loggedInUser, 'profile');
        $userAvatarMedium = $this->getUserData($loggedInUser, 'profile_medium');
        $userFirstName = $this->getUserData($loggedInUser, 'firstname');
        $userLastName = $this->getUserData($loggedInUser, 'lastname');
        $userEmail = $this->getUserData($loggedInUser, 'email');
        $userGender = $this->getUserData($loggedInUser, 'sex');

        //----------------------------------------

        $loginUser = User::firstOrNew(['id' => $userId]);

        $loginUser->token = $token;
        $loginUser->id = $userId;
        $loginUser->firstName = $userFirstName;
        $loginUser->lastName = $userLastName;
        $loginUser->email = $userEmail;
        $loginUser->gender = $userGender;
        $loginUser->avatar_original = $userAvatarOriginal;
        $loginUser->avatar = $userAvatarMedium;
        $loginUser->save();



        Auth::login(User::where('id', $userId)->first());


        $acts = StravaController::getAllUserActivity($token);
        $userId = Auth::user()->id;
        $token = Auth::user()->token;
        $acts = StravaController::getAllUserActivity($token);
            //dd($acts);
        foreach ($acts as $actClass){
            $act['elev_high'] = 0;
            $act['elev_low'] = 0 ;
            $act = (array)$actClass;



            if (Activity::where('id', '=', $act['id'])->exists()) {
            }else {
                if ($act != null && $act['distance'] < 25000 && $act['max_speed'] < 25 && $act['moving_time'] < 9000) {
                    $athlete = (array)$act['athlete'];

                    $act['start_date_local'] = preg_replace('/[^0-9.]+/', '', $act['start_date_local']);
                    $act['start_date_local'] = substr($act['start_date_local'], 0, 4) . "-" . substr($act['start_date_local'], 4, 2) . "-" . substr($act['start_date_local'], 6, 2);




                    $newActivity = Activity::create([
                        'id' => $act['id'],
                        'athlete_id' => $athlete['id'],
                        'name' => $act['name'],
                        'distance' => $act['distance'],
                        'start_date_local' => $act['start_date_local'],
                        'max_speed' => $act['max_speed'],
                        'average_speed' => $act['average_speed'],
                        'type' => $act['type'],
                        'moving_time' => $act['moving_time'],
                        'elapsed_time' => $act['elapsed_time'],
                        'kudos_count' => $act['kudos_count'],
                        'map_polyline' => $act['map']->summary_polyline,
                        'elev_high' => $act['elev_high'],
                        'elev_low' => $act['elev_low'],
                    ]);

                    $newActivity->save();

                }
            }
        }

        //getBadges on refresh

        $hasBadges = DB::table('hasBadge')->where('user_id', $userId)->first();
        if(!$hasBadges){
            BadgesController::getBadges($userId);
        }
        $onHallOfFame = DB::table('halloffame')->where('userid', $userId)->first();
        if(!$onHallOfFame){
            HallOfFameController::insert($userId);
        }



        return redirect('/');

    }

    public static function getAllUserActivity($token){
        $client = new GuzzleHttp\Client();

        $res = $client->request('GET', 'https://www.strava.com/api/v3/athlete/activities', [
            'headers' =>[
                'Authorization' => 'Bearer ' . $token
            ]
        ]);

        return $acts = json_decode($res->getBody()->getContents());
    }

    public function logout(){
        $token = Auth::user()->token;

        $client = new GuzzleHttp\Client();

        $client->request('DELETE', 'https://www.strava.com/oauth/deauthorize', [
            'headers' =>[
                'Authorization' => 'Bearer ' . $token
            ]
        ]);

        Auth::logout();

        Session::flush();

        return redirect('/');
    }
}
