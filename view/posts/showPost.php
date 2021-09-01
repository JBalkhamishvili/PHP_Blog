
<?php
?>
<?php if ($update == true): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $error; ?>
    </div>
<?php endif; ?>
<blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
        <div class="blockquote-custom-icon bg-dark shadow-sm">
            <h1>
                <i class="fa fa-quote-left text-white">
                   <?php echo $post->blog_title; ?>
                </i>
            </h1>
        </div>
    <div class="card-body">
        <p>  <?php echo $post->blog_body; ?></p>

    </div>
    <div class="card-footer">
        <?php if( $_SESSION["active_user"] == 1  || $_SESSION["login"] == $post->user_name): ?>

            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_modal" >Edit Post</button>
        <?php endif; ?>
        <span style="color: darkgrey; font-size: 16px;margin-right: -90%;">by <?php echo $post->user_name; ?></span>

    </div>
</blockquote>
<hr>
<br/><br/>

<blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded ">
    <div class="blockquote-custom-icon bg-dark shadow-sm">
        <h3>
            <i class="fa fa-quote-left text-white">
                Comments
            </i>
        </h3>
    </div>
    <?php if( $_SESSION["login"] != false): ?>
    <ul class="list-group list-group-flush" >
    <?php
    if($comments->rowCount() == 0)
    {
        echo "<p>no comments yet!</p>";
    }
    ?>
    <?php foreach($comments AS $comment):?>

        <li class="list-group-item">
            <?php echo $comment->comment_text; ?>
            <br/>
            <p style="color: darkgrey; font-size: 13px;text-align: right;">by <?php echo $comment->user_name; ?></p>
        </li>
    <?php endforeach; ?>
</ul>
    <div class="card-footer">

            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#comment_modal" >Add Comment</button>
        <?php else: ?>
            <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                <p>Login or Register to make comments!</p>
            </blockquote>

        <?php endif; ?>
    </div>
</blockquote>

<!-- Modal -->
<div id="comment_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <?php include("comments.php"); ?>

    </div>
</div>

<!-- Modal -->
<div id="edit_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <?php include("edit.php"); ?>

    </div>
</div>