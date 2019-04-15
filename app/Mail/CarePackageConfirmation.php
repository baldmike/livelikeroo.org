<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Http\Requests\CarePackageRequest;

use App\Models\CarePackage;

class CarePackageConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The donation instance.
     *
     * @var CarePackage
     */
    public $care_package;

    /**
     * Create a new donation instance.
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
        return $this->view('emails.care_package');
    }
}
