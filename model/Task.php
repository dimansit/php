<?php

class Task
{

    private string $description;
    private string $task_id;
    private string $date_create;
    private string $date_updated;
    private ?string $date_done;
    private int $priority;
    private int $isDone;  // я так понял sqlite не работет с булевыми переменными
    private int $user_id;

    // public function __construct(string $description, int $userId, int $priority = 1)
    // {
    //     $this->description = $description;
    //     $this->priority = $priority;
    //     $this->user_id = $userId;
    //     $this->taskId = uniqid();
    //     $this->dateCreated = new DateTime();
    //     $this->dateUpdated = new DateTime();
    //     $this->isDone = false;
    // }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getTaskId(): string
    {
        return $this->task_id;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function getIsDone(): int
    {
        return $this->isDone;
    }

    public function getDateCreate()
    {
        return $this->date_create;
    }
}
