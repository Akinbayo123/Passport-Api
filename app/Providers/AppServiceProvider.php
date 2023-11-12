<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Passport::tokensCan([
            //Admin Scope
            'admin' => 'Access to admin routes',
            //Subscriber Scope
            'subscriber' => 'Access to subscriber routes',
        ]);
    }
}
