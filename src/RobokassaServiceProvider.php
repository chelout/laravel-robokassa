<?php

namespace Chelout\Robokassa;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class RobokassaServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Application is booting.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('robokassa.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'robokassa');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('robokassa', function (Application $app) {
            return new Robokassa(config('robokassa'));
        });
    }

    public function provides()
    {
        return ['robokassa'];
    }
}
