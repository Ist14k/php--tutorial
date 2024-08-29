<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$note = $db->query(
  'SELECT * FROM notes where id = :id',
  ['id' => $_GET['id']]
)
  ->findOrFail();

authorize($note['user_id'] === 2);

view('notes/edit.view.php', [
  'heading' => 'Edit note',
  'note'    => $note,
  'errors'  => [],
]);


