<?php


namespace Clvr7\cURLService;

class cURLServiceBase {

    protected $endpoint = false;
    protected $APIKey = false;
    protected $ch = false;

    protected function init($endpoint, $APIKey = false) {
        $this -> endpoint = $endpoint;
        $this -> APIKey = $APIKey;
        $this -> ch = curl_init();
    }

    protected function curlOpts($reqType, $data = false) {
        curl_reset($this -> ch);
        switch($reqType) {
            case "GET":
                curl_setopt($this -> ch, CURLOPT_URL, $this -> endpoint);
                curl_setopt($this -> ch, CURLOPT_RETURNTRANSFER, true);
                break;
            case "POST":
                curl_setopt($this -> ch, CURLOPT_URL, $this -> endpoint);
                curl_setopt($this -> ch, CURLOPT_POST, true);
                curl_setopt($this -> ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($this -> ch, CURLOPT_RETURNTRANSFER, true);
                break;
            case "PUT":
                curl_setopt($this -> ch, CURLOPT_URL, $this -> endpoint);
                curl_setopt($this -> ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($this -> ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($this -> ch, CURLOPT_RETURNTRANSFER, true);
                break;
        }
    }

    protected function formatReturnData($data, $success) {
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

}