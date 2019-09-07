<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Donation;

class NotifyEmail extends Mailable
{
    use Queueable, SerializesModels;

   /**
     * The donation instance.
     *
     * @var Donation
     */
    public $donation;

    /**
     * Create a new donation instance.
     *
     * @return void
     */
    public function __construct(Donation $donation)
    {
        $this->donation = $donation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.in_memory')
                ->subject('Thinking of you');
    }
}
