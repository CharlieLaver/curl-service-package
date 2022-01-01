# curl-service-plugin

A composer plugin that provides sinple helpers for calling both REST and SOAP APIs in PHP. The package utilizes PHP cURL in an object orientated approach.\

When creating an instance of cURLService there are 2 paramaters.\
1.) The API endpoint (URL) - required.\

2.) A auth array that contains the API username and password is necessary - optional.\

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
still in dev