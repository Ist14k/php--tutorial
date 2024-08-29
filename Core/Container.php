<?php

namespace Core;

use Exception;

class Container
{
    protected array $bindings = [];

    /**
     * @param  string  $key
     * @param  callable  $resolver
     *
     * @return void
     */
    public function bind(string $key, callable $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    /**
     * @throws \Exception
     */
    public function resolve($key): object
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new Exception("No {$key} is bound in the container.");
        }

        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
    }

}