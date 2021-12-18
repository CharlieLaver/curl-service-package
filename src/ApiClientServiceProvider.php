<?php

namespace Clvr7\ApiClient;

use Illuminate\Support\ServiceProvider;

class ApiClientServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->singleton( RESTService::class, function() {
            return new RESTService();
        });
    }
    
}