<?php

require basePath('views/partials/header.php');
require basePath('views/partials/nav.php');
require basePath('views/partials/banner.php');
?>

  <main>
    <div
      class="mx-auto w-full max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-center">
      <form class="w-1/2 space-y-3" method="POST" action="/notes">
        <div class="col-span-full">
          <label for="title"
                 class="block text-sm font-medium leading-6 text-gray-900">Title</label>
          <div class="mt-2">
            <input type="text" name="title" id="title" autocomplete="given-name"
                   class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="col-span-full">
          <label for="body"
                 class="block text-sm font-medium leading-6 text-gray-900">Description</label>
          <div class="mt-2">
          <textarea id="body" name="body" rows="5"
                    class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $_POST['body']
                ?? '' ?></textarea>
          </div>
          <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences
            about your note.</p>
        </div>
          <?php
          if (isset($errors)): ?>
            <div class="col-span-full">
              <ul class="list-inside text-red-600">
                  <?php
                  foreach ($errors as $error): ?>
                    <li>
                      <p><?= $error ?></p>
                    </li>
                  <?php
                  endforeach ?>
              </ul>
            </div>
          <?php
          endif ?>
        <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          Save
        </button>
      </form>
    </div>
  </main>

<?php
require basePath('views/partials/footer.php');
?>