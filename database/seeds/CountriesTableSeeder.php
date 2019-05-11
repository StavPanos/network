<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $greece = new Country();

        $greece->name = 'Greece';

        $greece->code = 'GR';

        $greece->save();
    }
}
