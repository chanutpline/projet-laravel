<?php

namespace App\Listeners;

use App\Events\PostDeletingEvent;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Notifications\Notification;

class PostDeleting
{
    /**
     * @var FilesystemManager
     */
    public $storage;

    /**
     * PostDeleting constructor.
     * @param FilesystemManager $filesystemManager
     */
    public function __construct(FilesystemManager $filesystemManager)
    {
        $this->storage = $filesystemManager;
    }

    /**
     * Handle the event.
     *
     * @param PostDeletingEvent $event
     * @return void
     */
    public function handle(PostDeletingEvent $event)
    {
        $images = $event->post->images;

        if ($images && $images->count() !== 0) {
            $event->post->images->each(function ($image) {
                $this->storage->disk('public_path')->delete($image->image);
            });
        }
    }
}
