<div class="modal-content">
    <div class="blockquote-custom-icon bg-dark shadow-sm">
        <h1>
            <i style="font-size: 30px;" class="fa fa-quote-left text-white">
                Edit this Post
            </i>
        </h1>
    </div>
    <div>
        <form method="POST" action="<?php echo $post["blog_id"];?>" class="form-horizontal">
            <div class="form-group">
                <label class="col-form-label" for="title">
                    Title:
                </label>
                    <input type="text" name="edit_title" id="title" value=" <?php echo $post->blog_title; ?>" class="form-control" />
            </div>
            <div class="form-group">
                <label class="col-form-label" for="content">
                    Content:
                </label>
                    <textarea name="edit_content" class="form-control" id="content" rows="10"> <?php echo $post->blog_body; ?></textarea>
            </div>
            <br/>
            <input type="submit" value="Save Post!" class="btn btn-primary" />
            <br/>
            <br/>
        </form>
    </div>
    <div class="modal-footer">

                <form method="POST" action="/delete/<?php echo $post["blog_id"];?>" class="form-horizontal">
                    <input type="hidden" name="delete" value="1">
                    <input type="submit" value="Delete Post!" class="btn btn-danger" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </form>

        </div>
    </div>
</div>