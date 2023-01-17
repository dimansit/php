<?php

$taskService = new TaskProvider($db);

if (isset($_POST['taskName']) && $user) {;
    $taskService->addTask($user, $_POST['taskName']);
    header("Location: /?controller=tasks");
    die;
}

$countTasks = $user ? $taskService->getCountTasksUser($user) : 0;

if ($user && isset($_REQUEST['gettasks'])) {
    switch ($_REQUEST['gettasks']) {
        case 'undone':
            $tasksList = $taskService->getTasksUser($user, 0);
            break;
        case 'done':
            $tasksList = $taskService->getTasksUser($user, 1);
            break;
        default:
            $tasksList = $taskService->getTasksUser($user);
    }
} else {
    $tasksList = $user ? $taskService->getTasksUser($user) : [];
}


if ($user && isset($_REQUEST['taskid'])) {
    $tascAction = $_REQUEST['taskaction'] ?? '';
    $id = $_REQUEST['taskid'];
    switch ($tascAction) {
        case 'del':
            $taskService->delTask($user, $id);
            break;
        case 'ok':
            $taskService->setIsDoneTask($user, $id);
            break;
    }
    header("Location: /?controller=tasks");
    die;
}



if ($rout->getAccesPage() == true && $username)
    $pageLoad = "view/tasks.php";
else
    $pageLoad = 'view/accessError.php';
