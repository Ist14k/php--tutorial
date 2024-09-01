<?php

namespace Core;

class Authenticator
{
    public static function attempt(string $email, string $password): bool
    {
        $user = App::resolve(Database::class)
          ->query("SELECT * FROM users WHERE email = :email", [
            "email" => $email,
          ])->find();

        if($user) {
            if(password_verify($password, $user['password'])) {
                static::login($user);

                return true;
            }
        }

        return false;
    }

    public static function login($user): void
    {
        $_SESSION['loggedIn'] = true;
        $_SESSION['user']     = $user;

        session_regenerate_id(true);
    }

    public static function logout(): void
    {
        $_SESSION = [];
        session_destroy();

        $params = session_get_cookie_params();
        setcookie(
          'PHPSESSID',
          '',
          time() - 3600,
          $params['path'],
          $params['domain'],
          $params['secure'],
          $params['httponly']
        );
    }

}