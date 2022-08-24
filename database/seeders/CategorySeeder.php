<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
             'name' => 'Front-End Developer',
            ],
            [
             'name' => 'Back-End Developer',
            ],
            [
             'name' => 'Mobile Developer',
            ],
            [
             'name' => 'Web Developer',
            ],
            [
             'name' => 'Full Stack Developer',
            ]
        ]);

    }
}

