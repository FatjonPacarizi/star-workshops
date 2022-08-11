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
        Category::create([
            'name' => 'Front-End Developer',
        ]);
        Category::create([
            'name' => 'Back-End Developer',
        ]);
        Category::create([
            'name' => 'Mobile Developer',
        ]);
        Category::create([
            'name' => 'Web Developer',
        ]);
        Category::create([
            'name' => 'Full Stack Developer',
        ]);  

    }
}
