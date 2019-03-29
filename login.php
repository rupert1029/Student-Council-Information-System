<?php include('server.php')?>
<!DOCTYPE html>
<html>
<head>
 <title> Login </title>
 <link rel="stylesheet" a href="style.css">
 <link rel = "stylesheet" href = "font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
 <div class="container">
	<img src="3.png"/>
	<h2>Admin Login</h2>
		<form  method="post" action="login.php">
		<?php include('errors.php'); ?>
			<!-- Login -->
			<div class="form-input fa fa-user">
				<input type="text" name="username" placeholder="User Name" / required autofocus> 
			</div>
			<!-- Password -->
			<div class="form-input fa fa-lock">
				<input type="password" name="password" placeholder="Password" / required>
			</div>
			<!-- Login Button -->
				<input type="submit" name="login_user" value="LOGIN" class="btn-login"/>
		</form>
 </div>
 
 
</body>
</html>