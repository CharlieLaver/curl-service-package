# curl-service-plugin

A composer plugin that provides sinple helpers for calling both REST and SOAP APIs in PHP. The package utilizes PHP cURL in an object orientated approach.\

To install:
~~~
composer require clvr7/curl-service
~~~

When creating an instance of cURLService there are 2 paramaters.\
1.) The API endpoint (URL) - required.\

2.) A auth array that contains the API username and password if necessary - optional.\

e.g. Creating an instance of cURLService with auth.\
~~~
$testAPI = new cURLService("https://testapi.com/api", Array(
    "username" => "testUser",
    "password" => "testPwd"
));
~~~

## Add Headers
To add headers to a request you can call the addHeaders() method in cURLService.\
~~~
$testAPI -> addHeaders(
    "Content-type: text/xml;charset=\"utf-8\""
);
~~~

## Add URL parameters
To add URL params to an endpoint, you can call the addURLParams() method in cURLService. This method expects an array of key value pairs that are added as URL parameters at the end of the endpoint.\
~~~
$testAPI -> addURLParams(Array(
    "key1" => "value1",
    "key2" => "value2",
));
~~~
This example will modify the endpoint like so: "https://testapi.com/api?key1=value1&key2=value2".\

### GET REQ
~~~
$testAPI -> get();
~~~

### POST REQ
~~~
$testAPI -> post(Array(
    "key1" => "value1",
    "key2" => "value2",
));
~~~

### PUT REQ
~~~
$testAPI -> put(Array(
    "key1" => "value1",
    "key2" => "value2",
));
~~~

### SOAP REQ

To MAKE A SOAP POST request you can call the soap() method in cURLService. This method expects an array of SOAP parameters which is then formatted into a xml string (formatSoapXML() in cURLServiceBase).\

e.g.
~~~
$testAPI -> soap(
  "paramKey1" => Array(
     "key" => "value"			
  ),
);
~~~
This example will format a xml post string like so:
~~~
<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
	<soap:Body>
		<m: paramKey1>
			<m: key>value</m: key>
		</m: paramKey1>
	</soap:Body>
</soap:Envelope>
~~~
