<?php

namespace Clvr7\ApiHelper;

use Illuminate\Support\ServiceProvider;

class ApiHelperServiceProvider extends ServiceProvider {

    public function boot() {
        $this -> loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this -> loadViewsFrom(__DIR__ .'/views','api-helper');
    }

    public function register() {
        
    }

}