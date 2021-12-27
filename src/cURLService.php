<?php

namespace Clvr7\cURLService;

## TODO
    # SOAP REQ - https://stackoverflow.com/questions/7120586/soap-request-in-php-with-curl

class cURLService extends cURLServiceBase {

	public function __construct($endpoint, $APIKey = false) {
        $this -> init($endpoint, $APIKey);
    }

    public function addHeaders($headers) {
        curl_setopt($this -> ch, CURLOPT_HTTPHEADER, $headers);
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
