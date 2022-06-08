<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Success</title>
</head>
<body>
	<h1>Selamat anda sudah login!</h1>

	<ol type="a">

	<!-- ini cara memanggilkan session username, name, email, dan level -->
		<li>Username : <?= $this->session->userdata('username');?></li>
		<li>Name : <?= $this->session->userdata('name');?></li>
		<li>Email : <?= $this->session->userdata('email');?></li>
		<li>Level : <?= $this->session->userdata('level');?></li>
	</ol>

	<a href="<?= base_url('Welcome/logout')?>"> Logout</a>
</body>
</html>
