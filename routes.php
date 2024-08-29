<?php

$router ?? null;

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

// Notes
$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->get('/note', 'controllers/notes/show.php');
$router->get('/notes/create', 'controllers/notes/create.php');
$router->get('/note/edit', 'controllers/notes/edit.php');
$router->post('/notes', 'controllers/notes/store.php');
$router->patch('/note', 'controllers/notes/update.php');
$router->delete('/note', 'controllers/notes/destroy.php');

// Users
$router->get('/register', 'controllers/users/create.php')->only('guest');
$router->post('/register', 'controllers/users/store.php');
$router->get('/login', 'controllers/users/login.php')->only('guest');
$router->post('/login', 'controllers/users/store.php');
