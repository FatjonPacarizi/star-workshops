<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Feedback;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

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

        Feedback::create([
            'description'      => '"so far its one of the best , because all the information that been given , the excellent explanation"',
            'user_id'     => $user->id,
        ]);

        Feedback::create([
            'description'      => "think it's good for me. But I don't know about web development. I just want to try now.",
            'user_id'     => $user->id,
        ]);

        Feedback::create([
            'description'      => "I'm still in the process of watching the course, and it is great information in a format that is understandable",
            'user_id'     => $user->id,
        ]);

        Feedback::create([
            'description'      => "Effective and elaborate information that a beginner, like me, can digest and utilize",
            'user_id'     => $user->id,
        ]);

    }
}
