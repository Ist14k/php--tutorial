<?php

session_start();

$_SESSION['loggedIn'] = true;
$_SESSION['user'] = [
    'id' => '1',
    'email' => 'istiak@example.com',
];

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require basePath("{$class}.php");
});

require basePath('bootstrap.php');

$router = new Core\Router();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

require basePath('routes.php');

$router->route($uri, $method);

