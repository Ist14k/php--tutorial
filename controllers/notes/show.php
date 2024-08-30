<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$note = $db->query(
  "SELECT * FROM notes where id = :id",
  ['id' => $_GET['id']]
)
  ->findOrFail();

authorize($note['user_id'] === 1);

$heading = $note['title'];

view('notes/show.view.php', [
  'heading' => $heading,
  'note' => $note,
]);

