<?php

namespace MohammadMghi\RouteTracker;;

use Illuminate\Support\ServiceProvider;
use MohammadMghi\RouteTracker\Http\Middleware\TrackRoute;

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

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'route-tracker');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
 
        $this->app['router']->aliasMiddleware('track.route', TrackRoute::class);
    }
}