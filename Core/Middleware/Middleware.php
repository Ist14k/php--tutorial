<?php

namespace Core\Middleware;

class Middleware
{
    public const MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class,
    ];

    public static function resolve($key)
    {
        if (!$key) {
            return;
        }

        if (!array_key_exists($key, static::MAP)) {
            throw new \Exception("Middleware {$key} not found");
        }

        $middleware = static::MAP[$key] ?? false;
        $middleware::check();
    }
}