<?php

namespace App\Core;
use PDO;
use PDOException;

/**
 * Class AbstractRepository
 * @package App\Core
 */
abstract class AbstractRepository
{
    /**
     * @var PDO
     */
    protected $pdo;

    /**
     * AbstractRepository constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return mixed
     */
    abstract public function getTableName();

    /**
     * @return mixed
     */
    abstract public function getModelName();

    /**
     * @return array
     */
    public function getAll()
    {
        $table = $this->getTableName();
        $model = $this->getModelName();
        $posts = $this->pdo->query("SELECT * FROM {$table} WHERE deleted != 1");
        $res = $posts->fetchAll(PDO::FETCH_CLASS, "{$model}");
        return $res;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPost($id)
    {
        $table = $this->getTableName();
        $model = $this->getModelName();
        $postid = $this->pdo->prepare("SELECT * FROM {$table} AS t LEFT JOIN blog_user AS bu on t.blog_created_by = bu.user_id WHERE t.blog_id = {$id} AND t.deleted != 1" );
        $postid->execute(['id' => $id]);
        $postid->setFetchMode(PDO::FETCH_CLASS, "{$model}");
        $postModel = $postid->fetch(PDO::FETCH_CLASS);

        return $postModel;
    }

    /**
     * @return array
     */
    public function getUser()
    {
        $table = "blog_user";
        $user_name = $_SESSION["login"];
        $posts = $this->pdo->query("SELECT * FROM {$table} WHERE user_name = '{$user_name}' AND deleted != 1")->fetch();
        return $posts->user_id;
    }

}