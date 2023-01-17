<?php

class UserProvider
{
    private PDO $dbConnect;
    public function __construct($db)
    {
        $this->dbConnect = $db;
    }


    public function getByUsernameAndPassword(string $username, string $password): ?User
    {
        $statement = $this->dbConnect->prepare(
            'SELECT id, name, username FROM users WHERE username = :username AND password = :password LIMIT 1'
        );
        $statement->execute([
            'username' => $username,
            'password' => md5($password)
        ]);
        return $statement->fetchObject(User::class, [$username]) ?: null;;
    }

    public function updateVisitDate(User $user) :void{ 
        $statement = $this->dbConnect->prepare(
            'UPDATE users SET end_visit = :end_visit WHERE id = :id'
        );
        $statement->execute([
            'end_visit' => date('Y-m-d H:i:s'),
            'id' => $user->getUserId()
        ]);
    }

    /**
     * Метод проверки существования логина в базе
     * 
     * @param string $username
     * @return bool
     */
    private function getUserOnName(string $username)
    {
        $statement = $this->dbConnect->prepare(
            'SELECT id, name, username FROM users WHERE username = :username LIMIT 1'
        );
        $statement->execute([
            'username' => $username
        ]);
        return $statement->fetchObject(User::class, [$username]) ? true : false;
    }

    public function createUser(string $username, string $password, string $name): ?User
    {
        if ($this->getUserOnName($username)) {
            return null;
        } else {
            $statement = $this->dbConnect->prepare(
                'INSERT INTO users (name, username, password) VALUES (:name, :username, :password)'
            );
            $statement->execute([
                'name' => $name,
                'username' => $username,
                'password' => md5($password)
            ]);

            return $this->getByUsernameAndPassword($username, $password);
        }
    }
}
