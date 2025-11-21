<?php

namespace App\Core;

class Router
{
    protected $routes = [];

    public function getRoutes()
    {
        return $this->routes;
    }

    protected function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];

        return $this;
    }

    public function smallBang($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require _file('HTTP/Controllers/' . $route['controller'] . 'Controller');
            }
        }

        return require _file('pages/NOT_FOUND.php');
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }


    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    //TODO: place this in a separate class/function/file
    public function ajax()
    {
        $page = $_SERVER['REQUEST_URI'] === '/contacts' ? 'contacts' : 'about';
        include _file("pages/$page");
        exit; // stop execution here for AJAX
    }
}