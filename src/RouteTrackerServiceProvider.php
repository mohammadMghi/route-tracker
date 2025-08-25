<?php

namespace YourName\RouteTracker;

use Illuminate\Support\ServiceProvider;
use YourName\RouteTracker\Middleware\TrackRoute;

class RouteTrackerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/route-tracker.php', 'route-tracker');
    }

    public function boot()
    { 
        $this->publishes([
            __DIR__.'/../config/route-tracker.php' => config_path('route-tracker.php'),
        ], 'config');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // Register middleware alias
        $this->app['router']->aliasMiddleware('track.route', TrackRoute::class);
    }
}