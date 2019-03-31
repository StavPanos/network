<?php

namespace App\Http\Controllers;

use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
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

        auth()->user()->friends()->sync($friend_id);

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
