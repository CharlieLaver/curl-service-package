<?php

namespace Clvr7\cURLService;

## STILL IN DEV - HAS NOT BEEN TESTED
class SOAPService extends cURLService {
	
        # SOAP REQ - https://stackoverflow.com/questions/7120586/soap-request-in-php-with-curl

		private $soapUser = false;
		private $soapPassword = false;

        public function __construct($endpoint, $soapAuth) {
            $this -> init($endpoint);
			$this -> soapUser = $soapAuth['user'];
			$this -> soapPassword = $soapAuth['pwd'];
        }

		public function addHeaders($headers) {
			curl_setopt($this -> ch, CURLOPT_HTTPHEADER, $headers);
		}

		public function post($data) {

			$xml_string = $this -> formatXML($data);

			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
			curl_setopt($ch, CURLOPT_URL, $this -> endpoint);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_USERPWD, $this -> soapUser.":".$this -> soapPassword);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_string);

			$this -> addHeaders(
				"Content-type: text/xml;charset=\"utf-8\"",
                 "Accept: text/xml",
                 "Cache-Control: no-cache",
                 "Pragma: no-cache",
                 "SOAPAction: " . $this -> endpoint, 
                 "Content-length: ". strlen($xml_string),
			);
	   
			$response = curl_exec($ch);

			## To be continued ...

		}

		private function formatXML($data) {
			## TODO - needs to dynamicaly create XML based on data passed
			$xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
                     <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                       <soap:Body>
                         <GetItemPrice xmlns="http://connecting.website.com/WSDL_Service"> // xmlns value to be set to your WSDL URL
                           <PRICE>'.$dataFromTheForm.'</PRICE> 
                         </GetItemPrice >
                       </soap:Body>
                     </soap:Envelope>';   // data from the form, e.g. some ID number
		}

        public function __destruct() {
            curl_close($this -> ch);
        }
}