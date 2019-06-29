<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\FinReq;

class FinReqReceivedEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The FinReq instance.
     *
     * @var fin_req
     */
    public $fin_req;

    /**
     * Create a new donation instance.
     *
     * @return void
     */
    public function __construct(FinReq $fin_req)
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
        return $this->view('emails.fin_req')
                    ->subject('We\'ve received your request.');
    }
}
