<?php

namespace App\Core;

class Request
{
    
    /**
     * Return request uri
     * 
     * @return string
     */
    public static function uri()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    /**
     * Return request method
     * 
     * @return string
     */
    public static function method()
    {
        return trim($_SERVER['REQUEST_METHOD'], '/');
    }

}