<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('positions')->insert([
            'position' => 'user',


        ]);

        DB::table('positions')->insert([
            'position' => 'staff',


        ]);

    }
}