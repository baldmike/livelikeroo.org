<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\FinReqNote;
use App\Observers\FinReqNoteObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Shippo::setApiKey($this->app['config']['services.shippo.key']);

        FinReqNote::observe(FinReqNoteObserver::class);
    }
}
