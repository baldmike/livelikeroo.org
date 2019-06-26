<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Events\InMemorySelected;

use App\Mail\InMemoryEmail;

use Mail;

class HandleInMemory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  InMemorySelected  $event
     * @return void
     */
    public function handle(InMemorySelected $event)
    {
        Mail::to($event->donation->recipient_email)->send(new InMemoryEmail($event->donation));
    }
}
