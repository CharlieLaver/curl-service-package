<?php

namespace Clvr7\ApiClient;

class REST extends ApiClientBase {

    public static function get($endpoint) {
		$ch = self::curlOpts("GET", $endpoint);
        $response = curl_exec($ch);
        if($e = curl_error($ch)) {
            return self::formatReturnData($e, false);
        } else {
            return self::formatReturnData($response, true);
        }
        curl_close();
    }

    public static function post($endpoint, $data) {
		$ch = self::curlOpts("POST", $endpoint, $data);
        $response = curl_exec($ch);
        if($e = curl_error($ch)) {
            return self::formatReturnData($e, false);
        } else {
            return self::formatReturnData($response, true);
        }
        curl_close();
    }

	public static function put($endpoint, $data) {
		$ch = self::curlOpts("PUT", $endpoint, $data);
        $response = curl_exec($ch);
        if($e = curl_error($ch)) {
            return self::formatReturnData($e, false);
        } else {
            return self::formatReturnData($response, true);
        }
        curl_close();
	}
 
}