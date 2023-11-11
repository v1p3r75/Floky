<?php
namespace Floky\Http\Responses;

class Response {

    /**
	 * JSON Response
	 * @param array $data
	 */

    public static function json(array $data = []){
		
		header('Content-Type: application/json');
		echo json_encode($data);
    }

}