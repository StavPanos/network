<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Socialite;
use App\User;

class SocialController extends Controller
{
    protected $redirectTo = '/home';

    public function curl($url)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "cache-control: no-cache"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return json_decode($response);
    }

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

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();

        if ($authUser) {
            // if (strpos('github', $provider) !== false) {
            //     $data = $this->curl('https://api.github.com/user?access_token=' . $authUser->provider_token);
            // }
            // dd($data);

            // $authUser->update([
            //     'location' => $data->location,
            //     'bio' => $data->bio,
            //     'hireable' => $data->hireable,
            //     'blog' => $data->blog,
            //     'company' => $data->company,
            // ]);
            return $authUser;
        } else {
            // if (strpos('github', $provider) !== false) {
            //     $data = $this->curl('https://api.github.com/user?access_token=' . $user->token);
            // }
            // dd($data);

            return User::create([
                'provider_token' => $user->token,
                'avatar' => $user->avatar,
                'name' => $user->name,
                'email' => $user->email,
                'provider' => $provider,
                'provider_id' => $user->id,
                // 'location' => $data->location,
                // 'bio' => $data->bio,
                // 'hireable' => $data->hireable,
                // 'blog' => $data->blog,
                // 'company' => $data->company,
            ]);
        }
    }
}
