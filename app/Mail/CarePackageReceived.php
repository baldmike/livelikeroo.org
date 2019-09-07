<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\CarePackage;

class CarePackageReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * make $care_package available to blade template
     *
     * @var CarePackage
     */
    public $care_package;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CarePackage $care_package)
    {
        $this->care_package = $care_package;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('New Care Package Request')
            ->markdown('emails.care_package_received');
    }
}
