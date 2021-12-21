<?php

namespace Clvr7\ApiClient;

class REST extends ApiClientBase {

    public static function get($endpoint) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if($e = curl_error($ch)) {
            return self::formatReturnData($e, false);
        } else {
            return self::formatReturnData($response, true);
        }
        curl_close();
    }

    public static function post($endpoint, $data) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if($e = curl_error($ch)) {
            return self::formatReturnData($e, false);
        } else {
            return self::formatReturnData($response, true);
        }
        curl_close();
    }
 
}