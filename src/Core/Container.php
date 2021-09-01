<?php

namespace App\Core;
use App\Comment\CommentRepository;
use App\Post\PostRepository;
use App\Post\PostsController;
use App\Blog\BloggerRepository;
use App\Blog\BlogController;
use App\User\AdminController;
use App\User\LoginController;
use App\User\LoginService;
use App\User\RegisterService;
use App\User\UserRepository;
use PDOException;
use PDO;

/**
 * Class Container
 * @package App\Core
 */
class Container
{

    private $receipts = [];
    private $instances = [];

    /**
     * Container constructor.
     * builds Postrepository if receipts is not available
     */
    public function __construct()
    {
        $this->receipts = [
            'adminController' => function()
            {
                return new AdminController(
                    $this->create('postRepository'),
                    $this->create('loginService')
                );
            },
            'registerService' => function()
            {
                return new RegisterService(
                    $this->create('userRepository')
                );
            },
            'loginService' => function()
            {
                return new LoginService(
                    $this->create('userRepository')
                );
            },
            'loginController' => function()
            {
                return new LoginController(
                    $this->create('loginService'),
                    $this->create('registerService')
                );
            },
            'blogController' => function()
            {
                return new BlogController(
                    $this->create('bloggerRepository')
                );
            },
            'postController' => function()
            {
                return new PostsController(
                  $this->create('postRepository'),
                    $this->create('commentRepository')
                );
            },
            'commentRepository' => function()
            {
                return new CommentRepository(
                    $this->create('pdo')
                );
            },
            'bloggerRepository' => function()
            {
                return new BloggerRepository(
                    $this->create('pdo')
                );
            },
            'postRepository' => function()
            {
                return new PostRepository(
                    $this->create('pdo')
                );
            },
            'userRepository' => function()
            {
                return new UserRepository(
                    $this->create('pdo')
                );
            },
            'pdo' => function()
            {

                include ("env.php");

                try {
                    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."",DB_USER, DB_PWD );

                    //Better for OOP returns object
                    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

                    //Faster then FETCH_OBJ array
                    //$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                    return $pdo;
                }catch (PDOException $e)
                {
                    echo "Connection to DB not possible<br/>".$e->getMessage();
                    die();
                }
            }
        ];
    }

    /**
     * @param $name
     * that is hand over from the function call
     * Function checks if instance is available, if yes and there is no receipt() it builds the receipt
     */
    public function create($name)
    {
        if (!empty($this->instances[$name]))
        {
            return $this->instances[$name];
        }
        if(isset($this->receipts[$name]))
        {
            $this->instances[$name] = $this->receipts[$name]();
        }

        return $this->instances[$name];
    }

}