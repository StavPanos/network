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

    public function update_avatar()
    {
        request()->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = auth()->user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        request()->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()->with('success','You have successfully upload image.');
    }
}
