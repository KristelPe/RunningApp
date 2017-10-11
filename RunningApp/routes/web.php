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

Route::get('/groups', function () {
    return view('groups/index');
});

Route::get('/group/{id}', function () {
    return view('groups/detail');
});


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
