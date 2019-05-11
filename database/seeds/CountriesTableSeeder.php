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
        $countries = [
            ['name' => 'Greece', 'code' => 'GR'],
            ['name' => 'Germany', 'code' => 'DE'],
            ['name' => 'US', 'code' => 'US']
        ];

        Country::insert($countries);
    }
}
