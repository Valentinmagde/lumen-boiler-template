<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Dotenv\Dotenv;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-10 Override .env file
     *
     * @return void
     */
    public function register()
    {
        if (app()->environment('local', 'testing', 'development')) {
            $env = app()->environment();
            $dotenv = Dotenv::createMutable(__DIR__.'/../../', '.env.' .$env);
            $dotenv->load();
            $dotenv->required([
                'DB_CONNECTION',
                'DB_HOST',
                'DB_PORT',
                'DB_DATABASE',
                'DB_USERNAME',
                'DB_PASSWORD'
            ])->notEmpty();
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-10 Disable E_NOTICE, E_STRICT and E_DEPRECATED
     *
     * @return void
     */
    public function boot()
    {
        // Disable E_NOTICE, E_STRICT and E_DEPRECATED
        error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
    }
}
