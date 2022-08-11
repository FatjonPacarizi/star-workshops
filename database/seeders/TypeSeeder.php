<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name'      => 'live/online',
        ]);
        Type::create([
            'name'      => 'onside/online',
        ]);
        
    }
}
