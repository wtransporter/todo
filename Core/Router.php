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
        $newUrl = $uri;
        if (! strrpos($uri, '/', -1) == false) {
            $newUri = trim(substr($uri, 0, strrpos($uri, '/', -1)), '/');
            if (isset($this->routes[$requestType][$newUri]['param'])) {
                $newUrl = $newUri;
                $parameter = trim(substr($uri, strrpos($uri, '/', -1)), '/');
            }
        }

        if (! array_key_exists($newUrl, $this->routes[$requestType])) {
            
            die('Error loadin page!');

        }

        $data = explode('@', $this->routes[$requestType][$newUrl]['controller']);
        $data[] = $parameter ?? '';

        $this->callAction(
            ...$data
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
        if (strpos($url, '{', 0) == false) {
            $this->routes['GET'][$url] = [
                'controller' => $controller
            ];
        } else {
            $uri = trim(substr($url, 0, strrpos($url, '{', -1)), '/');
            $param = trim(substr($url, strrpos($url, '{', -1)), '/{}');
            
            $this->routes['GET'][$uri] = [
                'controller' => $controller,
                'param' => $param
            ];
        }
    }

    /**
     * Sets routes for POST request
     * 
     * @param $url
     * @param $controller
     */
    public function post($url, $controller)
    {
        if (strpos($url, '{', 0) == false) {
            $this->routes['POST'][$url] = [
                'controller' => $controller
            ];
        } else {
            $uri = trim(substr($url, 0, strrpos($url, '{', -1)), '/');
            $param = trim(substr($url, strrpos($url, '{', -1)), '/{}');
            
            $this->routes['POST'][$uri] = [
                'controller' => $controller,
                'param' => $param
            ];
        }
    }

    /**
     * Call controller method
     * 
     * @param $controller
     * @param $method
     */
    public function callAction($controller, $method, $param = '')
    {
        $controller = "App\\Controllers\\{$controller}";

        $controller = new $controller;

        if (! method_exists($controller, $method)) {
            throw new Exception("Error Processing Request.");
        }

        return $controller->$method($param);
    }
}