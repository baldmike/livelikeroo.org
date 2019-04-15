<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Finreq;

class FinReqReceivedEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The donation instance.
     *
     * @var Finreq
     */
    public $fin_req;

    /**
     * Create a new donation instance.
     *
     * @return void
     */
    public function __construct(Finreq $fin_req)
    {
        $this->fin_req = $fin_req;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.fin_req');
    }
}
