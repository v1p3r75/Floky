<?php

namespace Floky\Http\Requests;

class Request {
    
    public static ?Request $instance = null;

    public array $attr = ['name' => 'fucker', 'password' => ''];

    public static function getInstance() {

        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public static function fromGet(string $key = null) {

        if ($key !== null && isset($_GET[$key])) {

            return secure($_GET[$key]);
        }

        return secure($_GET);
    }

    public static function fromPost(string $key = null) {

        if ($key !== null && isset($_POST[$key])) {

            return secure($_POST[$key]);
        }

        return secure($_POST);
    }

    public static function fromGetOnly(array $keys = []) {

        $keyList = [];
        foreach ($keys as $key) {

            if (isset($_GET[$key])) {

                $keyList[$key] = secure($_GET[$key]);
            }
        }
        return $keyList;
    }

    public static function fromPostOnly(array $keys = []) {

        $keyList = [];
        foreach ($keys as $key) {

            if (isset($_POST[$key])) {

                $keyList[$key] = secure($_POST[$key]);
            }
        }
        return $keyList;
    }

    public static function getUri(string $type = 'string') {

        if ($type === 'string') {

            return secure($_SERVER['REQUEST_URI']);

        } else if ($type === 'array') {

            return explode('/', secure($_SERVER['REQUEST_URI']));
        }
    }

    public static function getUrl() {

        return secure($_SERVER['REQUEST_URI']);
    }

    public static function getMethod() {

        return secure($_SERVER['REQUEST_METHOD']);
    }

    public static function redirectTo($url = '') {

        header('Location: ' . $url);
        exit;
    }

	
	public static function header(): Header {

		return Header::getInstance();
	}
}
