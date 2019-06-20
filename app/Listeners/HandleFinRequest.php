<?php

namespace App\Listeners;

use App\Events\FinRequestReceived;
use App\Mail\FinReqReceivedEmail;
use App\Mail\MedicalRecordEmail;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Mail;

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
     * Handle a financial assistance request.
     *
     * @param  FinRequestReceived  $event
     * @return void
     */
    public function handle(FinRequestReceived $event)
    {
        // send confirmation email to applicant
        Mail::to($event->fin_req->email)->send(new FinReqReceivedEmail($event->fin_req));

    }
}
