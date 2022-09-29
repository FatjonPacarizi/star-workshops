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
                'workshop_id' => 3,
                'message' => 'hello im author',
            ],
            [
                'sender_id' => 10,
                'workshop_id' => 3,
                'message' => 'hello',
            ],
            [
                'sender_id' => 1,
                'workshop_id' => 3,
                'message' => 'hello im admin',
            ],
            [
                'sender_id' => 3,
                'workshop_id' => 1,
                'message' => '321',
            ],[
                'sender_id' => 10,
                'workshop_id' => 1,
                'message' => 'its working',
            ]
      
    ];
    
    foreach($messages as $message){
        Message::create($message);
    }
    }
}
