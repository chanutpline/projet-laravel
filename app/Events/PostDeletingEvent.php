<?php

namespace App\Events;

use App\Post;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostDeletingEvent
{
    use Dispatchable, SerializesModels;

    /**
     * @var Post
     */
    public $post;

    /**
     * Create a new event instance.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}
