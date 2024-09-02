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
        Session::put('_auth.loggedIn', true);
        Session::put('_auth.user', $user);

        session_regenerate_id(true);
    }

    public static function logout(): void
    {
        Session::destroySession('_auth');
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