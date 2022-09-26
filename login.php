<?php

session_start();

require "function.php";

if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];


	// ambil username berdasarkan id

	$sql = mysqli_query($conn, 'select username from login where id= ' . $id);

	$row = mysqli_fetch_assoc($sql);


	// cek cookie dan username

	if (@$key === hash('sha256', @$row['username'])) {

		$_SESSION['login'] = true;
	}
}


if (isset($_SESSION['login'])) {
	header("location: index.php");
	exit();
}


if (isset($_POST['login'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = mysqli_query($conn, "select * from login where username='$username' ");

	if (mysqli_num_rows($result) === 1) {

		$row = mysqli_fetch_assoc($result);

		if (password_verify($password, $row['password'])) {

			$_SESSION['login'] = true;


			// cek rembember me

			if (isset($_POST['remember'])) {

				// buat cookie

				setcookie('id', $row['id'], time() + 60 * 60 * 24);
				setcookie('key', hash('sha256', $row['username']), time() + 60 * 60 * 24);
			}


			header("location: ./index.php");
			exit();
		}
	}

	$error = true;
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Aplikasi Perpustakaan</title>
	<!-- BOOTSTRAP STYLES-->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- FONTAWESOME STYLES-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- CUSTOM STYLES-->
	<link href="assets/css/custom.css" rel="stylesheet" />
	<!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

	<style type="text/css">
		body {
			padding: 0px;
			margin: 0px;
			background-image: url(assets/img/wall.JPG);
			background-size: 50%;
		}
	</style>

</head>

<body>
	<div class="container">
		<div class="row text-center ">
			<div class="col-md-12">
				<br /><br /><br><br><br><br>

				<?php

				if (isset($error)) {

				?>

					<p style="font-style: italic; color: red;">username & password salah</p>

				<?php

				}

				?>

			</div>
		</div>
		<div class="row ">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<center>
							<i style="font-family: Georgia, 'Times New Roman', Times, serif; font-size: 30px; ">
								LOGIN
							</i><br>
						</center>
					</div><br>

					<div class="panel-body">

						<form role="form" action="" method="post"><br>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"></i></span>
								<input type="text" name="username" class="form-control" placeholder="Your Username " />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" name="password" class="form-control" placeholder="Your Password" />
							</div><br>

							<input type="checkbox" name="remember" id="remember">
							<label for="remember">Remember me?</label><br><br>

							<input class="btn btn-primary" type="submit" name="login" value="Login Now">
							<hr>

							Not Register ? <a href="register.php">click here </a>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="assets/js/jquery-1.10.2.js"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="assets/js/jquery.metisMenu.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="assets/js/custom.js"></script>
</body>

</html>