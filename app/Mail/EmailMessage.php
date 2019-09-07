<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Log;

use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Message;

class EmailMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The  instance.
     *
     * @var Message
     */
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($this->message->email)
            ->markdown('emails.message');
    }
}