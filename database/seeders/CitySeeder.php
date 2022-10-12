<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            [
                'name' => 'Gjilan',
                'postalcode' => '61000',
                'country_id' => 2,
            ],
            [
                'name' => 'Prizren',
                'postalcode' => '20000',
                'country_id' => 2,
            ]
        ]);

    }
}

