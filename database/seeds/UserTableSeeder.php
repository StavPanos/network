<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User', 150)->create();

        $user = new User;
        $user->name = 'John Doe';
        $user->password = bcrypt('12345678');
        $user->email = 'johndoe@gmail.com';
        $user->save();
    }
}
