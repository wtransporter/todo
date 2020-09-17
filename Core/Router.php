<?php

namespace App\Core;

class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;

        require APPROOT . '/' . $file;

        return $router;
    }
    
    public function direct($uri, $requestType)
    {
        if (! array_key_exists($uri, $this->routes[$requestType])) {
            
            die('Error loadin page!');

        }

        $this->callAction(
            ...explode('@', $this->routes[$requestType][$uri])
        );
    }

    public function get($url, $controller)
    {
        $this->routes['GET'][$url] = $controller;
    }

    public function post($url, $controller)
    {
        $this->routes['POST'][$url] = $controller;
    }

    public function callAction($controller, $method)
    {
        $controller = "App\\Controllers\\{$controller}";

        $controller = new $controller;

        if (! method_exists($controller, $method)) {
            throw new Exception("Error Processing Request.");
        }

        return $controller->$method();
    }
}