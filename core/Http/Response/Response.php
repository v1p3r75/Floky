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

    /**
     * HTML Response
     * @param string $content
     * @param int $statusCode
     */
    public static function html(string $content, int $statusCode = 200) {

        http_response_code($statusCode);
        echo $content;
    }

    /**
     * Redirect Response
     * @param string $url
     * @param int $statusCode
     */
    public static function redirect(string $url, int $statusCode = 302) {

        header('Location: ' . $url, true, $statusCode);
        exit;
    }

    /**
     * Text Response
     * @param string $text
     * @param int $statusCode
     */
    public static function text(string $text, int $statusCode = 200) {

        header('Content-Type: text/plain');
        http_response_code($statusCode);
        echo $text;
    }
}
