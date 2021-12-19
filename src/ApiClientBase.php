<?php


namespace Clvr7\ApiClient;

class ApiClientBase {

    protected static function formatReturnData($data, $success) {
        if($success) {
            return Array(
                "success" => true,
                "data" => json_decode($data),
            );
        } else {
            return Array(
                "success" => false,
                "errors" => $data,
            );
        }
    }

}