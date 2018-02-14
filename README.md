# HTTP small library for get/post requests

## Documentation
### Instalation
```
composer require Sfadless/http
```
### Usage

#### Basic usage
```php
use Sfadless\Utils\Http\Http;

require_once __DIR__ . '/vendor/autoload.php';

$http = new Http();

$response = $http->get('http://some.url');
$response = $http->post('http://some.url');
```
#### Usage with params and headers
```php
use Sfadless\Utils\Http\Http;

require_once __DIR__ . '/vendor/autoload.php';

$http = new Http();

$params = [
    'param1' => 'value',
    'param2' => 'value2'
];

$headers = [
    'header1' => 'value',
    'header2' => 'value'
];

$response = $http->post('http://some.url', $params, $headers);
```

#### Request and response formats
By default, response value is string and request value is array. If your service always return specific format (for example - json), you may pass those formats in constructor  
```php
use Sfadless\Utils\Http\Http;
use Sfadless\Utils\Http\Format\Request\ArrayRequestFormat;
use Sfadless\Utils\Http\Format\Response\JsonResponseFormat;

$http = new Http(
    new ArrayRequestFormat(), //instanse of RequestFormatInterface, used by default
    new JsonResponseFormat(), //instanse of ResponseFormatInterface, response value will be passed throught getFormattedResponse method
);

```
You may create your own formats for request and response by implementing RequestFormatInterface and ResponseFormatInterface.
In request, you should create formatParams() method, in which will be passed $params (second argument for ->post() and ->get() methods), and return value for stream context option.
For response format, you should implement getFormattedResponse() method, this is the layer between response from server and you code.