<?php

namespace Clvr7\cURLService;

## TODO
    # Changing / adding url params to endpoint in diff methods
    # adding headers
    # SOAP req opt

class cURLService extends cURLServiceBase {

	public function __construct($endpoint, $APIKey = false) {
        $this -> init($endpoint, $APIKey);
    }

    public function get() {
		$this -> curlOpts("GET");
        $response = curl_exec($this -> ch);
        if($e = curl_error($this -> ch)) {
            return $this -> formatReturnData($e, false);
        } else {
            return $this -> formatReturnData($response, true);
        }
    }

    public function post($data) {
		$this -> curlOpts("POST", $data);
        $response = curl_exec($this -> ch);
        if($e = curl_error($this -> ch)) {
            return $this -> formatReturnData($e, false);
        } else {
            return $this -> formatReturnData($response, true);
        }
    }

	public function put($data) {
		$this -> curlOpts("PUT", $data);
        $response = curl_exec($this -> ch);
        if($e = curl_error($this -> ch)) {
            return $this -> formatReturnData($e, false);
        } else {
            return $this -> formatReturnData($response, true);
        }
	}

    public function __destruct() {
        curl_close($this -> ch);
    }

}
