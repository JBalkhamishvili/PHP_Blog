<?php

namespace App\User;

class RegisterService
{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function registerService($username, $password, $role)
    {
        $user = $this->userRepository->registerUser($username, $password, $role);

        if(!empty($user))
        {
            $_SESSION["login"] = $username;
            $_SESSION["active_user"] = $role;
            session_regenerate_id(true);
            return true;
        }else
        {
            $error = "Sorry username is taken!";
            echo "<div class='alert alert-danger' role='alert'>".$error."</div>";
            return false;
        }

    }
}