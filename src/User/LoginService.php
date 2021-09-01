<?php

namespace App\User;

class LoginService
{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function checkOnline()
    {
        if(($_SESSION['login'] != false))
        {
            return true;
        }else
        {
            header("Location: login");
            die();
        }
    }

    public function attempt($username, $password)
    {
        $user = $this->userRepository->findUser($username);
        if(empty($user))
        {
            $error = "user not found!";
            echo "<div class='alert alert-danger' role='alert'>".$error."</div>";
            return false;
        }

        if(password_verify($password, $user->user_pwd) OR $user->user_pwd == $password)
        {
            $_SESSION["login"] = $user->user_name;
            $_SESSION["active_user"] = $user->role;
            session_regenerate_id(true);
            return true;
        }else
        {
            $error = "wrong password!";
            echo "<div class='alert alert-danger' role='alert'>".$error."</div>";
            return false;
        }

    }
}