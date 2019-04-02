<?php

use App\Post;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$languages = ['PHP', 'JAVA', 'PYTHON'];
$countries = ['Greece', 'France', 'Spain'];

$factory->define(User::class, function (Faker $faker) use ($languages, $countries) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('12345678'),
        'remember_token' => Str::random(10),
        'programming_language' => $languages[array_rand($languages)],
        'country' => $countries[array_rand($countries)]
    ];
});

$factory->define(Post::class, function (Faker $faker) use ($languages, $countries) {
    return [
        'content' => $faker->sentence,
        'user_id' => factory('App\User')->create()->id
    ];
});
