<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Form</title>
</head>
<body>
	
	<h1>Login Sederhana</h1>
	<form action="<?=base_url('Welcome/exlogin')?>" method="post">
		<h3>Username</h3>
		<input type="text" name="username">
		<h3>Password</h3>
		<input type="password" name="password"> <br>
		<button type="submit">Login</button>
	</form>
</body>
</html>
