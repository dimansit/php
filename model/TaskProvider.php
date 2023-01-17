<?php

class TaskProvider
{

    private PDO $dbConnect;
    public function __construct($db)
    {
        $this->dbConnect = $db;
    }


    public  function getCountTasksUser(User $user)
    {
        $statement = $this->dbConnect->prepare(
            'SELECT COUNT(*) FROM tasks WHERE user_id = :user_id'
        );

        $statement->execute([
            'user_id' => $user->getUserId()
        ]);
        $count = $statement->fetch(PDO::FETCH_NUM); // Return array indexed by column number
        return reset($count);
    }

    public function getTasksUser(User $user, $type = null)
    {
        if ($type !== null) {
            $addWher = " AND isDone = $type";
        }
        $statement = $this->dbConnect->prepare(
            'SELECT task_id, description, date_create, isDone  
            FROM tasks 
            
            WHERE user_id = :user_id' . ($addWher ?? '')
                . ' ORDER BY isDone ASC'

        );

        $statement->execute([
            'user_id' => $user->getUserId()
        ]);
        return $statement->fetchAll(PDO::FETCH_CLASS, Task::class) ?: false;
    }

    public function addTask(User $user, string $description): void
    {

        $statement = $this->dbConnect->prepare(
            'INSERT INTO tasks (user_id, description) VALUES (:user_id, :description)'
        );
        $statement->execute([
            'user_id' => $user->getUserId(),
            'description' => $description
        ]);
    }

    public function delTask(User $user, int $taskId): void
    {
        $statement = $this->dbConnect->prepare(
            'DELETE FROM tasks WHERE task_id = :task_id AND user_id = :user_id'
        );
        $statement->execute([
            'task_id' => $taskId,
            'user_id' => $user->getUserId()
        ]);
    }

    public function setIsDoneTask(User $user, int $taskId): void //usera передаю для безопасности, чтоб задач была точно его
    {
        $statement = $this->dbConnect->prepare(
            'UPDATE tasks SET isDone = 1 WHERE task_id = :task_id AND user_id = :user_id'
        );
        $statement->execute([
            'task_id' => $taskId,
            'user_id' => $user->getUserId()
        ]);
    }
}
