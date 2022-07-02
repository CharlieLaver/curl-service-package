<?php

namespace CharlieLaver;

class curlServiceBase {

    protected $endpoint = false;
    protected $ch = false;

    protected function init($endpoint, $auth) {
        $this -> endpoint = $endpoint;
        $this -> ch = curl_init();
        if($auth) {
            curl_setopt($this -> ch, CURLOPT_USERPWD, "{$auth['username']}:{$auth['password']}");
        }
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

    protected function formatSoapXML($data) {
        $xmlString = "<?xml version=\"1.0\" encoding=\"utf-8\"?><soap:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" 
        xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\"><soap:Body>";
        
        foreach($data as $param => $paramData) {
            $xmlString .= "<m: " . $param . ">";
                foreach($paramData as $pdKey => $pd) {
                    $xmlString .= "<m: " . $pdKey . ">" . $pd . "</m: " . $pdKey . ">";
                }
            $xmlString .= "</m: " . $param . ">";
        }

        $xmlString .= "</soap:Body></soap:Envelope>";

        return $xmlString;
    }

    protected function return() {
        $response = curl_exec($this -> ch);
        if($e = curl_error($this -> ch)) {
            return Array(
                "success" => false,
                "errors" => json_decode($e, true),
            );
        } else {
            return Array(
                "success" => true,
                "data" => json_decode($response, true),
            );
        }
    }

}