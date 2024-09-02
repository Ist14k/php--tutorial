<?php

use Core\Session;

const BASE_PATH = __DIR__.'/../';
require BASE_PATH.'Core/functions.php';

spl_autoload_register(function($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require basePath("{$class}.php");
});

Core\Session::start();

require basePath('bootstrap.php');

$uri    = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router = new Core\Router();

require basePath('routes.php');

$router->route($uri, $method);

Session::destroySession('_flash');

