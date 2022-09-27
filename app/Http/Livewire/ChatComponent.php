<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\Workshop;
use Livewire\Component;

class ChatComponent extends Component
{
    public $currentUrl;
    public $message;

    public function mount()
    {
        $this->currentUrl = url()->current();
    }
    public function render()
    {
        $workshop = Workshop::find($this->currentUrl[strlen($this->currentUrl)-1]);
        return view('livewire.chat-component', ['messages' => Message::where('workshop',$workshop->name)->get()]);
    }
    public function send($name)
    {

        $array = array();
        $array['name'] = $name;
        $array['message'] = $this->message;

        //dd(json_encode($array));
        event(new \App\Events\MessageEvent($array));

        $msg =  $this->message;

        $this->message = null;

        $workshop = Workshop::find($this->currentUrl[strlen($this->currentUrl)-1]);

        Message::create([
            'sender' => $name,
            'workshop' => $workshop->name,
            'message' => $msg
        ]
        );

    }
}
