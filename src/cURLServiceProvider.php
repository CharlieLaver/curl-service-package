<?php

namespace Clvr7\cURLService;

use Illuminate\Support\ServiceProvider;

class cURLServiceProvider extends ServiceProvider {

    public function register() {

        $this->app->singleton( RESTService::class, function() {
            return new RESTService();
        });

        $this->app->singleton( SOAPService::class, function() {
            return new SOAPService();
        });
        
    }
    
}