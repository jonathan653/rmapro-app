<?php
include('server.php')
?>

<!DOCTYPE html>
<html>

<head>
<link rel="icon" 
      type="image/ico" 
      href="favicon.ico">    
    <title>Title Recall</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="img-container"> 
    <img src="logotransparent.png" width="300" height="262"><br>
    </div>  
    <div class="header">
        <h2>Title Recall</h2>
    </div>

    <form class="app-form" method="post" action="login.php">
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
    </form>
</body>

</html>
