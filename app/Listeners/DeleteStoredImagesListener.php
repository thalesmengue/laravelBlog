<?php

namespace App\Listeners;

use App\Events\DeletedUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\File;

class DeleteStoredImagesListener
{
    /**
     * Handle the event.
     *
     * @param DeletedUser $event
     * @return void
     */
    public function handle(DeletedUser $event)
    {
        foreach ($event->user->posts as $post) {
                File::delete(public_path('storage/' . $post->image));
        }

        File::delete(public_path('storage/' . $event->user->profile_image));
    }
}
