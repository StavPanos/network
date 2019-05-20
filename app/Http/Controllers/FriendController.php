<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;

class FriendController extends Controller
{
    public function index()
    {
        Notification::where('type', 'friend_request')->where('user_id', auth()->user()->id)->delete();

        $friendships = auth()->user()->getAllFriendships();
        $ids = [];
        foreach ($friendships as $friendship){
            $ids[] = $friendship->id;
        }

        dd($ids);

        $recommended = User::where('country_id', '=', auth()->user()->country_id)
                            ->where('id', '!=', auth()->user()->id)
                            ->whereNotIn('id', $ids)->limit(5)->get();
        if (!$recommended) {
            $recommended = [];
        }

        $requests = auth()->user()->getPendingFriendships();

        $friends = auth()->user()->getFriends();

        return view('friends.index', compact('recommended', 'requests', 'friends'));
    }

    public function connect()
    {
        $user = User::findOrFail(request()->id);

        auth()->user()->befriend($user);

        if (!Notification::where('title', 'Friend request from ' . auth()->user()->name)->first()) {
            $notification = new Notification([
                'title' => 'friend request from ' . auth()->user()->name,
                'type' => 'friend_request'
            ]);

            $user->notifications()->save(
                $notification
            );
        }

        return back()->with('success', 'A friend request has been sent to the user');
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
