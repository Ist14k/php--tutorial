<?php

use Core\App;
use Core\Container;
use Core\Database;

require 'env.php';
$config = require 'config.php';

$container = new Container();

// try {
//     $conn = new PDO("mysql:host=localhost;dbname=php__tutorial;charset=utf8mb4", 'root', 'ist14k@1108', [
//         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
//     ]);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connected successfully";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }

// $sss = $conn->prepare("SELECT * FROM notes");
// $sss->execute();
// $data = $sss->fetchAll(PDO::FETCH_ASSOC);
// dd($data);


App::setContainer($container);

App::bind(Database::class, function () {
    $config = require basePath('config.php');

    return new Database($config['database'], 'root', 'ist14k@1108');
});