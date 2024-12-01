<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/auth.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h1 class="header">Login</h1>
        <form action="?c=Controller&m=login" method="post">
            <label for="username">Username:</label><br>
            <input class="input" type="text" name="username" required>
            <br><br>
            <label for="password">Password:</label><br>
            <input class="input" type="password" name="password" required>
            <br><br>
            <input class="submit" type="submit" name="submit" value="Login">
        </form>
        <a href="?c=Controller&m=register">Register here</a>
    </div>
</body>
</html>