<?php
$pageLoad = "view/registrations.php";

$error = null;

// Если пользователь уже зарегистрирован, то выводим его со страницы авторизации
if ($username && $user) {
    header("Location: /");
}

if (
    isset($_POST['username'], $_POST['name'], $_POST['password'], $_POST['password2'])
    && $_POST['password'] === $_POST['password2']
) {
    ['username' => $username, 'password' => $password, 'name' => $name] = $_POST;
    $userProvider = new UserProvider($db);
    $user = $userProvider->createUser($username, $password, $name);
    if ($user === null) {
        $error = 'Ошибка при регситарции пользователя';
    } else {
        $_SESSION['username'] = $user;
        header("Location: /");
        die();
    }
}
