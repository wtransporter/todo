<?php

namespace App\Core;

class Router
{
    protected $uri;
    protected $routes = [];

    public function define($routes)
    {
        $this->routes = $routes;
    }

    public function get($uri)
    {
        if (! array_key_exists($uri, $this->routes)) {
            
            die('Error loadin page!');

        }

        $this->callAction(
            ...explode('@', $this->routes[$uri])
        );
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