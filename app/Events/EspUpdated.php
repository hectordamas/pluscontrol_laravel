<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EspUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function broadcastOn() {
        return new Channel('esp-updates.' . $this->data['esp']->id);
    }

    public function broadcastAs() {
        return 'esp.updated';
    }

    public function broadcastWith() {
        return $this->data;
    }
}
