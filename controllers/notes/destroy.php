<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$note = $db->query(
  'SELECT * FROM notes where id = :id',
  ['id' => $_POST['id']]
)->findOrFail();

authorize($note['user_id'] === 2);

$db->query('DELETE FROM notes where id = :id', ['id' => $_POST['id']]);
header('Location: /notes');

die();
