<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/style/auth.css">
</head>
<body>
    <div class="container">
        <h1 class="header">Login</h1>
        <form action="?c=Controller&m=login" method="post">
            <label for="username">Username</label><br>
            <input type="text" class="input" name="username" required><br><br>
            <label for="password">Password</label><br>
            <input type="text" class="input" name="password" required><br><br>
            <input type="submit" value="Login" class="submit" name="submit">
        </form>
        <a href="?c=Controller&m=register" class="link"></a>
    </div>
</body>
</html>