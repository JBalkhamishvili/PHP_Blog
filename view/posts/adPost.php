
<blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
    <div class="blockquote-custom-icon bg-dark shadow-sm">
        <h1><i class="fa fa-quote-left text-white"> Add a New awesome Blog post</i></h1>
    </div>

    <form method="post" action="/adPost" name="adPost" id="adPost">
            <div class="form-group">
                <label for="blog_title">Blog title</label>
                <input type="text" class="form-control" name="blog_title" id="blog_title" aria-describedby="emailHelp" placeholder="Blog title" required >
            </div>
            <br/>
            <div class="form-group">
                <label for="blog_body">Blog text</label>
                <textarea class="form-control" name="blog_body" id="blog_body" rows="3" placeholder="Blog text" required ></textarea>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary">add Post</button>
        </form>
</blockquote>

