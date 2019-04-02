<?php

namespace App\Http\Controllers;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $friends = auth()->user()->getAllFriendships();
        $posts = [];
        foreach ($friends as $friend){
            $posts[] = $friend->posts;
        }
        return view('dashboard', compact('posts'));
    }
}
