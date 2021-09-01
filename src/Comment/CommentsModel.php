<?php

namespace App\Comment;

use App\Core\AbstractModel;

class CommentsModel extends AbstractModel
{
    public $comment_id;
    public $blog_id;
    public $comment_text;

}