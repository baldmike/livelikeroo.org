<?php

namespace App\Listeners;

use App\Events\FinRequestRecieved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HandleFinRequest
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
     * @param  FinRequestRecieved  $event
     * @return void
     */
    public function handle(FinRequestRecieved $event)
    {
        //
    }
}
