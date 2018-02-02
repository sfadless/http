# HTTP

Small library for get/post requests

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

$params = [
    'param1' => 'value',
    'param2' => 'value2'
];

$headers = [
    'header1' => 'value',
    'header2' => 'value'
];

$response = $http->post('http://some.url', $params);

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

#### JSON response
By default, return values is string. If you want json response, pass it to constructor.
Return value would converts to array by php json_decode function. If cant, it will throw a SimpleHttpException.
```php
use Sfadless\Utils\Http\Http;
use Sfadless\Utils\Http\SimpleHttpException;

try {
    $http = new Http('json');
    
    $response = $http->post('http://some.url')
} catch (SimpleHttpException $e) {
    //do something    
}
```