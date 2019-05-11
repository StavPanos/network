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

    /**
     * @param $provider
     * @return mixed
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);

        Auth::login($authUser, true);

        return redirect($this->redirectTo);
    }

    /**
     * @param $user
     * @param $provider
     * @return User
     */
    public function findOrCreateUser($user, $provider) : User
    {
        return User::updateOrCreate(
            [
                'provider_id' => $user->id,
                'email' => $user->email
            ],
            $this->setUser($user, $provider)
        );
    }

    /**
     * @param $user
     * @param $provider
     * @return array
     */
    public function setUser($user, $provider)
    {
        if ($provider == 'github') {
            $repos_url = $user->user['repos_url'];
        }

        if ($provider == 'bitbucket') {
            $repos_url = $user->user['links']['repositories']['href'];
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
}
