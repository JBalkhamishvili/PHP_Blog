<?php
namespace App\Post;

use App\Core\AbstractRepository;
use PDO;
use PDOException;
class PostRepository extends AbstractRepository
{
    public function getTableName()
    {
        return "blog_post";
    }

    public function getModelName()
    {
        return "App\\Post\\PostModel";
    }

    public function getPostbyUser($user)
    {
        try {
            $table = $this->getTableName();
            $model = $this->getModelName();
            $postid = $this->pdo->prepare("SELECT * FROM {$table} WHERE blog_created_by = '{$user}' AND deleted != '1'" );
            $postid->setFetchMode(PDO::FETCH_CLASS, "{$model}");
            $postid->execute();
            $postModel = $postid->fetchAll(PDO::FETCH_CLASS);

            return $postModel;

        }catch (PDOException $e)
        {
            echo "sorry something went wrong".$e->getMessage();
            return false;
        }

    }

    public function editPost($title, $content, $id)
    {
        try {
            $table = $this->getTableName();
            $querry = "UPDATE {$table} SET blog_title=?, blog_body=? WHERE blog_id=?";
            $result = $this->pdo->prepare($querry)->execute([$title, $content, $id]);
            return $result;
        } catch (PDOException $e) {
            echo "Sorry something went wrong " . $e->getMessage();
            return false;
        }
    }

    public function deletePost($id)
    {
        try {
            $table = $this->getTableName();
            $querry = "UPDATE {$table} SET deleted = 1 WHERE blog_id=?";
            $result = $this->pdo->prepare($querry)->execute([$id]);

            return $result;
        } catch (PDOException $e) {
            echo "Sorry something went wrong " . $e->getMessage();
            return false;
        }
    }

}