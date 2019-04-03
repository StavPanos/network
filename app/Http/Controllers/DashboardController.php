<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUsers($users)
    {
        $ids = [];
        foreach ($users as $request){
            $ids[] = $request->sender_id;
        }

        return User::whereIn('id', $ids)->get();
    }

    public function index()
    {
        $friends = $this->getUsers(auth()->user()->getAcceptedFriendships());
        $posts = [];
        foreach ($friends as $friend){
            foreach ($friend->posts as $post){
                $posts[] = $post;
            }
        }

        return view('dashboard', compact('posts'));
    }
}
