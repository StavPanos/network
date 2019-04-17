<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check())
        return redirect('dashboard');

    return view('welcome');
});

Auth::routes();
Route::get('auth/{provider}', 'Auth\SocialController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialController@handleProviderCallback');
Route::get('profile/{userId}', 'ProfileController@view');

// Authenticated user routes
Route::get('dashboard', 'DashboardController@index')->name('home');
Route::get('profile', 'ProfileController@index')->middleware('auth');
Route::get('friends', 'FriendController@index')->middleware('auth');
Route::post('friend/accept', 'FriendController@accept')->middleware('auth');
Route::post('friend/connect', 'FriendController@connect')->middleware('auth');
Route::post('friend/disconnect', 'FriendController@disconnect')->middleware('auth');
Route::post('friend/decline', 'FriendController@decline')->middleware('auth');
Route::post('post/create', 'PostController@create')->middleware('auth');
Route::post('search', 'SearchController@search');

// Admin routes
Route::get('map', 'MapController@index');
Route::get('users', function () {
    return User::with('planguages')->get();
//    return \App\Models\Planguage::all();
});
