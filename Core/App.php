<?php

namespace Core;

class App
{
    protected static object $container;

    public static function setContainer($container): void
    {
        static::$container = $container;
    }

    public static function bind(string $key, $resolver): void
    {
        static::$container->bind($key, $resolver);
    }

    public static function resolve(string $key)
    {
        return static::$container->resolve($key);
    }
}