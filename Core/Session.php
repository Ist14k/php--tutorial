<?php

namespace Core;

class Session
{
    public static function start(): void
    {
        session_start();
    }

    public static function put(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function flash(string $key, $value): void
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function get(string $key)
    {
        return $_SESSION[$key] ?? null;
    }

    public static function destroySession(string $key): void
    {
        unset($_SESSION[$key]);
    }

}