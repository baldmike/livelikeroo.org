<?php

namespace App\Listeners;

use App\Events\FinReqDecline;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HandleFinReqDecline
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
     * @param  FinReqDecline  $event
     * @return void
     */
    public function handle(FinReqDecline $event)
    {
        $event->fin_req->status = 'declined';
        $event->fin_req->save();
    }
}
