<?php

namespace App\User;

use App\Core\AbstractController;
use App\Comment\CommentRepository;
use App\Post\PostRepository;
use App\User\LoginService;
use http\Client\Curl\User;

class AdminController extends AbstractController
{
    /**
     * PostsController constructor.
     * @param PostRepository $postRepository
     * @param CommentRepository $commentRepository
     */
    public function __construct(PostRepository $postRepository, LoginService $loginService)
    {
        $this->postRepository = $postRepository;
        $this->loginService = $loginService;
    }

    public function showAdmin()
    {
        $this->loginService->checkOnline();
        $user = $this->postRepository->getUser();
        $post = $this->postRepository->getPostbyUser($user);
        $this->render("dashboard/admin", ['post' => $post]);

    }

    public function showUser()
    {
        $this->loginService->checkOnline();
        $user = $this->postRepository->getUser();
        $post = $this->postRepository->getPostbyUser($user);
        $this->render("dashboard/user",['post' => $post]);

    }

}