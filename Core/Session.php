<?php

namespace App\Core;

class Session
{

    public static function start()
    {
        session_start();
    }

    public static function put(string $key, $value)
    {
        return $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (! array_key_exists($key, $_SESSION)) {
            return false;
        } else {
            return $_SESSION[$key];
        }
    }

    public static function destroy()
    {
        session_unset();
        session_destroy();
    }

    public function __destruct()
    {
        $this->destroy();
    }
}