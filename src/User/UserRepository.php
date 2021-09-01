<?php
namespace App\User;

use App\Core\AbstractRepository;
use PDO;
use PDOException;

class UserRepository extends AbstractRepository
{
    public function getTableName()
    {
        return "blog_user";
    }

    public function getModelName()
    {
        return "App\\User\\UserModel";
    }

    public function findUser($username)
    {
        $table = $this->getTableName();
        $model = $this->getModelName();
        $querry = $this->pdo->prepare("SELECT * FROM `$table` WHERE user_name = '{$username}' AND deleted != 1");
        $querry->execute(['user_name' => $username]);
        $querry->setFetchMode(PDO::FETCH_CLASS, $model);
        $user = $querry->fetch(PDO::FETCH_CLASS);
        return $user;
    }

    public function register($username, $password, $role)
    {
        $table = $this->getTableName();
        try {
            $querry = "INSERT INTO {$table} (`user_id`,`user_name`, `user_pwd`,`role`,`deleted`) VALUES (null,?,?,?,0)";
            $result = $this->pdo->prepare($querry)->execute([$username, $password, $role]);
        }catch (PDOException $e)
        {
            echo "there was a problem with the Database".$e->getMessage();
        }

        return $result;
    }

    public function registerUser($username, $password, $role)
    {
        $newUser = $this->register($username, $password, $role);
        return $newUser;
    }

}