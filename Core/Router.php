<?php

namespace Core;
use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    protected function addRoute($uri, $controller, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->addRoute($uri, $controller, 'GET');
    }

    public function post($uri, $controller)
    {
        return $this->addRoute($uri, $controller, 'POST');
    }

    public function delete($uri, $controller)
    {
        return $this->addRoute($uri, $controller, 'DELETE');
    }

    public function patch($uri, $controller)
    {
        return $this->addRoute($uri, $controller, 'PATCH');
    }

    public function put($uri, $controller)
    {
        return $this->addRoute($uri, $controller, 'PUT');
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }

    public function route(string $uri, string $method): void
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                isset($route['middleware']) && Middleware::resolve($route['middleware']);

                // if (isset($route['middleware']) && $route['middleware'] === 'guest') {
                //     Guest::check();
                // }

                // if (isset($route['middleware']) && $route['middleware'] === 'auth') {
                //     Auth::check();
                // }

                require basePath('Http/Controllers/' . $route['controller']);

                return;
            }
        }

        $this->abort(404, 'Page not found');
    }

    protected function abort(int $code, string $message): void
    {
        http_response_code($code);
        die($message);
    }
}
