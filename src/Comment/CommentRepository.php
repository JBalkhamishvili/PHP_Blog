<?php
namespace App\Comment;

use App\Core\AbstractRepository;
use PDO;
use PDOException;

/**
 * Class CommentRepository
 * @package App\Post
 */
class CommentRepository extends AbstractRepository
{
    /**
     * @return string
     */
    public function getTableName()
    {
        return "blog_comments";
    }

    /**
     * @return string
     */
    public function getModelName()
    {
        return "App\\Comment\\CommentsModel";
    }

    /**
     * @param $id
     * @return false|\PDOStatement
     * This function shows all the comments that are deposited for a blog post
     */
    public function commentByPost($id)
    {
        $table = $this->getTableName();
        $model = $this->getModelName();
        $postid = $this->pdo->prepare("SELECT * FROM {$table} AS t LEFT JOIN blog_user bu on bu.user_id = t.created_by WHERE t.blog_id = {$id} AND t.deleted != 1" );
        $postid->execute(['id' => $id]);
        $postid->setFetchMode(PDO::FETCH_CLASS, "{$model}");

        return $postid;
    }


    /**
     * @param $id
     * @param $comment_text
     * @return bool
     * This function adds a comment to a specific Post, it needs 2 parameters
     * the id of the blog post and the comments content
     */
    public function addComment($id, $comment_text)
    {
        $table = $this->getTableName();
        $user_id = $this->getUser();

        try {
            $querry = "INSERT INTO {$table} (`comment_id`,`blog_id`,`comment_text`, `created_by`) VALUES (null, ?, ?, ?)";
            $result = $this->pdo->prepare($querry)->execute([$id, $comment_text, $user_id]);
            return $result;

        }catch (PDOException $e) {
            echo "Sorry something went wrong " . $e->getMessage();
        }
    }

}

