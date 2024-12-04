<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/auth.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <h1 class="header">Sign Up</h1>
        <form action="?c=Auth&m=registerSubmit" method="post">
            <label for="username">Username:</label><br>
            <input class="input" type="text" name="username" required>
            <br><br>
            <label for="password">Password:</label><br>
            <input class="input" type="password" name="password" required>
            <br><br>
            <label for="confirm_password">Confirm your Password:</label><br>
            <input class="input" type="password" name="confirm_password" required>
            <br><br>
            <input class="submit" type="submit" name="submit" value="Sign Up">
        </form>
        <p>Already have an account? <a href="/index.php?c=Auth&m=index">Login here</a></p>
    </div>
</body>
</html>