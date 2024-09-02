<?php

use Core\Response;
use Core\Session;
use JetBrains\PhpStorm\NoReturn;

function dd($data): void
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die();
}

function urlIs($url): bool
{
    return $_SERVER["REQUEST_URI"] === $url;
}

function abort($code, $message = ""): void
{
    http_response_code($code);
    $heading = $code;
    view('error.view.php', compact('heading', 'message'));
    die();
}

function authorize($condition): void
{
    if( ! $condition) {
        abort(Response::FORBIDDEN, "Not authorized!");
    }
}

function basePath($path): string
{
    return BASE_PATH.$path;
}

function login($user): void
{
    $_SESSION['loggedIn'] = true;
    $_SESSION['user']     = $user;

    session_regenerate_id(true);
}

/**
 * @param  string  $view
 * @param  array  $data
 *
 * @return void
 */
#[NoReturn] function view(string $view, array $data = []): void
{
    extract($data);

    require basePath("views/{$view}");
}

#[NoReturn] function redirect($url): void
{
    header("Location: {$url}");
    exit();
}

function old(string $key, $default = ''): string
{
    return Session::get('_flash')['old'][$key] ?? $default;
}
