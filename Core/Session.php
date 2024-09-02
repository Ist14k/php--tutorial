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
        $keys = explode('.', $key);

        $callable = "\$_SESSION";

        if(count($keys) > 1) {
            for($i = 0; $i < count($keys); $i++) {
                $callable .= "['{$keys[$i]}']";
            }
        }

        if(count($keys) > 1) {
            $_SESSION[$keys[0]][$keys[1]] = $value;
        } else {
            $_SESSION[$key] = $value;
        }
    }

    public static function flash(string $key, $value): void
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function get(string $key, string $secondaryKey = null)
    {
        if($secondaryKey) {
            return $_SESSION[$key][$secondaryKey] ?? null;
        }

        return $_SESSION[$key] ?? null;
    }

    public static function destroySession(
      string $key,
      string $secondaryKey = null
    ): void {
        if($secondaryKey) {
            unset($_SESSION[$key][$secondaryKey]);
        } else {
            unset($_SESSION[$key]);
        }
    }

}