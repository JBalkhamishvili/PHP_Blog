<?php

namespace App\Post;

use App\Core\AbstractController;
use App\Comment\CommentRepository;
use App\User\LoginService;

class PostsController extends AbstractController
{
    /**
     * PostsController constructor.
     * @param PostRepository $postRepository
     * @param CommentRepository $commentRepository
     */
    public function __construct(PostRepository $postRepository, CommentRepository $commentRepository)
    {
        $this->postRepository = $postRepository;
        $this->commentRepository = $commentRepository;
    }

    /**
     * Call Show Posts Controller from the Abstract Controller
     */
    public function showPosts()
    {
        $posts =  $this->postRepository->getAll();
        $this->render("posts/showPosts", ['posts' => $posts]);
    }
    /**
     * Call Show Post Controller from the Abstract Controller and give it the $id parameter
     * also check if a new comment is maded and add it to the db
     */
    public function showPost($id)
    {
        $update = "";
        $error = "";

        if(isset($_POST["comment_text"]))
        {
            $comment_text = $_POST["comment_text"];
            $this->commentRepository->addComment($id, $comment_text);
            $update = true;
            $error = "Comment added successfully";
        }else{
            $update = false;

            $error = "Comment added successfully";

        }

        if(isset($_POST['edit_title']) AND isset($_POST['edit_content']))
        {
            $title = $_POST['edit_title'];
            $content = $_POST['edit_content'];
            $this->postRepository->editPost($title, $content, $id);
            $update = true;
            $error = "post updatet successfully";
        }

        $post =  $this->postRepository->getPost($id);
        $comments = $this->commentRepository->commentByPost($id);
        $this->render("posts/showPost", [
            'post' => $post,
            'comments' => $comments,
            'update' => $update,
            'error' => $error

        ]);
    }

    public function delete($id)
    {
        $deleteStat = "";
        $status = false;
        if(isset($_POST['delete']))
        {
            $this->postRepository->deletePost($id);
            $status = true;
            $deleteStat = "succeessfull deleted Post";

        }

        $posts =  $this->postRepository->getAll();
        $this->render("posts/showPosts", [
            'posts' => $posts,
            'status' => $status,
            'deleteStat' => $deleteStat

        ]);
    }



}