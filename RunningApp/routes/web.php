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
Route::get('/', 'Controller@index');

/* LOG IN */
Route::get('/login', 'StravaController@login');

Route::get('/login/callback', 'StravaController@callback');

/* LOG OUT */
Route::get('/logout', 'StravaController@logout');

/* PARKOUR */
route::get('parcours', 'ParkoursController@index');

Route::get('/parcours/{id}', 'ParkoursController@detail');

/* Leaderboard */
Route::get('leaderboard', 'LeaderboardController@index');

/*Hall Of Fame */
Route::get('HallOfFame', 'HallOfFameController@index');
/* USER */
Route::get('/profile', 'UsersController@index');
Route::post('/updatefollowschedule', 'UsersController@updateFollowSchedule');

/* ADMIN */
Route::post('/makeadmin', 'AdminController@makeAdmin');
Route::post('/removeadmin', 'AdminController@removeAdmin');
Route::get('/schedules', 'AdminController@schedules');
Route::get('/users', 'AdminController@users');
Route::post('/addschedule', 'AdminController@addSchedule');
Route::post('/deleteschedule', 'AdminController@deleteSchedule');
Route::post('/deleteuser', 'AdminController@deleteUser');