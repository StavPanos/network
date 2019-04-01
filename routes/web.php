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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('auth/{provider}', 'Auth\SocialController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialController@handleProviderCallback');

Route::get('profile/{userId}', 'ProfileController@view');
Route::get('profile', 'ProfileController@index')->middleware('auth');
Route::get('friends', 'ProfileController@friends')->middleware('auth');
Route::post('connect', 'ProfileController@connect')->middleware('auth');
Route::post('disconnect', 'ProfileController@disconnect')->middleware('auth');

Route::post('post/create', 'PostController@create')->middleware('auth');

Route::get('users', function () {
    return User::with('friends')->get();
});

Route::get('/home', 'HomeController@index')->name('home');
