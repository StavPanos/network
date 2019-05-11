<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfile;
use App\Models\Country;
use App\Models\Planguage;
use App\Models\User;
use GuzzleHttp\Client;

class ProfileController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->posts;
        $planguages = Planguage::get();
        $countries = Country::get();

        $repositories = [];

        if (auth()->user()->provider_token) {
            $client = new Client();
            $res = $client->get(auth()->user()->repos_url);
            $repositories = json_decode($res->getBody());
        }

        return view('profile.index', compact('posts', 'planguages', 'repositories', 'countries'));
    }

    public function view($userId)
    {
        if (auth()->check()) {
            if ($userId == auth()->user()->id) {
                return redirect('profile');
            }
        }

        $user = User::findOrFail($userId);

        $repositories = [];

        if ($user->provider_token) {
            $client = new Client();
            $res = $client->get($user->repos_url);
            $repositories = json_decode($res->getBody());
        }

        return view('profile.view', compact('user', 'repositories'));
    }

    public function update_avatar()
    {
        request()->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = auth()->user();

        $user->custom_avatar = true;

        $avatarName = $user->id . '_avatar' . time() . '.' . request()->avatar->getClientOriginalExtension();

        request()->avatar->storeAs('avatars', $avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()->with('success', 'You have successfully upload image.');
    }

    public function update(UpdateProfile $request)
    {
        $request->validated();

        auth()->user()->name = $request->name;
        auth()->user()->bio = $request->bio;
        auth()->user()->country_id = $request->country_id;
        auth()->user()->save();

        return back()->with('success', 'Success, your profile details have been updated');
    }

    public function planguages()
    {
        $languages = request('planguages');

        auth()->user()->planguages()->sync($languages, true);

        return back()->with('success', 'Success, technology details have been updated');
    }
}
