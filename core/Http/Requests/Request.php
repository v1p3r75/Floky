<?php

namespace Floky\Http\Requests;

use Floky\Http\Requests\Content\Header;

class Request
{

    public static ?Request $instance = null;

    public array $attr = ['name' => 'fucker', 'password' => ''];

    public static function getInstance()
    {

        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public static function fromGet(string $key = null)
    {

        if ($key !== null && isset($_GET[$key])) {

            return secure($_GET[$key]);
        }

        return secure($_GET);
    }

    public static function fromPost(string $key = null)
    {

        if ($key !== null && isset($_POST[$key])) {

            return secure($_POST[$key]);
        }

        return secure($_POST);
    }

    public static function fromGetOnly(array $keys = [])
    {

        $keyList = [];
        foreach ($keys as $key) {

            if (isset($_GET[$key])) {

                $keyList[$key] = secure($_GET[$key]);
            }
        }
        return $keyList;
    }

    public static function fromPostOnly(array $keys = [])
    {

        $keyList = [];
        foreach ($keys as $key) {

            if (isset($_POST[$key])) {

                $keyList[$key] = secure($_POST[$key]);
            }
        }
        return $keyList;
    }

    public static function getUri(string $type = 'string')
    {

        if ($type === 'string') {

            return secure($_SERVER['REQUEST_URI']);
        } else if ($type === 'array') {

            return explode('/', secure($_SERVER['REQUEST_URI']));
        }
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
