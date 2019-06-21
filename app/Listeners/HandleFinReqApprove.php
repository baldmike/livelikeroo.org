<?php

namespace App\Listeners;

use App\Events\FinReqApprove;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HandleFinReqApprove
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
     * @param  FinReqApprove  $event
     * @return void
     */
    public function handle(FinReqApprove $event)
    {
        $event->fin_req->status = 'approved';
        $event->fin_req->save();
    }
}
