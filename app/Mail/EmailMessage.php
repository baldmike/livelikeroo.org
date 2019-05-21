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

        Log::debug("THIS IS THE MESSAGE ---------------------------------->");
        Log::debug($message);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::debug($this->message->email);
        return $this->from($this->message->email)->markdown('emails.message');
    }
}