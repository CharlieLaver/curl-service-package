# curl-service-plugin

A composer plugin that provides sinple helpers for calling both REST and SOAP APIs in PHP. The package utilizes PHP cURL in an object orientated approach.

When creating an instance of cURLService there are 2 paramaters.
1.) The API endpoint (URL) - required.

2.) A auth array that contains the API username and password is necessary - optional.

e.g. Creating an instance of cURLService with auth.
~~~
$testAPI = new cURLService("https://testapi.com", Array(
    "username" => "testUser",
    "password" => "testPwd"
));
~~~

