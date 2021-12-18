<?php

namespace Clvr7\ApiClient;

class RESTService {

    private $endpoint = false;
    private $APIKey = false;

    function __construct($endpoint, $APIKey = false) {
        $this -> $endpoint = $endpoint;
        $this -> $APIKey = $APIKey;
    }

    public function post() {
        ## Send post request using curl or guzzle ?
        dd($this -> endpoint);
    }
 
}