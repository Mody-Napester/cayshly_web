<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ImportProductEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $filepath;
    public $brand_id;
    public $store_id;
    public $lookup_condition_id;
    public $category;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->filepath = $data['filepath'];
        $this->brand_id = $data['brand_id'];
        $this->store_id = $data['store_id'];
        $this->lookup_condition_id = $data['lookup_condition_id'];
        $this->category = $data['category'];

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
