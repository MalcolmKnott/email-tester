<?php

namespace Malcolmknott\Emailtester;

use Illuminate\Support\ServiceProvider;
use Malcolmknott\Emailtester\Console\SendEmail;

class EmailtesterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'emailtester');

        $this->publishes([
            __DIR__.'/config/emailtester.php' => config_path('emailtester.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/resources/views' => base_path('resources/views/vendor/emailtester'),
        ], 'views');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([SendEmail::class]);

         $this->mergeConfigFrom(
            __DIR__.'/config/emailtester.php', 'emailtester'
        );
    }
}
