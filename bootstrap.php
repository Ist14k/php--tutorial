<?php

use Core\App;
use Core\Container;
use Core\Database;

$config = require 'config.php';

$username = "{$config['database']['username']}";
$password = "{$config['database']['password']}";

$container = new Container();

App::setContainer($container);

App::bind(Database::class, function () {
    $config = require basePath('config.php');

    return new Database($config['database'], 'root', 'ist14k@1108');
});