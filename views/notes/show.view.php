<?php

require basePath('views/partials/header.php');
require basePath('views/partials/nav.php');
require basePath('views/partials/banner.php');
$id = $_GET['id'] ?? null;
?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 space-y-4">
      <a href="/notes" class="text-blue-700 font-semibold">Back to notes</a>
      <div>
        <h2 class="text-xl font-bold">Description</h2>

          <?php
          if(isset($note)) : ?>
            <p><?= $note['body'] ?></p>
          <?php
          endif; ?>
      </div>

      <div class="flex items-center gap-4">
        <a href="/note/edit?id=<?= $id; ?>"
           class="text-green-700 font-semibold">Edit note</a>
        <form method="post">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="id" value="<?= $id ?>">
          <button type="submit" class="text-red-700 font-semibold">Delete note
          </button>
        </form>
      </div>
    </div>
  </main>

<?php
require basePath('views/partials/footer.php');
?>