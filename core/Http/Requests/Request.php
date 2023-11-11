<?php

namespace Floky\Http\Requests;

class Request  {
    

	public static ?Request $instance = null;

	public array $attr = ['name' => 'test', 'password' => ''];

	public static function getInstance() {

        if(!self::$instance) {

            self::$instance = new self;
        }

        return self::$instance;
    }
    /**
	 * Get Value from GET method
	 * @
	 * @param string $key
	 * @return array|string|void
	 */

    public static function fromGet(string $key = '') {

        if(!empty($key)) return secure($_GET[$key]);
		return $_GET;
    }

	/**
	 * Get value from POST method
	 * @param string $key
	 * @return array|string|void
	 */

    public static function fromPost(string $key = '')
    {
        if(!empty($key)) return secure($_POST[$key]);
		
        return $_POST;
    }

	public static function fromGetOnly(array $keys =[]){

		$keyList = [];

		foreach($keys as $key){

			$keyList[] = secure($_GET[$key]);
		}

		return $keyList;
	}

	public static function fromPostOnly(array $keys =[]){

		$keyList = [];

		foreach($keys as $key){
			$keyList[] = secure($_POST[$key]);
		}

		return $keyList;
	}

	public static function getUri(string $type = 'string') {

		if($type == 'string')

			return $_SERVER['REQUEST_URI'];

		else if($type == 'array')

			return explode('/',$_SERVER['REQUEST_URI']);
	}

	public static function getUrl() {

		return $_SERVER['REQUEST_URL'];
	}

	public static function getMethod() {

        return $_SERVER['REQUEST_METHOD'];

    }

	public static function redirectTo($url = '') {

		return header('Location: ' . $url);
	}

}