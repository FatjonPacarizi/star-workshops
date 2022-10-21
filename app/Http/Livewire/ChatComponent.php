<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class ChatComponent extends Component
{
    public $workshop;
    public $msg;
    public $db_messages;

    public function mount(){
        $this->db_messages = Message::where('workshop_id',$this->workshop->id)->get();
    }
    public function render()
    {
        return view('livewire.chat-component', ['messages'=>$this->db_messages,'workshop_id'=>$this->workshop->id]);
    }
    public function send($msg)
    {
        if($msg != null && $msg != ''){

            $msg_time = \Carbon\Carbon::now('Europe/Tirane');

            event(new \App\Events\MessageEvent($msg,auth()->user()->name,null,auth()->user()->user_status,substr($msg_time,11,-3),false,$this->workshop->id));

            Message::insert([
                'sender_id' => auth()->user()->id,
                'workshop_id' => $this->workshop->id,
                'message' => $msg,
                'created_at' => $msg_time
            ]
            );
        }
    }
    public function typing()
    {
            event(new \App\Events\MessageEvent(null,null,auth()->user()->id,null,null,true,$this->workshop->id));
    }
    public function test($t)
    {
           dd($t);
    }
    
}
