<?php

namespace App\Blog;


use App\Core\AbstractController;
use App\Blog\BloggerRepository;

class BlogController extends AbstractController
{
    /**
     * BlogController constructor.
     * @param BloggerRepository $bloggerRepository
     */
    public function __construct(BloggerRepository $bloggerRepository)
    {
        $this->bloggerRepository = $bloggerRepository;
    }

    /**
     * Controller method for calling the method adPost() from bloggerRepository
     */
    public function showAdPost()
    {
        $this->render("posts/adPost", []);
    }

    public function savePost()
    {
        $posts =  $this->bloggerRepository->adPost();
        header("Location: blog");
    }
}
