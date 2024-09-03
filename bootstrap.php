<?php

use Core\App;
use Core\Container;
use Core\Database;

$config = require 'config.php';

$username = "{$config['database']['username']}";
$password = "{$config['database']['password']}";

App::setContainer(new Container());

App::bind(Database::class, function () {
    $config = require basePath('config.php');

    return new Database($config['database'], 'root', 'ist14k@1108');
});