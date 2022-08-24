<?php

namespace Database\Seeders;

use App\Models\Feedback;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\City;
use App\Models\Type;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create();

        DB::table('feedback')->insert([[
       
            'description'      => '"so far its one of the best , because all the information that been given , the excellent explanation"',
            'user_id'     => $user->id,
        ],
       [
            'description'      => "think it's good for me. But I don't know about web development. I just want to try now.",
            'user_id'     => $user->id,
       ],[
            'description'      => "I'm still in the process of watching the course, and it is great information in a format that is understandable",
            'user_id'     => $user->id,
       ],[
            'description'      => "Effective and elaborate information that a beginner, like me, can digest and utilize",
            'user_id'     => $user->id,
       ],
    ]);

    }
}
