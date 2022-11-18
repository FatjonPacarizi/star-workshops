<?php

namespace Database\Seeders;

use App\Models\workshops_users;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class WorkshopsUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workshop_participants = [
            [
                'workshop_id' => '11',
                'user_id' => '3',
                "created_at" => "2022-03-17 22:09:04"
            ],
            [
                'workshop_id' => '11',
                'user_id' => '5',
                "created_at" => "2022-07-17 22:09:04"
            ],
            [
                'workshop_id' => '11',
                'user_id' => '5',
                "created_at" => "2022-09-01 22:09:04"
            ],
            [
                'workshop_id' => '10',
                'user_id' => '4',
                "created_at" => "2022-09-17 22:09:04"
            ],
            [
                'workshop_id' => '7',
                'user_id' => '3',
                "created_at" => "2022-09-17 22:09:04"
            ],

        ];
        foreach($workshop_participants as $participant){
            workshops_users::create($participant);
        }
    }
}
