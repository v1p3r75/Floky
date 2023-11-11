<?php

namespace Floky\Http\Requests;

class Header
{

    public static ?Header $instance = null;

    private function __construct(){}
    
    public static function getInstance() {

        if (!self::$instance) {

            self::$instance = new self;
        }
        return self::$instance;
    }

	public static function get(string $headerName) {

        $headerName = 'HTTP_' . strtoupper(str_replace('-', '_', $headerName));

        if (isset($_SERVER[$headerName])) {

            return secure($_SERVER[$headerName]);
        }

        return null;
    }

    public static function getAll() {

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

    public static function set(string $headerName, string $headerValue) {

        header($headerName . ': ' . $headerValue);

        return true;
    }
}