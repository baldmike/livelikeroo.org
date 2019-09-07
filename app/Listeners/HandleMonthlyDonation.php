<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Events\MonthlyDonationMade;
use App\Mail\MonthlyDonation;
use Mail;

class HandleMonthlyDonation
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
     * @param  m\MonthlyDonationMade  $event
     * @return void
     */
    public function handle(MonthlyDonationMade $event)
    {
        Mail::to($event->donation->email)->send(new MonthlyDonation($event->donation, $event->user));
    }
}
