<?php

namespace Clvr7\cURLService;

class cURLService extends cURLServiceBase {

	public function __construct($endpoint, $auth = false) {
        $this -> init($endpoint, $auth);
    }

    public function addHeaders($headers) {
        curl_setopt($this -> ch, CURLOPT_HTTPHEADER, $headers);
    }

    public function addURLParams($params) {
        if(sizeof($params)) {
            $this -> endpoint .= "?";
            $index = 0;
            foreach($params as $key => $value) {
                $this -> endpoint .= $key ."=" . $value;
                if($index != (sizeof($params) -1)) {
                    $this -> endpoint .= "&";
                }
                $index++;
            }
        }
    }

    public function get() {
		$this -> curlOpts("GET");
        return $this -> return();
    }

    public function post($data) {
		$this -> curlOpts("POST", $data);
        return $this -> return();
    }

	public function put($data) {
		$this -> curlOpts("PUT", $data);
        return $this -> return();
	}

    ## NEEDS TO BE TESTED !!
    ## Find a test SOAP API
    public function soap($data) {
        $xml_string = $this -> formatSoapXML($data);        
        $this -> addHeaders(Array(
             "Content-type: text/xml;charset=\"utf-8\"",
             "Accept: text/xml",
             "Cache-Control: no-cache",
             "Pragma: no-cache",
             "SOAPAction: " . $this -> endpoint, 
             "Content-length: ". strlen($xml_string),
        ));
        $this -> curlOpts("SOAP", $xml_string);
        return $this -> return();
    }

    public function __destruct() {
        curl_close($this -> ch);
    }

}
