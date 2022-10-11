<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use Illuminate\Support\Str;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'name'=>'Gramos Shala',
                'comment'=>'Hi, I love your lecture on Tailwind CSS.',
                'user_id'=> '9',
                'streaming_id'=>'1',
                'created_at'=>'2022-10-11 09:41:46',
            ],
            [
                'name'=>'Gramos Shala',
                'comment'=>'Can t wait - this course looks cool :) thank you again',
                'user_id'=>'9',
                'streaming_id'=>'2',
                'created_at'=>'2022-10-11 09:41:46',
            ],
        ]);
    }
}
