<?php

class User
{
    private int $id;
    private string $username;
    private string $name;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    public function getUserId(): int
    {
        return $this->id;
    }

    public function getUserName(): string
    {
        return $this->username;
    }

}
