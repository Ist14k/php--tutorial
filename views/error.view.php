<?php

require "partials/header.php";
require "partials/nav.php";
require "partials/banner.php";
?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-semibold uppercase">
      <?= $message ?>
    </h1>
    <h1 class="text-2xl font-semibold uppercase">
      We have run into an error. Please try again later.
    </h1>
    <a class="block text-blue-600 font-bold uppercase flex items-center" href="/"><span
        class="text-3xl">&leftarrow;</span> Go back
      to
      home.</a>
  </div>
</main>

<?php
require "partials/footer.php";
?>