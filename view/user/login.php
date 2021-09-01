<blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded register_login">
    <div class="blockquote-custom-icon bg-dark shadow-sm">
        <h1>
            <i class="fa fa-quote-left text-white">
                Login Form
            </i>
        </h1>
    </div>
    <form method="post" action="/login" name="login" id="login">
        <div class="form-group" >
            <label for="userName">User Name</label>
            <input type="text" class="form-control" name="userName" id="userName" aria-describedby="emailHelp" placeholder="Enter username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        </div>
        <br/>
        <br/>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</blockquote>