<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            [
                'name'      => 'Albania',
                'language'     => 'Shqip',
                'region'  => 'Eastern Europe',
            ],
            [
                'name'      => 'Kosova',
                'language'     => 'Shqip',
                'region'  => 'Eastern Europe',
            ],[
                'name'      => 'England',
                'language'     => 'Shqip',
                'region'  => 'Eastern Europe',
            ],
            [
                'name'      => 'Germany',
                'language'     => 'Shqip',
                'region'  => 'Eastern Europe',
            
            ],
            [
                'name'      => 'Italy',
                'language'     => 'Shqip',
                'region'  => 'Eastern Europe',
            
            ]
        ]);

    }
}

