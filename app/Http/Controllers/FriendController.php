<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function index()
    {
        $recommended = User::where([
                ['country', '=', auth()->user()->country],
                ['programming_language', '=', auth()->user()->programming_language]
            ])->get();

        return view('friends.index', compact('recommended'));
    }

    public function connect()
    {
        $user->friend_requests()->attach(auth()->user()->id);

        return back();
    }

    public function accept()
    {
        $friend_id = request()->id;

        auth()->user()->friends()->attach($friend_id);

        auth()->user()->friends()->updateExistingPivot(['status'=>'accepted']);

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
