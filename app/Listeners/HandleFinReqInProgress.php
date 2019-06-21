<?php

namespace App\Listeners;

use App\Events\FinReqInProgress;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HandleFinReqInProgress
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
     * @param  FinReqInProgress  $event
     * @return void
     */
    public function handle(FinReqInProgress $event)
    {
        $event->fin_req->status = 'in progress';
        $event->fin_req->save();
    }
}
