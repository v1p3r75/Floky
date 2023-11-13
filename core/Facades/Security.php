<?php

namespace Floky\Facades;


class Security
{
    public static function check(string $password, string $hached_password): bool
    {

        return password_verify($password, $hached_password);

    }

    public static function hash(string $password, array $options = []) : string
    {

        $algo = $options['algo'] ?? PASSWORD_DEFAULT;

        return password_hash($password, $algo);
    }

    public static function secure(array | string $data)
    {
        if (is_array($data)) {

            foreach ($data as $key => $value) {
                
                $data[$key] = secure($value);
            }
    
        } else {
    
            $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        }
    
        return $data;
    }
}