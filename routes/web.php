<?php

use App\User;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('dashboard');
    }

    return view('welcome');
});

Auth::routes();

Route::get('auth/{provider}', 'Auth\SocialController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialController@handleProviderCallback');

Route::get('profile/{userId}', 'ProfileController@view');
Route::get('profile', 'ProfileController@index')->middleware('auth');

Route::get('friends', 'FriendController@index')->middleware('auth');
Route::post('friend/accept', 'FriendController@accept')->middleware('auth');
Route::post('friend/connect', 'FriendController@connect')->middleware('auth');
Route::post('friend/disconnect', 'FriendController@disconnect')->middleware('auth');
Route::post('friend/decline', 'FriendController@decline')->middleware('auth');

Route::post('post/create', 'PostController@create')->middleware('auth');

Route::get('users', function () {
//    return User::all();
    $languages = json_decode(file_get_contents(asset('data/planguages.json')), true);
//        return $languages;
    $countries = json_decode(file_get_contents(asset('data/countries.json')), true);
    return $countries;
});

Route::get('map', 'MapController@index');

Route::get('/dashboard', 'DashboardController@index')->name('home');
