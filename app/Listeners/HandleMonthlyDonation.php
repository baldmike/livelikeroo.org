<?php

namespace App\Listeners;

use App\Events\monthlyDonationMade;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
     * @param  monthlyDonationMade  $event
     * @return void
     */
    public function handle(monthlyDonationMade $event)
    {
        //
    }
}
