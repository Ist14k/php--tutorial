<?php

use Core\Response;

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
    if (!$condition) {
        abort(Response::FORBIDDEN, "Not authorized!");
    }
}

function basePath($path): string
{
    return BASE_PATH . $path;
}

/**
 * @param  string  $view
 * @param  array  $data
 *
 * @return void
 */
function view(string $view, array $data = []): void
{
    extract($data);

    require basePath("views/{$view}");
}
