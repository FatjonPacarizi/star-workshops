<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageEvent implements ShouldBroadcast
{
    public $msg;
    public $sender;
    public $sender_status;
    public $msg_time;
    public $workshop_id;

    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($msg,$sender,$sender_status,$msg_time,$workshop_id)
    {
        $this->msg = $msg;
        $this->sender = $sender;
        $this->sender_status = $sender_status;
        $this->msg_time = $msg_time;
        $this->workshop_id = $workshop_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel("workshop.{$this->workshop_id}");
    }
}
