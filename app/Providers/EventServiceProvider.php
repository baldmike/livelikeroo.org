<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\CarePackageBuyLabel' => [
            'App\Listeners\BuyCarePackageLabel',
        ],

        'App\Events\CarePackageShip' => [
            'App\Listeners\ShipCarePackage',
        ],

        'App\Events\FinRequestReceived' => [
            'App\Listeners\HandleFinRequest',
        ],

        'App\Events\FinReqDecline' => [
            'App\Listeners\HandleFinReqDecline',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
