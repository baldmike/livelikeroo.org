<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Events\NotifySelected;

use App\Mail\NotifyEmail;

use Mail;

class HandleNotify
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  NotifySelected  $event
     * @return void
     */
    public function handle(NotifySelected $event)
    {
        Mail::to($event->donation->recipient_email)->send(new NotifyEmail($event->donation));
    }
}
