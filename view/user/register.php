<?php if (!empty($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
<?php elseif (!empty($usi)): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $usi; ?>
    </div>
<?php endif; ?>
<?php if(empty($usi)): ?>

<blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded register_login">
    <div class="blockquote-custom-icon bg-dark shadow-sm">
        <h1>
            <i class="fa fa-quote-left text-white">
                Register Form
            </i>
        </h1>
    </div>
    <p>Please fill in username and Password for registration</p>
    <form method="post" action="/register" name="register" id="register">
        <div class="form-group" >
            <label for="reg_userName">User Name</label>
            <input type="text" class="form-control" name="reg_userName" id="reg_userName" aria-describedby="emailHelp" placeholder="Enter username" required>
        </div>
        <div class="form-group">
            <label for="reg_password">Password</label>
            <input type="password" class="form-control" name="reg_password" id="reg_password" placeholder="Password" required>
        </div>
        <br/>
        <br/>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</blockquote>
<?php endif; ?>
