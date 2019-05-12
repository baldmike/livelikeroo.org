<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Log;

use App\Events\CarePackageSent;

class SendCarePackage
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
     * @param  object  $event
     * @return void
     */
    public function handle(CarePackageSent $event)
    {
            $event->carePackage->sent = true;
            $event->carePackage->save();   

            // Try and validate the address
            $validate = $this->shipping->validateAddress($event->carePacakge);
            // Make sure it's not an invalid address this
            // could also be moved to a custom validator rule
            if ($validate->object_state == 'INVALID') {
                return back()->withMessages($validate->messages);
            }
    }
}
