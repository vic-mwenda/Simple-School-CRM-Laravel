<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogoutActivityListener implements ShouldQueue
{

    /**
     * Handle the event.
     */
    public function handle(Logout $event): void
    {
        $user = $event->user;
        $user->update(['last_seen' => 'logged_out']);
    }
}
