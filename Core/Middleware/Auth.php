<?php

namespace Core\Middleware;

class Auth
{
    public static function check(): void
    {
        if( ! isset($_SESSION['_auth']['loggedIn'])) {
            header('Location: /login');
            exit();
        }
    }
}