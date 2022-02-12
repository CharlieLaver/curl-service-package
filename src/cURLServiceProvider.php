<?php

namespace Clvr7;

use Illuminate\Support\ServiceProvider;

class cURLServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->singleton( cURLService::class, function() {
            return new cURLService();
        });
    }
    
}