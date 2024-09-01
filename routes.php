<?php

/** @var object $router */

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

// Notes
$router->get('/notes', 'notes/index.php');
$router->get('/note', 'notes/show.php');
$router->get('/notes/create', 'notes/create.php');
$router->get('/note/edit', 'notes/edit.php');
$router->post('/notes', 'notes/store.php');
$router->patch('/note', 'notes/update.php');
$router->delete('/note', 'notes/destroy.php');

// Users
$router->get('/register', 'users/create.php')->only('guest');
$router->post('/register', 'users/store.php');

// Session
$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php');
$router->delete('/session', 'session/destroy.php')->only('auth');
