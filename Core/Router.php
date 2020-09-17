<?php



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
        if (array_key_exists($uri, $this->routes)) {
            if (file_exists($this->routes[$uri])) {
                return require $this->routes[$uri];
            }
        }

        die("Page couldn't be found !");
    }

}