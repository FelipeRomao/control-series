<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewSerie
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $name;
    public $am_seasons;
    public $ep_season;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($name, $am_seasons, $ep_season)
    {
        $this->name = $name;
        $this->am_seasons = $am_seasons;
        $this->ep_season = $ep_season;
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
