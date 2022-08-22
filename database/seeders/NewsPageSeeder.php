<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\NewsPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_pages')->insert([
            'title' => 'Home',
            'author' => '1',
            'description' => 'We partner up with our clients by setting up.',
            'image' => '1660734883.png',
        ]);
        DB::table('news_pages')->insert([
            'title' => 'Home',
            'author' => '1',
            'description' => 'We partner up with our clients by setting up.',
            'image' => '1660734883.png',
        ]);
    }
}
