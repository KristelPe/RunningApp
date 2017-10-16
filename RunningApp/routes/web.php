<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\User;

// alles waar id in staat moet nog aangepast worden wanneer dr connectie s met dn api of als dr al data in dn database staat

/* HOME */

Route::get('/', function () {

	return view('home/index');

});

/* LOG IN */

Route::get('/login', function () {
    $x = 4;
    return Socialite::with('strava')->redirect();

});

Route::get('/login/callback', function () {
    $x = 4;
    $userAll = Socialite::with('strava')->user();
    $x = $userAll->accessTokenResponseBody['access_token'];
	$athleteData = $userAll->accessTokenResponseBody['athlete'];
	    if (auth()->guest()) {
            $exists = User::where('id', $athleteData['id'])->first();
            if ($exists =! null) {
                Session::put('userId', $athleteData['id']);
                Session::put('userAvatarOriginal', $athleteData['profile']);
                Session::put('userAvatarMedium', $athleteData['profile_medium']);
                Session::put('userFirstName', $athleteData['firstname']);
                return redirect('/');
            }else{
                $newUser = User::create([
                    'token' => $x,
                    'id' => $athleteData['id'],
                    'firstName' => $athleteData['firstname'],
                    'lastName' => $athleteData['lastname'],
                    'email' => $athleteData['email'],
					'gender' => $athleteData['sex'],
					'avatar_original' => $athleteData['profile'],
					'avatar' => $athleteData['profile_medium'],
                ]);



				$newUser->save();
                Session::put('userId', $athleteData['id']);
                Session::put('userAvatarOriginal', $athleteData['profile']);
                Session::put('userAvatarMedium', $athleteData['profile_medium']);
                Session::put('userFirstName', $athleteData['firstname']);
                return redirect('/');

            }
        };
});


/* PARKOUR */

route::get('parkours', 'ParkoursController@index');

Route::get('/parkour/{id}', 'ParkoursController@detail');


/* GROUP */

route::get('groups', 'GroupsController@index');

Route::get('/group/{id}', 'GroupsController@detail');


/* USER */

Route::get('/profile', function () {
    $id = Session::get('userId');
    $firstName = Session::get('userFirstName');
    $avatarO = Session::get('userAvatarOriginal');
    $avatarM = Session::get('userAvatarMedium');
    return View::make('users/index', ['userId' => $id, 'userFirstName' => $firstName, 'userAvatarO' => $avatarO, 'userAvatarM' => $avatarM]);
});

//as we nog andere users hun profielen willen bekijken moet dees dr ook in komen
Route::get('/user/{id}', function () {
    return view('users/index');
});

Route::get('/settings', function () {
    return view('users/settings');
});
