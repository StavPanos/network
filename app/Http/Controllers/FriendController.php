<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;

class FriendController extends Controller
{
    public function index()
    {
        // $recommended = User::where([
        //         ['country', '=', auth()->user()->country],
        //         ['programming_language', '=', auth()->user()->programming_language]
        //     ])->get();
        $recommended = [];

        $requests = auth()->user()->getFriendRequests();
        $friends = auth()->user()->getFriends();

        return view('friends.index', compact('recommended', 'requests', 'friends'));
    }

    public function connect()
    {
        $user = User::findOrFail(request()->id);

        auth()->user()->befriend($user);

        $notification = new Notification([
            'title' => 'friend request from ' . auth()->user()->name,
            'type' => 'friend_request'
        ]);

        $user->notifications()->save(
            $notification
        );

        return back()->with('success', 'Friend Request sent');
    }

    public function disconnect()
    {
        auth()->user()->unfriend(User::find(request()->id));

        return back()->with('success', 'Friend removed');
    }

    public function accept()
    {
        $user = User::find(request()->id);

        auth()->user()->acceptFriendRequest($user);

        return back()->with('success', 'Friend Accepted');
    }

    public function decline()
    {
        $user = User::find(request()->id);

        auth()->user()->denyFriendRequest($user);

        return back()->with('success', 'Friend Declined');
    }

    public function friends()
    {
        $friends = auth()->user()->friends;

        return view('profile.friends', compact('friends'));
    }
}
