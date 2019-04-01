<?php

namespace App\Http\Controllers;

use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->posts;
        return view('profile.index', compact('posts'));
    }

    public function view($userId)
    {
        if ($userId == auth()->user()->id) {
            return redirect('profile');
        }

        $user = User::findOrFail($userId);
        return view('profile.view', compact('user'));
    }

    public function connect()
    {
        $friend_id = request()->id;

        auth()->user()->friends()->attach($friend_id);

        return back();
    }

    public function accept()
    {
        auth()->user()->friends()->updateExistingPivot('status', 'accepted');

        return back();
    }

    public function disconnect()
    {
        $friend_id = request()->id;

        auth()->user()->friends()->detach($friend_id);

        return back();
    }

    public function friends()
    {
        $friends = auth()->user()->friends;

        return view('profile.friends', compact('friends'));
    }
}
