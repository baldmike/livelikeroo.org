<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Donation;
use App\Models\User;

class MonthlyDonation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The donation instance.
     *
     * @var Donation
     */
    public $donation;

    /**
     * The user instance.
     *
     * @var User
     */
    public $user;

    /**
     * Create a new donation instance.
     *
     * @return void
     */
    public function __construct(Donation $donation, User $user)
    {
        $this->donation = $donation;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.monthly')
                    ->subject('Thank You!');
    }
}
