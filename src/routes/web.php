<?php

use Clvr7\ApiHelper\Http\Controllers\RESTController;

Route::get('/rest-test', [RESTController::class, 'test']);
