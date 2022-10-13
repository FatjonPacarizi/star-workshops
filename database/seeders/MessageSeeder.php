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
                'sender_id' => 2,
                'workshop_id' => 1,
                'message' => 'hello im author',
            ],
            [
                'sender_id' => 1,
                'workshop_id' => 1,
                'message' => 'hello im admin',
            ],
            [
                'sender_id' => 5,
                'workshop_id' => 3,
                'message' => 'test',
            ],
            [
                'sender_id' => 8,
                'workshop_id' => 3,
                'message' => 'hello',
            ],
            [
                'sender_id' => 1,
                'workshop_id' => 3,
                'message' => 'hello im admin',
            ],
            [
                'sender_id' => 1,
                'workshop_id' => 2,
                'message' => 'hello im author',
            ],
            [
                'sender_id' => 3,
                'workshop_id' => 3,
                'message' => '321',
            ],
            [
                'sender_id' => 1,
                'workshop_id' => 3,
                'message' => 'this is a test message, hello im admin',
            ],
            [
                'sender_id' => 6,
                'workshop_id' => 3,
                'message' => 'hello',
            ],
            [
                'sender_id' => 4,
                'workshop_id' => 3,
                'message' => 'hello im a user, this is my first messsage .',
            ],
           

            
      
    ];
    
    foreach($messages as $message){
        Message::create($message);
    }
    }
}
