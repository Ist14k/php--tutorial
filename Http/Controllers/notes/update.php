<?php

use Core\App;
use Core\Database;
use Core\Validator;

// find the related note
$db = App::resolve(Database::class);

$note = $db->query(
  "SELECT * FROM notes where id = :id",
  ['id' => $_POST['id']]
)
  ->findOrFail();

// authorize the user
authorize($note['user_id'] === 2);

// validate the input
$errors = [];

if(Validator::string($_POST['title'], 3, 255) === false) {
    $errors['title'] = 'Title must be between 3 and 255 characters';
}

if(Validator::string($_POST['body'], 3) === false) {
    $errors['body'] = 'Body must be at least 3 characters';
}

// update the note
if(empty($errors)) {
    $db->query(
      'UPDATE notes SET title = :title, body = :body WHERE id = :id',
      [
        'title' => $_POST['title'],
        'body'  => $_POST['body'],
        'id'    => $_POST['id'],
      ]
    );

    header('Location: /note?id='.$note['id']);
    die();
}

view('notes/edit.view.php', [
  'heading' => 'Edit note',
  'note'    => [
    'id' => $note['id'],
    'title' => $_POST['title'],
    'body' => $_POST['body'],
  ],
  'errors'  => $errors,
]);