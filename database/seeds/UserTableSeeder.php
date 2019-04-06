<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Post', 150)->create()->each(function($post){
            $post->user->planguages()->sync([1, 2, 5]);
        });

        $user = new User;
        $user->name = 'John Doe';
        $user->password = bcrypt('12345678');
        $user->email = 'johndoe@gmail.com';
        $user->country_id = '102';
        $user->save();
    }
}
