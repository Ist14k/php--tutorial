<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

if($_SESSION['loggedIn'] && $_SESSION['user']) {
    redirect('/');
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

Session::flash('errors', $loginForm->errors());
Session::flash('old', ['email' => $_POST['email']]);

redirect('/login');



