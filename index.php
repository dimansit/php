<?php

// require_once 'createTbl.php'; // создание таблиц БД
$db = require_once 'db.php';
require_once 'autoloadClass.php';
require_once '_helper_function.php';
require_once 'model/User.php';

session_start();
$username = $user =  null;
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    if ($user instanceof User) {  // добавил на всяки случай, а то во время эксперементов в $user пришли не те данные
        $uProvide = new UserProvider($db);
        $uProvide->updateVisitDate($user); // обновляем время последнего посещения пользователя
        $username = $user->getUsername();
    } else {
        $user = null;
    }
}

$routes = require 'routes.php';

$rout = new Routes();
$rout->loadRoutesPage();

require_once 'view/headLayout.php';
