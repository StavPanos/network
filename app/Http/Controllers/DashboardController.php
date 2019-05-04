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

    /**
     * @param $users
     * @return mixed
     */
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
        $friends = auth()->user()->friends();

        return view('dashboard', compact('friends'));
    }
}
