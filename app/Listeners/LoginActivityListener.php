<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;


class LoginActivityListener implements ShouldQueue
{
    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $user = $event->user;
        $user->update(['last_seen' => 'logged_in']);
    }
}
