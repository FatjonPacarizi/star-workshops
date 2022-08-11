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
        Country::create([
            'name'      => 'Albania',
            'language'     => 'Shqip',
            'region'  => 'Eastern Europe',
        ]);
        Country::create([
            'name'      => 'Kosova',
            'language'     => 'Shqip',
            'region'  => 'Eastern Europe',
        ]);

        Country::create([
            'name'      => 'England',
            'language'     => 'English',
            'region'  => 'Eastern Europe',
        ]);

        Country::create([
            'name'      => 'Germany',
            'language'     => 'German',
            'region'  => 'Eastern Europe',
        ]);

    }
}
