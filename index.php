<?php
session_start();
if(!isset($_SESSION["active_user"]))
{
    $_SESSION["active_user"] = 3;
}
if(!isset($_SESSION["login"]))
{
    $_SESSION["login"] = false;
}
include("view/layout/header.php");
include("init.php");

use App\Lib\Router;
use App\Lib\Request;
use App\Lib\Response;

/**
 * Defining the routing cases and what to load when
 */
Router::get('/', function () {
    ?>
    <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
        <div class="blockquote-custom-icon bg-dark shadow-sm">
            <i class="fa fa-quote-left text-white">
                <h1>Welcome to this awesome Blog</h1>
            </i>
        </div>
        <pre>My Blog</pre>
        <a href='/blog' ><img src='out/images/home_page.gif' class='img-fluid' alt='...'></a>
    </blockquote>
    <?php
});

Router::get('/blog', function () {
    include("init.php");
    $post = $container->create('postController');
    $post->showPosts();
});

Router::get('/post/([0-9]*)', function (Request $req) {
    include("init.php");
    $id = $req->params[0];
    $post = $container->create('postController');
    $post->showPost($id);
});

Router::post('/post/([0-9]*)', function (Request $req) {
    include("init.php");
    $id = $req->params[0];
    $post = $container->create('postController');
    $post->showPost($id);
});

Router::get('/adPost', function () {
    include("init.php");
    $post = $container->create('blogController');
    $post->showAdPost();

});
Router::post('/adPost', function () {
    include("init.php");
    $post = $container->create('blogController');
    $post->savePost();
});
Router::get('/login', function () {
    include("init.php");
    $user = $container->create('loginController');
    $user->loginshow();

});
Router::post('/login', function () {
    include("init.php");
    $user = $container->create('loginController');
    $user->login();

});
Router::get('/register', function () {
    include("init.php");
    $user = $container->create('loginController');
    $user->registerShow();

});
Router::post('/register', function () {
    include("init.php");
    $user = $container->create('loginController');
    $user->register();

});

Router::get('/logout', function () {
    include("init.php");
    $user = $container->create('loginController');
    $user->logout();

});

Router::get('/admin', function () {
    include("init.php");
    $user = $container->create('adminController');
    $user->showAdmin();
});

Router::get('/user', function () {
    include("init.php");
    $user = $container->create('adminController');
    $user->showUser();

});

Router::post('/delete/([0-9]*)', function (Request $req) {
    include("init.php");
    $id = $req->params[0];
    $post = $container->create('postController');
    $post->delete($id);
});

Router::post('/edit/([0-9]*)', function (Request $req) {
    include("init.php");
    $id = $req->params[0];
    $post = $container->create('postController');
    $post->edit($id);
});

Router::get('/index.php', function () {
?>
    <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
        <div class="blockquote-custom-icon bg-dark shadow-sm">
            <i class="fa fa-quote-left text-white">
                <h1>Welcome to this awesome Blog</h1>
            </i>
        </div>
      <pre>My Blog</pre>
       <a href='/blog' ><img src='out/images/home_page.gif' class='img-fluid' alt='...'></a>
    </blockquote>
<?php
});
?>

<div class=""><i class="fa fa-quote-left text-white"></i></div>
<?php include("view/layout/footer.php"); ?>

