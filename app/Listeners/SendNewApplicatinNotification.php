<?php

namespace App\Listeners;

use App\Events\NewApplicationSend;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewApplicatinNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewApplicationSend $event): void
    {
        $newApplication = $event->application;
        dd($newApplication);
    }
}
