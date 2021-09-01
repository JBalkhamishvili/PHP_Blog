<?php

namespace App\Blog;

use App\Core\AbstractRepository;

/**
 * Class BloggerRepository
 * @package App\Post
 */
class BloggerRepository extends AbstractRepository
{
    /**
     * @return string
     */
    public function getTableName()
    {
        return "blog_post";
    }

    /**
     * @return string
     */
    public function getModelName()
    {
        return "App\\Blog\\BloggerModel";
    }

    /**
     * @return bool
     * this function saves a new blog post its a simple insert with PDO where you take the $title and $blog from the user Input form
     */
    public function adPost()
    {
        $title = "";
        $blog = "";
        $user = "";
        if(isset($_POST["blog_title"]))
        {
            $title = $_POST["blog_title"];

        }
        if (isset($_POST["blog_body"]))
        {
            $blog = $_POST["blog_body"];

        }
        if (isset($_SESSION["login"]))
        {
            $user = $this->getUser();

        }
        $table = $this->getTableName();
        //$user = $_SESSION['userID']; for later to implement now its 1 always
        if($title != null && $blog != null)
        {
            try {
                $querry = "INSERT INTO {$table} (`blog_id`, `blog_title`, `blog_body`, `blog_created_by`, `created_at`, `deleted`) VALUES (NULL, ?, ?, ?, NULL, 0)";
                $result = $this->pdo->prepare($querry)->execute([$title, $blog, $user]);
                return $result;
            } catch (PDOException $e) {
                echo "Sorry something went wrong " . $e->getMessage();
            }

        }

    }
}
