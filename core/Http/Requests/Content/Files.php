<?php

namespace Floky\Http\Requests\Content;

trait Files
{
    public static function hasFile(string $inputName)
    {
        return isset($_FILES[$inputName]);
    }

    public static function getFile(string $inputName)
    {
        if (self::hasFile($inputName)) {
            return $_FILES[$inputName];
        }
        return null;
    }

    public static function moveUploadedFile(string $inputName, string $destination)
    {
        if (self::hasFile($inputName)) {
            $file = $_FILES[$inputName];
            if ($file['error'] === UPLOAD_ERR_OK) {
                $destination = rtrim($destination, '/') . '/' . $file['name'];
                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    return $destination;
                }
            }
        }
        return null;
    }

}