<?php

use Core\Session;

require "partials/header.php";
require "partials/nav.php";
require "partials/banner.php";

$loggedIn = Session::get('_auth', 'loggedIn') ?? false;
$user     = Session::get('_auth', 'user') ?? [];
?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 space-y-4">
      <h1>Home Pag</h1>
      <p>Welcome to the home page</p>
      <p><?= $loggedIn ? 'You are logged in' : 'You are not logged in'; ?></p>
      <p><?= $user['id'] ?? ''; ?></p>
      <p><?= $user['email'] ?? ''; ?></p>
    </div>
  </main>

<?php
require "partials/footer.php";
?>