<?php

namespace Database\Seeders;

use App\Models\Workshops_Users;
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
            ],
            [
                'workshop_id' => '11',
                'user_id' => '5',
            ],
            [
                'workshop_id' => '11',
                'user_id' => '5',
            ],
            [
                'workshop_id' => '10',
                'user_id' => '4',
            ],
            [
                'workshop_id' => '7',
                'user_id' => '3',
            ],

        ];
        foreach($workshop_participants as $participant){
            workshops_users::create($participant);
        }
    }
}
