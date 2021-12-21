<?php


namespace Clvr7\ApiClient;

class ApiClientBase {

    protected static function formatReturnData($data, $success) {
        if($success) {
            return Array(
                "success" => true,
                "data" => json_decode($data, true),
            );
        } else {
            return Array(
                "success" => false,
                "errors" => $data,
            );
        }
    }

    protected static function curlOpts($reqType, $endpoint, $data = false) {
        $ch = curl_init();
        switch($reqType) {
            case "GET":
                curl_setopt($ch, CURLOPT_URL, $endpoint);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                break;
            case "POST":
                curl_setopt($ch, CURLOPT_URL, $endpoint);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                break;
            case "PUT":
                curl_setopt($ch, CURLOPT_URL, $endpoint);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                break;
        }
        return $ch;
    }

}