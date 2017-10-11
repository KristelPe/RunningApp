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

// alles waar id in staat moet nog aangepast worden wanneer dr connectie s met dn api of als dr al data in dn database staat

/* HOME */

Route::get('/', function () {
    

	$user = Socialite::with('strava')->user();

	if(User::where('email', '=', $user->email)){
        echo "Auth attempt matched";
        $checkUser = User::where('email', '=', $user->email);
        Auth::login($checkUser);
    }else{
        echo "auth no attempt matched";
        $row = new User;
        $row->email = $user->email;
        $row->avatar = $user->profile;
        $row->firstname = $user->firstname;
        $row->save();
    }
    echo Auth::user()->name;
	
	return view('home/index');

});

/* LOG IN */

Route::get('/login', function () {
    return Socialite::with('strava')->redirect();



});


/* PARKOUR */

route::get('parkours', 'ParkoursController@index');

Route::get('/parkour/{id}', 'ParkoursController@detail');


/* GROUP */

route::get('groups', 'GroupsController@index');

Route::get('/group/{id}', 'GroupsController@detail');


/* USER */

Route::get('/profile', function () {
    return view('users/index');
});

//as we nog andere users hun profielen willen bekijken moet dees dr ook in komen
Route::get('/user/{id}', function () {
    return view('users/index');
});

Route::get('/settings', function () {
    return view('users/settings');
});
