<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Product;
use Symfony\Component\HttpFoundation\Request;

class ViewEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private $session;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->session = $session;
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

    public function handle(Product $post)
    {
        if (!$this->isPostViewed($post)) {
            $pView->increment('view_count');
            $this->storePost($post);
        }
    }

    private function isPostViewed($post)
    {
        $viewed = $this->session->get('viewed_posts', []);
        return array_key_exists($post->id, $viewed);
    }

    private function _storePost($post)
    {
        $key = 'viewed_posts.' . $post->id;
        $this->session->put($key, time());
    }
}
