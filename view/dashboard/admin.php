<blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
    <div class="blockquote-custom-icon bg-dark shadow-sm">
        <h1>
            <i class="fa fa-quote-left text-white">
                Welcome <?php echo $_SESSION['login'];?> to Your Admin Panel
            </i>
        </h1>
    </div>
    <h4>My Blog Posts</h4>
    <ul class="list-group list-group-flush">
        <?php foreach ($post AS $arr): ?>
            <li class="list-group-item">
                <a href="post/<?php echo $arr->blog_id;?>">
                    <?php echo $arr->blog_title; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</blockquote>