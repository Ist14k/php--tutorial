<?php

require "partials/header.php";
require "partials/nav.php";
require "partials/banner.php";
?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1>Home Pag</h1>
      <p><?= $_SESSION['name'] ?? null; ?></p>

    </div>
  </main>

<?php
require "partials/footer.php";
?>