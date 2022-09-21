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
                'workshop_id' => '3',
                'workshop_category_id' => '2',
                'user_id' => '3',
            ],
            [
                'workshop_id' => '11',
                'workshop_category_id' => '1',
                'user_id' => '2',
            ],
            [
                'workshop_id' => '11',
                'workshop_category_id' => '1',
                'user_id' => '1',
            ],
            [
                'workshop_id' => '10',
                'workshop_category_id' => '1',
                'user_id' => '2',
            ],
            [
                'workshop_id' => '7',
                'workshop_category_id' => '1',
                'user_id' => '3',
            ],

        ];
        foreach($workshop_participants as $participant){
            Workshops_Users::create($participant);
        }
    }
}
