<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->insert([
            [
                'question'      => 'Who attends The Start Workshop?',
                'answer'     => 'People from all walks of life and professions, all ages, and many different countries. ',
                'status'     => 'Active',
            ],
            [
                'question'      => 'What language is the course taught in?',
                    'answer'     => 'The Creativity Workshop is taught in Albanian,English.',
                    'status'     => 'Active',
            ],
            [
                'question'      => 'Do you offer certificates of completion?',
                'answer'     => 'Yes, we offer certificates upon request at the end of the workshop.',
                'status'     => 'Active',
            ],[
                'question'      => 'What is the payment schedule?',
                'answer'     => 'The payment schedule varies depending on the workshop. You will find a payment schedule at the bottom of each individual workshop’s page.',
                'status'     => 'Active',
           
            ],
            [
                'question'      => 'Will i be able to join with via the phone?',
                'answer'     => 'This is an interactive workshop with different media used throughout the session. Participation will be extremely hampered if you do not have access to a personal computer with a camera and microphone.',
                'status'     => 'Active',
            
            ],
        ]);

    }
}

