<?php

use App\Models\Notification;
use App\Models\Planguage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check())
        return redirect('dashboard');

    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('auth/{provider}', 'Auth\SocialController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialController@handleProviderCallback');
Route::get('profile/{userId}', 'ProfileController@view');

// Authenticated user routes
Route::get('dashboard', 'DashboardController@index')->name('home')->middleware('verified');
Route::get('profile', 'ProfileController@index')->middleware('auth')->middleware('verified');
Route::get('connections', 'FriendController@index')->middleware('auth')->middleware('verified');

Route::post('friend/accept', 'FriendController@accept')->middleware('auth');
Route::post('friend/connect', 'FriendController@connect')->middleware('auth');
Route::post('friend/disconnect', 'FriendController@disconnect')->middleware('auth');
Route::post('friend/decline', 'FriendController@decline')->middleware('auth');
Route::post('search', 'SearchController@search')->middleware('verified');

Route::post('post/create', 'PostController@create')->middleware('auth');
Route::post('post/delete', 'PostController@destroy')->middleware('auth');

Route::post('avatar', 'ProfileController@update_avatar');
Route::post('profile/edit', 'ProfileController@update');

Route::post('project/create', 'ProjectController@create');
Route::post('project/delete', 'ProjectController@destroy');


Route::post('reply/create', 'ReplyController@create');

Route::post('profile/planguages', 'ProfileController@planguages');

Route::get('populateLanguages', function(){
    Planguage::truncate();
    Notification::truncate();
    $java = new Planguage();

    $java->name = 'JAVA';

    $java->save();

    $python = new Planguage();

    $python->name = 'PYTHON';

    $python->save();
});

// Admin routes
Route::get('map', 'MapController@index');
Route::get('users', function () {
    return User::with('planguages', 'friends', 'notifications')->get();
});
