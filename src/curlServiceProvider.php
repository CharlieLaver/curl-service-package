<?php

namespace mogg1;

use Illuminate\Support\ServiceProvider;

class curlServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->singleton( curlService::class, function() {
            return new curlService();
        });
    }
    
}
