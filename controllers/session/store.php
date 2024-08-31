<?php
use Core\App;
use Core\Database;
use Core\Validator;

if ($_SESSION['loggedIn'] && $_SESSION['user']) {
    header('Location: /');
    exit();
}

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (Validator::email($email) === false) {
    $errors['email'] = 'Invalid email address';
}

if (Validator::password($password) === false) {
    $errors['password'] = 'Password must be at least 8 characters';
}


if (!empty($errors)) {
    view('session/create.view.php', [
        'heading' => '',
        'errors' => $errors,
    ]);
    exit();
}

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    "email" => $email,
])->find();


if (!$user) {
    $errors['login'] = 'Invalid login credentials';
    view('session/create.view.php', [
        'heading' => '',
        'errors' => $errors,
    ]);
    exit();
}

if ($user && password_verify($password, $user['password'])) {
    login($user);

    header('Location: /');
    exit();
}

$errors['login'] = 'Invalid login credentials';
view('session/create.view.php', [
    'heading' => '',
    'errors' => $errors,
]);
exit();

