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

    public function index()
    {
        $friends = auth()->user()->friends;

        dd($friends);

        return view('dashboard', compact('friends'));
    }
}
