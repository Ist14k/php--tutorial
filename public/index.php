<?php

use Core\Session;
use Core\ValidationException;

const BASE_PATH = __DIR__.'/../';
require BASE_PATH.'Core/functions.php';

spl_autoload_register(function($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require basePath("{$class}.php");
});

Session::start();

require basePath('bootstrap.php');

$uri    = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router = new Core\Router();

require basePath('routes.php');

//dd($_SESSION);
try {
    $router->route($uri, $method);
} catch(ValidationException $e) {
    Session::flash('errors', $e->errors);
    Session::flash('old', $e->old['email']);
    redirect($router->previousUrl());
}

Session::flush('_flash');
Session::flush('old');

