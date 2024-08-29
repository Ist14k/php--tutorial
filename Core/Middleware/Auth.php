<?php

namespace Core\Middleware;

class Auth
{
    public static function check()
    {
        if (!isset($_SESSION['loggedIn'])) {
            header('Location: /login');
            exit();
        }
    }
}