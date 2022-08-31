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
                'heading' => 'A STAR WORKSHOPS SPECIAL MESSAGE',
                'paragraf' =>'Star Workshops condemns any military attacks on Ukraine’s nuclear infrastructure and expresses its support for those working hard to protect and secure these sites.',
                'button' =>'/about',
            ],
        ]);
    }
}