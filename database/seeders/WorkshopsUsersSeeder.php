<?php

namespace Database\Seeders;

use App\Models\Workshops_Users;
use Illuminate\Database\Seeder;

class WorkshopsUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Workshops_Users::create(
            [
                'workshop_id' => '1',
                'user_id' => '3',
            ]
        );
        Workshops_Users::create(
            [
                'workshop_id' => '1',
                'user_id' => '2',
            ]
        );
        Workshops_Users::create(
            [
                'workshop_id' => '1',
                'user_id' => '1',
            ]
        );

        Workshops_Users::create(
            [
                'workshop_id' => '2',
                'user_id' => '2',
            ]
        );
    }
}
