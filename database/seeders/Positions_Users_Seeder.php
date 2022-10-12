<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Positions_Users_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('positions_users')->insert([[
            'user_id' => 1,
            'position_id'=> 2,
        ],[
            'user_id' => 2,
            'position_id'=> 1,
        ],[
            'user_id' => 3,
            'position_id'=> 2,
        ],
        [
            'user_id' => 4,
            'position_id'=> 2,
        ],
        [
            'user_id' => 5,
            'position_id'=> 2,
        ],
        [
            'user_id' => 6,
            'position_id'=> 2,
        ],
        [
            'user_id' => 7,
            'position_id'=> 2,
        ],
        [
            'user_id' => 8,
            'position_id'=> 2,
        ],
    ]);

    }
}
