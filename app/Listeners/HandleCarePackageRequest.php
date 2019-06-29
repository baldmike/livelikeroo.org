<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Events\CarePackageRequested;
use App\Mail\CarePackageConfirmation;
use Mail;

class HandleCarePackageRequest
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
     * @param  CarePackageRequested  $event
     * @return void
     */
    public function handle(CarePackageRequested $event)
    {
        Mail::to($event->care_package->email)->send(new CarePackageConfirmation($event->care_package));
    }
}
