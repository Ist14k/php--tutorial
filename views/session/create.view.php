<?php

use Core\Session;

require basePath('views/partials/header.php');
require basePath('views/partials/nav.php');

$errors = Session::get('_flash')['errors'] ?? [];

?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 space-y-4">
      <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <img class="mx-auto h-10 w-auto"
               src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
               alt="Your Company">
          <h2
            class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
            Sign in to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <form class="space-y-6" action="/session" method="POST">
            <div>
              <label for="email"
                     class="block text-sm font-medium leading-6 text-gray-900">Email
                address</label>
              <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="email"
                       value="<?= old('email') ?>"
                       class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
                <?php
                if(isset($errors['email'])): ?>
                  <p class="text-red-600 text-sm"><?= $errors['email'] ?></p>
                <?php
                endif;
                ?>
            </div>

            <div>
              <div class="flex items-center justify-between">
                <label for="password"
                       class="block text-sm font-medium leading-6 text-gray-900">Password</label>
              </div>
              <div class="mt-2">
                <input id="password" name="password" type="password"
                       autocomplete="current-password"
                       class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
                <?php
                if(isset($errors['password'])): ?>
                  <p class="text-red-600 text-sm"><?= $errors['password'] ?></p>
                <?php
                endif;
                ?>
            </div>
              <?php
              if(isset($errors['login'])): ?>
                <p class="text-red-600 text-sm"><?= $errors['login'] ?></p>
              <?php
              endif;
              ?>

            <div>
              <button type="submit"
                      class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Sign in
              </button>
            </div>
          </form>

          <p class="mt-10 text-center text-sm text-gray-500">
            Not a member?
            <a href="#"
               class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Sign
              up here</a>
          </p>
        </div>
      </div>


    </div>
  </main>

<?php
require basePath('views/partials/footer.php');
?>