<?php
include('server.php')
?>

<!DOCTYPE html>
<html>

<head>
    <title>My login system</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header">
        <h2>Login</h2>
    </div>

    <form method="post" action="login.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <input type="text" name="username" placeholder="Your username">
        </div>
        <div class="input-group">
            <input type="password" name="password" placeholder="Your password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="login_user">Login</button>
        </div>
        <p class="account">Don't have an account yet?<br><a href="register.php">Register here</a></p>
        <p class="account"><a href="#">Home</a></p>
    </form>
</body>

</html>