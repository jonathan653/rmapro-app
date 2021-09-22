<?php include('server.php'); ?>

<!DOCTYPE html>
<html>

<head>
	<title>Register for Anderson & Co app</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="header">
		<h2>Title Recall</h2>
	</div>

	<form class="app-form" method="post" action="register.php">
		<?php include('errors.php'); ?>
		<div class="input-group">
			<input type="text" name="username" placeholder="Your username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<input type="email" name="email" placeholder="Your email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<input type="password" placeholder="Your password" name="password_1">
		</div>
		<div class="input-group">
			<input type="password" placeholder="Confirm your password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p class="account">Already have an account?<br><a href="login.php">Sign in here</a></p>
	</form>
</body>

</html>
