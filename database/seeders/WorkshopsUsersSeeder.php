<?php

namespace Database\Seeders;

use App\Models\Workshops_Users;
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
        DB::table('workshops_users')->insert([
            [
                'workshop_id' => '3',
                'user_id' => '3',
            ],
            [
                'workshop_id' => '3',
                'user_id' => '2',
            ],
            [
                'workshop_id' => '3',
                'user_id' => '1',
            ],
            [
                'workshop_id' => '2',
                'user_id' => '2',
            ],
            ]);
    }
}
