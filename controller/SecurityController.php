<?php
$pageLoad = "view/signin.php";

$error = null;

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['username']);
    session_destroy();
    header("Location: /");
    die();
}

if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;
    $userProvider = new UserProvider($db);
    $user = $userProvider->getByUsernameAndPassword($username, $password);
    if ($user === null) {
        $error = 'Пользователь с указанными учетными данными не найден';
    } else {
        $_SESSION['username'] = $user;
        header("Location: /");
        die();
    }
}
// Если пользователь уже зарегистрирован, то выводим его со страницы авторизации
if ($username && $user) {
    header("Location: /");
}
