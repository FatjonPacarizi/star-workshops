<?php

namespace Database\Seeders;

use App\Models\Workshop_Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkshopPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workshop__pages')->insert([[
            'heading' => 'EVENTS',
            'paragraf_1' =>'Upcoming Events',
            'paragraf_2' => 'Past Events',
        ]
    ]);
    }
}
