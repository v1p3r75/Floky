<?php

namespace Floky\Http\Requests;

class Request  {
    
    /**
	 * Get Value from GET method
	 * @
	 * @param string $key
	 * @return array|string|void
	 */

    public function fromGet(string $key = '') {

        if(!empty($key)) return secure($_GET[$key]);
		return $_GET;
    }

	/**
	 * Get value from POST method
	 * @param string $key
	 * @return array|string|void
	 */

    public function fromPost(string $key = '')
    {
        if(!empty($key)) return secure($_POST[$key]);
		
        return $_POST;
    }

	public function fromGetOnly(array $keys =[]){

		$keyList = [];

		foreach($keys as $key){

			$keyList[] = secure($_GET[$key]);
		}

		return $keyList;
	}

	public function fromPostOnly(array $keys =[]){

		$keyList = [];

		foreach($keys as $key){
			$keyList[] = secure($_POST[$key]);
		}

		return $keyList;
	}

	public function getUri(string $type = 'string') {

		if($type == 'string') return $_SERVER['REQUEST_URI'];
		else if($type == 'array') return explode('/',$_SERVER['REQUEST_URI']);
		return null;
	}

	public function getUrl() {

		return $_SERVER['REQUEST_URI'];
	}

	public function getMethod() {

        return $_SERVER['REQUEST_METHOD'];

    }

	public function redirectTo($url = '') {

		return header('Location: ' . $url);
	}

}