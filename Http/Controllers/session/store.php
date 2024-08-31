<?php
use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

if ($_SESSION['loggedIn'] && $_SESSION['user']) {
    header('Location: /');
    exit();
}

$db = App::resolve(Database::class);

$loginForm = new LoginForm();

$email = $_POST['email'];
$password = $_POST['password'];

if (!$loginForm->validate($email, $password)) {
    view('session/create.view.php', [
        'heading' => '',
        'errors' => $loginForm->errors(),
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

if (password_verify($password, $user['password'])) {
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

