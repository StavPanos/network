<?php

namespace App\Http\Controllers;

use App\Models\User;

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
}
