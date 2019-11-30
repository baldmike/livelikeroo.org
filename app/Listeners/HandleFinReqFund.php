<?php

namespace App\Listeners;

use App\Events\FinReqFund;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HandleFinReqFund
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
     * @param  FinReqFund  $event
     * @return void
     */
    public function handle(FinReqFund $event)
    {
        $event->fin_req->status = 'funded';
        $event->fin_req->save();
    }
}
