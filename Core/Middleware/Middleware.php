<?php

namespace Core\Middleware;

use Exception;

class Middleware
{
    public const MAP
      = [
        'auth'  => Auth::class,
        'guest' => Guest::class,
      ];

    /**
     * @throws \Exception
     */
    public static function resolve($key): void
    {
        if( ! $key) {
            return;
        }

        if( ! array_key_exists($key, static::MAP)) {
            throw new Exception("Middleware {$key} not found");
        }

        $middleware = static::MAP[$key] ?? false;
    }
}