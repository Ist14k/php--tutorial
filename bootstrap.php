<?php

use Core\App;
use Core\Container;
use Core\Database;

$config = require 'config.php';

$container = new Container();

App::setContainer($container);

App::bind(Database::class, function () {
    $config = require basePath('config.php');

    return new Database($config['database'], $config['database']['username'], $config['database']['password']);
});