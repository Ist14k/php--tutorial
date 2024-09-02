<?php

namespace Core\Middleware;

class Guest
{
    public static function check()
    {
        if(isset($_SESSION['_auth']['loggedIn'])) {
            header('Location: /');
            exit();
        }
    }
}