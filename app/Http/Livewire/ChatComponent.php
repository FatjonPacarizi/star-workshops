<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\Workshop;
use Livewire\Component;

class ChatComponent extends Component
{
    public $message;
    public $workshop;

    public function render()
    {
        return view('livewire.chat-component', ['messages' => Message::where('workshop_id',$this->workshop->id)->get(),'workshop_id'=>$this->workshop->id]);
    }
    public function send()
    {
        if($this->message != null){

            $array = array();
            $array['name'] = auth()->user()->name;
            $array['message'] = $this->message;
            $array['status'] = auth()->user()->user_status;

            //dd(json_encode($array));
            event(new \App\Events\MessageEvent($array,$this->workshop->id));

            $msg =  $this->message;

            $this->message = null;

            Message::insert([
                'sender_id' => auth()->user()->id,
                'workshop_id' => $this->workshop->id,
                'message' => $msg
            ]
            );
        }
    }
}
