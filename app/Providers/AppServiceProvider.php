<?php

namespace App\Providers;

use App\Http\Controllers\Auth\CustomUserProvider;
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
        //
        $this->app->auth->provider("custom", function ($app, array $config) {
            return new CustomUserProvider($app["hash"], $config["model"]);
        });
    }
}