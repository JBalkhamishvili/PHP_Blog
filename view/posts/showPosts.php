<blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded ">
    <div class="blockquote-custom-icon bg-dark shadow-sm">
        <h1>
            <i class="fa fa-quote-left text-white">
                Our Blog posts of all users
            </i>
        </h1>
    </div>
    <ul class="list-group list-group-flush">
    <?php foreach ($posts AS $arr): ?>
    <li class="list-group-item">
        <a href="/post/<?php echo $arr->blog_id;?>">
            <?php echo $arr->blog_title; ?>
        </a>
    </li>
    <?php endforeach; ?>
    </ul>
</blockquote>

