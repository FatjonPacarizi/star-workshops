<?php

namespace Database\Seeders;

use App\Models\Feedback;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\City;
use App\Models\Type;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workshops')->insert([
            'name' => 'WINS Side Event at the IAEA Conference on Safety and Security of Radioactive Sources 2022',
            'type_id' => '1',
            'country_id' => '1',
            'city_id' => '1',
            'category_id' => '1',
            'time' => '2022-09-09 12:14:19',
        ]);

        DB::table('workshops')->insert([
            'name' => '2 WINS Side Event at the IAEA Conference on Safety and Security of Radioactive Sources 2022',
            'type_id' => '1',
            'country_id' => '1',
            'city_id' => '1',
            'category_id' => '1',
            'time' => '2022-09-09 12:14:19',
        ]);
       
        \App\Models\Workshop::factory(6)->create();
       
    }
}
