<?php

namespace App\Listeners;

use App\Events\FinReqClose;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HandleFinReqClose
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
     * @param  FinReqClose  $event
     * @return void
     */
    public function handle(FinReqClose $event)
    {
        $event->fin_req->status = 'closed';
        $event->fin_req->save();
    }
}
