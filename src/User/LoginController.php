<?php

namespace App\User;

use App\Core\AbstractController;

class LoginController extends AbstractController
{

    public function __construct(LoginService $loginService, RegisterService $registerService)
    {
        $this->loginService = $loginService;
        $this->registerService = $registerService;
    }

    public function user()
    {
        $user = $_SESSION["login"];
        return $user;
    }

    public function loginshow()
    {
        //$user =  $this->userRepository->getAll();
        $this->render("user/login", [

        ]);
    }

    public function registerShow()
    {
        //$user =  $this->userRepository->getAll();
        $this->render("user/register", [

        ]);
    }

    public function logout()
    {
        unset($_SESSION["login"]);
        unset($_SESSION["active_user"]);
        session_regenerate_id(true);
        header("Location: login");
    }

    public function login()
    {
        $username = $_POST["userName"];
        $password = $_POST["password"];
        if($this->loginService->attempt($username, $password)) {
            header("Location: blog");
            return;
        }
        $this->render("user/login", []);
    }

    public function register()
    {
        $username = $_POST["reg_userName"];
        $password = password_hash($_POST["reg_password"], PASSWORD_DEFAULT );
        $role = 2;
        $usercount = $this->registerService->userRepository->getAll();
        if(empty($usercount))
        {
            $role = 1;
        }
        if($this->registerService->registerService($username, $password, $role)) {
            header("Location: blog");
            return;
        }

        $this->render("user/register", []);
    }



}