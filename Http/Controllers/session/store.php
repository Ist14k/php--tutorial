<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

if($_SESSION['loggedIn'] && $_SESSION['user']) {
    header('Location: /');
    exit();
}

$loginForm = new LoginForm();

$email    = $_POST['email'];
$password = $_POST['password'];

if($loginForm->validate($email, $password)) {
    if(Authenticator::attempt($email, $password)) {
        redirect('/');
    }

    $loginForm->addError('email', 'Invalid email or password');
}

view('session/create.view.php', [
  'errors' => $loginForm->errors(),
]);



