<?php

use App\Models\Country;
use App\Models\Planguage;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$languages = json_decode(file_get_contents(asset('data/planguages.json')), true);
$countries = json_decode(file_get_contents(asset('data/countries.json')), true);
Planguage::insert($languages);
Country::insert($countries);

$factory->define(User::class, function (Faker $faker) use ($languages, $countries) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('12345678'),
        'remember_token' => Str::random(10),
        'bio' => $faker->paragraph,
        'country_id' => rand(1, 230)
    ];
});

$factory->define(Post::class, function (Faker $faker) use ($languages, $countries) {
    return [
        'content' => $faker->sentence,
        'user_id' => factory('App\User')->create()->id
    ];
});
