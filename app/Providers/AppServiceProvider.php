<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() { // Reference anything laravel framework (as it is already booted up)
    \URL::forceScheme('https');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() // fired for every single service provider, primary place to bind things into container
    {
        $this->app->singleton('service', function() {
           
           return 'Service Provider example';
        });
    }
}
