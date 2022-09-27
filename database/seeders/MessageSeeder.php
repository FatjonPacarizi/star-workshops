<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            [
            'sender' => 'author',
            'workshop' => 'Become a Certified HTML, CSS, JavaScript Web Developer',
            'message' => 'test',
            ],
            [
                'sender' => 'admin',
                'workshop' => 'Become a Certified HTML, CSS, JavaScript Web Developer',
                'message' => 'hello',
            ],
            [
                'sender' => 'author',
                'workshop' => 'Become a Certified HTML, CSS, JavaScript Web Developer',
                'message' => '123',
            ],
            [
                'sender' => 'user',
                'workshop' => 'Become a Certified HTML, CSS, JavaScript Web Developer',
                'message' => '321',
            ],[
                'sender' => 'Granit',
                'workshop' => 'Become a Certified HTML, CSS, JavaScript Web Developer',
                'message' => 'its working',
            ]
      
    ];
    
    foreach($messages as $message){
        Message::create($message);
    }
    }
}
