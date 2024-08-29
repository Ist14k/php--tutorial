<?php

require basePath('views/partials/header.php');
require basePath('views/partials/nav.php');
require basePath('views/partials/banner.php');
?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h2 class="mb-4">
        <a href="/notes/create" class="text-blue-700 text-xl font-bold">Create a
          new
          note</a>
      </h2>
      <ul>
          <?php
          if (isset($notes)):
              foreach ($notes as $note): ?>
                <li>
                  <div
                    class="bg-white shadow overflow-hidden sm:rounded-lg mb-4">
                    <div class="px-4 py-5 sm:px-6">
                      <a href="/note?id=<?= $note['id']; ?>"
                         class="text-blue-700">
                        <h3
                          class="text-lg font-medium leading-6"><?= $note['title']; ?></h3>
                      </a>
                      <p
                        class="mt-1 max-w-2xl text-sm text-gray-500"><?= $note['body']; ?></p>
                    </div>
                  </div>
                </li>
              <?php
              endforeach;
          endif;
          ?>
      </ul>
    </div>
  </main>

<?php
require basePath('views/partials/footer.php');
?>