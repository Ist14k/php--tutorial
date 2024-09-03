<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

if($_SESSION['loggedIn'] && $_SESSION['user']) {
    redirect('/');
}

$attributes = [
  'email'    => $_POST['email'],
  'password' => $_POST['password'],
];

$loginForm = LoginForm::validate($attributes);

$signedIn = Authenticator::attempt(
  $attributes['email'],
  $attributes['password']
);

if( ! $signedIn) {
    $loginForm->error('email', 'Invalid email or password')->throw();
}

redirect('/');



