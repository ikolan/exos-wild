<?php

namespace App\Model;

class UserManager extends AbstractManager
{
    public const TABLE = 'user';

    public function selectOneByEmail(string $email): ?array
    {
        $query = "SELECT * FROM user WHERE email LIKE :email";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(":email", $email, \PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch();
        return $result ? $result : null;
    }

    public function insert(array $credentials): int
    {
        $query = "INSERT INTO user(firstname, lastname, pseudo, email, `password`) VALUE (:firstname, :lastname, :pseudo, :email, :password)";

        $passwordHash = password_hash($credentials["password"], PASSWORD_DEFAULT);

        $statement = $this->pdo->prepare($query);
        $statement->bindParam(":firstname", $credentials["firstname"], \PDO::PARAM_STR);
        $statement->bindParam(":lastname", $credentials["lastname"], \PDO::PARAM_STR);
        $statement->bindParam(":pseudo", $credentials["pseudo"], \PDO::PARAM_STR);
        $statement->bindParam(":email", $credentials["email"], \PDO::PARAM_STR);
        $statement->bindParam(":password", $passwordHash, \PDO::PARAM_STR);
        $statement->execute();
        return $this->pdo->lastInsertId();
    }

}
