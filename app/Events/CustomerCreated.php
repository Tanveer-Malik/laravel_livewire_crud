<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Customer;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;



class CustomerCreated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $customer;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
   
    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new Channel('admin-notifications');
        // return [
        //     new PrivateChannel('channel-name'),
        // ];
    }
    public function broadcastAs()
    {
        return 'customer.created';
    }
}
