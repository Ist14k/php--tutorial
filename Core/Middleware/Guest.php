<?php

namespace Core\Middleware;

class Guest
{
    public static function check()
    {
        if (isset($_SESSION['loggedIn'])) {
            header('Location: /');
            exit();
        }
    }
}