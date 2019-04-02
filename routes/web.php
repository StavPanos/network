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
Route::post('friend/decline', 'FriendController@decline')->middleware('auth');

Route::post('post/create', 'PostController@create')->middleware('auth');

Route::get('users', function () {
    return User::with('friend_requests')->with('friends')->get();
});

Route::get('/dashboard', 'DashboardController@index')->name('home');
