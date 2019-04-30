<?php

namespace App\Providers;

use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use App\Nova\Metrics\DonationsTotal;
use App\Nova\Metrics\DonationsBooker;
use App\Nova\Metrics\DonationsRoo;
use App\Nova\Metrics\AssistanceRequests;
use App\Nova\Metrics\CarePackageRequests;
use App\Nova\Metrics\DonationsPerDay;
use App\Nova\Metrics\DonationsByFund;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                // 'sarah@livelikeroo.org',
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            // new Help,
            new DonationsTotal, 
            new DonationsPerDay,
            new DonationsByFund,
            new DonationsRoo, 
            new DonationsBooker, 
            new CarePackageRequests, 
            new AssistanceRequests
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
