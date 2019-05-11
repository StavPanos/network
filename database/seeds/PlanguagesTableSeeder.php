<?php

use App\Models\Planguage;
use Illuminate\Database\Seeder;

class PlanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $planguages = [
            ['name' => 'Java'],
            ['name' => 'PHP'],
            ['name' => 'Python']
        ];

        Planguage::insert($planguages);
    }
}
