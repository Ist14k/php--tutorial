<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];

$errors = [];

if (Validator::password($password) === false) {
  $errors['password'] = 'Password must be at least 8 characters';
}

if ($password !== $password_confirmation) {
  $errors['password'] = 'Passwords do not match';
}

if (Validator::email($email) === false) {
  $errors['email'] = 'Invalid email address';
}

if (!empty($errors)) {
  view('users/create.view.php', [
    'heading' => 'Create a new account',
    'errors' => $errors,
  ]);
  die();
}

$existingUser = $db->query(
  "SELECT * FROM users WHERE email = :email",
  ['email' => $email]
)->find();

if ($existingUser) {
  $errors['email'] = 'Email address is already in use';
}

if (!empty($errors)) {
  view('users/create.view.php', [
    'heading' => 'Create a new account',
    'errors' => $errors,
  ]);
  die();
}

$db->query(
  "INSERT INTO users (email, password) VALUES (:email, :password)",
  [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT),
  ]
);

login([
  'id' => $db->pdo->lastInsertId(),
  'email' => $email,
]);

header('Location: /');
die();


