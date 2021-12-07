<?php

namespace Clvr7\ApiClient;

use Illuminate\Support\ServiceProvider;

class ApiClientServiceProvider extends ServiceProvider {

    public function boot() {
        # https://stackoverflow.com/questions/56593999/how-to-make-a-class-accessible-globally-in-a-laravel-application
        $this->app->singleton('settings', function ($app) {
            return new RESTService;
        });

    }

    public function register() {
        
    }

}