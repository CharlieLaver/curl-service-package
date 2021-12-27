<?php

namespace Clvr7\cURLService;

class RESTService extends cURLService {

	public function __construct($endpoint) {
        $this -> init($endpoint);
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
