<?php

use Core\Database;
use Core\Validator;

$config = require basePath('config.php');
$db = new Database($config['database'], 'root', '');

$errors = [];

if (Validator::string($_POST['title'], 3, 255) === false) {
  $errors['title'] = 'Title must be between 3 and 255 characters';
}

if (Validator::string($_POST['body'], 3) === false) {
  $errors['body'] = 'Body must be at least 3 characters';
}

if (empty($errors)) {
  $db->query(
    "INSERT INTO notes (title, body, user_id) VALUES (:title, :body, :user_id)",
    [
      'title' => $_POST['title'],
      'body' => $_POST['body'],
      'user_id' => 2,
    ]
  );

  header('Location: /notes');
  die();
}

view('notes/create.view.php', [
  'heading' => 'Create a new note',
  'errors' => $errors,
]);