<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Session;
use App\Activity;
use GuzzleHttp;


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

        if (auth()->guest()) {
            $exists = User::where('id', $userId)->first();
            if ($exists != Null) {
                Session::put('loggedIn', true);
                Session::put('token', $token);
                Session::put('userId', $userId);
                Session::put('userAvatarOriginal', $userAvatarOriginal);
                Session::put('userAvatarMedium', $userAvatarMedium);
                Session::put('userFirstName', $userFirstName);
                return redirect('/');
            }else{
                $userEmail = $this->getUserData($loggedInUser, 'email');
                $userGender = $this->getUserData($loggedInUser, 'sex');

                $newUser = Activity::create([
                    'token' => $token,
                    'id' => $userId,
                    'firstName' => $userFirstName,
                    'lastName' => $userLastName,
                    'email' => $userEmail,
                    'gender' => $userGender,
                    'avatar_original' => $userAvatarOriginal,
                    'avatar' => $userAvatarMedium,
                ]);

                $newUser->save();
                Session::put('loggedIn', true);
                Session::put('token', $token);
                Session::put('userId', $userId);
                Session::put('userAvatarOriginal', $userAvatarOriginal);
                Session::put('userAvatarMedium', $userAvatarMedium);
                Session::put('userFirstName', $userFirstName);
                return redirect('/');

            }
        };
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
        $token = Session::get('token');

        $client = new GuzzleHttp\Client();

        $client->request('DELETE', 'https://www.strava.com/oauth/deauthorize', [
            'headers' =>[
                'Authorization' => 'Bearer ' . $token
            ]
        ]);

        Session::flush();

        return redirect('/');
    }
}
