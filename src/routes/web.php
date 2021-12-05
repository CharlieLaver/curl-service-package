<?php

use Illuminate\Http\Request;

Route::get('test', function() {
    return view('api-helper::test');
}) -> name('test');

Route::post('test', function(Request $request) {
    return $request -> all();
});