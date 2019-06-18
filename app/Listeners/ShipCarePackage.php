<?php

namespace App\Listeners;

use App\Events\CarePackageShip;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShipCarePackage
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
     * @param  CarePackageShip  $event
     * @return void
     */
    public function handle(CarePackageShip $event)
    {
        $event->carePackage->sent = 1;
        $event->carePackage->save();
    }
}
