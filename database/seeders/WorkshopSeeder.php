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
            'name' => 'Become a Certified HTML, CSS, JavaScript Web Developer',
            'author' => '1',
            'type_id' => '1',
            'country_id' => '1',
            'city_id' => '1',
            'category_id' => '1',
            'time' => '2022-09-09 12:14:19',
        ]);

        DB::table('workshops')->insert([
            'name' => '1 Hour JavaScript',
            'author' => '1',
            'type_id' => '1',
            'country_id' => '1',
            'city_id' => '1',
            'category_id' => '1',
            'time' => '2022-09-09 12:14:19',
        ]);

        DB::table('workshops')->insert([
            'name' => 'The Complete JavaScript Course 2022: From Zero to Expert!',
            'author' => '1',
            'type_id' => '1',
            'country_id' => '1',
            'city_id' => '1',
            'category_id' => '1',
            'time' => '2022-08-09 12:14:19',
        ]);

        DB::table('workshops')->insert([
            'name' => 'Build Responsive Real-World Websites with HTML and CSS',
            'author' => '1',
            'type_id' => '1',
            'country_id' => '1',
            'city_id' => '1',
            'category_id' => '1',
            'time' => '2022-08-09 12:14:19',
        ]);

        DB::table('workshops')->insert([
            'name' => 'Modern React with Redux',
            'author' => '1',
            'type_id' => '1',
            'country_id' => '1',
            'city_id' => '1',
            'category_id' => '1',
            'time' => '2022-08-09 12:14:19',
        ]);

        DB::table('workshops')->insert([
            'name' => 'Python and Django Full Stack Web Developer Bootcamp',
            'author' => '1',
            'type_id' => '1',
            'country_id' => '1',
            'city_id' => '1',
            'category_id' => '1',
            'time' => '2022-08-09 12:14:19',
        ]);

        DB::table('workshops')->insert([
            'name' => 'HTML and CSS for Beginners - Build a Website & Launch ONLINE',
            'author' => '2',
            'type_id' => '1',
            'country_id' => '1',
            'city_id' => '1',
            'category_id' => '1',
            'time' => '2022-08-09 12:14:19',
        ]);

        DB::table('workshops')->insert([
            'name' => 'The Complete ASP.NET MVC 5 Course',
            'author' => '2',
            'type_id' => '1',
            'country_id' => '1',
            'city_id' => '1',
            'category_id' => '1',
            'time' => '2022-08-09 12:14:19',
        ]);
        
    }
}
