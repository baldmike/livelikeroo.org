<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Events\OneTimeDonationMade;
use App\Mail\OneTimeDonation;
use Mail;


class HandleOneTimeDonation
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
     * @param  OneTimeDonationMade  $event
     * @return void
     */
    public function handle(OneTimeDonationMade $event)
    {
        // send confirmation email to donor
        Mail::to($event->donation->email)->send(new OneTimeDonation($event->donation));

        // send notification to Sarah
        Mail::to('livelikeroo@gmail.com')->send(new )
    }
}
