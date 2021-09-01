<div class="modal-content">
    <div class="blockquote-custom-icon bg-dark shadow-sm">
        <h1>
            <i style="font-size: 30px;" class="fa fa-quote-left text-white">
                Add a Comment
            </i>
        </h1>
    </div>
    <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
    <form method="post" action="/post/<?php echo $post["blog_id"];?>" name="adPost" id="adPost">
        <div class="form-group" style="text-align: left">
            <textarea class="form-control" name="comment_text" id="comment_text" rows="3" placeholder="New Comment" required ></textarea>
        </div>
        <br/>
        <button type="submit" class="btn btn-primary">Add Comment</button>
    </form>
    </blockquote>
    <div class="modal-footer">
        <div class="row">
            <div class="col-md-6 ml-auto">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>