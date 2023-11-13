<?php

namespace Floky\Http\Requests;

use Floky\Http\Requests\Content\Files;
use Floky\Http\Requests\Content\Header;

class Request
{
    
    use Files;

    public static ?Request $instance = null;

    public string $attr = "start"; /* Just for middlewares testing */

    public static array $data = [];

    public static function getInstance()
    {

        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function saveRequestData(array $data) {

        self::$data = $data;

        return true;
    }


    public static function input(string $key, $default = null): string | null
    {

        return isset(self::$data[$key]) ? secure(self::$data[$key]) : $default;
    }

    public static function only(array $keys): array
    {

        $result = array_filter(self::$data, fn($key) => in_array($key, $keys), ARRAY_FILTER_USE_KEY);

        return secure($result);
    }
    
    public static function all(): array
    {

        return secure(self::$data);
    }

    public static function getUri(string $type = 'string')
    {

        return secure($_SERVER['REQUEST_URI']);
        
    }

    public static function getUrl()
    {

        return secure($_SERVER['REQUEST_URI']);
    }

    public static function getMethod()
    {

        return secure($_SERVER['REQUEST_METHOD']);
    }

    public static function redirectTo($url = '')
    {

        header('Location: ' . $url);
        exit;
    }

    public static function isMethod(string $method)
    {
        return self::getMethod() === strtoupper($method);
    }

    public static function isGet()
    {
        return self::isMethod('GET');
    }

    public static function isPost()
    {
        return self::isMethod('POST');
    }

    public static function isPut()
    {
        return self::isMethod('PUT');
    }

    public static function isDelete()
    {
        return self::isMethod('DELETE');
    }

    public static function isPatch()
    {
        return self::isMethod('PATCH');
    }

    public static function isOptions()
    {
        return self::isMethod('OPTIONS');
    }

    public static function isHead()
    {
        return self::isMethod('HEAD');
    }
    
    public static function header(): Header
    {

        return Header::getInstance();
    }
}
