<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$heading = "My notes";
$notes = [];

$notes = $db->query("SELECT * FROM notes")->findAll();

view('notes/index.view.php', [
  'heading' => 'My notes',
  'notes' => $notes,
]);