<?php

namespace Database\Seeders;

use App\Models\Landing;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LandingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('landings')->insert([
            [
                'title' => 'Home',
                'heading' => 'Star Workshop Company',
               'paragraf' =>'We partner up with our clients by setting up, managing and operating their extended teams across Software Development, Quality Assurance, Customer Support, Technical Support and Business process outsourcing services. We make sure that our teams remain satisfied and therefore dedicated to our client’s needs. This makes us reliable, effective and productive. We offer a stress-free workplace, with recreative environments and competitive working conditions with the biggest tech Companies in Kosovo.',
                'image' => '1660734883.png',
                'button' =>'https://www.starlabs.dev/whyus/',
            ],
        ]);
    }
}