<?php

namespace App\Events;

use App\Models\Log;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LogSaved implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $log;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Log $log)
    {
        $this->log = $log;
        \Log::info('Event dispatched mwaka');
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // Find a way of fixing this shit.
        return new Channel('logdo');
        // return new PrivateChannel('logdo.'.$this->log->id);
    }
}
