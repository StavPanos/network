<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialController extends Controller
{
    protected $redirectTo = '/dashboard';

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);

        Auth::login($authUser, true);

        return redirect($this->redirectTo);
    }

    public function setUser($user, $provider)
    {
        if ($provider == 'github') {
            $repos_url = $user->user['repos_url'];
        }

        if ($provider == 'bitbucket') {
            $repos_url = $user->user['links']['repositories'];
        }

        return [
            'provider_token' => $user->token,
            'avatar' => $user->avatar,
            'name' => $user->name,
            'email' => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id,
            'repos_url' => $repos_url,
            'email_verified_at' => Carbon::now()->timestamp
        ];
    }

    public function findOrCreateUser($user, $provider)
    {
        dd($user);

        $authUser = User::where('provider_id', $user->id)->first();

        if (!$authUser) {
            $authUser = User::where('email', $user->email)->first();

            if ($authUser) {
                $authUser->update(
                    $this->setUser($user, $provider)
                );

                return $authUser;
            }

            return User::create(
                $this->setUser($user, $provider)
            );
        }

        return $authUser;
    }
}
