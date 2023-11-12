<?php

namespace Floky\Http\Requests\Content;

class Header
{

    public static ?Header $instance = null;

    private function __construct()
    {
    }

    public static function getInstance()
    {

        if (!self::$instance) {

            self::$instance = new self;
        }
        return self::$instance;
    }

    public static function get(string $headerName)
    {

        $headerName = 'HTTP_' . strtoupper(str_replace('-', '_', $headerName));

        if (isset($_SERVER[$headerName])) {

            return secure($_SERVER[$headerName]);
        }

        return null;
    }

    public static function getAll()
    {

        $headers = [];
        foreach ($_SERVER as $key => $value) {

            if (strpos($key, 'HTTP_') === 0) {
                $headerName = str_replace('HTTP_', '', $key);
                $headerName = str_replace('_', '-', ucwords(strtolower($headerName)));
                $headers[$headerName] = secure($value);
            }
        }

        return $headers;
    }

    public static function acceptJson()
    {
        $headers = self::getAll();
        return isset($headers['Accept']) && strpos($headers['Accept'], 'application/json') !== false;
    }

    public static function isAjax()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }
    public static function set(string $headerName, string $headerValue)
    {

        header($headerName . ': ' . $headerValue);

        return true;
    }

    public static function isSecure()
    {
        return isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
    }

    public static function getUserAgent()
    {
        return isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : null;
    }

    public static function getReferer()
    {
        return isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
    }

    public static function getClientIp()
    {
        return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
    }

    public static function getBearer()
    {
        $authorizationHeader = self::get('Authorization');

        if ($authorizationHeader && strpos($authorizationHeader, 'Bearer ') === 0) {
            return substr($authorizationHeader, 7);
        }

        return null;
    }
}
