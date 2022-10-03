<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class ChatComponent extends Component
{
    public $workshop;

    public function render()
    {
        return view('livewire.chat-component', ['messages' => Message::where('workshop_id',$this->workshop->id)->get(),'workshop_id'=>$this->workshop->id]);
    }
    public function send($msg)
    {
        if($msg != null && $msg != ''){

            event(new \App\Events\MessageEvent($msg,auth()->user()->name,auth()->user()->user_status,substr(\Carbon\Carbon::now('Europe/Tirane'),11,-3),false,$this->workshop->id));

            Message::create([
                'sender_id' => auth()->user()->id,
                'workshop_id' => $this->workshop->id,
                'message' => $msg
            ]
            );
        }
    }
    public function typing()
    {
            event(new \App\Events\MessageEvent(null,null,null,null,true,$this->workshop->id));
    }
}
