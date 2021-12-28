<?php


namespace Clvr7\cURLService;

class cURLServiceBase {

    protected $endpoint = false;
    protected $ch = false;

    protected function init($endpoint) {
        $this -> endpoint = $endpoint;
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
            case "SOAP":
                curl_setopt($this -> ch, CURLOPT_SSL_VERIFYPEER, 1);
                curl_setopt($this -> ch, CURLOPT_URL, $this -> endpoint);
                curl_setopt($this -> ch, CURLOPT_RETURNTRANSFER, true);
                ## Need to add auth login func
                // curl_setopt($ch, CURLOPT_USERPWD, $this -> soapUser.":".$this -> soapPassword);
                curl_setopt($this -> ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                curl_setopt($this -> ch, CURLOPT_TIMEOUT, 10);
                curl_setopt($this -> ch, CURLOPT_POST, true);
                curl_setopt($this -> ch, CURLOPT_POSTFIELDS, $data);
                break;
        }
    }

    protected function return() {
        $response = curl_exec($this -> ch);
        if($e = curl_error($this -> ch)) {
            return Array(
                "success" => false,
                "data" => json_decode($e, true),
            );
        } else {
            return Array(
                "success" => true,
                "errors" => json_decode($response, true),
            );
        }
    }

}