<?php

namespace App\Core;

class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * Load routes from file
     * 
     * @param $file
     */
    public static function load($file)
    {
        $router = new static;

        require APPROOT . '/' . $file;

        return $router;
    }
    
    /**
     * Direct request to required action
     * 
     * @param $uri request uri
     * @param $requestType request method
     */
    public function direct($uri, $requestType)
    {
        if (! array_key_exists($uri, $this->routes[$requestType])) {
            
            die('Error loadin page!');

        }

        $this->callAction(
            ...explode('@', $this->routes[$requestType][$uri])
        );
    }

    /**
     * Sets routes for GET request
     * 
     * @param $url
     * @param $controller
     */
    public function get($url, $controller)
    {
        $this->routes['GET'][$url] = $controller;
    }

    /**
     * Sets routes for POST request
     * 
     * @param $url
     * @param $controller
     */
    public function post($url, $controller)
    {
        $this->routes['POST'][$url] = $controller;
    }

    /**
     * Call controller method
     * 
     * @param $controller
     * @param $method
     */
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