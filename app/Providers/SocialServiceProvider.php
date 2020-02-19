<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Twitter;

class SocialServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      //dd('test');
      $this->app->singleton(Twitter::class, function () {
         return new Twitter(config('services.twitter.secret'));
         //return new App\Services\Twitter('aip-key from twitter'); // don't want to hardcore (usually reference from env)
      });
    }
}
