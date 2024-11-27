<title>Login</title>
<div class="container">
    <h1 class="header">Login</h1>
    <form action="?c=Auth&m=loginSubmit" method="post">
        <label for="username">Username</label><br>
        <input type="text" class="input" name="username" required><br><br>
        <label for="password">Password</label><br>
        <input type="text" class="input" name="password" required><br><br>
        <input type="submit" value="Login" class="submit" name="submit">
    </form>
    <a href="?c=Auth&m=register" class="link"></a>
</div>